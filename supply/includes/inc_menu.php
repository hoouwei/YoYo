<?php


if (!defined('IN_ECTOUCH'))
{
    die('Hacking attempt');
}

// 控制台
$modules['00_menu_dashboard']['01_dashboard_welcome'] = 'index.php?act=main';

// 设置
$modules['01_menu_system']['11']             = 'privilege.php?act=supplyinfo';
$modules['01_menu_system']['12']             = 'privilege.php?act=pwd';
// 商品
//$modules['02_menu_goods']['02_goods_add']        = 'goods.php?act=add';          // 添加商品

// 订单
$modules['03_menu_order']['02_order_list']               = 'order.php?act=list';
//$modules['03_menu_order']['03_order_query']               = 'order.php?act=time';

// 会员
//$modules['04_menu_members']['03_users_list']             = 'users.php?act=list';

?>
