<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\user\add.html";i:1581656098;s:75:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\common\head.html";i:1581656075;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理员添加</title>
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
<form class="layui-form layui-form-pane form" action="" lay-filter="add">
    <div class="layui-form-item">
        <label class="layui-form-label">登录名称 <span class="x-red">*</span></label>
        <div class="layui-input-inline">
            <input type="text" name="username" lay-verify="required" placeholder="请输入管理员名称" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登录密码 <span class="x-red">*</span></label>
        <div class="layui-input-inline">
            <input type="password" name="password" lay-verify="required" placeholder="请输入登录密码" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色</label>
        <div class="layui-input-block">
            <?php if($role): ?>
            <select name="role_id" lay-filter="role_id" lay-search>
                <option value="">请选择角色</option>
                <?php foreach($role as $item): ?>
                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php else: ?>
            <input type="text"  name="role_id" autocomplete="off" class="layui-input" placeholder="请先去添加角色" value="" disabled>
            <?php endif; ?>
        </div>
    </div>
    <div class="layui-form-item" pane="">
        <label class="layui-form-label" style="line-height: 20px">账号状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" value="1" title="正常" checked="">
            <input type="radio" name="status" value="2" title="限制登录">
        </div>
    </div>

    <div class="layui-form-item" style="">
        <div class="layui-btn " lay-submit="" lay-filter="submits" style="    position: fixed;
    bottom: 30px;
    left: 150px;
}">确认</div>
    </div>
</form>

<script>
    layui.use(['form','element'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,element = layui.element
        form.render();
        //监听提交
        form.on('submit(submits)', function(data){
            $.ajax({
                type: "post",
                url: "<?php echo url('add'); ?>",
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
                        layer.msg('添加管理员成功',{anim:0,shade:0.6},function () {
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
      /*  form.val('add', {
            "username": "贤心" // "name": "value"
            ,"password": "123456"
            ,"interest": 1
            ,"like[write]": true //复选框选中状态
            ,"close": true //开关状态
            ,"sex": "女"
            ,"desc": "我爱 layui"
        })*/


    });
</script>
