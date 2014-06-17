<?php
/**
 * Web模式下的初始加载
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR .'Core.php';

/**
 * 获取REQUEST 
 */
function getRequest($key, $default = null)
{
    return filter_has_var(INPUT_POST, $key) ? getPost($key, $default) : getGet($key, $default);
}
function hasRequest($key)
{
    return (hasGet($key) || hasPost($key));
}

/**
 * 获取GET请求 
 */
function getGet($key, $default = null)
{
    $val = isset($_GET[$key]) ? $_GET[$key] : $default;
    if (is_string($val)) {
        $val = filter_var($val, FILTER_SANITIZE_STRING);
    }
    return $val;
}
function hasGet($key)
{
    return filter_has_var(INPUT_GET, $key);
}

/**
 * 获取POST请求 
 */
function getPost($key, $default = null)
{
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}
function hasPost($key)
{
    return filter_has_var(INPUT_POST, $key);
}

/**
 * 获取Cookie
 */
function getCookie($key, $default = null)
{
    $val = isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
    if (is_string($val)) {
        $val = filter_var($val, FILTER_SANITIZE_STRING);
    }
    return $val;
}

/**
 * 获取Session
 */
function getSession($key, $default = null)
{
    $val = isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    if (is_string($val)) {
        $val = filter_var($val, FILTER_SANITIZE_STRING);
    }
    return $val;
}

