<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">
        <?php if(!$success): ?>
          <?php
            if($meta['Meta']['cerrado']){
              echo '¿Esta seguro que desea re-abrir esta meta?';
            }else{
              echo '¿Esta segudo que desea cerrar esta meta?';
            }
          ?>
        <?php endif; ?>
			</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Session->flash(); ?>

			<?php if(!$success): ?>

				<?php echo $this->bsForm->create('Meta', array('class'=>'ajaxForm')); ?>
          <?php echo $this->bsForm->input('Meta.id'); ?>
					<?php echo $this->Form->button('Aceptar', array('value'=>'Aceptar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cancelar', array('value'=>'Cancelar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>
				<script type="text/javascript">
					cargarMetas();
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
