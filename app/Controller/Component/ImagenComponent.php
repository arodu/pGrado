<?php
App::uses('Component', 'Controller');
class ImagenComponent extends Component {

	public $settings = array(
		'miniatura_ancho' => 198,
		'miniatura_alto' => 100,
		'tipo'=>'proporcion', // proporcion,estrechar,corte
		'jpg_qt'=>'60',

		'prefijo'=>'min_',
		'sufijo'=>'.min',
	);

	private $dst_nombre = null;

	public function __construct(ComponentCollection $collection, $settings = array()){
		$this->setSettings($settings);
		//$this->Controller = $collection->getController();
		parent::__construct($collection, $this->settings);
	}

	public function setSettings($settings = array()){
		$this->settings = array_merge($this->settings, (array)$settings);
	}

	private function mergeSettings($settings = array()){
		return array_merge( $this->settings, (array)$settings );
	}

	public function miniatura($fuente, $destino, $settings){
		$settings = $this->mergeSettings($settings);

		$miniatura_ancho_maximo = $settings['miniatura_ancho'];
		$miniatura_alto_maximo = $settings['miniatura_alto'];

		if($info_imagen = getimagesize($fuente)){

			$imagen_ancho = $info_imagen[0];
			$imagen_alto  = $info_imagen[1];
			$imagen_tipo  = $info_imagen['mime'];

			if($settings['tipo'] == 'proporcion'){ // Tipo Proporcion

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

			}elseif($settings['tipo'] == 'corte'){ // Tipo Corte



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

			$this->imageCreateFromAny($fuente, $destino, $datos);

		}else{
			return false;
		}
	}

	private function imageCreateFromAny($fuente, $destino, $datos = array(), $settings = array() ) {

		$settings = $this->mergeSettings($settings);

		$lienzo = imagecreatetruecolor( $datos['miniatura_ancho'], $datos['miniatura_alto'] );

		$fuente_tipo = $this->getExtension($fuente);

		switch ( mb_strtolower($fuente_tipo) ) {
				case 'gif' :
				case 'image/gif' :
							$im = imageCreateFromGif($fuente);

							break;

				case "jpg":
				case "jpeg":
				case "image/jpg":
				case 'image/jpeg' :
							$im = imageCreateFromJpeg($fuente);
							break;

				case 'png' :
				case 'image/png' :
							$im = imageCreateFromPng($fuente);
							break;

				case 'bmp' :
				case 'image/bmp' :
							$im = imageCreateFromBmp($fuente);
							break;

				default :	return false;
		}

		imagecopyresampled($lienzo, $im, 0, 0, 0, 0, $datos['miniatura_ancho'], $datos['miniatura_alto'], $datos['imagen_ancho'], $datos['imagen_alto'] );

		$destino_tipo = $this->getExtension($destino);

		switch ( mb_strtolower($destino_tipo) ) {
			case 'gif' :
			case 'image/gif' :	imagegif ( $lienzo, $destino ); break;

			case "jpg":
			case "jpeg":
			case "image/jpg":
			case 'image/jpeg' :	imagejpeg ( $lienzo, $destino, $settings['jpg_qt'] ); break;

			case 'png' :
			case 'image/png' :	imagepng ( $lienzo, $destino ); break;

			case 'bmp' :
			case 'image/bmp' :	imagewbmp ( $lienzo, $destino ); break;

			default :	return false;
		}

		return true;
	}

	public function getExtension($archivo){
		$aux = explode('.', $archivo);
		return mb_strtolower( end($aux) );
	}

	public function remover($archivos){
		$archivos = ( is_array($archivos) ? $archivos : array($archivos) );
		$out = array();
		foreach ($archivos as $archivo){
			$file = new File( $archivo );
			if( $file->delete() ){
				$out[$archivo] = true;
			}else{
				$out[$archivo] = false;
			}
		}
		return false;
	}

	public function esImagen($archivo){
		$ext_file = mb_strtolower($this->getExtension($archivo));
		$img_ext = array('gif','jpg','jpe','jpeg','png');
		foreach ($img_ext as $ext) {
			if( $ext == $ext_file ) return true;
		}
		return false;
	}

	public function addSufijo( $archivo, $sufijo = null ){
		$sufijo = ($sufijo == null ? $this->settings['sufijo'] : $sufijo );

		$aux = explode(".", $archivo);
		$ext = array_pop($aux);
		$aux = implode('.', $aux);
		$aux = $aux.$sufijo.'.'.$ext;
		return $aux;
	}

	public function addPrefijo( $archivo, $prefijo = null ){
		$prefijo = ($prefijo == null ? $this->settings['prefijo'] : $prefijo );
		return $prefijo.$archivo;
	}

}
