<?php
    namespace app\controller;
    use biny\lib\TXLogger;
    use biny\lib\TXLanguage;
    use TXApp;

    class adminAction extends baseAction {
        public function action_index() {
            if (!isset(TXApp::$base->session->user)) {
                $username = $this->param('username');
                $passwd = $this->param('passwd');
                if (!$username){
                    return $this->display('admin/login');
                } else {
                    // if ($username == TXApp::$model->login->index()) {
                    //     TXApp::$base->session->user = '123';
                    //     return true;
                    // } else {
                    //     return false;
                    // }
                    if (TXAPP::$model->login->index($username,$passwd)==1) {
                        TXApp::$base->session->user = '123';
                        return true;
                    } else {
                        return TXAPP::$model->login->index($username,$passwd);
                    }
                }
            } else {
                return $this->display('admin/index');
            }
        }

        public function action_home() {
            return $this->display('admin/index_v1');
        }
        public function action_exit() {
            TXApp::$base->session->clear();
            return $this->display('admin/login');
        }
    }