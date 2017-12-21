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

<body style="max-width:640px;">
<div id="loading"><img src="__TPL__/statics/img/loading.gif" /></div>
<div class="con">
	
	<div class="goods">
		<div class="ect-bg">
			<header class="ect-header ect-margin-tb ect-margin-lr text-center icon-write ect-bg">
				<a href="javascript:history.go(-1);location.reload()" class="pull-left ect-icon ect-icon1 ect-icon-history"></a> <span><?php echo $this->_var['title']; ?></span>
			</header>
		</div>

		
		<div class="goods-photo j-show-goods-img">
			<div class="hd">
				<ul>
				</ul>
			</div>
			<span class="goods-num" id="goods-num"><span id="g-active-num"></span>/<span id="g-all-num"></span></span>
			<ul class="swiper-wrapper">
				<li class="swiper-slide tb-lr-center"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></li>
				<?php if ($this->_var['pictures']): ?>
				<?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');if (count($_from)):
    foreach ($_from AS $this->_var['picture']):
?>
				<?php if (($this->_foreach['no']['iteration'] - 1) > 0): ?>
				<li class="swiper-slide tb-lr-center"><img src="<?php echo $this->_var['picture']['img_url']; ?>" alt="<?php echo $this->_var['picture']['img_desc']; ?>" /></li>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php endif; ?>
			</ul>
			<div class="swiper-pagination"></div>
		</div>
		
		<div class="goods-info">
			
			<section class="goods-title b-color-f padding-all ">
				<div class="dis-box">
					<h3 class="box-flex"><?php echo $this->_var['goods']['goods_style_name']; ?></h3>
		
		<span class="heart j-heart <?php if ($this->_var['sc'] == 1): ?>active<?php endif; ?>" onClick="collect(<?php echo $this->_var['goods']['goods_id']; ?>)" id='ECS_COLLECT'><i class="ts-2"></i><em class="ts-2"><?php echo $this->_var['lang']['btn_collect']; ?></em></span>
				</div>
			</section>

			<section class="goods-price padding-all b-color-f">
				<p class="p-price">
					<span class="t-first">
				<?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
				<?php echo $this->_var['goods']['promote_price']; ?>
				<?php else: ?>
				<?php echo $this->_var['goods']['shop_price_formated']; ?>
				<?php endif; ?></span>
					<!-- <em class="em-promotion">5.8折</em></p> -->
				<p class="p-market">
					市场价<del><?php if ($this->_var['cfg']['SHOW_MARKETPRICE']): ?><?php echo $this->_var['goods']['market_price']; ?> <?php endif; ?></del>
				</p>
				<p class=" dis-box g-p-tthree m-top06">
					<span class="box-flex text-left"><?php echo $this->_var['lang']['sort_sales']; ?>：<?php echo $this->_var['sales_count']; ?></span>
					<span class="box-flex text-right">库ss存 <?php echo $this->_var['goods']['goods_number']; ?></span>
				</p>
			</section>
			
			<div class="filter-btn dis-box">
				<a class="filter-btn-kefu filter-btn-a"><i class="iconfont icon-kefu"></i><em>客服</em></a>
				<a href="<?php echo url('flow/cart');?>" class="filter-btn-flow filter-btn-a"><i class="iconfont icon-gouwuche"></i><sup class="b-color" id='total_number'><?php if ($this->_var['seller_cart_total_number']): ?><?php echo $this->_var['seller_cart_total_number']; ?><?php else: ?>0<?php endif; ?></sup><em>购物车</em></a>
				<a type="button" class="btn-cart box-flex" onClick="addToCart0(<?php echo $this->_var['goods']['goods_id']; ?>);">加入购物车</a>
                <a type="button" class="btn-submit box-flex" onclick="location.href='index.php?c=flow&a=cart'">立即结算</a>
				<a type="button" class="btn-submit box-flex" onClick="addToCart1(<?php echo $this->_var['goods']['goods_id']; ?>);">立即购买</a>
			</div>

			

			<form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
				<section class="goods-more-a">
					<!--  <a class="ect-padding-lr ect-padding-tb" href="<?php echo url('goods/info',array('id'=>$this->_var['goods']['goods_id']));?>"><span class="Text"><?php echo $this->_var['lang']['goods_brief']; ?></span> <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
      <a class="ect-padding-lr ect-padding-tb" href="<?php echo url('goods/comment_list',array('id'=>$this->_var['goods']['goods_id']));?>"><span class="Text"><?php echo $this->_var['lang']['goods_comment']; ?></span> <span class="pull-right"><span class="ect-color"><?php echo $this->_var['comments']['count']; ?></span><?php echo $this->_var['lang']['comment_num']; ?> <span class="ect-color"><?php echo $this->_var['comments']['favorable']; ?>%</span><?php echo $this->_var['lang']['favorable_comment']; ?> <i class="fa fa-chevron-right"></i></span></a>  -->
				</section>

				<section class="m-top1px padding-all b-color-f goods-attr j-goods-attr j-show-div">
					<div class="dis-box">
						<label class="t-remark g-t-temark">已选</label>
						<div class="box-flex t-goods1 ">请选择</div>
						<span class="t-jiantou"><i class="iconfont icon-jiantou tf-180"></i></span>
					</div>
					
					<div class="mask-filter-div"></div>
					<div class="show-goods-attr j-filter-show-div ts-3 b-color-1">
						<section class="s-g-attr-title b-color-1  product-list-small">
							<div class="product-div">
								<img src="<?php echo $this->_var['goods']['goods_img']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" class="product-list-img" />
								<div class="product-text">
									<div class="dis-box">
										<h4 class="box-flex"><?php echo $this->_var['goods']['goods_style_name']; ?></h4>
										<i class="iconfont icon-guanbi1 show-div-guanbi"></i>
									</div>
									<p><span class="p-price t-first" id="ECS_GOODS_AMOUNT">
										<?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
										<?php echo $this->_var['goods']['promote_price']; ?>
										<?php else: ?>
										<?php echo $this->_var['goods']['shop_price_formated']; ?>
										<?php endif; ?></span>
									</p>
									<p class="dis-box p-t-remark"><span class="box-flex">库存:<?php echo $this->_var['goods']['goods_number']; ?></span></p>
								</div>
							</div>
						</section>
						<section class="s-g-attr-con swiper-scroll b-color-f padding-all m-top1px">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');$this->_foreach['spec'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spec']['total'] > 0):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
        $this->_foreach['spec']['iteration']++;
