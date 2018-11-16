<?php
    namespace app\model;
    use TXApp;

    class customer extends baseModel {
        public function add($info) {
            $data = $this->customerDAO
                        ->filter(array('cus_id'=>$info['cus_id']))
                        ->query();
            if($data) {
                $res = $this->customerDAO
                            ->filter(array('cus_id'=>$info['cus_id']))
                            ->update(
                                array(
                                    'name' => $info['name'],
                                    'phone' => $info['phone'],
                                    'grade' => $info['grade'],
                                    'address' => $info['address'],
                                    'degree' => $info['degree'],
                                    'sex' => $info['sex'],
                                    'time' => $info['time'],
                                    'remark' => $info['remark'],
                                    'u_id' => $info['u_id']
                                    )
                            );
                return $res;
            } else {
                $res = $this->customerDAO->add($info,false);
                return $res;
            }
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

        public function readyShare($cus_id) {
            $user_share = array();
            $user = $this->userDAO->query(array('username','u_id'));
            $u_id = $this->customerDAO
                        ->filter(array('cus_id'=>$cus_id))
                        ->find('u_id');
            foreach($user as $value) {
                if (strpos($u_id['u_id'],$value['u_id']) !== false) {
                    $value['check']=true;
                } else {
                    $value ['check']=fales;
                }
                array_push($user_share,$value);
            }
            return json_encode($user_share);
        }

        public function share($cus_id,$u_id) {
            $data = $this->customerDAO
                    ->filter(array('cus_id'=>$cus_id))
                    ->update(array('u_id'=>$u_id));
            return $data;
        }
    }
?>