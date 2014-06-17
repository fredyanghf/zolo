<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH .'/includes/sframe/_init_web.php';

define('VIEW_PATH', ROOT_PATH .'/views');
define('BLOCK_PATH', VIEW_PATH .'/blocks');
define('URL_BASE', SF_Request::getBase());



function linkto($path)
{
    return URL_BASE .'/'. $path;
}