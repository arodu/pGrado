<?php
	$allows = array('estudiante');
	$activeClass = ( (isset($menuActive) && in_array($menuActive, $allows)) ? 'active' : '');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-book"></i> <span>Estudiante</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
        <!-- <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyecto Activo',array('controller'=>'proyectos','action'=>'verActivo','?'=>array('a'=>'estudiante')),array('escape'=>false));?></li> -->

        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Lista de Proyectos',array('controller'=>'proyectos','action'=>'index','?'=>array('a'=>'estudiante')),array('escape'=>false));?></li>

        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Agregar Propuesta',array('controller'=>'proyectos','action'=>'add','admin'=>false),array('escape'=>false));?></li>

	</ul>
</li>
