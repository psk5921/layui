<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Order\order.html";i:1577930044;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
<div style="overflow-x: hidden;width: 98%;margin: auto;padding-top: 1rem;">
    <blockquote class="layui-elem-quote layui-text">
        <div class="demoTable layui-form">
            <div class="layui-input-inline">
                <input type="text" name="dateTime" class="layui-input RangeDate" placeholder=" 年月日-年月日 ">
            </div>
            <div class="layui-input-inline">
                <input type="text" name="keyword" placeholder="订单号|队员姓名|手机号" class="layui-input">
            </div>
            <button class="layui-btn " data-type="reload"><i class="layui-icon">&#xe615;</i>搜索</button>
            <button class="layui-btn" data-type="is_excel"><i class="layui-icon">&#xe654;</i> 批量导出</button>

            <button class="layui-btn " data-type="return_url"><i class="layui-icon">&#xe65c;</i>返回</button>

            <!--<button class="layui-btn layui-btn-normal return_url" style="float: right;"><i class="layui-icon">&#xe603;</i> 返回</span></button>-->

        </div>
    </blockquote>

    <div class="layui-tab layui-tab-card" lay-filter="tab_demo" >
        <ul class="layui-tab-title"  >
            <li lay-id="" class="layui-this">全部订单</li>
            <li lay-id="10">未付款</li>
            <li lay-id="30">已付款</li>
            <li lay-id="40">已完成</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <table class="layui-table" lay-data="{height: '', url:'<?php echo (isset($url) && ($url !== '')?$url:''); ?>', page:true,limit:20, id:'testReload',loading:true,skin: 'row',even: true}" lay-filter="demo">
                    <thead>
                    <tr>
                        <th lay-data="{field:'order_number',width:160,align:'center'}">订单编号</th>
                        <th lay-data="{field:'route_info',minWidth:480,templet: '#order_status',templet: '#route_info',align:'center' }">路线信息</th>
                        <th lay-data="{field:'contact_info',minWidth:190,templet: '#contact_info',align:'center'}">联系人信息</th>
                        <th lay-data="{field:'travel_people',minWidth:80,align:'center'}">出行人数</th>
                        <th lay-data="{field:'original_total_price',minWidth:87,align:'center'}">订单原价</th>
                        <!--<th lay-data="{field:'preferential_total_price',width:100}">已优惠</th>-->
                        <th lay-data="{field:'pay_price',minWidth:87,align:'center'}">订单金额</th>
                        <th lay-data="{field:'order_state',minWidth:87,templet:'#order_state',align:'center'}">订单状态</th>
                        <!--<th lay-data="{field:'order_source',width:100, templet: '#order_source'}">来源</th>-->
                        <th lay-data="{field:'create_time',minWidth:170,align:'center'}">下单时间</th>
                        <th lay-data="{ align:'center', toolbar: '#barDemo'}">操作</th>
                    </tr>
                    </thead>
                </table>
                <script type="text/html" id="barDemo">
                    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="sel_detail">详情</a>
                </script>
                <script type="text/html" id="route_info">
                    {{d.route_name}}【{{d.edition_info}}】【{{d.start_date}}】【{{d.ranks_name}}】
                </script>
                <script type="text/html" id="contact_info">
                    {{d.contact_name}}：{{d.contact_phone}}
                </script>

                <script type="text/html" id="order_state">
                    {{#  if(d.order_state==3){ }}
                    <span style="color: #FF5722">已过期</span>
                    {{#  } else if( d.order_state ==10) { }}
                    <span style="color: #FFB800">未付款</span>
                    {{#  } else if( d.order_state ==20) { }}
                    <span style="color: #c2c2c2">已取消</span>
                    {{#  } else if( d.order_state ==30) { }}
                    <span style="color: #5FB878">已支付</span>
                    {{#  } else if( d.order_state ==31) { }}
                    <span style="color: #2F4056">已退款</span>
                    {{#  } else if( d.order_state ==40) { }}
                    <span style="color: #009688">已完成</span>
                    {{#  } }}
                </script>

                <script type="text/html" id="order_source">
                    {{#  if(d.order_source == 1){ }}
                    <span style="color: #5FB878">手机下单</span>
                    {{#  } else if( d.order_source ==2) { }}
                    <span style="color: #FF5722">电脑下单</span>
                    {{#  } else if( d.order_source ==0) { }}
                    <span style="color: #FF5722">其他下单</span>
                    {{#  } }}
                </script>

                <script type="text/html" id="regional_type">
                    {{#  if(d.regional_type == 1){ }}
                    <span style="color: #5FB878">国内订单</span>
                    {{#  } else if( d.regional_type ==2) { }}
                    <span style="color: #FF5722">国外订单</span>
                    {{#  } }}
                </script>

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
        layui.use(['table','form','laydate','element'], function(){
            var table = layui.table
                ,form = layui.form
                ,laydate = layui.laydate
                ,element = layui.element;

            //同时绑定多个时间
            lay('.RangeDate').each(function(){
                laydate.render({
                    elem: this
                    ,range: true
                    ,trigger: 'click'
                    ,range: ','
                });
            });

            //搜索提交
            var $ = layui.$, active = {
                reload: function(){
                    var dateTime = $('input[name="dateTime"]').val();
                    var keyword = $('input[name="keyword"]').val();
                    //执行重载
                    table.reload('testReload', {
                        where: {
                            dateTime:dateTime,
                            keyword:keyword
                        },page: {
                            curr: 1 //重新从第 1 页开始
                        }
                    });
                }
                ,is_excel: function(){
                    var dateTime = $('input[name="dateTime"]').val();
                    var keyword = $('input[name="keyword"]').val();
                    var travel_date_id = "<?php echo (isset($travel_date_id) && ($travel_date_id !== '')?$travel_date_id:''); ?>";

                    if(dateTime.length >=1){
                        dateTime = '&dateTime='+dateTime;
                    }
                    if(keyword.length >=1){
                        keyword = '&keyword='+keyword;
                    }
                    if(travel_date_id.length>=1){
                        travel_date_id = '&travel_date_id='+travel_date_id;
                    }
                    window.location.href='<?php echo url("Order/ApiGetOrderPage"); ?>?is_excel=1'+dateTime+keyword+travel_date_id;
                }
                ,return_url:function () {
                    window.location.href="<?php echo $return_url; ?>";
                }
            };
            element.on('tab(tab_demo)', function(elem){
                var order_state=$(this).attr('lay-id');
                var dateTime = $('input[name="dateTime"]').val();
                var keyword = $('input[name="keyword"]').val();
                table.reload('testReload', {
                    where: {
                        order_state:order_state,
                    },page: {
                        curr: 1 //重新从第 1 页开始
                    }
                });
            });

            $('.demoTable .layui-btn').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });

            //监听表格复选框选择
            table.on('checkbox(demo)', function(obj){
                console.log(obj)
            });

            //表格功能
            table.on('tool(demo)', function(obj){
                var data = obj.data;
                var event=obj.event;
                switch(event){
                    case 'sel_detail':
                        // window.location.href='<?php echo url("order/order_detail"); ?>?order_number='+data.order_number;
                        layer.open({
                            type: 2,
                            title: '订单信息管理',
                            shadeClose: true,
                            shade: false,
                            maxmin: true, //开启最大化最小化按钮
                            area: ['100%', '100%'],
                            content: '<?php echo url("order/order_detail"); ?>?order_number='+data.order_number,
                            end: function () {
                                table.reload('testReload');
                            },
                        });
                        break;
                }
            });
        });
    </script>
    </body>
    </html>
