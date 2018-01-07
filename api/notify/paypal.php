<?php



define('IN_ECTOUCH', true);
define('ROOT_PATH', str_replace('\\', '/', dirname(dirname(dirname(__FILE__)))) . '/');
define('CONTROLLER_NAME', 'Respond');
$_GET['code'] = 'palpay';
$_GET['type'] = 'notify';
require ROOT_PATH . 'include/bootstrap.php';
