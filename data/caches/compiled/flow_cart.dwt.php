<!DOCTYPE html>
<head>
<meta name="Generator" content="ECTouch 2.2.30" />
  <meta charset="utf-8" />
  <title><?php echo $this->_var['page_title']; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <?php if ($this->_var['goods_list']): ?>

        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['goods']):
?>
        <div class="row c-cart-table-row">
          <div class="col-md-2 col-sm-3 col-xs-5 c-cart-image">
            <img src="<?php echo $this->_var['goods']['original_img']; ?>" /> </div>
          <div class="col-md-4 col-sm-9 col-xs-7 c-cart-desc">
            <h3>
              <a href="shop-product-details-2.html" class="c-font-bold c-theme-link c-font-22 c-font-dark">蒸饺套餐</a>
            </h3>
            <p style="font-size: 0.8em">单价:1元</p>
            <div class="input-group pull-left wrap"> <span class="input-group-addon" onClick="change_goods_number('1',<?php echo $this->_var['goods']['rec_id']; ?>)" >-</span>
              <input type="hidden" id="back_number<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" />
              <input type="text" class="form-num form-contro"  name="<?php echo $this->_var['goods']['rec_id']; ?>" id="goods_number<?php echo $this->_var['goods']['rec_id']; ?>" autocomplete="off" value="<?php echo $this->_var['goods']['goods_number']; ?>" onFocus="back_goods_number(<?php echo $this->_var['goods']['rec_id']; ?>)"  onblur="change_goods_number('2',<?php echo $this->_var['goods']['rec_id']; ?>)" />
              <span class="input-group-addon" onClick="change_goods_number('3',<?php echo $this->_var['goods']['rec_id']; ?>)">+</span>
            </div>
          </div>
          <div class="c-cart-remove" >
            <a href="#" style="margin-top: 10px;" class="c-cart-remove-mobile btn c-btn c-btn-md c-btn-square c-btn-red c-btn-border-1x">&nbsp&nbsp&nbsp&nbsp&nbsp删除&nbsp&nbsp&nbsp&nbsp&nbsp</a>
          </div>
        </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        <div class="row">
          <div class="c-cart-subtotal-row c-margin-t-20">
            <h3 class="c-font-uppercase c-right c-font-16 c-font-grey-2" style="margin-right: 20px">共<b id="total_number"><?php echo $this->_var['total']['total_number']; ?></b>件商品，总价<b id="goods_subtotal"><?php echo $this->_var['total']['goods_price']; ?></b></h3>
          </div>
        </div>
        <div class="c-cart-buttons">
          <a href="#" class="btn c-btn btn-lg c-theme-btn c-btn-square c-font-white  c-cart-float-r">立即支付</a>
          <a href="index.php?m=default&c=category&a=index&id=<?php echo $this->_var['brand']; ?>&brand=1" class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white  c-cart-float-l">返回</a>
        </div>

        <?php else: ?>
        <div class="c-content-box c-size-lg">
          <div class="container">
            <div class="c-shop-cart-page-1 c-center">
              <i class="fa fa-frown-o c-font-dark c-font-50 c-font-thin "></i>
              <h2 class="c-font-thin c-center">购物车没有商品</h2>
            </div>
          </div>
        </div>
        <div class="c-cart-buttons">
          <a href="index.php?m=default&c=category&a=index&id=<?php echo $this->_var['brand']; ?>&brand=1" class="btn c-btn btn-lg c-btn-red c-btn-square c-font-white  c-cart-float-l">返回</a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>


</body>

</html>