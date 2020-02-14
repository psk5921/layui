<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Dashboard\index.html";i:1577764646;}*/ ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.4</title>

    <link href="/static/admin/cmsStyle/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/admin/cmsStyle/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/static/admin/cmsStyle/css/animate.css" rel="stylesheet">
    <link href="/static/admin/cmsStyle/css/style.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="/static/admin/cmsStyle/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/static/admin/cmsStyle/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/admin/layui/css/layui.css">


</head>

<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        </div>
        <div style="padding-top: 10px;">

            <div class="row">
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/Order/order'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-bookmark"></i> 下单总量：</h5><h4 class="no-margins"><?php echo (isset($order['total']) && ($order['total'] !== '')?$order['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order['month']) && ($order['month'] !== '')?$order['month']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本月下单量</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order['day']) && ($order['day'] !== '')?$order['day']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>今日下单量</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/User/user'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-users"></i> 会员总量：</h5><h4 class="no-margins"><?php echo (isset($user['total']) && ($user['total'] !== '')?$user['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($user['day']) && ($user['day'] !== '')?$user['day']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>今日新增</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($user['month']) && ($user['month'] !== '')?$user['month']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本月新增</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/Order/order_refund'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-jpy"></i> 营业总额：</h5><h4 class="no-margins"><?php echo (isset($order_sales['total']) && ($order_sales['total'] !== '')?$order_sales['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_sales['cn']) && ($order_sales['cn'] !== '')?$order_sales['cn']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本月营业额</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_sales['en']) && ($order_sales['en'] !== '')?$order_sales['en']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>本周营业额</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                </div>
            </div>
            <blockquote class="layui-elem-quote" style="background: #fff"><h2>今天，共有 <span style="color: #5FB878"><?php echo (isset($travel['total']) && ($travel['total'] !== '')?$travel['total']:0); ?></span> 名旅行家和我们一起在路上。</h2></blockquote>

            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            路线订单报名统计
                            <div class="layui-input-inline">
                                <input type="text" name="date_range" class="layui-input" id="test6" placeholder="点击按照时间区间筛选">
                            </div>
                            <div class="layui-input-inline">
                                <button class="layui-btn search_number">搜索</button>
                                <button class="layui-btn excel">导出</button>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <table class="layui-table" lay-data="{height: '',url:'<?php echo url('Dashboard/getRouteOrderNumber'); ?>', id:'testReload1',even: true,loading:true}" lay-filter="demo1">
                                <thead>
                                <tr>
                                    <th lay-data="{field:'area_name',align:'center',width:80}">片区</th>
                                    <th lay-data="{field:'route_name',align:'center'}">路线名称</th>
                                    <th lay-data="{field:'order_number',width:120,align:'center'}">成单量</th>
                                    <th lay-data="{field:'user_number',width:120,align:'center'}">报名人数</th>
                                    <th lay-data="{field:'free_number',width:120,align:'center'}">空余人数</th>
                                    <th lay-data="{field:'order_week_number',width:140,align:'center'}">周增长单数</th>
                                    <th lay-data="{field:'user_week_number',width:140,align:'center'}">周增长人数</th>
                                </tr>
                                </thead>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
<script src="/static/admin/layui/layui.js"></script>
<script src="/static/common/js/jquery.min.js"></script>

<script>
    layui.use(['table','layer','laydate'], function() {
        var table = layui.table
            , laydate = layui.laydate
            , layer = layui.layer;
        //日期范围
        laydate.render({
            elem: '#test6'
            ,range: ','
        });

        $('.search_number').click(function () {
            var date_range = $('input[name="date_range"]').val();
            table.reload('testReload1', {
                where: {
                    date_range:date_range,
                }
            });
        })

        $('.excel').click(function () {
            var date_range = $('input[name="date_range"]').val();
            window.location.href = '<?php echo url("Dashboard/getRouteOrderNumber"); ?>?is_excel=1&date_range='+date_range;
        })
    })
</script>
</body>
</html>
