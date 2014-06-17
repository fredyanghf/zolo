<?php
/**
 * Cache后端接口
 *
 * @package Queue
 * @author shukyyang
 * @version $Id$
 */
interface SF_Queue_Interface
{
    public function count();
    public function send($message);
    public function receive($number = 0);
    public function pop();
    public function del($message);
}
