<?php
		$version = Configure::read('sistema.version.corto'); 
		$sisInfo = Configure::read('sistema.info');
?>

<?php //<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved . ?>

<div class="pull-left hidden-xs">
	<?php echo $this->element('commons/contact-botons', array('text'=>false,'animado'=>true)); ?>
</div>

<div class="pull-right version">
	<?php echo $this->Html->link($sisInfo['icono'].$sisInfo['nombre'].' v'.$version, array('controller'=>'pages','action'=>'creditos','admin'=>false),array('escape'=>false)); ?>
</div>
<div class="clearfix"></div>