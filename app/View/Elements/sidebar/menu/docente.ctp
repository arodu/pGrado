<?php
	$activeClass = ( (isset($menuActive) && $menuActive=='docente') ? 'active' : 'treeview');
?>
<li class="<?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-file-text"></i> <span>Docente</span> <i class="fa fa-angle-left pull-right"></i>
	</a>
	<ul class="treeview-menu">

		<?php if(isset($userInfo['perfil']['tutoracad']) && $userInfo['perfil']['tutoracad']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Tutorias Académicas',array('controller'=>'proyectos','action'=>'indexTutorAcad','admin'=>false),array('escape'=>false));?></li>
		<?php endif; ?>

		<?php if(isset($userInfo['perfil']['tutormetod']) && $userInfo['perfil']['tutormetod']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Tutorias Metodológicas',array('controller'=>'proyectos','action'=>'indexTutorMetod','admin'=>false),array('escape'=>false));?></li>
		<?php endif; ?>

		<?php if($mod_activo['proyecto.jurados']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Jurado',array('controller'=>'proyectos','action'=>'indexJurado','admin'=>false),array('escape'=>false));?></li>
		<?php endif; ?>

	</ul>
</li>
