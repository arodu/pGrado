<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" onclick="$(this).closest('.alert').slideUp(); return false;"><i class="fa fa-times fa-fw"></i></button>
  <h4><i class="icon fa fa-ban"></i> Error!</h4>
  <?php echo h($message) ?>
</div>
