<section class="content-header">
	<h1>
		General UI
		<small>Preview of UI elements</small>
	</h1>
	
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Blank page</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
</section><!-- /.content -->