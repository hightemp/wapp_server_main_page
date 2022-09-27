<?php

define('ROOT_PATH', __DIR__);
define('DEBUG', getenv('DEBUG'));
define('SERVER_PORT', getenv('SERVER_PORT') ?: 8080);
define('SERVER_HOST', getenv('SERVER_HOST') ?: "0.0.0.0");

if (defined('DEBUG') && DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL & ~E_DEPRECATED);
}

$SERVER_NAME = getenv('SERVER_NAME');

if (isset($_GET['myDoc'])) {
    file_put_contents('./content.html', $_GET['myDoc']);
}

$sContent = file_get_contents('./content.html');

if (isset($_GET['edit'])) {
    require_once("index_page.php");
} else {
    require_once("edit_page.php");
}