<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">Agregar Nuevo Asunto</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Session->flash(); ?>

			<?php if(!$success): ?>
				<?php echo $this->bsForm->create('Asunto', array('class'=>'ajaxForm')); ?>
					<?php echo $this->bsForm->hidden('Asunto.proyecto_id',array('value'=>$proyecto_id)); ?>
					<?php
						echo $this->bsForm->input('descripcion');
						echo $this->bsForm->input('meta_id', array('empty'=>''));
						echo $this->bsForm->input('responsable_id', array('empty'=>'', 'selected'=>$userInfo['id']));
					?>
					<hr/>
					<?php echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>
				<script type="text/javascript">
					cargarAsuntos();
				</script>
				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxForm({
		target: '#generalModal',
	});
<?php $this->Html->scriptEnd(); ?>
