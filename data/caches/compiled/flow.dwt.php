
<?php if ($this->_var['step'] == "cart"): ?>
<?php echo $this->fetch('flow_cart.dwt'); ?>
<?php endif; ?>


<?php if ($this->_var['step'] == "checkout"): ?>
<?php echo $this->fetch('flow_checkout.dwt'); ?>
<?php endif; ?>

<?php if ($this->_var['step'] == "done"): ?>
<?php echo $this->fetch('flow_done.dwt'); ?>
<?php endif; ?>

