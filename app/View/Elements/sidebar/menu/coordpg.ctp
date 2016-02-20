<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='coordpg') ? 'active' : 'treeview');
?>
<li class="<?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-th-list"></i> <span>Coordinación</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyectos',
			array('controller'=>'proyectos','action'=>'index','admin'=>true),
			array('escape'=>false));?></li>

		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Directorio',
			array('controller'=>'pages','action'=>'directorio','admin'=>false),
	
			array('escape'=>false));?></li>

		<li class=""></li>

		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Movimientos',
			array('controller'=>'proyectos','action'=>'edit_batch','admin'=>true),
			array('escape'=>false));?></li>

		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Datos Impresión',
			array('controller'=>'jurados','action'=>'datos_impresion','admin'=>false),
			array('escape'=>false));?></li>

	</ul>
</li>