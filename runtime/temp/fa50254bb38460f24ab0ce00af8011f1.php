<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Travel\travel_save.html";i:1577769701;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
<div>
    <div class="layui-form layui-form-pane">

        <!--隐藏域-->
        <input type="hidden" name="route_id" value="<?php echo (isset($route_info['route_id']) && ($route_info['route_id'] !== '')?$route_info['route_id']:''); ?>">
        <input type="hidden" name="travel_date_id" value="<?php echo (isset($info['travel_date_id']) && ($info['travel_date_id'] !== '')?$info['travel_date_id']:''); ?>">

            <div class="layui-tab-content " style="height: 100px;">
                <div class="layui-tab-item layui-show layui-row">
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线名称</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo (isset($route_info['route_name']) && ($route_info['route_name'] !== '')?$route_info['route_name']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">出队名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="ranks_name" value="<?php echo (isset($info['ranks_name']) && ($info['ranks_name'] !== '')?$info['ranks_name']:''); ?>" class="layui-input">
                        </div>
                        <label class="layui-form-label">分组编号</label>
                        <div class="layui-input-inline">
                            <input type="text" name="travel_group_number" value="<?php echo (isset($info['travel_group_number']) && ($info['travel_group_number'] !== '')?$info['travel_group_number']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">开始时间</label>
                        <div class="layui-input-inline">
                            <input type="text" name="data_range" value="<?php echo (isset($info['data_range']) && ($info['data_range'] !== '')?$info['data_range']:''); ?>" class="layui-input" id="test6" placeholder=" 请选择排期范围 ">
                        </div>
                        <label class="layui-form-label">报名截止</label>
                        <div class="layui-input-inline">
                            <input type="number" name="by_day" value="<?php echo (isset($info['by_day']) && ($info['by_day'] !== '')?$info['by_day']:''); ?>" placeholder="距出行日期前多少天" class="layui-input">
                        </div>
                        <div class="layui-input-inline">
                            <input type="number" name="by_time" value="<?php echo (isset($info['by_time']) && ($info['by_time'] !== '')?$info['by_time']:''); ?>" placeholder="距出行日期前多少小时" onkeyup="num(this)" size="10" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">价格</label>
                        <div class="layui-input-inline">
                            <input type="number" name="price" value="<?php echo (isset($info['price']) && ($info['price'] !== '')?$info['price']:''); ?>" onkeyup="num(this)" size="10" class="layui-input" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">成团人数</label>
                        <div class="layui-input-inline">
                            <input type="number" name="min_number" value="<?php echo (isset($info['min_number']) && ($info['min_number'] !== '')?$info['min_number']:''); ?>" class="layui-input">
                        </div>
                        <label class="layui-form-label">出团人数</label>
                        <div class="layui-input-inline">
                            <input type="number" name="max_number" value="<?php echo (isset($info['max_number']) && ($info['max_number'] !== '')?$info['max_number']:''); ?>" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">不占床减免</label>
                        <div class="layui-input-inline">
                            <input type="number" name="bed_price" value="<?php echo (isset($info['bed_price']) && ($info['bed_price'] !== '')?$info['bed_price']:''); ?>" onkeyup="num(this)" size="10" class="layui-input">
                        </div>
                        <label class="layui-form-label">报名年龄</label>
                        <div class="layui-input-inline">
                            <input type="text" name="age_config" value="<?php echo (isset($info['age_config']) && ($info['age_config'] !== '')?$info['age_config']:''); ?>" placeholder="请按照 7-60 的规则填写"  class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">学生减免</label>
                        <div class="layui-input-inline">
                            <input type="checkbox"  name="is_student_coupon" value="1"  <?php if(isset($info) && $info['is_student_coupon']==1): ?>checked<?php endif; ?> lay-skin="switch" lay-filter="is_student_coupon" lay-text="开启|关闭">
                        </div>

                        <div class="is_student_coupon"  <?php if(isset($info) && $info['is_student_coupon']==0): ?>hidden<?php endif; ?>>
                            <label class="layui-form-label" >减免金额</label>
                            <div class="layui-input-inline">
                                <input type="number" name="student_coupon_price" value="<?php echo (isset($info['student_coupon_price']) && ($info['student_coupon_price'] !== '')?$info['student_coupon_price']:''); ?>" onkeyup="num(this)" size="10" class="layui-input" >
                            </div>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">老会员减免</label>
                        <div class="layui-input-inline">
                            <input type="checkbox"  name="is_old_member" value="1" <?php if(isset($info) && $info['is_old_member']==1): ?>checked<?php endif; ?> lay-skin="switch" lay-filter="is_old_member" lay-text="开启|关闭">
                        </div>

                        <label class="layui-form-label">等级减免</label>
                        <div class="layui-input-inline">
                            <?php foreach($level_list as $item): ?>
                            <input type="text" data-name="<?php echo $item['value']; ?>" name="old_member_config[<?php echo $item['base_id']; ?>]" value="<?php echo (isset($item['price']) && ($item['price'] !== '')?$item['price']:''); ?>" placeholder="请填写等级对应的金额"  class="layui-input tips_show">
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">多人减免</label>
                        <div class="layui-input-block">
                            <input type="checkbox"  name="is_peoples" value="1" <?php if(isset($info) && $info['is_peoples']==1): ?>checked<?php endif; ?> lay-skin="switch" lay-filter="is_peoples" lay-text="开启|关闭">
                        </div>
                    </div>

                    <?php if(isset($info) && !empty($info['peoples_list'])): foreach($info['peoples_list'] as $key=>$item): ?>
                    <div class="parent">
                        <div class="layui-form-item peoples_input" <?php if(isset($info) && $info['is_peoples']==0): ?>hidden<?php endif; ?>>
                            <label class="layui-form-label">人数</label>
                            <div class="layui-input-inline">
                                <input type="number" name="peoples[<?php echo $key; ?>]" value="<?php echo (isset($item['peoples']) && ($item['peoples'] !== '')?$item['peoples']:''); ?>" class="layui-input" >
                            </div>
                            <label class="layui-form-label">减免金额</label>
                            <div class="layui-input-inline">
                                <input type="number" name="peoples_price[<?php echo $key; ?>]" value="<?php echo (isset($item['peoples_price']) && ($item['peoples_price'] !== '')?$item['peoples_price']:''); ?>" onkeyup="num(this)" size="10" class="layui-input" >
                            </div>
                                <div class="layui-input-inline">
                                    <?php if($key==0): ?>
                                <button class="layui-btn add_peoples"><i class="layui-icon layui-icon-add-1"></i>  </button>
                                    <?php else: ?>
                                <button class="layui-btn layui-btn-danger del_peoples"><i class="layui-icon layui-icon-close"></i>  </button>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; else: ?>
                    <div class="layui-form-item peoples_input" hidden>
                        <label class="layui-form-label">人数</label>
                        <div class="layui-input-inline">
                            <input type="number" name="peoples[0]" class="layui-input" >
                        </div>
                        <label class="layui-form-label">减免金额</label>
                        <div class="layui-input-inline">
                            <input type="number" name="peoples_price[0]" class="layui-input" >
                        </div>
                        <div class="layui-input-inline">
                            <button class="layui-btn add_peoples"><i class="layui-icon layui-icon-add-1"></i>  </button>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="add_html">

                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">是否公开</label>
                        <div class="layui-input-inline">
                            <input type="radio" name="is_open" value="1" title="公开" <?php if(isset($info) && $info['is_open']==1): ?>checked<?php endif; ?>>
                            <input type="radio" name="is_open" value="0" title="隐藏" <?php if(isset($info) && $info['is_open']==0): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">出团状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="state" value="0" title="下架" <?php if(isset($info) && $info['state']==0): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="1" title="开放报名" <?php if(isset($info) && $info['state']==1): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="11" title="已成团" <?php if(isset($info) && $info['state']==11): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="2" title="已满员" <?php if(isset($info) && $info['state']==2): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="7" title="预排期" <?php if(isset($info) && $info['state']==7): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="3" title="截止报名" <?php if(isset($info) && $info['state']==3): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="4" title="暂停报名" <?php if(isset($info) && $info['state']==4): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="5" title="出队中" <?php if(isset($info) && $info['state']==5): ?>checked<?php endif; ?>>
                            <input type="radio" name="state" value="6" title="活动结束" <?php if(isset($info) && $info['state']==6): ?>checked<?php endif; ?>>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary" onclick= 'location.href="<?php echo $url; ?>"'>返回</button>
                        </div>
                    </div>

                </div>

        <div style="margin-bottom: 2rem"></div>
    </div>

        <div class="zy_html" hidden>

            <div class="parent">
                <div class="layui-form-item peoples_input">
                    <label class="layui-form-label">人数</label>
                    <div class="layui-input-inline">
                        <input type="number" class="layui-input peoples" >
                    </div>
                    <label class="layui-form-label">减免金额</label>
                    <div class="layui-input-inline">
                        <input type="number" class="layui-input peoples_price" >
                    </div>
                    <div class="layui-input-inline">
                        <button class="layui-btn layui-btn-danger del_peoples"><i class="layui-icon layui-icon-close"></i>  </button>
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
    layui.use(['form','layedit','element','table','laydate'], function() {
        var form = layui.form
            , layer = layui.layer
            , layedit = layui.layedit
            , element = layui.element
            , laydate = layui.laydate
            , table = layui.table;

        //同时绑定多个
        lay('.date').each(function(){
            laydate.render({
                elem: this
                ,trigger: 'click',
                min:1
            });
        });

        //日期范围
        laydate.render({
            elem: '#test6'
            ,range: ',',
            min:1
        });

        $('.tips_show').click(function () {
            var val=$(this).data('name');
            layer.tips(val, $(this));
        })

        //监听指定开关
        form.on('switch(is_peoples)', function(data){

            if(this.checked){
                $('.peoples_input').show();
            }else {
                $('.peoples_input').hide();
            }

        });

        //监听指定开关
        form.on('switch(is_student_coupon)', function(data){

            if(this.checked){
                $('.is_student_coupon').show();
            }else {
                $('.is_student_coupon').hide();
            }

        });

        //监听指定开关
        form.on('switch(is_old_member)', function(data){

            if(this.checked){
                $('.is_old_member').show();
            }else {
                $('.is_old_member').hide();
            }

        });

        var i=10;
        $("body").delegate('.add_peoples','click',function () {
            $('.zy_html').find('.peoples').attr('name','peoples['+i+']');
            $('.zy_html').find('.peoples_price').attr('name','peoples_price['+i+']');
            var html=$('.zy_html').html();
            $('.add_html').append(html);
            $('.zy_html').find('.peoples').attr('name','');
            $('.zy_html').find('.peoples_price').attr('name','');
            i++;
        })
        $("body").delegate('.del_peoples','click',function () {
            $(this).parents('.parent').remove();
        })


        //提交退款审核
        form.on('submit(submit)', function(data){
            $.post('<?php echo url("Travel/ApiSaveTravelDate"); ?>',data.field,function (res) {
                if(res.code==200){
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index); //再执行关闭
                }else{
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                }
            },'JSON')
        });

        //会员等级
        $.get('<?php echo url("BaseInfo/ApiGetLevelList"); ?>',function (res) {
            var level_id="<?php echo (isset($info['level_id']) && ($info['level_id'] !== '')?$info['level_id']:''); ?>";
            if(res.code==200){
                var data =res.data;
                var html="";
                $.each(data,function(i,v){
                    if(level_id==v.base_id){
                        html+='<option value="'+v.base_id+'" selected>'+v.value+'　　减免'+v.note1+'元</option>';
                    }else {
                        html+='<option value="'+v.base_id+'">'+v.value+'　　减免'+v.note1+'元</option>';
                    }
                });
                $('select[name="level_id"]').html(html);
                form.render(); //更新全部
            }
        },'JSON')

        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })


    })
    function num(obj){
        obj.value = obj.value.replace(/[^\d.]/g,""); //清除"数字"和"."以外的字符
        obj.value = obj.value.replace(/^\./g,""); //验证第一个字符是数字
        obj.value = obj.value.replace(/\.{2,}/g,"."); //只保留第一个, 清除多余的
        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
        obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3'); //只能输入两个小数
    }
</script>

