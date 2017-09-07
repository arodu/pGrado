<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">Agregar Nuevo Asunto</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>
				<?php
					echo $this->bsForm->create('Asunto', array('class'=>'ajaxForm'));
						echo $this->bsForm->input('id');
						echo $this->bsForm->hidden('Asunto.proyecto_id',array('value'=>$proyecto_id));
						echo $this->bsForm->input('Asunto.descripcion');
						echo $this->bsForm->input('Asunto.meta_id');
						echo $this->bsForm->input('Asunto.responsable_id', array('empty'=>'', 'selected'=>$userInfo['id']));
					echo '<hr/>';
						echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')).'&nbsp;';
						echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal'));
					echo $this->bsForm->end();
				?>
			<?php else: ?>
				<hr/>
					<?php echo $this->Html->scriptBlock('$("#tab-asuntos").recargar("'.$this->Html->url(array('controller'=>'asuntos','action'=>'index',$proyecto_id)).'");'); ?>
					<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxFormulario('#generalModal');
<?php $this->Html->scriptEnd(); ?>
