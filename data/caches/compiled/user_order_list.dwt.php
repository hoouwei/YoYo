<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta name="Generator" content="ECTouch 2.2.30" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo $this->_var['page_title']; ?></title>
	<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $this->_var['ecs_css_path']; ?>">
	<link rel="stylesheet" href="__TPL__/css/user.css">
	<link rel="stylesheet" href="__TPL__/css/photoswipe.css">
</head>

<body>
<div class="con">
	<div class="ect-bg">
		<header class="ect-header ect-margin-tb ect-margin-lr text-center ect-bg icon-write"> <a href="<?php if ($this->_var['title'] != '消息中心'): ?> javascript:history.go(-1) <?php else: ?><?php echo url('user/index');?><?php endif; ?>" class="pull-left ect-icon ect-icon1 ect-icon-history"></a> <span><?php echo $this->_var['title']; ?></span> <a href="javascript:;" onClick="openMune()" class="pull-right ect-icon ect-icon1 ect-icon-mune"></a></header>
		<nav class="ect-nav ect-nav-list" style="display:none;">
			<ul class="ect-diaplay-box text-center">
				<li class="ect-box-flex"><a href="<?php echo url('index/index');?>"><i class="ect-icon ect-icon-home"></i><?php echo $this->_var['lang']['home']; ?></a></li>
				<li class="ect-box-flex"><a href="<?php echo url('category/top_all');?>"><i class="ect-icon ect-icon-cate"></i><?php echo $this->_var['lang']['category']; ?></a></li>
				<li class="ect-box-flex"><a href="javascript:openSearch();"><i class="ect-icon ect-icon-search"></i><?php echo $this->_var['lang']['search']; ?></a></li>
				<li class="ect-box-flex"><a href="<?php echo url('flow/cart');?>"><i class="ect-icon ect-icon-flow"></i><?php echo $this->_var['lang']['shopping_cart']; ?></a></li>
				<li class="ect-box-flex"><a href="<?php echo url('user/index');?>"><i class="ect-icon ect-icon-user"></i><?php echo $this->_var['lang']['user_center']; ?></a></li>
			</ul>
		</nav>
	</div>

    <?php if ($this->_var['show_asynclist']): ?>
<div class="ect-pro-list user-order" style="border-bottom:none;">
    <ul id="J_ItemList">
       <li class="single_item"></li>
       <a href="javascript:;" style="text-align:center" class="get_more"></a>
    </ul>
</div>
<?php else: ?>
	<div class="ect-pro-list user-order" style="border-bottom:none;">
		<ul id="J_ItemList">
		 <?php $_from = $this->_var['orders_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'orders');$this->_foreach['orders_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['orders_list']['total'] > 0):
    foreach ($_from AS $this->_var['orders']):
        $this->_foreach['orders_list']['iteration']++;
?>
			<li>
			<a href="<?php echo url('user/order_detail', array('order_id'=>$this->_var['orders']['order_id']));?>"><img src="<?php echo $this->_var['orders']['img']; ?>" class="pull-left" />
			<dl>
			  <dt>
				<h4 class="title"><?php echo $this->_var['lang']['order_number']; ?>：<?php echo $this->_var['orders']['order_sn']; ?></h4>
			  </dt>
			  <dd><?php echo $this->_var['lang']['order_status']; ?>：<?php echo $this->_var['orders']['order_status']; ?></dd>
			  <dd><?php echo $this->_var['lang']['order_total_fee']; ?>：<span class="ect-color"><?php echo $this->_var['orders']['total_fee']; ?></span></dd>
			  <dd><?php echo $this->_var['lang']['order_addtime']; ?>：<?php echo $this->_var['orders']['order_time']; ?></dd>
			</dl>
			<i class="pull-right fa fa-angle-right"></i> </a> 
			</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>

 <?php echo $this->fetch('library/page.lbi'); ?>
<?php endif; ?>
</div>

<script type="text/javascript">
<?php $_from = $this->_var['lang']['merge_order_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
if(<?php echo $this->_var['show_asynclist']; ?>){
get_asynclist('index.php?m=default&c=user&a=async_order_list&pay=<?php echo $this->_var['pay']; ?>' , '__TPL__/images/loader.gif');
}
</script>
</body></html>