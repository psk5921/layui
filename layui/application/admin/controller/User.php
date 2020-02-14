<?php


namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\Role;
use app\constant\AdminConstant;
use app\exception\AdminException;
use app\logic\admin\UserLogic;
use app\logic\admin\RoleLogic;
class User extends Base
{
    /**
     * 管理员列表
     */
    public function index()
    {
        if (request()->isAjax()) {
            return UserLogic::getInstance()->ajaxList();
        }
        return $this->fetch();
    }

    /**
     * 管理员添加
     */
    public function add(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return UserLogic::getInstance()->ajaxAdd($diycode);
        }
        $r_where['status'] = 1;
        $field = 'id,name';
        $role = RoleLogic::getInstance()->getRoleInfo($r_where,$field);
        $this->assign([
            'role' => $role
        ]);
        return $this->fetch();
    }

    /**
     * 管理员修改
     */
    public function update(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return UserLogic::getInstance()->ajaxUpdate($diycode);
        }
        $id = input('id');
        if (empty($id)) {
            exit($diycode::PARAM_ERROR[1]);
        }
        $where['id'] = $id;
        $where['status'] = [ '<>', 0];
        $admin = new Admin;
        $role = new Role();
        $field = 'id,username,status,role_id';
        if (false == ($user = $admin->getAdminByWhere($where,$field))) {
            exit($diycode::INFO_NOT_FOUND[1]);
        }
        $r_where['status'] = 1;
        $field = 'id,name';
        $role = $role->getRoleInfo($r_where,$field);
        $this->assign([
            'user' => $user,
            'role' => $role
        ]);
        return $this->fetch();
    }

    /**
     * 管理员删除
     */
    public function delete(AdminConstant $diycode)
    {
        if (request()->isAjax() && request()->isPost()) {
            return UserLogic::getInstance()->ajaxDelete($diycode);
        }else{
            throw new AdminException($diycode::REQUEST_METHOD_ERROR[1].$diycode::REQUEST_METHOD_ERROR[0]);
        }
    }
}