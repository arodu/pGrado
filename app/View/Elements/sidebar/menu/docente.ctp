<?php
	$allows = array('docente','tutoracad','tutormetod','jurado');
	$activeClass = ( (isset($menuActive) && in_array($menuActive, $allows)) ? 'active' : '');
?>
<li class="treeview <?php echo $activeClass; ?>">
	<a href="#">
		<i class="fa fa-file-text"></i> <span>Docente</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu">

		<?php if(isset($userInfo['perfil']['tutoracad']) && $userInfo['perfil']['tutoracad']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Tutorias Académicas',array('controller'=>'proyectos','action'=>'index','?'=>array('a'=>'tutoracad')),array('escape'=>false));?></li>
		<?php endif; ?>

		<?php if(isset($userInfo['perfil']['tutormetod']) && $userInfo['perfil']['tutormetod']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Tutorias Metodológicas',array('controller'=>'proyectos','action'=>'index','?'=>array('a'=>'tutormetod')),array('escape'=>false));?></li>
		<?php endif; ?>

		<?php if($mod_activo['proyecto.jurados']): ?>
			<li><?php echo $this->Html->link('<i class="fa fa-circle-o"></i>Jurado',array('controller'=>'proyectos','action'=>'indexJurado','?'=>array('a'=>'jurado')),array('escape'=>false));?></li>
		<?php endif; ?>

	</ul>
</li>
