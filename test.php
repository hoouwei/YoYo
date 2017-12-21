<?php
//echo "dd".'<br>';
//echo $_GET['name'].'<br>';

//$a = require('/data/config.php');
//$mysql_server_name=$a['DB_HOST'];
//$mysql_username=$a['DB_USER'];
//$mysql_password=$a['DB_PWD'];
//$mysql_database=$a['DB_NAME'];
//$id=$_POST['name'];
//$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库
//mysql_query("set names 'utf8'");
//mysql_select_db($mysql_database);
//
//$sql ="select cat_id,goods_sn from yoyo_goods where goods_id='1'";
//$result = mysql_query($sql,$conn);
//$row = mysql_fetch_array($result);
//echo json_encode($row);
//include '/include/apps/default/controllers/FlowController.class.php';
//echo $_GET['a'];
//$a = new FlowController();
//$a->index('1');
function a(){
    $GLOBALS['test']='1';
}
a();
echo $GLOBALS['test'];





?>