<!DOCTYPE html>
<html>
	<head>
<meta name="Generator" content="ECTouch 2.2.30" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<meta name="format-detection" content="telephone=no" />
		<meta charset="utf-8">
		<title><?php echo $this->_var['page_title']; ?></title>
		<link rel="stylesheet" href="__TPL__/statics/fonts/iconfont.css">
		<link rel="stylesheet" href="__TPL__/statics/css/swiper-3.2.5.min.css" />
		<link rel="stylesheet" href="__TPL__/statics/css/ectouch.css" />
	</head>

	<body class="">
		<div id="loading"><img src="__TPL__/statics/img/loading.gif" /></div>
		<section class="product-list j-product-list product-list-small" data="2">
				<?php $_from = $this->_var['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'good');if (count($_from)):
    foreach ($_from AS $this->_var['good']):
?>
				
				<?php if ($this->_var['good']['is_on_sale'] == 1): ?>
				<li>
					<div class="product-div">

						<img class="product-list-img" src="http://localhost/yoyo/<?php echo $this->_var['good']['original_img']; ?>">
						<div class="product-text">
							<h4><?php echo $this->_var['good']['goods_name']; ?></h4>
							
							<?php if ($this->_var['good']['goods_number'] == 0): ?>
							<p class="dis-box p-t-remark"><span class="box-flex">已售罄</span></p>
							<?php else: ?>
							<p class="dis-box p-t-remark"><span class="box-flex">库存：<?php echo $this->_var['good']['goods_number']; ?></span></p>
							<a type="button" class="icon-flow-cart fr j-goods-attr"   onClick="addToCart0(<?php echo $this->_var['good']['goods_id']; ?>);"><i class="iconfont icon-gouwuche"></i></a>
							<a type="button" class="btn-submit "style="margin-left:100px " onClick="addToCart1(<?php echo $this->_var['good']['goods_id']; ?>);">立即购买</a>
							<?php endif; ?>
							<p><span class="p-price t-first ">¥<?php echo $this->_var['good']['shop_price']; ?></span></p>
						</div>
					</div>

				</li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</section>
		<div class="filter-btn dis-box">
			<a href="<?php echo url('flow/cart');?>" class="filter-btn-flow filter-btn-a"><i class="iconfont icon-gouwuche"></i><sup class="b-color" id='total_number'><?php if ($this->_var['seller_cart_total_number']): ?><?php echo $this->_var['seller_cart_total_number']; ?><?php else: ?>0<?php endif; ?></sup><em>购物车</em></a>
			<a type="button" class="btn-cart box-flex"  ">总金额：<?php echo $this->_var['cart_sum']; ?></a>
			<a type="button" class="btn-submit box-flex" onclick="location.href='index.php?c=flow&a=cart'">立即支付</a>
		</div>
		
		<script type="text/javascript" src="__TPL__/statics/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/swiper-3.2.5.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/ectouch.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.json.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>

		</div>
</body>

</html>