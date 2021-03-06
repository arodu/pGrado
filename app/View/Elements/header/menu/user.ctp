<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php echo $this->Custom->userFoto( $userInfo['avatar'], 'xxs', array('class'=>'user-image','alt'=>'User Image') ); ?>
		<span class="hidden-xs"><?php echo $userInfo['nombre']; ?>&nbsp;</span>
	</a>

	<ul class="dropdown-menu">
		<!-- User image -->
		<li class="user-header">
			<?php echo $this->Custom->userFoto( $userInfo['avatar'], 'md', array('class'=>'img-circle','alt'=>'User Image') ); ?>

			<p>
				<?php echo $userInfo['nombre']; ?>
				<?php echo  ' / '; ?>
				<?php echo $userInfo['tipo']; ?>
				<?php echo '<small>'.$userInfo['Sede']['nombre'].'</small>'; ?>
			</p>
		</li>

		<!-- Menu Body -->

		<?php if($userInfo['userMenu']){ ?>
			<li class="user-body">
				<div class="col-xs-4 text-center">
					<?php echo $this->Html->link($userInfo['userMenu']['paneladmin']['label'],$userInfo['userMenu']['paneladmin']['url'],array('title'=>$userInfo['userMenu']['paneladmin']['title'],'target'=>'_blank')); ?>
				</div>
				<!--<div class="col-xs-4 text-center">
					<a href="#">Sales</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="#">Friends</a>
				</div>-->
			</li>
		<?php } ?>

		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-left">
				<?php echo $this->Html->link('<i class="fa fa-user"></i> Perfil',array('controller'=>'usuarios','action'=>'view','admin'=>false),array('class'=>'btn btn-default btn-flat','escape'=>false));?>
			</div>
			<div class="pull-right">
				<?php echo $this->Html->link('Cerrar Sesión <i class="fa fa-sign-out"></i>',array('controller'=>'usuarios','action'=>'logout','admin'=>false),array('class'=>'btn btn-default btn-flat','escape'=>false));?>
			</div>
		</li>
	</ul>
</li>
