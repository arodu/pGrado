<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">
        <?php if(!$success): ?>
          <?php
            if($asunto['Asunto']['cerrado']){
              echo '¿Esta seguro que desea re-abrir esta Asunto?';
            }else{
              echo '¿Esta segudo que desea cerrar este Asunto?';
            }
          ?>
        <?php endif; ?>
			</h4>
		</div>
		<div class="modal-body">
      <?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>

				<?php echo $this->bsForm->create('Asunto', array('class'=>'ajaxForm')); ?>
          <?php echo $this->bsForm->input('Asunto.id'); ?>
					<?php echo $this->Form->button('Aceptar', array('value'=>'Aceptar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cancelar', array('value'=>'Cancelar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

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
