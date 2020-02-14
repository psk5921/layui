<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Coupon\coupon_save.html";i:1576813613;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
<div style="overflow-x: hidden;width: 96%;margin: auto;padding-top: 1rem;">

    <blockquote class="layui-elem-quote layui-text">
        温馨提醒：右上角可放大全屏编辑；
    </blockquote>

   <div class="layui-form layui-form-pane">

       <input type="hidden" name="coupon_id" value="<?php echo (isset($info['coupon_id']) && ($info['coupon_id'] !== '')?$info['coupon_id']:''); ?>">
       <div class="layui-form-item">
           <label class="layui-form-label">优惠类型</label>
           <div class="layui-input-inline">
               <select name="coupon_type">
                   <option value="1" <?php if(isset($info) && $info['coupon_type']==1): ?>selected<?php endif; ?>>普通优惠券</option>
               </select>
           </div>
       </div>
       <div class="layui-form-item">
           <label class="layui-form-label">优惠券名称</label>
           <div class="layui-input-block">
               <input type="text" value="<?php echo (isset($info['coupon_name']) && ($info['coupon_name'] !== '')?$info['coupon_name']:''); ?>" name="coupon_name" lay-verify="required"  class="layui-input">
           </div>
       </div>
       <div class="layui-form-item">
           <label class="layui-form-label">有效期天数</label>
           <div class="layui-input-inline">
               <input type="number" value="<?php echo (isset($info['use_day']) && ($info['use_day'] !== '')?$info['use_day']:''); ?>" name="use_day" lay-verify="required"  class="layui-input">
           </div>
           <label class="layui-form-label">优惠金额</label>
           <div class="layui-input-inline">
               <div class="layui-input-inline">
                   <input type="number" value="<?php echo (isset($info['price']) && ($info['price'] !== '')?$info['price']:''); ?>" name="price" lay-verify="required"  class="layui-input">
               </div>
           </div>
       </div>
       <div class="layui-form-item layui-form-text">
           <label class="layui-form-label">描述</label>
           <div class="layui-input-block">
               <textarea name="describe" placeholder="请输入内容" class="layui-textarea"><?php echo (isset($info['describe']) && ($info['describe'] !== '')?$info['describe']:''); ?></textarea>
           </div>
       </div>
       <div class="layui-form-item">
           <label class="layui-form-label">使用范围</label>
           <div class="layui-input-inline">
               <select name="use_range" lay-filter="use_range">
                   <option value="1" <?php if(isset($info) && $info['use_range']==1): ?>selected<?php endif; ?>>全部</option>
                   <option value="2" <?php if(isset($info) && $info['use_range']==2): ?>selected<?php endif; ?>>路线</option>
                   <option value="3" <?php if(isset($info) && $info['use_range']==3): ?>selected<?php endif; ?>>片区</option>
               </select>
           </div>
       </div>

       <!--路线选择-->
       <div class="layui-form-item route_list" <?php if(isset($info) && $info['use_range']==2): else: ?>hidden<?php endif; ?>>
           <table class="layui-table" lay-data="{height: 'full-200', url:'<?php echo url('Coupon/APiGetRouteCouponPage'); ?>?source_id=<?php echo (isset($info['source_id']) && ($info['source_id'] !== '')?$info['source_id']:''); ?>&source_table=<?php echo (isset($info['source_table']) && ($info['source_table'] !== '')?$info['source_table']:''); ?>', page:true,limit:100, id:'testReload_route',even: true,loading:true}" lay-filter="demo_route">
               <thead>
               <tr>
                   <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
                   <th lay-data="{field:'route_name'}">路线名称</th>
                   <th lay-data="{field:'route_type'}">路线类型</th>
                   <th lay-data="{field:'edition_id'}">路线版本</th>
                   <th lay-data="{field:'time_length',width:100}">时长(天)</th>
                   <th lay-data="{field:'standard_price',width:130}">标准价格</th>
               </tr>
               </thead>
           </table>
       </div>
       <!--片区选择-->
       <div class="layui-form-item region_list" <?php if(isset($info) && $info['use_range']==3): else: ?>hidden<?php endif; ?>>
           <table class="layui-table" lay-data="{height: 'full-200', url:'<?php echo url('Coupon/APiGetRegionCouponPage'); ?>?source_id=<?php echo (isset($info['source_id']) && ($info['source_id'] !== '')?$info['source_id']:''); ?>&source_table=<?php echo (isset($info['source_table']) && ($info['source_table'] !== '')?$info['source_table']:''); ?>', page:true, id:'testReload_region',even: true,loading:true}" lay-filter="demo_region">
               <thead>
               <tr>
                   <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
                   <th lay-data="{field:'province_name'}">所属省份</th>
                   <th lay-data="{field:'region_name'}">区域名称</th>
                   <th lay-data="{field:'region_name_en'}">英文名称</th>
                   <th lay-data="{field:'describe_title'}">介绍标题</th>
                   <th lay-data="{field:'order_list',width:100}">排序</th>
                   <th lay-data="{field:'create_time'}">创建时间</th>
               </tr>
               </thead>
           </table>
       </div>

       <div class="layui-form-item">
           <label class="layui-form-label">状态</label>
           <div class="layui-input-inline">
               <div class="layui-input-inline">
                   <select name="state" lay-verify="required">
                       <option value="1" <?php if(isset($info)): if($info['state']==1): ?>selected<?php endif; endif; ?>>开发</option>
                       <option value="2" <?php if(isset($info)): if($info['state']==0): ?>selected<?php endif; endif; ?>>关闭</option>
                   </select>
               </div>
           </div>
       </div>
       <div class="layui-form-item">
           <div class="layui-input-block">
               <button class="layui-btn" lay-submit lay-filter="submit">立即提交</button>
               <button type="button" class="layui-btn layui-btn-primary close">关闭</button>
           </div>
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

