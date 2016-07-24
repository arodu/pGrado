<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='coordpg') ? 'active' : '');
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
			array('controller'=>'admin','action'=>'proyectos_index','?'=>array('a'=>'coordpg')),
			array('escape'=>false));?></li>

		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Directorio',
			array('controller'=>'admin','action'=>'usuarios_directorio','?'=>array('a'=>'coordpg')),

			array('escape'=>false));?></li>

		<li class=""></li>

		<!-- <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Movimientos',
			array('controller'=>'admin','action'=>'proyectos_move','?'=>array('a'=>'coordpg')),
			array('escape'=>false));?></li> -->

		<?php if($mod_activo['proyecto.jurados']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Datos Impresión',
				array('controller'=>'jurados','action'=>'datos_impresion','?'=>array('a'=>'coordpg')),
				array('escape'=>false));?></li>
		<?php endif; ?>

	</ul>
</li>
