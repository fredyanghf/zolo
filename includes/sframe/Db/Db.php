<?php
/**
 * 数据库操作类
 *
 * @package DB
 * @author Shukyyang
 * @version $Id$
 */

class SF_Db
{
    protected $_master = null;
    protected $_slave = null;
    protected $_config = array(
        'master' => array(),
        'slave' => array()
    );
    protected $_always_master = 0;
    protected $_fetch_mode = PDO::FETCH_ASSOC;
    protected $_errorinfo = array();

    /**
     * 初始传入配置
     * @param array $config
     * @param int $always_master
     */
    public function __construct(array $config, $always_master = 0)
    {
        $this->_config['master'] = isset($config['master']) ? $config['master'] : $config;
        !isset($config['slave']) || $this->_config['slave'] = $config['slave'];
        $this->_always_master = $always_master;
    }

    /**
     * 获取主数据库连接
     * @return Db_Connection
     */
    public function getMaster()
    {
        if (null === $this->_master) {
            $this->_master = self::initConnection($this->_config['master']);
        }
        return $this->_master;
    }

    /**
     * 获取从数据库连接
     * @return Db_Connection
     */
    public function getSlave()
    {
        if ($this->_always_master || empty($this->_config['slave'])) {
            return $this->getMaster();
        }
        if (null === $this->_slave) {
            $this->_slave = self::initConnection($this->_config['slave']);
        }
        return $this->_slave;
    }

    /**
     * 获取数据库连接
     * @param array $config
     * @return Db_Connection
     */
    protected static function initConnection(array $config)
    {
        return new SF_Db_Conn($config);
    }
    
    /**
     * 执行pdo方法
     */
    public function __call($name, $args = array())
    {
        empty($args) && $args = array();
        is_array($args) || $args = array($args);
        return call_user_func_array(array($this->getMaster(), $name), $args);
    }
    
    /**
     * 执行处理
     * @param string $sql
     * @param array $bind
     * @return PDOStatement
     */
    public function query($sql, $bind = array())
    {
        if (!is_array($bind)) {
            $bind = array($bind);
        }
        $stmt = $this->getMaster()->prepare($sql);
        $result = $stmt->execute($bind);
        if (!$result) {
            $this->_errorinfo = $stmt->errorInfo();
        }
        return $result;
    }

    public function getErrorinfo()
    {
        return $this->_errorinfo;
    }

    /**
     * 获取数据处理
     *
     * @param string $sql
     * @param array $bind
     * @return PDOStatement
     */
    public function prepare($sql, $bind = array())
    {
        if (!is_array($bind)) {
            $bind = array($bind);
        }
        $stmt = $this->getSlave()->prepare($sql);
        $stmt->execute($bind);
        $stmt->setFetchMode($this->_fetch_mode);
        return $stmt;
    }

    /**
     * 最新插入值
     * @return int
     */
    public function lastInsertId()
    {
        return $this->getMaster()->lastInsertId();
    }

    /**
     * 插入数据
     *
     * @param string $table
     * @param array $bind
     * @return int 返回插入的最新ID
     */
    public function insert($table, array $bind)
    {
        $cols = array();
        $vals = array();
        foreach ($bind as $col => $val) {
            $cols[] = $this->quoteIdentifier($col);
            $vals[] = '?';
        }
        $sql = "INSERT INTO ". $this->quoteIdentifier($table) .' ('. implode(', ', $cols) . ') VALUES (' . implode(', ', $vals) . ')';
        $res = $this->query($sql, array_values($bind));
        /*if($table == 'customer_type_channel') {
            print_r($this->getErrorinfo());exit;
        }*/
        $lastid = $this->lastInsertId();
        return $lastid ? $lastid : $res;
    }

    /**
     * 更新数据库
     */
    public function update($table, array $bind, $where = '')
    {
        $set = array();
        $i = 0;
        foreach ($bind as $col => $val) {
            $val = '?';
            $set[] = $this->quoteIdentifier($col) . ' = ' . $val;
        }
        $where = $this->where($where);
        $sql = 'UPDATE ' . $this->quoteIdentifier($table) . ' SET ' . implode(', ', $set) . (($where) ? " WHERE $where" : '');
        return $this->query($sql, array_values($bind));
    }

    /**
     * 保存
     */
    public function save($table, array $bind, $where = '')
    {
        $where = $this->where($where);
        $sql = 'SELECT COUNT(*) FROM '. $this->quoteIdentifier($table) . (($where) ? " WHERE $where" : '');
        if ($this->fetchOne($sql)) {
            return $this->update($table, $bind, $where);
        } else {
            return $this->insert($table, $bind);
        }
    }

    /**
     * 删除
     */
    public function delete($table, $where = '')
    {
        $where = $this->where($where);
        $sql = 'DELETE FROM ' . $this->quoteIdentifier($table) . (($where) ? " WHERE $where" : '');
        return $this->query($sql);
    }


    /**
     * 取得所有
     */
    public function fetchAll($sql, $bind = array(), $fetch_mode = null)
    {
        $fetch_mode !== null || $fetch_mode = $this->_fetch_mode;
        $stmt = $this->prepare($sql, $bind);
        return $stmt->fetchAll($fetch_mode);
    }

    /**
     * 取得一行
     */
    public function fetchRow($sql, $bind = array(), $fetch_mode = null)
    {
        $fetch_mode !== null || $fetch_mode = $this->_fetch_mode;
        $stmt = $this->prepare($sql, $bind);
        return $stmt->fetch($fetch_mode);
    }

