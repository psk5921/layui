<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Route\region_save.html";i:1576813616;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
    <div class="layui-form layui-form-pane" lay-filter="example">

        <input type="hidden" name="region_id" value="<?php echo (isset($info['region_id']) && ($info['region_id'] !== '')?$info['region_id']:''); ?>">
        <input type="hidden" name="province_code" value="<?php echo (isset($info['province_code']) && ($info['province_code'] !== '')?$info['province_code']:''); ?>">

        <div class="layui-form-item">
            <label class="layui-form-label">区域名称</label>
            <div class="layui-input-inline">
                <input type="text" name="region_name" value="<?php echo (isset($info['region_name']) && ($info['region_name'] !== '')?$info['region_name']:''); ?>" class="layui-input">
            </div>
            <label class="layui-form-label">英文名称</label>
            <div class="layui-input-inline">
                <input type="text" name="region_name_en" value="<?php echo (isset($info['region_name_en']) && ($info['region_name_en'] !== '')?$info['region_name_en']:''); ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所属省份</label>
            <div class="layui-input-block province_list">
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-inline">
                <input type="text" name="order_list" value="<?php echo (isset($info['order_list']) && ($info['order_list'] !== '')?$info['order_list']:''); ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-inline">
                <select name="state">
                    <option value="1" <?php if(isset($info) && $info['state']==1): ?>selected<?php endif; ?>>开放</option>
                    <option value="0" <?php if(isset($info) && $info['state']==0): ?>selected<?php endif; ?>>关闭</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">介绍标题</label>
            <div class="layui-input-block">
                <input type="text" name="describe_title" value="<?php echo (isset($info['describe_title']) && ($info['describe_title'] !== '')?$info['describe_title']:''); ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">介绍内容</label>
            <div class="layui-input-block">
                <textarea id="container" placeholder="请输入内容" name="describe_content" class="layui-textarea"><?php echo (isset($info['describe_content']) && ($info['describe_content'] !== '')?$info['describe_content']:''); ?></textarea>
            </div>
        </div>

        <blockquote class="layui-elem-quote layui-text">
            请注意，上传图片和视频的尺寸。上传相同的文件将被去重
        </blockquote>
        <div class="layui-form-item">
            <p style="color: red">*请上传1600x500px的图片，只能上传一张</p>
            <label class="layui-form-label">PC顶部横图</label>
            <div class="layui-input-block">
                <div id="pc_banner">
                    <?php if(isset($info) && !empty($info['pc_banner'])): foreach($info['pc_banner'] as $item): ?>
                    <div class="file_img" data-type="img">
                        <i class="layui-icon del_file">&#x1007;</i>
                        <img src="<?php echo $item['domain_name']; ?><?php echo $item['url']; ?>">
                        <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="pc_banner[<?php echo $item['file_id']; ?>]"/>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
                <button class="layui-btn add_file" data-id="pc_banner">选择图片</button>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机顶部图</label>
            <div class="layui-input-block">
                <div id="mobile_bg_img">
                    <?php if(isset($info) && !empty($info['mobile_bg_img'])): foreach($info['mobile_bg_img'] as $item): ?>
                    <div class="file_img" data-type="img">
                        <i class="layui-icon del_file">&#x1007;</i>
                        <img src="<?php echo $item['url']; ?>">
                        <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="mobile_bg_img[<?php echo $item['file_id']; ?>]"/>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
                <button class="layui-btn add_file" data-id="mobile_bg_img">选择图片</button>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片展示</label>
            <div class="layui-input-block">
                <div id="region_img">
                    <?php if(isset($info) && !empty($info['region_img'])): foreach($info['region_img'] as $item): ?>
                    <div class="file_img" data-type="img">
                        <i class="layui-icon del_file">&#x1007;</i>
                        <img src="<?php echo $item['url']; ?>">
                        <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="region_img[<?php echo $item['file_id']; ?>]"/>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
                <button class="layui-btn add_file" data-id="region_img">选择图片</button>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">视频展示</label>
            <div class="layui-input-block">
                <div id="region_video">
                    <?php if(isset($info) && !empty($info['region_video'])): foreach($info['region_video'] as $item): ?>
                    <div class="file_img" data-type="video">
                        <i class="layui-icon del_file">&#x1007;</i>
                        <i class="layui-icon icon_video">&#xe652;</i>
                        <span><?php echo $item['file_name']; ?></span>
                        <input type="hidden" value="<?php echo $item['file_id']; ?>" data-url="<?php echo $item['url']; ?>" name="region_video[<?php echo $item['file_id']; ?>]"/>
                    </div>
                    <?php endforeach; endif; ?>
                </div>
                <button class="layui-btn add_file" data-id="region_video">选择视频</button>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
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
    <script type="text/javascript">
        var container = UE.getEditor('container',{initialFrameWidth: null});
    </script>

<script>
    layui.use(['form'], function() {
        var form = layui.form;

        //获取省份
        $.get('<?php echo url("ApiBaseInfo/getProvinceList"); ?>',{level:1},function (res) {
            var province_code="<?php echo (isset($info['province_code']) && ($info['province_code'] !== '')?$info['province_code']:''); ?>";
            if(res.code==200){
                var data =res.data;
                var html="";
                $.each(data,function(i,v){
                    var Cts = 'a'+province_code;
                    if(Cts.indexOf(v.code) > 0 )
                    {
                        html+='<input type="checkbox" value="'+v.code+'" name="province_code['+v.code+']" title="'+v.name+'" checked>';
                    }else {
                        html+='<input type="checkbox" value="'+v.code+'" name="province_code['+v.code+']" title="'+v.name+'">';
                    }
                });
                $('.province_list').html(html);
                form.render();
            }else{
                layer.msg(res.msg);
            }
        },'JSON')

        //提交表单
        form.on('submit(submit)', function(data){
            data.field['describe_content']=container.getContent();
            $.post('<?php echo url("Route/ApiSaveRegion"); ?>',data.field,function (res) {
                if(res.code==200){
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index); //再执行关闭
                }else{
                    parent.layer.msg(res.msg, {icon: 5,time: 1000});
                }
            },'JSON')

        });

        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })
    })
</script>

