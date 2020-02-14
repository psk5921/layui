<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\base_info\folder.html";i:1576813614;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1576813615;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
</style>
<div style="overflow-x: hidden;width: 96%;margin: auto;padding-top: 1rem;" class="cbp-spmenu-push">

    <blockquote class="layui-elem-quote layui-text">
        <div class="demoTable layui-form">
            <div class="layui-input-inline">
                <input type="text" name="folder_name" class="layui-input" placeholder=" 搜索分类名称">
            </div>
            <button class="layui-btn" data-type="reload"><i class="layui-icon">&#xe615;</i>搜索</button>
            <button class="layui-btn layui-btn-normal addInfo"><i class="layui-icon">&#xe654;</i>添加</button>
        </div>
    </blockquote>

        <table class="layui-table" lay-data="{height: 'full-200', url:'<?php echo (isset($url) && ($url !== '')?$url:''); ?>', page:true, id:'testReload',even: true,loading:true}" lay-filter="demo">
            <thead>
            <tr>
                <th lay-data="{field:'folder_name'}">分类名称</th>
                <th lay-data="{field:'create_time'}">创建时间</th>
                <th lay-data="{field:'update_time'}">修改时间</th>
                <th lay-data="{field:'state', templet: '#state',width:100}">状态</th>
                <th lay-data="{fixed: 'is_hot', width:160,fixed: 'right', align:'center', toolbar: '#barDemo'}">操作</th>
            </tr>
            </thead>
        </table>
        <script type="text/html" id="barDemo">
            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        </script>
        <script type="text/html" id="state">
            {{#  if(d.state == 1){ }}
            <span style="color: #5FB878">开放</span>
            {{#  } else if( d.state ==2) { }}
            <span style="color: #FF5722">关闭</span>
            {{#  } }}
        </script>

        <!--会员消息发送-->
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right message1">
            <blockquote class="layui-elem-quote layui-text">
                管理分类<i class="layui-icon right_move" style="float: right">&#xe602;</i>
            </blockquote>
            <div class="layui-form" style="padding: 0 .5rem">
                <input type="hidden" name="folder_id">
                <div class="layui-form-item">
                    <div class="layui-col-xs12">
                        <input type="text" name="folder_name" placeholder="请输入分类名称" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <div class="layui-col-xs12">
                        <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="submit1">立即提交</button>
                    </div>
                </div>

            </div>
        </nav>

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
        layui.use(['table','form','layer'], function(){
            var table = layui.table
                ,form = layui.form
                ,layer = layui.layer;
            //搜索提交
            var $ = layui.$, active = {
                reload: function(){
                    var folder_name = $('input[name="folder_name"]').val();
                    //执行重载
                    table.reload('testReload', {
                        where: {
                            folder_name:folder_name,
                        },page: {
                            curr: 1 //重新从第 1 页开始
                        }
                    });
                },
            };
            $('.demoTable .layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
            //表格功能
            table.on('tool(demo)', function(obj){
                var data = obj.data;
                var event=obj.event;
                switch(event){
                    case 'edit':
                        $('.message1').addClass('cbp-spmenu-open');
                        $('input[name="folder_id"]').val(data.folder_id);
                        $('input[name="folder_name"]').val(data.folder_name);
                        break;
                    case 'del':
                        layer.confirm('删除后无法恢复,确定删除么', function(index){
                            $.ajax({
                                url:'<?php echo url("BaseInfo/ApiDelFolder"); ?>?folder_id='+data.folder_id,
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
                }
            });

            form.on('submit(submit1)', function(data){
                $.post('<?php echo url("BaseInfo/ApiSaveFolder"); ?>',data.field,function (res) {
                    if(res.code==200){
                        parent.layer.msg(res.msg, {icon: 6,time: 1000});
                        $('.cbp-spmenu-right').removeClass('cbp-spmenu-open')
                    }else{
                        parent.layer.msg(res.msg, {icon: 5,time: 1000});
                    }
                    table.reload('testReload');
                },"json")
            });

            //添加信息 url跳转路径
            $('.addInfo').on('click', function() {
                $('.message1').addClass('cbp-spmenu-open');
                $('input[name="folder_id"]').val(data.folder_id);
            });
        });
    </script>
    </body>
    </html>