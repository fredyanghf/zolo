<?php
/**
 * phprpc
 *
 * @package SFramework
 * @author shukyyang
 * @version $Id$
 */

class SF_Rpc
{
    public static function initServer($libs)
    {
        require_once SF_PATH .'/Source/phprpc/phprpc_server.php';
        $server = new PHPRPC_Server();
        foreach ($libs as $item) {
            if (is_string($item)) {
                $server->add($item);
            } elseif (is_array($item)) {
                $server->add($item[0], $item[1]);
            }
        }
        $server->start();
    }
    
    public static function initClient($url)
    {
        require_once SF_PATH .'/Source/phprpc/phprpc_client.php';
        $rpc = $client = new PHPRPC_Client($url);
        return $rpc;
    }
}
