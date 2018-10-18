<?php
    namespace app\model;
    use TXApp;

    class admin extends baseModel {
        public function admin($username) {
            $data = $this->userDAO->filter(array('username'=>$username))->query(array('last_login','last_ip'));
            $last_login = date("Y-m-d H:i:s",$data[0]['last_login']);
            $data = array('last_login'=>$last_login,'last_ip'=>$data[0]["last_ip"]);
            return $data;
        }

        public function exits($username) {
            $data = $this->userDAO
                ->filter(array('username'=>$username))
                ->query(array('now_login','now_ip'));
            $this->userDAO
                ->filter(array('username'=>$username))
                ->update(array('last_login'=>$data[0]['now_login'],'last_ip'=>$data[0]['now_ip']));
        }
    }
?>