<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
$edition='v1';

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    /***********************************登录注册模块**************************************/

    //微信扫描授权登录
    $edition.'/getWeChatJs1'=>'index/Index/getWeChatJs',
    $edition.'/mobileTokenTest/:mobile'=>'index/User/mobileTokenTest',



     //微信扫描授权登录
    $edition.'/sendSmsCode'=>'index/User/sendSmsCode',
    //微信扫描授权登录
    $edition.'/scanning_login'=>'index/WeChat/scanning_login',
    //轮巡检查扫描登录
    $edition.'/check_scanning_login'=>'index/WeChat/check_scanning_login',
    //获取用户的手机验证码--返回token
    $edition.'/getUserSmsCode'=>'index/User/getUserSmsCode',
    //检查会员预约排期是否后补
    $edition.'/checkUserSupplement'=>'index/Order/checkUserSupplement',



    //微信授权登录
    $edition.'/uploadFile'=>'index/Index/uploadFile',
    //微信授权登录
    $edition.'/getProvinceList'=>'index/Route/getProvinceList',
    //微信授权登录
    $edition.'/weChatLogin'=>'index/User/weChatLogin',
    //微信授权登录
    $edition.'/getWechatToken'=>'index/User/getWechatToken',
    //用户账号登录
    $edition.'/loginAccount'=>'index/User/loginAccount',
    //退出登录
    $edition.'/loginOut'=>'index/User/loginOut',
    //获取手机验证码
    $edition.'/getSmsCode'=>'index/User/getSmsCode',
    //手机验证登录
    $edition.'/loginSms'=>'index/User/loginSms',
    //用户注册
    $edition.'/userRegister'=>'index/User/userRegister',
    //用户协议
    $edition.'/getUserAgreement'=>'index/User/getUserAgreement',
    //用户修改密码
    $edition.'/saveUserPassWord'=>'index/User/saveUserPassWord',
    //用户修改头像
    $edition.'/saveUserWechatImg'=>'index/User/saveUserWechatImg',
    //获取会员民族列表信息
    $edition.'/getUserNation'=>'index/User/getUserNation',
    //首页搜索--价格区间
    $edition.'/getSearchPrice'=>'index/Index/getSearchPrice',
    //获取网站新--旅行FAQ
    $edition.'/getWebFAQ'=>'index/Index/getWebFAQ',
    //提交反馈意见
    $edition.'/submitFeedback'=>'index/Index/submitFeedback',
    //更新会员信息
    $edition.'/saveUserInfo'=>'index/User/saveUserInfo',
    //我的徽章列表
    $edition.'/getUserBadge'=>'index/User/getUserBadge',
    //我的徽章列表数据
    $edition.'/getUserBadgeNUmber'=>'index/User/getUserBadgeNUmber',
    //获取徽章规则
    $edition.'/getBadgeRule'=>'index/User/getBadgeRule',
    //获取会员旅行次数
    $edition.'/getUserTravelNumber'=>'index/User/getUserTravelNumber',
    //发送邮箱验证码
    $edition.'/sendMailboxCode'=>'index/User/sendMailboxCode',
    //验证邮箱验证码
    $edition.'/checkMailboxCode'=>'index/User/checkMailboxCode',
    //验证短信验证
    $edition.'/checkSms'=>'index/User/checkSms',
    //获取会员优惠券信息
    $edition.'/getUserCoupon'=>'index/User/getUserCoupon',
    //获取优惠券规则说明
    $edition.'/getCouponRule'=>'index/User/getCouponRule',
    //获取会员的朋友列表
    $edition.'/getUserFriendList'=>'index/User/getUserFriendList',
    //获取会员的朋友列表
    $edition.'/getUserFriendInfo'=>'index/User/getUserFriendInfo',
    //编辑更新会员朋友信息
    $edition.'/saveUserFriend'=>'index/User/saveUserFriend',
    //获取会员基金信息
    $edition.'/getUserTravelFund'=>'index/User/getUserTravelFund',
    //获取基金规则
    $edition.'/getFundRule'=>'index/User/getFundRule',
    //获取基金页面信息
    $edition.'/getFundInfo'=>'index/User/getFundInfo',
    //会员领取基金
    $edition.'/saveShareUserFund'=>'index/User/saveShareUserFund',
    //获取会员收藏分组
    $edition.'/getUserCollectionGroup'=>'index/User/getUserCollectionGroup',
    //获取会员收藏分组
    $edition.'/getUserCollection'=>'index/User/getUserCollection',
    //添加会员收藏
    $edition.'/saveUserCollection'=>'index/User/saveUserCollection',
    //获取会员订单列表数据
    $edition.'/getUserOrderList'=>'index/User/getUserOrderList',
    //获取订单状态的数量
    $edition.'/getUserOrderNumber'=>'index/User/getUserOrderNumber',
    //获取会员订单列表数据
    $edition.'/getUserOrderInfo'=>'index/User/getUserOrderInfo',
    //获取文件资源
    $edition.'/getFileInfo'=>'index/User/getFileInfo',
    //获取改签规则信息
    $edition.'/getChangeRule'=>'index/User/getChangeRule',
    //提交改签、退款信息
    $edition.'/submitRefundOrder'=>'index/User/submitRefundOrder',
    //获取退款规则信息
    $edition.'/getRefundRule'=>'index/User/getRefundRule',
    //获取会员足迹信息
    $edition.'/getUserFootprint'=>'index/User/getUserFootprint',
    //获取路线类型列表
    $edition.'/getRouteTypeList'=>'index/Index/getRouteTypeList',
    //获取手机端首页banner
    $edition.'/getWapIndexBanner'=>'index/Index/getWapIndexBanner',
    //获取手机端首页banner
    $edition.'/getPCIndexBanner'=>'index/Index/getPCIndexBanner',
    //获取手机端首页banner
    $edition.'/getIndexRouteRecommend'=>'index/Index/getIndexRouteRecommend',
    //获取路线主题信息
    $edition.'/getRouteThemeList'=>'index/Index/getRouteThemeList',
    //获取路线区域信息
    $edition.'/getRouteRegionInfo'=>'index/Route/getRouteRegionInfo',
    //获取路线区域信息
    $edition.'/getRouteContentInfo'=>'index/Route/getRouteContentInfo',
    //删除会员的朋友信息
    $edition.'/delUserFriend'=>'index/User/delUserFriend',


    //获取基础信息--费用协议
    $edition.'/getCostAgreement'=>'index/Index/getCostAgreement',
    //轮巡检查扫描支付状态
    $edition.'/check_scanning_pay'=>'index/OrderPay/check_scanning_pay',

    //订单管理模块
    //获取已确认的订单信息
    $edition.'/getOrderInfo'=>'index/Order/getOrderInfo',
    //提交后补订单信息
    $edition.'/submitSupplement'=>'index/Order/submitSupplement',
    //获取系统消息
    $edition.'/getSystemMessage'=>'index/User/getSystemMessage',
    //获取系统消息详情
    $edition.'/getSystemMessageOne'=>'index/User/getSystemMessageOne',
    //获取会员消息
    $edition.'/getUserMessage'=>'index/User/getUserMessage',
    //获取会员消息
    $edition.'/getUserMessageOne'=>'index/User/getUserMessageOne',

    //会员取消订单给
    $edition.'/cancelUserOrder'=>'index/Order/cancelUserOrder',

    //订单热门预约的数量
    $edition.'/getOrderHotBook'=>'index/Order/getOrderHotBook',
    //订单支付二维码生成
    $edition.'/payQRCode'=>'index/OrderPay/payQRCode',
    //订单支付二维码生成
    $edition.'/getCountryInfo'=>'index/Route/getCountryInfo',






    /********************************************首页信息**********************************************/
    //获取团体定制首页的信息--主图--banner
    $edition.'/getCustomizedIndexInfo'=>'index/Index/getCustomizedIndexInfo',
    //获取常见问题列表
    $edition.'/getCommonProblem'=>'index/Index/getCommonProblem',
    //获取常见问题列表
    $edition.'/getWeChatJs'=>'index/WeChat/getWeChatJs',
    //获取常见问题列表
    $edition.'/getUserInfo'=>'index/User/getUserInfo',


    /****************************************路线模块**************************************************/
    //获取区域列表信息
    $edition.'/getRegionList'=>'index/Route/getRegionList',
    //获取区域列表信息
    $edition.'/getRouteTypeInfo'=>'index/Route/getRouteTypeInfo',
    //获取区域详情信息
    $edition.'/getRegionInfo'=>'index/Route/getRegionInfo',
    //获取区域详情信息
    $edition.'/getContinentList'=>'index/Route/getContinentList',
    //获取区域详情信息
    $edition.'/getCountryList'=>'index/Route/getCountryList',
    //获取路线列表信息
    $edition.'/getRouteList'=>'index/Route/getRouteList',
    //获取路线详情信息
    $edition.'/getRouteInfo'=>'index/Route/getRouteInfo',
    //获取路线详情信息--下面的推荐列表
    $edition.'/getRouteInfo_recommend'=>'index/Route/getRouteInfo_recommend',
    //获取评论列表
    $edition.'/getRouteCommentList'=>'index/Route/getRouteCommentList',
    //获取路线行程列表
    $edition.'/getRouteTripList'=>'index/Route/getRouteTripList',
    //获取路线行程信息
    $edition.'/getRouteTripInfo'=>'index/Route/getRouteTripInfo',
    //获取路线行程列表
    $edition.'/getSearchInfoPage'=>'index/Route/getSearchInfoPage',


    /*******************************************团体模块*****************************************************/
    //获取团体定制路线列表
    $edition.'/getRouteCustomizedList'=>'index/Route/getRouteCustomizedList',
    //获取定制信息列表
    $edition.'/getCustomizedInfo'=>'index/Route/getCustomizedInfo',
    //团体定制首页顶部图片
    $edition.'/getCustomizedBanner'=>'index/Route/getCustomizedBanner',
    //提交团体定制表单
    $edition.'/submitCustomizedInfo'=>'index/Route/submitCustomizedInfo',


    /****************************************订单模块**************************************************/
    //获取订单列表
    $edition.'/getTravelDateList'=>'index/Order/getTravelDateList',
    //获取订单列表
    $edition.'/getTravelDateList_pc'=>'index/Order/getTravelDateList_pc',
    //获取出团排期单条信息
    $edition.'/getTravelDateOne'=>'index/Order/getTravelDateOne',
    //添加PC端的订单信息
    $edition.'/addUserOrder_pc'=>'index/Order/addUserOrder_pc',
    //第一步，添加订单信息
    $edition.'/addOrderUserInfo'=>'index/Order/addOrderUserInfo',
    //获取报名须知
    $edition.'/getNoticeRegistration'=>'index/Order/getNoticeRegistration',
    //下单合同样本
    $edition.'/getContractSample'=>'index/Order/getContractSample',
    //第二部,获取下单小伙伴列表
    $edition.'/getOrderUserFriend'=>'index/Order/getOrderUserFriend',
    //提交确认订单
    $edition.'/submitOrder'=>'index/Order/submitOrder',
    //提交确认订单--PC端
    $edition.'/submitOrder_pc'=>'index/Order/submitOrder_pc',
    //选择使用订单优惠券
    $edition.'/useUserCoupon'=>'index/Order/useUserCoupon',
    //订单支付接口
    $edition.'/OrderPay'=>'index/OrderPay/OrderPay',
    //验证支付是否成功
    $edition.'/checkOrderPay'=>'index/OrderPay/checkOrderPay',
    //添加订单出团小伙伴信息
    $edition.'/saveOrderUserFriend'=>'index/Order/saveOrderUserFriend',
    //删除订单出团小伙伴信息
    $edition.'/delOrderUserFriend'=>'index/Order/delOrderUserFriend',
    //更新订单状态--选择好出行人
    $edition.'/saveOrderState2'=>'index/Order/saveOrderState2',
    //更新订单状态--选择好出行人
    $edition.'/getWebComment'=>'index/Index/getWebComment',
    //检查更新路线的排期状态
    $edition.'/saveRouteDataState'=>'index/Base/saveRouteDataState',

    //支付宝支付同步回调地址
    $edition.'/returnAliPay_synchronization'=>'index/OrderPay/returnAliPay_synchronization',
    //支付宝支付同步回调地址
    $edition.'/returnAliPay_asynchronous'=>'index/OrderPay/returnAliPay_asynchronous',

];
