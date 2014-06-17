<?php
/**
 * Redis队列驱动类
 *
 * @package Queue
 * @author shukyyang@pptv.com
 * @version $Id$
 */

class SF_Queue_Redis implements SF_Queue_Interface
{
    protected $_redis = null;
    protected $_name = 'queue';

    public function __construct($name, SF_Redis $redis)
    {
        if (null === $this->_redis) {
            $this->_redis = $redis;
        }
        $this->_name = $name;
    }

    /**
     * 队列中元素总计
     * @return int
     */
    public function count()
    {
        return $this->_redis->lSize($this->_name);
    }

    /**
     * 发送消息
     * @param mixed $message
     */
    public function send($message)
    {
        $this->_redis->lpush($this->_name, $message);
    }

    /**
     * 获取消息
     * @param int $number
     * @return mixed
     */
    public function receive($number = 0)
    {
        $number || $number = -1;
        $data = array();
        foreach ($this->_redis->lRange($this->_name, 0, $number) as $item) {
            $data[] = $item;
        }
        return $data;
    }

    /**
     * 弹出最后一个消息
     * @return mixed
     */
    public function pop()
    {
        return $this->_redis->rPop($this->_name);
    }

    /**
     * 删除某个消息
     * @param array $message
     */
    public function del($message)
    {
        $this->_redis->lRem($this->_name, $message, 1);
    }
}