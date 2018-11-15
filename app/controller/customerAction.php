<?php
    namespace app\controller;
    use biny\lib\TXLogger;
    use biny\lib\TXLanguage;
    use TXApp;

    class customerAction extends baseAction {
        public function action_index() {
            $data = $this->customerDAO
            ->filter(array('__like__'=>array('u_id'=>TXApp::$base->session->u_id)))
            ->query(array('cus_id','name','phone','grade','address','degree','sex','time','remark'),'cus_id');
            return $this->display('index/customer_per',$data);
        }

        public function action_add() {
            return $this->display('index/customer_add');
        }

        public function action_addInfo() {
            $cus_id = time().rand(1000,9999);
            $info = array(
                'cus_id'=>$cus_id,
                'name'=>$this->param('name'),
                'phone'=>$this->param('phone'),
                'grade'=>$this->param('grade'),
                'address'=>$this->param('address'),
                'degree'=>$this->param('degree'),
                'sex'=>$this->param('sex'),
                'time'=>$this->param('time'),
                'remark'=>$this->param('remark'),
                'u_id' =>TXApp::$base->session->u_id
            );
            return TXApp::$model->customer->add($info);
        }

        public function action_del() {
            $passwd = $this->param('passwd');
            $cus_id = $this->param('cus_id');
            if(TXAPP::$model->customer->passwd(TXApp::$base->session->user,$passwd)==1){
                TXApp::$model->customer->del($cus_id);
                return 1;
            } else {
                return "密码错误！";
            }
        }

        public function action_readyShare() {
            $cus_id = $this->param('cus_id');
            $user = TXApp::$model->customer->readyShare($cus_id);
            return $user;
        }

        public function action_share() {
            $cus_id = $this->param('cus_id');
            $u_id = $this->param('u_id');
            // TXApp::$model->customer->share($cus_id,$u_id);
            print_r( TXApp::$model->customer->share($cus_id,$u_id));
        }

        public function action_edit($cus_id) {
            $data = $this->customerDAO
            ->filter(array('cus_id'=>$cus_id))
            ->query(array('name','phone','grade','address','degree','sex','time','remark'));
            print_r($data);
            return $this->display('index/customer_add',$data);
        }
    }
?>