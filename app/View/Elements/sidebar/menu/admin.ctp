<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='admin') ? 'active' : 'treeview');
?>
<li class="<?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-dashboard"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">
		<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Ver Proyectos</a></li>
		<li><a href="../../index2.html"><i class="fa fa-download"></i> Descargas</a></li>
	</ul>
</li>