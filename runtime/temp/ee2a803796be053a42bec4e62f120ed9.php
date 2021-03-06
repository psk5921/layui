<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\Login\login2.html";i:1581674123;}*/ ?>
<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理登录</title>
    <!--[if IE]>
    <!--<script src="http://libs.baidu.com/html5shiv/3.7/html5shiv.min.js"></script>-->
    <![endif]-->
    <style>
        #progress {
            position: fixed;
            height: 2px;
            background: #bb6dec;
            transition: opacity 500ms linear
        }

        #progress.done {
            opacity: 0
        }

        #progress span {
            position: absolute;
            height: 2px;
            -webkit-box-shadow: #bb6dec 1px 0 6px 1px;
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
    </style>
</head>
<!--<script>
    var start = new Date().getTime();
</script>-->
<link rel="stylesheet" type="text/css" href="/static/admin/login2.0/css/default.css">
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/static/admin/login2.0/css/styles.css">
<link rel="shortcut icon" href="/favicon.ico"/>
<body>
<!--<div id="progress">
    <span></span>
</div>-->
<div class='login'>
    <div style="text-align: center;margin-bottom: 15px">
        <img src="/201605261116_03.png" alt="" style="margin-right: 15px"
             onerror="this.src='https://www.vowkin.com/static/index/img/201605261116_03.png'">
        <img src="/0327001.png" alt="" onerror="this.src='https://www.vowkin.com/static/index/img/0327001.png'">
    </div>
    <div class='login_title'>

        <span>后台管理登录</span>
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
        <p style="text-align: center">2020 © Power by VK Solution</p>
    </div>
</div>
<div class='authent'>
    <img src='/static/admin/login2.0/img/puff.svg'>
    <p>认证中...</p>
</div>
<script src="/static/admin/layui/layui.js"></script>
<!--<script type="text/javascript" src='/static/admin/login2.0/js/stopExecutionOnTimeout.js?t=1'></script>-->
<script src="/static/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/admin/login2.0/js/jquery-ui.min.js"></script>
<script>
  /*  var end = new Date().getTime();
    var ox = end - start;
    $({property: 0}).animate({property: 100}, {
        duration: ox,
        progress: function () {
            var percentage = Math.round(this.property);
            $('#progress').css('width', percentage + "%");
            if (percentage == 100) {
                $("#progress").addClass("done");//完成，隐藏进度条
            }
        }
    });*/

    window.addEventListener('keydown', function (e) {
        var event = window.event || e;
        var code = event.keyCode || event.which || event.charCode;
        if (code == 13) {
            $('input[type="submit"]').click();
        }
    })

    $('input[type="submit"]').click(function () {
        var _this = this;
        $('.login').addClass('test');
        setTimeout(function () {
            $('.login').addClass('testtwo');
        }, 300);
        setTimeout(function () {
            $('.authent').show().animate({right: -320}, {
                easing: 'easeOutQuint',
                duration: 600,
                queue: false
            });
            $('.authent').animate({opacity: 1}, {
                duration: 200,
                queue: false
            }).addClass('visible');
        }, 500);
        setTimeout(function () {
            $('.authent').show().animate({right: 90}, {
                easing: 'easeOutQuint',
                duration: 600,
                queue: false
            });
            $('.authent').animate({opacity: 0}, {
                duration: 200,
                queue: false
            }).addClass('visible');
            $('.login').removeClass('testtwo');
        }, 2500);
        setTimeout(function () {
            var login_number = $('input[name="login_number"]').val();
            var password = $('input[name="password"]').val();
            $.post('<?php echo url("admin/Login/ApiLogin"); ?>', {username: login_number, password: password}, function (obj) {

                layui.use('layer', function () { //独立版的layer无需执行这一句
                    var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
                    layer.msg(obj.msg,{},function () {
                        if(obj.code != 20000){
                            $('.login').removeClass('test');
                            $('.authent').hide();
                        }else{
                            window.location.href = "<?php echo url('admin/Index/index'); ?>";
                        }
                    });
                });
            }, 'JSON');
        }, 1500);//使用字符串执行方法
    });
    $('input[type="text"],input[type="password"]').focus(function () {
        $(this).prev().animate({'opacity': '1'}, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({'opacity': '.5'}, 200);
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
            $(this).parent().animate({'left': '0'});
        });
    });
</script>
</body>
</html>