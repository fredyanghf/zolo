<?php
/**
 * 全局异常类
 *
 * @package SF
 * @author shukyyang
 * @version $Id$
 */

class SF_Exception extends Exception
{
    public function __construct($msg = '', $code = 0, Exception $previous = null)
    {
        parent::__construct($msg, $code, $previous);
        echo '<h1>Exception:</h1>';
        echo $this->getMessage() .'<br /><br />';
        echo $this->getFile() .' 行：'. $this->getLine();
        exit;
    }
}