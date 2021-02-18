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
    public function edit(){
        return $this->view->fetch('admin_edit');
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
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
