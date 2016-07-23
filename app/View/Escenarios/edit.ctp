<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel">Escenario del Proyecto</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>
        <?php echo $this->bsForm->create('Escenario', array('class'=>'ajaxForm')); ?>
					<?php
						echo '<fieldset>';
							echo '<legend>Empresa, Institución u Organización</legend>';
							echo $this->bsForm->input('id');
							echo $this->bsForm->input('nombre',array('label'=>'Nombre'));
							echo $this->bsForm->input('direccion',array('label'=>'Dirección'));
							echo $this->bsForm->input('carta_aceptacion',array('type'=>'checkbox','div'=>array('class'=>'checkbox'),'label'=>'Carta de Aceptación'));
							echo $this->bsForm->input('carta_implementacion',array('type'=>'checkbox','div'=>array('class'=>'checkbox'),'label'=>'Carta de Implementación'));
						echo '</fieldset>';

						echo '<fieldset>';
							echo '<legend>Persona de Contacto</legend>';
							echo $this->bsForm->input('cedula',array('label'=>'Cedula'));
							echo $this->bsForm->input('persona',array('label'=>'Nombre y Apellido'));
							echo $this->bsForm->input('telefono',array('label'=>'Telefono','class'=>'form-control mask-telef'));
						echo '</fieldset>';
					?>

          <hr/>
          <?php echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')); ?>
          <?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
        <?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>
				<?php echo $this->Html->scriptBlock('$("#panel-escenario").recargar("'.$this->Html->url(array('controller'=>'escenarios','action'=>'view',$proyecto_id)).'");'); ?>
				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$('.ajaxForm').ajaxFormulario('#generalModal');
	$('.mask-telef').mask("(0999)-9999999");
<?php $this->Html->scriptEnd(); ?>



<?php /*
<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>


	<div class="row">
		<div class="col-sm-12">
			<div class="escenarios form box">
				<?php // ----------------- BOX HEADER ------------------- ?>
					<div class="box-header text-justify">
						<h3 class="box-title">
							<?php echo strip_tags($proyecto['Revision'][0]['titulo']); ?>
						</h3>
					</div>


			<?php echo $this->Form->create('Escenario',array('inputDefaults'=>array('div'=>array('class'=>'form-group well well-sm'),'class'=>'form-control'))); ?>
				<div class="box-body">
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('nombre',array('label'=>'Nombre de la empresa, institución u organización'));
					echo $this->Form->input('direccion',array('label'=>'Dirección'));
					echo $this->Form->input('cedula',array('label'=>'Cedula de la Persona de Contacto'));
					echo $this->Form->input('persona',array('label'=>'Nombre y Apellido de la Persona de Contacto'));
					echo $this->Form->input('telefono',array('label'=>'Telefono de Contacto','class'=>'form-control mask-telef'));

					echo '<div class="well well-sm">';
						echo $this->bsForm->input('carta_aceptacion',array('type'=>'checkbox','div'=>array('class'=>'checkbox'),'label'=>'Carta de Aceptación'));
						echo $this->bsForm->input('carta_implementacion',array('type'=>'checkbox','div'=>array('class'=>'checkbox'),'label'=>'Carta de Implementación'));
					echo '</div>';
				?>
				</div>
				<div class="box-footer">
					<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar Escenario',array('type'=>'submit','class'=>'btn btn-primary',));?>

					<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> Regresar al Proyecto',array('controller'=>'proyectos', 'action'=>'view',$proyecto['Proyecto']['id']),array('class'=>'btn btn-default','escape'=>false)); ?>

				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>

		<?php // echo $this->element('ayuda/main',array('ruta'=>'proyectos.escenario_edit')); ?>

	</div>
</section><!-- /.content -->




*/
