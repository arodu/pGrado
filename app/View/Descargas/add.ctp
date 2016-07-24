<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Descargas',
		'subtitle'=>'Agregar',
		'breadcrumb'=>array(
			__('Descargas')=>array('controller'=>'descargas','action'=>'index'),
			__('Administrar')=>array('controller'=>'descargas','action'=>'admin'),
			__('Agregar')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-sm-10">
			<div class="escenarios form box">
			<?php echo $this->Form->create('Descarga',array('type'=>'file', 'inputDefaults'=>array('div'=>array('class'=>'form-group well well-sm'),'class'=>'form-control'))); ?>
				<div class="box-body">
				<?php
						echo $this->Form->input('Descarga.nombre');
						echo $this->Form->input('Descarga.archivo', array('type'=>'file'));
						echo $this->Form->input('Descarga.descripcion');
						echo $this->Form->input('Descarga.etiqueta');
						echo $this->bsForm->input('Descarga.active', array('type'=>'checkbox', 'checked'=>'checked', 'label'=>'Activar'));
				?>
				</div>
				<div class="box-footer col-md-8 col-md-offset-2">
					<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar',array('type'=>'submit','class'=>'btn btn-primary',));?>
					<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> Regresar',array('action'=>'admin'),array('class'=>'btn btn-default','escape'=>false)); ?>
				</div>
				<div class="clearfix"></div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>

	</div>

</section>
