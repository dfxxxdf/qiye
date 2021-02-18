<?php

namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use app\admin\model\Admin;
use think\Session;

//登录功能
class Login extends Base{
    //渲染登录界面(需要界面)
    public function index(){
      $this->alreadyLogin();
      return $this->view->fetch('login');
    }
    //验证用户身份(不需要界面)
    public function check(Request $request){
      //设置status
      $status = 0;
      //获取一下表单提交的数据，并保存在变量中
      $data = $request -> param();
      $userName = $data['username'];
      $password = md5($data['password']);//这里取出来的密码就是md5加密了
      //在admin表中进行查询：以用户为查询条件
      $map = ['username'=>$userName];
      $admin = Admin::get($map);
      //将用户名与密码分开验证
      //如果没有查询到该用户
      if(is_null($admin)){
          //设置返回信息
        $message = '用户名不正确';
      }elseif ($admin ->password !=$password){
        //设置一下密码不正确的提示信息
        $message = '密码不正确';
      }else{
        //如果用永久名和密码都通过验证，表明是合法用户
        //修改一下返回的信息
        $status = 1;
        $message="验证通过，请点击确定进入后台";
        //更新表中登 录次数与最后登录时间
        $admin->setInc('login_count'); //往数据库里存入登录了多少次
        $admin->save(['last_time'=>time()]);//住数据库里存入最后登录时间
        //将用户登录的信息保存session中，供其它控制器进行录判断
        Session::set('user_id',$userName);
        Session::set('user_info',$data);
      }
      //把验证结果返回到前端
      return ['status'=>$status, 'message'=>$message];
    }
//    退出登录(不需要界面)
    public function save(Request $request){
        //删除当前用户session值
      Session::delete('user_id');
      Session::delete('user_info');
      //执行成功并返回登录界面
      $this->success('注销成功，正在返回...','login/index');
    }
}
