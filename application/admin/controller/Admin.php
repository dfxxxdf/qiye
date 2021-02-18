<?php

namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use app\admin\model\Admin as AdminModel;
//管理员列表功能
class Admin extends Base{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(){
      //1、读取admin管理员的数据库表信息
      $admin = AdminModel::get(['username'=>'admin']);
      //2、将当前管理员的信息赋值给模板
      $this->view->assign('admin',$admin);
      return $this->view->fetch('admin_list');
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 渲染编辑模板
     * 要用到新的模板
     */
    public function edit(Request $request){
        $admin = AdminModel::get($request->param('id'));
        $this->view->assign('admin',$admin);
        return $this->view->fetch('admin_edit');
    }
    /**
     * 保存更新用户密码和邮箱
     */
    public function update(Request $request){
      //判断一下是不是Ajax提交
      if($request ->isAjax(true)){
        //获取提交的数据，自动过滤一下空值
       $data = array_filter($request->param());//这个方法可以过滤数据里面的空值
//       $data = $request->param();//这个方法可以过滤数据里面的空值
        //设置新条件
        $map = ['is_update'=> $data['is_update']];
        //更新用户表
        $res = AdminModel::update($data, $map);
        //更新成功的提示信息
        $status=1;
        $message = '更新成功';
        if(is_null($res)){
          $status=0;
          $message = '更新失败';
        }
      }
       return ['status'=>$status, 'message'=>$message];
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
