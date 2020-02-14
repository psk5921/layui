<?php


namespace app\admin\controller;

use app\constant\AdminConstant;
use app\exception\AdminException;
use app\logic\admin\PermLogic;


class Perm extends Base
{
    /**
     * 权限列表
     */
    public function index()
    {
        if (request()->isAjax()) {
            return PermLogic::getInstance()->getMenuList();
        }
        $this->assign(['uid' => session('uid', '', 'login'),
        ]);
        return $this->fetch();
    }

    /**
     * 权限添加
     */
    public function add(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
           return PermLogic::getInstance()->ajaxAdd($diycode);
        }
        //获取顶级菜单的数据
        $select = PermLogic::getInstance()->getTreeList();
        $this->assign(['top_menu' => $select]);
        return $this->fetch();
    }

    /**
     * 权限修改
     */
    public function update(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return PermLogic::getInstance()->ajaxUpdate($diycode);
        }
        $id = input('id');
        if (empty($id)) {
            exit($diycode::PARAM_ERROR[1]);
        }
        $where = ['id'=>$id,'status'=>['<>',2]];
        if (false == ($perm =  PermLogic::getInstance()->getPermByWhere($where))) {
            exit($diycode::INFO_NOT_FOUND[1]);
        }
        //获取顶级菜单的数据
        $select = PermLogic::getInstance()->getTreeList1();
        $this->assign([
            'perm' => $perm,
            'top_menu' => $select,
        ]);
        return $this->fetch();
    }

    /**
     * 权限删除
     */
    public function delete(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return PermLogic::getInstance()->ajaxDelete($diycode);
        }else{
            throw new AdminException($diycode::REQUEST_METHOD_ERROR[1],$diycode::REQUEST_METHOD_ERROR[0]);
        }
    }

    //图标库
    function iconfont()
    {
        return $this->fetch();
    }

    //排序修改
    function sortnum(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return PermLogic::getInstance()->sortnum($diycode);
        }else{
            throw new AdminException($diycode::REQUEST_METHOD_ERROR[1],$diycode::REQUEST_METHOD_ERROR[0]);
        }
    }
}
