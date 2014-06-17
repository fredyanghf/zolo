<?php
/**
 * Application
 *
 * @package Application
 * @author fredyang
 * @version $Id$
 */
class SF_Application
{
    protected static $_config = array(
        'app_path' => '',
        'router' => array(),
        'view' => array()
    );
    
    /**
     * 执行
     */
    public static function run($config)
    {
        self::$_config = $config;
        $router = new SF_Router(self::$_config['app_path'], self::$_config['router']);
        $router->dispatch();
    }
    
    
    /**
     * 模板显示
     */
    public static function view($template, $vals = array())
    {
        self::getView()->render($template, $vals);
    }
    
    
    /**
     * 实例view
     * @return \SF_View
     */
    public static function getView()
    {
        return new SF_View(self::$_config['view']);
    }
}