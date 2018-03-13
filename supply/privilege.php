<?php

/**
 * ECSHOP 管理员信息以及权限管理程序
 * ============================================================================
 * *
 * 网站地址:
 * ----------------------------------------------------------------------------
 *
 *
 * ============================================================================
 *
 * $Id: privilege.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECTOUCH', true);

require(dirname(__FILE__) . '/includes/init.php');

/* act操作项的初始化 */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'login';
}
else
{
    $_REQUEST['act'] = trim($_REQUEST['act']);
}

/* 初始化 $exc 对象 */
$exc = new exchange($ecs->table("admin_user"), $db, 'user_id', 'user_name');

/*------------------------------------------------------ */
//-- 退出登录
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'logout')
{
//    /* 清除cookie */
//    setcookie('ECSCP[admin_id]',   '', 1);
//    setcookie('ECSCP[admin_pass]', '', 1);

    $sess->destroy_session();

    $_REQUEST['act'] = 'login';
}

/*------------------------------------------------------ */
//-- 登陆界面
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'login')
{
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");

    if ((intval($_CFG['captcha']) & CAPTCHA_ADMIN) && gd_version() > 0)
    {
        $smarty->assign('gd_version', gd_version());
        $smarty->assign('random',     mt_rand());
    }

    $smarty->display('login.htm');
}

/*------------------------------------------------------ */
//-- 验证登陆信息
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'signin')
{

    $_POST['username'] = isset($_POST['username']) ? trim($_POST['username']) : '';
    $_POST['password'] = isset($_POST['password']) ? trim($_POST['password']) : '';
         /* 检查密码是否正确 ,不考虑加salt*/
        $sql = "SELECT *".
            " FROM " . $ecs->table('supply_user') .
            " WHERE user_name = '" . $_POST['username']. "' AND password = '" . md5($_POST['password']) . "'";
    $row = $db->getRow($sql);
    if ($row)
    {
        // 登录成功,设置session
        $_SESSION['supply_id']    = $row['supply_id'];
        $_SESSION['supply_name']  = $row['user_name'];
        // 更新最后登录时间和IP
        $db->query("UPDATE " .$ecs->table('supply_user').
                 " SET last_login='" . gmtime() . "', last_ip='" . real_ip() . "'".
                 " WHERE supply_id='$_SESSION[supply_id]'");

//        if (isset($_POST['remember']))
//        {
//            $time = gmtime() + 3600 * 24 * 365;
//            setcookie('ECSCP[admin_id]',   $row['user_id'],                            $time);
//            setcookie('ECSCP[admin_pass]', md5($row['password'] . $_CFG['hash_code']), $time);
//        }

        ecs_header("Location: ./index.php\n");
        exit;
    }
    else
    {
        sys_msg($_LANG['login_faild'], 1);
    }
}

/*------------------------------------------------------ */
//-- 商家信息页面 NEW
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'supplyinfo')
{
    if (empty($_SESSION['supply_id'])){
        ecs_header("Location: privilege.php?act=login\n");
    }
    $sql="select supply_id,user_name,email,tel,address,company_name,des from".$ecs->table('supply_user')."where supply_id=".$_SESSION['supply_id'];
    $supply=$db->getRow($sql);
    /* 模板赋值 */
    $smarty->assign('supply',   $supply);
    /* 显示页面 */
    $smarty->display('supply_info.htm');
}
/*------------------------------------------------------ */
//-- 商家信息页面 NEW
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'supplyinfoedit')
{
    /* 接收post数据 */
    $supply_id = empty($_POST['supply_id']) ? '' : trim($_POST['supply_id']);
    $company_name = empty($_POST['company_name']) ? '' : trim($_POST['company_name']);
    $email = empty($_POST['email']) ? '' : trim($_POST['email']);
    $tel = empty($_POST['tel']) ? '' : trim($_POST['tel']);
    $address = empty($_POST['address']) ? '' : trim($_POST['address']);
    $des = empty($_POST['des']) ? '' : trim($_POST['des']);
    $sql="update ".$ecs->table('supply_user')."set company_name='$company_name',email='$email',tel='$tel',des='$des' where supply_id=".$supply_id;
    $db->query($sql);
    sys_msg("修改成功", 0, $link);
}

/*------------------------------------------------------ */
//-- 密码修改页面 NEW
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'pwd')
{
    if (empty($_SESSION['supply_name'])){
        ecs_header("Location: privilege.php?act=login\n");
    }
    /* 模板赋值 */
    $smarty->assign('supply_name',   $_SESSION['supply_name']);
    $smarty->assign('supply_id',   $_SESSION['supply_id']);

    /* 显示页面 */
    assign_query_info();
    $smarty->display('supply_pwd.htm');
}

