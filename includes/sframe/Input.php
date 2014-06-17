<?php
/**
 * 用户写入数据过滤、验证、转换等
 * 抽象类，不能直接实例化使用，需要在具体的数据项应用中继承此项使用
 *
 * @package Input
 * @author shukyyang
 * @version $Id$
 */

class SF_Input
{
    // 传入的数据
    protected $_input;
    // 处理后的数据
    protected $_data;
    // 是否有效
    protected $_valid = true;
    // 验证消息
    protected $_message;
    /**
     * 过虑器
     * @var Filter
     */
    protected $_filter = null;
    /**
     * 验证器
     * @var Validator
     */
    protected $_validator = null;

    // 允许的域名
    protected $_allow_list = array();
    

    public function __construct($input)
    {
        // 传入数据
        $this->_input = $input;

        // 数据初始化构造
        $this->init();
    }

    /**
     * 数据配置项初始化
     */
    public function init()
    {
    }

    /**
     * 添加数据项
     * @param string $name 传入数据Key名
     * @param array $options 操作方式配置
     */
    public function addItem($name, $options = array())
    {
        // 与数据库或其它存储器字段的映射
        $reflection = empty($options['reflection']) ? $name : $options['reflection'];
        
        // 多选数据组合
        $groupindex = empty($options['groupindex']) ? '' : $options['groupindex'];
        $groupname = empty($options['groupname']) ? '' : $options['groupname'];
        
        // 过滤和验证
        $filter = empty($options['filters']) ? '' : $options['filters'];
        $validator = empty($options['validators']) ? '' : $options['validators'];
        
        // 数据值
        if (array_key_exists($name, $this->_input)) {
            $value = ($this->_input[$name] === '' && isset($options['default'])) ? $options['default'] : $this->_input[$name];
        } else {
            $value = isset($options['default']) ? $options['default'] : '';
        }
        
        // 回调处理
        if (!empty($options['callback'])) {
            $value = $options['callback']($value);
        }
        
        
        // 数据：数组型组合如checkbox ， 单项
        if ($groupindex || $groupname) {
            if ($groupindex == $reflection) {
                $idxs = $value;
            } elseif ($groupname) {
                $idxs = isset($this->_input[$groupname]) ? array_keys($this->_input[$groupname]) : array();
            } else {
                $idxs = array_keys($this->_input);
            }
            foreach ($idxs as $id) {
                foreach ($value as $k=>$v) {
                    if ($k == $id) {
                        if ($v && $filter) {
                            $v = SF_Filter::run($v, $filter);
                        }
                        if ($this->_valid && $validator && ($v || empty($options['optional']))) {
                            $this->_valid = SF_Validator::run($v, $validator, $this->_message);
                        }
                        if ($groupname) {
                            $this->_data[$groupname][$id][$reflection] = $v;
                        } else {
                            $this->_data[$id][$reflection] = $v;
                        }
                    }
                }
            }
        } else {
            if ($value && $filter) {
                $value = SF_Filter::run($value, $filter);
            }
            if ($this->_valid && $validator && ($value || empty($options['optional']))) {
                $this->_valid = SF_Validator::run($value, $validator, $this->_message);
            }
            $this->_data[$reflection] = $value;
        }
    }

    /**
     * 是否有效
     * @return bool
     */
    public function isValid()
    {
        return $this->_valid;
    }

    /**
     * 添加允许域名
     * @param string $list
     */
    public function addAllowList($list)
    {
        $this->_allow_list[] = $list;
    }

    /**
     * 获取消息
     * @return string
     */
    public function getMessage()
    {
        return $this->_message;
    }

    /**
     * 获取处理后的数据
     * @param string $key
     * @return array
     */
    public function getData($key = null)
    {
        if ($key == null) {
            return $this->_data;
        } else {
            if (!key_exists($key, $this->_data)) {
                throw new SF_Exception($key . ':指定的参数无效');
            }
            return $this->_data[$key];
        }
    }

    /**
     * 设置
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * 获取
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return isset($this->_data[$key]) ? $this->_data[$key] : '';
    }

}