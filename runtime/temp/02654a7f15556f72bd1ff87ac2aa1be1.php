<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Order\order_detail.html";i:1576813615;s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\head.html";i:1577767329;s:84:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\footer.html";i:1576813615;}*/ ?>
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
<div style="height:48rem;overflow-x: hidden;width: 98%;margin: auto;padding-top: 1rem;" class="cbp-spmenu-push">
    <div class="layui-form layui-form-pane">
        <!--隐藏域-->
        <input type="hidden" name="order_number" value="<?php echo (isset($order_info['order_number']) && ($order_info['order_number'] !== '')?$order_info['order_number']:''); ?>">
        <input type="hidden" name="user_id" value="<?php echo (isset($order_info['user_id']) && ($order_info['user_id'] !== '')?$order_info['user_id']:''); ?>">


        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
            <ul class="layui-tab-title">
                <li lay-id="1" class="layui-this">订单信息</li>
                <?php if($order_info['sale_state']==32): ?>
                <li lay-id="2">售后退款</li>
                <?php endif; ?>
            </ul>
            <div class="layui-tab-content " style="height: 100px;">
                <div class="layui-tab-item layui-show layui-row">
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线名称</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo (isset($order_info['route_name']) && ($order_info['route_name'] !== '')?$order_info['route_name']:''); ?>【<?php echo $order_info['edition_info']; ?>】" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">出团排期</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo (isset($order_info['travel_date_info']) && ($order_info['travel_date_info'] !== '')?$order_info['travel_date_info']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">订单编号</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['order_number']) && ($order_info['order_number'] !== '')?$order_info['order_number']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">订单状态</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['order_state']) && ($order_info['order_state'] !== '')?$order_info['order_state']:''); ?>" class="layui-input" disabled>
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">下单会员</label>
                        <div class="layui-input-block">
                            <input type="text" value="姓名：<?php echo (isset($order_info['real_name']) && ($order_info['real_name'] !== '')?$order_info['real_name']:''); ?>，微信名称：<?php echo (isset($order_info['wechat_name']) && ($order_info['wechat_name'] !== '')?$order_info['wechat_name']:''); ?>，账号：<?php echo (isset($order_info['account_number']) && ($order_info['account_number'] !== '')?$order_info['account_number']:''); ?>，电话：<?php echo (isset($order_info['mobile']) && ($order_info['mobile'] !== '')?$order_info['mobile']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">订单原价</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['original_total_price']) && ($order_info['original_total_price'] !== '')?$order_info['original_total_price']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">优惠总价</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['preferential_total_price']) && ($order_info['preferential_total_price'] !== '')?$order_info['preferential_total_price']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">出行人数</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['travel_people']) && ($order_info['travel_people'] !== '')?$order_info['travel_people']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <?php if($order_info['order_state']==10): ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">待支付</label>
                        <div class="layui-input-inline">
                            <input type="text" name="to_be_paid" value="<?php echo (isset($order_info['pay_price']) && ($order_info['pay_price'] !== '')?$order_info['pay_price']:''); ?>" class="layui-input" >
                        </div>
                        <div class="layui-input-inline">
                            <button class="layui-btn" onclick="ApiUpdateOrderPayPrice()">修改金额</button>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">支付状态</label>
                        <div class="layui-input-block">
                            <input type="radio" name="order_state" value="10" title="未支付" <?php if(isset($order_info) && $order_info['order_state']==10): ?>checked<?php endif; ?>>
                            <input type="radio" name="order_state" value="30" title="已支付" <?php if(isset($order_info) && $order_info['order_state']==30): ?>checked<?php endif; ?>>
                            <button class="layui-btn" onclick="ApiSaveOrderState()">修改状态</button>
                        </div>
                    </div>

                    <?php else: ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">支付流水号</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo (isset($pay_info['pay_no']) && ($pay_info['pay_no'] !== '')?$pay_info['pay_no']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">

                        <label class="layui-form-label">订单金额</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['pay_price']) && ($order_info['pay_price'] !== '')?$order_info['pay_price']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">支付途径</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo ShowStatus($pay_info['pay_style'],'微信支付,支付宝,京东,其他:1,2,3,0'); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">已退款</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['logistics_price']) && ($order_info['logistics_price'] !== '')?$order_info['logistics_price']:'0'); ?>" class="layui-input" disabled>
                        </div>
                    </div>

                    <?php endif; ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">订单备注</label>
                        <div class="layui-input-block">
                            <textarea name="note" placeholder="请输入订单备注内容" class="layui-textarea"><?php echo (isset($order_info['note']) && ($order_info['note'] !== '')?$order_info['note']:''); ?></textarea>
                            <!--                            <input type="text" name="price_note" value="<?php echo (isset($price_note) && ($price_note !== '')?$price_note:''); ?>" placeholder="修改金额备注" class="layui-input" >-->
                        </div>
                    </div>
                    <div class="layui-input-inline">
                        <button class="layui-btn" onclick="ApiSaveOrderNote()">保存备注</button>
                    </div>


                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                        <legend>联系人信息</legend>
                    </fieldset>

                    <div class="layui-form-item">
                        <label class="layui-form-label">联系人名称</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['contact_name']) && ($order_info['contact_name'] !== '')?$order_info['contact_name']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">联系人电话</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['contact_phone']) && ($order_info['contact_phone'] !== '')?$order_info['contact_phone']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">联系人邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['contact_email']) && ($order_info['contact_email'] !== '')?$order_info['contact_email']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">紧急联系人</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['urgent_name']) && ($order_info['urgent_name'] !== '')?$order_info['urgent_name']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">紧急电话</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['urgent_phone']) && ($order_info['urgent_phone'] !== '')?$order_info['urgent_phone']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">订单来源</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo showStatus((isset($order_info['order_source']) && ($order_info['order_source'] !== '')?$order_info['order_source']:''),'手机下单,电脑下单,其他下单:1,2,0'); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">会员备注</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" disabled><?php echo (isset($order_info['user_note']) && ($order_info['user_note'] !== '')?$order_info['user_note']:''); ?></textarea>
                        </div>
                    </div>
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                        <legend>出行人信息</legend>
                    </fieldset>

                    <table class="layui-table" lay-data="{height: 'full-200', url:'<?php echo url('Order/ApiGetOrderUserPage',['order_id'=>$order_info['order_id'],'order_state'=>'3,10,20,30,31,40']); ?>', page:true, even: true,id:'table_user'}" lay-filter="demo_user">
                        <thead>
                        <tr>
                            <th lay-data="{field:'team_name',width:100}">队员名称</th>
                            <th lay-data="{field:'passport_english',width:100}">英文名称</th>
                            <th lay-data="{field:'gender',width:60,templet: '#gender'}">性别</th>
                            <th lay-data="{field:'nation',width:60}">民族</th>
                            <th lay-data="{field:'phone',width:120}">手机号码</th>
                            <th lay-data="{field:'passport_nationality',width:80}">国籍</th>
                            <th lay-data="{field:'certificates_type',,width:100,templet: '#certificates_type'}">证件类型</th>
                            <th lay-data="{field:'certificates_number',width:100}">证件号码</th>
                            <th lay-data="{field:'issue_date',width:100}">签发日期</th>
                            <th lay-data="{field:'passport_validity_time',width:100}">护照有效期</th>
                            <th lay-data="{field:'birthday',width:100}">出生日期</th>
                            <th lay-data="{field:'age',width:60}">年龄</th>
                            <th lay-data="{field:'is_student',templet: '#is_student',width:100}">是否学生</th>
                            <th lay-data="{field:'is_occupy_bed',templet: '#is_occupy_bed',width:100}">是否占床</th>
                            <th lay-data="{field:'number',width:100}">服维次数</th>
                            <th lay-data="{field:'user_note',event: 'set_note',width:100}">备注信息</th>
                            <th lay-data="{field:'state',templet: '#state'}">状态</th>
                            <th lay-data="{fixed: 'right', width:100, align:'center',toolbar: '#barDemo'}">操作</th>
                        </tr>
                        </thead>
                        <script type="text/html" id="barDemo">
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="add_user_server">服维</a>
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
                        <script type="text/html" id="gender">
                            {{#  if(d.gender == 1){ }}
                            <span style="color: #5FB878">男</span>
                            {{#  } else if( d.gender ==2) { }}
                            <span style="color: #FF5722">女</span>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="is_student">
                            {{#  if(d.is_student == 1){ }}
                            <span style="color: #5FB878">是</span>
                            {{#  } else if( d.is_student ==0) { }}
                            <span style="color: #FF5722">不是</span>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="is_occupy_bed">
                            {{#  if(d.is_occupy_bed == 1){ }}
                            <span style="color: #5FB878">是</span>
                            {{#  } else if( d.is_occupy_bed ==0) { }}
                            <span style="color: #FF5722">不是</span>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="state">
                            {{#  if(d.state == 1){ }}
                            <span style="color: #5FB878">开发</span>
                            {{#  } else if( d.state ==0) { }}
                            <span style="color: #FF5722">关闭</span>
                            {{#  } }}
                        </script>
                        <script type="text/html" id="total_price">
                            <span style="color: #5FB878">{{ d.price*d.number }}</span>
                        </script>
                    </table>


                </div>


                <!--售后退款-->
                <div class="layui-tab-item">

                    <?php if(!empty($refund_info)): ?>
                    <div class="layui-form-item">
                        <label class="layui-form-label">路线信息</label>
                        <div class="layui-input-block">
                            <input type="text" value="<?php echo (isset($order_info['route_name']) && ($order_info['route_name'] !== '')?$order_info['route_name']:''); ?>　排期：<?php echo (isset($order_info['startDate']) && ($order_info['startDate'] !== '')?$order_info['startDate']:''); ?>至<?php echo (isset($order_info['endDate']) && ($order_info['endDate'] !== '')?$order_info['endDate']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">订单编号</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['order_number']) && ($order_info['order_number'] !== '')?$order_info['order_number']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">支付编号</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($pay_info['pay_no']) && ($pay_info['pay_no'] !== '')?$pay_info['pay_no']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">订单金额</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($order_info['pay_price']) && ($order_info['pay_price'] !== '')?$order_info['pay_price']:''); ?>" class="layui-input" disabled>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">申请人</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($refund_info['real_name']) && ($refund_info['real_name'] !== '')?$refund_info['real_name']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">联系电话</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo (isset($refund_info['mobile']) && ($refund_info['mobile'] !== '')?$refund_info['mobile']:''); ?>" class="layui-input" disabled>
                        </div>
                        <label class="layui-form-label">退款状态</label>
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo showStatus((isset($refund_info['state']) && ($refund_info['state'] !== '')?$refund_info['state']:''),'新申请,申请成功,驳回申请,确认金额,退款成功,退款关闭:0,10,11,20,21,22'); ?>" class="layui-input" disabled>
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">会员备注</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" disabled><?php echo (isset($refund_info['user_note']) && ($refund_info['user_note'] !== '')?$refund_info['user_note']:''); ?></textarea>
                        </div>
                    </div>
                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                        <legend>退款操作</legend>
                    </fieldset>
                    <div class="layui-form-item">
                        <label class="layui-form-label">距离天数</label>
                        <div class="layui-input-inline">
                            <input type="text" readonly name="consult_day" value="<?php echo (isset($refund_info['consult_day']) && ($refund_info['consult_day'] !== '')?$refund_info['consult_day']:''); ?>" class="layui-input" >
                        </div>
                        <label class="layui-form-label">参考退款</label>
                        <div class="layui-input-inline">
                            <input type="text" readonly name="consult_price" value="<?php echo (isset($refund_info['consult_price']) && ($refund_info['consult_price'] !== '')?$refund_info['consult_price']:''); ?>￥ <?php echo (isset($refund_info['percent']) && ($refund_info['percent'] !== '')?$refund_info['percent']:''); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">付款方式</label>
                        <div class="layui-input-inline">
                            <input type="text" readonly name="pay_style" value="<?php echo ShowStatus($pay_info['pay_style'],'微信支付,支付宝,京东,其他:1,2,3,0'); ?>" class="layui-input" >
                        </div>
                        <label class="layui-form-label">确认金额</label>
                        <div class="layui-input-inline">
                            <input type="number" name="confirm_price" value="<?php echo (isset($refund_info['confirm_price']) && ($refund_info['confirm_price'] !== '')?$refund_info['confirm_price']:''); ?>"  class="layui-input" <?php if(in_array($refund_info['state'],[20,21,22])): ?>readonly<?php endif; ?> >
                        </div>
                        <?php if($refund_info['state']==0): ?>
                        <button class="layui-btn" onclick="save_refund_price()">修改</button>
                        <?php endif; if($refund_info['state']==10): ?>
                        <button class="layui-btn" onclick="confirm_refund_price()">确认金额</button>
                        <?php endif; ?>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">退款类型</label>
                        <div class="layui-input-inline">
                            <select name="refund_style">
                                <option value="1" <?php if(isset($pay_info['pay_style']) && $pay_info['pay_style']==1): ?>selected<?php endif; ?>>微信</option>
                                <option value="2" <?php if(isset($pay_info['pay_style']) && $pay_info['pay_style']==2): ?>selected<?php endif; ?>>支付宝</option>
                                <option value="3" <?php if(isset($pay_info['pay_style']) && $pay_info['pay_style']==3): ?>selected<?php endif; ?>>京东</option>
                                <option value="4" <?php if(isset($pay_info['pay_style']) && $pay_info['pay_style']==4): ?>selected<?php endif; ?>>其他</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">管理员备注</label>
                        <div class="layui-input-block">
                            <textarea class="layui-textarea" name="admin_note"><?php echo (isset($refund_info['admin_note']) && ($refund_info['admin_note'] !== '')?$refund_info['admin_note']:''); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <?php if($refund_info['state']==0): ?>
                            <button class="layui-btn" data-state="10" lay-submit="" lay-filter="submit_state">同意申请</button>
                            <button class="layui-btn   layui-btn-danger" data-state="11" lay-submit="" lay-filter="submit_state">驳回申请</button>
                            <?php elseif($refund_info['state']==20): ?>
                            <button class="layui-btn   layui-btn-danger" data-state="10" lay-submit="" lay-filter="submit_state">驳回申请</button>
                            <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="submit_refund">提交退款</button>
                            <?php endif; ?>
                            <button class="layui-btn" lay-submit="" lay-filter="submit_refundNote">提交备注</button>
                            <button type="reset" class="layui-btn layui-btn-primary close">关闭</button>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

                <!--售后申请-->
                <div class="layui-tab-item">


                </div>
            </div>
        </div>

        <div style="margin-bottom: 2rem"></div>
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
    <script src="/static/admin/LodopFuncs/LodopFuncs.js"></script>
<script>
    layui.use(['form','layedit','element','table'], function() {
        var form = layui.form
            , layer = layui.layer
            , layedit = layui.layedit
            , element = layui.element
            , table = layui.table;
        var order_no=$('input[name="order_no"]').val();
        //监听提交
        form.on('submit(submit_state)', function(data){
            data.field['state']=$(this).data('state');
            data.field['refund_number']="<?php echo $refund_info['refund_number']; ?>";
            $.post('<?php echo url("Order/ApiSaveRefundState"); ?>',data.field,function (res) {
                layer.msg(res.msg);
                location.reload()
            },'JSON')
        });



        //提交退款审核
        form.on('submit(submit_refund)', function(data){
            data.field['refund_number']="<?php echo $refund_info['refund_number']; ?>";
            $.post('<?php echo url("Order/ApiRefundPrice"); ?>',data.field,function (res) {
                layer.msg(res.msg);
                location.redirect();
            },'JSON')
        });

        form.on('submit(submit_refundNote)', function(data){
            data.field['refund_number']="<?php echo $refund_info['refund_number']; ?>";
            $.post('<?php echo url("Order/ApiRefundPriceNote"); ?>',data.field,function (res) {
                layer.msg(res.msg);
                location.redirect();
            },'JSON')
        });



        //表格功能
        table.on('tool(demo_user)', function(obj){
            var data = obj.data;
            var event=obj.event;
            switch(event){
                case 'add_user_server':
                    layer.open({
                        type: 2,
                        title: '添加服务维护信息',
                        shadeClose: true,
                        shade: false,
                        maxmin: true, //开启最大化最小化按钮
                        area: ['100%', '100%'],
                        content: '<?php echo url("User/user_server_save"); ?>?user_id='+data.user_id+'&route_id=<?php echo $order_info["route_id"]; ?>&travel_date_id=<?php echo $order_info["travel_date_id"]; ?>',
                        end: function () {
                            table.reload('table_user');
                        },
                    });
                    break;
                case 'set_note':
                    layer.prompt({
                        formType: 2
                        ,title: '编辑队员的备注信息'
                        ,value: data.user_note
                    }, function(value, index){
                        layer.close(index);

                        //这里一般是发送修改的Ajax请求
                        $.post("<?php echo url('Order/apiSaveOrderUser'); ?>",{order_user_id:data.order_user_id,note:value},function (res) {
                            layer.msg(res.msg);
                        },"JSON")

                        //同步更新表格和缓存对应的值
                        obj.update({
                            user_note: value
                        });
                    });
                    break;
            }
        });




        //Hash地址的定位
        var layid = location.hash.replace(/^#tab_num=/, '');
        element.tabChange('docDemoTabBrief', layid);
        element.on('tab(docDemoTabBrief)', function(elem){
            location.hash = 'tab_num='+ $(this).attr('lay-id');
        });


        $('.close').on('click',function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        })
    })
    //修改退款金额
    function save_refund_price() {
        var order_number="<?php echo $order_info['order_number']; ?>";
        var refund_number="<?php echo $refund_info['refund_number']; ?>";
        var confirm_price=$('input[name="confirm_price"]').val();
        $.post('<?php echo url("order/ApiSaveRefundPrice"); ?>',{order_number:order_number,refund_number:refund_number,confirm_price:confirm_price},function (res) {
            layer.msg(res.msg);
        },'JSON')
    }
    //确认退款金额
    function confirm_refund_price() {
        var order_number="<?php echo $order_info['order_number']; ?>";
        var refund_number="<?php echo $refund_info['refund_number']; ?>";
        var confirm_price=$('input[name="confirm_price"]').val();
        $.post('<?php echo url("order/ApiConfirmRefundPrice"); ?>',{order_number:order_number,refund_number:refund_number,confirm_price:confirm_price},function (res) {
            layer.msg(res.msg);
        },'JSON')
    }

    //修改订单支付金额
    function ApiUpdateOrderPayPrice() {
        var pay_price=$('input[name="to_be_paid"]').val();
        var note=$('textarea[name="note"]').val();
        var order_number="<?php echo $order_info['order_number']; ?>";
        $.post('<?php echo url("order/ApiUpdateOrderPayPrice"); ?>',{order_number:order_number,pay_price:pay_price,note:note},function (res) {
            layer.msg(res.msg);
        },'JSON')
    }

    //提交订单备注
    function ApiSaveOrderNote() {
        var note=$('textarea[name="note"]').val();
        var order_number="<?php echo $order_info['order_number']; ?>";
        $.post('<?php echo url("order/ApiSaveOrderNote"); ?>',{order_number:order_number,note:note},function (res) {
            layer.msg(res.msg);
        },'JSON')
    }

    //修改订单状态
    function ApiSaveOrderState() {
        var note=$('textarea[name="note"]').val();
        var order_state=$('input[name="order_state"]:checked').val();
        var order_number="<?php echo $order_info['order_number']; ?>";
        $.post('<?php echo url("order/ApiSaveOrderState"); ?>',{order_number:order_number,note:note,order_state:order_state},function (res) {
            layer.msg(res.msg);
        },'JSON')
    }
</script>

