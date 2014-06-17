<?php
/**
 * 视图
 *
 * @package View
 * @author fredyang
 * @version $Id$
 */
class SF_View
{
    /**
     * 配置样式
     */
    protected $_config = array(
        'view_path' => ''
    );
    protected $_view_path = '';
    protected $_template = '';
    protected $_vals = array();
    
    public function __construct($config)
    {
        $this->_config = $config;
        $this->_view_path = isset($this->_config['view_path']) ? $this->_config['view_path'] : '';
    }
    
    /**
     * k-v值
     * @param type $vals
     */
    public function setVals($vals)
    {
        foreach ($vals as $k=>$v) {
            $this->_vals[$k] = $v;
        }
    }
    
    /**
     * 获取值
     */
    public function getVals()
    {
        return $this->_vals;
    }
    
    /**
     * 用于操作类似赋值：$view->test = 1;
     */
    public function __set($key, $val)
    {
        $this->_vals[$key] = $val;
    }
    
    /**
     * 用于操作类似赋值：echo $view->test;
     */
    public function __get($key)
    {
        return isset($this->_vals[$key]) ? $this->_vals[$key] : null;
    }
    
    /**
     * isset判断key是否存在
     */
    public function __isset($key)
    {
        return isset($this->_vals[$key]);
    }
    
    /**
     * 设置模板
     */
    public function setTemplate($template)
    {
        $this->_template = $template;
    }
    
    /**
     * 显示模板
     * @param string $template 模板相对view_path的路径
     * @param array $vals 模板内变量
     */
    public function render($template = '', $vals = array())
    {
        if ($template) {
            $this->setTemplate($template);
        }
        if (!empty($vals)) {
            $this->setVals($vals);
        }
        $template_file = $this->_view_path .'/'. $this->_template;
        if (!is_file($template_file)) {
            throw new SF_Exception('Template "'. $this->_template .'" Not Exists.');
        }
        include $template_file;
    }
    
    /**
     * 获取内容而不显示
     */
    public function fetch($template = '', $vals = array())
    {
        ob_start();
        $this->render($template, $vals);
        return ob_get_clean();
    }
}
