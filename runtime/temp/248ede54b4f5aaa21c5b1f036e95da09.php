<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\base_info\file_update.html";i:1576813614;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1576813615;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
<div style="overflow-x: hidden;width: 96%;margin: auto;padding-top: 1rem;">

    <blockquote class="layui-elem-quote layui-text">
        温馨提醒：右上角可放大全屏编辑；
    </blockquote>

    <div class="layui-form layui-form-pane">
        <input type="hidden" name="file_id" value="<?php echo (isset($info['file_id']) && ($info['file_id'] !== '')?$info['file_id']:''); ?>">
        <input type="hidden" name="file_type"  value="<?php echo (isset($info['file_type']) && ($info['file_type'] !== '')?$info['file_type']:''); ?>">

        <input type="hidden" name="size"  value="<?php echo (isset($info['size']) && ($info['size'] !== '')?$info['size']:''); ?>">
        <input type="hidden" name="file_format"  value="<?php echo (isset($info['file_format']) && ($info['file_format'] !== '')?$info['file_format']:''); ?>">
        <input type="hidden" name="file_name"  value="<?php echo (isset($info['file_name']) && ($info['file_name'] !== '')?$info['file_name']:''); ?>">

        <div class="layui-form-item">
            <label class="layui-form-label">文件格式</label>
            <div class="layui-input-inline">
                <input type="text" value="<?php echo showStatus((isset($info['file_type']) && ($info['file_type'] !== '')?$info['file_type']:''),'图片,音频,视频,PDF:1,2,3,4'); ?>" lay-verify="required"  class="layui-input" disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">文件分类</label>
            <div class="layui-input-inline">
                <select name="folder_id" lay-verify="required">
                    <option value="" >选择文件分类</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-block">
                <input type="text" name="describe" value="<?php echo (isset($info['describe']) && ($info['describe'] !== '')?$info['describe']:''); ?>" class="layui-input">
            </div>
        </div>

        <!--图片上传-->
        <?php if(isset($info) && $info['file_type']==1): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-upload">
                <button type="button" class="layui-btn" id="image_file">选择文件</button>
                <button type="button" class="layui-btn" id="img_up">开始上传</button>
                <div class="layui-upload-list" style="margin-left: 7rem">
                    <img class="layui-upload-img" src="<?php echo (isset($info['url']) && ($info['url'] !== '')?$info['url']:''); ?>" style="height: 100px;" id="show_image">
                    <input type="text" name="img_url" value="<?php echo (isset($info['url']) && ($info['url'] !== '')?$info['url']:''); ?>">
                    <p id="demoText"></p>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">跳转链接</label>
                <div class="layui-input-block">
                    <input type="text" name="link" value="<?php echo (isset($info['link']) && ($info['link'] !== '')?$info['link']:''); ?>" class="layui-input">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!--PDF文件上传-->
        <?php if(isset($info) && $info['file_type']==2): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">音频连接</label>
            <div class="layui-input-block">
                <input type="text" name="audio_url" value="<?php echo (isset($info['url']) && ($info['url'] !== '')?$info['url']:''); ?>" class="layui-input">
            </div>
        </div>
        <?php endif; ?>

        <!--PDF文件上传-->
        <?php if(isset($info) && $info['file_type']==3): ?>
        <div class="layui-form-item">
            <label class="layui-form-label">视频连接</label>
            <div class="layui-input-block">
                <input type="text" name="video_url" value="<?php echo (isset($info['url']) && ($info['url'] !== '')?$info['url']:''); ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-upload">
            <label class="layui-form-label">手机封面</label>

            <button type="button" class="layui-btn" id="image1">选择文件</button>
            <div class="layui-upload-list" style="margin-left: 7rem">
                <img class="layui-upload-img" id="show_image1" src="<?php echo (isset($info['cover']) && ($info['cover'] !== '')?$info['cover']:''); ?>" style="height: 100px;">
                <input type="hidden" class="value_image1" name="cover">
                <p id="demoText1"></p>
            </div>
        </div>
        <div class="layui-upload">
            <label class="layui-form-label">PC封面</label>

            <button type="button" class="layui-btn" id="image2">选择文件</button>
            <div class="layui-upload-list" style="margin-left: 7rem">
                <img class="layui-upload-img" id="show_image2" src="<?php echo (isset($info['cover_pc']) && ($info['cover_pc'] !== '')?$info['cover_pc']:''); ?>" style="height: 100px;">
                <input type="hidden" class="value_image2" name="cover_pc">
                <p id="demoText2"></p>
            </div>
        </div>
        <?php endif; ?>

        <!--PDF文件上传-->
        <?php if(isset($info) && $info['file_type']==4): ?>
        <div class="layui-upload">
            <button type="button" class="layui-btn layui-btn-normal" id="sel_file">选择文件</button>
            <button type="button" class="layui-btn" id="start_up">开始上传</button>
        </div>
        <?php endif; ?>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-inline">
                <select name="state" lay-verify="required">
                    <option value="1" <?php if(isset($info)): if($info['state']==1): ?>selected<?php endif; endif; ?>>开放</option>
                    <option value="0" <?php if(isset($info)): if($info['state']==2): ?>selected<?php endif; endif; ?>>关闭</option>
                </select>
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
<script>
    layui.use(['form','upload'], function(){

        var form = layui.form
            ,upload = layui.upload
            ,layer = layui.layer;

        //监听提交
        form.on('submit(submit)', function(data){
            $.post('<?php echo url("BaseInfo/ApiSaveFileInfo"); ?>',data.field,function (res) {
                if(res.code==200){
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index); //再执行关闭
                }else{
                    parent.layer.msg(res.msg, {icon: 5,time: 1000});
                }
            },"json")
        });

        //获取父级属性
        $.get('<?php echo url("BaseInfo/ApiGetBasePage"); ?>',{limit:100,parent_id:0},function (res) {
            var parent_id=$('input[name="parent_id"]').val();
            if(res.code==0){
                var data =res.data;
                var html="";
                $.each(data,function(i,v){
                    if(parent_id==v.base_id){
                        html+='<option value="'+v.base_id+'" data-code="'+v.code+'" selected>'+v.name+'</option>';
                    }else{
                        html+='<option value="'+v.base_id+'" data-code="'+v.code+'">'+v.name+'</option>';
                    }
                });
                $('select[name="parent_id"]').html("<option value=''>选择所属属性</option>"+html);
                form.render('select');
            }
        },'JSON')

        //选完文件后不自动上传--商品信息导入
        upload.render({
            elem: '#sel_file'
            ,url: '<?php echo url("Upload/upload_file"); ?>'
            ,auto: false
            ,accept: 'file' //普通文件
            ,exts: 'pdf' //只允许上传压缩文件
            ,bindAction: '#start_up'
            ,done: function(res){
                var data=res.data;
                console.log(data);
                console.log(data.file_info);
                console.log(data.file_info.size);
                layer.msg(res.msg, {icon: 6,time: 1000});
                $('input[name="url"]').val(data.src);
                $('.size').text(data.file_info.size);
                $('.file_name').text(data.file_info.name);
                $('.file_format').text(data.file_info.file_type);
                $('.state').text('成功');

                $('input[name="size"]').val(data.file_info.size);
                $('input[name="file_name"]').val(data.file_info.name);
                $('input[name="file_format"]').val(data.file_info.file_type);
            }
        });

        //普通图片上传 单图片上传
        var uploadInst = upload.render({
            elem: '#image_file'
            ,url: '<?php echo url("Upload/upload_file"); ?>'
            ,auto: false
            ,bindAction: '#img_up'
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
                var data=res.data;
                $('input[name="url"]').val(data.src);
                $('.size').text(data.file_info.size);
                $('.file_name').text(data.file_info.name);
                $('.file_format').text(data.file_info.file_type);
                $('.state').text('成功');

                $('input[name="size"]').val(data.file_info.size);
                $('input[name="file_name"]').val(data.file_info.name);
                $('input[name="file_format"]').val(data.file_info.file_type);
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

        //获取文件分类
        $.get('<?php echo url("BaseInfo/ApiGetFolderPage"); ?>',{limit:100},function (res) {
            if(res.code==0){
                var data =res.data;
                var html="";
                var folder_id="<?php echo $info['folder_id']; ?>";
                console.log(folder_id);
                $.each(data,function(i,v){
                    if(v.folder_id==folder_id){
                        html+='<option value="'+v.folder_id+'" data-code="'+v.code+'" selected>'+v.folder_name+'</option>';
                    }else {
                        html+='<option value="'+v.folder_id+'" data-code="'+v.code+'">'+v.folder_name+'</option>';
                    }
                });
                $('select[name="folder_id"]').html("<option value=''>选择文件分类</option>"+html);
                form.render('select');
            }
        },'JSON')

        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })
    });
</script>

</body>
</html>