<?php
/**
 * Created by PhpStorm.
 * User: 18723
 * Date: 2018/5/21
 * Time: 9:34
 * todo：关于类型，参数的操作
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Param;
use app\admin\model\Type;
use think\View;

class Typelist extends Controller {
    //首页：返回type+param列表
    public function index()
    {
        $model = new Type();
        $type = $model->typeList();
        $this->assign('type', $type);
        return view('setting');
    }
/*
 * 页面展示：增加类型add->addType 增加参数add2->addParam 修改类型edit->editType 修改参数edit2->editParam
 * 数据渲染assgin('name'，$name) 前端页面接受 value={$name}
 * $date = input()获取数据
 * 逻辑 1调用index.heml 2点击添加跳转add.html 3引用addType.function
 */
    //添加type类型
    public function addType()
    {
        $date = input(); //获取数据
        $model = new Type(); //实例化模型
        $type = $model->addType($date); //调用type(model)中的addType(function) 传参
        if(!empty($type)) {
            //判断存在 保存成功
            return $this->success('保存成功','index');
        } else{
            //判断不存在 保存失败
            return $this->error('保存失败');
        }
    }

    //添加param参数
    public function addParam()
    {
        /*
         * 前端格式array (size=1)
              'paramname' =>
               array (size=4)
               0 => string '1' (length=1)
              'typeid' => string '5' (length=1)
               1 => string '2' (length=1)
               2 => string '3' (length=1)
         */
        $date = input(); //获取参数
        $model = new Param(); //实例化模型
        $param = $model->addParam($date); //调用param(model)中的addparam(function) 传参
        if(!empty($param)) {
            //判断存在 保存成功
            return $this->success('保存成功','index');
        } else{
            //判断不存在 保存失败
            return $this->error('保存失败');
        }
    }

    //修改type类型
    public function editType()
    {
        $date = input(); //获取参数
        $model = new Type(); //实例化模型
        $type = $model->editType($date); //调用type(model)中的editType(function) 传参
        if(!empty($type)) {
            //判断存在 保存成功
            return $this->success('保存成功','index');
        } else{
            //判断不存在 保存失败
            return $this->error('保存失败');
        }
    }

    //修改param参数
    public function editParam()
    {
        $date = input(); //获取参数
        $model = new Param(); //实例化模型
        $param = $model->editParam($date); //调用param(model)中的editparam(function) 传参
        if(!empty($param)) {
            //判断存在 保存成功
            return $this->success('保存成功','index');
        } else{
            //判断不存在 保存失败
            return $this->error('保存失败');
        }
    }

    //删除type param类型 参数
    public function delType()
    {
        /*
         * 逻辑：1获取id 2根据不同id进行del操作 3只要删除有成功 则为删除成功
         */
        $typeid = input("typeid");
        $model = new Type();
        $type = $model->delType($typeid);
        if($type) {
            return json(["code" =>200,"msg"=>"删除成功"]);
        } else{
            return json(["code" =>400,"msg"=>"删除失败"]);
        }
    }

    // param
    public function delParam()
    {
        /*
         * 逻辑：1获取id 2根据不同id进行del操作 3只要删除有成功 则为删除成功
         */
        $paramid = input("id");
        $model = new Param();
        $param = $model->delParam($paramid);
        if($param) {
            return json(["code" =>200,"msg"=>"删除成功"]);
        } else{
            return json(["code" =>400,"msg"=>"删除失败"]);
        }
    }

}