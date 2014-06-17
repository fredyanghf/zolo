<?php
/**
 * Image
 *
 * @package SFramework
 * @author shukyyang
 * @version $Id$
 */

class SF_Image
{
    protected $_img_path = '';
    protected $_path_type = 'path';
    protected $_suffix = '';

    public function __construct($img_path)
    {
        $this->_img_path = $img_path;
        if (strpos($img_path, 'http://') !== false || strpos($img_path, 'https://') !== false) {
            $this->_path_type = 'url';
        }
        $this->_suffix = substr(strrchr($img_path, '.'), 1);
    }
    
    public function getSuffix()
    {
        return $this->_suffix;
    }
    
    /**
     * 缩略
     * @param string $method resize, adaptiveResize
     */
    public function thumb($method, $img_new, $width, $height, $quality = 90)
    {
        require_once SF_PATH .'/Source/phpthumb/ThumbLib.inc.php';
        $thumb = PhpThumbFactory::create($this->_img_path, array('jpegQuality' => $quality));
        $thumb->$method($width, $height);
        if (in_array(substr($img_new, strrpos($img_new, '.')), array('.jpg', '.png', '.gif', '.jpeg', '.bmp'))) {
            $img_path = substr($img_new, 0, strrpos($img_new, '/'));
        } else {
            $img_path = rtrim($img_new, '/');
            $img_new .= '/'. md5(microtime() . mt_rand(1, 9999)) .'.'. $this->getSuffix();
        }
        $this->_checkDir($img_path);
        $thumb->save($img_new);
        return substr($img_new, strrpos($img_new, '/') + 1);
    }
    
    /**
     * 遍历创建目录
     */
    protected function _checkDir($path)
    {
        if (is_dir($path)) {
            return true;
        }
        if(!$this->_checkDir(dirname($path))){
            return false;
        }
        if(!mkdir($path,0777)){
            return false;
        }
        return true;
    }
}
