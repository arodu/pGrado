<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">Agregar Nueva Meta</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>
				<?php echo $this->bsForm->create('Meta', array('class'=>'ajaxForm')); ?>
					<?php echo $this->bsForm->hidden('Meta.proyecto_id',array('value'=>$proyecto_id)); ?>
					<div class="row">
						<div class="col-md-8">
							<?php echo $this->bsForm->input('Meta.titulo'); ?>
							<?php echo $this->bsForm->input('Meta.parent_id',array('options'=>$metas, 'label'=>'Meta Padre', 'empty'=>'')); ?>
							<?php echo $this->bsForm->input('Meta.descripcion'); ?>
						</div>
						<div class="col-md-4">
							<label>Fecha de Culminación</label>
							<div id="fechaCulminacion" data-input="#culminacionImput"></div>
							<?php echo $this->bsForm->input('Meta.culminacion', array('type'=>'hidden', 'id'=>'culminacionImput')); ?>
						</div>
					</div>
					<hr/>
					<?php echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
					<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
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

<?php $this->Html->css('/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min', array('inline'=>false)); ?>
<?php $this->Html->script('/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min', array('inline'=>false)); ?>
<?php $this->Html->script('/libs/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min', array('inline'=>false)); ?>

<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxForm({
		target: '#generalModal',
	});

	var fecha = $('#fechaCulminacion').datepicker({
		format: "yyyy-mm-dd",
		maxViewMode: 2,
		clearBtn: true,
		language: "es",
		orientation: "auto left",
		todayHighlight: true
	});

	fecha.on('changeDate', function(e){
		var date = fecha.datepicker('getDate');
		var input = $( fecha.data('input') );
		if( date == null){
			input.val('');
		}else{
			input.val(date.getFullYear()+"-"+ (date.getMonth()+1) +"-"+date.getDate());
		}
  });

<?php $this->Html->scriptEnd(); ?>
