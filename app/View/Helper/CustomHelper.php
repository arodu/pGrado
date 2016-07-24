<?php
class CustomHelper extends AppHelper {
	public $helpers = array('Html');

	public function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);
	}

	public function userFoto( $avatar = null, $size = 'default', $options = array() ){

		$options['class'] = ( isset($options['class']) ? $options['class'].' user-avatar' : 'user-avatar' );
    return $this->Html->image( $this->Html->url(array('controller'=>'usuarios', 'action'=>'foto', $size, $avatar), true), $options );
  }


	public function getTipoAutor($autores, $tipoAutor){
		$out = array();
		foreach($autores as $autor){
			if($autor['TipoAutor']['code'] == $tipoAutor){
				$out[] = $autor;
			}
		}
		return $out;
	}

	public function usuariosList($autores, $campo = 'nombre_completo'){
		$out = array();
		foreach ($autores as $autor) {
			if($autor['activo']){
				$out[] = $autor['Usuario'][$campo];
			}else{
				$out[] = $this->Html->tag('span',
					'<i class="fa fa-user-times fa-fw btn-tooltip mano" title="No ha aceptado <br/>solicitud de proyecto"></i>'.$autor['Usuario'][$campo],
					array('class'=>'text-muted')
				);
			}
		}
		return $out;
	}

	public function breadcrumb($list=array()){
		$out = '';
		$init = '<i class="fa fa-home"></i> '.__('Inicio');
		if(empty($list)){
			$out .= '<li class="active">'.$init.'</li>';
		}else{
			$out .= '<li>'.$this->Html->link($init, '/', array('escape'=>false)).'</li>';
			foreach ($list as $value => $url) {
				if($url === true){
					$out .= '<li class="active">'.$value.'</li>';
				}else{
					$out .= '<li>'.$this->Html->link($value, $url, array('escape'=>false)).'</li>';
				}
			}
		}
		return '<ol class="breadcrumb">'.$out.'</ol>';
	}

}
