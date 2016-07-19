<?php // ----------------- PRECONDICIONES ------------------- ?>
	<?php
		$classActivo = '';

		if($proyecto['Proyecto']['activo']){
			$classActivo = ' box-primary box-solid';
		}

		$cant_estudiantes=0;
		$cant_tutores=0;
		foreach($proyecto['Autor'] as $autor){
			if($autor['TipoAutor']['code'] == 'estudiante'){
				$cant_estudiantes++;
			}else{
				$cant_tutores++;
			}
		}
	?>

<?php // ----------------- HEADER ------------------- ?>
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Proyecto <small>Ver Proyecto</small></h1>
	<?php echo $this->General->breadcrumb(array(
		__('Proyectos')=>array('controller'=>'proyectos','action'=>'index'),
		__('Ver Proyecto')=>true,
	)); ?>
</section>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>


	<?php // ----------------- PANEL COORDINADOR ------------------- ?>
		<?php if($this->Permit->hasPermission(array('coordpg','admin','root'))): ?>
			<nav class="navbar navbar-yellow">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <span class="navbar-brand">Panel Coordinador</span>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><?php echo $this->Html->link('<i class="fa fa-caret-left fa-fw"></i> '.__('Listado'),array('controller'=>'admin','action'=>'proyectos_index'),array('class'=>'','escape'=>false)); ?></li>
						</ul>
			      <ul class="nav navbar-nav navbar-right">
							<li><?php echo $this->Html->link('Editar Proyecto',array('controller'=>'admin','action'=>'proyectos_edit',$proyecto['Proyecto']['id']),array('class'=>'','escape'=>false)); ?></li>

							<?php if($mod_activo['proyecto.jurados']): ?>
								<li><?php echo $this->Html->link('Asignar Jurados',array('controller'=>'proyectos','action'=>'asignacion_jurados','admin'=>true,$proyecto['Proyecto']['id']),array('class'=>'','escape'=>false)); ?></li>
							<?php endif; ?>

			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		<?php endif; ?>


	<div class="row">
	<?php // ----------------- PANEL PRINCIPAL ------------------- ?>
		<div class="col-sm-9">
			<div class="box <?php echo $classActivo;?>">

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
										<!-- <li role="presentation" class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
												<i class="fa fa-quote-left"></i>
												<span class="hidden-sm">&nbsp;Comentarios</span>
											</a>
											<ul class="dropdown-menu" role="menu">
												<li><a id="coment-all" class="btn-tab-coment" href="#tab-coment" data-toggle="tab"><i class="fa fa-exclamation-circle"></i>Todos</a></li>
												<li class="divider"></li>
												<li><a id="coment-users" class="btn-tab-coment" href="#tab-coment" data-toggle="tab"><i class="fa fa-users"></i>Usuarios</a></li>
												<li><a id="coment-system" class="btn-tab-coment" href="#tab-coment" data-toggle="tab"><i class="fa fa-desktop"></i>Sistema</a></li>
											</ul>
										</li> -->
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

											<div class="text-muted text-right">
												<small>
													<strong>Ultima Actualización: </strong>
													<br class="visible-xs" />
													<?php echo h($revision['Usuario']['nombre_completo']).' - '.
															$this->General->dateTimeFormatView($revision['updated']
														); ?>
												</small>
											</div>

										<?php // ----------------- BOX RESUMEN ------------------------- ?>
											<div class="box box-default box-solid">
												<div class="box-header with-border">
													<strong><?php echo __('Resumen'); ?></strong>
													<div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
												</div>

												<div class="box-body text-justify">
													<?php echo $this->General->htmlTrim($revision['resumen']); ?>
												</div>

												<div class="box-footer">
													<?php
													$etiquetas = explode(',', $revision['etiquetas']);
													foreach ($etiquetas as $etiqueta) {
														echo '<span class="label label-default">'.
																trim($etiqueta).
																'</span> ';
													}
													?>
												</div>

											</div>

										<?php // ----------------- BOX DESCRIPCION --------------------- ?>
											<div class="box box-default box-solid">
												<div class="box-header with-border">
													<strong><?php echo __('Descripción'); ?></strong>
													<div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
												</div>

												<div class="box-body text-justify">
													<?php echo $this->General->htmlTrim($revision['descripcion']); ?>
												</div>
											</div>

										<?php // ----------------- BOX OBSERVACIONES ------------------- ?>
											<div class="box box-default box-solid">
												<div class="box-header with-border">
													<strong><?php echo __('Observaciones'); ?></strong>
													<div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
												</div>
												<div class="box-body text-justify">
													<?php
														if($revision['observaciones'] == ''){
															echo '<div class="text-muted"><small>Sin Observaciones</small></div>';
														}else{
															echo $this->General->htmlTrim($revision['observaciones']);
														}
													?>
												</div>
											</div>

											<?php // ----------------- BOX FOOTER ------------------- ?>
												<div>
													<hr/>
													<?php

														if($mod_activo['proyecto.revisions'] and !$proyecto['Proyecto']['bloqueado']){
															echo $this->Html->link('<i class="fa fa-edit"></i> '.__('Editar Revision'),
																	array('controller'=>'revisions','action' => 'edit', $revision['id']),
																	array('class'=>'btn btn-primary','escape'=>false)
																).'&nbsp;';

															/* Botones de VER REVISINES Y VERSION PARA IMPRIMIR */
															echo $this->Html->link('<i class="fa fa-code-fork"></i>' .__('Ver Revisiones'),
																	array('controller'=>'revisions','action' => 'index',$proyecto['Proyecto']['id']),
																	array('class'=>'btn btn-default','escape'=>false)
																).'&nbsp;';
														}

														if($mod_activo['proyecto.imprimir']){
															echo $this->Html->link('<i class="fa fa-print fa-fw"></i> '.__('Imprimir Planillas'), '#',
																array('class'=>'btn btn-default','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#planillasModal')
															);
														}
													?>
												</div>
									</div>

								<?php // ----------------- TAB 2 archivos ------------------- ?>
									<div id="tab-archivos" class="tab-pane fade border-radious proyecto_archivos proyecto_overlay">
										<!-- <i class="fa fa-refresh fa-spin"></i> Cargando... -->
									</div>

								<?php // ----------------- TAB 3 comment ------------------- ?>
									<div id="tab-coment" class="tab-pane fade border-radious proyecto_comentarios proyecto_overlay">
										<!-- <i class="fa fa-refresh fa-spin"></i> Cargando... -->
									</div>

								<?php // ----------------- TAB 4 metas ------------------- ?>
									<div id="tab-metas" class="tab-pane fade border-radious proyecto_metas proyecto_overlay">
										<!-- <i class="fa fa-refresh fa-spin"></i> Cargando... -->
									</div>

								<?php // ----------------- TAB 5 asuntos ------------------- ?>
									<div id="tab-asuntos" class="tab-pane fade border-radious proyecto_asuntos proyecto_overlay">
										<!-- <i class="fa fa-refresh fa-spin"></i> Cargando... -->
									</div>

								<?php // ----------------- TAB 6 jurados ------------------- ?>
									<div id="tab-jurados" class="tab-pane fade border-radious proyecto_jurados proyecto_overlay">
										<!-- <i class="fa fa-refresh fa-spin"></i> Cargando... -->
									</div>

						</div>
					</div>
			</div>
		</div>

	<?php // ----------------- PANEL LATERAL DERECHO ------------------- ?>
		<div class="col-sm-3">
			<?php // ----------------- DATOS PROYECTO ------------------- ?>
				<div class="box <?php echo $classActivo;?>">
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
				<div id="autores" class="box <?php echo $classActivo;?>">
					<div class="box-header">
						<h3 class="box-title"><?php echo (($cant_estudiantes >= 2) ? 'Autores' : 'Autor');?></h3>
					</div>
					<div class="box-body">
						<?php foreach ($proyecto['Autor'] as $autor): ?>
							<?php if($autor['TipoAutor']['code'] == 'estudiante'): ?>
								<?php $btn_perfil = ( $autor['activo'] ? 'btn-perfil' : '' ); ?>
								<div class="autor <?php echo ( $autor['activo'] ? 'activo' : 'inactivo' ); ?>">
									<div class="avatar">
										<?php
											$user_imagen = $this->element('usuario/avatarXS',array('foto' => $autor['Usuario']['foto']));
											echo $this->Html->image($user_imagen,array('class'=>'img-circle '.$btn_perfil,'data-id' => $autor['Usuario']['id'] ));
										?>
									</div>
									<div class="datos">
										<span class="nombre"><?php echo $autor['Usuario']['nombre_completo']; ?></span>
										<span class="cedula"><?php echo $autor['Usuario']['cedula']; ?></span>
										<i class="user-inactivo fa fa-user-times fa-fw btn-tooltip mano" title="No ha aceptado <br/>solicitud de proyecto"></i>
									</div>
									<?php if( !$proyecto['Proyecto']['bloqueado'] and (!$autor['activo']) ): ?>
										<?php //if( !$proyecto['Proyecto']['bloqueado'] and (!$autor['activo'] or $userInfo['id']==$autor['Usuario']['id']) ): ?>
										<?php echo $this->Form->postLink('<i class="fa fa-times-circle"></i>', array('controller'=>'autors','action' => 'delete',$autor['id']), array('class'=>'text-danger close','title'=>'Eliminar','escape'=>false), __('¿Esta seguro que desea eliminar este '.$autor['TipoAutor']['nombre'].' de su Proyecto?')); ?>
									<?php endif; ?>

								</div>
							<?php endif;?>
						<?php endforeach; ?>
					</div>

					<?php if(!$proyecto['Proyecto']['bloqueado'] and !$proyecto['Proyecto']['activo']): ?>
							<?php $cant_pos_estudiante = Configure::read('proyectos.cantidad.tipo_autor.estudiante'); ?>
							<?php if($cant_estudiantes < $cant_pos_estudiante): ?>
								<div class="box-footer">
									<button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="estudiante" title="Agregar Compañero"><i class="fa fa-plus"></i> Compañero</button>
								</div>
							<?php endif; ?>
					<?php endif; ?>
				</div>

			<?php // ----------------- DATOS TUTORES ------------------- ?>
				<div id="tutores" class="box <?php echo $classActivo;?>">
					<div class="box-header">
						<h3 class="box-title"><?php echo (($cant_tutores >= 2) ? 'Tutores' : 'Tutor');?></h3>
					</div>
					<div class="box-body">
						<?php $academico = $metodologico = false; ?>
						<?php foreach ($proyecto['Autor'] as $autor): ?>
							<?php if($autor['TipoAutor']['code'] != 'estudiante'): ?>
								<?php $btn_perfil = ( $autor['activo'] ? 'btn-perfil' : '' ); ?>
								<div class="autor <?php echo ( $autor['activo'] ? 'activo' : 'inactivo' ); ?>">
									<div class="avatar">
										<?php
											$user_imagen = $this->element('usuario/avatarXS',array('foto' => $autor['Usuario']['foto']));
											echo $this->Html->image($user_imagen,array('class'=>'img-circle '.$btn_perfil,'data-id' => $autor['Usuario']['id'] ));
										?>
									</div>
									<div class="datos">
										<span class="nombre"><?php echo $autor['Usuario']['nombre_completo']; ?></span>
										<span class="cedula"><?php echo $autor['TipoAutor']['nombre']; ?></span>
										<i class="user-inactivo fa fa-user-times fa-fw btn-tooltip mano" title="No ha aceptado <br/>solicitud de proyecto"></i>
									</div>
									<?php if( !$proyecto['Proyecto']['bloqueado'] and (!$autor['activo']) ): ?>
										<?php //if( !$proyecto['Proyecto']['bloqueado'] and (!$autor['activo'] or $userInfo['id']==$autor['Usuario']['id']) ): ?>
										<?php echo $this->Form->postLink('<i class="fa fa-times-circle"></i>', array('controller'=>'autors','action' => 'delete',$autor['id']), array('class'=>'text-danger close','title'=>'Eliminar','escape'=>false), __('¿Esta seguro que desea eliminar este '.$autor['TipoAutor']['nombre'].' de su Proyecto?')); ?>
									<?php endif; ?>

								</div>

								<?php
									$academico = ( $autor['TipoAutor']['code']=='tutoracad' ? true : $academico );
									$metodologico = ( $autor['TipoAutor']['code']=='tutormetod' ? true : $metodologico );
								?>
							<?php endif;?>
						<?php endforeach; ?>
					</div>

					<?php if(!$proyecto['Proyecto']['bloqueado']): ?>
						<div class="box-footer">
							<?php if(!$academico): ?>
								<button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="tutoracad" title="Agregar Tutor Académico"><i class="fa fa-plus"></i> Académico</button>
							<?php endif; ?>

							<?php if(!$metodologico): ?>
								<button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="tutormetod" title="Agregar Tutor Metodológico"><i class="fa fa-plus"></i> Metodológico</button>
							<?php endif; ?>

						</div>
					<?php endif; ?>

				</div>

			<?php // ----------------- DATOS ESCENARIO ------------------- ?>
				<?php if($mod_activo['proyecto.escenarios']){ ?>
					<div class="box <?php echo $classActivo;?>">
						<div class="box-header">
							<h3 class="box-title">Escenario</h3>
						</div>
						<div class="box-body">
							<?php if($proyecto['Escenario']['id'] != null){ ?>
								<?php echo '<strong>Nombre: </strong>'.$proyecto['Escenario']['nombre'] ?><br/>
								<?php echo '<strong>Dirección: </strong>'.$proyecto['Escenario']['direccion'] ?><br/>
								<?php echo '<strong>Contacto: </strong>'.$proyecto['Escenario']['persona'] ?><br/>
								<?php echo '<strong>Telefono: </strong>'.$proyecto['Escenario']['telefono'] ?><br/>
								<?php echo '<strong>Carta de Aceptación: </strong>'. ($proyecto['Escenario']['carta_aceptacion'] ? 'Si' : 'No' ); ?><br/>
								<?php echo '<strong>Carta de Implementación: </strong>'. ($proyecto['Escenario']['carta_implementacion'] ? 'Si' : 'No' ); ?><br/>
							<?php }else{
									echo '<p>Sin Escenario de Proyecto</p>';
							} ?>
						</div>
						<?php if(!$proyecto['Proyecto']['bloqueado']): ?>
							<div class="box-footer">
								<?php
									echo $this->Html->link('<i class="fa fa-plus"></i> '.__('Escenario'),array('action'=>'escenario_edit',$proyecto['Proyecto']['id']),array('class'=>'btn btn-default btn-xs btn-tooltip','title'=>'Agregar Escenario','escape'=>false)); ?>
							</div>
						<?php endif; ?>
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
											array('controller'=>'proyectos','action'=>'printPdf',$proyecto['Proyecto']['id'],'admin'=>false),
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

	<?php // ----------------- MODAL AGREGAR AUTOR ------------------- ?>
		<?php if(!$proyecto['Proyecto']['bloqueado']): ?>
				<div class="modal fade" id="addAutor" tabindex="-1" role="dialog" aria-labelledby="addAutor" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h4 class="modal-title" id="addAutorLabel">Agregar ...</h4>
				      </div>
				      <div id="modal-content" class="modal-body">
				      		Cargando...
				          <?php // echo $this->Form->input('usuarios',array('empty'=>'-- seleccione --')); ?>
				      </div>
				      <div class="modal-footer">
								<?php echo $this->Form->button('Cerrar',array('class'=>'btn btn-default pull-left','type'=>'button','data-dismiss'=>'modal')); ?>
				        <?php // echo $this->Form->button('Guardar',array('class'=>'btn btn-primary','type'=>'submit')); ?>
				      </div>
				    </div>
				  </div>
				</div>

				<?php $this->Html->scriptStart(array('inline' => false)); ?>
					$('#addAutor').on('show.bs.modal', function (event){
						var button = $(event.relatedTarget); // Button that triggered the modal
						var recipient = button.data('whatever'); // Extract info from data-* attributes
						var modal = $(this);
						$.ajax({
							url: '<?php echo $this->Html->url(array('controller'=>'autors','action'=>'add'))?>',
							type: 'get',
							data: {tipoAutor: recipient, proyecto_id: '<?php echo $proyecto['Proyecto']['id']?>'},
							dataType: 'html',
							beforeSend: function(){
								modal.find('#modal-content').html('<i class="fa fa-refresh fa-spin"></i> Cargando Formulario...');
								modal.find('.modal-title').text('Agregar ...');
							},
							complete: function(msg){
								modal.find('#modal-content').html(msg.responseText);
								titulo = modal.find('#modal-content').find('#tipoAutorNombre').val();
								modal.find('.modal-title').text('Agregar ' + titulo);
							}
						});
					});
				<?php $this->Html->scriptEnd(); ?>
		<?php endif; ?>

	<?php // ----------------- Enlaces EXTERNOS ------------------- ?>
		<?php echo $this->Html->css('/libs/jquery-file-upload/css/jquery.fileupload',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-file-upload/js/vendor/jquery.ui.widget',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-file-upload/js/jquery.fileupload.js',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-autosize/dist/autosize.min',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/jquery-form/jquery.form',array('inline'=>false)); ?>
		<?php echo $this->Html->script('/libs/mixitup/build/jquery.mixitup.min', array('inline'=>false)); ?>

	<?php // ----------------- JavaScript ------------------- ?>
		<?php $this->Html->scriptStart(array('inline' => false)); ?>

			$('.proyecto-modal-link').modalLink('#generalModal');

			<?php // ----------------- user_popover ------------------- ?>
				//user_popover();
				$('.btn-perfil').popoverPerfil();


			<?php // ----------------- SCRIPTS TABs ------------------- ?>

			var overlay_wrapper = '<div class="wrapper"><i class="fa fa-refresh fa-spin"></i> Cargando</div>';

			<?php // ----------------- Cargar Comentarios ------------------- ?>
				$('.box-body .btn-tab-coment').on('shown.bs.tab', function(event) {
					cargarComentarios(event);
					// e.target // newly activated tab
					// e.relatedTarget // previous active tab
				});

				function cargarComentarios(event){
					$.ajax({
						url: "<?php echo $this->Html->url(array('controller'=>'comentarios','action'=>'index','admin'=>false,$proyecto['Proyecto']['id']));?>",
						dataType: 'html',
						beforeSend: function(){
							//$('#tab-coment').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
							$('#tab-coment.proyecto_overlay').append(overlay_wrapper);
						},
						complete: function(msg){
							$('#tab-coment').html(msg.responseText);
							//autosize($('#tab-coment .tab-timeline textarea'));
						}
					});
				}

			<?php // ----------------- Cargar Archivos ------------------- ?>
				$('.box-body a.btn-tab-archivos').on('shown.bs.tab', function (event) {
					cargarArchivos(event);
				});

				function cargarArchivos(event){
					$.ajax({
						url: "<?php echo $this->Html->url(array('controller'=>'archivos','action'=>'index','admin'=>false,$proyecto['Proyecto']['id'])); ?>",
						dataType: 'html',
						beforeSend: function(){
							//$('#tab-archivos').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
							$('#tab-archivos.proyecto_overlay').append(overlay_wrapper);
						},
						complete: function(msg){
							$('#tab-archivos').html(msg.responseText);
						}
					});
				}

			<?php // ----------------- Cargar Metas ------------------- ?>
				$('.box-body a.btn-tab-metas').on('shown.bs.tab', function(event) {
					cargarMetas(event);
				});

				function cargarMetas(event){
					$content = $('#tab-metas');
					$.ajax({
						url: "<?php echo $this->Html->url(array('controller'=>'metas','action'=>'index','admin'=>false,$proyecto['Proyecto']['id']));?>",
						dataType: 'html',
						beforeSend: function(){
							//$content.html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
							$('#tab-metas.proyecto_overlay').append(overlay_wrapper);
						},
						complete: function(msg){
							$content.html(msg.responseText);
						}
					});
				}

			<?php // ----------------- Cargar Asuntos ------------------- ?>
				$('.box-body a.btn-tab-asuntos').on('shown.bs.tab', function(event) {
					cargarAsuntos(event);
				});

				function cargarAsuntos(event){
					$content = $('#tab-asuntos');
					$.ajax({
						url: "<?php echo $this->Html->url(array('controller'=>'asuntos','action'=>'index','admin'=>false,$proyecto['Proyecto']['id']));?>",
						dataType: 'html',
						beforeSend: function(){
							//$content.html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
							$('#tab-asuntos.proyecto_overlay').append(overlay_wrapper);
						},
						complete: function(msg){
							$content.html(msg.responseText);
						}
					});
				}

			<?php // ----------------- Cargar Jurados ------------------- ?>
				$('.box-body a.btn-tab-jurados').on('shown.bs.tab', function (e) {

					$.ajax({
						url: "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'view_jurados','admin'=>false,$proyecto['Proyecto']['id']));?>",
						dataType: 'html',
						beforeSend: function(){
							//$('#tab-jurados').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
							$('#tab-jurados.proyecto_overlay').append(overlay_wrapper);
						},
						complete: function(msg){
							$('#tab-jurados').html(msg.responseText);
						}
					});
					// e.target // newly activated tab
					// e.relatedTarget // previous active tab
				});

		<?php $this->Html->scriptEnd(); ?>

</section><!-- /.content -->
