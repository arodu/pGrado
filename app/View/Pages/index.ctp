
<?php
	$sistemaInfo = Configure::read('sistema.info');
	echo $this->element('commons/header_view', array(
		'title'=>$sistemaInfo['nombre'],
		'subtitle'=>$sistemaInfo['descripcion'],
		'breadcrumb'=>array()
	));
?>

<?php $descargas = Configure::read('sistema.descargas'); ?>
<?php $contactos = Configure::read('sistema.contactos'); ?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-md-8 col-sm-6 col-xs-12">

			<div class="row">

				<div class="col-xs-12">


					<?php if(!$this->request->is('mobile')){ ?>

						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
								<li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
							</ol>
							<div class="carousel-inner">
								<div class="item">
									<?php echo $this->Html->image('example_carrousel_1.png'); ?>
									<div class="carousel-caption">
										First Slide
									</div>
								</div>
								<div class="item active">
									<?php echo $this->Html->image('example_carrousel_2.png'); ?>
									<div class="carousel-caption">
										Second Slide
									</div>
								</div>
								<div class="item">
									<?php echo $this->Html->image('example_carrousel_3.png'); ?>
									<div class="carousel-caption">
										Third Slide
									</div>
								</div>
							</div>
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
								<span class="fa fa-angle-left"></span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
								<span class="fa fa-angle-right"></span>
							</a>
						</div>

					<?php }else{ ?>
						<?php echo $this->Html->image('example_carrousel_min.png'); ?>
						<?php } ?>

		      	</div>
			</div>

			<br/>

			<div class="row">

				<div class="col-xs-12 col-md-4">
					<a class="info-box bg-teal" href="<?php echo $this->Html->url(array('controller'=>'proyectos', 'action'=>'index'));?>">
						<span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">&nbsp;</span>
							<span class="info-box-number">Mis<br/>Proyectos</span>
						</div>
						<!-- /.info-box-content -->
					</a>
					<!-- /.info-box -->
				</div>

				<div class="col-xs-12 col-md-4">
					<a class="info-box bg-green" href="<?php echo $this->Html->url(array('controller'=>'descargas', 'action'=>'index'));?>">
						<span class="info-box-icon"><i class="fa fa-download"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">&nbsp;</span>
							<span class="info-box-number">Descargas</span>
						</div>
						<!-- /.info-box-content -->
					</a>
					<!-- /.info-box -->
				</div>

				<div class="col-xs-12 col-md-4">
					<a class="info-box bg-blue" href="#">
						<span class="info-box-icon"><i class="fa fa-question"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">&nbsp;</span>
							<span class="info-box-number">Ayuda</span>
						</div>
						<!-- /.info-box-content -->
					</a>
					<!-- /.info-box -->
				</div>

			</div>

		</div>

		<?php if(!$this->request->is('mobile')){ ?>
			<div class="col-md-4 col-sm-6 col-xs-12 text-right">
				<?php if($mod_activo['external.facebook_page'] && !$mod_activo['external.twitter_timeline']){ echo $this->element('external/facebook_page'); } ?>
				<?php if($mod_activo['external.twitter_timeline'] && !$mod_activo['external.facebook_page']){ echo $this->element('external/twitter_timeline'); }?>
			</div>
		<?php } ?>

	</div>
</section>
