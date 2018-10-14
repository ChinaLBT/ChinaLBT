<?php
    namespace app\controller;
    use biny\lib\TXLogger;
    use biny\lib\TXLanguage;
    use TXApp;

    class adminAction extends baseAction {
        public function action_index() {
            return $this->display('admin/index_v1');
        }
    }