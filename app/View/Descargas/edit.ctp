<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Descargas',
		'subtitle'=>'Editar',
		'breadcrumb'=>array(
			__('Descargas')=>array('controller'=>'descargas','action'=>'index'),
			__('Administrar')=>array('controller'=>'descargas','action'=>'admin'),
			__('Editar')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-md-12">
			<div class="escenarios form box">
				<?php echo $this->Form->create('Descarga',array('type'=>'file', 'inputDefaults'=>array('div'=>array('class'=>'form-group well well-sm'),'class'=>'form-control'))); ?>
				<div class="box-body">
				<?php
						echo $this->Form->input('Descarga.id');
						echo $this->Form->input('Descarga.nombre');
						echo $this->Form->input('Descarga.archivo', array('disabled'=>true));
						echo $this->Form->input('Descarga.descripcion');
						echo $this->Form->input('Descarga.etiqueta');
						echo $this->bsForm->input('Descarga.active', array('type'=>'checkbox', 'checked'=>'checked', 'label'=>'Activar'));
				?>
				</div>
				<div class="box-footer">
					<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> '.__('Guardar'),array('type'=>'submit','class'=>'btn btn-primary',));?>
					<?php echo $this->Form->postLink('<i class="fa fa-trash fa-fw"></i> '.__('Eliminar'), array('action' => 'delete', $this->Form->value('Descarga.id')), array('confirm' => __('¿Esta seguro que desea realizar esta acción?'), 'class'=>'btn btn-danger', 'escape'=>false)); ?>
					<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> '.__('Regresar'),array('action'=>'admin'),array('class'=>'btn btn-default','escape'=>false)); ?>
				</div>
				<div class="clearfix"></div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>

</section>
