<?php
	$this->assign('title-page', 'Descargas <small>Agregar</small>');

	$bc = array(
		'items'=>array(
				0 => array('title'=>'Descargas','url'=>'/descargas/index'),
				1 => array('title'=>'Administrar','url'=>'/descargas/admin'),
			),
		'config'=>array('activo'=>'Editar')
		);
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
?>



<div class="row">
	<div class="col-sm-12">
		<div class="escenarios form box">
			<?php echo $this->Form->create('Descarga',array('type'=>'file', 'inputDefaults'=>array('div'=>array('class'=>'form-group well well-sm'),'class'=>'form-control'))); ?>
			<div class="box-body col-md-8 col-md-offset-2">
			<?php
					echo $this->Form->input('Descarga.id');
					echo $this->Form->input('Descarga.nombre');
					echo $this->Form->input('Descarga.archivo', array('disabled'=>true));
					echo $this->Form->input('Descarga.descripcion');
					echo $this->Form->input('Descarga.etiqueta');
					echo $this->bsForm->input('Descarga.active', array('type'=>'checkbox', 'checked'=>'checked', 'label'=>'Activar'));
			?>
			</div>
			<div class="box-footer col-md-8 col-md-offset-2">
				<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> '.__('Guardar'),array('type'=>'submit','class'=>'btn btn-primary',));?>
				<?php echo $this->Form->postLink('<i class="fa fa-trash fa-fw"></i> '.__('Eliminar'), array('action' => 'delete', $this->Form->value('Descarga.id')), array('confirm' => __('¿Esta seguro que desea realizar esta acción?'), 'class'=>'btn btn-danger', 'escape'=>false)); ?>
				<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> '.__('Regresar'),array('action'=>'admin'),array('class'=>'btn btn-default','escape'=>false)); ?>
			</div>
			<div class="clearfix"></div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

</div>


<!--

<div class="descargas form">
<?php echo $this->Form->create('Descarga'); ?>
	<fieldset>
		<legend><?php echo __('Edit Descarga'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('etiqueta');
		echo $this->Form->input('ruta');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Descarga.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Descarga.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Descargas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>

 -->
