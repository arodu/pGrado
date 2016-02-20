<div class="usuarios index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<div class="table-responsive">
		<?php echo $this->Search->create('Articulo',array('autoSubmit'=>true,'inputDefaults'=>array('class'=>'form-control input-sm')));?>
			<table cellpadding="0" cellspacing="0" class="table">
				<thead>
					<tr>
							<th colspan="2"><?php echo $this->Paginator->sort('cedula'); ?></th>
							<th><?php echo $this->Paginator->sort('nombres'); ?></th>
							<th><?php echo $this->Paginator->sort('apellidos'); ?></th>
							<th><?php echo $this->Paginator->sort('sede_id'); ?></th>
							<th><?php echo $this->Paginator->sort('tipo_usuario_id'); ?></th>
							<th><?php echo $this->Paginator->sort('activo'); ?></th>
							<th><?php echo $this->Paginator->sort('admin'); ?></th>
							<th><?php echo $this->Paginator->sort('actualizado'); ?></th>
							<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
					</tr>
					<tr>
							<td colspan="2"><?php echo $this->Search->input('cedula'); ?></td>
							<td><?php echo $this->Search->input('nombres'); ?></td>
							<td><?php echo $this->Search->input('apellidos'); ?></td>
							<td><?php echo $this->Search->input('sede_id'); ?></td>
							<td><?php echo $this->Search->input('tipo_usuario_id'); ?></td>
							<td><?php echo $this->Search->input('activo',array('options'=>array('1'=>'Activo','0'=>'Inactivo'))); ?></td>
							<!-- <td><?php echo $this->Search->input('admin'); ?></td> -->
							<td><?php echo $this->Search->input('admin',array('options'=>array('1'=>'Activo','0'=>'Inactivo'))); ?></td>
							<td><?php echo $this->Search->input('actualizado'); ?></td>
							<td><?php echo $this->Search->input('observaciones'); ?></td>
							<td class="actions"></td> 
					</tr>
				</thead>
				<tbody>
					<?php foreach ($usuarios as $usuario): ?>
						<tr>
							<td>
								
								<?php 
									$options = array('controller'=>'usuarios','action'=>'viewFoto',$usuario['Usuario']['id'],'xs');
									$user_foto = $this->Html->url($options,true);	
									$img = $this->Html->image($user_foto,array('class'=>'img-responsive img-circle','style'=>'width: 30px;'));
								 	

								 	echo $this->Html->link($img, array('action' => 'view', $usuario['Usuario']['id']),array('class'=>'','escape'=>false));

								 	//echo $this->Html->link(__('<i class="fa fa-caret-square-o-right"></i>&nbsp;Ver'), array('action' => 'view', $usuario['Usuario']['id']),array('class'=>'btn btn-default btn-xs','escape'=>false));


								  ?>


							</td>
							<td><?php echo h($usuario['Usuario']['cedula']); ?>&nbsp;</td>
							<td><?php echo h($usuario['Usuario']['nombres']); ?>&nbsp;</td>
							<td><?php echo h($usuario['Usuario']['apellidos']); ?>&nbsp;</td>
							<td>
								<?php echo $this->Html->link($usuario['Sede']['nombre'], array('controller' => 'sedes', 'action' => 'view', $usuario['Sede']['id'])); ?>
							</td>
							<td>
								<?php echo $this->Html->link($usuario['TipoUsuario']['nombre'], array('controller' => 'tipo_usuarios', 'action' => 'view', $usuario['TipoUsuario']['id'])); ?>
							</td>


							<td><?php echo ($usuario['Usuario']['activo'] ? '<span class="label label-primary">Activo</span>' : '<span class="label label-default">Inactivo</span>'); ?>&nbsp;</td>
							<td><?php echo ($usuario['Usuario']['admin'] ? '<span class="label label-danger">Admin</span>' : ''); ?>&nbsp;</td>
							<td><?php echo ($usuario['Usuario']['actualizado'] ? '<span class="label label-success">Actualizado</span>' : ''); ?>&nbsp;</td>
							<td><?php echo ($usuario['Usuario']['observaciones'] ? '<span class="label label-warning">Observaciones</span>' : ''); ?>&nbsp;</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php echo $this->Search->end(); ?>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));	
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?></li>
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

<?php // echo $this->element('sql_dump'); ?>