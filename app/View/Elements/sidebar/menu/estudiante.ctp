<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='estudiante') ? 'active' : 'treeview');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-book"></i> <span>Estudiante</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
        <!-- <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyecto Activo',array('controller'=>'proyectos','action'=>'verActivo','admin'=>false),array('escape'=>false));?></li> -->

        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Lista de Proyectos',array('controller'=>'proyectos','action'=>'index','admin'=>false),array('escape'=>false));?></li>

        <li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Agregar Propuesta',array('controller'=>'proyectos','action'=>'add','admin'=>false),array('escape'=>false));?></li>

				<?php if($mod_activo['main.descargas']): ?>
					<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Descargas',array('controller'=>'descargas','action'=>'index','admin'=>false),array('escape'=>false));?></li>
				<?php endif; ?>
	</ul>
</li>
