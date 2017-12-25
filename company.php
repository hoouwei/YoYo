<?php
$a = require('/data/config.php');
$mysql_server_name=$a['DB_HOST'];
$mysql_username=$a['DB_USER'];
$mysql_password=$a['DB_PWD'];
$mysql_database=$a['DB_NAME'];
$city=$_POST['city'];
$company=$_POST['company'];
$address=$_POST['address'];
$num=$_POST['num'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$rec_tel=$_POST['rec_tel'];

$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库
mysql_query("set names 'utf8'");
mysql_select_db($mysql_database);

$sql ="insert into yoyo_company (city,company,address,num,name,tel,rec_tel) values ('$city','$company','$address','$num','$name','$tel','$rec_tel')";
$result = mysql_query($sql,$conn);

    echo '<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>XXX</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/base/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
        <link href="assets/base/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css" />
        <style>
            .input-group{
                border: 1px solid #e3e3e3;
                width: 10em;
            }
            .input-group-addon{
                width: 2.3em;
                font-size: 1em;
                line-height: 2.3em;
                padding: 0;
                border-radius: 0;
                border: none;
                background-color: #FFFFFF;
            }
            .form-contro{
                height: 2.3em;
                text-align: center;
                padding: 0 0.4em;
                width: 100%;
                background: none;
                border: none;
                border-radius: 0;
                box-shadow: inset 0 0 0;
            }

        </style>
</head>

    <body class="c-layout-header-fixed c-layout-header-mobile-fixed ">
        <div class="c-layout-page">
            <div class="c-size-lg">
                <div class="container" style="margin-top: -40px;">
                    <div class="c-shop-cart-page-1">

                        <div class="c-content-box c-size-lg">
                            <div class="container">
                                <div class="c-shop-cart-page-1 c-center">
                                    <i class="fa fa-smile-o c-font-dark c-font-50 c-font-thin "></i>
                                    <h2 class="c-font-thin c-center">提交成功，我们会尽快与您取得联系！</h2>
                                </div>
                            </div>
                        </div>
                        <div class="c-cart-buttons">
                            <a href="javascript:history.back(-1)" class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white  c-cart-float-l">返回</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-layout-go2top">
            <i class="icon-arrow-up"></i>
        </div>
    </body>

</html>';

?>