/*------------------------------------------------------ */
//-- 密码修改流程 NEW
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'pwdedit')
{
    if (empty($_SESSION['supply_id'])){
       error_log("kong");
    }
    /* 接受参数 */
    $supply_id = empty($_POST['supply_id']) ? '' : trim($_POST['supply_id']);
    $old_pwd = empty($_POST['old_pwd']) ? '' : trim($_POST['old_pwd']);
    $new_pwd = empty($_POST['new_pwd']) ? '' : trim($_POST['new_pwd']);
    $new_pwd_confirm = empty($_POST['new_pwd_confirm']) ? '' : trim($_POST['new_pwd_confirm']);
    /* 判断旧密码是否正确 */
    $md5_old_pwd=md5($old_pwd);
    $sql="select * from".$ecs->table('supply_user')."where supply_id=".$supply_id." and password='$md5_old_pwd'";
    error_log($sql);
    $res=$db->getRow($sql);
    if ($res==null||$res==""||empty($res)){
        sys_msg("旧密码错误，请重新输入", 0, $link);

    }
    /* 判断确认新密码是否为空 */
    if (empty($new_pwd)||$new_pwd==null||$new_pwd==''){
        sys_msg("密码不能为空 ，请重新输入", 0, $link);
    }
    /* 判断确认新密码是否相同 */
    if ($new_pwd <> $new_pwd_confirm)
    {
        $link[] = array('text' => $_LANG['go_back'], 'href'=>'javascript:history.back(-1)');
        sys_msg($_LANG['js_languages']['password_error'], 0, $link);
    }
    $msg = $_LANG['edit_password_succeed'];

    /* 执行修改 */
    $md5_new_pwd=md5($new_pwd);
    $sql="update ".$ecs->table('supply_user')."set password='$md5_new_pwd' where supply_id=".$supply_id;
    error_log($sql);
    $db->query($sql);

    /* 显示结果 */
    $sess->destroy_session();
    $g_link = 'privilege.php?act=login';
    $link[] = array('text' => "重新登陆", 'href'=>$g_link);
    sys_msg("修改成功，请重新登陆<script>parent.document.getElementById('header-frame').contentWindow.document.location.reload();</script>", 0, $link);
}

/*------------------------------------------------------ */
//-- 管理员列表页面
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'list')
{
    /* 模板赋值 */
    $smarty->assign('ur_here',     $_LANG['admin_list']);
    $smarty->assign('action_link', array('href'=>'privilege.php?act=add', 'text' => $_LANG['admin_add']));
    $smarty->assign('full_page',   1);
    $smarty->assign('admin_list',  get_admin_userlist());

    /* 显示页面 */
    assign_query_info();
    $smarty->display('privilege_list.htm');
}

/*------------------------------------------------------ */
//-- 查询
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $smarty->assign('admin_list',  get_admin_userlist());

    make_json_result($smarty->fetch('privilege_list.htm'));
}

/*------------------------------------------------------ */
//-- 添加管理员页面
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'add')
{
    /* 检查权限 */
    admin_priv('admin_manage');

     /* 模板赋值 */
    $smarty->assign('ur_here',     $_LANG['admin_add']);
    $smarty->assign('action_link', array('href'=>'privilege.php?act=list', 'text' => $_LANG['admin_list']));
    $smarty->assign('form_act',    'insert');
    $smarty->assign('action',      'add');
    $smarty->assign('select_role',  get_role_list());

    /* 显示页面 */
    assign_query_info();
    $smarty->display('privilege_info.htm');
}

