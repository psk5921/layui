<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"F:\phpstudy_pro\WWW\layui\public/../application/index\view\index\index.html";i:1576813612;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>你好呀111</title>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" ></script>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" ></script>
    <input type="hidden" value="<?php echo (isset($share['title']) && ($share['title'] !== '')?$share['title']:'创优先锋，银行党建'); ?>" name="share_title">
    <input type="hidden" value="<?php echo (isset($share['desc']) && ($share['desc'] !== '')?$share['desc']:'欢迎关注创优先锋，我们竭诚为您服务'); ?>" name="share_desc">
    <input type="hidden" value="<?php echo (isset($share['link']) && ($share['link'] !== '')?$share['link']:''); ?>" name="share_link">
    <script>
//        $.post("http://travel-admin.vowkin.com/v1/getWeChatJs",<?php echo url("","",true,false);?>,function (res) {
//            data(res.data);
//        },"JSON")
        $.ajax({
            type: "POST",
            url: 'http://travel-admin.vowkin.com/v1/getWeChatJs',
            contentType: "application/json", //必须有
            dataType: "json", //表示返回值类型，不必须
            data: JSON.stringify({
                url:'http://travel-admin.vowkin.com/'
            }),  //相当于 //data: "{'str1':'foovalue', 'str2':'barvalue'}",
            success: function (res) {
                data(res.data);
            }
        })
        function data(res) {
//            var share_title=$('input[name="share_title"]').val();
//            var share_desc=$('input[name="share_desc"]').val();
//            var share_link=$('input[name="share_link"]').val();
            var share_title=res.title;
            var share_desc=res.desc;
            var share_link='';
            wx.config({
                debug: true,
                appId: res.appId, // 必填,公众号的唯一标识
                timestamp:res.timestamp, // 必填,生成签名的时间戳
                nonceStr: res.nonceStr, // 必填,生成签名的随机串
                signature: res.signature,// 必填,签名,见附录1
                jsApiList: ['onMenuShareAppMessage','onMenuShareTimeline'] // 必填,需要使用的JS接口列表,所有JS接口列表见附录2
            });

                    wx.ready(function(){
                    wx.onMenuShareAppMessage({
                    title: share_title, // 分享标题
                    desc: share_desc, // 分享描述
                    link: share_link, // 分享链接,该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                    imgUrl: res.imgUrl, // 分享图标
                    type: 'link', // 分享类型,music,video或link,不填默认为link
                    dataUrl: '', // 如果type是music或video,则要提供数据链接,默认为空
                    success: function (errMsg) {
                        // 用户确认分享后执行的回调函数
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                    }
                });
                wx.onMenuShareTimeline({
                    title: share_title, // 分享标题
                    desc: share_desc, // 分享描述
                    link: share_link, // 分享链接,该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                    imgUrl: res.imgUrl, // 分享图标
                    success: function () {
                        // 用户确认分享后执行的回调函数
                    },
                    cancel: function () {
                        // 用户取消分享后执行的回调函数
                    }
                });
            });
        }


    </script>
</head>
<body>
    你好
</body>
</html>
