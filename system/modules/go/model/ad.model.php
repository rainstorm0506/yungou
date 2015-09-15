<?php 

System::load_sys_class('model','sys','no');
class ad extends model {
	public function __construct() {		
		parent::__construct();
	}
	
	public function get_ad($id=null){
		if(empty($id)){
			return '';
		}
		$ad_area = $this->GetOne("select * from `@#_ad_area` where `id` = ".$id);
        $ad_data = $this->GetOne("select * from `@#_ad_data` where `aid` = ".$id." order by id desc limit 1");
        if($ad_data['type']=="img"){
            echo "<img src='".G_UPLOAD_PATH.DIRECTORY_SEPARATOR.$ad_data['content']."' width='".$ad_area['width']."' height='".$ad_area['height']."'>";
        }
	}
	
}