/*------------------------------------------------------ */
//-- 添加管理员的处理
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'insert')
{
    admin_priv('admin_manage');
    if($_POST['token']!=$_CFG['token'])
    {
         sys_msg('add_error', 1);
    }
    /* 判断管理员是否已经存在 */
    if (!empty($_POST['user_name']))
    {
        $is_only = $exc->is_only('user_name', $_POST['user_name']);

        if (!$is_only)
        {
            sys_msg(sprintf($_LANG['user_name_exist'], $_POST['user_name']), 1);
        }
    }

    /* Email地址是否有重复 */
    if (!empty($_POST['email']))
    {
        $is_only = $exc->is_only('email', stripslashes($_POST['email']));

        if (!$is_only)
        {
            sys_msg(sprintf($_LANG['email_exist'], stripslashes($_POST['email'])), 1);
        }
    }

    /* 获取添加日期及密码 */
    $add_time = gmtime();

    $password  = md5($_POST['password']);
    $role_id = '';
    $action_list = '';
    if (!empty($_POST['select_role']))
    {
        $sql = "SELECT action_list FROM " . $ecs->table('role') . " WHERE role_id = '".$_POST['select_role']."'";
        $row = $db->getRow($sql);
        $action_list = $row['action_list'];
        $role_id = $_POST['select_role'];
    }

        $sql = "SELECT nav_list FROM " . $ecs->table('admin_user') . " WHERE action_list = 'all'";
        $row = $db->getRow($sql);


    $sql = "INSERT INTO ".$ecs->table('admin_user')." (user_name, email, password, add_time, nav_list, action_list, role_id) ".
           "VALUES ('".trim($_POST['user_name'])."', '".trim($_POST['email'])."', '$password', '$add_time', '$row[nav_list]', '$action_list', '$role_id')";

    $db->query($sql);
    /* 转入权限分配列表 */
    $new_id = $db->Insert_ID();

    /*添加链接*/
    $link[0]['text'] = $_LANG['go_allot_priv'];
    $link[0]['href'] = 'privilege.php?act=allot&id='.$new_id.'&user='.$_POST['user_name'].'';

    $link[1]['text'] = $_LANG['continue_add'];
    $link[1]['href'] = 'privilege.php?act=add';

    sys_msg($_LANG['add'] . "&nbsp;" .$_POST['user_name'] . "&nbsp;" . $_LANG['action_succeed'],0, $link);

    /* 记录管理员操作 */
    admin_log($_POST['user_name'], 'add', 'privilege');
 }

/*------------------------------------------------------ */
//-- 编辑管理员信息
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit')
{
    /* 不能编辑demo这个管理员 */
    if ($_SESSION['admin_name'] == 'demo')
    {
       $link[] = array('text' => $_LANG['back_list'], 'href'=>'privilege.php?act=list');
       sys_msg($_LANG['edit_admininfo_cannot'], 0, $link);
    }

    $_REQUEST['id'] = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

    /* 查看是否有权限编辑其他管理员的信息 */
    if ($_SESSION['admin_id'] != $_REQUEST['id'])
    {
        admin_priv('admin_manage');
    }

    /* 获取管理员信息 */
    $sql = "SELECT user_id, user_name, email, password, agency_id, role_id FROM " .$ecs->table('admin_user').
           " WHERE user_id = '".$_REQUEST['id']."'";
    $user_info = $db->getRow($sql);


    /* 取得该管理员负责的办事处名称 */
    if ($user_info['agency_id'] > 0)
    {
        $sql = "SELECT agency_name FROM " . $ecs->table('agency') . " WHERE agency_id = '$user_info[agency_id]'";
        $user_info['agency_name'] = $db->getOne($sql);
    }

    /* 模板赋值 */
    $smarty->assign('ur_here',     $_LANG['admin_edit']);
    $smarty->assign('action_link', array('text' => $_LANG['admin_list'], 'href'=>'privilege.php?act=list'));
    $smarty->assign('user',        $user_info);

    /* 获得该管理员的权限 */
    $priv_str = $db->getOne("SELECT action_list FROM " .$ecs->table('admin_user'). " WHERE user_id = '$_GET[id]'");

    /* 如果被编辑的管理员拥有了all这个权限，将不能编辑 */
    if ($priv_str != 'all')
    {
       $smarty->assign('select_role',  get_role_list());
    }
    $smarty->assign('form_act',    'update');
    $smarty->assign('action',      'edit');

    assign_query_info();
    $smarty->display('privilege_info.htm');
}

