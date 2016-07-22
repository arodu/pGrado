<div class="alert alert-dismissible <?php echo $class ?>">
  <button type="button" class="close" onclick="$(this).closest('.alert').slideUp(); return false;"><i class="fa fa-times fa-fw"></i></button>
  <h4><?php echo $title ?></h4>
  <?php echo $message ?>
</div>
