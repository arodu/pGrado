<?php $sisInfo = Configure::read('sistema.info'); ?>
<?php //header('Content-type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->element('commons/title-tag'); ?></title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<?php
			echo $this->element('commons/meta-tags');
			echo $this->Html->charset('UTF-8');

			echo $this->Html->css('/libs/bootstrap/dist/css/bootstrap.min'); // Bootstrap
			echo $this->Html->css('/libs/font-awesome/css/font-awesome.min'); // Font Awesome Icons
			echo $this->Html->css('/libs/AdminLTE/dist/css/AdminLTE.min'); // AdminLTE.min.css
			echo $this->Html->css('pGrado'); //pGrado CSS

			echo $this->fetch('meta');
			echo $this->fetch('css');

			echo $this->fetch('headerScript');
		?>

		<style type="text/css">
			/*
			body{
				background: url("<?php echo $this->Html->url('/img/fondo.oleo.jpg');?>") no-repeat #000 center !important;
				background-size: 100% 100% !important;
				color: #fff;
			}

			.login-box-body {
				background: none repeat scroll 0% 0% rgba(255, 255, 255, 0.4);
				border-radius: 8px;
			}/**/
		</style>

	</head>

	<body class="login-page">
		<div class="login-box">
			<div class="login-logo">
				<?php echo $this->Html->link($sisInfo['icono'].$sisInfo['nombre'],'/',array('class'=>'logo','title'=>$sisInfo['descripcion'],'escape'=>false)); ?>
			</div><!-- /.login-logo -->

			<div class="login-box-body">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>

			</div><!-- /.login-box-body -->
			<br/>
			<?php echo $this->element('commons/contact-botons'); ?>
		</div><!-- /.login-box -->

		<?php
			echo $this->Html->script('/libs/jquery/dist/jquery.min');			// jQuery
			echo $this->Html->script('/libs/bootstrap/dist/js/bootstrap.min'); 	// Bootstrap JS
			echo $this->Html->script('pGrado'); // pGrado
			echo $this->fetch('script');
			echo $this->element('external/google_analytics');
		?>
	</body>
</html>
