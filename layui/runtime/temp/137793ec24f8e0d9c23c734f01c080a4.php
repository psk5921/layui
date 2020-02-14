<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Index\index.html";i:1577764491;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo (isset($web_title) && ($web_title !== '')?$web_title:''); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/build/css/app.css" media="all">

    <!--页面菜单滑出特效-->
    <link rel="shortcut icon" href="/static/admin/left_move/favicon.ico">
    <!--<link rel="stylesheet" type="text/css" href="/static/admin/left_move/css/default.css" />-->
    <link rel="stylesheet" type="text/css" href="/static/admin/left_move/css/component.css" />
    <script src="/static/admin/left_move/js/modernizr.custom.js"></script>
</head>
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
    body{overflow-y: scroll;} /* 禁止刷新后出现横向滚动条 */
</style>
<body class="layui-layout-body kit-layout-admin" >
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo"><?php echo (isset($web_info['web_title']) && ($web_info['web_title'] !== '')?$web_info['web_title']:'Vowkin管理系统'); ?></div>

        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="http://viva-order-pc.vowkin.com" target="_blank">网站首页</a></li>
            <li class="layui-nav-item"><a href="http://viva2.vowkin.com/admin.php" target="_blank">OA系统</a></li>
        </ul>
        <ul class="layui-nav layui-layout-right" lay-filter="kitNavbar" kit-navbar>
           <!-- <li class="layui-nav-item clear_Cache" style="cursor:pointer;">
                清除缓存
                <i class="layui-icon layui-icon-refresh-1"></i>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"  data-url="<?php echo url('Order/order_pre'); ?>" data-icon="fa-user" data-title="未付款" data-id='101112'>未付款<span class="layui-badge delivery_number"><?php echo (isset($message['order_reserve']) && ($message['order_reserve'] !== '')?$message['order_reserve']:0); ?></span></a>
            </li>
            <li class="layui-nav-item">
            <li class="layui-nav-item">
                <a href="javascript:;"  data-url="<?php echo url('Order/order',['order_type'=>2]); ?>" data-icon="fa-user" data-title="已付款" data-id='101112'>已付款<span class="layui-badge delivery_number"><?php echo (isset($message['order_type']) && ($message['order_type'] !== '')?$message['order_type']:0); ?></span></a>
            </li>
            <li class="layui-nav-item" style="margin-right: 1.5rem">
                <a href="javascript:;"  data-url="<?php echo url('Order/order',['status'=>1]); ?>" data-icon="fa-user" data-title="退款订单" data-id='101113'>退款订单<span class="layui-badge sales_number"><?php echo (isset($message['order_sale']) && ($message['order_sale'] !== '')?$message['order_sale']:0); ?></span></a>
            </li>-->
            <li class="layui-nav-item" >
                <a href="javascript:;">
                    <img src='<?php echo (isset($adminInfo['hread_img']) && ($adminInfo['hread_img'] !== '')?$adminInfo['hread_img']:"http://t.cn/RCzsdCq"); ?>' class="layui-nav-img">
                    <?php echo (isset($adminInfo['login_number']) && ($adminInfo['login_number'] !== '')?$adminInfo['login_number']:"vowkin"); ?>
                </a>
                <dl class="layui-nav-child" >
                    <dd>
                        <a href="javascript:;"    data-url="<?php echo url('admin/adminInfo',['admin_id'=>$adminInfo['admin_id']]); ?>" data-icon="fa-user" data-title="个人资料" data-id='101111'><i class="layui-icon">&#xe6af;</i><span> 个人资料</span></a>
                    </dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="<?php echo url('Login/loginOut'); ?>">退出</a></li>
        </ul>

    </div>
    <!--导航-->
    <div class="layui-side layui-bg-black kit-side">
        <div class="layui-side-scroll">
            <div class="kit-side-fold"><i class="fa fa-navicon layui-icon" style="color: #009688;" aria-hidden="true">&#xe65f;</i></div>
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                <?php foreach($menuList as $menuInfo): ?>
                <li class="layui-nav-item">
                    <a class="parentMenu" href="javascript:;"><i class="fa fa-plug layui-icon" aria-hidden="true"><?php echo $menuInfo['icon']; ?></i><span style="padding-left: .4rem"><?php echo $menuInfo['menu_name']; ?></span></a>
                    <dl class="layui-nav-child">
                        <!--&#xe602;-->
                        <?php foreach($menuInfo['child'] as $menuChild): ?>
                        <dd>
                            <a  href="javascript:;" data-url="<?php echo url($menuChild['controller_name'].'/'.$menuChild['action_name']); ?>" data-icon="fa-user" data-title="<?php echo $menuChild['menu_name']; ?>" kit-target data-id='<?php echo $menuChild['menu_id']; ?>'><i class="layui-icon"><?php echo $menuChild['icon']; ?></i><span style="padding-left: .4rem" ><?php echo $menuChild['menu_name']; ?></span></a>
                        </dd>
                        <?php endforeach; ?>
                    </dl>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="layui-body" id="container">
        <!-- 内容主体区域 -->
        <!--<div>主体内容加载中,请稍等...</div>-->
        <div style="text-align: center"><i class="layui-icon layui-icon-loading layui-anim layui-anim-rotate layui-anim-loop" style="font-size: 30px; color: #1E9FFF;"></i>  数据加载中，请稍后...</div>
    </div>
    <div class="layui-footer">
        <div class="layui-row">
            <div class="layui-col-md6" style="text-align: left">
                2018 © Power by <a href="http://www.vowkin.com" target="_blank">Vowkin Solution</a>
            </div>
            <div class="layui-col-md6" style="text-align: right">
                <?php echo (isset($web_info['copy_right']) && ($web_info['copy_right'] !== '')?$web_info['copy_right']:'Ver 3.01'); ?>
            </div>

        </div>
    </div>
    <script src="/static/admin/layui/layui.js"></script>
