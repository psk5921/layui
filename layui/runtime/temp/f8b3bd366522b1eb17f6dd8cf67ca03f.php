<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\Dashboard\index.html";i:1580726176;s:77:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\common\footer.html";i:1580726175;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.4</title>

    <link href="/static/admin/cmsStyle/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/admin/cmsStyle/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/static/admin/cmsStyle/css/animate.css" rel="stylesheet">
    <link href="/static/admin/cmsStyle/css/style.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="/static/admin/cmsStyle/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/static/admin/cmsStyle/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css">

    <script>
        var start = new Date().getTime();
    </script>
</head>

<body class="top-navigation">
<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        </div>
        <div style="padding-top: 10px;">

            <div class="row">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/Order/order'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-bookmark"></i> 下单总量：</h5><h4 class="no-margins"><?php echo (isset($order['total']) && ($order['total'] !== '')?$order['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order['month']) && ($order['month'] !== '')?$order['month']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本月下单量</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order['day']) && ($order['day'] !== '')?$order['day']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>今日下单量</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/User/user'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-users"></i> 会员总量：</h5><h4 class="no-margins"><?php echo (isset($user['total']) && ($user['total'] !== '')?$user['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($user['day']) && ($user['day'] !== '')?$user['day']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>今日新增</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($user['month']) && ($user['month'] !== '')?$user['month']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本月新增</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/Order/order_refund'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-jpy"></i> 营业总额：</h5><h4 class="no-margins"><?php echo (isset($order_sales['total']) && ($order_sales['total'] !== '')?$order_sales['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_sales['cn']) && ($order_sales['cn'] !== '')?$order_sales['cn']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本月营业额</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_sales['en']) && ($order_sales['en'] !== '')?$order_sales['en']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本周营业额</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                </div>
            </div>
            <blockquote class="layui-elem-quote" style="background: #fff"><h2>今天，共有 <span style="color: #5FB878"><?php echo (isset($travel['total']) && ($travel['total'] !== '')?$travel['total']:0); ?></span> 名旅行家和我们一起在路上。</h2></blockquote>

            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            路线订单报名统计
                            <div class="layui-input-inline">
                                <input type="text" name="date_range" class="layui-input" id="test6" placeholder="点击按照时间区间筛选">
                            </div>
                            <div class="layui-input-inline">
                                <button class="layui-btn search_number">搜索</button>
                                <button class="layui-btn excel">导出</button>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <table class="layui-table" lay-data="{height: '',url:'<?php echo url('Dashboard/getRouteOrderNumber'); ?>', id:'testReload1',even: true,loading:true}" lay-filter="demo1">
                                <thead>
                                <tr>
                                    <th lay-data="{field:'area_name',align:'center',width:80}">片区</th>
                                    <th lay-data="{field:'route_name',align:'center'}">路线名称</th>
                                    <th lay-data="{field:'order_number',width:120,align:'center'}">成单量</th>
                                    <th lay-data="{field:'user_number',width:120,align:'center'}">报名人数</th>
                                    <th lay-data="{field:'free_number',width:120,align:'center'}">空余人数</th>
                                    <th lay-data="{field:'order_week_number',width:140,align:'center'}">周增长单数</th>
                                    <th lay-data="{field:'user_week_number',width:140,align:'center'}">周增长人数</th>
                                </tr>
                                </thead>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script src="/static/common/js/jquery.min.js"></script>
<script src="/static/admin/layui/layui.js"></script>
<script src="/static/common/js/jquery.min.js"></script>
<script src="/static/admin/left_move/js/classie.js"></script>

<script>
    function _init() {
        var end = new Date().getTime();
        var ox = end - start;
        $({property: 0}).stop().animate({property: 100}, {
            duration: ox,
            progress: function () {
                var percentage = Math.round(this.property);
                $('#progress').css('width', percentage + "%")
                if (percentage == 100) {
                    $("#progress").addClass("done");//完成，隐藏进度条
                }
            }
        });
    }
    function topForProcess() {
        var end = new Date().getTime();
        var ox = (end - start) < 500 ? (end - start) + 400 : (end - start);
        $(window.parent.document).find('#progress').removeClass("done");;
        $(window.parent.document).find('#progress').attr('style','');
        $(window.parent.document).find('#progress').animate({
            width: "100%",
        }, ox ,function () {
            $(window.parent.document).find('#progress').addClass("done");//完成，隐藏进度条
        });
    }
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
    topForProcess();
    layui.use(['table','layer','laydate'], function() {
        var table = layui.table
            , laydate = layui.laydate
            , layer = layui.layer;
        //日期范围
        laydate.render({
            elem: '#test6'
            ,range: ','
        });

        $('.search_number').click(function () {
            var date_range = $('input[name="date_range"]').val();
            table.reload('testReload1', {
                where: {
                    date_range:date_range,
                }
            });
        })

        $('.excel').click(function () {
            var date_range = $('input[name="date_range"]').val();
            window.location.href = '<?php echo url("Dashboard/getRouteOrderNumber"); ?>?is_excel=1&date_range='+date_range;
        })
    })
</script>
</body>
</html>
