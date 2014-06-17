<?php
/**
 * Cache前端page缓存类
 *
 * @package SFramework/Cache/Front
 * @author shukyyang@pplive.com
 * @version $Id$
 */

class SF_Cache_Front_Page extends SF_Cache_Front_Abstract
{
    protected $_tmp_index = '';

    // 这个配置里的ex表示要排除的uri特征，有这些特征的将不会缓存
    protected $_options = array(
        'ex' => array(),
    );

    public function start($index = '', $refresh = 0, $ex = '')
    {
        foreach ($this->_options['ex'] as $ex_item) {
            if (preg_match($ex_item, $_SERVER['REQUEST_URI'])) {
                return false;
            }
        }
        if (!$index) {
            $index = $this->_makeId($ex);
        }
        if ($refresh) {
            $this->remove($index);
            return false;
        }
        $data = $this->_backend->get($index);
        if ($data) {
            header('Pragma: public');
            header('Expires: ' . gmdate('D, d M Y H:i:s', time () + $this->_lifetime) . ' GMT');
            header('Cache-Control: public, max-age=' . $this->_lifetime);
            echo $data .'<!--cached-->';
            exit;
        }
        $this->_tmp_index = $index;
        ob_start(array($this, '_flush'));
        ob_implicit_flush(false);
        return false;
    }

    public function _flush($data)
    {
        $key = $this->_tmp_index ? $this->_tmp_index : $this->_makeId();
        $this->_backend->set($key, $data, $this->_lifetime);
        return $data;
    }

    public function remove($index)
    {
        $this->_backend->del($index);
    }

    /**
     * @param mixed $ex 当索引是request_uri的时候，要排除的请求参数
     * 比如/a.php?t=1&cc=1，我需要把cc=1这个排除，不作为索引依据，那么$ex = 'cc'
     */
    protected function _makeId($ex = '')
    {
        $index = $_SERVER['REQUEST_URI'];
        if (!empty($ex)) {
            if (is_string($ex)) {
                $ex = array($ex);
            }
            foreach ($ex as $item) {
                $index = preg_replace('/([\?\&])'. $item .'\=[^\&]&*/', '\\1', $index);
            }
        }
        return md5($index);
    }
}