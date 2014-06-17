<?php
/**
 * 框架核心
 * 定义了最基本的常量，类和方法
 */

header("content-Type: text/html; charset=UTF-8");
ini_set('date.timezone', 'Asia/Shanghai');
ini_set('magic_quotes_runtime', 0);


// 核心常量
define('SF_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('D_TIMESTAMP', time());
define('D_DATETIME', date('Y-m-d H:i:s', D_TIMESTAMP));




/**
 * 获取SERVER变量
 */
function getServer($key, $default = null)
{
    return isset($_SERVER[$key]) ? filter_var($_SERVER[$key], FILTER_SANITIZE_STRING) : $default;
}

/**
 * 自动加载类
 * 按下划线分割定义路径
 */
class SF_Autoloader
{
    protected static $_loader = array();

    public static function addLoader($namespace, $loader)
    {
        self::$_loader[$namespace] = $loader;
    }

    public static function autoload($class_name)
    {
        if (class_exists($class_name)) {
            return;
        }
        $split = explode('_', $class_name);
        $namespace = array_shift($split);
        if (!array_key_exists($namespace, self::$_loader)) {
            return;
        }
        $loader = self::$_loader[$namespace];
        $class_file = $loader($split);
        if (!$class_file || !is_file($class_file)) {
            throw new SF_Exception('自动加载的文件不存在：'. $class_name);
        }
        require_once $class_file;
    }
}

// 框架自动加载定义
SF_Autoloader::addLoader('SF', function($split){
    $class_file = SF_PATH . DS . implode(DS, $split);
    if (is_file($class_file .'.php')) {
        return $class_file .'.php';
    }
    if (is_dir($class_file)) {
        return $class_file .DS . array_pop($split) .'.php';
    }
    return false;
});

// 注册自动加载
spl_autoload_register(array('SF_Autoloader', 'autoload'));