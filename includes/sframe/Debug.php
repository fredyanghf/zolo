<?php
/**
 * Debug
 *
 * @package Validator
 * @author shukyyang@pplive.com
 * @version $Id$
 */

class SF_Debug
{
    public function p($val)
    {
        echo '<pre>';
        print_r($val);
        exit;
    }
}