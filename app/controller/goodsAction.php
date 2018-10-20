<?php
    namespace app\controller;
    use biny\lib\TXLogger;
    use biny\lib\TXLanguage;
    use TXApp;

    class goodsAction extends baseAction {
        public function action_index() {
            $last = TXApp::$model->admin->admin(TXApp::$base->session->user);
            return $last;
        }
        public function action_add() {
            return $this->display('admin/goods_add');
        }
    }
?>