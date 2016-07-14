<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='tutoracad') ? 'active' : 'treeview');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-file-text"></i> <span>Tutor Académico</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Proyectos',array('controller'=>'proyectos','action'=>'indexTutorAcad','admin'=>false),array('escape'=>false));?></li>
	</ul>
</li>
