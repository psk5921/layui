<?php

namespace app\admin\controller;

use  app\constant\AdminConstant;
use app\logic\admin\PermLogic;
use  think\Controller;

/**
 * 基类验证登录信息以及权限控制
 * Class Base
 * @package app\admin\controller
 */
class Base extends Controller
{

    //初始化调用
    public function _initialize()
    {
        $diycode = new AdminConstant;
        //判断登录信息
        $this->login($diycode);
        //判断角色权限

        $this->role();
    }

    /**
     * 判断登录信息
     */
    public function login(AdminConstant $diyCodeConstant)
    {
        //首先判断登录缓存信息是否存在
        if (session('uid', '', 'login') && session('expire', '', 'login')) {
            //其次判断登录信息是否过期
            if (session('expire', '', 'login') < time()) {
                //过期 判断请求是不是ajax请求 给与相关的响应
                if (request()->isAjax()) {
                    AjaxJumpLogin( $diyCodeConstant);
                } else {
                    CommonJumpLogin();
                    //$this->redirect('login/index'); //重定向到登录页面
                }
            }
        } else {
            if (request()->isAjax()) {
                AjaxJumpLogin( $diyCodeConstant);
            } else {
                CommonJumpLogin();
                /*echo "<script>parent.parent.location.href = \"{:url('login/index')}\"</script>";die;*/
                //$this->redirect('login/index'); //重定向到登录页面
            }
        }
    }


    /**
     * 判断角色权限
     */
    public function role()
    {
        //当前访问的方法 当前缓存的数据节点是否在其中
        $roleid = session('role_id', '', 'login');
        $uid = session('uid', '', 'login');
        $controller = strtolower(request()->controller());
        $action = strtolower(request()->action());//当前方法转化成小写
        $no_access = ['uploadcourse', 'simple', 'xy', 'multiple', 'uploadgood', 'uploadteacher', 'getinfofromcourse']; //不需要验证的方法
        if ($uid == 1 || in_array($action, $no_access) || $uid == -999 ) {
            //超管用户 不判断权限信息
        }elseif ($roleid == -1 || $roleid == 0) {
            //无访问权限直接代码提示无权限并执行终止
            JumpLogin();
        } else if ($controller == 'index') {
        } else {
            $role_arr = explode(',', $roleid); //权限节点数组
            if (empty($role_arr)) {
                JumpLogin();
            }
            //$controller = strtolower(request()->controller());//当前控制器转化成小写
            $where = [
                'controller' => $controller,
                'action' => $action,
                'status' => ['<>',2],
            ];
            $r_id =  PermLogic::getInstance()->getPermId($where); //查找节点id 是否存在
            //无访问权限直接代码提示无权限并执行终止
            if (empty($r_id)) {
                JumpLogin();
            } else {
                if (!in_array($r_id, $role_arr)) {
                    JumpLogin();
                }
            }
        }
    }
}
