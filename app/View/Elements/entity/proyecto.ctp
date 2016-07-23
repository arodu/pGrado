<?php
  //$checkbox = true;
	//$progress = true;
	//$proyecto['Proyecto']['bloqueado'] = true;
	//$proyecto['Proyecto']['activo'] = true;
?>
<?php
  $user_activo = (isset($user_activo) ? $user_activo : false);
  $checkbox = (isset($checkbox) ? $checkbox : false);
	$progress = (isset($progress) ? $progress : false);
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
				<div class="well well-sm text-justify"><strong>Le han solicitado ser '.$tipo_solicitud.' en este Trabajo de Grado:</strong>
					<div class="btn-group btn-group-justified">
						<a href="#" class="btn btn-warning"><i class="fa fa-check fa-fw"></i>SI</a>
						<a href="#" class="btn btn-default"><i class="fa fa-ban fa-fw"></i>NO</a>
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
					<div class="tipo_autor">Autores</div>
					<div>Estudiante uno</div>
					<div>Estudiante uno</div>
				</div>
		    <div class="col-md-9 datos">
					<div class="">
						<?php echo ($proyecto['Proyecto']['bloqueado'] ? '<div class="label label-default">Bloqueado</div>' : '') ?>
						<?php echo ($proyecto['Proyecto']['activo'] ? '<div class="label label-primary">Activo</div>' : '<div class="label label-default">Inactivo</div>') ?>
						<div class="label label-default"><?php echo $proyecto['Fase']['nombre'] ?></div>
						<div class="label label-default"><?php echo $proyecto['Estado']['nombre'] ?></div>
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
					<div class="col-md-6 autors">
						<div><strong>Tutor Academico: </strong>Alberto Rodriguez</div>
					</div>
					<div class="col-md-6 autors">
						<div><strong>Tutor Metodologico: </strong>Alberto Rodriguez</div>
					</div>
				</div>
		  </div>
			<?php if($progress): ?>
				<div class="row">
					<div class="col-md-12 progreso">
						<div class="value">Completado 60%</div>
						<div class="progress progress-xs">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>


	</div>
</div>
