<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\Order\index.html";i:1576813615;s:90:"F:\phpstudy_pro\WWW\travel_order\public/../application/admin\view\common\dashBoard_js.html";i:1576813615;}*/ ?>
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
                <div class="col-md-12">
                    <blockquote class="layui-elem-quote" style="background: #fff">
                        历史概况
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/user/userList'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-users"></i> 下单总量：</h5><h4 class="no-margins"><?php echo (isset($order_num['total']) && ($order_num['total'] !== '')?$order_num['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_num['cn']) && ($order_num['cn'] !== '')?$order_num['cn']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>国内</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_num['en']) && ($order_num['en'] !== '')?$order_num['en']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>国外</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="javascript:;"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-jpy"></i> 待发货：</h5><h4 class="no-margins"><?php echo (isset($order_status20['total']) && ($order_status20['total'] !== '')?$order_status20['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_status20['cn']) && ($order_status20['cn'] !== '')?$order_status20['cn']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>国内</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_status20['en']) && ($order_status20['en'] !== '')?$order_status20['en']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>国外</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo url('admin/order/orderList'); ?>"><span class="label label-success pull-right">查看详情</span></a>
                            <h5><i class="fa fa-bookmark"></i> 积压维权：</h5><h4 class="no-margins"><?php echo (isset($order_sales['total']) && ($order_sales['total'] !== '')?$order_sales['total']:0); ?></h4>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_sales['cn']) && ($order_sales['cn'] !== '')?$order_sales['cn']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>国内</small></div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="no-margins"><?php echo (isset($order_sales['en']) && ($order_sales['en'] !== '')?$order_sales['en']:0); ?></h1>
                                    <div class="font-bold text-navy"><small>国外</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <blockquote class=" layui-elem-quote" style="background: #fff">
                        实时概况
                    </blockquote>
                </div>
                <div class="col-md-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h3 class="no-margins">付款金额</h3>
                            <h2 class="font-bold text-navy">￥<?php echo (isset($order_num['day_price']) && ($order_num['day_price'] !== '')?$order_num['day_price']:0); ?></h2>
                            <br>
                            <h4 class="no-margins" style="color: #fc6175">昨日全天：￥<?php echo (isset($order_num['to_day_price']) && ($order_num['to_day_price'] !== '')?$order_num['to_day_price']:0); ?></h4>
                            <div id="order_day" style="width: 100%;height: 17.8rem"></div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="row" style="margin: 0 auto">
                                <div class="col-md-6">
                                    <h3 class="no-margins">会员浏览</h3>
                                    <br>
                                    <h2 class="font-bold text-navy"><?php echo (isset($product_num['total']) && ($product_num['total'] !== '')?$product_num['total']:0); ?></h2>
                                    <br>
                                    <h4 class="no-margins">昨日全天：<?php echo (isset($product_num['to_day']) && ($product_num['to_day'] !== '')?$product_num['to_day']:0); ?></h4>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="no-margins">访客浏览</h3>
                                    <br>
                                    <h2 class="font-bold text-navy"><?php echo (isset($product_num['total_fk']) && ($product_num['total_fk'] !== '')?$product_num['total_fk']:0); ?></h2>
                                    <br>
                                    <h4 class="no-margins">昨日全天：<?php echo (isset($product_num['to_day_fk']) && ($product_num['to_day_fk'] !== '')?$product_num['to_day_fk']:0); ?></h4>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="row" style="margin: 0 auto">
                                <div class="col-md-6">
                                    <h3 class="no-margins">付款订单数</h3>
                                    <br>
                                    <h2 class="font-bold text-navy"><?php echo (isset($order_num['total']) && ($order_num['total'] !== '')?$order_num['total']:0); ?></h2>
                                    <br>
                                    <h4 class="no-margins">昨日全天：<?php echo (isset($order_num['to_day']) && ($order_num['to_day'] !== '')?$order_num['to_day']:0); ?></h4>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="no-margins">付款人数</h3>
                                    <br>
                                    <h2 class="font-bold text-navy"><?php echo (isset($order_num['total_fk']) && ($order_num['total_fk'] !== '')?$order_num['total_fk']:0); ?></h2>
                                    <br>
                                    <h4 class="no-margins">昨日全天：<?php echo (isset($order_num['to_day_fk']) && ($order_num['to_day_fk'] !== '')?$order_num['to_day_fk']:0); ?></h4>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <blockquote class="layui-elem-quote" style="background: #fff">销量概况</blockquote>
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="layui-tab layui-tab-brief" lay-filter="tabDome">
                                <ul class="layui-tab-title">
                                    <li  lay-id="10" class="layui-this">近7天销量</li>
                                    <li  lay-id="20" class="getReport">近30天销量</li>
                                    <li  lay-id="30" class="getReport">近90天销量</li>
                                </ul>
                                <div class="layui-tab-content">
                                    <div class="layui-tab-item layui-show">
                                        <div id="money" style="width:100%;height: 40rem"></div>
                                    </div>

                                </div>
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
<script src="/static/echart/echarts.js"></script>
<script src="/static/echart/vintage.js"></script>
<script src="/static/echart/macarons.js"></script>

