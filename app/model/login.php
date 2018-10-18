<?php
    namespace app\model;
    use TXApp;

    class login extends baseModel {
        public function index($username,$passwd) {
            // $username = 'admin';
            // return $username;
            $this->DAO = $this->userDAO;
            $data = $this->userDAO->filter(array('username'=>$username))->query(array('username','passwd'));
            if($data) {
                if ($passwd != $data[0]['passwd']) {
                    return "密码错误!";
                } else {
                    $this->userDAO
                        ->filter(array('username'=>$username))
                        ->update(array('now_login'=>time(),'now_ip'=>$_SERVER['REMOTE_ADDR']));
                    return true;
                }
            } else {
                return "用户名不存在!";
            }
            
        }
    }
?>