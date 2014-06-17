<?php
/**
 * Cache前端抽像
 *
 * @package Cache
 * @author shukyyang@pplive.com
 * @version $Id$
 */

abstract class SF_Cache_Front_Abstract
{
    protected $_options = array();
    protected $_backend = null;
    protected $_lifetime = 1200;

    public function __construct(array $options = array(), $backend = null)
    {
        while (list($key, $value) = each($options)) {
            $this->setOption($key, $value);
            if ($key == 'lifetime') {
                $this->setLifetime((int)$value);
            }
        }
        if ($backend) {
            $this->setBackend($backend);
        }
    }

    public function setOption($key, $value)
    {
        $this->_options[$key] = $value;
    }

    public function setBackend(SF_Cache_Back_Interface $backend)
    {
        $this->_backend = $backend;
        return $this;
    }

    public function setLifetime($seconds)
    {
        $this->_lifetime = $seconds;
        return $this;
    }
}
