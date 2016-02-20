<?php
App::uses('AppController', 'Controller');

class ComentariosController extends AppController {

	//public $uses = array('Comentario','Mensaje');

	public function beforeFilter(){
		$this->verificarModulo('proyecto.comentarios');
		parent::beforeFilter();
	}


	public function index($proyecto_id, $tipo = null) {
		$this->layout = 'ajax';

		$options = array(
						'conditions'=>array('Comentario.proyecto_id'=>$proyecto_id),
						'order'=>array('Comentario.updated'=>'DESC'),
						'contain'=>array(
								'Usuario'=>array('fields'=>array('id','nombre_completo','foto'))
							),
					);

		if($tipo == 'coment-users'){
			$options['conditions'] = array_merge($options['conditions'], array('Comentario.usuario_id >'=>0));
		}elseif($tipo == 'coment-system'){
			$options['conditions'] = array_merge($options['conditions'], array('Comentario.usuario_id'=>0));
		}


		$comentarios = $this->Comentario->find('all',$options);

		$this->set('comentarios',$comentarios);
		$this->set('proyecto_id',$proyecto_id);

	}

	public function add() {
		$this->layout = 'ajax';
		if ($this->request->is('post')) {
			if(!empty($this->request->data['texto'])){
				$comentario['Comentario'] = array(
					'usuario_id'=>$this->Auth->user('id'),
					'texto'=>$this->request->data['texto'],
					'proyecto_id'=>$this->request->data['proyecto_id'],
				);

				$this->Comentario->create();
				if ($this->Comentario->save($comentario)) {
					return $this->redirect(array('action' => 'index',$this->request->data['proyecto_id']));
				}
			}else{
				return $this->redirect(array('action' => 'index',$this->request->data['proyecto_id']));
			}
		}
		throw new InternalErrorException();
	}

	public function edit(){




	}

}
