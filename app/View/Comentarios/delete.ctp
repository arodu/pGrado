<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">¿Esta seguro que desea eliminar esta Comentario?</h4>
		</div>
		<div class="modal-body">
      <?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>

				<?php echo $this->bsForm->create('Comentario', array('class'=>'ajaxForm')); ?>
          <?php echo $this->bsForm->input('Comentario.id'); ?>
					<?php echo $this->Form->button('Aceptar', array('value'=>'Aceptar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cancelar', array('value'=>'Cancelar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>

				<?php echo $this->Html->scriptBlock('$("#tab-coment").recargar("'.$this->Html->url(array('controller'=>'comentarios','action'=>'index',$proyecto_id)).'");'); ?>

				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxFormulario('#generalModal');
<?php $this->Html->scriptEnd(); ?>
