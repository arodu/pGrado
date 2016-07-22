<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Usuarios <small>Directorio</small></h1>
	<?php echo $this->General->breadcrumb(array(
		__('Listado Proyectos')=>array('controller'=>'admin','action'=>'proyectos_index'),
		__('Directorio de Usuarios')=>true,
	)); ?>
</section>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>



	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header">

					<h3 class="box-title">
						<?php echo $this->Html->link('Directorio de Usuarios <i class="fa fa-refresh fa-fw"></i>',array('controller'=>'pages','action'=>'directorio'),array('escape'=>false)); ?>

						</h3>

				</div>
				<div class="box-body">

		<div class="table-responsive">
			<?php echo $this->Search->create('Articulo',array('autoSubmit'=>true,'inputDefaults'=>array('class'=>'form-control input-sm')));?>
				<table class="table table-condensed table-striped">
					<thead>
						<!-- <tr>
								<th><?php echo $this->Paginator->sort('cedula'); ?></th>
								<th><?php echo $this->Paginator->sort('nombres'); ?></th>
								<th><?php echo $this->Paginator->sort('apellidos'); ?></th>
								<th>Telefono Celular</th>
								<th>Telefono Habitacion</th>
								<th>Correo Electronico</th>
								<th><?php echo $this->Paginator->sort('sede_id'); ?></th>
								<th><?php echo $this->Paginator->sort('tipo_usuario_id'); ?></th>
						</tr> -->




						<tr>
								<td></td>
								<td>
									<div class="input-group">
										<div class="input-group-btn">
											<?php echo $this->Paginator->sort('cedula','<i class="fa fa-sort"></i>',array('class'=>'btn btn-sm btn-default','escape'=>false)); ?>
										</div><!-- /btn-group -->
									<?php echo $this->Search->input('cedula',array('placeholder'=>'Cedula')); ?>
									</div>
								</td>

								<td>
									<div class="input-group">
										<div class="input-group-btn">
											<?php echo $this->Paginator->sort('nombres','<i class="fa fa-sort"></i>',array('class'=>'btn btn-sm btn-default','escape'=>false)); ?>
										</div><!-- /btn-group -->
									<?php echo $this->Search->input('nombres',array('placeholder'=>'Nombres')); ?>
									</div>
								</td>

								<td>
									<div class="input-group">
										<div class="input-group-btn">
											<?php echo $this->Paginator->sort('apellidos','<i class="fa fa-sort"></i>',array('class'=>'btn btn-sm btn-default','escape'=>false)); ?>
										</div><!-- /btn-group -->
									<?php echo $this->Search->input('apellidos',array('placeholder'=>'Apellidos')); ?>
									</div>
								</td>

								<td>Telefono Celular</td>
								<td>Telefono Habitacion</td>
								<td>Correo Electronico</td>


								<td>
									<div class="input-group">
										<div class="input-group-btn">
											<?php echo $this->Paginator->sort('sede_id','<i class="fa fa-sort"></i>',array('class'=>'btn btn-sm btn-default','escape'=>false)); ?>
										</div><!-- /btn-group -->
									<?php echo $this->Search->input('sede_id',array('empty'=>'-- Sede --')); ?>
									</div>
								</td>

								<td>
									<div class="input-group">
										<div class="input-group-btn">
											<?php echo $this->Paginator->sort('tipo_usuario_id','<i class="fa fa-sort"></i>',array('class'=>'btn btn-sm btn-default','escape'=>false)); ?>
										</div><!-- /btn-group -->
									<?php echo $this->Search->input('tipo_usuario_id',array('empty'=>'-- Usuario --')); ?>
									</div>
								</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($usuarios as $usuario): ?>
							<tr>
								<td>
									<?php echo $this->Custom->userFoto( $usuario['Usuario']['avatar'], 'xxs', array('class'=>'img-responsive img-circle') ); ?>
								</td>

								<td><?php echo h($usuario['Usuario']['cedula']); ?>&nbsp;</td>
								<td><?php echo h($usuario['Usuario']['nombres']); ?>&nbsp;</td>
								<td><?php echo h($usuario['Usuario']['apellidos']); ?>&nbsp;</td>
								<td><?php echo h($usuario['DescripcionUsuario']['telf_cel']); ?>&nbsp;</td>
								<td><?php echo h($usuario['DescripcionUsuario']['telf_hab']); ?>&nbsp;</td>
								<td><?php echo h($usuario['Usuario']['email']); ?>&nbsp;</td>
								<td><?php echo $usuario['Sede']['nombre']; ?></td>
								<td><?php echo $usuario['TipoUsuario']['nombre']; ?></td>
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
				<!-- <div class="box-footer">
				</div> -->
			</div>
		</div>
	</div>


</section>
