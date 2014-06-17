<?php
/**
 * Cache的Redis驱动
 *
 * @package Cache
 * @author shukyyang@pplive.com
 * @version $Id$
 */

class SF_Cache_Back_Redis implements SF_Cache_Back_Interface
{
    protected $_redis = null;
    protected $_expire = 1200;

    public function __construct(SF_Redis $redis, $expire = 0)
    {
        $this->_redis = $redis;
        $expire && $this->_expire = (int)$expire;
    }


    public function set($key, $value, $expire = null)
    {
        $expire = $expire ? (int)$expire : $this->_expire;
        $this->_redis->set($key, $value, $expire);
    }

    public function get($key)
    {
        return $this->_redis->get($key);
    }

    public function del($key)
    {
        return $this->_redis->delete($key);
    }
}