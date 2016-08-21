<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel"><?php echo 'Agregar '.$tipoAutor['TipoAutor']['nombre'] ?></h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>

        <?php echo $this->bsForm->create('Autor', array('class'=>'ajaxForm')); ?>
          <?php echo $this->bsForm->input('proyecto_id',array('type'=>'hidden','value'=>$proyecto_id)); ?>
          <?php echo $this->bsForm->input('tipo_autor_id',array('type'=>'hidden','value'=>$tipoAutor['TipoAutor']['id'])); ?>
          <?php echo $this->bsForm->input('usuario_id',array('label'=>$tipoAutor['TipoAutor']['nombre'], 'empty'=>'','required'=>true)); ?>
          <hr/>
          <?php echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
          <?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
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