/*------------------------------------------------------ */
//-- 更新管理员信息
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'update' || $_REQUEST['act'] == 'update_self')
{

    /* 变量初始化 */
    $admin_id    = !empty($_REQUEST['id'])        ? intval($_REQUEST['id'])      : 0;
    $admin_name  = !empty($_REQUEST['user_name']) ? trim($_REQUEST['user_name']) : '';
    $admin_email = !empty($_REQUEST['email'])     ? trim($_REQUEST['email'])     : '';
    $ec_salt=rand(1,9999);
    $password = !empty($_POST['new_password']) ? ", password = '".md5(md5($_POST['new_password']).$ec_salt)."'"    : '';
    if($_POST['token']!=$_CFG['token'])
    {
         sys_msg('update_error', 1);
    }
    if ($_REQUEST['act'] == 'update')
    {
        /* 查看是否有权限编辑其他管理员的信息 */
        if ($_SESSION['admin_id'] != $_REQUEST['id'])
        {
            admin_priv('admin_manage');
        }
        $g_link = 'privilege.php?act=list';
        $nav_list = '';
    }
    else
    {
        $nav_list = !empty($_POST['nav_list'])     ? ", nav_list = '".@join(",", $_POST['nav_list'])."'" : '';
        $admin_id = $_SESSION['admin_id'];
        $g_link = 'privilege.php?act=modif';
    }
    /* 判断管理员是否已经存在 */
    if (!empty($admin_name))
    {
        $is_only = $exc->num('user_name', $admin_name, $admin_id);
        if ($is_only == 1)
        {
            sys_msg(sprintf($_LANG['user_name_exist'], stripslashes($admin_name)), 1);
        }
    }

    /* Email地址是否有重复 */
    if (!empty($admin_email))
    {
        $is_only = $exc->num('email', $admin_email, $admin_id);

        if ($is_only == 1)
        {
            sys_msg(sprintf($_LANG['email_exist'], stripslashes($admin_email)), 1);
        }
    }

    //如果要修改密码
    $pwd_modified = false;

    if (!empty($_POST['new_password']))
    {
        /* 查询旧密码并与输入的旧密码比较是否相同 */
        $sql = "SELECT password FROM ".$ecs->table('admin_user')." WHERE user_id = '$admin_id'";
        $old_password = $db->getOne($sql);
		$sql ="SELECT ec_salt FROM ".$ecs->table('admin_user')." WHERE user_id = '$admin_id'";
        $old_ec_salt= $db->getOne($sql);
		if(empty($old_ec_salt))
	    {
			$old_ec_password=md5($_POST['old_password']);
		}
		else
	    {
			$old_ec_password=md5(md5($_POST['old_password']).$old_ec_salt);
		}
        if ($old_password <> $old_ec_password)
        {
           $link[] = array('text' => $_LANG['go_back'], 'href'=>'javascript:history.back(-1)');
           sys_msg($_LANG['pwd_error'], 0, $link);
        }

        /* 比较新密码和确认密码是否相同 */
        if ($_POST['new_password'] <> $_POST['pwd_confirm'])
        {
           $link[] = array('text' => $_LANG['go_back'], 'href'=>'javascript:history.back(-1)');
           sys_msg($_LANG['js_languages']['password_error'], 0, $link);
        }
        else
        {
            $pwd_modified = true;
        }
    }

    $role_id = '';
    $action_list = '';
    if (!empty($_POST['select_role']))
    {
        $sql = "SELECT action_list FROM " . $ecs->table('role') . " WHERE role_id = '".$_POST['select_role']."'";
        $row = $db->getRow($sql);
        $action_list = ', action_list = \''.$row['action_list'].'\'';
        $role_id = ', role_id = '.$_POST['select_role'].' ';
    }
    //更新管理员信息
    if($pwd_modified)
    {
        $sql = "UPDATE " .$ecs->table('admin_user'). " SET ".
               "user_name = '$admin_name', ".
               "email = '$admin_email', ".
               "ec_salt = '$ec_salt' ".
               $action_list.
               $role_id.
               $password.
               $nav_list.
               "WHERE user_id = '$admin_id'";
    }
    else
    {
        $sql = "UPDATE " .$ecs->table('admin_user'). " SET ".
               "user_name = '$admin_name', ".
               "email = '$admin_email' ".
               $action_list.
               $role_id.
               $nav_list.
               "WHERE user_id = '$admin_id'";
    }

   $db->query($sql);
   /* 记录管理员操作 */
   admin_log($_POST['user_name'], 'edit', 'privilege');

   /* 如果修改了密码，则需要将session中该管理员的数据清空 */
   if ($pwd_modified && $_REQUEST['act'] == 'update_self')
   {
       $sess->delete_spec_admin_session($_SESSION['admin_id']);
       $msg = $_LANG['edit_password_succeed'];
   }
   else
   {
       $msg = $_LANG['edit_profile_succeed'];
   }

   /* 提示信息 */
   $link[] = array('text' => strpos($g_link, 'list') ? $_LANG['back_admin_list'] : $_LANG['modif_info'], 'href'=>$g_link);
   sys_msg("$msg<script>parent.document.getElementById('header-frame').contentWindow.document.location.reload();</script>", 0, $link);

}

