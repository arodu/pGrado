<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='estudiante') ? 'active' : 'treeview');
?>
<li class="<?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-book"></i> <span>Estudiante</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyecto Activo',array('controller'=>'proyectos','action'=>'verActivo','admin'=>false),array('escape'=>false));?></li>

        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyectos',array('controller'=>'proyectos','action'=>'index','admin'=>false),array('escape'=>false));?></li>
        
        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Agregar Propuesta',array('controller'=>'proyectos','action'=>'add','admin'=>false),array('escape'=>false));?></li>

        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Descargas',array('controller'=>'pages','action'=>'descargas','admin'=>false),array('escape'=>false));?></li>
	</ul>
</li>