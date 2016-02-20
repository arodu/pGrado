<?php
App::uses('Component', 'Controller');
class PermisosComponent extends Component {

	private $permisos = array();
	public $settings = array();
	public $components = array('Auth','Session');
	private $publicByDefault = false;
	private $usesRoot = false;

	public function __construct(ComponentCollection $collection, $settings = array()){
		$settings = array_merge($this->settings, (array)$settings);
		$this->Controller = $collection->getController();

		Configure::load($settings['fileConfig']); // Cargar Archivo		

		$this->permisos = Configure::read($settings['arreglo']); // Leer Arreglo de Permisos

		$this->usesRoot = ( Configure::read('debug') > 0 ? true : $this->usesRoot );

		parent::__construct($collection, $settings);

    }

	public function autorizado(){
		$current = array('controller'=>$this->Controller->params['controller'], 'action'=>$this->Controller->params['action']);

		$userPerfil = $this->recreatePerfil( $this->Auth->user('Perfil') );

		$currentPermisos = $this->getPermiso($current);

		if( $this->usesRoot===true  &&  isset($userPerfil['root'])  &&  $userPerfil['root']===true ){ // Si el usuario es ROOT tiene acceso
			return true;
		}

		if($currentPermisos == 'public'){  // Si el acceso el publico, el usuario tiene acceso
			return true;
		}elseif(is_array($currentPermisos)){
			foreach ($currentPermisos as $permiso) {  // Si el acceso el publico, el usuario tiene acceso
				if($permiso == 'public'){
					return true;
				}
				if(isset($userPerfil[$permiso]) && $userPerfil[$permiso]){ // Si el usuario tiene permiso , el usuario tiene acceso
					return true;
				}
			}
		}

		return $this->error();
	}

	public function getPermiso($current){
		$permiso = (isset($this->permisos[$current['controller']][$current['action']]) ?  $this->permisos[$current['controller']][$current['action']] : false );

		if($this->publicByDefault && $permiso===false){
			return 'public';
		}else{
			return $permiso;
		}
	}

	public function error(){
		throw new ForbiddenException('Acceso Denegado, no tiene los Permisos suficientes para realizar esta acción.');
	}

	public function recreatePerfil($arrayPerfil){
		$aux = null;
		foreach ($arrayPerfil as $perfil) {
			$aux[$perfil['code']] = true;
		}
		return $aux;
	}

	public function userInfo(){
		if($this->Auth->user()){
			return $this->Session->read('userInfo');
		}else{
			return false;
		}
	}


}


?>