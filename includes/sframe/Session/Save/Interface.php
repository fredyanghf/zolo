<?php
/**
 * Save Handler Cache
 *
 * @package Session/save
 * @author shukyyang@pplive.com
 * @version $Id$
 */

interface SF_Session_Save_Interface
{
    public function open($save_path, $name);
    public function close();
    public function read($id);
    public function write($id, $data);
    public function destroy($id);
    public function gc($maxlifetime);
}