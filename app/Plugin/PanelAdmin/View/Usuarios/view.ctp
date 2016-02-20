<div class="row">


	<div class="usuarios view col-sm-8">

		<div class="datos">
			<h2>
				<?php echo '<i class="fa fa-user"></i> Usuario'; ?>
				
				<small>
				<?php echo ( $usuario['Usuario']['admin'] ? '<span class="label label-danger">Admin</span>' : '' ); ?>

				<?php echo ( $usuario['Usuario']['activo'] ? '<span class="label label-primary">Activo</span>' : '<span class="label label-default">Inactivo</span>' ); ?>

				<?php echo ( $usuario['Usuario']['actualizado'] ? '<span class="label label-success">Actualizado</span>' : '' ); ?>
				</small>
			</h2>

			<div class="row">
				<div class="col-md-4">
					<?php
						$options = array('controller'=>'usuarios','action'=>'viewFoto',$usuario['Usuario']['id']);
						if($this->params['action'] === 'perfilUsuario' ){
							$options['action'] = 'viewFotoPerfil';
						}

						$user_foto = $this->Html->url($options,true);	
						echo $this->Html->image($user_foto,array('class'=>'img-responsive img-thumbnail'));
					?>
				</div>

				<div class="col-md-8">
					<dl class="dl-horizontal">
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Cedula'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['cedula']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Nombres'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['nombres']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Apellidos'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['apellidos']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Sexo'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['sexo']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Email'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['email']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Sede'); ?></dt>
						<dd>
							<?php echo h($usuario['Sede']['nombre']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Tipo Usuario'); ?></dt>
						<dd>
							<?php echo h($usuario['TipoUsuario']['nombre']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Updated'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['updated']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Observaciones'); ?></dt>
						<dd>
							<?php echo h($usuario['Usuario']['observaciones']); ?>
							&nbsp;
						</dd>
					</dl>
				</div>

			</div>


		</div>
	
		<div class="related proyectos">
			<h4><?php echo __('Proyectos'); ?> <small>Ultimos <?php echo count($usuario['Autor']);?></small></h4>

			<div class="table-responsive">
				<table class="table tabla-condensed">
					<tr>
						<th colspan="2">Tema</th>
						<th>Actor</th>
						<th>Categoria</th>
						<th>Sede</th>
						<th>Estado</th>
					</tr>

					<?php foreach ($usuario['Autor'] as $autor){ ?>
							<tr>
								<td><?php echo $autor['Proyecto']['id']; ?></td>
								<td><?php echo $autor['Proyecto']['tema'];?></td>
								<td>
									<?php $class_status_autor = ( $autor['activo'] ? '' : 'text-muted' ); ?>

									<span class="<?php echo $class_status_autor;?>"><?php echo $autor['TipoAutor']['nombre'];?></span>
								</td>
								<td><?php echo $autor['Proyecto']['Categoria']['nombre'];?></td>
								<td><?php echo $autor['Proyecto']['Sede']['nombre'];?></td>
								<td><?php echo ($autor['Proyecto']['activo'] ? 'Activo' : 'Inactivo');?></td>
							</tr>
					<?php } ?>

					<tr>
						<td colspan="5"><span class="text-muted">Ver todos los Proyectos</span></td>
					</tr>


				</table>

				<?php // debug($usuario['Autor']);?>
			</div>
		</div>
	</div>


	<div class="col-sm-4">

		<div class="related perfils">
			<h4><?php echo __('<i class="fa fa-unlock"></i> Accesos'); ?></h4>
			<?php if (!empty($usuario['Perfil'])): ?>
				<ul>
				<?php foreach ($usuario['Perfil'] as $perfil): ?>
					<li><?php echo $perfil['nombre']; ?></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>



		<div class="actions">
			<h4><?php echo __('Acciones'); ?></h4>

			<!-- <ul>
				<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), array(), __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
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
			</ul> -->

		  <!-- <div class="dropdown">
				  <button id="drop1" type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				    Editar <span class="caret"></span>
				  </button>
				  <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop1">
				    <li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?></li>
				    <li><?php echo $this->Html->link(__('Editar Datos '), array('action' => 'editData', $usuario['Usuario']['id'])); ?></li>
				    <li class="divider"></li>
				    <li><?php echo $this->Html->link(__('Editar Password '), array('action' => 'editPassword', $usuario['Usuario']['id'])); ?></li>
				  </ul>
			</div>

			<div class="dropdown">
				  <button id="drop2" type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				    Eliminar <span class="caret"></span>
				  </button>
		  		  <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop2">
				    
				  </ul>
		  	</div> -->




			<div class="list-group">
				<!-- <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
				<a href="#" class="list-group-item list-group-item-info">Cras sit amet nibh libero</a>
				<a href="#" class="list-group-item list-group-item-warning">Porta ac consectetur ac</a>
				<a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a> -->
				<?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $usuario['Usuario']['id']),array('class'=>'list-group-item list-group-item-warning')); ?>
				<?php echo $this->Html->link(__('Editar Categorias '), array('action' => 'editCategorias', $usuario['Usuario']['id']),array('class'=>'list-group-item list-group-item-warning')); ?>
				<?php echo $this->Html->link(__('Editar Datos '), array('action' => 'editData', $usuario['Usuario']['id']),array('class'=>'list-group-item list-group-item-warning')); ?>
				<?php echo $this->Html->link(__('Editar Password '), array('action' => 'editPassword', $usuario['Usuario']['id']),array('class'=>'list-group-item list-group-item-warning')); ?>
			</div>

			<div class="list-group">
				<?php echo $this->Form->postLink('<i class="fa fa-times"></i> Eliminar', array('action' => 'delete', $usuario['Usuario']['id']),array('class'=>'list-group-item list-group-item-danger','escape'=>false), __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?>
			</div>



		</div>

		<?php /*
		<div class="related autors">
			<h3><?php echo __('Related Autors'); ?></h3>
			<?php if (!empty($usuario['Autor'])): ?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Id'); ?></th>
				<th><?php echo __('Proyecto Id'); ?></th>
				<th><?php echo __('Usuario Id'); ?></th>
				<th><?php echo __('Tipo Autor Id'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Updated'); ?></th>
				<th><?php echo __('Activo'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
				<?php foreach ($usuario['Autor'] as $autor): ?>
					<tr>
						<td><?php echo $autor['id']; ?></td>
						<td><?php echo $autor['proyecto_id']; ?></td>
						<td><?php echo $autor['usuario_id']; ?></td>
						<td><?php echo $autor['tipo_autor_id']; ?></td>
						<td><?php echo $autor['created']; ?></td>
						<td><?php echo $autor['updated']; ?></td>
						<td><?php echo $autor['activo']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('controller' => 'autors', 'action' => 'view', $autor['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'autors', 'action' => 'edit', $autor['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'autors', 'action' => 'delete', $autor['id']), array(), __('Are you sure you want to delete # %s?', $autor['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php endif; ?>

			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('New Autor'), array('controller' => 'autors', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div> */ ?>

		<div class="related logs">
			<h4><?php echo '<i class="fa fa-clock-o"></i> Historial'; ?> <small>Ultimos <?php echo count($usuario['Log']);?></small></h4>
			<?php if (!empty($usuario['Log'])): ?>

			<div class="table-responsive">
				<table cellpadding = "0" cellspacing = "0" class="table table-condensed" style="font-size:.8em">
					<tr>
						<th><?php echo __('Tipo'); ?></th>
						<th><?php echo __('Related'); ?></th>
						<th><?php echo __('created'); ?></th>
					</tr>
					<?php foreach ($usuario['Log'] as $log): ?>
						<tr>
							<td>
								<span class="btn-tooltip" title="<?php echo $log['DescripcionLog']['code'].': '.$log['DescripcionLog']['descripcion'].' '.$log['observacion'];?>">
									<?php echo $log['DescripcionLog']['code']; ?>
								</span>
							</td>
							<td><?php echo $log['related_id']; ?></td>
							<td><?php echo $this->General->timeFormatView($log['created']); ?></td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td colspan="3">
							<?php echo $this->Html->link(__('Ver Todo el Historial'), array('controller' => 'logs', 'action' => 'index',$usuario['Usuario']['id'])); ?>
						</td>
					</tr>
				</table>
			</div>

			<?php endif; ?>
		</div>
	</div>

</div>

<?php //debug($data); ?>