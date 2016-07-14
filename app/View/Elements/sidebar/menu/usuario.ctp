<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='usuario') ? 'active' : 'treeview');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-user"></i> <span>Usuario</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Perfil de Usuario',array('controller'=>'usuarios','action'=>'view','admin'=>false),array('escape'=>false));?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Actualizar Datos',array('controller'=>'usuarios','action'=>'edit','admin'=>false),array('escape'=>false));?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Cambiar Contraseña',array('controller'=>'usuarios','action'=>'editpassword','admin'=>false),array('escape'=>false));?></li>
		<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Cerrar Sesión',array('controller'=>'usuarios','action'=>'logout','admin'=>false),array('escape'=>false));?></li>
	</ul>
</li>
