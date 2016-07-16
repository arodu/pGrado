<?php // ----------------- PRECONDICIONES ------------------- ?>
	<?php
		$classActivo = '';
		$icoplus = '<i class="fa fa-plus"></i>&nbsp;';

		if($proyecto['Proyecto']['activo']){
			$classActivo = ' box-primary box-solid';
		}

		if(isset($adminView) && $adminView){
			$classActivo = 'box-warning';
			// echo $this->element('call/warning',array('titulo'=>'Vista Administrativa'));
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
	<?php
		$this->assign('title-page', 'Proyecto <small>Ver Proyecto</small>');

		$bc = array(
			'items'=>array(
					0 => array('title'=>'Proyectos','url'=>'/proyectos/index'),
				),
			'config'=>array('activo'=>'Ver Proyecto')
			);
		$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
	?>


<?php // ----------------- PANEL COORDINADOR ------------------- ?>
	<?php if(isset($adminView) && $adminView && isset($userInfo['perfil']['coordpg']) && $userInfo['perfil']['coordpg']){ ?>
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Panel Coordinador</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div style="display: block;" class="box-body">
				<?php echo $this->Html->link('Editar Proyecto',array('controller'=>'proyectos','action'=>'edit','admin'=>true,$proyecto['Proyecto']['id']),array('class'=>'btn btn-default btn-flat','escape'=>false)); ?>
				<?php echo $this->Html->link('Asignar Jurados',array('controller'=>'proyectos','action'=>'asignacion_jurados','admin'=>true,$proyecto['Proyecto']['id']),array('class'=>'btn btn-default btn-flat','escape'=>false)); ?>


				<div class="btn-group">
					<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
					</ul>
				</div>



			</div><!-- /.box-body -->
		</div>
	<?php } ?>

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
						<?php // ----------------- BOTON TAB 1 ------------------- ?>
							<li role="presentation" class="active">
								<a href="#tab-info" data-toggle="tab">
									<i class="fa fa-th-list"></i><span class="hidden-sm">&nbsp;Información</span>
								</a>
							</li>

						<?php // ----------------- BOTON TAB 2 ------------------- ?>
							<?php if($mod_activo['proyecto.archivos']){ ?>
								<li role="presentation">
									<a href="#tab-archivos" class="btn-tab-archivos" data-toggle="tab">
										<i class="fa fa-files-o"></i>
										<span class="hidden-sm">&nbsp;<?php echo __('Archivos'); ?>
											&nbsp;&nbsp;<span class="cant-archivos badge bg-blue"><?php echo $cant_archivos;?></span>
										</span>
									</a>
								</li>
							<?php } ?>

						<?php // ----------------- BOTON TAB 3 ------------------- ?>
							<?php if($mod_activo['proyecto.comentarios']){ ?>
								<li role="presentation">
									<a href="#tab-coment" class="btn-tab-coment" data-toggle="tab">
										<i class="fa fa-quote-left"></i>
										<span class="hidden-sm">&nbsp;<?php echo __('Comentarios'); ?></span>
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
									<a href="#tab-metas" class="btn-tab-metas" data-toggle="tab">
										<i class="fa fa-clock-o"></i>
										<span class="hidden-sm">&nbsp;<?php echo __('Metas'); ?>
										</span>
									</a>
								</li>
							<?php } ?>

						<?php // ----------------- BOTON TAB 5 ------------------- ?>
							<?php if($mod_activo['proyecto.asuntos']){ ?>
								<li role="presentation" class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
										<i class="fa fa-exclamation-circle"></i>
										<span class="hidden-sm">&nbsp;Asuntos</span>
										<!-- <i class="fa fa-caret-down fa-fw"></i>-->
									</a>
									<ul class="dropdown-menu" role="menu">
										<li><a id="asuntos-all" class="btn-tab-asuntos" href="#tab-asuntos" data-toggle="tab"><i class="fa fa-arrow-circle-down"></i>Todos</a></li>
										<li class="divider"></li>
										<li>
											<a id="asuntos-open" class="btn-tab-asuntos" href="#tab-asuntos" data-toggle="tab">
												<i class="fa fa-exclamation-circle"></i>Abiertos
												&nbsp;&nbsp;<span class="cant-metas badge bg-blue"><?php echo 0;?></span>
											</a>
										</li>
										<li>
											<a id="asuntos-close" class="btn-tab-asuntos" href="#tab-asuntos" data-toggle="tab">
												<i class="fa fa-check-circle"></i>Cerrados
												&nbsp;&nbsp;<span class="cant-metas badge bg-blue"><?php echo 0;?></span>
											</a>
										</li>
									</ul>
								</li>
							<?php } ?>

						<?php // ----------------- BOTON TAB 6 ------------------- ?>
							<?php if($mod_activo['proyecto.jurados']){ ?>
								<li role="presentation">
									<a class="btn-tab-jurados" href="#tab-jurados" data-toggle="tab"><i class="fa fa-legal">
										</i><span class="hidden-sm">&nbsp;Jurados</span>
									</a>
								</li>
							<?php } ?>
					</ul>

					<div class="tab-content">

						<?php // ----------------- TAB 1 ------------------- ?>
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

							</div>

						<?php // ----------------- TAB 2 ------------------- ?>
							<div id="tab-archivos" class="tab-pane fade border-radious proyecto_archivos">
								<i class="fa fa-refresh fa-spin"></i> Cargando...
							</div>

						<?php // ----------------- TAB 3 ------------------- ?>
							<div id="tab-coment" class="tab-pane fade border-radious proyecto_comentarios">
								<!-- <i class="fa fa-refresh fa-spin"></i> Cargando... -->
							</div>

						<?php // ----------------- TAB 4 ------------------- ?>
							<div id="tab-metas" class="tab-pane fade border-radious  proyecto_metas">
								<i class="fa fa-refresh fa-spin"></i> Cargando...
							</div>

						<?php // ----------------- TAB 5 ------------------- ?>
							<div id="tab-asuntos" class="tab-pane fade border-radious  proyecto_asuntos">
								<i class="fa fa-refresh fa-spin"></i> Cargando...
							</div>

						<?php // ----------------- TAB 6 ------------------- ?>
							<div id="tab-jurados" class="tab-pane fade border-radious  proyecto_jurados">
								<i class="fa fa-refresh fa-spin"></i> Cargando...
							</div>

					</div>
				</div>

			<?php // ----------------- BOX FOOTER ------------------- ?>
				<div class="box-footer">
					<?php
						$disabled = ( $revisionEditable ? false : 'disabled' );

						if($mod_activo['proyecto.revisions']){
							echo $this->Html->link('<i class="fa fa-edit"></i>&nbsp;Editar Revision',
									array('controller'=>'revisions','action' => 'edit', $revision['id']),
									array('class'=>'btn btn-primary','disabled'=>$disabled,'escape'=>false)
								);
							echo '&nbsp;';

							/* Botones de VER REVISINES Y VERSION PARA IMPRIMIR */
							echo $this->Html->link('<i class="fa fa-code-fork"></i>&nbsp;Ver Revisiones',
									array('controller'=>'revisions','action' => 'index',$proyecto['Proyecto']['id']),
									array('class'=>'btn btn-default','disabled'=>$disabled,'escape'=>false)
								);
						}

						if($mod_activo['proyecto.imprimir']){
							echo '&nbsp;';
							echo $this->Html->link('<i class="fa fa-print fa-fw"></i> Imprimir Planillas', '#',
								array('class'=>'btn btn-default','disabled'=>$disabled,'escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#planillasModal')
							);
						}
					?>
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
							array('class'=>'btn btn-default btn-xs btn-tooltip','disabled'=>$disabled,'escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#planillasModal', 'title'=>'Imprimir Planillas')
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
					<ul class="products-list product-list-in-box">
						<?php
							foreach ($proyecto['Autor'] as $autor) {
								if($autor['TipoAutor']['code'] == 'estudiante'){

									$aux = ( $autor['activo'] ? '' : 'text-muted' );
									$btn_perfil = ( $autor['activo'] ? 'btn-perfil' : '' );

									echo '<li class="item">';
										echo '<div class="product-img">';
											$user_imagen = $this->element('usuario/avatarXS',array('foto' => $autor['Usuario']['foto']));

											echo $this->Html->image($user_imagen,array('class'=>'img-circle '.$btn_perfil,'data-id' => $autor['Usuario']['id'] ));

										echo '</div>';

										echo '<div class="product-info">';
											echo '<span class="product-title '.$aux.'">';
												echo $autor['Usuario']['nombre_completo'];
												//<!-- <span class="label label-warning pull-right">$1800</span> -->
												//echo '<a class="close"><i class="fa fa-times"></i></a>';

												if(!$autor['activo']){
													if($proyectoEditable){
														echo $this->Form->postLink('<i class="fa fa-times-circle"></i>', array('controller'=>'autors','action' => 'delete',$autor['id']), array('class'=>'text-danger close','title'=>'Eliminar','escape'=>false), __('¿Esta seguro que desea eliminar este '.$autor['TipoAutor']['nombre'].' de su Proyecto?'));
													}
												}

											echo '</span>';
											echo '<span class="product-description ">';
												//echo $autor['TipoAutor']['nombre'];
												echo $autor['Usuario']['cedula'];
												$inactivo = '
													<spam class="mano btn-tooltip" title="No ha aceptado <br/>solicitud de proyecto">
														<span class="label bg-yellow">Inactivo</span>
													</spam>';
												echo ( $autor['activo'] ? '' : $inactivo );

											echo '</span>';
										echo '</div>';
									echo '</li>';


									/*
									echo '<span class="'.$aux.'">';

									echo $aux = ( $autor['activo'] ? '' : '<spam class="mano" title="Esperando a que compañero acepte la solicitud del Proyecto"><i class="fa fa-ban"></i></spam> '); ;

									echo $autor['Usuario']['cedula_nombre_completo'];
									echo '</spam>';

									if(!$autor['activo']){
										if($proyectoEditable){
											echo $this->Form->postLink('&nbsp;<i class="fa fa-times-circle"></i>', array('controller'=>'autors','action' => 'delete',$autor['id']), array('class'=>'text-danger','title'=>'Eliminar Estudiante','escape'=>false), __('¿Esta seguro que desea eliminar este '.$autor['TipoAutor']['nombre'].' de su Proyecto?'));
										}
									}
									//debug($autor);

									echo '<br/>'; */
								}
							}
						?>
					</ul>
				</div>

				<?php
					if($proyectoEditable){
						$cant_pos_estudiante = Configure::read('proyectos.cantidad.tipo_autor.estudiante');
						if($cant_pos_estudiante >= 2){ ?>
							<div class="box-footer">
								<button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="estudiante" title="Agregar Compañero"><?php echo $icoplus;?>Compañero</button>
							</div>
				<?php
						}
					}
				?>
			</div>

		<?php // ----------------- DATOS TUTORES ------------------- ?>
			<div id="tutores" class="box <?php echo $classActivo;?>">
				<div class="box-header">
					<h3 class="box-title"><?php echo (($cant_tutores >= 2) ? 'Tutores' : 'Tutor');?></h3>
				</div>
				<div class="box-body">

					<ul class="products-list product-list-in-box">
						<?php
							if($cant_tutores >0){
								foreach ($proyecto['Autor'] as $autor) {
									if($autor['TipoAutor']['code'] != 'estudiante'){
										$aux = ( $autor['activo'] ? '' : 'text-muted' );
										$btn_perfil = ( $autor['activo'] ? 'btn-perfil' : '' );

										echo '<li class="item">';
											echo '<div class="product-img">';
												$user_imagen = $this->element('usuario/avatarXS',array('foto' => $autor['Usuario']['foto']));
												echo $this->Html->image($user_imagen,array('class'=>'img-circle '.$btn_perfil,'data-id' => $autor['Usuario']['id']));
											echo '</div>';

											echo '<div class="product-info">';
												echo '<span class="product-title '.$aux.'">';
													echo $autor['Usuario']['nombre_completo'];
													//<!-- <span class="label label-warning pull-right">$1800</span> -->
													//echo '<a class="close"><i class="fa fa-times"></i></a>';

													if(!$autor['activo']){
														if($proyectoEditable){
															echo $this->Form->postLink('<i class="fa fa-times-circle"></i>', array('controller'=>'autors','action' => 'delete',$autor['id']), array('class'=>'text-danger close','title'=>'Eliminar','escape'=>false), __('¿Esta seguro que desea eliminar este '.$autor['TipoAutor']['nombre'].' de su Proyecto?'));
														}
													}

												echo '</span>';
												echo '<span class="product-description '.$aux.'">';
													echo $autor['TipoAutor']['nombre'];
													$inactivo = '
														<spam class="mano btn-tooltip" title="No ha aceptado<br/>solicitud de proyecto">
															<i class="fa fa-ban text-yellow"></i>
														</spam>';
												echo ( $autor['activo'] ? '' : $inactivo );

												echo '</span>';
											echo '</div>';
										echo '</li>';
									}
								}
							}else{
								echo '<span class="text-muted"><small>N/A</small></span>';
							}
						?>
					</ul>

				</div>
				<?php if($proyectoEditable){ ?>
					<div class="box-footer">
						<button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="tutoracad" title="Agregar Tutor Académico"><?php echo $icoplus;?>Académico</button>
						<button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="tutormetod" title="Agregar Tutor Metodológico"><?php echo $icoplus;?>Metodológico</button>
					</div>
				<?php } ?>
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
					<?php if($proyectoEditable){ ?>
						<div class="box-footer">
							<?php
								echo $this->Html->link($icoplus.'Escenario',array('action'=>'escenarioEdit',$proyecto['Proyecto']['id']),array('class'=>'btn btn-default btn-xs btn-tooltip','title'=>'Agregar Escenario','escape'=>false)); ?>
						</div>
					<?php } ?>
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
			<?php if($proyectoEditable){ ?>
				<div class="box box-danger collapsed-box">
					<div class="box-header">
						<h3 class="box-title">Eliminar Proyecto</h3>
						<!--<div class="box-tools pull-right">
							<button data-original-title="Eliminar Proyecto" class="btn btn-danger btn-xs" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-chevron-down"></i></button>
						</div> -->
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div>
						</div>
					<div class="box-body bg-danger">
						<p class="text-justify">Si elimina el proyecto no podra volver a recuperar los datos, antes de seleccionar esta opcion primero este seguro que desea hacerlo.
						</p>
					</div>
					<div class="box-footer">
						<?php echo $this->Form->postLink(__('<i class="fa fa-trash fa-fw"></i> Eliminar Proyecto'), array('action' => 'delete', $proyecto['Proyecto']['id']), array('class'=>'btn btn-danger btn-xs','escape'=>false), __('¿Esta seguro que desea realizar esta acción?', $proyecto['Proyecto']['id'])); ?>
					</div>
				</div>
			<?php } ?>
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
	<?php if($proyectoEditable){ ?>
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
	<?php } ?>

<?php // ----------------- Enlaces EXTERNOS ------------------- ?>
	<?php echo $this->Html->css('/libs/jquery-file-upload/css/jquery.fileupload',array('inline'=>false)); ?>
	<?php echo $this->Html->script('/libs/jquery-file-upload/js/vendor/jquery.ui.widget',array('inline'=>false)); ?>
	<?php echo $this->Html->script('/libs/jquery-file-upload/js/jquery.fileupload.js',array('inline'=>false)); ?>
	<?php echo $this->Html->script('/libs/jquery-autosize/dist/autosize.min',array('inline'=>false)); ?>

<?php // ----------------- JavaScript ------------------- ?>
	<?php $this->Html->scriptStart(array('inline' => false)); ?>


		<?php // ----------------- user_popover ------------------- ?>
			//user_popover();
			$('.btn-perfil').popoverPerfil();


		<?php // ----------------- SCRIPTS TABs ------------------- ?>

			<?php // ----------------- Cargar Comentarios ------------------- ?>
				$('.box-body .btn-tab-coment').on('shown.bs.tab', function (e) {
					cargarComentarios();
					// e.target // newly activated tab
					// e.relatedTarget // previous active tab
				});

				function cargarComentarios(){
					$.ajax({
						url: "<?php echo $this->Html->url(array('controller'=>'comentarios','action'=>'index','admin'=>false,$proyecto['Proyecto']['id']));?>",
						dataType: 'html',
						beforeSend: function(){
							//$('#tab-coment').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
							$('#tab-coment').append('<div class="commemt_overlay"><i class="fa fa-refresh fa-spin"></i> Cargando...</div>');
						},
						complete: function(msg){
							$('#tab-coment').html(msg.responseText);
							//autosize($('#tab-coment .tab-timeline textarea'));
							//$('#tab-coment').removeClass('overlay');
						}
					});
				}

			$('.box-body a.btn-tab-archivos').on('shown.bs.tab', function (e) {

				$.ajax({
					url: "<?php echo $this->Html->url(array('controller'=>'archivos','action'=>'index','admin'=>false,$proyecto['Proyecto']['id']));?>",
					dataType: 'html',
					beforeSend: function(){
						$('#tab-archivos').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
					},
					complete: function(msg){
						$('#tab-archivos').html(msg.responseText);
					}
				});

				// e.target // newly activated tab
				// e.relatedTarget // previous active tab
			});

			$('.box-body a.btn-tab-metas').on('shown.bs.tab', function (e) {
				$content = $('#tab-metas');
				$.ajax({
					url: "<?php echo $this->Html->url(array('controller'=>'metas','action'=>'index','admin'=>false,$proyecto['Proyecto']['id']));?>",
					dataType: 'html',
					beforeSend: function(){
						$content.html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
					},
					complete: function(msg){
						$content.html(msg.responseText);
					}
				});
			});

			$('.box-body a.btn-tab-jurados').on('shown.bs.tab', function (e) {

				$.ajax({
					url: "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'view_jurados','admin'=>false,$proyecto['Proyecto']['id']));?>",
					dataType: 'html',
					beforeSend: function(){
						$('#tab-jurados').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
					},
					complete: function(msg){
						$('#tab-jurados').html(msg.responseText);
					}
				});

				// e.target // newly activated tab
				// e.relatedTarget // previous active tab

			});

	<?php $this->Html->scriptEnd(); ?>
