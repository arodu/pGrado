<div class="usuarios form">
<?php echo $this->Form->create('Usuario',array('inputDefaults'=>array('class'=>'form-control'))); ?>
	<fieldset>
		<legend><?php echo __('Add Usuario'); ?></legend>
	<?php
		echo $this->Form->input('cedula');
		//echo $this->Form->input('password');
		echo $this->Form->input('nombres');
		echo $this->Form->input('apellidos');
		//echo $this->Form->input('sexo');
		//echo $this->Form->input('email');
		//echo $this->Form->input('telefono');
		echo $this->Form->input('sede_id');
		echo $this->Form->input('tipo_usuario_id');
		echo $this->Form->input('activo',array('class'=>'','div'=>array('class'=>'checkbox')));
		echo $this->Form->input('admin',array('class'=>''));
		//echo $this->Form->input('actualizado');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('Perfil',array(
				//'multiple' => 'checkbox'
			));
	?>
	</fieldset>
	<hr/>
	<?php echo $this->Form->button('Guardar',array('class'=>'btn btn-primary')); ?>

<?php echo $this->Form->end(); ?>
</div>
<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

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
</div>
-->