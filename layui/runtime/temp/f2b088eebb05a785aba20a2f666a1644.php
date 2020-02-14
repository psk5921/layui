<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\Route\route.html";i:1580725934;s:75:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\common\head.html";i:1580725934;s:77:"F:\phpstudy_pro\WWW\layui\public/../application/admin\view\common\footer.html";i:1580722672;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo (isset($web_title) && ($web_title !== '')?$web_title:''); ?></title>
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
    body{overflow-y: scroll;} /* 禁止刷新后出现横向滚动条 */
</style>
<div style="overflow-x: hidden;width: 98%;margin: auto;padding-top: 1rem;" class="cbp-spmenu-push">
    <blockquote class="layui-elem-quote layui-text">
        <div class="demoTable layui-form">
            <div class="layui-input-inline">
                <input type="text" name="route_name" placeholder="搜索路线名称" class="layui-input">
            </div>
            <button class="layui-btn" data-type="reload"><i class="layui-icon">&#xe615;</i>搜索</button>
            <button class="layui-btn layui-btn-normal addInfo"><i class="layui-icon">&#xe654;</i>添加</button>
        </div>
    </blockquote>


    <div class="demoTable layui-form" >
        <div class="layui-tab layui-tab-card" lay-filter="tab_demo" >
            <ul class="layui-tab-title area_list">
                <li lay-id="" class="layui-this">全部路线</li>

            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-data="{height: '', url:'<?php echo (isset($url) && ($url !== '')?$url:''); ?>', page:true, limit:10,id:'testReload',even: true,loading:true}" lay-filter="demo">
                        <thead>
                        <tr>
                            <th lay-data="{field:'route_name',minWidth :160,align:'center'}">路线名称</th>
                            <th lay-data="{field:'edition_info',width:120,align:'center'}">路线版本</th>
                            <th lay-data="{field:'standard_price',width:100,align:'center'}">标准价格</th>
                            <th lay-data="{field:'state', templet: '#state',width:100,align:'center'}">状态</th>
                            <th lay-data="{field:'route_class',width:100,align:'center'}">路线分级</th>
                            <th lay-data="{field:'time_length',width:100,templet: '#regional_type',align:'center'}">时长(天)</th>
                            <th lay-data="{field:'age_info',width:110,align:'center'}">年龄限制</th>
                            <th lay-data="{field:'order_list',width:80,align:'center'}">排序</th>
                            <th lay-data="{width:280,align:'center', toolbar: '#barDemo'}">操作</th>
                        </tr>
                        </thead>
                    </table>
                    <script type="text/html" id="state">
                        {{#  if(d.state == 1){ }}
                        <span style="color: #5FB878">进行中</span>
                        {{#  } else if( d.state ==2) { }}
                        <span style="color: #FF5722">已关闭</span>
                        {{#  } }}
                    </script>
                    <script type="text/html" id="barDemo">
                        <a class="layui-btn layui-btn-xs" lay-event="copy">复制</a>
                        <a class="layui-btn layui-btn-xs" lay-event="edit">产品管理</a>
                        <a class="layui-btn  layui-btn-xs" lay-event="operate">运营管理</a>
                        <a class="layui-btn  layui-btn-danger  layui-btn-xs" lay-event="del">删除</a>
                    </script>
                </div>
            </div>
        </div>


    </div>
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
    function _init1() {
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
        _init1();
        layui.use(['table','form','element','layer'], function(){
            var table = layui.table
                ,form = layui.form
                ,element = layui.element
                ,layer = layui.layer;
            //搜索提交
            var $ = layui.$, active = {
                reload: function(){
                    var route_name = $('input[name="route_name"]').val();
                    //执行重载
                    table.reload('testReload', {
                        where: {
                            route_name:route_name,
                        },page: {
                            curr: 1 //重新从第 1 页开始
                        }
                    });
                },
                is_excel: function(){
                    var route_name = $('input[name="route_name"]').val();
                    var arr_value='route_name='+route_name+'&is_excel';
                    window.location.href='<?php echo url("User/apiGetUserPage"); ?>?'+arr_value;
                }
            };
            $('.demoTable .layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

            //路线片区和国家切换
            element.on('tab(tab_demo)', function(elem){
                var area_id=$(this).attr('lay-id');
                var route_name = $('select[name="route_name"] option:checked').val();
                table.reload('testReload', {
                    where: {
                        route_name:route_name,
                        area_id:area_id,
                    },page: {
                        curr: 1 //重新从第 1 页开始
                    }
                });
            });

            //表格功能
            table.on('tool(demo)', function(obj){
                var data = obj.data;
                var event=obj.event;
                console.log(data)
                var title = '<font color="red">'+data.route_name + '【'+ data.edition_info + '】 </font>';
                switch(event){
                    case 'edit':
                        layer.open({
                            type: 2,
                            title: '信息更新 '+ title,
                            shadeClose: true,
                            shade: false,
                            maxmin: true, //开启最大化最小化按钮
                            area: ['100%', '100%'],
                            content: '<?php echo url("Route/route_save"); ?>?route_id='+data.route_id,
                            end: function () {
                                table.reload('testReload');
                            },
                        });
                        break;
                    case 'operate':
                        layer.open({
                            type: 2,
                            title: '运营管理 '+ title,
                            shadeClose: true,
                            shade: false,
                            maxmin: true, //开启最大化最小化按钮
                            area: ['100%', '100%'],
                            content: '<?php echo url("Route/route_operate"); ?>?route_id='+data.route_id,
                            end: function () {
                                table.reload('testReload');
                            },
                        });
                        break;
                    case 'message':
                        $('.user_message').addClass('cbp-spmenu-open');
                        $('input[name="user_no"]').val(data.user_no);
                        table.reload('testReload1', {
                            where: {
                                user_no:data.user_no,
                            },page: {
                                curr: 1 //重新从第 1 页开始
                            }
                        });
                        break;
                    case 'integral':
                        $('.user_integral').addClass('cbp-spmenu-open');
                        $('input[name="user_no"]').val(data.user_no);
                        table.reload('testReload2', {
                            where: {
                                user_no:data.user_no,
                            },page: {
                                curr: 1 //重新从第 1 页开始
                            }
                        });
                        break;
                    case 'del':
                        layer.confirm('删除后无法恢复,确定删除么', function(index){
                            $.ajax({
                                url:'<?php echo url("Route/apiDelRoute"); ?>?route_id='+data.route_id,
                                type:'get',
                                dataType:'json',
                                success:function(val){
                                    if(val.code ==200){
                                        obj.del();
                                        layer.close(index);
                                    }
                                    if(val.code==400){
                                        layer.msg(val.msg);
                                    }
                                }
                            });
                        });
                        break;
                    case 'business_image':
                        layer.open({
                            type: 1,
                            title: false,
                            closeBtn: 0,
                            area: ['80%','80%'],
                            skin: 'layui-layer-nobg', //没有背景色
                            shadeClose: true,
                            content: '<img  src="'+data.business_image+'" />',
                        });
                        break;
                    case 'head_img':
                        layer.open({
                            type: 1,
                            title: false,
                            closeBtn: 0,
                            area: ['80%','80%'],
                            skin: 'layui-layer-nobg', //没有背景色
                            shadeClose: true,
                            content: '<img  src="'+data.head_img+'" />',
                        });
                        break;
                    case 'sel_user':
                        $.get('<?php echo url("User/ApiGetUserListPage"); ?>',{limit:1000,superior_no:data.user_no},function (res) {
                            var userList=res.data;
                            if(res.count==0){
                                layer.msg('没有关联的会员信息');
                                return false;
                            }
                            if(res.code==0){
                                var html='<div style="background: #fff;width: 100%;height: 100%;text-align: center;padding-top: 2rem">';
                                $.each(userList,function (index,v) {
                                    html+='<p style="line-height: 2rem;">会员名称：'+v.real_name+'，会员电话：'+v.mobile+'</p>';
                                })
                                html+='</div>';
                                layer.open({
                                    type: 1,
                                    title: false,
                                    closeBtn: 0,
                                    area: ['50%','50%'],
                                    skin: 'layui-layer-nobg', //没有背景色
                                    shadeClose: true,
                                    content: html,
                                });
                            }

                        },"JSON");
                        break;

                    case 'copy':
                        layer.confirm('确认需要复制路线信息吗？', function(index) {
                            layer.open({
                                type: 2,
                                title: '数据复制',
                                shadeClose: true,
                                shade: false,
                                maxmin: true, //开启最大化最小化按钮
                                area: ['100%', '100%'],
                                content: '<?php echo url("Route/route_save"); ?>?route_id=' + data.route_id + '&copy=1',
                                end: function () {
                                    table.reload('testReload');
                                },
                            });
                        })
                        break;
                }
            });

            var route_type="<?php echo $route_type; ?>";
            if(route_type==1){
                //获取片区列表
                $.get('<?php echo url("Route/ApiGetCountryPage"); ?>',{limit:100},function (res) {
                    if(res.code==0){
                        var data=res.data;
                        var html='<li lay-id="" class="layui-this">全部国家</li>';
                        $.each(data,function (k,v) {
                            html+='<li lay-id="'+v.international_id+'">'+v.name+'</li>';
                        })
                        $('.area_list').html(html);
                    }
                },'JSON')
            }else{
                //获取片区列表
                $.get('<?php echo url("Route/ApiGetAreaPage"); ?>',{limit:100},function (res) {
                    if(res.code==0){
                        var data=res.data;
                        var html='<li lay-id="" class="layui-this">全部路线</li>';
                        $.each(data,function (k,v) {
                            html+='<li lay-id="'+v.area_id+'">'+v.area_name+'</li>';
                        })
                        $('.area_list').html(html);
                    }
                },'JSON')
            }

            //添加信息 url跳转路径
            $('.addInfo').on('click', function() {
                if(route_type==1){
                    var url='<?php echo url("Route/route_save"); ?>?route_type=1';
                }else {
                    var url='<?php echo url("Route/route_save"); ?>?route_type=2';
                }
                layer.open({
                    type: 2,
                    title: '添加信息',
                    shadeClose: true,
                    shade: false,
                    maxmin: true, //开启最大化最小化按钮
                    area: ['100%', '100%'],
                    content: url,
                    end: function () {
                        table.reload('testReload');
                    },
                });
            });

            $('.right_move').on('click',function () {
                $('.cbp-spmenu-right').removeClass('cbp-spmenu-open')
            })
        });
    </script>
    </body>
    </html>