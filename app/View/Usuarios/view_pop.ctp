<div class="media" style="font-size: .8em;">
	<div class="media-left">
		<a href="#">
			<?php $foto_user = $this->element('usuario/avatarXS',array('foto'=>$usuario['Usuario']['foto'])); ?>
			<?php echo $this->Html->image($foto_user,array('class'=>'img-circle media-object')); ?>
		</a>
	</div>
	<div class="media-body">
		<h4 class="media-heading"><?php echo $usuario['Usuario']['nombre_completo']; ?></h4>
		<?php echo $usuario['TipoUsuario']['nombre'].' - '.$usuario['Sede']['nombre']; ?><br/>
		<?php echo $usuario['Usuario']['email']; ?><br/>
	</div>
</div>