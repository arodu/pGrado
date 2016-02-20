<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');


/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public $noLog = false;

	public $actsAs = array('Containable');
	public $recursive = -1;

	//public $useDbConfig = 'aisdevs';
	//public $useDbConfig = 'alternate';

	public function findIdByCode($code){
		$salida = null;

		if( is_array($code) ){
			$aux = $this->find('list',array(
						'conditions'=>array( $this->alias.'.code'=>$code),
						'fields'=>array('id'),
					));
			$salida = $aux;
		}else{
			$element = $this->find('first',array('conditions'=>array( $this->alias.'.code'=>$code )));
			$salida = @$element[$this->alias]['id'];
		}

		return $salida;
	}

	public function afterSave($created, $options = array()){
		if($this->noLog === false){
			if(isset($_SESSION['Log']) && !empty($_SESSION['Log'])){
				App::uses('Log', 'Model');
				$logModel = new Log();
				$log = $_SESSION['Log'];
				$aux = array(
						$this->name,
						( $created ? 'created' : 'updated' ),
						$log['action'],
					);
				$logModel->saveLog( $log['userId'], $aux, $this->id, null);

				$logInfo = array(
						'usuario_id'=>$log['userId'],
						''=>implode('.',$aux),
						'referer_id'=>$this->id,
					);
				$tipo = ( $created ? 'created' : 'updated' );
				CakeLog::write($tipo, json_encode($logInfo) );
			}
		}
		parent::afterSave($created,$options);
	}


	public function afterDelete() {
		if($this->noLog === false){
			if(isset($_SESSION['Log']) && !empty($_SESSION['Log'])){
				App::uses('Log', 'Model');
				$logModel = new Log();
				$log = $_SESSION['Log'];
				$aux = array(
						$this->name,
						'delete',
					);
				$logModel->saveLog( $log['userId'], $aux, $this->id, null);

				$logInfo = array(
						'usuario_id'=>$log['userId'],
						''=>implode('.',$aux),
						'referer_id'=>$this->id,
					);
				CakeLog::write('deleted', json_encode($logInfo) );
			}
		}
		parent::afterDelete();
	}

	public $activoField = 'activo';



	public function find($type = 'first', $query = array()) {

		switch ($type) {
			case 'listActivo':
					return $this->_listActivo($query); break;

			case 'listMultilevel':

			default:
					return parent::find($type, $query);

		}
	}


	protected function _listActivo( $query = array() ){

		$fields = ( isset($query['fields']) && $query['fields'] ? $query['fields'] : array( $this->alias.'.'.$this->primaryKey , $this->alias.'.'.$this->displayField , $this->alias.'.'.$this->activoField ) );

		$aux = $this->find('list',array('fields'=>$fields));
		
		$results = array();

		if(isset($aux[1])){ $results['Activos'] = $aux[1]; }
		if(isset($aux[0])){ $results['Inactivos'] = $aux[0]; }

		return $results;

	}

	protected function _listMultilevel( $query = array() ){



	}


}
