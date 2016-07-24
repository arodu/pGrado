<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Descargas',
		'subtitle'=>'Administrar',
		'breadcrumb'=>array(
			__('Descargas')=>array('controller'=>'descargas','action'=>'index'),
			__('Administrar')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="box box-default">
		<div class="box-header with-border">
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> Agregar Nueva Descarga',array('controller'=>'descargas','action'=>'add'),array('class'=>'btn btn-sm btn-primary','escape'=>false));?>
				<?php echo $this->Html->link('<i class="fa fa-replay"></i> Ver Descargas',array('controller'=>'descargas','action'=>'index'),array('class'=>'btn btn-sm btn-primary','escape'=>false));?>
		</div><!-- /.box-header -->
		<div class="box-body">
			<table cellpadding="0" cellspacing="0" class="table">
				<thead>
				<tr>
						<th><?php echo $this->Paginator->sort('active', 'Status', array('class'=>'btn btn-default btn-xs')); ?></th>
						<th>
							<?php echo $this->Paginator->sort('nombre', 'Archivo', array('class'=>'btn btn-default btn-xs')); ?>
							<?php echo $this->Paginator->sort('usuario_id', 'Usuario' , array('class'=>'btn btn-default btn-xs')); ?>
							<?php echo $this->Paginator->sort('tipo', 'Tipo de Archivo', array('class'=>'btn btn-default btn-xs')); ?>
							<?php echo $this->Paginator->sort('etiqueta', 'Etiqueta', array('class'=>'btn btn-default btn-xs')); ?>
						</th>
						<th><?php echo $this->Paginator->sort('updated', 'Fecha', array('class'=>'btn btn-default btn-xs')); ?></th>
						<th class="actions"></th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($descargas as $descarga): ?>
						<tr>
							<td>
								<?php
									if($descarga['Descarga']['active']){
										echo '<span class="label label-primary">Activo</span>';
									}else{
										echo '<span class="label label-default">Inactivo</span>';
									}
								?>
							</td>
							<td>
								<strong><?php echo h($descarga['Descarga']['nombre']); ?></strong><br/>
								Usuario: <?php echo $descarga['Usuario']['cedula']; ?><br/>
								<em><?php echo h($descarga['Descarga']['etiqueta']); ?></em><br/>
								<?php echo h($descarga['Descarga']['descripcion']); ?><br/>
								[ <?php echo h($descarga['Descarga']['tipo']); ?> ] <?php echo h($descarga['Descarga']['archivo']); ?>&nbsp;
							</td>
							<td><?php echo h($descarga['Descarga']['updated']); ?>&nbsp;</td>
							<td class="actions">
								<?php // echo $this->Html->link(__('View'), array('action' => 'view', $descarga['Descarga']['id'])); ?>
								<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $descarga['Descarga']['id']), array('class'=>'btn btn-default btn-sm')); ?>
								<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $descarga['Descarga']['id']), array('class'=>'btn btn-danger btn-sm', 'confirm' => __('Are you sure you want to delete # %s?', $descarga['Descarga']['id']))); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</div>
	</div>

</section>
