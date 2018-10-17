<?php

namespace app\controller;
use TXApp;

/**
 * Created by PhpStorm.
 * User: billge
 * Date: 16-6-22
 * Time: 上午11:38
 * @property \app\dao\userDAO $userDAO
 */

class loginAction extends baseAction
{
    /**
     * 登录
     */
    public function action_index()
    {
        //    if (TXApp::$model->person->exist()){
        //        TXApp::$base->request->redirect('/');
        //    }
        // $username = $this->param('username');
        // if (!$username){
            // return $this->display('admin/login');
        // } else {
            TXApp::$model->login->index();
            return print_r(TXApp::$model->login->index());
                // TXApp::$base->session->user = '123';
                // return true;
            // } else {
                // return false;
            // }
            //    $view = $this->display('admin/login');
            //   return $view;
        // }
        //        if ($user = $this->userDAO->filter(['name'=>$username])->find()){
        //            TXApp::$model->person($user['id'])->login();
        //        } else {
        //            $id = $this->userDAO->add(['name'=>$username, 'registerTime'=>time()]);
        //            TXApp::$model->person($id)->login();
        //        }
        //        if ($lastUrl = TXApp::$base->session->lastUrl){
        //            unset(TXApp::$base->session->lastUrl);
        //            TXApp::$base->request->redirect($lastUrl);
        //        } else {
        //            TXApp::$base->request->redirect('main/login');
        //        }
        //        $this->display('main/index');
    }

}