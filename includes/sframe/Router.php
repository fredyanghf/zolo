<?php
/**
 * 路由
 *
 * @package SFramework
 * @author fredyang
 * @version $Id$
 */

class SF_Router
{
    protected $_request_path = '';
    protected $_app_path = '';
    protected $_config = array(
        'route' => array(
            'controller' => 0,
            'action' => 1
        ),
        'notfound' => null
    );
    protected $_controller = 'index';
    protected $_action = 'index';
    protected $_data = array();
    
    
    public function __construct($app_path, $config = array())
    {
        $this->_request_path = SF_Request::getPath();
        $this->_app_path = $app_path;
        $this->_config = $config;
    }
    
    
    /**
     * 分发执行
     */
    public function dispatch()
    {
        $path = explode('/', $this->_request_path);
        foreach ($this->_config['route'] as $key=>$idx) {
            $this->_data[$key] = empty($path[$idx]) ? null : filter_var($path[$idx], FILTER_SANITIZE_STRING);
        }
        if (!empty($this->_data['controller'])) {
            $this->_controller = $this->_data['controller'];
        }
        if (!empty($this->_data['action'])) {
            $this->_action = $this->_data['action'];
        }
        
        // 加载controller->action
        $controller_file = $this->_app_path .'/controller/'. $this->_controller .'.php';
        if (!is_file($controller_file)) {
            self::notfound('Controller File "'. $this->_controller .'" Not Exists');
        }
        require_once $controller_file;
        $controller_class = 'C_'. ucfirst($this->_controller);
        if (!class_exists($controller_class)) {
            self::notfound('Controller Name "'. $controller_class .'" Not Exists');
        }
        $controller_class = new $controller_class($this);
        $controller_class->init();
        $action_method = $this->_action .'Action';
        if (!method_exists($controller_class, $action_method)) {
            self::notfound('Action "'. $this->_controller .'->'. $this->_action .'" Not Exists');
        }
        $controller_class->$action_method();
    }
    
    public function notfound($message = '')
    {
        if (isset($this->_config['notfound']) && is_callable($this->_config['notfound'])) {
            $this->_config['notfound']($message);
        } else {
            $message || $message = 'Page Not Found!';
            echo $message;
            exit;
        }
    }
    
    public function getData($key = '', $default = null)
    {
        if ($key) {
            return isset($this->_data[$key]) ? $this->_data[$key] : $default;
        } else {
            return $this->_data;
        }
    }
    
    public function getController()
    {
        return $this->_controller;
    }
    
    public function getAction()
    {
        return $this->_action;
    }
    
    public function setAction($action)
    {
        $this->_action = $action;
    }
}
