<?php
App::uses('AppController', 'Controller');
class MensajesController extends AppController {

	public function beforeFilter(){
		$this->verificarModulo('main.mensajes');
		parent::beforeFilter();
	}

	public function lista_mensajes(){
		$this->layout = 'ajax';

		$user_id = $this->Auth->user('id');
		$mensajes = $this->Mensaje->find('all',array(
			'conditions'=>array('Mensaje.usuario_id'=>$user_id, 'Mensaje.leido'=>'0'),
			'order'=>array('Mensaje.created'=>'DESC'),
			'contain'=>array('PrincipalMensaje'=>array('TipoMensaje')),
		));
		$this->set('mensajes',$mensajes);
		$this->render();
	}

	public function index(){
		$this->layout = 'ajax';

		$user_id = $this->Auth->user('id');

		$mensajes = $this->Mensaje->find('all',array(
			'conditions'=>array('Mensaje.usuario_id'=>$user_id),
			'order'=>array('Mensaje.created'=>'DESC'),
			'contain'=>array('PrincipalMensaje'=>array('TipoMensaje')),
		));

		$this->set(compact('mensajes'));
	}

	public function view($id=null){
		$mensaje = $this->Mensaje->find('first',array(
				'conditions'=>array('Mensaje.id'=>$id,'Mensaje.usuario_id'=>$this->Auth->user('id')),
				'contain'=>array('PrincipalMensaje'),
			));

		if (!$mensaje) {
			throw new NotFoundException();
		}

		if(!$mensaje['Mensaje']['leido']){
			$this->Mensaje->id = $id;
			$this->Mensaje->saveField('leido',true);
		}

		$enlace = (array)json_decode($mensaje['PrincipalMensaje']['enlace']);

		return $this->redirect($enlace);

	}

	public function delete($id = null) {
		$this->layout = 'ajax';
		$mensaje = $this->Mensaje->find('first',array(
				'conditions'=>array('Mensaje.id'=>$id,'Mensaje.usuario_id'=>$this->Auth->user('id')),
				'recursive'=>-1,
			));

		if(!$mensaje){
			throw new InternalErrorException(__('Invalid Mensaje'));
		}

		$this->Mensaje->id = $id;
		// $this->request->allowMethod('post', 'delete');
		if ($this->Mensaje->delete()) {
			// $this->Session->setFlash(__('Mensaje Borrado con Exito'));
			return $this->redirect(array('action'=>'lista_mensajes'));
		} else {
			throw new InternalErrorException(__('Invalid Mensaje'));
		}
		// return $this->redirect(array('action' => 'index'));
	}

	public function deleteAll() {
		$this->layout = 'ajax';

		if( $this->Mensaje->deleteAll(array('Mensaje.usuario_id'=>$this->Auth->user('id')), true, true) ){
			return $this->redirect(array('action'=>'lista_mensajes'));
			$this->render('delete');
		}else{
			throw new InternalErrorException(__('Invalid Mensaje'));
		}

	}


}

?>