    /**
     * 取得一列
     */
    public function fetchCol($sql, $bind = array())
    {
        $stmt = $this->prepare($sql, $bind);
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    /**
     * 捉对获取
     */
    public function fetchPairs($sql, $bind = array())
    {
        $stmt = $this->prepare($sql, $bind);
        $data = array();
        while (true == ($row = $stmt->fetch(PDO::FETCH_NUM))) {
            $data[$row[0]] = $row[1];
        }
        return $data;
    }

    /**
     * 取得一个
     */
    public function fetchOne($sql, $bind = array())
    {
        $stmt = $this->prepare($sql, $bind);
        $result = $stmt->fetchColumn(0);
        return $result;
    }


    /**
     * 获取组装后的where条件
     *
     * array('x=?'=>'x')
     * array('x=1', 'y=2')
     * array('x>?'=>2, 'y=?'=>'y')
     * array('x in?'=>array(1,2,3))
     * array('x between?'=>array(1,2))
     * array('x like?'=>'%x')
     * array('x=?'=>x, 'or'=>array('x=?'=>'x', 'y>?'=>2))
     *
     * @param string|array $where
     * @return string
     */
    public function where($where)
    {
        if (!is_array($where)) {
            return $where;
        }
        $where_str = '';
        $i = 0;
        foreach ($where as $cond => $term) {
            if (strtolower($cond) == 'or') {
                $where_str .= ($i ? ' OR ' : '') .'('. $this->where($term) .')';
            } else {
                if (!is_int($cond)) {
                    if (strpos($cond, 'in?')) {
                        $term = str_replace('in?', 'IN '. $this->_inExpr($term), $cond);
                    } elseif (strpos($cond, 'between?')) {
                        $term = str_replace('between?', 'BETWEEN '. $this->_betweenExpr($term), $cond);
                    } elseif (strpos($cond, 'like?')) {
                        $term = str_replace('like?', 'LIKE '. $this->quote('%'. $term .'%'), $cond);
                    } else {
                        $term = str_replace('?', $this->quote($term), $cond);
                    }
                }
                $where_str .= ($i ? ' AND ' : '') . $term;
            }
            $i++;
        }
        return $where_str;
    }

    /**
     * Safely quotes a value for an SQL statement.
     */
    public function quote($value)
    {
        if (is_array($value)) {
            foreach ($value as &$val) {
                $val = $this->quote($val);
            }
            return implode(', ', $value);
        } elseif (is_int($value)) {
            return $value;
        } elseif (is_float($value)) {
            return sprintf('%F', $value);
        }
        return "'" . addcslashes($value, "\000\n\r\\'\"\032") . "'";
    }

    /**
     * 生成in子句
     * @param string|array $value
     * @return string
     */
    protected function _inExpr($value)
    {
        return is_array($value) ? '('. $this->quote($value) .')' : $value;
    }

    /**
     * 生成between子句
     * @param string|array $value
     * @return string
     */
    protected function _betweenExpr($value)
    {
        return is_array($value) ? $this->quote($value[0]) .' AND '. $this->quote($value[1]) : $value;
    }

    /**
     * Quotes an identifier.
     *
     * <code>
     * $adapter->quoteIdentifier('myschema.mytable')
     * </code>
     * Returns: "myschema"."mytable"
     *
     * <code>
     * $adapter->quoteIdentifier(array('myschema','my.table'))
     * </code>
     * Returns: "myschema"."my.table"
     *
     * @param type $ident
     * @return string The quoted identifier.
     */
    public function quoteIdentifier($ident)
    {
        return $this->_quoteIdentifierAs($ident, null);
    }

    /**
     * Quote a column identifier and alias.
     *
     * @param string|array|Zend_Db_Expr $ident The identifier or expression.
     * @param string $alias An alias for the column.
     * @return string The quoted identifier and alias.
     */
    public function quoteColumnAs($ident, $alias)
    {
        return $this->_quoteIdentifierAs($ident, $alias);
    }

    /**
     * Quote a table identifier and alias.
     *
     * @param string|array|Zend_Db_Expr $ident The identifier or expression.
     * @param string $alias An alias for the table.
     * @return string The quoted identifier and alias.
     */
    public function quoteTableAs($ident, $alias = null)
    {
        return $this->_quoteIdentifierAs($ident, $alias);
    }

    /**
     * Quote an identifier and an optional alias.
     *
     * @param string|array $ident The identifier or expression.
     * @param string $alias An optional alias.
     * @param string $as The string to add between the identifier/expression and the alias.
     * @return string The quoted identifier and alias.
     */
    protected function _quoteIdentifierAs($ident, $alias = null, $as = ' AS ')
    {
        if (is_string($ident)) {
            $ident = explode('.', $ident);
        }
        if (is_array($ident)) {
            $segments = array();
            foreach ($ident as $segment) {
                $segments[] = $this->_quoteIdentifier($segment);
            }
            if ($alias !== null && end($ident) == $alias) {
                $alias = null;
            }
            $quoted = implode('.', $segments);
        } else {
            $quoted = $this->_quoteIdentifier($ident);
        }
        if ($alias !== null) {
            $quoted .= $as . $this->_quoteIdentifier($alias);
        }
        return $quoted;
    }

    /**
     * Quote an identifier.
     *
     * @param  string $value The identifier or expression.
     * @return string        The quoted identifier and alias.
     */
    protected function _quoteIdentifier($value)
    {
        $q = '`';
        return ($q . str_replace("$q", "$q$q", $value) . $q);
    }
}
