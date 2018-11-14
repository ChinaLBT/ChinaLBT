<?php
    namespace app\controller;
    use biny\lib\TXLogger;
    use biny\lib\TXLanguage;
    use TXApp;

    class customerAction extends baseAction {
        public function action_index() {
            $data = $this->customerDAO->query(array('cus_id','name','phone','grade','address','degree','sex','time','remark'),'cus_id');
            return $this->display('index/customer_per',$data);
        }
        public function action_add() {
            return $this->display('index/customer_add');
        }
        public function action_addInfo() {
            $info = array(
                'name'=>$this->param('name'),
                'phone'=>$this->param('phone'),
                'grade'=>$this->param('grade'),
                'address'=>$this->param('address'),
                'degree'=>$this->param('degree'),
                'time'=>$this->param('time'),
                'remark'=>$this->param('remark')
            );
            return TXApp::$model->customer->add($info);
        }
        public function action_del() {
            $passwd = $this->param('passwd');
            $cus_id = $this->param('cus_id');
            if(TXAPP::$model->customer->passwd(TXApp::$base->session->user,$passwd)==1){
                TXApp::$model->customer->del($cus_id);
            } else {
                return "密码错误！";
            }
        }
    }
?>