<!-- 配置文件 -->
<script type="text/javascript" src="/static/admin/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/static/admin/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script>
    var ue = UE.getEditor('container');
</script>

<script>
    layui.use(['form', 'layedit', 'laydate','element','table'], function(){

        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,element = layui.element
            ,table = layui.table
            ,laydate = layui.laydate;
        //同时绑定多个
        lay('.date').each(function(){
            laydate.render({
                elem: this
                ,trigger: 'click'
            });
        });

        //监听提交
        form.on('submit(submit)', function(data){
            var arr=data.field;
            if(arr.use_range==2){
                var checkStatus = table.checkStatus('testReload_route')
                    ,data_arr = checkStatus.data;
                var source_id=[];
                $.each(data_arr,function (k,v) {
                    source_id.push(v.route_id)
                })
                data.field['source_id']=source_id;
                data.field['source_table']='route';

            }else if(arr.use_range==3){
                var checkStatus = table.checkStatus('testReload_region')
                    ,data_arr = checkStatus.data;
                var source_id=[];
                $.each(data_arr,function (k,v) {
                    source_id.push(v.region_id)
                })
                data.field['source_id']=source_id;
                data.field['source_table']='region';
            }else{
                data.field['source_id']='';
                data.field['source_table']='';
            }
            $.post('<?php echo url("Coupon/ApiSaveCoupon"); ?>',data.field,function (res) {
                layer.msg(res.msg);
            },"json")
        });

        form.on('select(use_range)', function(data){
            console.log(data.elem); //得到select原始DOM对象
            console.log(data.value); //得到被选中的值
            console.log(data.othis); //得到美化后的DOM对象
            if(data.value==2){
                $('.route_list').show();
                $('.region_list').hide();
            }else if(data.value==3){
                $('.route_list').hide();
                $('.region_list').show();
            }
        });

        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })

    });


</script>

</body>
</html>