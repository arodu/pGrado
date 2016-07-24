<?php
App::uses('AppController', 'Controller');
class JuradosController extends AppController {

	public function beforeFilter(){
		$this->verificarModulo('proyecto.jurados');
		parent::beforeFilter();
	}

	public function view($proyecto_id = null) {

		$this->layout = 'ajax';

		$proyecto_autor = $this->Jurado->Proyecto->Autor->find('first',array(
			'conditions'=>array('Autor.proyecto_id'=>$proyecto_id,'Autor.usuario_id'=>$this->Auth->user('id'),'Autor.activo'=>1),
			'recursive'=>-1,
		));

		if(empty($proyecto_autor)){
			throw new NotFoundException(__('Invalid proyecto'));
		}

		$jurados_data = $this->Jurado->find('all',array(
				'conditions'=>array('Jurado.proyecto_id'=>$proyecto_id),
				'contain'=>array(
					'TipoJurado',
					'Usuario'=>array('fields'=>array('id','nombre_completo','email','avatar')),
				),
			));

		$aux = null;
		foreach ($jurados_data as $jurado_data) {
			$aux[$jurado_data['Jurado']['fase_id']][] = $jurado_data;
		}

		$this->set('jurados',$aux);

		$fases = $this->Jurado->Proyecto->Fase->find('list',array('order'=>array('orden'=>'DESC')));

		$this->set('fases',$fases);
	}


	public function datos_impresion(){
		if ($this->request->is(array('post', 'put'))) {

			if($this->request->data['btn'] == 'buscar'){
				return $this->redirect(array('action'=>'editar_datos_impresion', $this->request->data['Proyecto']['grupo_id'], $this->request->data['Proyecto']['fase_id']));
			}


			exit();
		}else{
			$fases = $this->Jurado->Proyecto->Fase->find('list',array('conditions'=>array('Fase.tiene_jurados'=>true)));
			$grupos = $this->Jurado->Proyecto->Grupo->find('list');
			$this->set(compact(array('fases','grupos')));
		}
	}

	public function editar_datos_impresion($grupo_id, $fase_id){
		$this->layout = 'ajax';
		$this->loadModel('Grupo');
		$grupo = $this->Grupo->find('first',array('conditions'=>array('Grupo.id'=>$grupo_id)));
		$meta = json_decode($grupo['Grupo']['meta'],true);
		$empty = true;
		if ($this->request->is(array('post', 'put'))) {
			$grupo_id = $this->request->data['GrupoMeta']['grupo_id'];
			$fase_id = $this->request->data['GrupoMeta']['fase_id'];
			$meta_data = array(
				'no_consj_area' => $this->request->data['GrupoMeta']['no_consj_area'],
				'fecha_consj_area' => $this->request->data['GrupoMeta']['fecha_consj_area'],
				'fecha_comun' => $this->request->data['GrupoMeta']['fecha_comun']
			);

			$meta['fases'][$fase_id] = $meta_data;

			$data['Grupo'] = array(
				'id'=>$grupo_id,
				'meta'=>json_encode($meta),
			);

			if( $this->Grupo->save($data) ){
				$this->Flash->alert_success('Información Guardada con Exito!');
				$empty = false;
			}else{
				$this->Flash->alert_error('No se ha podido guardar la información');
			}

		}else{
			$grupo_meta = $meta['fases'][$fase_id];
			if( isset($grupo_meta) and !empty($grupo_meta) ){
				$this->request->data['GrupoMeta'] = array(
					'grupo_id'=>$grupo_id,
					'fase_id'=>$fase_id,
					'no_consj_area' => $grupo_meta['no_consj_area'],
					'fecha_consj_area' => $grupo_meta['fecha_consj_area'],
					'fecha_comun' => $grupo_meta['fecha_comun'],
				);
				$empty = false;
			}else{
				$this->request->data['GrupoMeta'] = array(
					'grupo_id'=>$grupo_id,
					'fase_id'=>$fase_id,
					'no_consj_area' => null,
					'fecha_consj_area' => null,
					'fecha_comun' => null
				);
			}
		}

		$cant_proyectos = $this->Jurado->Proyecto->find('count', array(
			'contidions'=>array(
				'Proyecto.grupo_id'=>$grupo_id,
				'Proyecto.fase_id'=>$fase_id,
			)
		));
		$this->set(compact(array('cant_proyectos', 'empty')));
	}


	public function grupo_meta($grupo_id, $fase_id){

		$this->layout = 'ajax';

		$grupo = $this->Jurado->Proyecto->Grupo->find('first',array('conditions'=>array('Grupo.id'=>$grupo_id)));

		$meta = json_decode($grupo['Grupo']['meta'],true);

		if(isset($meta['fases'][$fase_id]) && $meta['fases'][$fase_id] ){
			$this->request->data = array('GrupoMeta'=>$meta['fases'][$fase_id]);
		}
		$this->set('cant_proyectos', $this->buscar_proyectos($grupo_id, $fase_id));
	}

