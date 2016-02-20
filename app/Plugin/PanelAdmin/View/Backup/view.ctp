<?php /* <pre class="pre-scrollable"><?php echo htmlentities($fileinfo);?></pre>  */?>
<textarea class="view-backup" readonly wrap="off">
<?php echo htmlentities($fileinfo);?>
</textarea>

<style type="text/css">
	textarea.view-backup{
		width: 100%;
		height: 350px;
		max-height: 350px;
		max-width: 100%;
		/*overflow:-moz-scrollbars-horizontal;*/
	}
</style>