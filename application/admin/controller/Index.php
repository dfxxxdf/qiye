<?php
namespace app\admin\controller;
use app\admin\common\Base;
//首页功能
class Index extends Base {
    public function index(){
        $this->isLogin();
        return $this->view->fetch('index');
    }
    public function welcome(){
      return $this->view->fetch('welcome');
    }
}