?>
									<h4 class="t-remark"><?php echo $this->_var['spec']['name']; ?>：</h4>
									<ul class="select-one  <?php if ($this->_var['spec']['attr_type'] == 1): ?>j-get-one<?php else: ?>j-get-more<?php endif; ?> m-top10">
										<?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
										<li class="ect-select dis-flex fl" >
											<input type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> onclick="changePrice()" />
											<label class="ts-1 <?php if ($this->_var['key'] == 0): ?>active<?php endif; ?>" for="spec_value_<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?></label>
										</li>
										 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
									</ul>
									 <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
									 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

									<h4 class="t-remark">数量</h4>
									<div class="div-num dis-box m-top08">
										<a class="num-less" onClick="changePrice('1')"></a>
										<input class="box-flex" type="text" value="1" name="number" id="goods_number" autocomplete="off" />
										<a class="num-plus" onClick="changePrice('3')"></a>
									</div>
								</div>
							</div>
							<div class="swiper-scrollbar"></div>
						</section>
						<section class="ect-button-more dis-box padding-all">
							<a class="btn-cart box-flex" type="button" onClick="addToCart(<?php echo $this->_var['goods']['goods_id']; ?>);">加入购物车</a>
							<a class="btn-submit box-flex" type="button" onClick="addToCart_quick(<?php echo $this->_var['goods']['goods_id']; ?>);">立即购买</a>
						</section>
						</form>
					</div>
					
			</section>


		</form>

	</div>
	
	<div class="mask-filter-div"></div>
	
	<script type="text/javascript">
		function showDiv() {
			document.getElementById('popDiv').style.display = 'block';
			document.getElementById('hidDiv').style.display = 'block';
			document.getElementById('cartNum').innerHTML = document.getElementById('goods_number').value;
			document.getElementById('cartPrice').innerHTML = document.getElementById('ECS_GOODS_AMOUNT').innerHTML;
		}

		function closeDiv() {
			document.getElementById('popDiv').style.display = 'none';
			document.getElementById('hidDiv').style.display = 'none';
		}
	</script>
	<div class="tipMask" id="hidDiv" style="display:none"></div>

	

