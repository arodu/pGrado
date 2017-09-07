<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Editar Comentario</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>
				<?php
					echo $this->bsForm->create('Comentario', array('class'=>'ajaxForm'));
							echo $this->bsForm->input('Comentario.id');
							echo $this->bsForm->input('Comentario.texto', array('type'=>'textarea', 'label'=>false));
					echo '<hr/>';
						echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')).'&nbsp;';
						echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal'));
					echo $this->bsForm->end();
				?>
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
