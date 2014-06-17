<?php
/**
 * Cli模式下的初始加载
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .'Core.php';


/**
 * 获取参数
 */
function getArgv($index, $default = null)
{
    $val = isset($_SERVER['argv'][$index]) ? $_SERVER['argv'][$index] : $default;
    if (is_string($val)) {
        $val = filter_var($val, FILTER_SANITIZE_STRING);
    }
    return $val;
}
