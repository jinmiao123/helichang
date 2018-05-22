<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Article;
use think\Db;
use think\image;

class Articlelist extends Controller{
    public function index(){
//        $article=Article::data();
        $article=Db::name('article')->order('id desc')->select();
        foreach($article as $key=>$val){
            $article[$key]['inputtime']=date('Y-m-d H:i:s', $val['inputtime']);
        }
        $this->assign('article',$article);
//        var_dump($article);
//        die();
        return View();
    }
    public function add(){
        return View();
    }
    public function addart(){
        $file = request()->file('thumbnail');
        $thumbnail='';
            // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $thumbnail=$info->getSaveName();//图片上传成功并且把上传以后的图片地址赋值给$thumbnail
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        $article=new Article();
        $article->title=input('title');
        $article->description=input('description');
        $article->keywords=input('keywords');
        $article->content=input('content');
        $article->copyfrom=input('copyfrom');
        $article->thumbnail=$thumbnail;
        $article->inputtime=time();
        $article->type=input('type');
        $article->author=input('author');
        if($article->save()){
            return $this->success('提交成功','index');
        }else{
            return $this->error('提交失败');
        }
    }
    public function edit(){
        $id=input('id');
        $data=Db::name('article')->where('id',$id)->find();
        return $this->fetch('edit',[
            'id'=>$id,
            'title'=>$data['title'],
            'content'=>$data['content'],
            'description'=>$data['description'],
            'keywords'=>$data['keywords'],
            'copyfrom'=>$data['copyfrom'],
            'thumbnail'=>$data['thumbnail'],
            'author'=>$data['author'],
            'type'=>$data['type'],
        ]);
    }

    public function editart(){
        $id=input('id');
        $file = request()->file('thumbnail');
        $thumbnail=Db::name('article')->where('id',$id)->column('thumbnail');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $thumbnail=$info->getSaveName();//图片上传成功并且把上传以后的图片地址赋值给$thumbnail
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        $artile=Db::name('article')->where('id',$id)->update([
           'title'=>input('title'),
            'description'=>input('description'),
            'keywords'=>input('keywords'),
            'content'=>input('content'),
            'author'=>input('author'),
            'type'=>input('type'),
            'copyfrom'=>input('copyfrom'),
            'thumbnail'=>$thumbnail,
        ]);
        if($artile){
            return $this->success('修改成功！','index');
        }else{
            return $this->success('修改失败！');
        }

    }

    public function del(){
        $id=input('id');
        $del=Db::name('article')->where('id',$id)->delete();
        if($del){
            return $this->success('删除成功');
        }else{
            return $this->success('删除失败');
        }
    }





}