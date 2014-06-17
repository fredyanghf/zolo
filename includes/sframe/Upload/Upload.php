<?php
/**
 * 文件上传
 */
class SF_Upload
{
    protected $_files = array();

    protected $_valid = 1;
    
    protected $_message = '';

    protected $_config = array(
        // 是否允许空文件
        'allow_nofile' => false,
        
        // 是否自动创建目录
        'auto_mkdir' => true,
        
        // 最大尺寸限制
        'limit_size' => '2M',
        
        // 允许类型限制
        'limit_type' => array(
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif'
        )
    );


    public function __construct($config = array())
    {
        if (ini_get('file_uploads') == false) {
            throw new SF_Exception('File uploads are not allowed in your php config!');
        }
        if (empty($_FILES) && !$this->_config['allow_nofile']) {
            $this->_valid = 0;
            $this->_message = '请上传文件！';
        }
        
        $this->_config = array_merge($this->_config, $config);
        
        // FILE预处理
        foreach ($_FILES as $form => $content) {
            if (is_array($content['name'])) {
                foreach ($content as $idx => $group) {
                    foreach ($group as $k=>$v) {
                        $this->_files[$form][$k][$idx] = $v;
                        if ($idx == 'name') {
                            $this->_files[$form][$k]['suffix'] = $this->_getSuffix($v);
                        } elseif ($idx == 'tmp_name') {
                            $this->_files[$form][$k]['mime'] = $this->_detectMime($v);
                        }
                    }
                }
                foreach ($this->_files[$form] as $file) {
                    if (!$this->_valid) {
                        break;
                    }
                    $this->_check($file);
                }
            } else {
                $this->_files[$form] = $content;
                if (!empty($content['tmp_name'])) {
                    $this->_files[$form]['suffix'] = $this->_getSuffix($content['name']);
                    $this->_files[$form]['mime'] = $this->_detectMime($content['tmp_name']);
                } else {
                    $this->_files[$form]['suffix'] = '';
                    $this->_files[$form]['mime'] = '';
                }
                $this->_check($this->_files[$form]);
            }
        }
    }
    
    /**
     * 上传
     * @param string $destination 文件存放的目的地
     * @param function $rename 文件重命名的回调方法
     */
    public function upload($root_path, $dir = '', $rename = null)
    {
        if (!$this->isValid()) {
            return false;
        }
        $result = array();
        foreach ($this->_files as $form=>$file) {
            if (isset($file['name'])) {
                if (false === ($result[$form] = $this->_upfile($file, $root_path, $dir, $rename))) {
                    return false;
                }
            } else {
                foreach ($file as $k=>$f) {
                    if (false === ($result[$form][$k] = $this->_upfile($f, $root_path, $dir, $rename))) {
                        return false;
                    }
                }
            }
        }
        return $result;
    }
    
    public function getFiles()
    {
        return $this->_files;
    }
    
    public function isValid()
    {
        return $this->_valid;
    }
    
    public function getMessage()
    {
        return $this->_message;
    }
    
    /**
     * 获取文件后缀
     */
    protected function _getSuffix($name)
    {
        return strtolower(substr(strrchr($name, '.'), 1));
    }
    
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
        if (!move_uploaded_file($file['tmp_name'], $newfile)) {
            if (!$this->_config['allow_nofile']) {
                return false;
            } else {
                return array();
            }
        }
        return array(
            'name' => substr($file['name'], 0, strrpos($file['name'], '.')),
            'newname' => $newname,
            'suffix' => $file['suffix'],
            'file' => $dir .'/'. $newname .'.'. $file['suffix'],
            'mime' => empty($file['mime']) ? $this->_config['limit_type'][$file['suffix']] : $file['mime'],
            'volume' => $file['size']
        );
    }
    
    /**
     * 文件重命名
     */
    protected function _rename($filename, $rename = null)
    {
        if (null !== $rename) {
            $newname = $rename($filename);
        } else {
            $tm = explode(' ', microtime());
            $newname = sprintf("%02d", $tm[0] * 100);
            $newname = $tm[1] . $newname . mt_rand(1000, 9999);
            //$newname = md5($filename . microtime() . mt_rand(1, 9999));
        }
        return $newname;
    }


    /**
     * 遍历创建目录
     */
    protected function _checkDir($path)
    {
        if (is_dir($path)) {
            return true;
        }
        if (!$this->_config['auto_mkdir']) {
            throw new SF_Exception('The File Path is Not Exists!');
        }
        if(!$this->_checkDir(dirname($path))){
            return false;
        }
        if(!mkdir($path,0777)){
            return false;
        }
        return true;
    }

    /**
     * 有效性验证
     */
    protected function _check($file)
    {
        // 是否允许为空
        if (empty($file['name']) || empty($file['size'])) {
            if ($this->_config['allow_nofile']) {
                $this->_valid = 1;
                return true;
            } else {
                $this->_valid = 0;
                $this->_message = 'The File is Empty';
                return false;
            }
        }
        
        // 上传失败
        if ($file['error'] > 0) {
            $this->_valid = 0;
            $this->_message = 'Upload fail';
            return false;
        }
        
        // 获取文件后缀
        $suffix = $file['suffix'];
        if (empty($this->_config['limit_type'][$suffix]) || !$this->_checkMimetype($file['mime'], $suffix)) {
            $this->_valid = 0;
            $this->_message = 'Invalid fild format： '. SF_Filter::secure($file['name']);
            return false;
        }
        
        // 文件大小
        $b = substr($this->_config['limit_size'], -1);
        $allow_size = (int)$this->_config['limit_size'];
        if ($b == 'K') {
            $allow_size = $allow_size * 1024;
        } elseif ($b == 'M') {
            $allow_size = $allow_size * 1024 * 1024;
        }
        if ($file['size'] > $allow_size) {
            $this->_valid = 0;
            $this->_message = 'Too large，The limit is '. $this->_config['limit_size'];
            return false;
        }
        $this->_valid = 1;
        return true;
    }
    
    protected function _checkMimetype($mime, $suffix)
    {
        return ($mime == '' || $mime == $this->_config['limit_type'][$suffix]);
    }
    
    protected function _detectMime($file_path)
    {
        if (!function_exists('finfo_open')) {
            return '';
        }
        $finfo = finfo_open(FILEINFO_MIME);
        $mimetype = finfo_file($finfo, $file_path);
        finfo_close($finfo);
        $mimetype = explode(';', $mimetype);
        return $mimetype[0];
    }
}