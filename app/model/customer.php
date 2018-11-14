<?php
    namespace app\model;
    use TXApp;

    class customer extends baseModel {
        public function add($info) {
            $res = $this->customerDAO->add($info,false);
            return $res;
        }

        public function del($cus_id) {
            $this->customerDAO
                ->filter(array('cus_id'=>$cus_id))
                ->delete();
        }

        public function passwd($username,$passwd) {
            $data = $this->userDAO->filter(array('username'=>$username))->query(array('username','passwd'));
            if ($passwd != $data[0]['passwd']) {
                return 0;
            } else {
                return 1;
            }
        }
    }
?>