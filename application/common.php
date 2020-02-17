<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use  app\constant\AdminConstant;
/**
 * 转换状态显示
 * @param $status
 * @param $str
 */
function showStatus($status, $str)
{
    $arr = explode(':', $str);
    $key = explode(',', $arr[1]);
    $name = explode(',', $arr[0]);
    foreach ($name as $k => $v) {
        $res[$key[$k]] = $v;
    }
    if ($status !== '' && isset($res[$status])) {
        echo $res[$status];
    }
}

function showStatus1($status, $str)
{
    $arr = explode(':', $str);
    $key = explode(',', $arr[1]);
    $name = explode(',', $arr[0]);
    foreach ($name as $k => $v) {
        $res[$key[$k]] = $v;
    }
    if ($status !== '' && isset($res[$status])) {
        return $res[$status];
    }
}

/**
 * 通过生日得到岁
 * @param $birthday
 * @return bool|int
 * 开发：jack.chen
 */
function birthday($birthday)
{
    $age = strtotime($birthday);
    if ($age === false) {
        return false;
    }
    list($y1, $m1, $d1) = explode("-", date("Y-m-d", $age));
    $now = strtotime("now");
    list($y2, $m2, $d2) = explode("-", date("Y-m-d", $now));
    $age = $y2 - $y1;
    if ((int)($m2 . $d2) < (int)($m1 . $d1))
        $age -= 1;
    return $age;
}

/**
 * 转换状态显示
 * @param $status
 * @param $str
 * @return mixed
 */
function showStatusV2($status, $str)
{
    $arr = explode(':', $str);
    $key = explode(',', $arr[1]);
    $name = explode(',', $arr[0]);
    foreach ($name as $k => $v) {
        $res[$key[$k]] = $v;
    }
    if ($status !== '' && isset($res[$status])) {
        return $res[$status];
    }
}

/**
 * 获取文本域中的图片信息
 * @param $data
 * @param array $types
 * @return mixed
 */
function getTextAreaImg($data, $types = ['jpg', 'png'])
{
    $type = '';
    foreach ($types as $v) {
        $type .= "." . $v . "|";
    }
    substr($type, -1);
    $pattern = "/[img|IMG].*?src=['|\"](.*?(?:[" . $type . "]))['|\"].*?[\/]?>/";
    preg_match_all($pattern, $data, $match);
    return $match[1];
}

function imageUrl($content)
{
    $content = str_replace('&quot;', "'", $content);
    $url = "http://" . $_SERVER['SERVER_NAME'];
    $pregRule = "/<[img|IMG].*?src=[\'|\"](?!http)(.*?(?:[\.jpg|\.jpeg|\.png|\.gif|\.bmp]))[\'|\"].*?[\/]?>/";
    $content = preg_replace($pregRule, '<img src="' . $url . '${1}" style="max-width:100%">', $content);
    return $content;
}

//路径http转换
function setUrlHttp($url)
{
    $res = strpos($url, 'http');
    if ($res >= 0 && $res !== false) {
        return $url;
    }
    return \think\Config::get('admin_host') . $url;
}

/**
 * 移除内容中的html,并截取长度
 * @param $content
 * @param $length
 * @return string
 */
function getTextNoHtml($content, $length)
{
    $content_02 = htmlspecialchars_decode($content);//把一些预定义的 HTML 实体转换为字符
    $content_03 = str_replace("&nbsp;", "", $content_02);//将空格替换成空
    $contents = strip_tags($content_03);//函数剥去字符串中的 HTML、XML 以及 PHP 的标签,获取纯文本内容
    $con = mb_substr($contents, 0, $length, "utf-8");//返回字符串中的前100字符串长度的字符
    return $con;
}

/**
 * 手机正则匹配
 * @param $test
 * @return bool
 */
function check_phone($test)
{
    if (!is_numeric($test)) {
        return false;
    }
    $rule = '#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#';
    return preg_match($rule, $test) ? true : false;
}

/**
 * 验证邮箱
 * @param $test
 * @return bool
 */
function check_email($test)
{
    $rule = '/^[a-zA-Z0-9][a-zA-Z0-9._-]*\@[a-zA-Z0-9]+\.[a-zA-Z0-9\.]+$/A';
    return preg_match($rule, $test) ? true : false;
}

