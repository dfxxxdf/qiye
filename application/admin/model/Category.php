<?php

namespace app\admin\model;

use think\Model;

class Category extends Model{
    /**
     * 实现无限分类的二常用编程技巧
     * 1、使用递归函数来实现(我们使用这个方法)
     * 2、使用路径方式来实现
     */
    //创建一个静态方法getCate来获取分类信息
  /**
   * @param int $pid 当前分类的父id
   * @param array $result 引用返回值，所以要添加&
   * @param int $blank
   */
  public static function getCate($pid=0, &$result=[], $blank=0){
    /**
     * 推荐
     * 1、蒋查询方法创建在模型中；
     * 2、尽可能采用静态方法以提高执行效率
     */
  }
}
