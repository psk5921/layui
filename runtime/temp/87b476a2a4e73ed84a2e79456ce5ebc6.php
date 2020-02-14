<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\User\user.html";i:1577772746;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
<div style="overflow-x: hidden;width: 96%;margin: auto;padding-top: 1rem;" class="cbp-spmenu-push">
    <blockquote class="layui-elem-quote layui-text">
        <div class="demoTable layui-form">
            <div class="layui-input-inline">
                <input type="text" name="keyword" placeholder="搜索名称|手机号|身份证" class="layui-input">
            </div>
            <div class="layui-input-inline">
                <select name="level_id">
                    <option value="">筛选等级</option>
                </select>
            </div>
            <button class="layui-btn" data-type="reload"><i class="layui-icon">&#xe615;</i>搜索</button>
            <button class="layui-btn" data-type="is_excel"><i class="layui-icon">&#xe654;</i> 批量导出</button>
        </div>

    </blockquote>


    <div class="demoTable layui-form" >
        <div class="layui-tab layui-tab-card" lay-filter="tab_demo">
            <ul class="layui-tab-title">
                <li lay-id="all" class="layui-this">全部会员</li>
                <li lay-id="server_user">服维会员</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <table class="layui-table" lay-data="{height: '', url:'<?php echo (isset($url) && ($url !== '')?$url:''); ?>', page:true, id:'testReload',skin: 'row',even: true,loading:true}" lay-filter="demo">
                        <thead>
                        <tr>
                            <th lay-data="{type:'checkbox', align:'center'}"></th>
                            <th lay-data="{field:'real_name',width:100, align:'center'}">真实名称</th>
                            <th lay-data="{field:'id_card',width:170, align:'center'}">身份证</th>
                            <th lay-data="{field:'travel_number',width:100, align:'center'}">旅行次数</th>
                            <th lay-data="{field:'server_number',width:100,templet: '#server_number', align:'center'}">服维次数</th>
                            <th lay-data="{field:'account_number',width:150, align:'center'}">账号</th>
                            <th lay-data="{field:'mobile',width:120, align:'center'}">电话</th>
                            <th lay-data="{field:'email',width:120, align:'center'}">邮箱</th>
                            <th lay-data="{field:'user_type',width:100,templet: '#user_type', align:'center'}">会员类型</th>
                            <th lay-data="{field:'level_name',width:100, align:'center'}">会员等级</th>
                            <th lay-data="{field:'label_name',width:100, align:'center'}">会员标签</th>
                            <th lay-data="{field:'header_img',width:130,templet: '#header_img', align:'center'}">头像</th>
                            <th lay-data="{field:'wechat_name',width:130, align:'center'}">微信名称</th>
                            <th lay-data="{field:'status', templet: '#status',width:100, align:'center'}">状态</th>
                            <th lay-data="{width:180, align:'center', toolbar: '#barDemo'}">操作</th>
                        </tr>
                        </thead>
                        <script type="text/html" id="barDemo">
                            <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="order">订单</a>
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="message">发消息</a>
                        </script>
                        <script type="text/html" id="status">
                            {{#  if(d.status == 1){ }}
                            <span style="color: #5FB878">开发</span>
                            {{#  } else if( d.status ==2) { }}
                            <span style="color: #FF5722">关闭</span>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="server_number">
                            {{d.server_number}}
                            {{#  if(d.server_number >0 ){ }}
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="user_server">查看</a>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="user_type">
                            {{#  if(d.user_type == 1){ }}
                            <span style="color: #5FB878">粉丝会员</span>
                            {{#  } else if( d.user_type ==2) { }}
                            <span style="color: #FF5722">注册会员</span>
                            {{#  } else if( d.user_type ==3) { }}
                            <span style="color: #FF5722">VIP会员</span>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="header_img">
                            <img src="{{d.header_img}}" alt="" style="width: 100px;" class="show_img">
                        </script>
                    </table>
                </div>
            </div>
        </div>


        <!--会员消息发送-->
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right user_message">
            <blockquote class="layui-elem-quote layui-text">
                会员发送消息<i class="layui-icon right_move" style="float: right">&#xe602;</i>
            </blockquote>
            <div class="layui-form" style="padding: 0 .5rem">
                <input type="hidden" name="user_id"  class="layui-input">
                <input type="text" name="title" placeholder="填写消息标题" class="layui-input">
                <br/>
                <textarea placeholder="请输入内容" name="content" class="layui-textarea"></textarea>
                <br/>
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="submit_message">立即提交</button>

                <blockquote class="layui-elem-quote layui-text" style="margin-top: .5rem">
                    会员消息记录
                </blockquote>
                <div class="message_list">

                </div>

            </div>
        </nav>

        <!--会员服务维护记录信息-->
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right user_server">
            <blockquote class="layui-elem-quote layui-text">
                会员发送消息<i class="layui-icon right_move" style="float: right">&#xe602;</i>
            </blockquote>
            <div class="layui-form" style="padding: 0 .5rem">
                <ul class="layui-timeline server_list">

                    <!--<li class="layui-timeline-item">-->
                        <!--<i class="layui-icon layui-timeline-axis"></i>-->
                        <!--<div class="layui-timeline-content layui-text">-->
                            <!--<h2 class="layui-timeline-title">2018年8月18日 17:44</h2>-->
                            <!--<h4 class="layui-timeline-title">管理员：陈伟</h4>-->
                            <!--<h4 class="layui-timeline-title">服维会员：陈伟</h4>-->
                            <!--<h4 class="layui-timeline-title">出团路线：陈伟</h4>-->
                            <!--<h4 class="layui-timeline-title">出团排期：陈伟</h4>-->
                            <!--<p>备注：-->
                                <!--layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。-->
                                <!--<br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。-->
                                <!--<br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>-->
                            <!--</p>-->
                        <!--</div>-->
                    <!--</li>-->

                </ul>
                <!--<button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">立即提交</button>-->
            </div>
        </nav>
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
        layui.use(['table','form','element','layer'], function(){
            var table = layui.table
                ,form = layui.form
                ,element = layui.element
                ,layer = layui.layer;
            //搜索提交
            var $ = layui.$, active = {
                reload: function(){
                    var level_id = $('select[name="level_id"] option:checked').val();
                    var keyword = $('input[name="keyword"]').val();
                    //执行重载
                    table.reload('testReload', {
                        where: {
                            keyword:keyword,
                            level_id:level_id,
                        },page: {
                            curr: 1 //重新从第 1 页开始
                        }
                    });
                },
                label_manage:function () {
                    layer.open({
                        type: 2,
                        title: '会员标签管理',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['100%', '100%'],
                        content: '<?php echo url("User/user_label"); ?>',
                        end: function () {
                            table.reload('testReload');
                        },
                    });
                },
                is_excel:function () {
                    var level_id = $('select[name="level_id"] option:checked').val();
                    var keyword = $('input[name="keyword"]').val();
                    layer.prompt({title: '请输入会员数量范围 1-2000的格式', formType: 0}, function(pass, index){
                        layer.close(index);
                        window.location.href='<?php echo url("User/apiGetUserExcel"); ?>?is_excel=1&level_id='+level_id+'&keyword='+keyword+'&page='+pass;
                    });

                }
            };
            //tab切换
            element.on('tab(tab_demo)', function(elem){
                var tab_id=$(this).attr('lay-id');
                var level_id = $('select[name="level_id"] option:checked').val();
                var keyword = $('input[name="keyword"]').val();
                table.reload('testReload', {
                    where: {
                        tab_id:tab_id,
                        keyword:keyword,
                        level_id:level_id,
                    },page: {
                        curr: 1 //重新从第 1 页开始
                    }
                });
            });
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
                        layer.open({
                            type: 2,
                            title: '信息更新',
                            shadeClose: true,
                            shade: false,
                            maxmin: true, //开启最大化最小化按钮
                            area: ['100%', '100%'],
                            content: '<?php echo url("User/user_save"); ?>?user_id='+data.user_id,
                            end: function () {
                                table.reload('testReload');
                            },
                        });
                        break;
                    case 'order':
                        window.location.href = '<?php echo url("order/order"); ?>?user_id='+data.user_id;
                        break;
                    case 'message':
                        $('.user_message').addClass('cbp-spmenu-open');
                        $('input[name="user_id"]').val(data.user_id);
                        $.get('<?php echo url("User/ApiGetUserMessagePage"); ?>',{user_id:data.user_id},function (res) {
                            var html='';
                            if(res.code==0){
                                var data=res.data;
                                $.each(data,function (k,v) {
                                    html+=' <li class="layui-timeline-item">\n' +
                                        '<i class="layui-icon layui-timeline-axis"></i>\n' +
                                        '<div class="layui-timeline-content layui-text">\n' +
                                        '<h2 class="layui-timeline-title">'+v.create_time+'</h2>\n' +
                                        '<h4 class="layui-timeline-title">会员名称：'+v.real_name+'</h4>\n' +
                                        '<h4 class="layui-timeline-title">来源备注：'+v.source_note+'</h4>\n' +
                                        '<h4 class="layui-timeline-title">标题：'+v.title+'</h4>\n' +
                                        '<p>内容：\n' +v.content+
                                        '</p>\n' +
                                        '</div>\n' +
                                        '</li>\n';
                                })
                                if(html.length==0){
                                    $('.message_list').html('<p style="text-align: center">暂无数据</p>');
                                }else{
                                    $('.message_list').html(html);
                                }
                            }
                        },"json")
                        break;
                    case 'user_server':
                        $('.user_server').addClass('cbp-spmenu-open');
                        $.get('<?php echo url("User/UserGetServerList"); ?>',{user_id:data.user_id},function (res) {
                            var html='';
                            if(res.code==0){
                                var data=res.data;
                                $.each(data,function (k,v) {
                                    html+=' <li class="layui-timeline-item">\n' +
                                        '<i class="layui-icon layui-timeline-axis"></i>\n' +
                                        '<div class="layui-timeline-content layui-text">\n' +
                                        '<h2 class="layui-timeline-title">'+v.create_time+'</h2>\n' +
                                        '<h4 class="layui-timeline-title">管理员：'+v.admin_name+'</h4>\n' +
                                        '<h4 class="layui-timeline-title">服维会员：'+v.real_name+'</h4>\n' +
                                        '<h4 class="layui-timeline-title">出团路线：'+v.route_name+'</h4>\n' +
                                        '<h4 class="layui-timeline-title">出团排期：'+v.travel_date_info+'</h4>\n' +
                                        '<p>备注：\n' +v.note+
                                        '</p>\n' +
                                        '</div>\n' +
                                        '</li>\n';
                                })
                                console.log(html);
                                $('.server_list').html(html);
                            }
                        },"json")
                        break;
                    case 'del':
                        layer.confirm('删除后无法恢复,确定删除么', function(index){
                            $.ajax({
                                url:'<?php echo url("Article/ApiArticleDel"); ?>?article_id='+data.article_id,
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



            form.on('submit(submit_message)', function(data){
                var checkStatus = table.checkStatus('testReload')
                    ,arr = checkStatus.data;
                if(arr.length==0){
                    layer.msg('请选择会员');
                    return false;
                }
                var user_arr=[];
                $.each(arr,function (k,v) {
                    user_arr.push(v.user_id)
                })
                data.field['user_arr']=user_arr;
                $.post("<?php echo url('User/apiSaveUserMessage'); ?>",data.field,function (res) {
                    layer.msg(res.msg);
                    if(res.code==200){
                        $('.cbp-spmenu-right').removeClass('cbp-spmenu-open');
                    }
                },"JSON")

            });


            //获取等级接口
            $.get('<?php echo url("BaseInfo/ApiGetLevelList"); ?>',function (res) {
                if(res.code==200){
                    var data=res.data;
                    var html='<option value="">选择会员等级</option>';
                    $.each(data,function (k,v) {
                        html+='<option value="'+v.base_id+'">'+v.value+'</option>';
                    })
                    $('select[name="level_id"]').html(html);
                    form.render('select'); //刷新select选择框渲染
                }
            },"JSON")


        });
    </script>
    </body>
    </html>