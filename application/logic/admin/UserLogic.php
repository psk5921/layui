<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/13
 * Time: 22:21
 */

namespace app\logic\admin;

use app\exception\AdminException;
use app\constant\AdminConstant;
use app\admin\model\Admin;
use app\admin\model\Role;
use think\Db;
class UserLogic  extends  BaseLogic
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
     * ajax 添加管理员逻辑
     */
    public function ajaxAdd(AdminConstant $diycode){
        $username = RemoveXSS(input('username'));
        $password = RemoveXSS(input('password'));
        $status = (int)input('status');
        $role_id = (int)input('role_id');
        if (empty($username) || empty($password)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $admin = new Admin();
        $role = new Role();
        if ($admin->getAdminInfo($username)) {
            throw new AdminException('管理员名称已存在', -1);
        }
        $insert_data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'createtime' => time(),
        ];

        if(!empty($role_id) && !$role->getRoleExist($role_id)){
            throw new AdminException($diycode::ROLE_NOT_EXIST[1], -1);
        }else{
            $insert_data['role_id']  = $role_id;
        }
        if(!in_array($status,[1,2])){
            throw new AdminException('状态选择有误', -1);
        }else{
            $insert_data['status']  = $status;
        }
        if( session('uid','','login') != -999 ){
            $this->is_write = true;
            $this->database = 'admin';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员  【%s】 在  【%s】 添加了一个名称：【%s】的管理员",session('username','','login'),date('Y-m-d H:i:s'),$username);
            $this->controller = 'User';
            $this->action = 'add';
        }

        //$where = [tp5_where_str('id', '=', $id), tp5_where_str('status', '=', 1)];
        $res = $admin->insert_data($insert_data);
        return $res;
    }

    /**
     * ajax 修改管理员逻辑
     */
    public function ajaxUpdate(AdminConstant $diycode){
        $username = RemoveXSS(input('username'));
        $password = RemoveXSS(input('password'));
        $status = (int)input('status');
        $role_id = (int)input('role_id');
        $id = (int)(input('id'));
        if (empty($username)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $update_data = [
            'username' => $username,
        ];
        if(!empty($password)){
            $update_data['password'] = password_hash($password, PASSWORD_BCRYPT);
        }
        $where = ['id'=>1,'status'=>['<>',0]];
        $admin = new Admin();
        $role = new Role();
       // $where = [tp5_where_str('id', '=', $id), tp5_where_str('status', '<>', 0)];
        $field = 'id,username,status,role_id';
        if (false == ($admin->getAdminByWhere($where,$field))) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }

        if(!empty($role_id) && !$role->getRoleExist($role_id)){
            throw new AdminException($diycode::ROLE_NOT_EXIST[1], -1);
        }else{
            $update_data['role_id']  = $role_id;
        }
        if(!in_array($status,[1,2])){
            throw new AdminException('状态选择有误', -1);
        }else{
            $update_data['status']  = $status;
        }
        $rwhere = [
           'id' => $id,
           'status' => 1,
        ];
        if(session('uid','','login') != -999){
            $this->is_write = true;
            $this->database = 'admin';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员  【%s】 在  【%s】 修改了管理员id:【%d】的名称：为 【%s】  ",session('username','','login'),date('Y-m-d H:i:s'),$id,$username);
            $this->controller = 'User';
            $this->action = 'update';
        }

        //$where = [tp5_where_str('id', '=', $id), tp5_where_str('status', '=', 1)];
        $res = $admin->update_data($rwhere,$update_data);
        return $res;
    }


    /**
     * ajax 删除管理员
     */
    public function ajaxDelete(AdminConstant $diycode){
        $id = RemoveXSS(input('id'));
        if (empty($id)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $where['id'] = (int)$id;
        $where['status'] = ['<>',0];
        $admin = new Admin();
        if (false == ($user = $admin->getAdminByWhere($where))) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        if(session('uid','','login') != -999){
            $this->is_write = true;
            $this->database = 'admin';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员  【%s】 在  【%s】 删除了一个名称：【%s】的管理员   ",session('username','','login'),date('Y-m-d H:i:s'),$user['username']);
            $this->controller = 'User';
            $this->action = 'delete';
        }
        $res = $admin->delete_data($where);
        return $res;
    }

    /**
     * ajax 获取管理员列表
     */
    public function ajaxList(){
        $page = (int)input('page') > 0 ? (int)input('page') - 1 : 0; //当前页数
        $pagesize = (int)input('limit') > 0 ? (int)input('limit') : 10; //分页数量
        $where['status'] = [ '>', 0];
        if (input('username')) {
            $where['username'] = [ 'like', '%' . RemoveXSS(input('username')) . '%'];
        }
        $admin = new Admin();
        $field = 'id,username,role_id,createtime,logintime,loginip,logincount,status';
        $list = $admin->getList($where, $page, $pagesize, $field);
        return $list;
    }
}