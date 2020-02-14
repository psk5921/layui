<?php
namespace app\admin\controller;


use think\Controller;
use app\logic\admin\LoginLogic;
use app\exception\AdminException;
use think\Request;
use app\constant\AdminConstant;
class Login extends Controller
{

    public function index()
    {
        return $this-> redirect('Login/login2');
    }

    //登录入口-V2
    public function login2()
    {
        return $this->fetch('Login/login2');
    }


    /**
     * 登录信息验证
     * @param Request $request
     * @param AdminConstant $diycode
     * @return array|\think\response\Json
     */
    public function ApiLogin(Request $request,AdminConstant $diycode){

        try{
            if($request->isAjax() && $request->isPost()){
                //ajax 提交数据
                return LoginLogic::getInstance()->validateLogin($diycode,$request);
            }else{
                throw new AdminException($diycode::LOGIN_ERROR[1],$diycode::LOGIN_ERROR[0]);
            }
        }catch (AdminException $e){
            return diy_json('',$e->getError(),$e->getStatusCode());
        }
    }

    /**
     * 退出登录
     */
    public function loginOut(){
        return LoginLogic::getInstance()->loginOut();
    }
}
