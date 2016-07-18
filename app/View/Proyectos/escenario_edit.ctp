<?php
	$this->assign('title-page', 'Proyecto <small>Editar Escenario</small>');

	$bc = array(
		'items'=>array(
				0 => array('title'=>'Proyectos','url'=>'/proyectos/index'),
				1 => array('title'=>'Ver Proyecto','url'=>'/proyectos/view/'.$proyecto['Proyecto']['id']),
			),
		'config'=>array('activo'=>'Editar Escenario')
		);
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
?>


<div class="row">
	<div class="col-sm-9">
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

	<?php echo $this->element('ayuda/main',array('ruta'=>'proyectos.escenario_edit')); ?>

</div>


<?php echo $this->Html->script('/libs/jQuery-Masked-Input/jquery.maskedinput.min',array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$('.mask-telef').mask("(999)-9999999");
<?php $this->Html->scriptEnd(); ?>
