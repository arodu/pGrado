<div class="div-alert">
	<div class="alert <?php echo $class;?> alert-dismissable">
		<button type="button" class="close" onclick="$(this).closest('.div-alert').slideUp(); return false;">×</button>
		<i class="fa <?php echo $icon;?> fa-fw fa-2x pull-left"></i>
		<p class="" style="margin-left: 48px;"><?php echo $message; ?></p>
		<span class="clearfix"></span>
	</div>
</div>