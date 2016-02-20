<div class="usuarios form col-md-8">
<?php echo $this->Form->create('Usuario',array('inputDefaults'=>array('class'=>'form-control','div'=>array('class'=>'form-group',))));?>
	<fieldset>
		<legend><?php echo __('Edit Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cedula');
		echo $this->Form->input('nombres');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('sede_id');
		echo $this->Form->input('tipo_usuario_id');
		echo $this->Form->input('activo',array('class'=>''));
		echo $this->Form->input('admin',array('class'=>''));
		echo $this->Form->input('actualizado',array('class'=>''));
		echo $this->Form->input('observaciones');
		echo $this->Form->input('Perfil');
	?>
	</fieldset>

	<?php echo $this->Form->button('Guardar',array('type'=>'submit','class'=>'btn btn-primary')); ?>

<?php echo $this->Form->end(); ?>
</div>


<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usuario.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Usuario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sedes'), array('controller' => 'sedes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sede'), array('controller' => 'sedes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipo Usuarios'), array('controller' => 'tipo_usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Usuario'), array('controller' => 'tipo_usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autors'), array('controller' => 'autors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Autor'), array('controller' => 'autors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Revisions'), array('controller' => 'revisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Revision'), array('controller' => 'revisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Perfils'), array('controller' => 'perfils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Perfil'), array('controller' => 'perfils', 'action' => 'add')); ?> </li>
	</ul>
</div> -->
