<?php
  //$checkbox = true;
	//$progreso = 100;
	//$proyecto['Proyecto']['bloqueado'] = true;
	//$proyecto['Proyecto']['activo'] = true;
  //$autor_id = 1;
?>
<?php
  // Buscar si el autor se encuentra activo en el proyecto que se este revisando en ese momento
  $user_activo = false;
  foreach ($proyecto['Autor'] as $autor) {
    if($autor['usuario_id'] == $userInfo['id']){
      $user_activo = $autor['activo'];
      $autor_id = $autor['id'];
      if($user_activo == false){
        $tipo_solicitud = ( ($autor['TipoAutor']['code'] == 'estudiante') ? 'Coautor' : $autor['TipoAutor']['nombre'] );
      }
    }
  }

  $checkbox = (isset($checkbox) ? $checkbox : false);
	$progreso = (isset($progreso) ? $progreso : false);
?>
<?php
	$class = ($proyecto['Proyecto']['activo'] ? 'blue' : '');
  $class = ($user_activo ? $class : 'yellow');
  $class = (!$proyecto['Proyecto']['bloqueado'] ? $class : 'red');
?>
<div class="item-proyecto callout callout-gray <?php echo $class?>">
	<div class="row">

		<?php if(!$user_activo): ?>
			<div class="col-md-3 controles">
				<div class="well well-sm text-justify">
          Le han solicitado ser <em><?php echo $tipo_solicitud ?></em> en este Trabajo de Grado:<br/>
          ¿Aceptar solicitud?
					<div class="btn-group btn-group-justified">
            <?php echo $this->Form->postLink('<strong><i class="fa fa-check fa-fw"></i>SI</strong>', array('controller'=>'autors','action' => 'solicitud', $autor_id,'si'),array('class'=>'btn btn-warning btn-xs','escape'=>false), __('¿Esta seguro que desea Aceptar esta Solicitud?')); ?>
            <?php echo $this->Form->postLink('<strong><i class="fa fa-ban fa-fw"></i>NO</strong>', array('controller'=>'autors','action' => 'solicitud', $autor_id,'no'),array('class'=>'btn btn-default btn-xs','escape'=>false), __('¿Esta seguro que NO desea Aceptar esta Solicitud?')); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="<?php echo ($user_activo ? 'col-md-12' : 'col-md-9') ?>">
			<div class="row">
		    <div class="col-md-12 titulo">
		      <?php
		        if($checkbox){
		          echo '<label for="proyecto_'.$proyecto['Proyecto']['id'].'">';
							echo '<input type="checkbox" id="proyecto_'.$proyecto['Proyecto']['id'].'"/> ';
							echo ( $proyecto['Proyecto']['bloqueado'] ? '<i class="fa fa-fw fa-lock text-danger"></i> ' : '' );
							echo $proyecto['Revision'][0]['titulo'];
							echo '</label>';
		        }else{
							echo ( $proyecto['Proyecto']['bloqueado'] ? '<i class="fa fa-fw fa-lock text-danger"></i> ' : '' );
		          if($user_activo){
		            echo $this->Html->link('<i class="fa fa-play-circle"></i> '.$proyecto['Revision'][0]['titulo'], array('controller'=>'proyectos', 'action'=>'view', $proyecto['Proyecto']['id']), array('escape'=>false));
		          }else{
		            echo '<i class="fa fa-pause-circle"></i> '.$proyecto['Revision'][0]['titulo'];
		          }
		        }
		      ?>
		    </div>
		  </div>
		  <div class="row">
				<div class="col-md-3 autors">
          <?php $estudiantes = $this->Custom->getTipoAutor($proyecto['Autor'], 'estudiante'); ?>
					<div class="tipo_autor"><?php echo ( count($estudiantes) > 1 ? 'Autores' : 'Autor'); ?></div>
          <?php foreach ($estudiantes as $estudiante): ?>
            <div><?php echo $estudiante ?></div>
          <?php endforeach; ?>
				</div>
		    <div class="col-md-9 datos">
					<div class="">
						<?php echo ($proyecto['Proyecto']['bloqueado'] ? '<div class="label label-danger">Bloqueado</div>' : '') ?>
						<?php echo ($proyecto['Proyecto']['activo'] ? '<div class="label label-primary">Activo</div>' : '<div class="label label-default">Inactivo</div>') ?>
						<div class="label label-info"><?php echo $proyecto['Fase']['nombre'] ?></div>
						<div class="label label-warning"><?php echo $proyecto['Estado']['nombre'] ?></div>
					</div>
					<em><?php echo $proyecto['Proyecto']['tema'] ?></em>
		      <ul class="list-inline">
		        <li><?php echo $proyecto['Programa']['nombre']; ?></li>
						<li><?php echo $proyecto['Categoria']['nombre'] ?></li>
		        <li><?php echo $proyecto['Grupo']['nombre'] ?></li>
						<li><?php echo $proyecto['Sede']['nombre'] ?></li>
					</ul>
		    </div>
				<div class="row">
          <?php $tutoracad = $this->Custom->getTipoAutor($proyecto['Autor'], 'tutoracad'); ?>
          <?php if(!empty($tutoracad)): ?>
  					<div class="col-md-6 autors">
  						<div><strong>Tutor Académico: </strong><?php echo implode(', ',$tutoracad) ?></div>
  					</div>
          <?php endif; ?>

          <?php $tutormetod = $this->Custom->getTipoAutor($proyecto['Autor'], 'tutormetod'); ?>
          <?php if(!empty($tutormetod)): ?>
  					<div class="col-md-6 autors">
  						<div><strong>Tutor Metodológico: </strong><?php echo implode(', ',$tutormetod) ?></div>
  					</div>
          <?php endif; ?>
				</div>
		  </div>
			<?php if($progreso !== false): ?>
				<div class="row">
					<div class="col-md-12 progreso">
						<div class="value"><?php echo 'Completado '.$progreso.'%' ?></div>
						<div class="progress progress-xs">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $progreso ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progreso.'%' ?>"></div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>


	</div>
</div>
