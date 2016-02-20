<?php
	$mensaje = ( isset($mensaje) ? $mensaje : '' );
	$titulo = ( isset($titulo) ? $titulo : '' );
?>
<div class="callout <?php echo $class;?>">
<h4><?php echo $titulo;?></h4>
<p><?php echo $mensaje;?></p>
</div>