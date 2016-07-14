<?php
	$this->assign('title-page', 'Descargas <small>Administrar</small>');

	$bc = array(
		'items'=>array(
				0 => array('title'=>'Descargas','url'=>'/descargas/index'),
			),
		'config'=>array('activo'=>'Administrar')
		);
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
?>

<div class="box box-default">
	<div class="box-header with-border">
			<?php echo $this->Html->link('<i class="fa fa-plus"></i> Agregar Nueva Descarga',array('controller'=>'descargas','action'=>'add'),array('class'=>'btn btn-sm btn-primary','escape'=>false));?>
			<?php echo $this->Html->link('<i class="fa fa-replay"></i> Ver Descargas',array('controller'=>'descargas','action'=>'index'),array('class'=>'btn btn-sm btn-primary','escape'=>false));?>
	</div><!-- /.box-header -->
	<div class="box-body">
		<?php if(count($descargas) > 0): ?>
			<?php foreach ($descargas as $descarga) : ?>

					<div class="callout callout-gray active" style="margin-bottom: 5px;">
							<div class="row">
								<div class="col-md-12">
									<div class="">

										<div class="text-bold text-justify proyecto_titulo">
											<?php
												echo $this->Html->link(
													'<i class="fa fa-chevron-circle-right"></i>&nbsp;'.$descarga['Descarga']['nombre'],
													array('action' => 'download', $descarga['Descarga']['id']),
													array('escape'=>false)
												);
											?>
											<?php if($descarga['Descarga']['active']){
												echo $this->Html->tag('span', 'Activo', array('class'=>'label label-primary'));
											}else{
												echo $this->Html->tag('span', 'Inactivo', array('class'=>'label label-default'));
											} ?>
										</div>

										<div class="proyecto_datos text">
											<dl class="dl-horizontal">
												<dt>Etiqueta:</dt><dd><?php echo $descarga['Descarga']['etiqueta'];?></dd>
												<dt>Descripción:</dt><dd><?php echo $descarga['Descarga']['descripcion'];?></dd>
												<dt>Tipo de Archivo:</dt><dd><?php echo $descarga['Descarga']['tipo'];?></dd>
												<dt>Usuario:</dt><dd><?php echo $descarga['Usuario']['nombre_completo'];?></dd>
												<dt>Fecha:</dt><dd><?php echo $descarga['Descarga']['updated'];?></dd>
											</dl>
										</div>

									</div>

									<div class="">
										<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $descarga['Descarga']['id']), array('class'=>'btn btn-primary btn-xs')); ?>
										<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $descarga['Descarga']['id']), array('class'=>'btn btn-danger btn-xs', 'confirm' => __('Are you sure you want to delete # %s?', $descarga['Descarga']['id']))); ?>
									</div>

								</div>

							</div>
					</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

<!--

<div class="descargas index">
	<h2><?php echo __('Descargas'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('etiqueta'); ?></th>
			<th><?php echo $this->Paginator->sort('archivo'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($descargas as $descarga): ?>
	<tr>
		<td><?php echo h($descarga['Descarga']['id']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['etiqueta']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['archivo']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['created']); ?>&nbsp;</td>
		<td><?php echo h($descarga['Descarga']['updated']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($descarga['Usuario']['cedula'], array('controller' => 'usuarios', 'action' => 'view', $descarga['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($descarga['Descarga']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $descarga['Descarga']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $descarga['Descarga']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $descarga['Descarga']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $descarga['Descarga']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
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
		<li><?php echo $this->Html->link(__('New Descarga'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>


-->
