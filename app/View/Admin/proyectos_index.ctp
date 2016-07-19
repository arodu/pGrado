<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Proyecto <small>Listado</small></h1>
	<?php echo $this->General->breadcrumb(array(
		__('Listado Proyectos')=>true,
	)); ?>
</section>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<?php $this->Search->activatePaginator($this->Paginator,$admin=true); ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<?php echo $this->Search->create('Proyecto',array('id'=>'search-form','autoSubmit'=>true,'inputDefaults'=>array('class'=>'form-control input-sm')));?>
				<div class="box-header">
					<h3 class="box-title">
						<?php echo $this->Html->link('Listado de Proyectos <i class="fa fa-undo fa-fw"></i>',array('controller'=>'admin','action'=>'proyectos_index'),array('escape'=>false)); ?>
						<?php echo $this->Search->inputPageLimit(array('class'=>'form-control form-control-inline', 'options'=>array('Elementos'=>array('10'=>'10','20'=>'20','100'=>'100','500'=>'500')))); ?>
					</h3>

					<div class="box-tools pull-right">
						<div id="exportar-boton" class="dropdown">
							<button class="btn btn-default btn-flat dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								Exportar <i class="fa fa-caret-down fa-fw"></i>
							</button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								<li role="presentation">
									<?php echo $this->Html->link('<i class="fa fa-file-text-o"></i> Formato CSV','#',array('id'=>'csv','role'=>'menuitem','target'=>'_blank','escape'=>false)); ?>
								</li>
								<!-- <li role="presentation"><a id="pdf" role="menuitem" tabindex="-1" href="#"><i class="fa fa-file-pdf-o"></i> Archivo PDF</a></li> -->
							</ul>
						</div>
					</div>
				</div>

				<div class="box-body">

					<div class="proyectos index">
						<div class="table-responsive">
								<table cellpadding="0" cellspacing="0" class="table table-hover">
									<thead>
										<tr>
											<th><?php echo $this->Paginator->sort('id','Numeral'); ?></th>
											<th><?php echo $this->Paginator->sort('tema'); ?></th>
											<th><?php // echo $this->Paginator->sort('autors'); ?> Autores</th>
											<th><?php // echo $this->Paginator->sort('autors'); ?> Tutores</th>
											<th><?php echo $this->Paginator->sort('programa_id'); ?></th>
											<th><?php echo $this->Paginator->sort('categoria_id'); ?></th>
											<th><?php echo $this->Paginator->sort('fase_id'); ?></th>
											<th><?php echo $this->Paginator->sort('estado_id'); ?></th>
											<th><?php echo $this->Paginator->sort('grupo_id'); ?></th>
											<th><?php echo $this->Paginator->sort('sede_id'); ?></th>

											<th class="actions"></th>
										</tr>
										<tr>
											<th><?php echo $this->Search->input('id'); ?></th>
											<th colspan="3"><?php echo $this->Search->input('tema',array('placeholder'=>'Buscar por Tema')); ?></th>
											<!-- <th><?php // echo $this->Search->input('autor_id'); ?></th> -->
											<th><?php echo $this->Search->input('programa_id',array('empty'=>'-- Todos --')); ?></th>
											<th><?php echo $this->Search->input('categoria_id',array('empty'=>'-- Todos --')); ?></th>
											<th><?php echo $this->Search->input('fase_id',array('empty'=>'-- Todos --')); ?></th>
											<th><?php echo $this->Search->input('estado_id',array('empty'=>'-- Todos --')); ?></th>
											<th><?php echo $this->Search->input('grupo_id',array('empty'=>'-- Todos --')); ?></th>
											<th><?php echo $this->Search->input('sede_id',array('empty'=>'-- Todos --')); ?></th>

											<th class="actions"></th>
										</tr>
									</thead>

									<tbody>

										<?php if($proyectos){ ?>

											<?php foreach ($proyectos as $proyecto): ?>
												<?php // debug($proyecto); ?>

												<?php
													$class_tr = '';

													if($proyecto['Proyecto']['activo']){
														$class_tr = 'info';
													}elseif(isset($proyecto['Autor'][0]['activo']) && $proyecto['Autor'][0]['activo']===false){
														$class_tr = 'warning';
													}
												?>

												<tr class="<?php echo $class_tr;?>">
													<td>
														<?php
															echo $this->Html->link(
																h($proyecto['Proyecto']['id']).'&nbsp;&nbsp;<i class="fa fa-caret-square-o-right"></i>',
																array('controller'=>'proyectos','action' => 'view', $proyecto['Proyecto']['id'],'admin'=>false),
																array(
																	'class'=>'btn btn-default btn-sm',
																	'escape'=>false,
																	'title'=>$proyecto['Proyecto']['tema'],
																	'data-toggle'=>'tooltip',
																	'data-placement'=>'right'
																)
															);
														?>
													</td>

													<td>
														<?php
															$tam = 30;
															$tema = $proyecto['Proyecto']['tema'];

															$sub_tema = substr($proyecto['Proyecto']['tema'] , 0, $tam).( strlen($tema) > $tam ? '...' : '');

															echo $this->Html->tag('span', h($sub_tema), array('title'=>$tema, 'data-toggle'=>'tooltip', 'data-placement'=>'right'));
														?>
													</td>

													<td>
														<?php
															$autor_activo = false;
															foreach ($proyecto['Autor'] as $autor) {

																$aux = ($autor['activo'] ? '' : 'text-muted' );

																if($autor['TipoAutor']['code'] == 'estudiante'){ // Muestra solo si es estudiante
																	echo '<div><spam class="'.$aux.'">';
																	echo $autor['Usuario']['cedula_nombre_completo'];
																	echo ($autor['activo'] ? '' : ' (Inactivo) ' );
																	echo '</spam></div>';
																}

																if($autor['usuario_id'] == $userInfo['id']){
																	$autor_activo = $autor['activo'];
																	$autor_id = $autor['id'];
																}
															}
														?>
													</td>

													<td>
														<?php
															$autor_activo = false;
															foreach ($proyecto['Autor'] as $autor) {

																$aux = ($autor['activo'] ? '' : 'text-muted' );

																if($autor['TipoAutor']['code'] != 'estudiante'){ // Muestra solo si NO es estudiante
																	echo '<div><spam class="'.$aux.'" title="'.$autor['TipoAutor']['nombre'].'" data-toggle="tooltip" data-placement="right">';
																	echo '<strong>'.$this->General->soloLetras($autor['TipoAutor']['nombre']).'</strong> ';
																	//echo ($autor['activo'] ? '' : ' <i class="fa fa-ban" title="No ha aceptado Solicitud de Tutoria"></i> ' );
																	echo $autor['Usuario']['nombre_completo'];

																	echo '</spam></div>';
																}

																if($autor['usuario_id'] == $userInfo['id']){
																	$autor_activo = $autor['activo'];
																	$autor_id = $autor['id'];
																}

															}
														?>
													</td>

													<td><?php echo h($proyecto['Programa']['nombre']); ?>&nbsp;</td>
													<td><?php echo h($proyecto['Categoria']['nombre']); ?>&nbsp;</td>
													<td><?php echo h($proyecto['Fase']['nombre']); ?>&nbsp;</td>
													<td><?php echo h($proyecto['Estado']['nombre']); ?>&nbsp;</td>
													<td><?php echo h($proyecto['Grupo']['nombre']); ?>&nbsp;</td>
													<td><?php echo h($proyecto['Sede']['nombre']); ?>&nbsp;</td>

													<td class="actions">
													</td>
												</tr>
											<?php endforeach; ?>

										<?php }else{ ?>
											<tr>
												<td colspan="10">
													<?php echo $this->element('callout/danger',array('titulo'=>'No se encontraron Proyectos o Propuestas','mensaje'=>'')); ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php echo $this->Form->hidden('tipo',array('id'=>'fotmat-tipo','value'=>'html')); ?>

						</div>

					</div>
				</div>

				<div class="box-footer">

					<div class="col-sm-6">
						<p> <?php
								//echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de un total de {:count}, desde el registro {:start}, hasta el registro {:end}')));
								echo $this->Paginator->counter(array('format' => __('Página ({:page}/{:pages}), Cantidad de Registros ({:current}/{:count}), ({:start}-{:end})')));
								?></p>
					</div>

					<div class="col-sm-6">
						<div class="pull-right">
					    	<ul class="pagination pagination-sm inline">
					            <?php
									echo $this->Paginator->prev('<i class="fa fa-chevron-left"></i>', array('tag' => 'li','currentClass' => 'disabled','escape'=>false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'span','escape'=>false));
									echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'span', 'currentClass' => 'active','tag' => 'li','first' => 1,'modulus'=>'3','ellipsis'=>false));
									echo $this->Paginator->next('<i class="fa fa-chevron-right"></i>', array('tag' => 'li','currentClass' => 'disabled','escape'=>false), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'span','escape'=>false));
					            ?>
					        </ul>
						</div>
		            </div>
		            <div class="clearfix"></div>
		        </div>
				<?php echo $this->Search->end(); ?>
			</div>
		</div>
	</div>


	<?php // ----------------- JavaScript ------------------- ?>
		<?php $this->Html->scriptStart(array('inline' => false)); ?>

			$('#exportar-boton #csv').on('click',function(){
				$('#fotmat-tipo').val('csv');
				$('#search-form').submit();
				$('#fotmat-tipo').val('html');
				return false;
			});

		<?php $this->Html->scriptEnd(); ?>

</section><!-- /.content -->
