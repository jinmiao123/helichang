<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\wamp64\www\helichang\public/../application/admin\view\typelist\setting.html";i:1527649165;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>一号房产</title>
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <link rel="stylesheet" href="/helichang/public/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/helichang/public/static/css/setting.css">
    <link href="/helichang/public/static/css/modal.css" rel="stylesheet" type="text/css"/>
    <link href="/helichang/public/static/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="/helichang/public/static/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
    <script src="/helichang/public/static/js/jquery-3.3.1.min.js"></script>
    <script src="/helichang/public/static/js/bootstrap.min.js"></script>
    <script src="/helichang/public/static/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/helichang/public/static/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/helichang/public/static/plugins/summernote-master/summernote.js"></script>
    <script src="/helichang/public/static/plugins/summernote-master/lang/summernote-zh-CN.min.js"></script>
    <!--<script src="/helichang/static/js/pages/zixun.js"></script>-->
</head>
<body>
<div class="container-fluid">
    <div class="set-table">
        <div class="thead">
            <span>参数设置</span>
            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#set-add">
                <span class="glyphicon glyphicon-plus" style="color: #33c8bd"></span>
                新增方案</a>
        </div>
        <div class="tbody">
            <div class="table-ul">
                <div class="col-sm-12 tb-title">
                    <div class="col-sm-5 text-left">名称</div>
                    <div class="col-sm-2">备注</div>
                    <div class="col-sm-2">标识</div>
                    <div class="col-sm-3">操作</div>
                </div>
                <div class="row tb-tr">
                    <?php if(is_array($type) || $type instanceof \think\Collection || $type instanceof \think\Paginator): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="col-sm-12 tb-menu-1">
                        <div class="col-sm-5 text-left tr-category">
                            <span class="glyphicon glyphicon-plus"></span> <?php echo $vo['typename']; ?>
                        </div>
                        <div class="col-sm-2"><?php echo $vo['note']; ?></div>
                        <div class="col-sm-2"><?php echo $vo['function']; ?></div>
                        <span class="typeid" hidden="hidden"> <?php echo $vo['typeid']; ?></span>
                        <div class="col-sm-3">
                            <span class="btn set-btn-primary addfenlei" data-toggle="modal" data-target="#set-add-er" typeid="<?php echo $vo['typeid']; ?>">新增分类</span>
                            <span class="btn set-btn-primary editfenlei" data-toggle="modal" data-target="#set-change" typeid="<?php echo $vo['typeid']; ?>" tyname="<?php echo $vo['typename']; ?>" note="<?php echo $vo['note']; ?>" function="<?php echo $vo['function']; ?>">修改</span>
                            <span class="btn set-btn-danger delfenlei" data-toggle="modal" data-target="#set-del" typeid="<?php echo $vo['typeid']; ?>">删除</span>
                        </div>
                    </div>
                    <div class="col-sm-12 text-left">
                        <?php if(is_array($vo['params']) || $vo['params'] instanceof \think\Collection || $vo['params'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['params'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?>
                        <ul class="tr-menu-2">
                            <li><?php echo $vi['paramname']; ?>
                                <span class="tb-tr-icontool">
                                    <span class="glyphicon glyphicon-pencil editpencil" data-toggle="modal" data-target="#pencil" paramid="<?php echo $vi['id']; ?>" paramname="<?php echo $vi['paramname']; ?>"></span>
                                    <span class="glyphicon glyphicon-remove-circle delpencil" data-toggle="modal" data-target="#set-del" paramid="<?php echo $vi['id']; ?>"></span>
                                    </span>
                            </li>
                        </ul>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--addfangan-->
<div class="modal fade bs-example-modal-lg" id="set-add" tabindex="-1" role="dialog"
     aria-labelledby="mynewsCase">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="mynewsCase">新增方案</p>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo url('admin/Typelist/addType'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="f1" class="col-sm-3 control-label"><span
                                        class="text-danger">*</span>名称：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f1" name="typename" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="f2" class="col-sm-3 control-label"><span
                                        class="text-danger">*</span>标识：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f2" name="function" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="f3" class="col-sm-3 control-label"><span
                                        class="text-danger">*</span>备注：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f3" name="note" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">发布</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--add-fenlei-->
<div class="modal fade bs-example-modal-lg" id="set-add-er" tabindex="-1" role="dialog"
     aria-labelledby="mynewsFL">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="mynewsFL">新增分类</p>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo url('admin/Typelist/addParam'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-12" id="form">
                            <div class="form-group">
                                <label for="f4" class="col-sm-2 control-label">分类:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="f4" name="paramname[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <button type="button" class="btn set-btn-primary" name="add" id="add-input">增加</button>
                        </div>
                        <input name="typeid" value=""  type="txt" required hidden="hidden" id="addtypeid"/>
                    </div>
                    <div class="modal-footer text-center">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">发布</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--change-->
<div class="modal fade bs-example-modal-lg" id="set-change" tabindex="-1" role="dialog"
     aria-labelledby="mychangeCase">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="mychangeCase">修改方案</p>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo url('admin/Typelist/editType'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="f7" class="col-sm-3 control-label"><span
                                        class="text-danger">*</span>名称：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f7" name="typename" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="f8" class="col-sm-3 control-label"><span
                                        class="text-danger">*</span>标识：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control date-picker" id="f8" name="function" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label for="f9" class="col-sm-3 control-label"><span
                                        class="text-danger">*</span>备注：</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="f9" name="note" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="typeid" value="" type="txt" required hidden="hidden" id="tyid"/>
                    <div class="modal-footer text-center">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">发布</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--delete-->
<div class="modal fade bs-example-modal-lg" id="set-del" tabindex="-1" role="dialog"
     aria-labelledby="mydel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="mydel">删除</p>
            </div>
            <div class="modal-body">
                <p>确定要删除该条数据？</p>
            </div>
            <div class="modal-footer text-center">
                <div class="text-center">
                    <button type="button" class="btn btn-primary delconfirm" id="set-btn-del" data-dismiss="modal"
                            aria-label="Close">确定
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--pencil-->
<div class="modal fade bs-example-modal-lg" id="pencil" tabindex="-1" role="dialog"
     aria-labelledby="mypencil">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <p class="modal-title" id="mypencil">修改分类</p>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?php echo url('admin/Typelist/editParam'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="f4" class="col-sm-2 control-label">分类:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="delparam" name="paramname" required>
                                    <input name="id" value=""  type="txt" required hidden="hidden" id="delid"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">完成</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--circle-->

<script>
    //jinmiao
    $(".addfenlei").click(function(){
        var typeid = $(this).attr('typeid');
        $("#addtypeid").val(typeid);
    })
    $(".editfenlei").click(function(){
        var typeid = $(this).attr('typeid');
        var name = $(this).attr('tyname');
        var note = $(this).attr('note');
        var fun = $(this).attr('function');
        $("#f7").val(name);
        $("#f8").val(fun);
        $("#f9").val(note);
        $("#tyid").val(typeid);
    })
    $(".delfenlei").click(function () {
        var typeid = $(this).attr('typeid');
        $(".delconfirm").click(function () {
            del(typeid);
        })
    })
    $(".editpencil").click(function(){
        var id = $(this).attr('paramid');
        var paramname = $(this).attr('paramname');
        $("#delparam").val(paramname);
        $("#delid").val(id);
    })
    $(".delpencil").click(function(){
        var id = $(this).attr('paramid');
        $(".delconfirm").click(function(){
            delparam(id);
        })

    })
    function delparam(id) {
        $.ajax({
            url:"<?php echo url('admin/Typelist/delParam'); ?>",
            type:'post',
            'dataType':'json',
            'data':{id : id},
            success:function(data) {
                if (data.code == 200) {
                    location.href = "<?php echo url('admin/Typelist/index'); ?>";
                } else {
                    alert("删除失败")
                }
            },
            });
    };

    function del(typeid) {
        $.ajax({
            url:"<?php echo url('admin/Typelist/delType'); ?>",
            type:'post',
            'dataType':'json',
            'data':{typeid : typeid},
            success:function(data){
                if (data.code == 200) {
                    location.href = "<?php echo url('admin/Typelist/index'); ?>";
                } else {
                    alert("删除失败")
                }
                //alert("删除成功")

            },
            error:function(){
                //alert("删除失败")
            }
        });
    };

    $(function () {
        $(function () {
            $('.tr-category').click(function () {
                var $this=$(this);
                $this.parent().parent().siblings().find('.tr-menu-2').hide();
                $this.parent().parent().siblings().find('.tr-category span').attr("class", "glyphicon glyphicon-plus");
                $this.parent().next().find('.tr-menu-2').toggle();
                $this.children("span").toggleClass('glyphicon-plus');
                $this.children("span").toggleClass('glyphicon-minus');
            });
        });
    });

    $(function () {
        $('#add-input').on('click', function () {
            insertTr();
        })
    });
    //add-fenlei
    var gradeI = 1;

    function insertTr() {
        var html = '';
        html += '<div class="form-group">\n' +
            '<label class="col-sm-2 control-label"></label>\n' +
            '<div class="col-sm-8">\n' +
            '<input type="text" class="form-control" name="paramname[]">\n' +
            '</div>\n' +
            '<div class="col-sm-2">\n' +
            '<button type="button" name="del" class="btn set-btn-danger">删除</button>\n' +
            '</div>\n' +
            '</div>';
        $('#form').append(html);
        $('button[name=del]').click(function () {
            $(this).parent().parent().remove();
        });
        gradeI++;
    }
</script>
</body>
</html>