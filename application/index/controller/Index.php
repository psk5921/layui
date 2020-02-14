<?php
namespace app\index\controller;

use app\common\model\ArticleModel;
use app\common\model\ArticleVoteModel;
use app\common\model\CityAreaModel;
use app\common\model\FeedbackModel;
use app\common\model\FileInfoModel;
use app\common\model\RecruitModel;
use app\common\model\RelArticleUser;
use app\common\model\RouteModel;
use app\common\model\RouteTypeModel;
use app\common\model\UserModel;
use app\common\model\BaseInfoModel;
use app\common\service\helperService;
use app\common\model\OrderAddressModel;
use app\common\model\OrderModel;
use app\common\model\ProductModel;
use app\common\model\ProductTypeModel;
use app\common\model\ResourcesInfoModel;
use app\common\model\RelUserReserveModel;
use app\common\service\ServiceBaseInfo;
use app\common\service\serviceWechat;
use think\Config;
use think\Cookie;
use think\Session;
use think\Validate;

class Index
{
    /**
     * 首页跳转后台登录
     * @return \think\response\Redirect
     */
    public function index()
    {
        return redirect('admin/login/login2');
    }

}