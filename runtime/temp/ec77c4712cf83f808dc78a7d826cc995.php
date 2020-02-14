<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\User\user_save.html";i:1576813616;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1576813615;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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

    <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
        <ul class="layui-tab-title">
            <li lay-id="1" class="layui-this">会员信息</li>
            <li lay-id="3">会员伙伴</li>
            <li lay-id="2">服维信息</li>
            <li lay-id="3">徽章墙</li>
            <li lay-id="4">优惠券</li>
            <li lay-id="4">旅行基金</li>
        </ul>
        <div class="layui-tab-content ">
            <div class="layui-tab-item layui-show layui-row layui-form layui-form-pane">
                <input type="hidden" name="user_id" value="<?php echo (isset($info['user_id']) && ($info['user_id'] !== '')?$info['user_id']:''); ?>">
                <div class="layui-form-item">
                    <label class="layui-form-label">会员等级</label>
                    <div class="layui-input-inline">
                        <select name="level_id">

                        </select>
                    </div>
                    <label class="layui-form-label">真实名称</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($info['real_name']) && ($info['real_name'] !== '')?$info['real_name']:''); ?>" name="real_name"   class="layui-input">
                        </div>
                    </div>
                    <label class="layui-form-label">微信名称</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($info['wechat_name']) && ($info['wechat_name'] !== '')?$info['wechat_name']:''); ?>" name="wechat_name"   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">注册手机</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($info['mobile']) && ($info['mobile'] !== '')?$info['mobile']:''); ?>" name="mobile"   class="layui-input">
                        </div>
                    </div>
                    <label class="layui-form-label">注册邮箱</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($info['email']) && ($info['email'] !== '')?$info['email']:''); ?>" name="email"   class="layui-input">
                        </div>
                    </div>
                    <label class="layui-form-label">身份证</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($info['id_card']) && ($info['id_card'] !== '')?$info['id_card']:''); ?>" name="id_card"   class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-inline">
                        <input type="radio" name="gender" value="1" title="男" <?php if(isset($info)): if($info['gender']==1): ?>checked<?php endif; endif; ?>>
                        <input type="radio" name="gender" value="2" title="女" <?php if(isset($info)): if($info['gender']==2): ?>checked<?php endif; endif; ?>>
                    </div>
                    <label class="layui-form-label">年龄</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo (isset($info['age']) && ($info['age'] !== '')?$info['age']:''); ?>" name="age"   class="layui-input">
                    </div>
                    <label class="layui-form-label">生日</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo (isset($info['birthday']) && ($info['birthday'] !== '')?$info['birthday']:''); ?>" name="birthday"   class="layui-input date">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系人</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo (isset($info['contacts_name']) && ($info['contacts_name'] !== '')?$info['contacts_name']:''); ?>" name="contacts_name"   class="layui-input">
                    </div>
                    <label class="layui-form-label">联系电话</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo (isset($info['contacts_phone']) && ($info['contacts_phone'] !== '')?$info['contacts_phone']:''); ?>" name="contacts_phone"   class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">紧急联系人</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo (isset($info['urgent_name']) && ($info['urgent_name'] !== '')?$info['urgent_name']:''); ?>" name="urgent_name"   class="layui-input">
                    </div>
                    <label class="layui-form-label">联系电话</label>
                    <div class="layui-input-inline">
                        <input type="text" value="<?php echo (isset($info['urgent_phone']) && ($info['urgent_phone'] !== '')?$info['urgent_phone']:''); ?>" name="urgent_phone"   class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">民族</label>
                    <div class="layui-input-inline">
                        <select name="nation">
                            <option value="汉族">汉族</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">会员标签</label>
                    <div class="layui-input-block user_label">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">省</label>
                    <div class="layui-input-inline">
                        <select name="province_code" lay-filter="province_id">

                        </select>
                    </div>
                    <label class="layui-form-label">市</label>
                    <div class="layui-input-inline">
                        <select name="city_code" lay-filter="city_id">

                        </select>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">后台备注</label>
                    <div class="layui-input-block">
                        <textarea name="admin_note" placeholder="请输入内容" class="layui-textarea"><?php echo (isset($info['admin_note']) && ($info['admin_note'] !== '')?$info['admin_note']:''); ?></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-inline">
                        <div class="layui-input-inline">
                            <select name="state" lay-verify="required">
                                <option value="1" <?php if(isset($info)): if($info['state']==1): ?>selected<?php endif; endif; ?>>开放</option>
                                <option value="2" <?php if(isset($info)): if($info['state']==2): ?>selected<?php endif; endif; ?>>下架</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit lay-filter="submit_user">立即提交</button>
                        <button type="button" class="layui-btn layui-btn-primary close">关闭</button>
                    </div>
                </div>
            </div>

            <!--小伙伴信息-->
            <div class="layui-tab-item layui-form layui-form-pane">
                <table class="layui-table" lay-data="{height: 'full-200', url:'<?php echo url('User/ApiGetUserFriendPage',['user_id'=>$info['user_id']]); ?>', page:true, id:'testReload1',even: true,loading:true}" lay-filter="demo1">
                    <thead>
                    <tr>
                        <th lay-data="{field:'team_name',width:120}">伙伴名称</th>
                        <th lay-data="{field:'gender',width:80}">性别</th>
                        <th lay-data="{field:'age',width:80}">年龄</th>
                        <th lay-data="{field:'certificates_type',width:100,templet: '#certificates_type'}">证件类型</th>
                        <th lay-data="{field:'certificates_number',width:120}">证件编号</th>
                        <th lay-data="{field:'mobile_phone',width:150}">手机号码</th>
                        <th lay-data="{field:'nation',width:100}">队员民族</th>
                        <th lay-data="{field:'is_occupy_bed',width:120,templet: '#is_occupy_bed'}">是否占床</th>
                        <th lay-data="{field:'is_student',width:100,templet: '#is_student'}">是否学生</th>
                        <th lay-data="{field:'user_note',width:100}">备注信息</th>
                        <th lay-data="{field:'create_time',width:170}">创建时间</th>
                        <th lay-data="{field:'state', templet: '#state1',width:100}">状态</th>
                    </tr>
                    </thead>
                    <script type="text/html" id="state1">
                        {{#  if(d.state == 1){ }}
                        <span style="color: #5FB878">开放</span>
                        {{#  } else if( d.state ==0) { }}
                        <span style="color: #FF5722">关闭</span>
                        {{#  } }}
                    </script>
                    <script type="text/html" id="is_occupy_bed">
                        {{#  if(d.is_occupy_bed == 1){ }}
                        <span style="color: #5FB878">占床</span>
                        {{#  } else if( d.is_occupy_bed ==0) { }}
                        <span style="color: #FF5722">不占床</span>
                        {{#  } }}
                    </script>
                    <script type="text/html" id="is_student">
                        {{#  if(d.is_student == 1){ }}
                        <span style="color: #5FB878">是学生</span>
                        {{#  } else if( d.is_occupy_bed ==0) { }}
                        <span style="color: #FF5722">不是学生</span>
                        {{#  } }}
                    </script>
                    <script type="text/html" id="certificates_type">
                        {{#  if(d.certificates_type == 1){ }}
                        <span style="color: #5FB878">身份证</span>
                        {{#  } else if( d.certificates_type ==2) { }}
                        <span style="color: #FF5722">护照</span>
                        {{#  } else if( d.certificates_type ==3) { }}
                        <span style="color: #FF5722">军官证</span>
                        {{#  } else if( d.certificates_type ==4) { }}
                        <span style="color: #FF5722">港澳身份证</span>
                        {{#  } else if( d.certificates_type ==5) { }}
                        <span style="color: #FF5722">台胞证</span>
                        {{#  } }}
                    </script>
                </table>
            </div>
            <!--服务维护记录-->
            <div class="layui-tab-item layui-form layui-form-pane">
                <table class="layui-table" lay-data="{height: 'full-300', url:'<?php echo url('User/UserGetServerList'); ?>', page:true, id:'testReload2',even: true,loading:true}" lay-filter="demo2">
                    <thead>
                    <tr>
                        <th lay-data="{field:'wechat_name',width:100}">会员名称</th>
                        <th lay-data="{field:'route_name'}">出团路线</th>
                        <th lay-data="{field:'travel_date_info',templet: '#server_number'}">出团排期</th>
                        <th lay-data="{field:'admin_name',width:150}">操作人</th>
                        <th lay-data="{field:'note',width:120}">备注</th>
                        <th lay-data="{field:'create_time',width:170}">创建时间</th>
                        <th lay-data="{field:'state', templet: '#state2',width:100}">状态</th>
                        <th lay-data="{fixed: 'is_hot', width:100,fixed: 'right', align:'center', toolbar: '#barDemo2'}">操作</th>
                    </tr>
                    </thead>
                    <script type="text/html" id="barDemo2">
                        <a class="layui-btn layui-btn-xs" lay-event="edit2">编辑</a>
                    </script>
                    <script type="text/html" id="state2">
                        {{#  if(d.state == 1){ }}
                        <span style="color: #5FB878">开放</span>
                        {{#  } else if( d.state ==0) { }}
                        <span style="color: #FF5722">关闭</span>
                        {{#  } }}
                    </script>
                </table>
            </div>
            <!--徽章墙-->
            <div class="layui-tab-item layui-form layui-form-pane">
                <a href="<?php echo url('User/user_badge_save'); ?>?user_id=<?php echo (isset($info['user_id']) && ($info['user_id'] !== '')?$info['user_id']:''); ?>">
                    <button class="layui-btn" data-type="label_manage"><i class="layui-icon">&#xe654;</i> 添加徽章</button>
                </a>
                <table class="layui-table" lay-data="{height: 'full-300', url:'<?php echo url('User/ApiGetUserBadgePage',['user_id'=>$info['user_id']]); ?>', page:true, id:'testReload3',even: true,loading:true}" lay-filter="demo3">
                    <thead>
                    <tr>
                        <th lay-data="{field:'real_name',width:100}">会员名称</th>
                        <th lay-data="{field:'badge_name',width:170}">徽章名称</th>
                        <th lay-data="{field:'number',width:100}">徽章数量</th>
                        <th lay-data="{field:'route_name'}">路线名称</th>
                        <th lay-data="{field:'note',width:120}">备注</th>
                        <th lay-data="{field:'create_time',width:170}">创建时间</th>
                        <th lay-data="{field:'state', templet: '#state3',width:100}">状态</th>
                        <th lay-data="{fixed: 'is_hot', width:100,fixed: 'right', align:'center', toolbar: '#barDemo3'}">操作</th>
                    </tr>
                    </thead>
                    <script type="text/html" id="barDemo3">
                        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del3">删除</a>
                    </script>
                    <script type="text/html" id="state3">
                        {{#  if(d.state == 1){ }}
                        <span style="color: #5FB878">开放</span>
                        {{#  } else if( d.state ==0) { }}
                        <span style="color: #FF5722">关闭</span>
                        {{#  } }}
                    </script>
                </table>
            </div>

            <!--会员优惠券-->
            <div class="layui-tab-item layui-form layui-form-pane">
                <button class="layui-btn add_user_coupon"><i class="layui-icon">&#xe654;</i> 添加优惠券</button>
                <table class="layui-table" lay-data="{height: 'full-300', url:'<?php echo url('User/ApiGetUserCouponPage'); ?>?user_id=<?php echo $info['user_id']; ?>', page:true, id:'testReload4',even: true,loading:true}" lay-filter="demo4">
                    <thead>
                    <tr>
                        <th lay-data="{field:'real_name',width:100}">会员名称</th>
                        <th lay-data="{field:'badge_name',width:170}">优惠券名称</th>
                        <th lay-data="{field:'number',width:100}">过期时间</th>
                        <th lay-data="{field:'source_type',width:120}">来源</th>
                        <th lay-data="{field:'use_range',width:100}">使用范围</th>
                        <th lay-data="{field:'rel_range_id',width:120}">范围描述</th>
                        <th lay-data="{field:'create_time',width:170}">创建时间</th>
                        <th lay-data="{field:'state', templet: '#state4',width:100}">状态</th>
                        <th lay-data="{fixed: 'is_hot', width:180,fixed: 'right', align:'center', toolbar: '#barDemo4'}">操作</th>
                    </tr>
                    </thead>
                    <script type="text/html" id="barDemo4">
                        <a class="layui-btn layui-btn-xs" lay-event="del_user_coupon">删除</a>
                    </script>
                    <script type="text/html" id="state4">
                        {{#  if(d.state == 1){ }}
                        <span style="color: #5FB878">开放</span>
                        {{#  } else if( d.state ==0) { }}
                        <span style="color: #FF5722">关闭</span>
                        {{#  } }}
                    </script>
                </table>
            </div>

            <!--旅行基金-->
            <div class="layui-tab-item layui-form layui-form-pane">
                <table class="layui-table" lay-data="{height: 'full-300', url:'<?php echo url('User/UserGetServerList'); ?>', page:true, id:'testReload5',even: true,loading:true}" lay-filter="demo5">
                    <thead>
                    <tr>
                        <th lay-data="{field:'real_name',width:100}">会员名称</th>
                        <th lay-data="{field:'badge_name',width:170}">获取金额</th>
                        <th lay-data="{field:'friend_user_name',width:100}">赠送人</th>
                        <th lay-data="{field:'create_time',width:170}">创建时间</th>
                        <th lay-data="{field:'state', templet: '#state5',width:100}">状态</th>
                    </tr>
                    </thead>
                    <script type="text/html" id="barDemo5">
                        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                    </script>
                    <script type="text/html" id="state5">
                        {{#  if(d.state == 1){ }}
                        <span style="color: #5FB878">开放</span>
                        {{#  } else if( d.state ==0) { }}
                        <span style="color: #FF5722">关闭</span>
                        {{#  } }}
                    </script>
                </table>
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
    layui.use(['form', 'layedit', 'laydate','element','table'], function(){

        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,element = layui.element
            ,table = layui.table
            ,laydate = layui.laydate;

        var city_id="<?php echo (isset($info['city_code']) && ($info['city_code'] !== '')?$info['city_code']:''); ?>";

        //同时绑定多个
        lay('.date').each(function(){
            laydate.render({
                elem: this
                ,trigger: 'click'
            });
        });

        //表格功能
        table.on('tool(demo2)', function(obj){
            var data = obj.data;
            var event=obj.event;
            console.log(event);
            switch(event){
                case 'edit2':
                    layer.open({
                        type: 2,
                        title: '信息更新',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['100%', '100%'],
                        content: '<?php echo url("User/user_server_save"); ?>?id='+data.id,
                        end: function () {
                            table.reload('testReload2');
                        },
                    });
                    break;
            }
        });

        //表格功能
        table.on('tool(demo3)', function(obj){
            var data = obj.data;
            var event=obj.event;
            switch(event){
                case 'del3':
                    layer.confirm('注意：删除后将无法恢复', function(index){
                        $.post('<?php echo url("User/apiDelUserBadge"); ?>',{id:data.id},function (res) {
                            obj.del();
                        },"JSON")
                        layer.close(index);
                    });
                    break;
            }
        });

        //表格功能--会员优惠券
        table.on('tool(demo4)', function(obj){
            var data = obj.data;
            var event=obj.event;
            switch(event){
                case 'del_user_coupon':
                    layer.confirm('注意：删除后将无法恢复', function(index){
                        $.post('<?php echo url("Coupon/ApiDelUserCoupon"); ?>',{user_coupon_id:data.user_coupon_id},function (res) {
                            obj.del();
                        },"JSON")
                        layer.close(index);
                    });
                    break;
            }
        });

        //监听提交
        form.on('submit(submit_user)', function(data){
            $.post('<?php echo url("User/ApiSaveUser"); ?>',data.field,function (res) {
                if(res.code==200){
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index); //再执行关闭
                }else{
                    parent.layer.msg(res.msg, {icon: 6,time: 1000});
                }
            },"json")
        });

        //获取客户标签
        $.get('<?php echo url("BaseInfo/ApiGetLabelList"); ?>',{page:1,limit:1000},function (res) {
            var label_id="<?php echo (isset($info['label_id']) && ($info['label_id'] !== '')?$info['label_id']:''); ?>a";
            if(res.code==0){
                var data =res.data;
                var html="";
                var i=0;
                $.each(data,function(i,v){
                    var Cts = 'a'+label_id;
                    if(Cts.indexOf(v.base_id) > 0 )
                    {
                        html+='<input type="checkbox" name="label_id['+i+']" value="'+v.base_id+'" title="'+v.value+'" checked="">';
                    }else{
                        html+='<input type="checkbox" name="label_id['+i+']" value="'+v.base_id+'" title="'+v.value+'">';
                    }
                    i++;
                });
                $('.user_label').html(html);
                form.render(); //更新全部
            }
        },'JSON')

        //获取省
        var province_code="<?php echo (isset($info['province_code']) && ($info['province_code'] !== '')?$info['province_code']:''); ?>";
        $.get('<?php echo url("ApiBaseInfo/getProvinceList"); ?>',{level:1},function (res) {
            if(res.code==200){
                var data =res.data;
                var html="";
                $.each(data,function(i,v){
                    if(province_code==v.code){
                        html+='<option value="'+v.code+'" selected>'+v.name+'</option>';
                    }else {
                        html+='<option value="'+v.code+'">'+v.name+'</option>';
                    }
                });
                $('select[name="province_code"]').html('<option value="">请选择省</option>'+html);
                form.render(); //更新全部
            }
        },'JSON')

        //获取市
        var city_code="<?php echo (isset($info['city_code']) && ($info['city_code'] !== '')?$info['city_code']:''); ?>";
        if(province_code!='' && province_code>0){
            $.get('<?php echo url("ApiBaseInfo/getProvinceList"); ?>',{level:2,code:province_code},function (res) {
                if(res.code==200){
                    var data =res.data;
                    var html="";
                    $.each(data,function(i,v){
                        if(city_code==v.code){
                            html+='<option value="'+v.code+'" selected>'+v.name+'</option>';
                        }else {
                            html+='<option value="'+v.code+'">'+v.name+'</option>';
                        }
                    });
                    $('select[name="city_code"]').html('<option value="">请选择市</option>'+html);
                    form.render(); //更新全部
                }
            },'JSON')
        }
        form.on('select(province_id)', function(data){
            $.get('<?php echo url("ApiBaseInfo/getProvinceList"); ?>',{level:2,code:data.value},function (res) {
                $('select[name="city_id"]').html('<option value="">请选择市</option>');
                $('select[name="area_id"]').html('<option value="">请选择区</option>');
                if(res.code==200){
                    var data =res.data;
                    var html="";
                    $.each(data,function(i,v){
                        if(province_id==v.code){
                            html+='<option value="'+v.code+'" selected>'+v.name+'</option>';
                        }else {
                            html+='<option value="'+v.code+'">'+v.name+'</option>';
                        }
                    });
                    $('select[name="city_id"]').html('<option value="">请选择市</option>'+html);
                    form.render(); //更新全部
                }
            },'JSON')
        });

        //获取区
        if(city_id!='' && city_id>0){
            $.get('<?php echo url("ApiBaseInfo/getProvinceList"); ?>',{level:3,code:city_id},function (res) {
                var city_id="<?php echo (isset($info['city_id']) && ($info['city_id'] !== '')?$info['city_id']:''); ?>";
                if(res.code==200){
                    var data =res.data;
                    var html="";
                    $.each(data,function(i,v){
                        if(city_id==v.code){
                            html+='<option value="'+v.code+'" selected>'+v.name+'</option>';
                        }else {
                            html+='<option value="'+v.code+'">'+v.name+'</option>';
                        }
                    });
                    $('select[name="area_id"]').html('<option value="">请选择区</option>'+html);
                    form.render(); //更新全部
                }
            },'JSON')
        }
        form.on('select(city_id)', function(data){
            $.get('<?php echo url("ApiBaseInfo/getProvinceList"); ?>',{level:3,code:data.value},function (res) {
                $('select[name="area_id"]').html('<option value="">请选择区</option>');
                if(res.code==200){
                    var data =res.data;
                    var html="";
                    $.each(data,function(i,v){
                        if(province_id==v.code){
                            html+='<option value="'+v.code+'" selected>'+v.name+'</option>';
                        }else {
                            html+='<option value="'+v.code+'">'+v.name+'</option>';
                        }
                    });
                    $('select[name="area_id"]').html('<option value="">请选择区</option>'+html);
                    form.render(); //更新全部
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
                        html+='<option value="'+v.base_id+'" selected>'+v.value+'</option>';
                    }else {
                        html+='<option value="'+v.base_id+'">'+v.value+'</option>';
                    }
                });
                $('select[name="level_id"]').html('<option value="">请选会员等级</option>'+html);
                form.render(); //更新全部
            }
        },'JSON')

        //添加会员优惠券
        $('.add_user_coupon').on('click', function() {
            layer.open({
                type: 2,
                title: '添加信息',
                shadeClose: true,
                shade: false,
                maxmin: true, //开启最大化最小化按钮
                area: ['100%', '100%'],
                content: "<?php echo url('Coupon/coupon_user_save',['user_id'=>$info['user_id']]); ?>",
                end: function () {
                    table.reload('testReload');
                },
            });
        });

        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })

    });


</script>

</body>
</html>