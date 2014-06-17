<?php
/**
 * Cache的Memcache驱动
 *
 * @package Cache/Back
 * @author shukyyang
 * @version $Id$
 */

class SF_Cache_Back_Memcache implements SF_Cache_Back_Interface
{
    protected $_mc = null;
    protected $_expire = 1200;

    public function __construct(SF_Memcache $memcache, $expire = 0)
    {
        $this->_mc = $memcache;
        $expire && $this->_expire = (int)$expire;
    }


    public function set($key, $value, $expire = null)
    {
        $expire = $expire ? (int)$expire : $this->_expire;
        return $this->_mc->set($key, $value, $expire);
    }

    public function get($key)
    {
        return $this->_mc->get($key);
    }

    public function del($key)
    {
        return $this->_mc->delete($key);
    }
}