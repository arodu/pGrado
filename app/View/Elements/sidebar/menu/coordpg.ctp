<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='coordpg') ? 'active' : 'treeview');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-th-list"></i> <span>Coordinación</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyectos',
			array('controller'=>'admin','action'=>'proyectos_index'),
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

		<?php if($mod_activo['main.descargas']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Descargas',array('controller'=>'descargas','action'=>'index','admin'=>false),array('escape'=>false));?></li>
		<?php endif; ?>

	</ul>
</li>
