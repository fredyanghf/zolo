<?php
/**
 * 表单辅助
 *
 * @package View/Helper
 * @author fredyang
 * @version $Id$
 */
class SF_View_Helper_Form extends SF_View_Helper_Abstract
{
    // 表单数据
    protected $_data = array();
    
    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->setData($data);
        }
    }
    
    public function setData($data)
    {
        $this->_data = $data;
    }
    
    public function setValue($name, $value)
    {
        $this->_data[$name] = $value;
    }
    
    public function getValue($name, $default = null)
    {
        return isset($this->_data[$name]) ? $this->_data[$name] : $default;
    }
    
    public function render()
    {
    }
    
    /**
     * 获取元素
     * @param string $name 
     * @param array $args 构造参数
     */
    public function __call($name, $args = array())
    {
        $get = 0;
        if (strpos($name, 'get') === 0) {
            $get = 1;
            $name = substr($name, 3);
        }
        $ele_class = 'SF_View_Helper_Form_'. ucfirst(strtolower($name));
        if (class_exists($ele_class)) {
            $class = new ReflectionClass($ele_class);
            $class = $class->newInstanceArgs($args);
            $ele_name = $class->getName();
            if (isset($this->_data[$ele_name])) {
                $class->setValue($this->_data[$ele_name]);
            }
            if ($get) {
                return $class;
            } else {
                $class->render();
            }
        }
    }
}


abstract class SF_View_Helper_Form_Element extends SF_View_Helper_Abstract
{
    protected $_type = '';
    protected $_name = '';
    protected $_attr = array();
    protected $_value = null;
    
    public function getType()
    {
        return $this->_type;
    }
    
    public function getName()
    {
        return $this->_name;
    }
    
    public function getValue()
    {
        return $this->_value;
    }
    
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }
    
    public function setAttr(array $attr)
    {
        foreach ($attr as $k=>$v) {
            $this->_attr[$k] = $v;
        }
        return $this;
    }
    
    protected function _attr()
    {
        $attr = '';
        if (!empty($this->_attr)) {
            foreach ($this->_attr as $k=>$v) {
                $attr .= ' '.$k .'="'. $v .'"';
            }
        }
        return $attr;
    }
}


/**
 * 文本
 */
class SF_View_Helper_Form_Text extends SF_View_Helper_Form_Element
{
    public function __construct($name, $default_value = null)
    {
        $this->_type = 'text';
        $this->_name = $name;
        $this->_attr = array(
            'id' => $this->_name,
            'class' => 'text'
        );
        $this->_value = $default_value;
    }
    
    public function render()
    {
        $value = $this->_value === null ? '' : ' value="'. $this->_value .'"';
        echo '<input type="'. $this->_type .'" name="'. $this->_name .'"'. $value . $this->_attr() .' />';
    }
}


/**
 * 隐藏
 */
class SF_View_Helper_Form_Hidden extends SF_View_Helper_Form_Element
{
    public function __construct($name, $default_value = null)
    {
        $this->_type = 'hidden';
        $this->_name = $name;
        $this->_attr = array(
            'id' => $this->_name
        );
        $this->_value = $default_value;
    }
    
    public function render()
    {
        $value = $this->_value === null ? '' : ' value="'. $this->_value .'"';
        echo '<input type="'. $this->_type .'" name="'. $this->_name .'"'. $value . $this->_attr() .' />';
    }
}


/**
 * 密码框
 */
class SF_View_Helper_Form_Password extends SF_View_Helper_Form_Element
{
    public function __construct($name)
    {
        $this->_type = 'password';
        $this->_name = $name;
        $this->_attr = array(
            'id' => $this->_name,
            'class' => 'text'
        );
    }
    
    public function render()
    {
        echo '<input type="'. $this->_type .'" name="'. $this->_name .'"'. $this->_attr() .' />';
    }
}


/**
 * 下拉
 */
class SF_View_Helper_Form_Select extends SF_View_Helper_Form_Element
{
    protected $_data = array();
    
    public function __construct($name, $data, $default_value = null)
    {
        $this->_type = 'select';
        $this->_name = $name;
        $this->_attr = array(
            'id' => $this->_name,
            'class' => 'select'
        );
        $this->_value = $default_value;
        $this->_data = $data;
    }
    
    public function render()
    {
        $html = '<select name="'. $this->_name .'"'. $this->_attr() .'>';
        foreach ($this->_data as $k=>$v) {
            $select = ($this->_value !== null && $this->_value == $k) ? ' selected' : '';
            $html .= '<option value="'. $k .'"'. $select .'>'. $v .'</option>';
        }
        $html .= '</select>';
        echo $html;
    }
}


/**
 * 内容
 */
class SF_View_Helper_Form_Textarea extends SF_View_Helper_Form_Element
{
    public function __construct($name, $default_value = null)
    {
        $this->_type = 'textarea';
        $this->_name = $name;
        $this->_attr = array(
            'id' => $this->_name,
            'class' => 'textarea'
        );
        $this->_value = $default_value;
    }
    
    public function render()
    {
        $value = $this->_value === null ? '' : $this->_value;
        echo '<textarea name="'. $this->_name .'"'. $this->_attr() .'>'. $value .'</textarea>';
    }
}


/**
 * 多选
 */
class SF_View_Helper_Form_Checkbox extends SF_View_Helper_Form_Element
{
    protected $_data = array();
    
    public function __construct($name, $data, $default_value = null)
    {
        $this->_type = 'checkbox';
        $this->_name = $name;
        $this->_attr = array(
            'class' => 'checkbox '. $this->_name
        );
        $this->_value = $default_value;
        $this->_data = $data;
    }
    
    public function render()
    {
        $html = '';
        foreach ($this->_data as $k=>$v) {
            $check = ($this->_value !== null && $this->_value == $k) ? ' checked' : '';
            $html .= '<label><input type="'. $this->_type .'" name="'. $this->_name .'[]"'. $this->_attr() .' value="'. $k .'"'. $check .'>'. $v .'</label>';
        }
        echo $html;
    }
}


/**
 * 单选
 */
class SF_View_Helper_Form_Radio extends SF_View_Helper_Form_Element
{
    protected $_data = array();
    
    public function __construct($name, $data, $default_value = null)
    {
        $this->_type = 'radio';
        $this->_name = $name;
        $this->_attr = array(
            'class' => 'radio '. $this->_name
        );
        $this->_value = $default_value;
        $this->_data = $data;
    }
    
    public function render()
    {
        $html = '';
        foreach ($this->_data as $k=>$v) {
            $check = ($this->_value !== null && $this->_value == $k) ? ' checked' : '';
            $html .= '<label><input type="'. $this->_type .'" name="'. $this->_name .'"'. $this->_attr() .' value="'. $k .'"'. $check .' />'. $v .'</label>';
        }
        echo $html;
    }
}