<script>
    $(document).ready(function(){
        var money = echarts.init(document.getElementById('money'));
        var order_day = echarts.init(document.getElementById('order_day'));

        //加载百度报表图
        function ReportData(title,x_data,contnet,type) {
            option = {
                backgroundColor: "#fff",
                color: ['#24a7f6', '#fc6175'],

                title: [{
                    text: '',
                    left: '1%',
                    top: '3%',
                    textStyle: {
                        color: '#111'
                    }
                }],
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    x: '45%',
                    top: '2%',
                    textStyle: {
                        color: '#f00',
                    },
                    data: title
                },
                grid: {
                    left: '0',
                    right: '2%',
                    top: '12%',
                    bottom: '6%',
                    containLabel: true
                },
                toolbox: {
                    "show": false,
                    feature: {
                        saveAsImage: {}
                    }
                },
                xAxis: {
                    type: 'category',
                    "axisLine": {
                        lineStyle: {
                            color: '#111'
                        }
                    },
                    "axisTick": {
                        "show": false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#111'
                        }
                    },
                    boundaryGap: false,
                    data: x_data
                },
                yAxis: {
                    "axisLine": {
                        lineStyle: {
                            color: '#111'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#e5e5e5'
                        }
                    },
                    "axisTick": {
                        "show": false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#111'
                        }
                    },
                    type: 'value'
                },
                series: contnet
            }
            if(type==1){
                order_day.setOption(option);
            }else if(type==2){
                money.setOption(option);
            }else if(type==3){
                money.setOption(option);
            }else if(type==4){
                money.setOption(option);
            }
        }

        //获取报表数据，加载
        function getReport(url,type){
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json',
                success: function (obj) {
                    var data=obj.data;
                    if(obj.code==200){
                        ReportData(data.title,data.x_data,data.content,type);
                    }else{
                        layer.msg(res.msg);
                    }
                },
            });
        }

        layui.use(['element','layer','table'], function(){
            var $ = layui.jquery
                ,layer = layui.layer
                ,table = layui.table
                ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
            //触发事件
            var active = {
                tabChange: function(){
                    //切换到指定Tab项
                    element.tabChange('demo', '22'); //切换到：用户管理
                }
            };
            //获取订单2天内的时时订单数据信息
            getReport('<?php echo url("Order/getOrderPrice"); ?>',1);

            $('.site-demo-active').on('click', function(){
                var othis = $(this), type = othis.data('type');
                active[type] ? active[type].call(this, othis) : '';
            });

            getReport('<?php echo url("Order/getOrderMonthNum",["day"=>7]); ?>',2);
            //一些事件监听
            element.on('tab(tabDome)', function(data){
                if(data.index==0){
                    layer.load(1);
                    //加载7天销售额数据
                    setTimeout(function(){
                        layer.closeAll('loading');
                        getReport('<?php echo url("Order/getOrderMonthNum",["day"=>7]); ?>',2);
                    }, 1000);
                    //加载30天销售额数据
                }else if (data.index==1){
                    layer.load(1);
                    setTimeout(function(){
                        layer.closeAll('loading');
                        getReport('<?php echo url("Order/getOrderMonthNum",["day"=>30]); ?>',3);
                    }, 1000);
                    //加载90天销售额数据
                }else if (data.index==2){
                    layer.load(1);
                    setTimeout(function(){
                        layer.closeAll('loading');
                        getReport('<?php echo url("Order/getOrderMonthNum",["day"=>90]); ?>',4);
                    }, 1000);
                }
            });
        });
    })
</script>
<!-- Mainly scripts -->
<script src="/static/admin/cmsStyle/js/jquery-2.1.1.js"></script>
<script src="/static/admin/cmsStyle/js/bootstrap.min.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/static/admin/cmsStyle/js/inspinia.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/pace/pace.min.js"></script>

<!-- Flot -->
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.resize.js"></script>

<!-- Flot -->
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/static/admin/cmsStyle/js/plugins/flot/jquery.flot.pie.js"></script>

<!-- ChartJS-->
<script src="/static/admin/cmsStyle/js/plugins/chartJs/Chart.min.js"></script>

<!-- Peity -->
<script src="/static/admin/cmsStyle/js/plugins/peity/jquery.peity.min.js"></script>
<!-- Peity demo -->
<script src="/static/admin/cmsStyle/js/demo/peity-demo.js"></script>
<!-- Flot -->
<!-- jQuery UI -->
<script src="/static/admin/cmsStyle/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- GITTER -->
<script src="/static/admin/cmsStyle/js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="/static/admin/cmsStyle/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="/static/admin/cmsStyle/js/demo/sparkline-demo.js"></script>

<!-- Toastr -->
<script src="/static/admin/cmsStyle/js/plugins/toastr/toastr.min.js"></script>

</body>
</html>
