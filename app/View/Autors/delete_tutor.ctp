<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-red">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel"><i class="fa fa-exclamation-triangle fa-fw"></i> <?php echo '¿Esta seguro que desea elimiar al '.$tipoAutor['TipoAutor']['nombre'].'?' ?></h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>

				<?php echo $this->bsForm->create('Autor', array('class'=>'ajaxForm')); ?>
					<?php echo $this->bsForm->hidden('Autor.autor_id', array('value'=>$autor_id)); ?>
          <?php echo $this->bsForm->input('Autor.user_password', array('label'=>'Por seguridad, ingrese la contraseña del usuario <em>'.$userInfo['nombre'].'</em>', 'required'=>true, 'type'=>'password')); ?>
					<hr/>
					<?php echo $this->Form->button('Aceptar', array('value'=>'Aceptar', 'type'=>'submit','class'=>'btn btn-danger btn-submit')); ?>
					<?php echo $this->Form->buttom('Cancelar', array('value'=>'Cancelar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>
        <?php echo $this->Html->scriptBlock('$("#panel-tutors").recargar("'.$this->Html->url(array('controller'=>'autors','action'=>'view_proyecto_tutors',$proyecto_id)).'");'); ?>
				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxFormulario('#generalModal');
<?php $this->Html->scriptEnd(); ?>
