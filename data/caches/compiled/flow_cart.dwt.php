<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta name="Generator" content="ECTouch 2.2.30" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php if ($this->_var['auto_redirect']): ?>
      <meta http-equiv="refresh" content="3;URL=<?php echo $this->_var['message']['back_url']; ?>" />
    <?php endif; ?>
  <title><?php echo $this->_var['page_title']; ?><?php echo $this->_var['brand']; ?></title>
  <link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="__PUBLIC__/bootstrap/css/font-awesome.min.css">
  <link rel="stylesheet" href="__PUBLIC__/swiper/css/swiper.min.css"/>
  <link rel="stylesheet" href="__TPL__/css/photoswipe.css">
  <link rel="stylesheet" href="__TPL__/css/style.css">
  <script type="text/javascript" src="__TPL__/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="__TPL__/js/ectouch.js"></script>
</head>
<body>
<div class="con">
  <div class="ect-bg">
    <header class="ect-header ect-margin-tb ect-margin-lr text-center ect-bg icon-write"> <a href="javascript:history.go(-1)" class="pull-left ect-icon ect-icon1 ect-icon-history"></a> <span><?php echo $this->_var['title']; ?></span> <a href="javascript:;" onClick="openMune()" class="pull-right ect-icon ect-icon1 ect-icon-mune icon-write"></a></header>
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
  <?php if ($this->_var['goods_list']): ?>
  <p class="flow-price ect-padding-lr ect-padding-tb"> <?php echo $this->_var['lang']['total']; ?><b id="total_number"><?php echo $this->_var['total']['total_number']; ?></b><?php echo $this->_var['lang']['total_number']; ?>，<?php echo $this->_var['lang']['goods_price']; ?>：<b class="ect-colory" id="goods_subtotal"><?php echo $this->_var['total']['goods_price']; ?></b> </p>
  <section class="ect-pro-list flow-pic ect-border-bottom0">
    <ul>
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['goods']):
?>
      <li>
        <div class="ect-clear-over"> <a href="<?php echo url('goods/index',array('id'=>$this->_var['goods']['goods_id']));?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"></a>
          <dl>
            <dt>
              <h4 class="title"><a href="<?php echo url('goods/index',array('id'=>$this->_var['goods']['goods_id']));?>"><?php echo $this->_var['goods']['goods_name']; ?> 
                <?php if ($this->_var['goods']['parent_id'] > 0): ?> 
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span> 
                <?php endif; ?> 
                <?php if ($this->_var['goods']['is_gift'] > 0): ?> 
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span> 
                <?php endif; ?> 
                </a></h4>
            </dt>
            <dd class="ect-color999"> 
              <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <p><?php echo nl2br($this->_var['goods']['goods_attr']); ?></p>
              <?php endif; ?>
              <p><strong class="ect-colory"><?php echo $this->_var['goods']['goods_price']; ?></strong></p>
            </dd>
          </dl>
        </div>
        <div class="ect-margin-tb ect-margin-bottom0 ect-clear-over flow-num-del"> 
        <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
          <div class="input-group pull-left wrap"> <span class="input-group-addon" onClick="change_goods_number('1',<?php echo $this->_var['goods']['rec_id']; ?>)" >-</span>
            <input type="hidden" id="back_number<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" />
            <input type="text" class="form-num form-contro"  name="<?php echo $this->_var['goods']['rec_id']; ?>" id="goods_number<?php echo $this->_var['goods']['rec_id']; ?>" autocomplete="off" value="<?php echo $this->_var['goods']['goods_number']; ?>" onFocus="back_goods_number(<?php echo $this->_var['goods']['rec_id']; ?>)"  onblur="change_goods_number('2',<?php echo $this->_var['goods']['rec_id']; ?>)" />
            <span class="input-group-addon" onClick="change_goods_number('3',<?php echo $this->_var['goods']['rec_id']; ?>)">+</span> </div>
         
         <?php else: ?>
          	<input type="text" class="txtnum" readonly value="<?php echo $this->_var['goods']['goods_number']; ?>"/>
          <?php endif; ?> 
           <div class="pull-right flow-del text-center"> <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='<?php echo url('flow/drop_goods',array('id'=>$this->_var['goods']['rec_id']));?>';" style="padding: 2px 5px;"><?php echo $this->_var['lang']['drop']; ?></a> </div>
        </div>
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <?php if ($this->_var['favourable_list']): ?>
    <p class="bg-warning text-center ect-padding-tb" onClick="location.href='<?php echo url('flow/label_favourable');?>'"><?php echo $this->_var['lang']['show_favourable']; ?></p>
    <?php endif; ?>
  </section>
  <?php if ($this->_var['fittings_list']): ?>
     <div class="two-btn flow-jiesuan ect-padding-tb ect-padding-lr text-center">
   		<a class="btn btn-info" type="button" href="<?php echo url('flow/goods_fittings');?>"><?php echo $this->_var['lang']['goods_fittings']; ?></a>
        <a class="btn btn-info ect-bg-colory" type="button"  href="<?php echo url('flow/checkout');?>"><?php echo $this->_var['lang']['check_out']; ?></a>
	</div>
  <?php else: ?>
  	<div class="flow-jiesuan ect-padding-lr ect-padding-tb">
  	<a href="<?php echo url('flow/checkout');?>" type="button" class="btn btn-info ect-btn-info ect-bg"><?php echo $this->_var['lang']['check_out']; ?></a>
  </div>
  <?php endif; ?>
  <?php if ($this->_var['linked_goods']): ?>
  <section class="ect-pro-list flow-rel-pro flow-pic">
    <h4 class="ect-margin-lr ect-margin-tb"><strong><?php echo $this->_var['lang']['releate_goods']; ?>：</strong></h4>
    <ul>
      <?php $_from = $this->_var['linked_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['releated_goods_data']):
?>
      <li>
        <div class="ect-clear-over"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>"><img src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" alt="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" /></a>
          <dl>
            <dt>
              <h4 class="title"><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>"><?php echo $this->_var['releated_goods_data']['short_name']; ?></a></h4>
            </dt>
            <dd class="ect-color999">
              <p> 
                <?php if ($this->_var['releated_goods_data']['promote_price'] != 0): ?> 
                <?php echo $this->_var['lang']['promote_price']; ?><strong class="ect-colory"><?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?></strong> 
                <?php else: ?> 
                <?php echo $this->_var['lang']['shop_price']; ?><strong class="ect-colory"><?php echo $this->_var['releated_goods_data']['shop_price']; ?></strong> 
                <?php endif; ?> 
              </p>
            </dd>
          </dl>
        </div>
      </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
  </section>
  <?php endif; ?> 
  <?php else: ?>
  <div class="flow-no-pro"> <img src="__TPL__/images/gwc.png">
    <p class="text-center"><?php echo $this->_var['lang']['empty_shopping']; ?></p>
    <a type="button" href="<?php echo url('category/top_all');?>" class="btn btn-info ect-btn-info ect-bg"><?php echo $this->_var['lang']['go_shopping']; ?></a> </div>
  <?php endif; ?> 
</div>




<a id="scrollUp" href="#top" style="position: fixed; z-index: 10;"><i class="fa fa-angle-up"></i></a>
<style>
  #scrollUp {
    border-radius:100%;
    background-color: #777;
    color: #eee;
    font-size: 40px;
    line-height: 1;text-align: center;text-decoration: none;bottom: 1.5em;right: 10px;overflow: hidden;width: 46px;
    height: 46px;
    border: none;
    opacity: 0.6;
  }
