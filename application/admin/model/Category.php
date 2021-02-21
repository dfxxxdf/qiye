<?php

namespace app\admin\model;

use think\Collection;
use think\Model;

class Category extends Model
{
    //创建一个静态方法getCate,来获取分类信息

    /**
     * @param int $pid: 当前分类的父id
     * @param array $result:引用返回值
     * @param int $blank:设置分类之间的显示提示
     */
    public static function getCate($pid=0, &$result=[], $blank=0)
    {
        //1.分类表查询:$pid
        $res = self::all(['pid'=>$pid]);
        //2.自定义分类名称前面的提示信息
        $blank += 2;
        //3.遍历分类表
        foreach ($res as $key => $value) {

            //3-1自定义分类名称的显示格式
            $cate_name = '|--'.$value->cate_name;

            $value->cate_name = str_repeat('&nbsp;',$blank).$cate_name;

            //3-2将查询到的当前记录保存到结果$result中
            $result[] = $value;
            //3-3关键:将当前记录的id，做为下一级分类的父id,$pid，继续递归调用本方法
            self::getCate($value->id, $result, $blank);
        }
        //4.返回查询结果,调用结果集类make方法打包当前结果,转为二维数组返回
        return Collection::make($result)->toArray();
    }
}
