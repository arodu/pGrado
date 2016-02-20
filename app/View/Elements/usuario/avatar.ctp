<?php 
	// $foto = $this->element('usuario/avatar',array('foto' => $userInfo['foto']));

	list($uf,$id) = explode("$", $foto);

	if( !isset($tipo_foto)){
		$tipo_foto = 'user';
	}

	$existeFoto = $this->requestAction('/usuarios/existeFoto/'.$tipo_foto.'/'.$id);

	if($existeFoto){
		$code = urlencode( convert_uuencode($uf.'$'.$tipo_foto.'$'.$id) );

		echo $this->Html->url(array('controller'=>'usuarios','action'=>'getFoto', $code, 'ext'=>'png','admin'=>false ),true);
	}else{
		$imageBaseUrl = DS.Configure::read('App.imageBaseUrl');
		switch ($tipo_foto) {
			case 'xxs':	$file = 'avatar.xxs.png'; break;
			case 'xs':	$file = 'avatar.xs.png'; break;
			case 'md':	$file = 'avatar.md.png'; break;
			default:	$file = 'avatar.png'; break;
		}
		echo $imageBaseUrl.$file;
	}

?>