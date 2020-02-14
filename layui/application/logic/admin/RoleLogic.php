<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/13
 * Time: 22:47
 */

namespace app\logic\admin;

use app\admin\model\Role;
use app\constant\AdminConstant;
use app\exception\AdminException;

class RoleLogic  extends  BaseLogic
{
    protected static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (static::$instance instanceof static) {
            return static::$instance;
        }
        return new static();
    }


    /**
     * 获取角色信息 select
     * @param $where
     * @param $field
     * @return mixed
     */
    public function getRoleInfo($where,$field='*'){
        $Role = new Role;
        return $Role->getRoleInfo($where,$field);
    }

    /**
     * 获取角色信息 find
     * @param $where
     * @param $field
     * @return mixed
     */
    public function getRoleInfoByFind($where,$field='*'){
        $Role = new Role;
        return $Role->getRoleInfoByFind($where,$field);
    }

    /**
     * ajax 获取角色列表
     */
    public function getRoleList(){
        $page = (int)input('page') > 0 ? (int)input('page') - 1 : 0; //当前页数
        $pagesize = (int)input('limit') > 0 ? (int)input('limit') : 10; //分页数量
        $where['status'] = 1;
        if (input('name')) {
            $where['name'] = [ 'like', '%' . RemoveXSS(input('name')) . '%'];
        }
        $roles = new Role();
        $field = 'id,name,status,createtime';
        $list = $roles->getList($where, $page, $pagesize, $field);
        return $list;
    }

    /**
     * ajax 角色添加
     * @param AdminConstant $diycode
     * @return array
     * @throws AdminException
     */
    public function ajaxAdd(AdminConstant $diycode){
        $name = RemoveXSS(input('name'));
        $roles = new Role();
        if (empty($name)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        if ( $roles ->getRoleNameExist($name)) {
            throw new AdminException('角色名称已存在', -1);
        }
        $insert_data = [
            'name' => $name,
            'status' => 1,
            'createtime' => time(),
        ];
        if(session('uid','','login') != -999){
            $this->is_write = true;
            $this->database = 'role';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员  【%s】 在  【%s】 添加了一个名称：【%s】的角色信息   ",session('username','','login'),date('Y-m-d H:i:s'),$name);
            $this->controller = 'Role';
            $this->action = 'add';
        }

        $res = $roles->insert_data($insert_data);
        return $res;
    }


    /**
     * ajax 角色修改
     * @param AdminConstant $diycode
     * @return array
     * @throws AdminException
     */
    public function ajaxUpdate(AdminConstant $diycode){
        $name = RemoveXSS(input('name'));
        $id = (int)(input('id'));
        if (empty($name)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $role = new Role();
        $update_data = [
            'name' => $name,
        ];
        $where = ['id'=>$id,'status'=>1];
        if (false == ( $role->getRoleInfoByFind($where))) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        if(session('uid','','login') != -999){
            $this->is_write = true;
            $this->database = 'role';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员  【%s】 在  【%s】 修改了一个名称：【%s】的角色信息   ",session('username','','login'),date('Y-m-d H:i:s'),$name);
            $this->controller = 'Role';
            $this->action = 'update';
        }

        $res = $role->update_data($where,$update_data);
        return $res;
    }


    /**
     * ajax 角色删除
     * @param AdminConstant $diycode
     * @return array
     * @throws AdminException
     */
    public function ajaxDelete(AdminConstant $diycode){
        $id = (int)(input('id'));
        if (empty($id)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $where = ['id'=>$id,'status'=>1];
        $field = 'id,name';
        if (false == ($r = $this->getRoleInfoByFind($where,$field))) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        $role = new Role();
        if(session('uid','','login') != -999){
            $this->is_write = true;
            $this->database = 'role';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员  【%s】 在  【%s】 删除了一个名称：【%s】的角色信息   ",session('username','','login'),date('Y-m-d H:i:s'),$r['name']);
            $this->controller = 'Role';
            $this->action = 'delete';
        }
        $res = $role->delete_data($where);
        return $res;
    }
}