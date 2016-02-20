<?php $user_foto = $this->element('usuario/avatarMD',array('foto' => $userInfo['foto'])); ?>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php // echo $this->Html->image($user_foto, array('class'=>'user-image','alt'=>'User Image')); ?>

		<?php echo $this->Html->image($user_foto,array('class'=>'user-image','alt'=>'User Image')); ?>

		<span class="hidden-xs"><?php echo $userInfo['nombre']; ?></span>
	</a>

	<ul class="dropdown-menu">
		<!-- User image -->
		<li class="user-header">
			<?php // echo $this->Html->image($user_foto, array('class'=>'img-circle','alt'=>'User Image')); ?>

			<?php echo $this->Html->image($user_foto,array('class'=>'img-circle','alt'=>'User Image')); ?>

			<p>
				<?php echo $userInfo['nombre'].' - '.$userInfo['tipo']; ?>
				<small><?php echo $userInfo['Sede']['nombre']; ?></small>
			</p>
		</li>

		<!-- Menu Body -->

		
		<?php if($userInfo['userMenu']){ ?>
			<li class="user-body">
				<div class="col-xs-4 text-center">
					<?php echo $this->Html->link($userInfo['userMenu']['paneladmin']['label'],$userInfo['userMenu']['paneladmin']['url'],array('title'=>$userInfo['userMenu']['paneladmin']['title'],'target'=>'_blankcd ww')); ?>
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