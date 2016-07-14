<?php

	$this->assign('title-page', 'Proyectos <small>Indice</small>');

	$bc = array('config'=>array('activo'=>'Proyectos'));

	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
?>



<div class="box box-primary">
	<div class="box-header with-border">
		<?php if($this->params['action'] == 'index' && $userInfo['perfil']['estudiante']){  ?>
			<?php echo $this->Html->link('<i class="fa fa-plus"></i> Agregar Nueva Propuesta',array('controller'=>'proyectos','action'=>'add'),array('class'=>'btn btn-sm btn-primary','escape'=>false));?>
		<?php } ?>

		<?php if($this->params['action'] != 'index' && ( $userInfo['perfil']['tutoracad'] || $userInfo['perfil']['tutormetod'])):  ?>
			<!-- <h4>&nbsp;</h4>

			<div class="box-tools pull-right">
				<div class="has-feedback">
					<input class="form-control input-sm" placeholder="Buscar..." type="search">
					<span class="fa fa-search form-control-feedback text-muted"></span>
				</div>
			</div> -->
		<?php endif; ?>
	</div><!-- /.box-header -->
	<div class="box-body">
		<?php if(count($proyectos) > 0){ ?>
			<?php foreach ($proyectos as $proyecto) { ?>
					<?php
						// Buscar si el autor se encuentra activo en el proyecto que se este revisando en ese momento
						$autor_activo = false;
						foreach ($proyecto['Autor'] as $autor) {
							if($autor['usuario_id'] == $userInfo['id']){

								$autor_activo = $autor['activo'];
								$autor_id = $autor['id'];

								if($autor_activo == false){
									$tipo_solicitud = ( ($autor['TipoAutor']['code'] == 'estudiante') ? 'Coautor' : $autor['TipoAutor']['nombre'] );
								}

							}
						}
					?>
					<div class="callout callout-gray active" style="margin-bottom: 5px;">
							<div class="row">
								<?php
									$class_col = ( $autor_activo == false ? 'col-md-7' : 'col-md-12');
								?>

								<div class="<?php echo $class_col;?>">
									<div class="">

										<div class="text-bold text-justify proyecto_titulo">
											<?php
												$proyecto_titulo =  strip_tags($proyecto['Revision'][0]['titulo']);
												if($autor_activo==false){
													echo $proyecto_titulo;
												}else{
													echo $this->Html->link('<i class="fa fa-chevron-circle-right"></i>&nbsp;'.$proyecto_titulo, array('action' => 'view', $proyecto['Proyecto']['id']),array('escape'=>false));
												}
											?>
										</div>

										<div class="proyecto_datos text">
											<dl class="dl-horizontal">
												<dt>Tema:</dt><dd><?php echo $proyecto['Proyecto']['tema'];?></dd>
												<dt>Linea de Investigación:</dt><dd><?php echo $proyecto['Categoria']['nombre'];?></dd>
												<dt>Autor(es):</dt>
												<dd>
												<?php
													foreach ($proyecto['Autor'] as $autor) {
														if($autor['TipoAutor']['code'] == 'estudiante') echo $autor['Usuario']['cedula_nombre_completo'].'<br/>';
													}
												?>
												</dd>
											</dl>
										</div>

									</div>

									<div class="">
										<div class="label label-default"><?php echo $proyecto['Fase']['nombre'];?></div>
										<div class="label label-default"><?php echo $proyecto['Estado']['nombre'];?></div>

									</div>

								</div>

								<?php if($autor_activo == false) { ?>
									<div class="col-md-5">
										<div class="panel panel-warning">
											<div class="panel-heading text-justify"><?php echo 'Le han solicitado ser '.$tipo_solicitud.' en este Trabajo de Grado'; ?>
											</div>
											<div class="panel-body text-center">
												¿Aceptar Solicitud?
											<?php echo $this->Form->postLink('<strong>Si</strong>', array('controller'=>'autors','action' => 'solicitud',$autor_id,'si'),array('class'=>'btn btn-warning btn-sm','escape'=>false), __('¿Esta seguro que desea Aceptar esta Solicitud?')); ?>
											<?php echo $this->Form->postLink('<strong>No</strong>', array('controller'=>'autors','action' => 'solicitud',$autor_id,'no'),array('class'=>'btn btn-default btn-sm','escape'=>false), __('¿Esta seguro que NO desea Aceptar esta Solicitud?')); ?>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
					</div>
			<?php } // endforeach?>

		<?php }else{ // EndIf

			echo $this->element('callout/gray',array('titulo'=>'No se encontraron Propuestas o Proyectos','mensaje'=>'Presione en "Agregar Nueva Propuesta", o espere a que algún estudiante le solicite formar parte de su propuesta o proyecto.'));

		} // EndIfElse?>

	</div><!-- /.box-body -->
</div>

<?php //debug($proyectos); ?>


<?php /*

	//// BUSQUEDA AVANZADA  //////


<div class="modal fade modal-busqueda-avanzada" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-search"></i> Buscar Proyectos</h4>
			</div>
			<div class="modal-body">
				<p><i class="fa fa-spinner fa-spin"></i> En construccion...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
				<button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

/**/ ?>
