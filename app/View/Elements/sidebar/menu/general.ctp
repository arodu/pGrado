<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='general') ? 'active' : '');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-exclamation-circle"></i> <span>General</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<?php if($mod_activo['main.descargas']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Descargas',array('controller'=>'descargas','action'=>'index'),array('escape'=>false));?></li>
		<?php endif; ?>
	</ul>
</li>
