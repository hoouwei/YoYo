<?php
require_once "jssdk.php";
$jssdk = new JSSDK("wxb536330f380e66e3", "a5f0259b9efd466695d82e4eea1e1e5f");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: ['scanQRCode']
    });
    wx.ready(function () {
        // 在这里调用 API
        wx.scanQRCode();
    });
</script>

</html>
