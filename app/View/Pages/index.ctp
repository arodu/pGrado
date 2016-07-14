<?php
	$sistemaInfo = Configure::read('sistema.info');

	$this->assign('title-page', $sistemaInfo['nombre'].
		' <small>'.$sistemaInfo['descripcion'].', '.
		'<span class="hidden-xs hidden-sm">'.$sistemaInfo['institucion']['largo'].'</span>'.
		'<span class="hidden-md hidden-lg">'.$sistemaInfo['institucion']['corto'].'</span>'.
		'</small>');

	$breadcrumb = '<ol class="breadcrumb"><li class="active"><i class="fa fa-home fa-fw"></i> Inicio</li></ol>';
	$this->assign('breadcrumb', $breadcrumb);
?>


	<?php
		debug($userInfo);

		// echo '<pre>'. print_r (mcrypt_list_algorithms (), TRUE). '</ Pre>';

		//mcrypt_encrypt($algorithm, $key, $cleartext, $mode, $iv);
		//mcrypt_decrypt($algorithm, $key, $ciphertext, $mode, $iv);


		//$foto = $this->General->userFoto('md', 2);
		//echo $foto;
		//echo $this->Html->image($foto);
	?>


	<?php /* if(!$this->request->is('mobile')){ ?>
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!--
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
					<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
					<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
					<li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
				</ol> -->
				<div class="carousel-inner">
					<div class="item active">
						<?php echo $this->Html->image('banner_uno.jpg');?>
						<!-- <div class="carousel-caption">
							1 Slide
						</div> -->
					</div>
					<div class="item">
						<?php echo $this->Html->image('banner_dos.jpg');?>
						<!-- <div class="carousel-caption">
							2 Slide
						</div> -->
					</div>
					<div class="item">
						<?php echo $this->Html->image('banner_tres.jpg');?>
						<!-- <div class="carousel-caption">
							3 Slide
						</div> -->
					</div>
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>

		<hr/>

	<?php } */ // endIf requestMobile?>

<?php $descargas = Configure::read('sistema.descargas'); ?>
<?php $contactos = Configure::read('sistema.contactos'); ?>


<?php	//debug($descargas); ?>

<?php	//debug($contactos); ?>

<div class="row">

	<?php /*

	<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $this->element('small-box/main',array(
					'bg'=>'bg-light-blue',
					'title'=>'facebook',
					'body'=>'Conectate con Nosotros',
					'icon'=>'fa-facebook-square',
					'link'=>array(
							'icon'=>'fa-thumbs-up',
							'label'=>'Me gusta',
							'url'=>$contactos['facebook']['url'],
						)
				)); ?>
	</div>

	<!-- <div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $this->element('small-box/main',array(
					'bg'=>'bg-primary',
					'title'=>'Reglamento',
					'body'=>'Reglamento para la Presentación de Predefensas',
					'icon'=>'fa-legal',
					'link'=>array(
							'icon'=>'fa-download',
							'label'=>'Descargar',
							'url'=>'/descargas/'.$descargas['reglamento_predefensas'],
						)
				)); ?>
	</div> -->


	<!-- <div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $this->element('small-box/main',array(
					'bg'=>'bg-yellow',
					'title'=>'Predefensas 2014-II',
					'body'=>'Cronograma de Predefensas 2014-II',
					'icon'=>'fa-calendar',
					'link'=>array(
							'icon'=>'fa-download',
							'label'=>'Descargar',
							'url'=>'/descargas/'.$descargas['cronograma_20142'],
						)
				)); ?>
	</div> -->

	<div class="col-md-4 col-sm-4 col-xs-12">
			<?php echo $this->element('small-box/main',array(
					'bg'=>'bg-green',
					'title'=>'Ayuda',
					'body'=>'Manual de Ayuda al Usuario',
					'icon'=>'fa-question-circle',
					'link'=>array(
							'icon'=>'fa-download',
							'label'=>'Descargar',
							'url'=>'/descargas/'.$descargas['manual_usuario'],
						)
				)); ?>
	</div> */ ?>


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
				<div class="small-box bg-yellow">
					<div class="inner">
						<h4>Descargas</h4>
						<p>&nbsp;</p>
					</div>
					<div class="icon">
						<i class="fa fa-download"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>


			<div class="col-xs-12 col-md-4">
				<div class="small-box bg-red">
					<div class="inner">
						<h4>53<sup style="font-size: 20px">%</sup></h4>
						<p>Bounce Rate</p>
					</div>
					<div class="icon">
						<i class="fa fa-gears"></i>
					</div>
					<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>

			<div class="col-xs-12 col-md-4">
				<div class="small-box bg-blue">
					<div class="inner">
						<h4>Ayuda</h4>
						<p>Manual de Usuario</p>
					</div>
					<div class="icon">
						<i class="fa fa-question"></i>
					</div>
					<a href="#" class="small-box-footer">Descargar <i class="fa fa-arrow-circle-right"></i></a>
				</div>
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


<?php


	//debug($userInfo);
	//debug($_SESSION);

	//debug($this->params);










?>