/*------------------------------------------------------ */
//-- 编辑个人资料
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'modif')
{
    /* 不能编辑demo这个管理员 */
    if ($_SESSION['admin_name'] == 'demo')
    {
       $link[] = array('text' => $_LANG['back_admin_list'], 'href'=>'privilege.php?act=list');
       sys_msg($_LANG['edit_admininfo_cannot'], 0, $link);
    }

    include_once('includes/inc_menu.php');
    include_once('includes/inc_priv.php');

    /* 包含插件菜单语言项 */
    $sql = "SELECT code FROM ".$ecs->table('plugins');
    $rs = $db->query($sql);
    while ($row = $db->FetchRow($rs))
    {
        /* 取得语言项 */
        if (file_exists(ROOT_PATH.'plugins/'.$row['code'].'/languages/common_'.$_CFG['lang'].'.php'))
        {
            include_once(ROOT_PATH.'plugins/'.$row['code'].'/languages/common_'.$_CFG['lang'].'.php');
        }

        /* 插件的菜单项 */
        if (file_exists(ROOT_PATH.'plugins/'.$row['code'].'/languages/inc_menu.php'))
        {
            include_once(ROOT_PATH.'plugins/'.$row['code'].'/languages/inc_menu.php');
        }
    }

    foreach ($modules AS $key => $value)
    {
        ksort($modules[$key]);
    }
    ksort($modules);

    foreach ($modules AS $key => $val)
    {
        if (is_array($val))
        {
            foreach ($val AS $k => $v)
            {
                if (is_array($purview[$k]))
                {
                    $boole = false;
                    foreach ($purview[$k] as $action)
                    {
                         $boole = $boole || admin_priv($action, '', false);
                    }
                    if (!$boole)
                    {
                        unset($modules[$key][$k]);
                    }
                }
                elseif (! admin_priv($purview[$k], '', false))
                {
                    unset($modules[$key][$k]);
                }
            }
        }
    }

    /* 获得当前管理员数据信息 */
    $sql = "SELECT user_id, user_name, email, nav_list ".
           "FROM " .$ecs->table('admin_user'). " WHERE user_id = '".$_SESSION['admin_id']."'";
    $user_info = $db->getRow($sql);

    /* 获取导航条 */
    $nav_arr = (trim($user_info['nav_list']) == '') ? array() : explode(",", $user_info['nav_list']);
    $nav_lst = array();
    foreach ($nav_arr AS $val)
    {
        $arr              = explode('|', $val);
        $nav_lst[$arr[1]] = $arr[0];
    }

    /* 模板赋值 */
    $smarty->assign('lang',        $_LANG);
    $smarty->assign('ur_here',     $_LANG['modif_info']);
    $smarty->assign('action_link', array('text' => $_LANG['admin_list'], 'href'=>'privilege.php?act=list'));
    $smarty->assign('user',        $user_info);
    $smarty->assign('menus',       $modules);
    $smarty->assign('nav_arr',     $nav_lst);

    $smarty->assign('form_act',    'update_self');
    $smarty->assign('action',      'modif');

    /* 显示页面 */
    assign_query_info();
    $smarty->display('privilege_info.htm');
}

/* 获取管理员列表 */
function get_admin_userlist()
{
    $list = array();
    $sql  = 'SELECT user_id, user_name, email, add_time, last_login '.
            'FROM ' .$GLOBALS['ecs']->table('admin_user').' ORDER BY user_id DESC';
    $list = $GLOBALS['db']->getAll($sql);

    foreach ($list AS $key=>$val)
    {
        $list[$key]['add_time']     = local_date($GLOBALS['_CFG']['time_format'], $val['add_time']);
        $list[$key]['last_login']   = local_date($GLOBALS['_CFG']['time_format'], $val['last_login']);
    }

    return $list;
}

/* 清除购物车中过期的数据 */
function clear_cart()
{
    /* 取得有效的session */
    $sql = "SELECT DISTINCT session_id " .
            "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " .
                $GLOBALS['ecs']->table('sessions') . " AS s " .
            "WHERE c.session_id = s.sesskey ";
    $valid_sess = $GLOBALS['db']->getCol($sql);

    // 删除cart中无效的数据
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
            " WHERE session_id NOT " . db_create_in($valid_sess);
    $GLOBALS['db']->query($sql);
}

/* 获取角色列表 */
function get_role_list()
{
    $list = array();
    $sql  = 'SELECT role_id, role_name, action_list '.
            'FROM ' .$GLOBALS['ecs']->table('role');
    $list = $GLOBALS['db']->getAll($sql);
    return $list;
}

?>
