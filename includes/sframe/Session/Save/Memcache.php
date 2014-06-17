<?php
/**
 * Save Handler Memcache
 *
 * @package Session
 * @author shukyyang
 * @version $Id$
 */

class SF_Session_Save_Memcache implements SF_Session_Save_Interface
{
    protected $_mc = null;
    protected $_lifetime = 1440;

    public function __construct(SF_Memcache $memcache)
    {
        if (null === $this->_mc) {
            $this->_mc = $memcache;
        }
        $this->_lifetime = (int)ini_get('session.gc_maxlifetime');
    }

    public function open($save_path, $name)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($id)
    {
        return $this->_mc->get($id);
    }

    public function write($id, $data)
    {
        $result = $this->_mc->set($id, $data, $this->_lifetime);
        return true;
    }

    public function destroy($id)
    {
        $this->_mc->delete($id);
        return true;
    }

    public function gc($maxlifetime)
    {
        return true;
    }
}