<?php
/**
 * Mail
 *
 * @package SFramework
 * @author shukyyang
 * @version $Id$
 */
require_once SF_PATH .'/Source/phpmailer/class.phpmailer.php';

class SF_Mail
{
    protected $_config = array(
        'host' => '',
        'type' => 'smtp',
        'format' => 'html',
        'username' => '',
        'password' => '',
        'from' => ''
    );
    protected $_mailer = null;
    
    public function __construct($config)
    {
        $this->_config = array_merge($this->_config, $config);
        $this->_mailer = new PHPMailer();
        $this->_mailer->Host = $this->_config['host'];
        if ($this->_config['type'] == 'smtp') {
            $this->_mailer->IsSMTP();
        }
        if ($this->_config['username']) {
            $this->_mailer->SMTPAuth = true;
            $this->_mailer->Username = $this->_config['username'];
            $this->_mailer->Password = $this->_config['password'];
        }
        if ($this->_config['format'] == 'html') {
            $this->_mailer->IsHTML(true);
        }
        if ($this->_config['from']) {
            $this->setFrom($this->_config['from']);
        }
        $this->_mailer->CharSet = 'UTF-8';
        $this->_mailer->Encoding = 'base64';
    }
    
    public function setFrom($from)
    {
        $from = explode(';', $from);
        $this->_mailer->From = $from[0];
        if (!empty($from[1])) {
            $this->_mailer->FromName = $from[1];
        }
    }
    
    public function send($to, $title, $content)
    {
        if (is_array($to)) {
            foreach ($to as $item) {
                $this->_addAddress($item);
            }
        } else {
            $this->_addAddress($to);
        }
        $this->_mailer->Subject = $title;
        $this->_mailer->Body = $content;
        return $this->_mailer->Send();
    }
    
    protected function _addAddress($to)
    {
        $to = explode(';', $to);
        if (empty($to[1])) {
            $this->_mailer->AddAddress($to[0]);
        } else {
            $this->_mailer->AddAddress($to[0], $to[1]);
        }
    }
}