/**
 * 验证身份证
 * @param $test
 * @return bool
 */
function check_IdCard($test)
{
    $rule = '/^(([0-9]{15})|([0-9]{18})|([0-9]{17}x))$/';
    return preg_match($rule, $test) ? true : false;

}


/**
 * 时间格式返回
 * @param $time
 * @return false|string
 */
function wordTime($time)
{
    $time = (int)substr($time, 0, 10);
    $int = time() - $time;
    $str = '';
    if ($int <= 30) {
        $str = sprintf('刚刚', $int);
    } elseif ($int < 60) {
        $str = sprintf('%d秒前', $int);
    } elseif ($int < 3600) {
        $str = sprintf('%d分钟前', floor($int / 60));
    } elseif ($int < 86400) {
        $str = sprintf('%d小时前', floor($int / 3600));
    } elseif ($int < 2592000) {
        $str = sprintf('%d天前', floor($int / 86400));
    } else {
        $str = date('m-d H:i', $time);
    }
    return $str;
}


/**
 * 二维数组排序
 * @param $arr
 * @param $value
 * @param $sort
 * @return mixed
 */
function arraySort($arr, $value, $sort)
{
    foreach ($arr as $item) {
        $k[] = $item[$value];
    }
    if ($sort == 'asc') {
        array_multisort($k, SORT_ASC, $arr);
    } elseif ($sort == 'desc') {
        array_multisort($k, SORT_DESC, $arr);
    }
    return $arr;
}

/**
 * 二维数组去重
 * @param $arr
 * @param $key
 * @return array
 */
function repeat_array($arr, $key)
{
    $tmp_arr = [];
    foreach ($arr as $k => $v) {
        if (in_array($v[$key], $tmp_arr)) {
            $re = array_search($v[$key], $tmp_arr);
            unset($tmp_arr[$re]);
        }
        $tmp_arr[$k] = $v[$key];
    }
    foreach ($tmp_arr as $k => $v) {
        if (array_key_exists($k, $arr)) {
            $tmp[] = $arr[$k];
        }
    }
    return $tmp;
}

/**
 * 二维数组求和
 * @param $arr 数组
 * @param $key 相同key
 * @param $sum 求和值
 * @return mixed
 */
function array_sumV2($arr, $key, $sum)
{
    foreach ($arr as $k => $v) {
        if (!isset($item[$v[$key]])) {
            $item[$v[$key]] = $v;
        } else {
            $item[$v[$key]][$sum] += $v[$sum];
        }
    }
    return $item;
}

/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @return mixed
 */
function get_client_ip($type = 0)
{
    $type = $type ? 1 : 0;
    static $ip = NULL;
    if ($ip !== NULL) return $ip[$type];
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $pos = array_search('unknown', $arr);
        if (false !== $pos) unset($arr[$pos]);
        $ip = trim($arr[0]);
    } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = ip2long($ip);
    $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}

/**
 * 根据日期获取年龄
 * @param $birthday
 * @return false|string
 */
function getAge($birthday)
{
    $birthday = strtotime($birthday);
    //格式化出生时间年月日
    $byear = date('Y', $birthday);
    $bmonth = date('m', $birthday);
    $bday = date('d', $birthday);

    //格式化当前时间年月日
    $tyear = date('Y');
    $tmonth = date('m');
    $tday = date('d');

    //开始计算年龄
    $age = $tyear - $byear;
    if ($bmonth > $tmonth || $bmonth == $tmonth && $bday > $tday) {
        $age--;
    }
    return $age;
}

/**
 * 根据key合并二维数组
 * @param $arr
 * @param $key
 * @return array
 */
function array_group_by($arr, $key)
{
    $grouped = [];
    foreach ($arr as $value) {
        $grouped[$value[$key]][] = $value;
    }
    // Recursively build a nested grouping if more parameters are supplied
    // Each grouped array value is grouped according to the next sequential key
    if (func_num_args() > 2) {
        $args = func_get_args();
        foreach ($grouped as $key => $value) {
            $parms = array_merge([$value], array_slice($args, 2, func_num_args()));
            $grouped[$key] = call_user_func_array('array_group_by', $parms);
        }
    }
    return $grouped;
}

