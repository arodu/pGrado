<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" onclick="$(this).closest('.alert').slideUp(); return false;"><i class="fa fa-times fa-fw"></i></button>
  <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
  <?php echo h($message) ?>
</div>
