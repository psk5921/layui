<?php


namespace app\admin\controller;

use app\exception\AdminException;
use app\constant\AdminConstant;
use app\logic\admin\PermLogic;
use app\logic\admin\RoleLogic;
use app\admin\model\Perm;
class Role   extends  Base
{
    /**
     * 角色列表
     */
    public function index()
    {
        if (request()->isAjax()) {
            return RoleLogic::getInstance()->getRoleList();
        }
        return $this->fetch();
    }

    /**
     * 角色添加
     */
    public function add(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
           return RoleLogic::getInstance()->ajaxAdd($diycode);
        }
        return $this->fetch();
    }

    /**
     * 角色修改
     */
    public function update(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return RoleLogic::getInstance()->ajaxUpdate($diycode);
        }
        $id = (int)input('id');
        if (empty($id)) {
            exit($diycode::PARAM_ERROR[1]);
        }
        $where = ['id'=>$id,'status'=>1];
        $field = 'id,name';
        if (false == ($role = RoleLogic::getInstance()->getRoleInfoByFind($where,$field))) {
            exit($diycode::INFO_NOT_FOUND[1]);
        }
        $this->assign([
            'role' => $role
        ]);
        return $this->fetch();
    }

    /**
     * 角色删除
     */
    public function delete(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return RoleLogic::getInstance()->ajaxDelete($diycode);
        }else{
            throw new AdminException($diycode::REQUEST_METHOD_ERROR[1],$diycode::REQUEST_METHOD_ERROR[0]);
        }
    }

    //分配权限
    public function perm(AdminConstant $diycode){


        $Perm = new Perm;
        $field = 'id,name,pid';
        $select = $Perm->getTree($field,'');
        if (request()->isAjax() && request()->isPost()) {
            return PermLogic::getInstance()->getPermList($diycode);
        }
        $id = input('role_id');
        if (empty($id)) {
            exit($diycode::PARAM_ERROR[1]);
        }
        $field = 'id,name,menu_id';
        $where = ['id'=>$id,'status'=>1];
        if (false == ( $role = RoleLogic::getInstance()->getRoleInfoByFind($where,$field))) {
            exit($diycode::INFO_NOT_FOUND[1]);
        }
        $role['menu_id']  = !empty($role['menu_id'])?explode(',',$role['menu_id']): [];
        $this->assign([
            'id' => $id         ,
            'perm'=>$select,
            'menu_id'=>$role['menu_id'],
            'uid'=>session('uid','','login'),
        ]);

        return $this->fetch();
    }


}