</div>



<script type="text/javascript" src="__TPL__/statics/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="__TPL__/statics/js/swiper-3.2.5.min.js"></script>
<script type="text/javascript" src="__TPL__/statics/js/ectouch.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.json.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>

</div>

<script type="text/javascript" src="__TPL__/js/lefttime.js"></script>
<script type="text/javascript">
	/*点击下拉菜单*/
	function openMune() {
	    if ($(".ect-nav").is(":visible")) {
	        $(".ect-nav").hide();
	    } else {
	        $(".ect-nav").show();
	    }
	}
	/*倒计时*/
	var goods_id = <?php echo $this->_var['goods_id']; ?>;
	var goodsattr_style = 1;
	var gmt_end_time = 0;
	var day = "天";
	var hour = "小时";
	var minute = "分钟";
	var second = "秒";
	var end = "结束";
	var goodsId = <?php echo $this->_var['goods_id']; ?>;
	var now_time = <?php echo $this->_var['now_time']; ?>;
	var use_how_oos = <?php echo C('use_how_oos');?>;
$(function() {
  changePrice(2);
  //fixpng();
  try {onload_leftTime();}
  catch (e) {}
});

	function back_goods_number() {
		var goods_number = document.getElementById('goods_number').value;
		document.getElementById('back_number').value = goods_number;
	}
	/**
	 * 点选可选属性或改变数量时修改商品价格的函数
	 */
	function changePrice(type) {
		var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
		if (type == 1) {
			qty--;
		}
		if (type == 3) {
			qty++;
		}
		if (qty <= 0) {
			qty = 1;
		}
		if (!/^[0-9]*$/.test(qty)) {
			qty = document.getElementById('back_number').value;
		}
		document.getElementById('goods_number').value = qty;
		var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
		$.get('<?php echo url("goods/price");?>', {
			'id': goodsId,
			'attr': attr,
			'number': qty
		}, function(data) {
			changePriceResponse(data);
		}, 'json');
	}
	/**
	 * 接收返回的信息
	 */
	function changePriceResponse(res) {
		if (res.err_msg.length > 0) {
			alert(res.err_msg);
		} else {
			if (document.getElementById('ECS_GOODS_AMOUNT'))
				document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
		}
	}


</script>
<script>
	$(function($) {

		var handler = function(e) { //禁止浏览器默认行为
			e.preventDefault();
		};
		/*弹出层方式*/
		$(".j-show-div").click(function() {
			document.addEventListener("touchmove", handler, false);
			$(this).find(".j-filter-show-div").addClass("show");
			$(".mask-filter-div").addClass("show");
		});
		/*关闭弹出层*/
		$(".mask-filter-div,.show-div-guanbi").click(function() {
			document.removeEventListener("touchmove", handler, false);
			$(".j-filter-show-div").removeClass("show");
			$(".mask-filter-div").removeClass("show");
			return false;
		});
		/*商品详情相册切换*/
		var swiper = new Swiper('.goods-photo', {
			paginationClickable: true,
			onInit: function(swiper) {
				document.getElementById("g-active-num").innerHTML = swiper.activeIndex + 1;
				document.getElementById("g-all-num").innerHTML = swiper.slides.length;
			},
			onSlideChangeStart: function(swiper) {
				document.getElementById("g-active-num").innerHTML = swiper.activeIndex + 1;
			}
		});
	});
</script>
</body>

</html>