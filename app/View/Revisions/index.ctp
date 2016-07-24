<?php $proyecto_id = $ultima['Revision']['proyecto_id']; ?>
<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Revisiones',
		'subtitle'=>'Comparar',
		'breadcrumb'=>array(
			__('Proyectos')=>array('controller'=>'proyectos','action'=>'index'),
			__('Ver Proyecto')=>array('controller'=>'proyectos','action'=>'view',$proyecto_id),
			__('Comparar Revisiones')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-sm-6">
			<div class="box box-solid box-primary">
				<div class="box-header">
					<h3 class="box-title">Ultima Actualización</h3>

					<!-- <div class="box-tools pull-right">
						<div class=""><?php echo $ultima['Usuario']['nombre_completo'].' '.$ultima['Revision']['updated'];?></div>
					</div> -->

				</div>

				<div class="box-time pull-right">
					<small class="text-muted"><?php echo $ultima['Usuario']['nombre_completo'].' - '.$this->General->dateTimeFormatView($ultima['Revision']['updated']);?></small>
				</div>
				<spam class="clearfix"></spam>

				<div class="box-body">

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Titulo'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $ultima['Revision']['titulo'];?>
								&nbsp;
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Resumen'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $ultima['Revision']['resumen'];?>
								&nbsp;
							</div>
							<div class="panel-footer">
								<i class="fa fa-tags mano" title="Palabras Clave"></i>
								<?php
									$etiquetas = explode(',', $ultima['Revision']['etiquetas']);
									foreach ($etiquetas as $etiqueta) {
										echo '<span class="label label-default">'.trim($etiqueta).'</span> ';
									}
								?>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Descripcion'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $ultima['Revision']['descripcion'];?>
								&nbsp;
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Observaciones'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $ultima['Revision']['observaciones'];?>
								&nbsp;
							</div>
						</div>

				</div>
				<div class="box-footer">
					<?php echo $this->Html->link('<i class="fa fa-edit fa-fw"></i> Editar Revision', array('controller'=>'revisions','action' => 'edit', $ultima['Revision']['id']),array('class'=>'btn btn-primary','escape'=>false)); ?>

					<?php echo $this->Html->link(
						'<i class="fa fa-reply fa-fw"></i> Volver al Proyecto',
						array('controller'=>'proyectos','action' => 'view', $ultima['Revision']['proyecto_id']),
						array('class'=>'btn btn-default','escape'=>false)); ?>
				</div>
			</div>
		</div>


		<div class="col-sm-6" style="overflow: auto;">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Revisiones Anteriores <small><?php echo $this->Paginator->counter(array('format' => __('{:page} de {:pages}')));?></small>
						<!-- <small>
							<p><?php
							echo $this->Paginator->counter(array(
							'format' => __('Page {:page} of {:pages}, showing {:current} records <br/>out of {:count} total, starting on record {:start}, ending on {:end}')
							));
							?></p>
						</small> -->
					</h3>

					<div class="box-tools pull-right">
				    	<ul class="pagination pagination-sm inline">
				            <?php
				                echo $this->Paginator->prev('<i class="fa fa-chevron-left"></i>', array('tag' => 'li','currentClass' => 'disabled','escape'=>false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'span','escape'=>false));
				                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'span', 'currentClass' => 'active','tag' => 'li','first' => 1,'modulus'=>'3','ellipsis'=>false));
				                echo $this->Paginator->next('<i class="fa fa-chevron-right"></i>', array('tag' => 'li','currentClass' => 'disabled','escape'=>false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'span','escape'=>false));
				            ?>
				        </ul>
					</div>
				</div>

				<?php foreach ($revisions as $revision): ?>
					<div class="box-time pull-right">
						<small class="text-muted"><?php echo $revision['Usuario']['nombre_completo'].' - '.$this->General->dateTimeFormatView($revision['Revision']['updated']);?></small>
					</div>
					<spam class="clearfix"></spam>
					<div class="box-body">

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Titulo'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $revision['Revision']['titulo'];?>
								&nbsp;
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Resumen'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $revision['Revision']['resumen'];?>
								&nbsp;
							</div>
							<div class="panel-footer">
								<i class="fa fa-tags mano" title="Palabras Clave"></i>
								<?php
									$etiquetas = explode(',', $revision['Revision']['etiquetas']);
									foreach ($etiquetas as $etiqueta) {
										echo '<span class="label label-default">'.trim($etiqueta).'</span> ';
									}
								?>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Descripcion'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $ultima['Revision']['descripcion'];?>
								&nbsp;
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><?php echo __('Observaciones'); ?></strong></div>
							<div class="text-justify panel-body">
								<?php echo $revision['Revision']['observaciones'];?>
								&nbsp;
							</div>
						</div>
					</div>
					<div class="box-footer">
						<?php echo $this->Html->link('<i class="fa fa-edit fa-fw"></i>Editar a partir de Esta Revisión', array('controller'=>'revisions','action' => 'edit', $revision['Revision']['id']),array('class'=>'btn btn-default','escape'=>false),'La revision que desea editar es mas antigua que la actual, ¿Esta seguro que desea realizar esta acción?'); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

</section><!-- /.content -->
