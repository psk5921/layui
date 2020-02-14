<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\role\perm.html";i:1581677473;s:75:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\common\head.html";i:1581674945;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>分配权限</title>
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
<script type="text/javascript" src="__KDWL_JS_V1__/xadmin.js"></script>
<style>
    .form{
        padding: 10px 10px 0 10px;
        background: #fff;
    }
    .border{
        border: 1px solid #ccc;
    }
    .pad20{
        padding:10px 20px;
    }
    .line{
        height: 40px;
        line-height: 40px;
        padding-left: 20px;
        background: #f7f5f6;
    }
    .line2{
        margin-bottom: 10px;
    }
</style>
<form class="layui-form layui-form-pane form" action="" lay-filter="perm">
    <?php if($perm): foreach($perm as $first): ?>
    <div class="foreach">
    <div class="border ">
        <p class="line first"> <input type="checkbox" name="perm[]" lay-skin="primary" title="<?php echo $first['name']; ?>" value="<?php echo $first['id']; ?>" <?php if(in_array($first['id'],$menu_id)): ?> checked <?php endif; ?> lay-filter="check1"></p>
        <!--<p class="line"><?php echo $first['name']; ?></p>-->

    </div>
    <?php if($first['child']): ?>
    <div class="content">
    <?php foreach($first['child'] as $second): ?>
    <div class="pad20">
        <p class="line2 second"> <input type="checkbox" name="perm[]" lay-skin="primary" title="<?php echo $second['name']; ?>" value="<?php echo $second['id']; ?>" <?php if(in_array($second['id'],$menu_id)): ?> checked <?php endif; if($second['id'] == 21 && $uid != -999): ?> disabled <?php endif; ?>   lay-filter="check2"></p>
        <?php if($second['child']): ?>
        <p class="third">
        <?php foreach($second['child'] as $third): ?>
            <input type="checkbox" name="perm[]" lay-skin="primary" title="<?php echo $third['name']; ?>" value="<?php echo $third['id']; ?>" <?php if(in_array($third['id'],$menu_id)): ?> checked <?php endif; if($second['id'] == 21 && $uid != -999): ?> disabled <?php endif; ?> lay-filter="check3">
        <?php endforeach; ?>
        </p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
    </div>
    <?php endif; ?>
    </div>
    <?php endforeach; endif; ?>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="layui-form-item" style="">
        <div class="layui-btn " lay-submit="" lay-filter="submits" style="    position: fixed;
    bottom: 30px;
    left: 300px;
}">确认</div>
    </div>
</form>
<script>
    layui.use(['form'], function(){
        var form = layui.form
            ,layer = layui.layer

        //一级菜单
        form.on('checkbox(check1)', function(data){
            var obj1 = data.othis.parent('p.first').parent().next('.content').find('p.second');
            var obj2 = data.othis.parent('p.first').parent().next('.content').find('p.third');
            if(data.elem.checked){
                obj1.each(function(){
                    if($(this).find('input').attr('disabled') !='disabled'){
                        $(this).find('input').prop('checked',true);
                    }

                });
                obj2.each(function(){
                    if($(this).find('input').attr('disabled') !='disabled'){
                        $(this).find('input').prop('checked',true);
                    }
                });
            }else{
                obj1.each(function(){
                    $(this).find('input').prop('checked',false);
                });
                obj2.each(function(){
                    $(this).find('input').prop('checked',false);
                });
            }
            form.render();
        });
        //二级菜单
        form.on('checkbox(check2)', function(data){
            var obj = data.othis.parent('p.second').next('p.third').find('input');
            if(data.elem.checked){
                obj.each(function(){
                    $(this).prop('checked',true);
                });
            }else{
                obj.each(function(){
                    $(this).prop('checked',false);
                });

            }
            form.render();
            checkall($(this).parentsUntil('div.foreach'));
        });
        //三级菜单
        form.on('checkbox(check3)', function(data){
            var obj = data.othis.parent('p.third').find('input');
            var length = data.othis.parent('p.third').find('input').length;
            var i = 0;
            obj.each(function(){
                if(!$(this).prop('checked')){
                    i++;
                }
            });
            if(i==length){
                data.othis.parent('p.third').siblings('p.second').find('input').prop("checked", false)
            }else{
                data.othis.parent('p.third').siblings('p.second').find('input').prop("checked", true);
            }
            form.render();
            checkall($(this).parentsUntil('div.foreach'));
        });

        function checkall(obj){
            var obj1 = obj.find('p.second input');
            var length1 = obj.find('p.second input').length;
            var obj2 =obj.find('p.third input');
            var length2 =obj.find('p.third input').length;
            var i = 0,j=0;
            obj1.each(function(){
                if(!$(this).prop('checked')){
                    i++;
                }
            });
            obj2.each(function(){
                if(!$(this).prop('checked')){
                    j++;
                }
            });
            var r1 = i+j;
            var r2 = length1+length2;
            if( r1 ==  r2 ){
              obj.prev().find("p.first>input").prop("checked", false);
            }else{
              obj.prev().find("p.first>input").prop("checked", true);
            }
            form.render();
        }

        //监听提交
        form.on('submit(submits)', function(data){
            $.ajax({
                type: "post",
                url: "<?php echo url('perm'); ?>",
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
                        layer.msg('分配权限成功',{anim:0,shade:0.6},function () {
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