	public function buscar_proyectos($grupo_id, $fase_id, $cantidad = true){

		if($cantidad){
			$aux = $this->Jurado->find('count',array(
					'conditions'=>array(
							'Jurado.fase_id'=>$fase_id,
							'Proyecto.grupo_id'=>$grupo_id,
						),
					'contain'=>array('Proyecto'),
					'fields'=>array('Jurado.proyecto_id','Jurado.fase_id'),
					'group'=>array('Jurado.proyecto_id'),
				)); /**/
			return ( $aux ? $aux : 0 );
		}else{
			$aux = $this->Jurado->find('list',array(
					'conditions'=>array(
							'Jurado.fase_id'=>$fase_id,
							'Proyecto.grupo_id'=>$grupo_id,
						),
					'contain'=>array('Proyecto'),
					'fields'=>array('Proyecto.id'),
					'group'=>array('Jurado.proyecto_id'),
				)); /**/
			return ( $aux ? $aux : array() );
		}
	}


	public function cartas_asignacion_defensa($grupo_id = null, $proyecto_id = null ){
		$this->layout = 'vacio';
		//$this->layout = 'pdfMultiPage';

		$this->response->type('application/pdf');
		$this->set('title_for_layout','cartasAsignacionDefensa');

		$fase_id = $this->Jurado->Fase->findIdByCode('defensa');

		if( $proyecto_id ){
			$id_proyectos = $proyecto_id;
			$proyecto = $this->Jurado->Proyecto->find('first',array('conditions'=>array('Proyecto.id'=>$proyecto_id)));
			$grupo_id = $proyecto['Proyecto']['grupo_id'];

		}else{
			if($grupo_id){
				$id_proyectos = $this->buscar_proyectos($grupo_id,$fase_id,false);
			}else{
				throw new NotFoundException(__('Invalid proyecto'));
			}
		}

		$proyectos = $this->Jurado->Proyecto->find('all',array(
				'conditions'=>array(
						'Proyecto.id'=>$id_proyectos,
					),
				'contain'=>array(
					'Revision'=>array(
							'limit'=>'1', 'order'=>'updated DESC',
							'fields'=>array('id','titulo'),
						),
					'Programa'=>array('TipoPrograma'),
					'Autor'=>array(
							'TipoAutor',
							'Usuario'=>array('fields'=>array('id','cedula_nombre_completo','nombre_completo','cedula'))
						),
					'Jurado'=>array(
						'conditions'=>array(
							'Jurado.fase_id' => $this->Jurado->Fase->findIdByCode( 'defensa' ),
						),
						'Usuario'=>array(
							'fields'=>array('id','cedula','nombre_completo','email'),
						),
						'TipoJurado',
					),
				),
			)
		);

		if(empty($proyectos)){
			throw new NotFoundException(__('No hay Proyectos con Jurados para mostrar.'));
		}

		$this->set('proyectos',$proyectos);

		// Firma
			$this->loadModel('Config');
			$firma = $this->Config->find('list',array(
					'conditions'=>array('Config.clave LIKE'=>'asignacion_jurados.firma.%'),
					'fields'=>array('clave','valor')
				));
			$this->set('firma',$firma);

		// Datos del Comunicado
			$grupo = $this->Jurado->Proyecto->Grupo->find('first',array(
					'conditions'=>array('Grupo.id'=>$grupo_id),
				));
			$grupo_meta = json_decode($grupo['Grupo']['meta'],true);
			$this->set('grupo_meta', $grupo_meta['fases'][$fase_id] );


	}

	public function actas_evaluacion_defensa($grupo_id = null, $proyecto_id = null ){

		$this->layout = 'vacio';
		$this->set('title_for_layout','actasEvaluacionDefensa');
		$this->response->type('application/pdf');

		$fase_id = $this->Jurado->Fase->findIdByCode('defensa');

		if( $proyecto_id){
			$id_proyectos = $proyecto_id;
			$proyecto = $this->Jurado->Proyecto->find('first',array('conditions'=>array('Proyecto.id'=>$proyecto_id)));
			$grupo_id = $proyecto['Proyecto']['grupo_id'];

		}else{
			if($grupo_id){
				$id_proyectos = $this->buscar_proyectos($grupo_id,$fase_id,false);
			}else{
				throw new NotFoundException(__('Invalid proyecto'));
			}
		}

		$proyectos = $this->Jurado->Proyecto->find('all',array(
				'conditions'=>array(
						'Proyecto.id'=>$id_proyectos,
					),
				'contain'=>array(
					'Revision'=>array(
							'limit'=>'1', 'order'=>'updated DESC',
							'fields'=>array('id','titulo'),
						),
					'Programa'=>array('TipoPrograma'),
					'Autor'=>array(
							'TipoAutor',
							'Usuario'=>array('fields'=>array('id','cedula_nombre_completo','nombre_completo','cedula'))
						),
					'Jurado'=>array(
						'conditions'=>array(
							'Jurado.fase_id' => $fase_id,
						),
						'Usuario'=>array(
							'fields'=>array('id','cedula','nombre_completo','email'),
						),
						'TipoJurado',
					),
				),
			)
		);

		$this->set('proyectos',$proyectos);

		// Datos del Comunicado
			$grupo = $this->Jurado->Proyecto->Grupo->find('first',array(
					'conditions'=>array('Grupo.id'=>$grupo_id),
				));

			$grupo_meta = json_decode($grupo['Grupo']['meta'],true);
			$this->set('grupo_meta', $grupo_meta['fases'][$fase_id] );

	}



}
