{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>错误信息</title>
</head>
<style>
    .btn {
        filter: none;
        text-shadow: none;
        font-size: 14px;
        color: rgb(51, 51, 51);
        cursor: pointer;
        font-family: 微软雅黑;
        box-shadow: none;
        border-width: 0;
        border-image: initial;
        padding: 7px 14px;
        outline: none;
        border-radius: 0!important;
        color: white;
        text-shadow: none;
        background-color: #332D46;
        border-radius: 5px!important;
    }
</style>
<body>
<div style="text-align: center;padding-top: 150px;">
    <img src="/static/common/images/data_error.png" style="width:40%;"/>
    <div style="margin: 3rem 0;font-size:2rem;color:#888;"><?php echo(strip_tags($msg));?></div>
    <div>
        <button class="btn" style="width:150px;font-size: 1.5rem;" onclick="window.location.href='<?php echo($url);?>'">返回</button>
    </div>
</div>
</body>
</html>
