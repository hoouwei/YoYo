<!DOCTYPE html>
<html lang="en">
<head>
<meta name="Generator" content="ECTouch 2.2.30" />
	<meta charset="utf-8" />
	<title><?php echo $this->_var['page_title']; ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
	<link href="assets/base/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css" />
	<style>
		body,html{font-family:'Microsoft YaHei','Hiragino Sans GB',Helvetica,Arial,'Lucida Grande',sans-serif;}
		.fa-angle-right{
			content: "\f105";
			font-size: 2.4em;
			float: right;
			color: #bbb;
		}
	</style>
</head>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">
<div class="c-layout-page">
	<div class="container" style="margin-top: -60px">
		<div class="c-layout-sidebar-content ">
			<h3 class="c-border-bottom "style="line-height:1.5;">全部订单</h3><br>



			<?php $_from = $this->_var['orders_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'orders');$this->_foreach['orders_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['orders_list']['total'] > 0):
    foreach ($_from AS $this->_var['orders']):
        $this->_foreach['orders_list']['iteration']++;
?>
			<a href="<?php echo url('user/order_detail', array('order_id'=>$this->_var['orders']['order_id']));?>">
			<div class="row c-margin-b-40 c-order-history-2" style="margin-top: -40px">
				<div class="row c-cart-table-row">
					<div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
						<img src="<?php echo $this->_var['orders']['img']; ?>" /> </div>

					<div class=" col-xs-7 c-cart-desc">
						<p class="c-font-dark" style="margin: 0 0 0px">订单号：<?php echo $this->_var['orders']['order_sn']; ?></p><i class="pull-right fa fa-angle-right"></i>
						<p class="c-font-dark" style="margin: 0 0 0px">订单状态：<?php echo $this->_var['orders']['order_status']; ?></p>
						<p class="c-cart-sub-title c-theme-font" style="margin: 0 0 0px">订单金额：<?php echo $this->_var['orders']['total_fee']; ?></p>
						<p class="c-font-dark" style="margin: 0 0 0px">下单时间：<?php echo $this->_var['orders']['order_time']; ?></p>
					</div>
				</div>
			</div>
			</a>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


		</div>
	</div>
</div>
</body>

</html>