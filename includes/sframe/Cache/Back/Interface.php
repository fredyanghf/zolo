<?php
/**
 * Cache后端接口
 *
 * @package Cache
 * @author shukyyang
 * @version $Id$
 */

interface SF_Cache_Back_Interface
{
    public function set($key, $value, $expire = null);
    public function get($key);
    public function del($key);
}