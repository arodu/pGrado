<?php
App::uses('Component', 'Controller');
class ImgMinComponent extends Component {

	public $settings = array(
			'min_ancho_max' => 198,
			'min_alto_max' => 100,
			'min_nombre' => 'min',
			'tipo_nombre'=>'back', // front, back
			'tipo'=>'proporcion', // proporcion,estrechar,corte
			'jpg_qt'=>'60',
		);

	private $dst_nombre = null;

	public function __construct(ComponentCollection $collection, $settings = array()){
		$this->setSettings($settings);
		//$this->Controller = $collection->getController();
		parent::__construct($collection, $this->settings);
    }

    public function setDstNombre($nombre){
    	$this->dst_nombre = $nombre;
    }

	public function crear($ruta, $imagen, $settings = array()){

		$this->setSettings($settings);

		$miniatura_ancho_maximo = $this->settings['min_ancho_max'];
		$miniatura_alto_maximo = $this->settings['min_alto_max'];

		if($info_imagen = getimagesize($ruta.$imagen)){

			$imagen_ancho = $info_imagen[0];
			$imagen_alto  = $info_imagen[1];
			$imagen_tipo  = $info_imagen['mime'];

			if($this->settings['tipo'] == 'proporcion'){ // Tipo Proporcion

				$proporcion_imagen    = $imagen_ancho / $imagen_alto;
				$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

				if ( $proporcion_imagen > $proporcion_miniatura ){
					$miniatura_ancho = $miniatura_ancho_maximo;
					$miniatura_alto  = $miniatura_ancho_maximo / $proporcion_imagen;

				} else if ( $proporcion_imagen < $proporcion_miniatura ){
					$miniatura_ancho = $miniatura_alto_maximo * $proporcion_imagen;
					$miniatura_alto  = $miniatura_alto_maximo;

				} else {
					$miniatura_ancho = $miniatura_ancho_maximo;
					$miniatura_alto  = $miniatura_alto_maximo;

				}

			}elseif($this->settings['tipo'] == 'corte'){ // Tipo Corte



			}else{ // Tipo Estrechar

				$miniatura_ancho = $miniatura_ancho_maximo;
				$miniatura_alto = $miniatura_alto_maximo;

			}

			$datos = array(
					'miniatura_ancho'=>$miniatura_ancho,
					'miniatura_alto'=>$miniatura_alto,
					'imagen_ancho'=>$imagen_ancho,
					'imagen_alto'=>$imagen_alto,
				);

			$this->imageCreateFromAny($ruta, $imagen, $imagen_tipo, $datos);

		}else{
			return false;
		}

	}

	private function imageCreateFromAny($ruta, $imagen, $imagen_tipo, $datos = array()) {

		$lienzo = imagecreatetruecolor( $datos['miniatura_ancho'], $datos['miniatura_alto'] );

			
		if($this->dst_nombre){
			$ruta_imagen_min = $ruta.$this->dst_nombre;
		}else{
			$ruta_imagen_min = $ruta.$this->getNombre($imagen);
		}


		switch ($imagen_tipo) {
			case 'image/gif' :
						$im = imageCreateFromGif($ruta.$imagen);
						imagecopyresampled($lienzo, $im, 0, 0, 0, 0, $datos['miniatura_ancho'], $datos['miniatura_alto'], $datos['imagen_ancho'], $datos['imagen_alto'] );
						imagegif ( $lienzo, $ruta_imagen_min);
						break;

			case "image/jpg":
			case 'image/jpeg' :
						$im = imageCreateFromJpeg($ruta.$imagen);
						imagecopyresampled($lienzo, $im, 0, 0, 0, 0, $datos['miniatura_ancho'], $datos['miniatura_alto'], $datos['imagen_ancho'], $datos['imagen_alto'] );
						imagejpeg ( $lienzo, $ruta_imagen_min, $this->settings['jpg_qt']);
						break;

			case 'image/png' :
						$im = imageCreateFromPng($ruta.$imagen);
						imagecopyresampled($lienzo, $im, 0, 0, 0, 0, $datos['miniatura_ancho'], $datos['miniatura_alto'], $datos['imagen_ancho'], $datos['imagen_alto'] );
						imagepng ( $lienzo, $ruta_imagen_min);
						break;

			case 'image/bmp' :
						$im = imageCreateFromBmp($ruta.$imagen);
						imagecopyresampled($lienzo, $im, 0, 0, 0, 0, $datos['miniatura_ancho'], $datos['miniatura_alto'], $datos['imagen_ancho'], $datos['imagen_alto'] );
						imagewbmp ( $lienzo, $ruta_imagen_min );
						break;

			default : return false;

		}
		return true;
	}

	public function getNombre($imagen_nombre, $settings = array() ){

		$settings = array_merge($this->settings, (array)$settings);

		if($settings['tipo_nombre'] == 'front'){ // front
			return $settings['min_nombre'].$imagen_nombre;

		}else{ // back
			$aux = explode(".", $imagen_nombre);
			$ext =  array_pop($aux);
			$aux[] = $this->settings['min_nombre'];
			$aux[] = $ext;
			return implode('.', $aux);
		}
	}

	public function esImagen($fileName){
		$aux = explode(".", $fileName);
		$type =  array_pop($aux);
		if( strcasecmp($type,'jpg') == 0 || strcasecmp($type,'jpeg') == 0 || strcasecmp($type,'png') == 0 || strcasecmp($type,'gif') == 0 || strcasecmp($type,'bmp') == 0 ){
			return true;
		}else{
			return false;
		}
	}

	public function remover($ruta, $archivo){
		$file = new File( $ruta.$archivo );
		if( $file->delete() ){
			return true;
		}
		return false;
	}

	private function setSettings($settings = array()){
		$this->settings = array_merge($this->settings, (array)$settings);
	}

}