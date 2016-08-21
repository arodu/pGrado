<section class="content-header">
	<h1>
    <?php echo $title ?>
    <?php echo (isset($subtitle) ? '<small>'.$subtitle.'</small>' : '') ?>
  </h1>
  <?php if(isset($breadcrumb)) echo $this->Custom->breadcrumb($breadcrumb) ?>
</section>