</style>
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js" ></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.json.js" ></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.more.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/utils.js" ></script>
<script src="__PUBLIC__/swiper/js/jquery.swiper.min.js"></script>
<script src="__TPL__/js/ectouch.js"></script>
<script src="__TPL__/js/simple-inheritance.min.js"></script>
<script src="__TPL__/js/code-photoswipe-1.0.11.min.js"></script>
<script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
<script src="__TPL__/js/jquery.scrollUp.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/validform.js" ></script>
<script language="javascript">
    /*banner滚动图片*/
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 1,
        loop: true,
        autoplay : 2000
    });
    /*弹出评论层并隐藏其他层*/
    function openSearch(){
        if($(".con").is(":visible")){
            $(".con").hide();
            $(".search").show();
        }
    }
    function closeSearch(){
        if($(".con").is(":hidden")){
            $(".con").show();
            $(".search").hide();
        }
    }
</script>

<script type="text/javascript" src="__PUBLIC__/js/shopping_flow.js"></script>
<script>
    function back_goods_number(id){
        var goods_number = document.getElementById('goods_number'+id).value;
        document.getElementById('back_number'+id).value = goods_number;
    }
    function change_goods_number(type, id)
    {
        var goods_number = document.getElementById('goods_number'+id).value;
        if(type != 2){back_goods_number(id)}
        if(type == 1){goods_number--;}
        if(type == 3){goods_number++;}
        if(goods_number <=0 ){goods_number=1;}
        if(!/^[0-9]*$/.test(goods_number)){goods_number = document.getElementById('back_number'+id).value;}
        document.getElementById('goods_number'+id).value = goods_number;
        $.post('<?php echo url("flow/ajax_update_cart");?>', {
            rec_id : id,goods_number : goods_number
        }, function(data) {
            change_goods_number_response(data,id);
        }, 'json');
    }
    // 处理返回信息并显示
    function change_goods_number_response(result,id)
    {
        if (result.error == 0){
            var rec_id = result.rec_id;
            $("#goods_number_"+rec_id).val(result.goods_number);
            document.getElementById('total_number').innerHTML = result.total_number;//更新数量
            document.getElementById('goods_subtotal').innerHTML = result.total_desc;//更新小计
            if (document.getElementById('ECS_CARTINFO')){
                //更新购物车数量
                document.getElementById('ECS_CARTINFO').innerHTML = result.cart_info;
            }
        }else if (result.message != ''){
            alert(result.message);
            var goods_number = document.getElementById('back_number'+id).value;
            document.getElementById('goods_number'+id).value = goods_number;
        }
    }

    /*点击下拉手风琴效果*/
    $('.collapse').collapse()
    $(".checkout-select a").click(function(){
        if(!$(this).hasClass("select")){
            $(this).addClass("select");
        }else{
            $(this).removeClass("select");
        }
    });

</script>


</body>
</html>