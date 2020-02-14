<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/3
 * Time: 22:43
 */

namespace app\exception;


use think\Exception;

/**
 * 后台自定义错误
 * Class AdminException
 * @package app\exception
 */
class AdminException  extends Exception
{
    private $statusCode;
    private $headers;
    protected $message;

    public function __construct($statusCode, $message = null, \Exception $previous = null, array $headers = [], $code = 0)
    {
        $this->statusCode = $statusCode;
        $this->headers    = $headers;
        $this->message    = $message;

        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getHeaders()
    {
        return $this->headers;
    }
    public function getError()
    {
        return $this->message;
    }
}