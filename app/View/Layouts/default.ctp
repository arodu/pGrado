<?php $sisInfo = Configure::read('sistema.info'); ?>
<?php header('Content-type: text/html; charset=UTF-8'); ?>
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

			#echo $this->Html->css('/libs/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min'); // smalot-sootstrap-datetimepicker

			//echo $this->Html->css('/libs/bootstrap/css/animate'); // animate CSS

			echo $this->Html->css('/libs/AdminLTE/dist/css/AdminLTE.min'); // AdminLTE.min.css
			//echo $this->Html->css('/libs/AdminLTE/css/skins/_all-skins.min'); // AdminLTE Skins. Choose a skin from the css/skins
			echo $this->Html->css('/libs/AdminLTE/dist/css/skins/skin-blue.min'); // AdminLTE Skins Blue

			//echo $this->Html->css('/libs/iCheck/square/blue.min'); // iCheck

			echo $this->Html->css('pGrado.min'); //pGrado CSS

			echo $this->fetch('meta');
			echo $this->fetch('css');
		?>

		<script type="text/javascript">
			var popover_url = "<?php echo $this->Html->url(array('controller'=>'usuarios','action'=>'view_pop','admin'=>false)).'/'; ?>";
		</script>

	</head>
	<body class="skin-blue fixed"> <?php //<body class="skin-blue fixed sidebar-mini">?>

		<div class="wrapper">

			<header class="main-header">

				<?php // Logo
					echo $this->Html->link('<span class="logo-mini">&nbsp;'.$sisInfo['icono'].'&nbsp;</span>'.'<span class="logo-lg">'.$sisInfo['icono'].$sisInfo['nombre'].'</span>','/',array('class'=>'logo','title'=>$sisInfo['nombre'].': '.$sisInfo['descripcion'],'escape'=>false)); ?>

				<?php // Header Navbar
					echo $this->element('header/main'); ?>

			</header>

			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<?php // SideBar
					echo $this->element('sidebar/main'); ?>
			</aside>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">

				<?php //-------------------------------------------------------------------------------------------// ?>
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1><?php /*
							General UI
							<small>Preview of UI elements</small> */
							echo $this->fetch('title-page'); ?>
						</h1><?php /*
							<ol class="breadcrumb">
								<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
								<li class="active">Blank page</li>
							</ol> */
							echo $this->fetch('breadcrumb'); ?>
					</section>

					<!-- Main content -->
					<section class="content">
						<?php debug('Layout Deprecated! '.$this->params['controller'].'/'.$this->params['action']); ?>
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					</section><!-- /.content -->
				<?php //-------------------------------------------------------------------------------------------// ?>

			</div><!-- /.content-wrapper -->

			<footer class="main-footer">
				<?php echo $this->element('footer/main'); ?>
			</footer>

			<div class="slideToTop"><i class="fa fa-chevron-up"></i></div>

		</div><!-- ./wrapper -->

		<?php // ----------------- MODAL General ------------------- ?>
			<div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-body">
							<i class="fa fa-refresh fa-spin"></i> Cargando...
						</div>
					</div>
				</div>
			</div>

		<?php
			echo $this->fetch('bottom-html');

			//-------------------- JavaScript Block ------------------//
			echo $this->Html->script('/libs/jquery/dist/jquery.min');								// jQuery
			echo $this->Html->script('/libs/bootstrap/dist/js/bootstrap.min'); 						// Bootstrap JS
			echo $this->Html->script('/libs/AdminLTE/dist/js/app.min');								// AdminLTE App
			//echo $this->Html->script('/libs/adminlte/plugins/iCheck/icheck.min.js');				// iCheck

			#echo $this->Html->script('/libs/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min'); // smalot-sootstrap-datetimepicker
			#echo $this->Html->script('/libs/smalot-bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es'); // smalot-sootstrap-datetimepicker

			echo $this->Html->script('/libs/AdminLTE/plugins/slimScroll/jquery.slimscroll.min');	// Slimscroll
			echo $this->Html->script('/libs/AdminLTE/plugins/fastclick/fastclick.min'); 			// FastClick
			echo $this->Html->script('pGrado'); 													// pGrado
			//echo $this->Html->script('/libs/AdminLTE/js/demo'); 									// AdminLTE for demo purposes

			echo $this->fetch('script');

			if($mod_activo['external.google_analytics']){ echo $this->element('external/google_analytics'); }
		?>
  </body>
</html>
