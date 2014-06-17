<?php
/**
 * 请求
 *
 * @package SFramework
 * @author yanghaifeng
 * @version $Id$
 */

class SF_Request
{
    public static function getHost()
    {
        return getServer('HTTP_HOST');
    }
    
    public static function getScript()
    {
        return filter_has_var(INPUT_SERVER, 'SCRIPT_NAME') ? getServer('SCRIPT_NAME') : getServer('PHP_SELF');
    }
    
    public static function getBase()
    {
        return rtrim(dirname(self::getScript()), '\\/');
    }
    
    public static function getUri()
    {
        return getServer('REQUEST_URI');
    }
    
    public static function getQueryString()
    {
        return getServer('QUERY_STRING');
    }
    
    public static function getRefer($default = '')
    {
        return filter_has_var(INPUT_SERVER, 'HTTP_REFERER') ? getServer('HTTP_REFERER') : $default;
    }
    
    public static function getPath()
    {
        $uri = self::getUri();
        $script = self::getScript();
        $base = self::getBase();
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }
        if ($script && strpos($uri, $script) === 0) {
            $path = substr($uri, strlen($script));
        } elseif ($base && strpos($uri, $base) === 0) {
            $path = substr($uri, strlen($base));
        } else {
            $path = $uri;
        }
        return preg_replace('/\/+/', '/', trim($path, '/'));
    }
    
    public static function getIp()
    {
        if (false == ($ip = getServer('HTTP_X_FORWARDED_FOR'))) {
            if (false == ($ip = getServer('HTTP_CLIENT_IP'))) {
                if (false == ($ip = getServer('REMOTE_ADDR'))) {
                    $ip = '';
                }
            }
        }
        if (true == ($p = strpos($ip, ','))) {
            $ip = substr($ip, 0, $p);
        }
        return $ip;
    }
}
