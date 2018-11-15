<?php
    namespace app\controller;
    use biny\lib\TXLogger;
    use biny\lib\TXLanguage;
    use TXApp;

    class indexAction extends baseAction {
        public function action_index() {
            if (!isset(TXApp::$base->session->user)) {
                $username = $this->param('username');
                $passwd = $this->param('passwd');
                if (!$username){
                    return $this->display('index/login');
                } else {
                    // if ($username == TXApp::$model->login->index()) {
                    //     TXApp::$base->session->user = '123';
                    //     return true;
                    // } else {
                    //     return false;
                    // }
                    if (TXAPP::$model->login->index($username,$passwd)==1) {
                        TXApp::$base->session->user = $username;
                        $data = $this->userDAO->filter(array('username'=>$username))->find('u_id');
                        TXApp::$base->session->u_id = $data['u_id'];
                        // TXApp::$model->index->exits(TXApp::$base->session->user);
                        return true;
                    } else {
                        return TXAPP::$model->login->index($username,$passwd);
                    }
                }
            } else {
                $last = TXApp::$model->index->index(TXApp::$base->session->user);
                return $this->display('index/index',$last);
            }
        }

        public function action_home() {
            return $this->display('index/index_v1');
        }
        public function action_exit() {
            TXApp::$model->index->exits(TXApp::$base->session->user);
            TXApp::$base->session->clear();
            return $this->display('index/login');
        }
        // public function action_customer_per() {
        //     $array = array('name'=>'hello','id'=>'123456');
        //     $array1 = array('name'=>'hello','id'=>'123456');
        //     $array2 = array('name'=>'hello','id'=>'123456');
        //     $aa = array($array,$array1,$array2);
        //     // print_r($aa);
        //     return $this->display('index/customer_per',$aa);
        // }
    }