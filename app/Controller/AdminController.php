<?php
App::uses('AppController', 'Controller');
class AdminController extends AppController {

  public $uses = array('Proyecto');
	public $components = array('Paginator', 'Session','Search');
  public $layout = 'adminlte';

  public function beforeFilter(){
    parent::beforeFilter();
    $this->set('menuActive','coordpg');
  }

  public function proyectos_index(){
    $this->Proyecto->recursive = 0;

    $this->Paginator->settings = array(
      'limit' => $this->Search->pageLimit(),
      'contain'=>array(
          'Categoria','Fase','Grupo','Estado','Sede','Programa',
          'Revision'=>array(
              'order'=>array('updated'=>'DESC'),'limit'=>'1',
              'fields'=>array('id','titulo'),
            ),
          'Autor'=>array('TipoAutor',
              'Usuario'=>array('fields'=>array('cedula_nombre_completo','cedula','nombre_completo','sexo'))
            )
        ),
      'order'=>array('Proyecto.created'=>'DESC'),
    );

    $proyectos = $this->Paginator->paginate('Proyecto',$this->Search->getConditions());
    $this->set(compact('proyectos'));

    if(isset($this->request->query['tipo']) && $this->request->query['tipo'] == 'csv'){
      $this->layout = 'vacio';
      $this->response->download("export_".date('YmdHms').".csv");
      $this->response->type('csv');
      $this->render('export/admin_csv');
      return;
    }else if(isset($this->request->query['tipo']) && $this->request->query['tipo'] == 'pdf'){
      $this->layout = 'vacio';
      $this->response->type('pdf');
      $this->render('export/admin_pdf');
      return;
    }else{

      //$aux_categorias = $this->Proyecto->Categoria->find('list',array('fields'=>array('id','nombre','activo')));
      $categorias_activo = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'1'),null,null,'|---');
      $categorias_inactivo = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'0'),null,null,'|---');

      $categorias = array();
        if( !empty($categorias_activo) ){ $categorias['Activos'] = $categorias_activo; }
        if( !empty($categorias_inactivo) ){ $categorias['Inactivo'] = $categorias_inactivo; }

      $fases = $this->Proyecto->Fase->find('list');
      $estados = $this->Proyecto->Estado->find('list');
      $sedes = $this->Proyecto->Sede->find('list');
      $programas = $this->Proyecto->Programa->find('listActivo');

      $grupos = $this->Proyecto->Grupo->find('listActivo');

      $this->set(compact('fases','estados','categorias','grupos','sedes','programas'));
    }
  }

	public function proyectos_edit($proyecto_id = null) {
		if (!$this->Proyecto->exists($proyecto_id)) {
			throw new NotFoundException(__('Invalid proyecto'));
		}

    $proyecto_view = $this->Proyecto->findProyecto($proyecto_id);

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Proyecto->save($this->request->data)) {
        $this->Session->setFlash('El Proyecto ha sido modificado correctamente.','alert/success');
        return $this->redirect(array('controller'=>'proyectos','action' => 'view',$proyecto_id));
			} else {
				$this->Session->setFlash(__('The proyecto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Proyecto.id' => $proyecto_id));
			$this->request->data = $proyecto = $this->Proyecto->find('first', $options);
		}

		$programas = $this->Proyecto->Programa->find('list',array(
				'fields'=>array('Programa.id','Programa.nombre','TipoPrograma.nombre'),
				'conditions'=>array('Programa.activo'=>'1'),
				'recursive'=>0,
			));

		$grupos = $this->Proyecto->Grupo->find('list');

		$programa_id = $proyecto['Proyecto']['programa_id'];
		$categorias = $this->Proyecto->Categoria->generateTreeList(array('activo'=>'1','programa_id'=>$programa_id),null,null,'--- ');

		$sedes = $this->Proyecto->Sede->find('list');
		$fases = $this->Proyecto->Fase->find('list');
		$fase_id = $proyecto['Proyecto']['fase_id'];
		$estados = $this->Proyecto->Estado->find('list',array(
				'conditions'=>array(
					'or'=>array(
							array('Estado.fase_id'=>'0'),
							array('Estado.fase_id'=>$fase_id),
						)
					),
				'order'=>array('Estado.orden'=>'ASC'),
			));

		$this->set(compact('proyecto_view','categorias','programas', 'grupos','sedes', 'fases', 'estados'));
	}

  public function proyectos_move() {

    if ($this->request->is(array('post', 'put'))) {
      $filtros = $this->request->data['Proyecto'];

      $conditions = array();
      foreach ($filtros as $filtro => $value) {
        if( $value != ''){
          $conditions['Proyecto.'.$filtro] = $value;
        }
      }

      $proyectos = $this->Proyecto->find('all', array(
        'conditions'=>$conditions,
        'contain'=>array(
          'Programa', 'Categoria', 'Grupo', 'Sede','Estado','Fase',
          'Autor'=>array(
            'Usuario'=>array('fields'=>array('id','nombre_completo', 'cedula_nombre_completo')),
          ),
          'Revision'=>array(
            'order'=>array('updated'=>'desc'),
            'limit'=>1,
            'fields'=>array('id','titulo'),
          ),
        ),
      ));
      $this->set('proyectos', $proyectos);

      $categorias = $this->Proyecto->Categoria->find('list', array('conditions'=>array('Categoria.programa_id'=>$this->request->data['Proyecto']['programa_id'])));
      $estados = $this->Proyecto->Estado->find('list', array('conditions'=>array('Estado.fase_id'=>$this->request->data['Proyecto']['fase_id'])));
    }else{
      $categorias = array();
      $estados = array();
    }

    $programas = $this->Proyecto->Programa->find('list',array(
        'fields'=>array('Programa.id','Programa.nombre','TipoPrograma.nombre'),
        'recursive'=>0,
      ));
    $grupos = $this->Proyecto->Grupo->find('list');
    $sedes = $this->Proyecto->Sede->find('list');
    $fases = $this->Proyecto->Fase->find('list');

    $this->set(compact('programas', 'grupos','sedes', 'fases', 'categorias', 'estados'));
  }

  public function proyectos_move_trans(){

    if($this->request->is('post')){
      debug($this->request->data);
      exit();
    }

  }

  public function usuarios_directorio(){
    $this->loadModel('Usuario');
    $this->Usuario->recursive = 0;

    $this->Paginator->settings =  array(
      'contain'=>array('DescripcionUsuario','Sede','TipoUsuario'),
      'limit' => 20
    );

    $usuarios = $this->Paginator->paginate('Usuario',$this->Search->getConditions(null,'Usuario'));

    $sedes = $this->Usuario->Sede->find('list');
    $tipoUsuarios = $this->Usuario->TipoUsuario->find('list');
    $this->set(compact('usuarios','sedes','tipoUsuarios'));
  }

}
?>
