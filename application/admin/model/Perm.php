<?php


namespace app\admin\model;

use think\Db;
use think\exception\PDOException;
use think\Model;

class Perm  extends Model
{
    /**
     * 查询权限是否存在
     * @param $id
     * @return bool
     */
    public function getPermExist($name){
        if(empty($name)){
            return false;
        }
        $where = ['name'=>RemoveXSS($name),'status'=>['<>',2]];
       // $where = [tp5_where_str('name','=',(string)$name),tp5_where_str('status','<>',2)];
        $res = $this->where($where)->count();
        if( $res == 1 ){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 获取菜单数据
     */
    public function getPermByWhere($where,$field='*'){
        if(empty($where)){
            return false;
        }
        $res = $this->where($where)->field($field)->find();
        return $res;
    }

    /**
     * 获取数据列表
     * @param array $where
     * @param int $page
     * @param int $pagesize
     * @param string $keyword
     */
    public function getList($select,$maxlevel=2,$level=0,&$arr=[])
    {
        if( $level > $maxlevel){
            return false;
        }
        if ($select) {
            foreach ($select as $item) {
                if($item['child']){
                    $child = $item['child'];
                    unset($item['child']);
                    $arr[]    = $item;
                    $this->getList($child,$maxlevel,$level+1,$arr);
                }else{
                    $arr[]    = $item;
                }
            }
            unset($item);
        }
        return $arr;
    }

    public function getTree($field,$str=' ═ ═ ',$maxlevel=2,$pid = 0,$level=0){
        if( $level > $maxlevel){
            return false;
        }
        if(session('uid', '','login') == -999){
            $where['pid'] = $pid;
            $where['status'] = ['<>',2];
            $select = $this->field($field)->where($where)->order('sortnum desc,create_time asc')->select();
            if ($select) {
                foreach ($select as $k=>&$item) {
                    if (isset($item->status)) {
                        if($item['status'] == 1){
                            $item['status'] = "<span style='color:#009688'>显示</span>";
                        }else{
                            $item['status'] = "<span style='color:#FF5722'>隐藏</span>";
                        }
                    }
                    if($item['pid'] !=0 ){
                        $item['name'] = str_repeat($str,$level).$item['name'];
                    }
                    if($item['pid'] !=0  && isset($item['controller']) && isset($item['action'])){
                        $item['url'] = url($item['controller'] . '/' . $item['action']);
                    }
                    //
                    $item['child'] = $this->getTree($field,$str,$maxlevel,$item['id'],$level+1);
                }
                unset($item);
            }
        }else{
            $where['pid'] = $pid;
            $where['status'] = ['<>',2];
            $select = $this->field($field)->where($where)->order('sortnum desc,create_time asc')->select();
            if ($select) {
                foreach ($select as $k=>&$item) {
                    if(in_array($item['id'],explode(',', session('role_id', '', 'login'))) || session('uid', '', 'login') ==1 ){
                        /*if (isset($item->create_time)) {
                            $item->create_time = empty($item->create_time)? '': date('Y-m-d H:i:s', $item->create_time);
                        }*/
                        if (isset($item->status)) {
                            if($item['status'] == 1){
                                $item['status'] = "<span style='color:#009688'>显示</span>";
                            }else{
                                $item['status'] = "<span style='color:#FF5722'>隐藏</span>";
                            }
                        }
                        if($item['pid'] !=0 ){
                            $item['name'] = str_repeat($str,$level).$item['name'];
                        }
                        if($item['pid'] !=0  && isset($item['controller']) && isset($item['action'])){
                            $item['url'] = url($item['controller'] . '/' . $item['action']);
                        }
                        //
                        $item['child'] = $this->getTree($field,$str,$maxlevel,$item['id'],$level+1);
                    }else{
                        unset($select[$k]);
                        continue;
                    }
                }
                unset($item);
            }
        }


        return obj_to_array($select);
    }


    public function getTrees($field,$str=' ═ ═ ',$maxlevel=2,$pid = 0,$level=0){
        if( $level > $maxlevel){
            return false;
        }
        if(session('uid', '','login') == -999){
            $where['pid'] = $pid;
            $where['status'] = ['<>',2];
            $select = $this->field($field)->where($where)->order('sortnum desc,create_time asc')->select();
            if ($select) {
                foreach ($select as $k=>&$item) {
                    if (isset($item['status'])) {
                        if($item['status'] == 1){
                            $item['status'] = "<span style='color:#009688'>显示</span>";
                        }else{
                            $item['status'] = "<span style='color:#FF5722'>隐藏</span>";
                        }
                    }
                    if($item['pid'] !=0 ){
                        $item['name'] = str_repeat($str,$level).$item['name'];
                    }
                    $item['child'] = $this->getTree($field,$str,$maxlevel,$item['id'],$level+1);

                }
                unset($item);
            }
        }else{
            $where['pid'] = $pid;
            $where['status'] = 1;
            $select = $this->field($field)->where($where)->order('sortnum desc,create_time asc')->select();
            if ($select) {
                foreach ($select as $k=>&$item) {
                    if(in_array($item['id'],explode(',', session('role_id', '', 'login'))) || session('uid', '', 'login') ==1){
                        /* if (isset($item['create_time'])) {
                             $item['create_time'] = empty($item['create_time'])? '': date('Y-m-d H:i:s', $item['create_time']);
                         }*/
                        if (isset($item['status'])) {
                            if($item['status'] == 1){
                                $item['status'] = "<span style='color:#009688'>显示</span>";
                            }else{
                                $item['status'] = "<span style='color:#FF5722'>隐藏</span>";
                            }
                        }
                        if($item['pid'] !=0 ){
                            $item['name'] = str_repeat($str,$level).$item['name'];
                        }
                        $item['child'] = $this->getTree($field,$str,$maxlevel,$item['id'],$level+1);
                    }else{
                        unset($select[$k]);
                        continue;
                    }


                }
                unset($item);
            }
        }

        return obj_to_array($select);
    }

    //修改权限
    public function update_data($where, $data)
    {
        try {
            $data['update_time'] = time();
            $res = $this->where($where)->update($data);
            if ($res) {
                return diy_json('', 1, '操作成功');
            } else {
                return diy_json('', -2, '操作失败');
            }
        } catch (PDOException $e) {
            return diy_json('', -1, $e->getMessage());
        }
    }

    //添加权限
    public function insert_data($data){
        try {
            $res = $this->insert($data);
            if ($res) {
                return diy_json('', 1, '操作成功');
            } else {
                return diy_json('', -2, '操作失败');
            }
        } catch (PDOException $e) {
            return diy_json('', -1, $e->getMessage());
        }
    }

    //删除权限
    public function delete_data($where){
        try {
            $data = ['status'=>2,'update_time'=>time()];
            $res = $this->where($where)->update($data);
            if ($res) {
                return diy_json('', 1, '操作成功');
            } else {
                return diy_json('', -2, '操作失败');
            }
        } catch (PDOException $e) {
            return diy_json('', -1, $e->getMessage());
        }
    }


    /**
     * 查找节点id
     * @param $where
     * @return bool|mixed
     */
    public function getPermId($where){
        if(empty($where)){
            return false;
        }
        return $this->where($where)->value('id');
    }
}
