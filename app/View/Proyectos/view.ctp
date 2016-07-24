<?php // ----------------- PRECONDICIONES ------------------- ?>
	<?php
		$classActivo = '';
		if($proyecto['Proyecto']['activo']){
			$classActivo = ' box-primary box-solid';
		}
	?>

<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Proyectos',
		'subtitle'=>'Ver Proyecto',
		'breadcrumb'=>array(
			__('Proyectos')=>array('controller'=>'proyectos','action'=>'index'),
			__('Ver Proyecto')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<?php // ----------------- PANEL COORDINADOR ------------------- ?>
		<?php if($this->Permit->hasPermission(array('coordpg','admin','root'))): ?>
			<?php
				echo $this->element('admin/panel', array('links'=>array(
					'left'=>array(
						'<i class="fa fa-chevron-left fa-fw"></i> '.__('Listado') => array('controller'=>'admin','action'=>'proyectos_index'),
					),
					'right'=>array(
						'<i class="fa fa-users fa-fw"></i> '.__('Asignar Jurados') => array('controller'=>'proyectos','action'=>'asignacion_jurados','admin'=>true,$proyecto['Proyecto']['id']),
						'<i class="fa fa-edit fa-fw"></i> '.__('Editar Proyecto') => array('controller'=>'admin','action'=>'proyectos_edit',$proyecto['Proyecto']['id']),
					)
				)));
			?>
		<?php endif; ?>

	<div class="row">
	<?php // ----------------- PANEL PRINCIPAL ------------------- ?>
		<div class="col-sm-9">
			<div class="panel_main box <?php echo $classActivo;?>">

				<?php $revision = $proyecto['Revision'][0]; ?>

				<?php // ----------------- BOX HEADER ------------------- ?>
					<div class="box-header text-justify">
						<h3 class="box-title">
							<?php echo strip_tags($revision['titulo']); ?>
						</h3>
					</div>

				<?php // ----------------- BOX BODY ------------------- ?>
					<div class="box-body nav-tabs-custom">

						<ul class="nav nav-tabs">
							<?php // ----------------- BOTON TABS ------------------- ?>
								<?php // ----------------- BOTON TAB 1 ------------------- ?>
									<li role="presentation" class="active">
										<a href="#tab-info" data-toggle="tab" title="Información">
											<i class="fa fa-th-list"></i>&nbsp;
											<span class="hidden-sm hidden-xs"><?php echo __('Información'); ?></span>
										</a>
									</li>

								<?php // ----------------- BOTON TAB 2 ------------------- ?>
									<?php if($mod_activo['proyecto.archivos']){ ?>
										<li role="presentation">
											<a href="#tab-archivos" class="btn-tab-archivos" data-toggle="tab" title="Archivos">
												<i class="fa fa-files-o"></i>
												<span class="hidden-sm hidden-xs">&nbsp;<?php echo __('Archivos'); ?>
													&nbsp;&nbsp;<span class="cant-archivos badge bg-blue"><?php echo $cant_archivos;?></span>
												</span>
											</a>
										</li>
									<?php } ?>

								<?php // ----------------- BOTON TAB 3 ------------------- ?>
									<?php if($mod_activo['proyecto.comentarios']){ ?>
										<li role="presentation">
											<a href="#tab-coment" class="btn-tab-coment" data-toggle="tab" title="Comentarios">
												<i class="fa fa-quote-left"></i>&nbsp;
												<span class="hidden-sm hidden-xs"><?php echo __('Comentarios'); ?></span>
											</a>
										</li>
									<?php } ?>

								<?php // ----------------- BOTON TAB 4 ------------------- ?>
									<?php if($mod_activo['proyecto.metas']){ ?>
										<li role="presentation">
											<a href="#tab-metas" class="btn-tab-metas" data-toggle="tab" title="Metas">
												<i class="fa fa-clock-o"></i>&nbsp;
												<span class="hidden-sm hidden-xs"><?php echo __('Metas'); ?>
												</span>
											</a>
										</li>
									<?php } ?>

								<?php // ----------------- BOTON TAB 5 asuntos ------------------- ?>
									<?php if($mod_activo['proyecto.asuntos']){ ?>
										<li role="presentation">
											<a href="#tab-asuntos" class="btn-tab-asuntos" data-toggle="tab" title="Asuntos">
												<i class="fa fa-exclamation-circle"></i>&nbsp;
												<span class="hidden-sm hidden-xs"><?php echo __('Asuntos'); ?>
												</span>
											</a>
										</li>
									<?php } ?>

								<?php // ----------------- BOTON TAB 6 ------------------- ?>
									<?php if($mod_activo['proyecto.jurados']){ ?>
										<li role="presentation">
											<a class="btn-tab-jurados" href="#tab-jurados" data-toggle="tab">
												<i class="fa fa-legal"></i>&nbsp;
												<span class="hidden-sm hidden-xs" title="Jurados"><?php echo __('Jurados'); ?></span>
											</a>
										</li>
									<?php } ?>
						</ul>

						<div class="tab-content">
							<?php // ----------------- TABS ------------------- ?>
								<?php // ----------------- TAB 1 info ------------------- ?>
									<div id="tab-info" class="tab-pane fade in active">
										<?php
											echo $this->requestAction(
												array('controller' => 'proyectos', 'action' => 'info', $proyecto['Proyecto']['id']),
												array('return')
											);
										?>
									</div>

								<?php // ----------------- TAB 2 archivos ------------------- ?>
									<div id="tab-archivos" class="tab-pane fade border-radious proyecto_archivos"></div>

								<?php // ----------------- TAB 3 comment ------------------- ?>
									<div id="tab-coment" class="tab-pane fade border-radious proyecto_comentarios"></div>

								<?php // ----------------- TAB 4 metas ------------------- ?>
									<div id="tab-metas" class="tab-pane fade border-radious proyecto_metas"></div>

								<?php // ----------------- TAB 5 asuntos ------------------- ?>
									<div id="tab-asuntos" class="tab-pane fade border-radious proyecto_asuntos"></div>

								<?php // ----------------- TAB 6 jurados ------------------- ?>
									<div id="tab-jurados" class="tab-pane fade border-radious proyecto_jurados"></div>

						</div>
					</div>
			</div>
		</div>

	<?php // ----------------- PANEL LATERAL DERECHO ------------------- ?>
		<div class="col-sm-3">
			<?php // ----------------- DATOS PROYECTO ------------------- ?>
				<div class="panel_side box <?php echo $classActivo;?>">
					<div class="box-header">
						<h3 class="box-title">Proyecto</h3>
						<div class="box-tools pull-right">
							<span class="badge">
								<?php echo ($proyecto['Proyecto']['activo'] ? 'Activo' : 'Inactivo'); ?>
							</span>
							<?php if($proyecto['Proyecto']['bloqueado']): ?>
								<span class="badge">Bloqueado</span>
							<?php endif; ?>
						</div>
					</div>
					<div class="box-body">
						<?php echo '<strong>'.__('Tema').': </strong>'.$proyecto['Proyecto']['tema'] ?><br/>
						<?php echo '<strong>'.__('Categoría').': </strong>'.$proyecto['Categoria']['nombre'] ?><br/>
						<?php echo '<strong>'.__('Programa').': </strong>'.$proyecto['Programa']['nombre'] ?><br/>
						<?php echo '<strong>'.__('Sede').': </strong>'.$proyecto['Sede']['nombre'] ?><br/>
						<?php echo '<strong>'.__('Fase').': </strong>'.$proyecto['Fase']['nombre'] ?><br/>
						<?php echo '<strong>'.__('Estatus').': </strong>'.$proyecto['Estado']['nombre'] ?><br/>
						<?php echo '<strong>'.__('Grupo').': </strong>'.$proyecto['Grupo']['nombre'] ?>
					</div>


					<?php if($mod_activo['proyecto.imprimir']): ?>
						<div class="box-footer">
							<?php echo $this->Html->link('<i class="fa fa-print fa-fw"></i> Imprimir Planillas', '#',
								array('class'=>'btn btn-default btn-xs btn-tooltip','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#planillasModal', 'title'=>'Imprimir Planillas')
							); ?>
						</div>
					<?php endif; ?>

				</div>

			<?php // ----------------- DATOS AUTORES ------------------- ?>
				<div id="panel-estudiantes" class="box <?php echo $classActivo;?>">
					<?php
						echo $this->requestAction(
							array('controller' => 'autors', 'action' => 'view_proyecto_estudiantes', $proyecto['Proyecto']['id']),
							array('return')
						);
					?>
				</div>

			<?php // ----------------- DATOS TUTORES ------------------- ?>
				<div id="panel-tutors" class="box <?php echo $classActivo;?>">
					<?php
						echo $this->requestAction(
							array('controller' => 'autors', 'action' => 'view_proyecto_tutors', $proyecto['Proyecto']['id']),
							array('return')
						);
					?>
				</div>

			<?php // ----------------- DATOS ESCENARIO ------------------- ?>
				<?php if($mod_activo['proyecto.escenarios']){ ?>
					<div id="panel-escenario" class="box <?php echo $classActivo;?>">
						<?php
							echo $this->requestAction(
								array('controller' => 'escenarios', 'action' => 'view', $proyecto['Proyecto']['id']),
								array('return')
							);
						?>
					</div>
				<?php } ?>

			<?php // ----------------- META DATOS ------------------- ?>
				<div class="box <?php echo $classActivo;?>">
					<div class="box-header">
						<h3 class="box-title">Datos</h3>
					</div>
					<div class="box-body">
						<?php echo '<strong>Numeral: </strong>'.$proyecto['Proyecto']['id']; ?><br/>
						<?php echo '<strong>Fecha de Creación: </strong>'.$this->General->dateFormatView($proyecto['Proyecto']['created']); ?><br/>
						<?php echo '<strong>Ultima Revisión: </strong>'.$this->General->dateFormatView($proyecto['Revision'][0]['updated']); ?><br/>
						<?php echo '<strong>Cantidad Revisiones: </strong>'.$proyecto['Datos']['cant_revisiones']; ?><br/>
					</div>
				</div>

			<?php // ----------------- ELIMINAR PROYECTO ------------------- ?>
				<?php if(!$proyecto['Proyecto']['bloqueado'] and !$proyecto['Proyecto']['activo']): ?>
					<?php
						echo $this->Form->button('<i class="fa fa-trash fa-fw"></i> '.__('Eliminar Proyecto'),array(
							'type' => 'button',
							'class'=>'btn btn-danger btn-block proyecto-modal-link',
							'data-url'=> $this->Html->url(array('controller'=>'proyectos', 'action'=>'delete', $proyecto['Proyecto']['id'])),
							'data-action'=>'delete',
							'title'=>'Eliminar Proyecto',
						));
					?>
				<?php endif; ?>
		</div>

	</div>

	<?php // ----------------- MODAL IMPRESION DE PLANILLAS ------------------- ?>
		<?php if($mod_activo['proyecto.imprimir']): ?>
			<div class="modal fade" id="planillasModal" tabindex="-1" role="dialog" aria-labelledby="planillasModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="planillasModalLabel"><i class="fa fa-print fa-fw"></i> Imprimir Planillas</h4>
						</div>
						<div id="modal-content" class="modal-body">

							<div class="list-group">

								<?php

								// Planilla 001 - Vista de Impresion
										echo $this->Html->link('<i class="fa fa-file-text-o fa-fw"></i> 001 - Proyecto/Propuesta versión para Imprimir',
											array('controller'=>'proyectos','action'=>'pdf_view',$proyecto['Proyecto']['id'],'admin'=>false),
											array('class'=>'list-group-item','target'=>'_blank','escape'=>false));

								// Planilla 002 - Planilla de Aprobacion de Propuesta
									if($proyecto['Fase']['code']=='propuesta'){
										echo $this->Html->link('<i class="fa fa-file-pdf-o fa-fw"></i> 002 - Planilla de Aprobacion de Propuesta',
											array('controller'=>'planillas','action'=>'aprobacionPropuesta',$proyecto['Proyecto']['id'],'admin'=>false),
											array('class'=>'list-group-item','target'=>'_blank','escape'=>false));
									}

								?>
							</div>
						</div>
						<div class="modal-footer">
						<?php echo $this->Form->button('Cerrar',array('class'=>'btn btn-default pull-left','type'=>'button','data-dismiss'=>'modal')); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

	<?php // ----------------- Enlaces EXTERNOS ------------------- ?>
		<?php echo $this->Html->css('/libs/jquery-file-upload/css/jquery.fileupload',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-file-upload/js/vendor/jquery.ui.widget',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-file-upload/js/jquery.fileupload.js',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-autosize/dist/autosize.min',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-form/jquery.form',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/mixitup/build/jquery.mixitup.min', array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-maskedinput/dist/jquery.maskedinput.min',array('inline'=>false)); ?>

	<?php // ----------------- JavaScript ------------------- ?>
		<?php $this->Html->scriptStart(array('inline' => false)); ?>

			$('.modal-link, .proyecto-modal-link, .estudiante-modal-link, .tutor-modal-link').modalLink('#generalModal');

			// ----------------- user_popover -------------------
				$('.btn-perfil, .btn-perfil-estudiante, .btn-perfil-tutor').popoverPerfil();

			// ----------------- Cargar Comentarios -------------------
				$('.box-body .btn-tab-coment').on('shown.bs.tab', function(event) {
					$('#tab-coment').recargar("<?php echo $this->Html->url(array('controller'=>'comentarios','action'=>'index',$proyecto['Proyecto']['id']));?>");
				});

			// ----------------- Cargar Archivos -------------------
				$('.box-body a.btn-tab-archivos').on('shown.bs.tab', function (event) {
					$('#tab-archivos').recargar("<?php echo $this->Html->url(array('controller'=>'archivos','action'=>'index',$proyecto['Proyecto']['id']));?>");
				});

			// ----------------- Cargar Metas -------------------
				$('.box-body a.btn-tab-metas').on('shown.bs.tab', function(event) {
					$('#tab-metas').recargar("<?php echo $this->Html->url(array('controller'=>'metas','action'=>'index',$proyecto['Proyecto']['id']));?>");
				});

			// ----------------- Cargar Asuntos -------------------
				$('.box-body a.btn-tab-asuntos').on('shown.bs.tab', function(event) {
					$('#tab-asuntos').recargar("<?php echo $this->Html->url(array('controller'=>'asuntos','action'=>'index',$proyecto['Proyecto']['id']));?>");
				});

			// ----------------- Cargar Jurados -------------------
				$('.box-body a.btn-tab-jurados').on('shown.bs.tab', function (e) {
					$('#tab-jurados').recargar("<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'view_jurados',$proyecto['Proyecto']['id']));?>");
				});

		<?php $this->Html->scriptEnd(); ?>

</section><!-- /.content -->
