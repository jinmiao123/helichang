<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Article;
use think\Db;
use think\image;

class Articlelist extends Controller
{
    public function index($page = 1, $typeid = 0, $status = 2, $author = '')
    {
        $where = array();
        //实现从前端传来的各项数据,如果不空就加入查询条件,如果为空则不理会
        $name = input('name');
        if ($name) {
            if (is_numeric($name)) {                           //因为前端搜索的时候,id和题目是同一个name,所以后端需要验证字符类型,然后添加相应的条件到$where中
                $where['id'] = $name;
            } else {
                $where['title'] = ['like', "%" . $name . "%"];
            }
        }
        if ($typeid) {
            $where['type'] = $typeid;
            $typename = Db::name('arttype')->where('type_id', $typeid)->value('name');
            $this->assign('typename', $typename);
        }
        if (!($status == '2')) {
            $where['status'] = $status;
        }
        if ($author) {
            $where['author'] = ['like', "%" . $author . "%"];
        }
        $pag = 10;//一页几行数据
        $count=Db::name('article')->order('id desc')->where($where)->count();
        $pages = ceil($count/ $pag);//当前条件下一共最多有多少页
        $article = Db::name('article')->alias('a')->join('www_artinfo b','a.id = b.article_id','LEFT')->join('www_arttype c','a.type = c.type_id','LEFT')->order('a.id desc')->where($where)->page($page, $pag)->select();

        foreach ($article as $key => $val) {
            $article[$key]['inputtime'] = date('Y-m-d', $val['inputtime']);//后台的unix时间戳需要修改成习惯格式
        }
        $type = Db::name('arttype')->select();
        $this->assign('type', $type);
        $this->assign('article', $article);
        $this->assign('typeid', $typeid);//为了条件停留,必须再把参数传回前端;
        $this->assign('status', $status);
        $this->assign('author', $author);
        $this->assign('pages', $pages);
        $this->assign('page',$page);
        $this->assign('count',$count);
        $this->assign('name',$name);
        return View();
    }

    public function add()
    {
        return View();
    }

    public function addart()
    {
        $time = input('inputtime');
        if ($time) {
            $time = str_replace('年', '-', $time);
            $time = str_replace('月', '-', $time);
            $time = str_replace('日', '', $time);
            $time = strtotime($time);
        } else {
            $time = time();
        }

        $file = request()->file('thumbnail');
        $thumbnail = '';
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->validate(['size'=>1024,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                $thumbnail = $info->getSaveName();//图片上传成功并且把上传以后的图片地址赋值给$thumbnail
//                $image = \think\Image::open(ROOT_PATH . 'public' . DS . 'uploads'.DS.$thumbnail);
//                $image->thumb(150, 150)->save('./thumb.png');
//                echo 2;
//                die();//图片处理，缩略图

            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        $article = new Article();
        $article->title = input('title');
        $article->description = input('description');
        $article->keywords = input('keywords');
        $article->content = input('content');
        $article->copyfrom = input('copyfrom');
        $article->thumbnail = $thumbnail;
        $article->inputtime = $time;
        $article->type = input('type');
        $article->author = input('author');
        if ($article->save()) {
            return $this->success('提交成功', 'index');
        } else {
            return $this->error('提交失败');
        }
    }

    public function edit()
    {
        $id = input('id');
        $data = Db::name('article')->where('id', $id)->find();
        $array=array(
            'id' => $id,
            'title' => $data['title'],
            'content' => $data['content'],
            'description' => $data['description'],
            'keywords' => $data['keywords'],
            'copyfrom' => $data['copyfrom'],
            'thumbnail' => $data['thumbnail'],
            'author' => $data['author'],
            'type' => $data['type'],

        );
        echo json_encode($array, JSON_UNESCAPED_UNICODE);

    }

    public function editart()
    {
        $id = input('id');
        $file = request()->file('thumbnail');
        $thumbnail = Db::name('article')->where('id', $id)->column('thumbnail');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if ($file) {
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if ($info) {
                $thumbnail = $info->getSaveName();//图片上传成功并且把上传以后的图片地址赋值给$thumbnail
            } else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

        $article = Db::name('article')->where('id', $id)->update([
            'title' => input('title'),
            'description' => input('description'),
            'keywords' => input('keywords'),
            'content' => input('content'),
            'author' => input('author'),
            'type' => input('type'),
            'copyfrom' => input('copyfrom'),
            'thumbnail' => $thumbnail,
        ]);
        if ($article) {
            return $this->success('修改成功！', 'index');
        } else {
            return $this->success('修改失败！');
        }

    }

    public function review()
    {
        $id = input('id');
        $ids = input('ids');
        $sta = input('status');

        if ($id) {
            $temp = Db::name('article')->where('id', $id)->value('status');
            if ($temp) {
                $status = Db::name('article')->where('id', $id)->update(['status' => '0']);
            } else {
                $status = Db::name('article')->where('id', $id)->update(['status' => '1']);
            }

        } elseif ($ids) {
            $idsarr = explode('|', $ids, -1);
            $status = Db::name('article')->where('id', 'in', $idsarr)->update(['status' => $sta]);
        }else{
            return $this->redirect('index');
        }
        if ($status) {
            return $this->success('修改成功！', 'index');
        } else {
            return $this->success('修改失败！');
        }

    }


    public function del()
    {
        $id = input('id');
        $ids = input('ids');
        if ($id) {
            $del = Db::name('article')->where('id', $id)->delete();
        } elseif ($ids) {
            $idsarr = explode('|', $ids, -1);
            $del = Db::name('article')->where('id', 'in', $idsarr)->delete();
        }else{
            return $this->redirect('index');
        }
        if ($del) {
            return $this->success('删除成功');
        } else {
            return $this->success('删除失败');
        }
    }


}