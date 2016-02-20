<?php
	//$foto = $this->element('usuario/avatarMD',array('foto' => $userInfo['foto']));
	echo $this->element('usuario/avatar',array('foto' => $foto, 'tipo_foto'=>'md'));
?>