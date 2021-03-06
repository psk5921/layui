<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\perm\update.html";i:1581682917;s:75:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\common\head.html";i:1581674945;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>菜单编辑</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script>
        var start = new Date().getTime();
    </script>
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/build/css/app.css" media="all">

    <!--页面菜单滑出特效-->
    <link rel="shortcut icon" href="/favicon.ico">
    <!--<link rel="stylesheet" type="text/css" href="/static/admin/left_move/css/default.css" />-->
    <link rel="stylesheet" type="text/css" href="/static/admin/left_move/css/component.css" />
    <script src="/static/admin/left_move/js/modernizr.custom.js"></script>
    <script src="/static/admin/layui/layui.js"></script>
    <script src="/static/common/js/jquery.min.js"></script>
    <script src="/static/admin/js/xadmin.js"></script>
</head>
<style>
    #progress {
        position: fixed;
        height: 2px;
        background: #009688;
        transition: opacity 500ms linear;
        z-index:100000;
    }

    #progress.done {
        opacity: 0
    }

    #progress span {
        position: absolute;
        height: 2px;
        -webkit-box-shadow: #009688 1px 0 6px 1px;
        -webkit-border-radius: 100%;
        opacity: 1;
        width: 150px;
        right: -10px;
        -webkit-animation: pulse 2s ease-out 0s infinite;
    }

    @-webkit-keyframes pulse {
        30% {
            opacity: .6
        }
        60% {
            opacity: 0;
        }
        100% {
            opacity: .6
        }
    }
    .x-red{
        color: #FF5722;
    }
</style>
<style>
    .hidden{
        display: none;
    }
    #layui-layer-iframe2{
        height: 4.40rem;
    }

    .file_img{
        width: 100px;
        height: 100px;
        float: left;
        margin:0 .4rem .4rem 0;
        position: relative;
        overflow: hidden;
    }
    .del_file{
        color: red;
        position: absolute;
        right: 0;
        top: 0;
    }
    .file_img img{
        width: 100%;
        height: 100%
    }

    .file_pdf{
        width: 100px;
        height: 100px;
        float: left;
        margin:0 .4rem .4rem 0;
        position: relative;
        overflow: hidden;
    }
    .icon_video{
        color: #707070;
        font-size: 4rem;
        margin-left: 1rem;
    }
</style>
<style>
    .form{
        padding: 10px 10px 0 10px;
        background: #fff;
    }
</style>
<form class="layui-form layui-form-pane form" action="" lay-filter="update">
    <div class="layui-form-item">
        <label class="layui-form-label">排序 </label>
        <div class="layui-input-inline">
            <input type="text" name="sortnum"  lay-verify="number" placeholder="请输入序号" autocomplete="off" class="layui-input" value="0">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称 <span class="x-red">*</span></label>
        <div class="layui-input-inline">
            <input type="text" name="name" lay-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">父级菜单</label>
        <div class="layui-input-inline">
            <select  disabled name="pid">
                <option value="0">顶级分类</option>
                <?php if($top_menu): foreach($top_menu as $menu): ?>
                <option value="<?php echo $menu['id']; ?>" ><?php echo $menu['name']; ?></option>
                <?php endforeach; endif; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">控制器 <span class="x-red">*</span></label>
        <div class="layui-input-inline">
            <input type="text" name="controller" lay-verify="required" placeholder="请输入控制器名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">方法 <span class="x-red">*</span></label>
        <div class="layui-input-inline">
            <input type="text" name="action" lay-verify="required" placeholder="请输入方法名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">Class名称</label>
        <div class="layui-input-inline">
            <input type="text" name="iconfont"  placeholder="只支持iconfont样式class名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" pane="" >
        <label class="layui-form-label" style="line-height: 20px">状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" value="1" title="显示" checked="">
            <input type="radio" name="status" value="0" title="隐藏">
        </div>
    </div>
    <div class="layui-form-item" pane="">
        <label class="layui-form-label" style="line-height: 20px;width: 130px">是否是菜单项</label>
        <div class="layui-input-block">
            <input type="radio" name="is_menu" value="1" title="是" checked="">
            <input type="radio" name="is_menu" value="0" title="否">
        </div>
    </div>
    <input type="hidden" name="id">
    <div class="layui-form-item" style="text-align: center;">
        <div class="layui-btn " lay-submit="" lay-filter="submits" style="width: 100px;height: 40px;line-height: 40px">确认</div>
    </div>
</form>

<script>

    layui.use(['form'], function(){
        var form = layui.form
            ,layer = layui.layer
        //监听提交
        form.on('submit(submits)', function(data){
            $.ajax({
                type: "post",
                url: "<?php echo url('update'); ?>",
                dataType: "json",
                data:data.field,
                success: function(data, textStatus, request){
                    if( data.code == 20006){
                        //用户信息失效
                        layer.msg(data.msg,{anim:0,shade:0.6},function () {
                            parent.location.reload();
                            xadmin.del_tab();
                            xadmin.close();
                        });
                    }else if( data.code == 1 ){
                        layer.msg('编辑菜单成功',{anim:0,shade:0.6},function () {
                            parent.location.reload();
                            xadmin.close();
                        });
                    }else{
                        layer.msg(data.msg,{anim:0,shade:0.6},function () {
                            return  false;
                        });
                    }
                }
            });
            /*layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })*/
            return false;
        });
        //表单初始赋值
        form.val('update', {
            "name": "<?php echo $perm['name']; ?>", // "name": "value"
            "id": "<?php echo $perm['id']; ?>", // "name": "value"
            "sortnum": "<?php echo $perm['sortnum']; ?>", // "name": "value"
            "name": "<?php echo $perm['name']; ?>" ,// "name": "value"
            "pid": "<?php echo $perm['pid']; ?>", // "name": "value"
            "controller": "<?php echo $perm['controller']; ?>", // "name": "value"
            "action": "<?php echo $perm['action']; ?>", // "name": "value"
            "iconfont": "<?php echo $perm['iconfont']; ?>", // "name": "value"
            "status": "<?php echo $perm['status']; ?>", // "name": "value"
            "is_menu": "<?php echo $perm['is_menu']; ?>", // "name": "value"
        })

    });
</script>
