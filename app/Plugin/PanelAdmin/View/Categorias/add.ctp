<div class="categorias form">
<?php echo $this->Form->create('Categoria', array('inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control'))); ?>
	<fieldset>
		<legend><?php echo __('Add Categoria'); ?></legend>
	<?php
		echo $this->Form->input('programa_id');
		echo $this->Form->input('parent_id',array('label'=>'Categoría Padre','options'=>$categorias_list,'empty'=>'--Selecione--'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('activo',array('div'=>array('class'=>'checkbox'),'class'=>''));

		//echo $this->Form->input('Usuario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>
