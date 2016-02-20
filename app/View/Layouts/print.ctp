<?php //$sistemaInfo = Configure::read('sistema.info'); ?>
<?php //header('Content-type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->element('commons/title-tag').' | Versión para Imprimir'; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php
    	echo $this->Html->css('/libs/bootstrap/css/bootstrap.min'); // Bootstrap 3.3.2
		echo $this->element('commons/meta-tags');
		echo $this->Html->charset('UTF-8');

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<div id="header">
		<div class="header-logo pull-left">
			<?php echo $this->Html->image('unerg.jpg',array('width'=>'150','alt'=>'logo')); ?>
		</div>
		<div class="header-text pull-left">
			&nbsp;&nbsp;
		</div>
		<div class="header-text pull-left">
			<strong>
				Universidad Nacional Experimental Rómulo Gallegos<br/>
				Área de Ingeniería de Sistema<br/>
				Programa de Ingeniería en Informática<br/>
				Coordinación de Proyecto de Grado
			</strong>
		</div>
		<div class="header-text pull-right">
			<h3><span style="font-size:.6em">Planilla</span> 001</h3>
		</div>

		<div class="clearfix"></div>
	</div>
	<hr/>
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->fetch('script'); ?>
</body>
</html>

<script type="text/javascript">
	window.print();
</script>