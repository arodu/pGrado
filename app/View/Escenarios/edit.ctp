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
							echo $this->bsForm->input('Escenario.id');
							echo $this->bsForm->input('Escenario.nombre',array('label'=>'Nombre'));
							echo $this->bsForm->input('Escenario.direccion',array('label'=>'Dirección'));
					?>
							<div class="form-group bs-switch bs-switch-escenario">
								<label for="EscenarioCartaAceptacion">Carta de Aceptación</label>
								<?php echo $this->Form->checkbox('Escenario.carta_aceptacion', array('id'=>'EscenarioCartaAceptacion')); ?>
							</div>
							<div class="form-group bs-switch bs-switch-escenario">
								<label for="EscenarioCartaImplementacion">Carta de Implpementación</label>
								<?php echo $this->Form->checkbox('Escenario.carta_implementacion', array('id'=>'EscenarioCartaImplementacion')); ?>
							</div>

					<?php
							//echo $this->bsForm->input('carta_aceptacion',array('type'=>'checkbox','div'=>array('class'=>'checkbox'),'label'=>'Carta de Aceptación'));
							//echo $this->bsForm->input('carta_implementacion',array('type'=>'checkbox','div'=>array('class'=>'checkbox'),'label'=>'Carta de Implementación'));
						echo '</fieldset>';

						echo '<fieldset>';
							echo '<legend>Persona de Contacto</legend>';
							echo $this->bsForm->input('Escenario.cedula',array('label'=>'Cedula'));
							echo $this->bsForm->input('Escenario.persona',array('label'=>'Nombre y Apellido'));
							echo $this->bsForm->input('Escenario.telefono',array('label'=>'Telefono','class'=>'form-control mask-telef'));
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
	$('.bs-switch input[type=checkbox]').bootstrapSwitch({
		onText: "Si",
		offText: "No",
	});
<?php $this->Html->scriptEnd(); ?>
