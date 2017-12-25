<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECTouch 2.2.30" />
	<meta charset="utf-8"/>
	<title><?php echo $this->_var['page_title']; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="assets/base/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="assets/base/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css"/>
	
	<style>
		.description{
			font-size: 1.3rem;
			color: #909090;
			background: url(css/b.png) no-repeat;
			background-size: 2.5rem;
			padding: 0.3rem 0 .4rem 1.5rem;
			margin-top: 1rem;
		}
		.price{
			font-size: 1.9rem;
			color: #EE5A52;
			display: inline-block;
			vertical-align: bottom;
		}
		.dish-stock{
			font-size: 1.3rem;
			color: #909090;
			display: inline-block;
			vertical-align: middle;
		}
		.test{
			float: right;
			height: 2.7rem;
			line-height: 2.7rem;
			vertical-align: top;
		}
		.cart-icon{
			width: 2.5rem;
			height: 2.5rem;
			margin-top: .6rem;
			background: url(css/cart.png) no-repeat;
			background-size: 100%;
		}
		.left-icon{
			float: left;
			position: relative;
			width: 3.5rem;
			margin-left: 1.4rem;
		}
		.count{
			width: 1.8rem;
			height: 1.8rem;
			text-align: center;
			line-height: 1.5rem;
			border-radius: 50%;
			overflow: hidden;
			background: #ED574F;
			color: #fff;
			font-size: 1.5rem;
			border: 1px solid #fff;
			position: absolute;
			right: .1rem;
			top: -.1rem;
			box-shadow: 0 0 3px #999;
		}
		.money{
			float: left;
			color: #ED574F;
			font-size: 1.9rem;
			font-weight: 400;
			padding-left: 1.2rem;
			padding-top: .7rem;
		}

	</style>
	<script type="text/javascript" src="__TPL__/statics/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="__TPL__/statics/js/swiper-3.2.5.min.js"></script>
	<script type="text/javascript" src="__TPL__/statics/js/ectouch.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/jquery.json.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
</head>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse">

<div class="c-layout-page2">
	<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
		<div class="container">
			<div class="c-content-tab-5  c-theme">
				<?php if ($this->_var['brand'] == 1): ?>
				<ul class="nav nav-pills c-nav-tab c-arrow" role="tablist">
					<li role="presentation" class="active">
						<a class="c-font-uppercase" href="index.php?m=default&c=category&a=index&id=<?php echo $this->_var['cat_id']; ?>&brand=1" aria-controls="" role="tab" data-toggle="tab">今日菜单</a>
					</li>
					<li role="presentation" >
						<a class="c-font-uppercase" href="index.php?m=default&c=category&a=index&id=<?php echo $this->_var['cat_id']; ?>&brand=2" aria-controls="" role="tab" aria-expanded="true" data-toggle="tab">明日菜单</a>
					</li>
				</ul>
				<?php else: ?>
				<ul class="nav nav-pills c-nav-tab c-arrow" role="tablist">
					<li role="presentation" >
						<a class="c-font-uppercase" href="index.php?m=default&c=category&a=index&id=<?php echo $this->_var['cat_id']; ?>&brand=1" aria-controls="" role="tab" data-toggle="tab">今日菜单</a>
					</li>
					<li role="presentation" class="active" >
						<a class="c-font-uppercase" href="index.php?m=default&c=category&a=index&id=<?php echo $this->_var['cat_id']; ?>&brand=2" aria-controls="" role="tab" aria-expanded="true" data-toggle="tab">明日菜单</a>
					</li>
				</ul>
				<?php endif; ?>
			</div>
			<div class="row" style="margin-top: -20px;">




				<?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'good');if (count($_from)):
    foreach ($_from AS $this->_var['good']):
?>
                
				<?php if ($this->_var['good']['is_on_sale'] == 1): ?>
				<div class="col-md-3 col-sm-6 c-margin-b-20">
					<div class="c-content-product-2 c-bg-white">
						<div class="c-content-overlay">
							<div class="c-label c-theme-bg c-font-uppercase c-font-white c-font-13 c-font-bold">New</div>
							<div class="c-bg-img-center c-overlay-object" data-height="height"
								 style="height: 270px; background-image: url(http://localhost/yoyo/<?php echo $this->_var['good']['original_img']; ?>);"></div>
						</div>
						<div class="c-info">
							<p class="c-title c-font-20 c-font-dark"><?php echo $this->_var['good']['goods_name']; ?></p>
							<?php if ($this->_var['good']['goods_number'] == 0): ?>
							<div class="price"><span class="dish-price-value">已售罄</div>
							<?php else: ?>
							<div class="price"><span class="dish-price-value">8.50</span>元</div>
							<div class="dish-stock">&nbsp;·&nbsp;剩余<span class="dish-stock-value" data-stock="20"><?php echo $this->_var['good']['goods_number']; ?></span>份
							</div>
							<div class="test">
								<a type="button" onClick="addToCart0(<?php echo $this->_var['good']['goods_id']; ?>);" class="btn c-btn-green c-btn-circle" style="padding: 4px 10px 4px 10px;font-size: 14px;">+</a>&nbsp&nbsp
								<a type="button" onClick="addToCart1(<?php echo $this->_var['good']['goods_id']; ?>);" class="btn c-btn-green" style="padding: 6px 10px 4px 10px;font-size: 14px;">立即购买</a>
								<!--<a href="#" class="btn btn-md c-btn-green c-btn-circle"style="padding: 8px 6px 8px 6px;font-size: 14px;">-->
								<!--&nbsp&nbsp<i class="fa fa-bell-o"></i></a>-->
							</div>
							<?php endif; ?>
							<div class="description"><?php echo $this->_var['good']['short_des']; ?></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


			</div>
		</div>
	</div>
</div>

<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
	<div class="c-navbar">
		<div class="container">
			

			<div class="c-navbar-wrapper clearfix">
				<div style="margin-top: 10px">
					<div class="left-icon">
						<a href="index.php?c=flow&a=cart" >
						<div class="cart-icon"></div>
						</a>
						<div class="count" >
							<a href="index.php?c=flow&a=cart" id='total_number' style="color: #ffffff">
								<?php if ($this->_var['seller_cart_total_number']): ?><?php echo $this->_var['seller_cart_total_number']; ?><?php else: ?>0<?php endif; ?>
							</a>
						</div>

					</div>
					<a href="index.php?c=flow&a=cart" >
					<div class="money" >
						<span id='total_price'><?php echo $this->_var['cart_sum']; ?></span>元
					</div>
					</a>
				</div>
				<div style="margin-top: 5px;float: right;margin-right: 20px">
					<a type="button" href="#" class="btn c-btn-green" onclick="location.href='index.php?c=flow&a=cart'" >立即结算</a>
				</div>
			</div>

		</div>
	</div>
</header>

</body>

</html>