function test($a = 0, &$result = array(), $type, $name)
{
    $a++;
    $type_id = array_keys($type);
    if ($a < $type_id) {
        foreach ($name[$type_id] as $item) {
            $result[] = $item;
        }
        test($a, $result);
    }
    return $result;
}

function isMobile()
{
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    if (isset($_SERVER['HTTP_VIA'])) {
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    if (isset($_SERVER['HTTP_ACCEPT'])) {
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'textml') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'textml')))) {
            return true;
        }
    }
    return false;
}

function changeTimeType($seconds)
{
    if ($seconds > 3600) {
        $hours = intval($seconds / 3600);
        $minutes = $seconds % 3600;
        $time = $hours . ":" . gmstrftime('%M:%S', $minutes);
    } else {
        $time = gmstrftime('%H:%M:%S', $seconds);
    }
    return $time;
}

function weekday($time)
{
    if (is_numeric($time)) {
        $weekday = array('周日', '周一', '周二', '周三', '周四', '周五', '周六');
        return $weekday[date('w', $time)];
    }
    return false;
}


//是否来源于手机
function source_mobile()
{
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 判断手机发送的客户端标志,兼容性有待提高,把常见的类型放到前面
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'android',
            'iphone',
            'samsung',
            'ucweb',
            'wap',
            'mobile',
            'nokia',
            'sony',
            'ericsson',
            'mot',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'ipod',
            'blackberry',
            'meizu',
            'netfront',
            'symbian',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}


if (!function_exists('pkcs5_pad')) {
    /**
     * 字符串填充
     * @param $text
     * @param $blocksize
     * @return string
     */
    function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }
}

if (!function_exists('urlsafe_b64encode')) {
    /**
     * urlbase64参数安全编码
     * @param $string
     * @return mixed|string
     */
    function urlsafe_b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', '.'), $data);
        return $data;
    }
}