<script src="/static/common/js/jquery.min.js"></script>
<script src="/static/admin/left_move/js/classie.js"></script>

<script>

    $('.return_url').click(function () {
        window.history.go(-1);
    })
    //移除弹框
    $('.right_move').on('click',function () {
        $('.cbp-spmenu-right').removeClass('cbp-spmenu-open');
    })
    //添加文件
    $('.add_file').click(function () {
        var node_id=$(this).data('id');
        layer.open({
            type: 2,
            title: '选择文件',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['100%', '100%'],
            content: '<?php echo url("BaseInfo/file_list"); ?>?node_id='+node_id,
        });
    })

    //查看放大文件
    $("body").delegate('.file_img','click',function () {
        var url=$(this).find('input').data('url');
        var type=$(this).data('type');
        if(type=='img'){
            layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                area: '60%',
                skin: 'layui-layer-nobg', //没有背景色
                shadeClose: true,
                content: '<img src="'+url+'" style="width: 100%;">'
            });
        }else if(type=='pdf'){
            window.open(url, '_blank');
        }else if(type=='audio' || type=='video'){
            layer.open({
                type: 2,
                title: false,
                area: ['630px', '360px'],
                shade: 0.8,
                closeBtn: 0,
                shadeClose: true,
                content: url
            });
        }
    })
    //去除文件
    $("body").delegate('.del_file','click',function () {
        $(this).parent().remove();
        return false;
    })

    //获取地址了信息
    function getRequest() {
        var url = window.location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for(var i = 0; i < strs.length; i ++) {
                theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]);
            }
        }
        return theRequest;
    }

    //显示放大图
    $("body").delegate('.show_img','click',function () {
        var url=$(this).attr('src');
        layer.open({
            type: 1,
            title: false,
            closeBtn: 0,
            area: '60%',
            skin: 'layui-layer-nobg', //没有背景色
            shadeClose: true,
            content: '<img src="'+url+'" width="100%"/>'
        });
    })
    //文件上传
    layui.use(['upload','table'], function(){
        var $ = layui.jquery
            ,upload = layui.upload
            ,table =  layui.table;
        //多文件列表示例
        var demoListView = $('#demoList')
            ,uploadListIns = upload.render({
            elem: '#testList'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,accept: 'file'
            ,multiple: true
            ,auto: false
            ,bindAction: '#testListAction'
            ,choose: function(obj){
                var files = obj.pushFile(); //将每次选择的文件追加到文件队列
                //读取本地文件
                obj.preview(function(index, file, result){
                    var tr = $(['<tr id="upload-'+ index +'">'
                        ,'<td>'+ file.name +'</td>'
                        ,'<td>'+ (file.size/1014).toFixed(1) +'kb</td>'
                        ,'<td>等待上传</td>'
                        ,'<td>'
                        ,'<button class="layui-btn layui-btn-mini demo-reload layui-hide">重传</button>'
                        ,'<button class="layui-btn layui-btn-mini layui-btn-danger demo-delete">删除</button>'
                        ,'</td>'
                        ,'</tr>'].join(''));

                    //单个重传
                    tr.find('.demo-reload').on('click', function(){
                        obj.upload(index, file);
                    });

                    //删除
                    tr.find('.demo-delete').on('click', function(){
                        delete files[index]; //删除对应的文件
                        tr.remove();
                    });

                    demoListView.append(tr);
                });
            }
            ,done: function(res, index, upload){
                if(res.code == 200){ //上传成功
                    var tr = demoListView.find('tr#upload-'+ index)
                        ,tds = tr.children();
                    tds.eq(2).html('<span style="color: #5FB878;">上传成功</span><input type="hidden" name="images['+index+']" value="'+res.data.src+'">');
                    tds.eq(3).html(''); //清空操作
                    delete files[index]; //删除文件队列已经上传成功的文件
                    return;
                }
                this.error(index, upload);
            }
            ,error: function(index, upload){
                var tr = demoListView.find('tr#upload-'+ index)
                    ,tds = tr.children();
                tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
            }
        });

        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#show_image').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 400){
                    return layer.msg('上传失败');
                }
                $('.value_image').val(res.data.src);
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image1'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#show_image1').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 400){
                    return layer.msg('上传失败');
                }
                $('.value_image1').val(res.data.src);
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText1');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image2'
            ,url: '<?php echo url("Upload/file_images"); ?>'
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    $('#show_image2').attr('src', result); //图片链接（base64）
                });
            }
            ,done: function(res){
                //如果上传失败
                if(res.code == 400){
                    return layer.msg('上传失败');
                }
                $('.value_image2').val(res.data.src);
                //上传成功
            }
            ,error: function(){
                //演示失败状态，并实现重传
                var demoText = $('#demoText2');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });

        //选完文件后不自动上传--商品信息导入
        upload.render({
            elem: '#test8'
            ,url: '<?php echo url("Product/productInfo_excel"); ?>'
            ,auto: false
            ,accept: 'file' //普通文件
            ,exts: 'xls' //只允许上传压缩文件
            ,bindAction: '#test9'
            ,done: function(res){
                layer.msg(res.msg, {icon: 6,time: 1000});
                layer.open({
                    type: 2,
                    title: '商品导入信息审查',
                    shadeClose: true,
                    shade: false,
                    maxmin: true, //开启最大化最小化按钮
                    area: ['100%', '100%'],
                    content: '<?php echo url("Product/productList_excel"); ?>',
                    end:function () {
                        table.reload('testReload');
                    }
                });
            }
        });
    });
