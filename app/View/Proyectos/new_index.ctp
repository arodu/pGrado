<?php

	$this->assign('title-page', 'Proyectos <small>Indice</small>');

	$bc = array('config'=>array('activo'=>'Proyectos'));

	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));	
?>

<?php /*

<div class="box box-primary">
	<div class="box-header with-border">
		<?php if($this->params['action'] == 'index' && $userInfo['perfil']['estudiante']){  ?>
			<?php echo $this->Html->link('<i class="fa fa-plus"></i> Agregar Nueva Propuesta',array('controller'=>'proyectos','action'=>'add'),array('class'=>'btn btn-sm btn-primary','escape'=>false));?>
		<?php } ?>

		<?php if($this->params['action'] != 'index' && ( $userInfo['perfil']['tutoracad'] || $userInfo['perfil']['tutormetod'])){  ?>
			<h4>&nbsp;</h4>

			<div class="box-tools pull-right">
				<div class="has-feedback">
					<input class="form-control input-sm" placeholder="Buscar..." type="search">
					<span class="fa fa-search form-control-feedback text-muted"></span>
				</div>
			</div>

		<?php } ?>
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

*/?>

<?php //----------------------------------------------------------------------  ?>
<?php
	
	
	$ele_x_col = round(count($proyectos)/3);
	// debug($ele_x_col);

	$current_ele = 1;
?>


<div class="row">
	<div class="col-md-4">

		<?php foreach ($proyectos as $proyecto) : ?>

			

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

			<div class="box box-primary">
				<div class="box-header">
					<span class="badge"><?php echo 'P'.$proyecto['Proyecto']['id']; ?></span>

					<div class="box-tools pull-right">
						<span class="label label-default"><?php echo $proyecto['Fase']['nombre'];?></span>
						<span class="label label-default"><?php echo $proyecto['Estado']['nombre'];?></span>
					</div>
				</div>
				<div class="box-body">
					<div class="team-members container-fluid">
						<div class="row">

							<?php $collUser = 'collapseUsuarios'.$proyecto['Proyecto']['id']; ?>

							<a class="btn-collapse" href="<?php echo '#'.$collUser;?>">
  	
								<?php /**/
									foreach ($proyecto['Autor'] as $autor) {
										if($autor['TipoAutor']['code'] == 'estudiante'){

												$user_imagen = $this->General->userFoto('xs',$autor['Usuario']['id']);

												echo $this->Html->image($user_imagen,array(
													'class'=>'img-circle img-usuario img-estudiante',
													'title'=>$autor['Usuario']['cedula_nombre_completo'],
													'width'=>'42','height'=>'42'
												));

										}elseif($autor['TipoAutor']['code'] == 'tutoracad'){
											
												$user_imagen = $this->General->userFoto('xs',$autor['Usuario']['id']);

												echo $this->Html->image($user_imagen,array(
													'class'=>'img-circle img-usuario img-tutor',
													'title'=>'('.$autor['TipoAutor']['nombre'].') '.
														$autor['Usuario']['nombre_completo'],
													'width'=>'42','height'=>'42'
												));

										}
									} /**/
								?>
							</a>
						</div>

						<div class="collapse" id="<?php echo $collUser;?>">
							<div class="">
		    					<?php /**/
									foreach ($proyecto['Autor'] as $autor) {
										if($autor['TipoAutor']['code'] == 'estudiante'){
											echo $autor['Usuario']['cedula_nombre_completo'].'<br/>';

										}elseif($autor['TipoAutor']['code'] == 'tutoracad'){
											echo $autor['Usuario']['nombre_completo'].' ('.$autor['TipoAutor']['nombre'].')'.'<br/>';
										}
									} /**/
								?>
							</div>
						</div>
					</div>
					<strong><?php echo __('Categoria').': </strong>'.$proyecto['Categoria']['nombre'];?>
					<p class="text-justify">
						<?php
							$proyecto_titulo =  strip_tags($proyecto['Revision'][0]['titulo']);
							echo $proyecto_titulo;
						?>
					</p>

					<div>
						<span>Estado actual del Proyecto:</span>
						<span class="stat-percent pull-right">48%</span>
						<div class="progress progress-xxs">
							<div style="width: 48%;" class=" progress-bar"></div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<div class="font-bold"><strong><?php echo __('Programa').':';?></strong></div>
							<?php echo $proyecto['Programa']['nombre'];?>
						</div>
						<div class="col-xs-6">
							<div class="font-bold"><strong><?php echo __('Grupo').':';?></strong></div>
							<?php echo $proyecto['Grupo']['nombre'];?>
						</div>

						<!-- <div class="col-sm-4 text-right">
							<div class="font-bold">BUDGET</div>
							$200,913 <i class="fa fa-level-up text-navy"></i>
						</div> -->
					</div> 
				</div>

				<div class="box-footer text-center">

					<?php 
						if($autor_activo==false){
									
						}else{
							echo $this->Html->link('<strong>Ir al Proyecto <i class="fa fa-chevron-circle-right fa-fw"></i></strong>', array('action' => 'view', $proyecto['Proyecto']['id']),array('escape'=>false));
						}
					?>
				</div>
			</div>

			<?php
				$current_ele++;
				if($current_ele >= $ele_x_col ){
					echo '</div><div class="col-md-4">';
					$current_ele = 1;
				}
			?>

		<?php endforeach; ?>

	</div>

</div>


<style type="text/css">
	
	.img-usuario{
		margin-right: 4px;
	}

	.img-usuario.img-tutor{
		border: 2px solid #3c8dbc;
	}

	.img-usuario.img-estudiante{
		border: 2px solid #d2d6de;
	}
</style>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(function(){
		// $('.img-usuario').tooltip({ placement: 'right' });

		// $('.btn-collapse').collapse({ trigger: "hover" });

		$( ".btn-collapse" )
			.mouseenter(function(){
				$( $(this).attr('href') ).collapse('show');
			})
			.mouseleave(function(){
				$( $(this).attr('href') ).collapse('hide');
			})
			.click(function(){
				$( $(this).attr('href') ).collapse('toggle');
				return false;
			});
	});

<?php $this->Html->scriptEnd(); ?>