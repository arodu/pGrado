<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" onclick="$(this).closest('.alert').slideUp(); return false;"><i class="fa fa-times fa-fw"></i></button>
  <h4><i class="icon fa fa-info-circle"></i> Información!</h4>
  <?php echo h($message) ?>
</div>
