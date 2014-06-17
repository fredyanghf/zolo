<?php
/**
 * 图片上传
 */
class SF_Upload_Image extends SF_Upload
{
    protected $_config = array(
        // 是否允许空文件
        'allow_nofile' => false,
        
        // 是否自动创建目录
        'auto_mkdir' => true,
        
        // 最大尺寸限制
        'limit_size' => '10M',
        
        // 最大宽度
        'limit_width' => 1000,
        
        // 最大高度
        'limit_height' => 5000,
        
        // 图片质量
        'img_quality' => 90,
        
        // 缩略处理方式
        // adaptiveResize: 先缩略再裁减, resize：直接缩略
        'thumb_method' => 'resize',
        
        // 多张缩略图
        'multi_thumb' => array(),
        
        // 允许类型限制
        'limit_type' => array(
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        )
    );
    
    /**
     * 执行上传
     */
    protected function _upfile($file, $root_path, $dir = '', $rename = null)
    {
        $root_path = rtrim($root_path ,'/');
        if ($dir) {
            $dir = rtrim($dir ,'/');
            if (strpos($dir, '/') !== 0) {
                $dir = '/'. $dir;
            }
        }
        $destination = $root_path . $dir;
        if (false == $this->_checkDir($destination)) {
            return false;
        }
        if ((empty($file['name']) || empty($file['size'])) && $this->_config['allow_nofile']) {
            return array();
        }
        $newname = $this->_rename($file['name'], $rename);
        $newfile = $destination .'/'. $newname .'.'. $file['suffix'];
        
        // 图片尺寸
        $size = $this->_getSize($file['tmp_name']);
        if (empty($size['width']) || empty($size['height'])) {
            return false;
        }
        
        // 是否多张缩略图，还是单张
        require_once SF_PATH .'/Source/phpthumb/ThumbLib.inc.php';
        $this->_thumb($file['tmp_name'], $newfile, $this->_config['limit_width'], $this->_config['limit_height']);
        $size = $this->_getSize($newfile);
        
        $result = array(
            'name' => substr($file['name'], 0, strrpos($file['name'], '.')),
            'newname' => $newname,
            'suffix' => $file['suffix'],
            'file' => $dir .'/'. $newname .'.'. $file['suffix'],
            'mime' => $size['mime'],
            'volume' => $file['size'],
            'width' => $size['width'],
            'height' => $size['height']
        );
        
        if (!empty($this->_config['multi_thumb'])) {
            foreach ($this->_config['multi_thumb'] as $thumb) {
                if (is_string($thumb) && strpos($thumb, 'x')) {
                    $thumb = explode('x', $thumb);
                    $width = $thumb[0];
                    $height = $thumb[1];
                } else {
                    $width = $thumb['width'];
                    $height = $thumb['height'];
                }
                $thumb_name = 't'. $width .'x'. $height;
                $thumb_newname = $newname .'_'. $thumb_name;
                $thumb_file = $destination .'/'. $thumb_newname .'.'. $file['suffix'];
                $this->_thumb($newfile, $thumb_file, $width, $height);
                // 尺寸
                $size = $this->_getSize($thumb_file);
                $result['thumb'][$thumb_name] = array(
                    'newname' => $thumb_newname,
                    'file' => $dir .'/'. $thumb_newname .'.'. $file['suffix'],
                    'volume' => filesize($thumb_file),
                    'width' => $size['width'],
                    'height' => $size['height']
                );
            }
        }
        
        return $result;
    }
    
    protected function _thumb($original_img, $new_img, $width, $height)
    {
        $thumb = PhpThumbFactory::create($original_img, array('jpegQuality' => $this->_config['img_quality']));
        $method = $this->_config['thumb_method'];
        $thumb->$method($width, $height);
        $thumb->save($new_img);
    }
    
    protected function _getSize($img_file)
    {
        $size = getimagesize($img_file);
        return array('width' => (int)$size[0], 'height' => (int)$size[1], 'mime' => $size['mime']);
    }
}