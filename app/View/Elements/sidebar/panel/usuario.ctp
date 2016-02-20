<?php $user_foto = $this->element('usuario/avatarMD',array('foto' => $userInfo['foto'])); ?>
<!-- Sidebar user panel -->
<div class="user-panel">
	<div class="pull-left image">
		<?php echo $this->Html->image($user_foto,array('class'=>'img-circle','alt'=>'User Image')); ?>
	</div>
	<div class="pull-left info">
		<p><?php echo $userInfo['nombre'];?></p>
		<?php if(isset($userInfo) && $userInfo){ ?>
			<small><i class="fa fa-circle fa-fw text-green"></i> Online</small>
		<?php }else{ ?>
			<small><i class="fa fa-circle fa-fw text-red"></i> Offline</small>
		<?php } ?>
	</div>
</div>