<div class="media" style="font-size: .8em;">
	<div class="media-left">
		<a href="#">
			<?php echo $this->Custom->userFoto( $usuario['Usuario']['avatar'], 'xs', array('class'=>'img-circle media-object') ); ?>
		</a>
	</div>
	<div class="media-body">
		<strong><?php echo $usuario['Usuario']['nombre_completo']; ?></strong><br/>
		<?php echo $usuario['TipoUsuario']['nombre'].' - '.$usuario['Sede']['nombre']; ?><br/>
		<?php echo $usuario['Usuario']['email']; ?><br/>
	</div>
</div>
