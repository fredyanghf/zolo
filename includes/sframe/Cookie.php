<?php
/**
 * cookie数据共享
 *
 * @package Cookie
 * @author shukyyang
 * @version $Id$
 */
class SF_Cookie
{
    /**
     * 加密处理
     * 如果是数组，则进行字符化再处理，分隔符&&
     * 第一位为加密key索引
     */
    public static function crypt_set($key, $value, $timeout, $domain)
    {
        // 数组字符化
        if (is_array($value)) {
            $value = implode('&&', $value);
        }
        // 加密处理
        $index = mt_rand(1, 9);
        $value = SF_Crypt::des_encode($value, $index);
        $value = $index . $value;
        self::set($key, $value, $timeout, $domain);
    }
    
    public static function crypt_get($key, $match = array())
    {
        $value = self::get($key, '');
        if (empty($value)) {
            return array();
        }
        $index = substr($value, 0, 1);
        $value = substr($value, 1);
        $value = SF_Crypt::des_decode($value, $index);
        if (strpos($value, '&&')) {
            $value = explode('&&', $value);
            if (!empty($match)) {
                $result = array();
                foreach ($match as $k=>$v) {
                    $result[$v] = isset($value[$k]) ? $value[$k] : '';
                }
                $value = $result;
            }
        }
        return $value;
    }
    
    public static function set($key, $value, $timeout, $domain)
    {
        setcookie($key, $value, time() + $timeout, '/', $domain);
    }
    
    public static function get($key, $default = null)
    {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
    }
    
    public static function del($key, $domain)
    {
        self::set($key, '', -3600, $domain);
        //self::set($key, null, -3600, $domain);
    }
}