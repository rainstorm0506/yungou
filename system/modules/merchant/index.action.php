<?php
defined('G_IN_SYSTEM') or exit('No permission resources.');
System::load_app_class('admin', G_ADMIN_DIR, 'no');

class index extends admin{
    public function __construct() {
        parent::__construct();
        $this->db = System::load_sys_class("model");
    }
    public function login()
    {
        if(isset($_POST['submit'])){
            $username = trim($_POST['username']);
            $pwd = trim($_POST['password']);
            $sql = "select id,pwd from `@#_merchant` where merchant_name='$username' limit 1";
            $row = $this->db->Getone($sql);
            if($row['pwd']==  md5($pwd))    //密码比对成功
            {
                include $this->tpl(ROUTE_M, 'merchant.index');
            }else{
                _message("用户名或者密码不正确!!!",G_HTTP_REFERER);
                exit();
            }
        }else{
            include $this->tpl(ROUTE_M, 'merchant.login');
        }
    }
}

