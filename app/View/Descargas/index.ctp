<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Descargas',
		'breadcrumb'=>array(
			__('Descargas')=>true,
		)
	));
?>

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
			      <ul class="nav navbar-nav navbar-right">
							<li><?php echo $this->Permit->link('Administrar', array('controller'=>'descargas', 'action'=>'admin'), array('class'=>'', 'escape'=>false)); ?></li>
			      </ul>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		<?php endif; ?>

	<div class="row">
		<div class="col-md-10">

	    <?php foreach ($etiqueta_descargas as $etiqueta => $descargas): ?>
	  		<div class="formatos box box-default">
	  			<div class="box-header text-justify">
	  				<h3 class="box-title"><?php echo $etiqueta; ?></h3>
	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
	          </div>
	  			</div>
	  			<div class="box-body">
	  				<div class="list-group">
	            <?php foreach ($descargas as $descarga): ?>
	  						<div class="list-group-item">
	  							<div class="row">
	  								<div class="col-xs-8 col-sm-10">
	  									<h4 class="list-group-item-heading"><strong><?php echo $descarga['Descarga']['nombre'];?></strong></h4>
	                    <p><?php echo $descarga['Descarga']['descripcion'];?></p>
	  								</div>
	  								<div class="col-xs-4 col-sm-2 text-center">
	  									<?php
	  										$link = '<i class="fa fa-download fa-2x"></i><br/><small>Descargar</small>';
	  										echo $this->Html->link($link, array('controller'=>'descargas', 'action'=>'download', $descarga['Descarga']['id']),array('escape'=>false, 'target'=>'_blank'));
	  									?>
	  								</div>
	  							</div>
	  						</div>
	  					<?php endforeach; ?>
	  				</div>
	        </div>
	      </div>
	    <?php endforeach; ?>
	  </div>
	</div>

</section>
