<?php 
System::load_sys_class('model','sys','no');
class merchant extends model {

	public function __construct() {		
		/*
			调用其他数据库配置文件,操作其他数据库
			$this->db_config = System::load_sys_config('database');
			$this->db_setting = 'two';	
		*/		
		parent::__construct();
		
	}
}