if (!function_exists('urlsafe_b64decode')) {
    /**
     * urlbase64参数安全解码
     * @param $string
     * @return mixed|string
     */
    function urlsafe_b64decode($string)
    {
        $data = str_replace(array('-', '_', '.'), array('+', '/', '='), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
}


if (!function_exists('diy_json')) {
    /**
     * 自定义json 响应
     * @param $datas
     * @param $codes
     * @param $msgs
     * @return array
     */
    function diy_json($datas, $codes, $msgs)
    {
        $data = $datas;
        $code = $codes;
        $msg = $msgs;
        return compact('data', 'code', 'msg');
    }
}


if (!function_exists('memory_usage')) {
    /**
     * 查看已使用内存
     * @return string
     */
    function memory_usage()
    {
        $memory = (!function_exists('memory_get_usage')) ? '0' : round(memory_get_usage() / 1024 / 1024, 2) . 'M';
        return $memory;
    }
}

if (!function_exists('is_http')) {
    /**
     * 判断http 还是https
     * @return string
     */
    function is_http()
    {
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        return $http_type;
    }
}


if (!function_exists('layui_json')) {
    /**
     * @param $codes //解析接口状态
     * @param $msgs //解析提示文本
     * @param $counts //解析数据长度
     * @param $datas //解析数据列表
     * @return array
     */
    function layui_json($codes, $msgs, $counts, $datas)
    {
        $data = $datas;
        $code = $codes;
        $msg = $msgs;
        $count = $counts;
        return compact('code', 'msg', 'count', 'data');
    }
}


if (!function_exists('tp5_where_str')) {
    /**
     * tp5 where 构造
     * @param $key
     * @param $exp
     * @param $value
     * @return array
     */
    function tp5_where_str($key, $exp, $value)
    {
        $data = [(string)$key, (string)$exp, $value];
        return $data;
    }
}

if (!function_exists('RemoveXSS')) {

    /**
     * 防止xss代码攻击
     * @param $val
     * @return string|string[]|null
     */
    function RemoveXSS($val)
    {
        // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
        // this prevents some character re-spacing such as <java\0script>
        // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
        $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
        // straight replacements, the user should never need these since they're normal characters
        // this prevents like <IMG SRC=@avascript:alert('XSS')>
        $search = 'abcdefghijklmnopqrstuvwxyz';
        $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $search .= '1234567890!@#$%^&*()';
        $search .= '~`";:?+/={}[]-_|\'\\';
        for ($i = 0; $i < strlen($search); $i++) {
            // ;? matches the ;, which is optional
            // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

            // @ @ search for the hex values
            $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ;
            // @ @ 0{0,7} matches '0' zero to seven times
            $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ;
        }

        // now the only remaining whitespace attacks are \t, \n, and \r
        $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
        $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
        $ra = array_merge($ra1, $ra2);

        $found = true; // keep replacing as long as the previous round replaced something
        while ($found == true) {
            $val_before = $val;
            for ($i = 0; $i < sizeof($ra); $i++) {
                $pattern = '/';
                for ($j = 0; $j < strlen($ra[$i]); $j++) {
                    if ($j > 0) {
                        $pattern .= '(';
                        $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                        $pattern .= '|';
                        $pattern .= '|(&#0{0,8}([9|10|13]);)';
                        $pattern .= ')*';
                    }
                    $pattern .= $ra[$i][$j];
                }
                $pattern .= '/i';
                $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
                $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
                if ($val_before == $val) {
                    // no replacements were made, so exit the loop
                    $found = false;
                }
            }
        }
        return $val;
    }
}

/**
 * 返回json 数据格式
 */
if (!function_exists('api_json')) {
    function api_json($code = 0, $message = '', $data = '')
    {
        return json_encode(compact('code', 'message', 'data'), JSON_UNESCAPED_UNICODE);
    }
}

/**
 * 返回数组数据格式
 */
if (!function_exists('api_json_middleware')) {
    function api_json_middleware($code = 0, $message = '', $data = '')
    {
        return compact('code', 'message', 'data');
    }
}

/**
 * 字符反序列化失败的处理
 *
 */
if (!function_exists('mb_unserialize')) {
    function mb_unserialize($str)
    {
        return preg_replace_callback('#s:(\d+):"(.*?)";#s', function ($match) {
            return 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
        }, $str);
    }
}

/**
 * 写入消息记录
 */
if (!function_exists('write_msg')) {
    function write_msg($openid, $title, $content)
    {
        if (empty($openid) || empty($title) || empty($content)) {
            return false;
        }
        $insert = [
            'openid' => $openid,
            'title' => $title,
            'content' => $content,
            'status' => 0,
            'createtime' => time(),
        ];
        return \think\Db::name('user_message')->insert($insert);
    }
}


/**
 * 对象转化成数组
 */
if (!function_exists('obj_to_array')) {
    function obj_to_array($obj)
    {
        if (is_null($obj)) {
            return false;
        }
        return json_decode(json_encode($obj), true);
    }
}

if (!function_exists('JumpLogin')) {
    function JumpLogin()
    {
        session('null', 'login');
        $url = url('login/index');
        $str = "<script>
document.title = '跳转提示信息';
   document.write('无权限操作,即将跳转到登录页面');
    setTimeout(function() {
    location.href = '" . $url . "'},2000)</script>";
        die($str);
    }
}

if (!function_exists('AjaxJumpLogin')) {
    function AjaxJumpLogin(AdminConstant $diyCodeConstant)
    {
        session(null, 'login');
        exit(json_encode(diy_json('', $diyCodeConstant::LOGIN_USER_INFO_EXPIRED[0], $diyCodeConstant::LOGIN_USER_INFO_EXPIRED[1]), JSON_UNESCAPED_UNICODE));
    }
}

if (!function_exists('CommonJumpLogin')) {
    function CommonJumpLogin()
    {
        session(null, 'login');
        $url = url('login/index');
        $str = "<script src=\"/static/admin/layui/layui.js\" charset=\"utf-8\"></script>
<script src=\"/static/admin/js/xadmin.js\" charset=\"utf-8\"></script>
<script>
try{
xadmin.close();
location.reload();
parent.parent.location.href = '" . $url . "';
}catch (e) {
  parent.location.href = '" . $url . "';
}

</script>
";
        die($str);
    }
}