<?php
/**
 * 日志类
 *
 * @package Log
 * @author shukyyang
 * @version $Id$
 */

class SF_Log
{
    /**
     * 写入日志
     *
     * @param string|array $data
     * @param string $file_path
     */
    public static function put($data, $file_path)
    {
        // 组装日志
        $str = D_DATETIME;
        if (is_array($data)) {
            foreach ($data as $v) {
                $str .= ' '. $v;
            }
        } else {
            $str .= (string)$data;
        }
        $str .= "\n";
        
        // 写入日志
        if (!is_dir(dirname($file_path))) {
            self::createDir(dirname($file_path));
        }
        if (!$handle = fopen($file_path, 'a+b')) {
            throw new SF_Exception('Cannot open the file:'. $file_path);
        }
        flock($handle, LOCK_EX);
        fwrite($handle, $str);
        flock($handle, LOCK_UN);
        fclose($handle);
    }
    
    
    /**
     * 递归创建文件夹
     *
     * @param string $dir_path 目录路径
     * @param int $lv 限制的目录深度
     */
    public static function createDir($dir_path, $lv = 5)
    {
        if (!is_dir($dir_path) && $lv > 0) {
            $lv--;
            self::createDir(dirname($dir_path), $lv);
            @mkdir($dir_path, 0777);
        }
    }

}