<?php

define('APPROOT', __DIR__);
define('URLROOT', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . 'WoG');
define('APPNAME', 'Workout Generator');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'logindb');

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';

?>