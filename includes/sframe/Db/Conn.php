<?php
/**
 * 数据库连接
 *
 * @package DB
 * @author shukyyang@pplive.com
 * @version $Id$
 */

class SF_Db_Conn
{
    const DEFAULT_DRIVER = 'mysql';
    const DEFAULT_HOST = 'localhost';
    const DEFAULT_CHARSET = 'utf8';
    const DEFAULT_PERSISTENT = false;

    protected $_conn = null;

    protected $_config = array(
        'driver' => self::DEFAULT_DRIVER,
        'host' => self::DEFAULT_HOST,
        'charset' => self::DEFAULT_CHARSET,
        'persistent' => self::DEFAULT_PERSISTENT,
        'db' => '',
        'username' => '',
        'password' => '',
    );

    /**
     * 实例PDO
     * @param array $config
     */
    public function __construct($config)
    {
        $this->_config = array_merge($this->_config, $config);
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '". $this->_config['charset'] ."'"
        );
        if ($this->_config['persistent']) {
            $options[PDO::ATTR_PERSISTENT] = true;
        }
        $dsn = $this->_config['driver'] .':dbname='. $this->_config['db'] .';host='. $this->_config['host'];
        $this->_conn = new PDO($dsn, $this->_config['username'], $this->_config['password'], $options);
    }

    /**
     * 获取连接
     * @return PDO
     */
    public function getConnection()
    {
        return $this->_conn;
    }
    
    /**
     * 执行PDO原始方法
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args = '')
    {
        empty($args) && $args = array();
        is_array($args) || $args = array($args);
        return call_user_func_array(array($this->_conn, $method), $args);
    }

    /**
     * 预处理SQL
     * @param string $sql
     * @param array $options
     * @return PDOStatement
     */
    public function prepare($sql, array $options = array())
    {
        return $this->_conn->prepare($sql, $options);
    }

    /**
     * 关闭连接
     */
    public function close()
    {
        $this->_conn = null;
    }
}