<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('ROOT_PATH', dirname(__DIR__));
require_once ROOT_PATH .'/includes/sframe/_init_web.php';

define('URL_BASE', SF_Request::getBase());
define('VIEW_PATH', ROOT_PATH .'/views');
define('BLOCK_PATH', VIEW_PATH .'/blocks');
define('PRD_PATH', VIEW_PATH .'/product');




function linkto($path)
{
    return URL_BASE .'/'. $path;
}


function getProductSegment($key)
{
    $p = getGet('p', 'p1');
    $p = trim($p);
    include PRD_PATH .'/en/'. $p .'/'. $key .'.php';
}