<?php

namespace app\admin\controller;
use app\admin\common\Base;
use think\Request;
use app\admin\model\Category as CategoryModel;
//分类列表功能
class Category extends Base{
    /**
     * 显示资源列表
     */
    public function index(){
      //1、获取分类信息
      $cate = Categorymodel::getCate();//这里调用的方法在D:\phpstudy_pro\WWW\qiye\application\admin\model\Category.php文件里
      //、用模型获取分页的数据
      $cate_list = CategoryModel::paginate(5);
      //获取模板记录数量
      $count = CategoryModel::count();
      //2、模板赋值
      $this->view->assign('cate', $cate);
      $this->view->assign('cate_list',$cate_list);
      $this->view->assign('count',$count);
      //3、模板渲染
      return $this->view->fetch('category_list');
    }
    /**
     * 显示创建资源表单页.
     */
    public function create(Request $request){
      //1、设置返回的值
      $status = 1;
      $message = '添加成功';
      return ['status'=>$status,'message'=>$message];
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
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
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
