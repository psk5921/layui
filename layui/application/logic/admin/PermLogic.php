<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 13:07
 */

namespace app\logic\admin;


use app\admin\model\Perm;
use app\constant\AdminConstant;
use app\exception\AdminException;
use  app\admin\model\Role;
use app\admin\validate\Perm as P_validate;
class PermLogic  extends BaseLogic
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

    public function getPermList(AdminConstant $diycode){
        $id = RemoveXSS(input('id'));
        if (empty($id)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $role = new Role();
        $where = ['id'=>$id,'status'=>1];
        if (false == ( $r = $role->getRoleInfoByFind($where))) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        $perm = input('perm/a');
        if(!empty($perm) && !is_array($perm)){
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $perm = empty($perm)?'':implode(',',$perm);
        $update_data = [
            'menu_id' => $perm,
            'updatetime' => time(),
        ];
        $res = $role->update_data($where,$update_data);
        if(session('uid','','login') != -999){
            $this->is_write = true;
            $this->database = 'role';
            $this->admin_id = session('uid','','login');
            $this->desc = sprintf("管理员 【%s】 在 【%s】 修改角色名称  【%s】 的权限！",session('username','','login'),date('Y-m-d H:i:s'),$r['name']);
            $this->controller = 'Role';
            $this->action = 'perm';
        }
        return $res;
    }

    /**
     * 获取节点id
     * @param $where
     * @return bool|mixed
     */
    public function getPermId($where){
        $role = new Perm();
        return $role->getPermId($where);
    }

    /**
     * 获取节点数据
     * @param $where
     * @return array|bool|false|mixed|null|\PDOStatement|string|\think\Model
     */
    public function getPermByWhere($where){
        $role = new Perm();
        return $role->getPermByWhere($where);
    }

    /**
     * 获取菜单列表
     * @return array
     */
    public function getMenuList(){
        $Perms = new Perm();
        $field = 'id,name,status,create_time,controller,action,sortnum,pid';
        $select = $Perms->getTree($field);
        $list = $Perms->getList($select);
        return layui_json(0,'',0,$list);
    }

    /**
     * 获取权限数据
     * @return array|bool|false|mixed|\PDOStatement|string|\think\Collection
     */
    public function getTreeList(){
        $Perms = new Perm();
        $field = 'id,name,pid';
        $select = $Perms->getTree($field, '— — ', 1);
        $select = $Perms->getList($select, 1);
        return $select;
    }

    /**
     * 获取权限数据
     * @return array|bool|false|mixed|\PDOStatement|string|\think\Collection
     */
    public function getTreeList1(){
        $Perms = new Perm();
        $field = 'id,name,pid';
        $select = $Perms->getTree($field, '', 1);
        $select = $Perms->getList($select, 1);
        return $select;
    }


    /**
     * 添加菜单权限
     * @param AdminConstant $diycode
     * @return array
     * @throws AdminException
     */
    public function ajaxAdd(AdminConstant $diycode){
        $sortnum = (int)(input('sortnum'));
        $name = RemoveXSS(input('name'));
        $pid = (int)(input('pid'));
        $controller = strtolower(RemoveXSS(input('controller')));
        $action = strtolower(RemoveXSS(input('action')));
        $iconfont = RemoveXSS(input('iconfont'));
        $status = (int)(input('status'));
        $is_menu = (int)(input('is_menu'));
        $Perms = new Perm;
        if (empty($name)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        } else {
            if ($Perms->getPermExist($name)) {
                throw new AdminException('该菜单名称已存在', $diycode::INFO_REPEAT[0]);
            }
        }
        $where = ['id'=>$pid,'status'=>['<>',2]];
        if (!empty($pid) && !$Perms->getPermByWhere($where)) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        if (empty($controller) || empty($action)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        if (!in_array($status, [0, 1])) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        if (!in_array($is_menu, [0, 1])) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $insert_data = [
            'name' => $name,
            'sortnum' => $sortnum,
            'pid' => $pid,
            'controller' => $controller,
            'action' => $action,
            'iconfont' => $iconfont,
            'status' => $status,
            'is_menu' => $is_menu,
            'create_time' => time(),
        ];
        $validate = new P_validate();
        if (!$validate->check($insert_data, [], 'common')) {
            throw new AdminException($diycode::VALIDATE_ERROR[1], $validate->getError());
        }
        $res = $Perms->insert_data($insert_data);
        return $res;
    }

    /**
     * 修改菜单权限
     * @param AdminConstant $diycode
     * @return array
     * @throws AdminException
     */
    public function ajaxUpdate(AdminConstant $diycode){
        $sortnum = (int)(input('sortnum'));
        $name = RemoveXSS(input('name'));
        $controller = strtolower(RemoveXSS(input('controller')));
        $action = strtolower(RemoveXSS(input('action')));
        $iconfont = RemoveXSS(input('iconfont'));
        $status = (int)(input('status'));
        $is_menu = (int)(input('is_menu'));
        $id = (int)(input('id'));
        $Perms = new Perm();
        if (empty($id)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        } else {
            $where = ['id'=>$id,'status'=>['<>',2]];
            if (!$Perms->getPermByWhere($where)) {
                throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
            }
        }
        if (empty($name)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        if (empty($controller) || empty($action)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        if (!in_array($status, [0, 1])) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        if (!in_array($is_menu, [0, 1])) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $update_data = [
            'name' => $name,
            'sortnum' => $sortnum,
            'controller' => $controller,
            'action' => $action,
            'iconfont' => $iconfont,
            'status' => $status,
            'is_menu' => $is_menu,
            'update_time'=>time()
        ];
        $validate = new P_validate();
        if (!$validate->check($update_data, [], 'common')) {
            throw new AdminException($diycode::VALIDATE_ERROR[1], $validate->getError());
        }
        $res = $Perms->update_data($where, $update_data);
        return $res;
    }


    /**
     * 删除菜单权限
     * @return array
     * @throws AdminException
     */
    public function ajaxDelete(AdminConstant $diycode){
        $id = (int)(input('id'));
        if (empty($id)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $role = new Perm();
        $where = ['id'=>$id,'status'=>['<>',2]];
        if (!$role->getPermByWhere($where)) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        $res = $role->delete_data($where);
        return $res;
    }


    public function sortnum(AdminConstant $diycode){
        $id = (int)(input('id'));
        $sortnum = (int)(input('sortnum'));
        if (empty($id)) {
            throw new AdminException($diycode::PARAM_ERROR[1], $diycode::PARAM_ERROR[0]);
        }
        $role = new Perm();
        $where = ['id'=>$id,'status'=>['<>',2]];
        if (!$role->getPermByWhere($where)) {
            throw new AdminException($diycode::INFO_NOT_FOUND[1], $diycode::INFO_NOT_FOUND[0]);
        }
        $role = new Perm();
        $data = [
            'sortnum' => $sortnum
        ];
        $res = $role->update_data($where, $data);
        return $res;
    }

}