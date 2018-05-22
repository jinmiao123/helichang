<?php
namespace app\admin\model;

use think\Model;

class Article extends Model
{
    protected $pk = array(
        'id', 'title', 'description', 'keywords', 'content', 'delflg', 'author', 'type', 'inputtime', 'copyfrom', 'status', 'thumbnail'
    );
    protected $pro='id';
}
