<?php



define('IN_ECTOUCH', true);
define('CONTROLLER_NAME', 'Respond');
if(!isset($_REQUEST['code'])){
    header('location: ./index.php?'.$_SERVER['QUERY_STRING']);
    exit;
}
require ('include/bootstrap.php');
