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
                return $passwd != $data[0]['passwd']?"密码错误":true;
            } else {
                return "用户名不存在!";
            }
        }
    }
?>