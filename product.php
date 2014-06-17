<?php
require_once __DIR__ . '/includes/boot.php';

$p = getGet('p', '');

if ($p) {
    include VIEW_PATH .'/product_info.php';
} else {
    include VIEW_PATH .'/product.php';
}