</script>
<script>
    function playMusic() {
        var player = $("#player")[0]; /*jquery对象转换成js对象*/
        if (player.paused){ /*如果已经暂停*/
            player.play(); /*播放*/
        }else {
            player.pause();/*暂停*/
        }
    }




    $(function () {
        $('.layui-nav-item').on('click',function () {
            $(this).siblings().removeClass('layui-nav-itemed');
        })

        //刷新当前页
        setInterval(function () {
            $.get("<?php echo url('Base/checkLoginTime'); ?>",function (res) {
                if(res){
                    window.location.reload()
                }
            },"JSON")
        },5000)

    })
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;
    });
    var message;
    layui.config({
        base: '/static/admin/build/js/'
    }).use(['app'], function() {
        var app = layui.app,
            $ = layui.jquery,
            layer = layui.layer;
        //将message设置为全局以便子页面调用
        message = layui.message;
        //主入口
        app.set({
            url:'<?php echo url("Index/table"); ?>',
            type: 'iframe'
        }).init();
    });
    $('.clear_Cache').click(function () {
        $.ajax({
            url:'<?php echo url("Index/ApiClearCache"); ?>',
            type:'get',
            dataType:'json',
            success:function(val){
                if(val.code ==200){
                    location.reload();
                }
            }
    })

    });
</script>
</body>
</html>

