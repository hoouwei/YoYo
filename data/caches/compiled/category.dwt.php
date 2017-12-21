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
		<link rel="stylesheet" href="__TPL__/statics/css/jquery-ui-1.10.1.custom.min.css" />
		<link rel="stylesheet" href="__TPL__/statics/css/ectouch.css" />
	</head>
	<body class="">
		<div id="loading"><img src="__TPL__/statics/img/loading.gif" /></div>
		<div class="con">
			<div class="category">
				<section class="search">
					<div class="text-all dis-box j-text-all">
						<div class="box-flex input-text">
							<a class="a-search-input j-search-input" href="javascript:void(0)"></a>
							<input class="j-input-text" type="text" placeholder="商品搜索" />
							<i class="iconfont icon-guanbi is-null j-is-null"></i>
						</div>
						<a href="#j-filter-div" class="s-filter j-s-filter">筛选</a>
					</div>
				</section>
				<?php echo $this->fetch('library/new_goods_list.lbi'); ?>
			</div>
		</div>
		<?php echo $this->fetch('library/new_goods_filter.lbi'); ?>
		<?php echo $this->fetch('library/new_search.lbi'); ?>
		
		<script type="text/javascript" src="__TPL__/statics/js/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/swiper-3.2.5.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/jquery-ui-1.10.1.custom.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/jquery.ui.touch-punch.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/jquery.scrollUp.min.js"></script>
		<script type="text/javascript" src="__TPL__/statics/js/ectouch.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/jquery.infinite.js"></script>
		<script type="text/javascript" src="__PUBLIC__/js/template.js"></script>
<script type="text/javascript">
	var sliders = function() {
		// 筛选价格区间 js
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: <?php echo $this->_var['max_price']; ?>,
			step: 100,
			values: [0, 300],
			slide: function(event, ui) {
				$("#slider-range-amount").text(ui.values[0] + " ~ " + ui.values[1]);
				$("input[name=price_min]").val(ui.values[0]);
                $("input[name=price_max]").val(ui.values[1]);
			}
		});
		$("#slider-range-amount").text($("#slider-range").slider("values", 0) + " ~ " + $("#slider-range").slider("values", 1));
	}();
</script>
<script>
$(function(){
   var url = '<?php echo url('category/async_list', array('id'=>$this->_var['id'], 'type'=>$this->_var['type'], 'brand'=>$this->_var['brand'], 'price_min'=>$this->_var['price_min'], 'price_max'=>$this->_var['price_max'], 'filter_attr'=>$this->_var['filter_attr'], 'page'=>$this->_var['page'], 'sort'=>$this->_var['sort'], 'order'=>$this->_var['order'], 'keywords'=>$this->_var['keywords']));?>';
   $('.product-list').infinite({url: url,params:"brand=<?php echo $this->_var['brand']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&keywords=<?php echo $this->_var['keywords']; ?>&type=<?php echo $this->_var['type']; ?>", template:'j-product'});
})
</script>



        <?php echo $this->_var['aaa']['0']['goods_sn']; ?>
		<?php $_from = $this->_var['aaa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'a');if (count($_from)):
    foreach ($_from AS $this->_var['a']):
?>
        <?php echo $this->_var['a']['goods_sn']; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>



</body>

</html>