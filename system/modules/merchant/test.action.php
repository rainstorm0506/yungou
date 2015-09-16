<?php
defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base','member','no');
System::load_app_fun('user','go');
class test extends base{
	public function __construct() {			
		header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
		header("Cache-Control: no-cache, must-revalidate" ); 
		header("Pragma:no-cache");
		
		$this->db = System::load_sys_class("model");
	}   
        public function index()
        {
            //引入商家登录后台
            include $this->tpl(ROUTE_M, 'merchant.login');
        }
}
