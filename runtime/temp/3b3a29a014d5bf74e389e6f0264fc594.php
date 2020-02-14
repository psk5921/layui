<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Login\login2.html";i:1576813615;}*/ ?>
<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理登录</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/login2.0/css/default.css">
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="/static/admin/login2.0/css/styles.css">
    <!--[if IE]>
    <!--<script src="http://libs.baidu.com/html5shiv/3.7/html5shiv.min.js"></script>-->
    <![endif]-->
</head>
<body>

<div class='login'>
    <div class='login_title'>
        <span>账号登录</span>
    </div>
    <div class='login_fields'>
        <div class='login_fields__user'>
            <div class='icon'>
                <img src='/static/admin/login2.0/img/user_icon_copy.png'>
            </div>
            <input placeholder='用户名' name="login_number" type='text'>
            <div class='validation'>
                <img src='/static/admin/login2.0/img/tick.png'>
            </div>
            </input>
        </div>
        <div class='login_fields__password'>
            <div class='icon'>
                <img src='/static/admin/login2.0/img/lock_icon_copy.png'>
            </div>
            <input placeholder='密码' name="password" type='password'>
            <div class='validation'>
                <img src='/static/admin/login2.0/img/tick.png'>
            </div>
        </div>
        <div class='login_fields__submit'>
            <input type='submit' value='登录'>
            <div class='forgot'>
                <!--<a href='#'>忘记密码?</a>-->
            </div>
        </div>
    </div>
    <div class='success'>
        <h2>认证成功</h2>
        <p>欢迎回来</p>
    </div>
    <div class='disclaimer'>
        <p  style="text-align: center">2018 © Power by Lequz Solution</p>
    </div>
</div>
<div class='authent'>
    <img src='/static/admin/login2.0/img/puff.svg'>
    <p>认证中...</p>
</div>
<script src="/static/admin/layui/layui.js"></script>
<!--<script type="text/javascript" src='/static/admin/login2.0/js/stopExecutionOnTimeout.js?t=1'></script>-->
<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/login2.0/js/jquery-ui.min.js"></script>
<script>
    $('input[type="submit"]').click(function () {
        $('.login').addClass('test');
        setTimeout(function () {
            $('.login').addClass('testtwo');
        }, 300);
        setTimeout(function () {
            $('.authent').show().animate({ right: -320 }, {
                easing: 'easeOutQuint',
                duration: 600,
                queue: false
            });
            $('.authent').animate({ opacity: 1 }, {
                duration: 200,
                queue: false
            }).addClass('visible');
        }, 500);
        setTimeout(function () {
            $('.authent').show().animate({ right: 90 }, {
                easing: 'easeOutQuint',
                duration: 600,
                queue: false
            });
            $('.authent').animate({ opacity: 0 }, {
                duration: 200,
                queue: false
            }).addClass('visible');
            $('.login').removeClass('testtwo');
        }, 2500);
        setTimeout(function () {
            $('.login').removeClass('test');
        }, 2800);
        setTimeout(function () {
            var login_number=$('input[name="login_number"]').val();
            var password=$('input[name="password"]').val();
            $.post('<?php echo url("admin/Login/ApiLogin"); ?>',{login_number:login_number,password:password},function (obj) {
                if(obj.code==400){
                    layui.use('layer', function(){ //独立版的layer无需执行这一句
                        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
                        layer.msg(obj.msg);
                    });
                }
                if(obj.code==200){
                    window.location.href=obj.data.url;
                }
            },'JSON');
            },1500);//使用字符串执行方法
    });
    $('input[type="text"],input[type="password"]').focus(function () {
        $(this).prev().animate({ 'opacity': '1' }, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({ 'opacity': '.5' }, 200);
    });
    $('input[type="text"],input[type="password"]').keyup(function () {
        if (!$(this).val() == '') {
            $(this).next().animate({
                'opacity': '1',
                'right': '30'
            }, 200);
        } else {
            $(this).next().animate({
                'opacity': '0',
                'right': '20'
            }, 200);
        }
    });
    var open = 0;
    $('.tab').click(function () {
        $(this).fadeOut(200, function () {
            $(this).parent().animate({ 'left': '0' });
        });
    });
</script>
</body>
</html>