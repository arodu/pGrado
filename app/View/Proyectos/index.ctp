<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Proyectos <small>Indice</small></h1>
	<?php echo $this->General->breadcrumb(array(
		__('Proyectos')=>true,
	)); ?>
</section>

<!-- Main content -->
<section class="content proyectos index">
	<?php echo $this->Flash->render(); ?>

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
			<?php
				if(count($proyectos) > 0){
					foreach ($proyectos as $proyecto){
						echo $this->element('entity/proyecto', array('proyecto'=>$proyecto));
					}
				}else{
					echo $this->element('callout/gray',array('titulo'=>'No se encontraron Propuestas o Proyectos','mensaje'=>'Presione en "Agregar Nueva Propuesta", o espere a que algún estudiante le solicite formar parte de su propuesta o proyecto.'));
				}
			?>
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


</section><!-- /.content -->
