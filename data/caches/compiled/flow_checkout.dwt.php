<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta name="Generator" content="ECTouch 2.2.30" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php if ($this->_var['auto_redirect']): ?>
      <meta http-equiv="refresh" content="3;URL=<?php echo $this->_var['message']['back_url']; ?>" />
    <?php endif; ?>
  <title><?php echo $this->_var['page_title']; ?></title>
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
    <header class="ect-header ect-margin-tb ect-margin-lr text-center ect-bg icon-write"> <a href="javascript:history.go(-1)" class="pull-left ect-icon ect-icon1 ect-icon-history"></a> <span><?php echo $this->_var['title']; ?></span> </header>
  </div>
  <div class="flow-checkout">
    <form action="<?php echo url('flow/done');?>" method="post" name="theForm" id="theForm" onSubmit="return checkOrderForm(this)">
      <section class="ect-margin-tb ect-padding-lr checkout-select" id="accordion">
        <div  id="collapseTwo" class="panel-collapse collapse in">
          //支付方式暂时默认为支付宝，如果默认微信支付，将id改为1，并且hidden############
          <ul class="ect-radio">
            <li>
              <input name="payment" type="radio" id="payment_2" value="2"
                     checked style="vertical-align:middle">
              <label for="payment_2">支付宝<i></i></label>
            </li>
          </ul>
        </div>

      </section>

      <section class="ect-margin-tb ect-margin-bottom0 ect-padding-lr checkout-select checkout-pro-list">
        <ul>
          <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <li>
            <dl>
              <dt class="pull-left"> 
                <a href="<?php echo url('goods/index',array('id'=>$this->_var['goods']['goods_id']));?>" target="_blank" ><?php echo $this->_var['goods']['goods_name']; ?></a>
              </dt>

              <dd class="pull-left list-num">x <?php echo $this->_var['goods']['goods_number']; ?></dd>
              <dd class="pull-right"><?php echo $this->_var['goods']['formated_subtotal']; ?></dd>
            </dl>
          </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>

        <div class="ect-padding-tb text-right" id="ECS_ORDERTOTAL">
           商品总价
          <b class="ect-colory"><?php echo $this->_var['total']['goods_price_formated']; ?></b>
          <br />
        </div>


      </section>
      <div class="ect-padding-lr ect-padding-tb ect-margin-tb">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <input id="pay" type="submit" name="submit" value="" class=""/>
        <input type="hidden" name="step" value="done" />
      </div>
    </form>
  </div>
</div>
<script>
    window.onload = function(){
        function autoclick(){
            $('#pay1').click();
        }
        setTimeout(autoclick, 0)
    }
</script>




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