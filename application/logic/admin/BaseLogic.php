<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/13
 * Time: 21:54
 */

namespace app\logic\admin;
use think\Db;
/**
 * 基类单例模式
 * Class BaseLogic
 * @package app\logic\admin
 */
 abstract class BaseLogic
{
     /**
      * 保存单利类的静态变量
      * @var null
      */
    protected static $instance = null;

    public  $admin_id = null;
    public  $database = null;
    public  $desc = null;
    public  $controller = null;
    public  $action = null;
    public  $module = 'admin';
    public  $status = 0;
    public  $create_at = null;
    public  $is_write = false;
     /**
      * 静态化实现单例
      * @return mixed
      */
    abstract static function getInstance();


     /**
      * 析构方法写入操作日志
      */
    public function __destruct()
    {
        if($this->is_write){
            // TODO: Implement __destruct() method.
            $data = [
                'admin_id' => $this->admin_id,
                'database' => $this->database,
                'desc' => $this->desc,
                'controller' => $this->controller,
                'action' => $this->action,
                'module' => $this->module,
                'create_at' => time(),
                'status' => $this->status,
            ];
            Db::name('admin_log')->insert($data); //插入到日志记录
        }

    }
 }