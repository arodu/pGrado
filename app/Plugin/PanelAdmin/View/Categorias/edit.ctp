<div class="categorias form">
<?php echo $this->Form->create('Categoria', array('inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control'))); ?>
	<fieldset>
		<legend><?php echo __('Edit Categoria'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id',array('label'=>'Categoría Padre','options'=>$categorias_list,'empty'=>'--Selecione--'));
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		//echo $this->Form->input('lft');
		//echo $this->Form->input('rght');
		echo $this->Form->input('activo',array('div'=>array('class'=>'checkbox'),'class'=>''));

		echo $this->Form->input('Usuario',array('class'=>'chosen-select','data-placeholder'=>"Seleccione Usuario..."));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Categoria.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Categoria.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categorias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
	</ul>
</div>


<?php echo $this->Html->css('chosen.min',array('inline'=>false)); ?>
<?php echo $this->Html->script('chosen.jquery.min',array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(".chosen-select").chosen(
			{no_results_text: "Oops, nothing found!"},
			{width: "95%"}
		);
<?php $this->Html->scriptEnd(); ?>
