
<div class="con">
  <div class="ect-bg">
  <header class="ect-header ect-margin-tb ect-margin-lr text-center ect-bg icon-write">
      <a href="javascript:history.go(-1)" class="pull-left ect-icon ect-icon1 ect-icon-history"></a>
      <span><?php echo $this->_var['title']; ?></span> </header>

</div>
  <section class="ect-bg-colorf ect-padding-lr flow-done">
  		<i class="glyphicon glyphicon-ok"></i>

        <p class="ect-margin-tb"><?php echo $this->_var['lang']['remember_order_number']; ?>：<b class="ect-color"><?php echo $this->_var['order']['order_sn']; ?></b></p>

        <p class="ect-margin-tb"><?php echo $this->_var['lang']['order_amount']; ?>: <b><?php echo $this->_var['total']['amount_formated']; ?></b></p>

      <?php if ($this->_var['pay_desc']): ?>
      <p class="ect-margin-tb"><?php echo $this->_var['lang']['select_payment']; ?>: <b><?php echo $this->_var['order']['pay_name']; ?></b></p>
      <p class="ect-margin-tb text-center" style="background-color: rgb(255, 240, 240);padding: 10px;"><?php echo $this->_var['pay_desc']; ?></p>
      <?php endif; ?>
       <p class="ect-margin-tb text-center"><?php echo $this->_var['pay_online']; ?></p>
       <p class="ect-margin-tb text-center"><?php echo $this->_var['order_submit_back']; ?></p>
  </section>
</div>

<script>
    window.onload = function(){
        function autoclick(){
            $('#pay').click();
        }
        setTimeout(autoclick, 100)
    }
</script>