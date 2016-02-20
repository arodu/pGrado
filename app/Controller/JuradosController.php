<?php
App::uses('AppController', 'Controller');
class JuradosController extends AppController {

	public function beforeFilter(){
		$this->verificarModulo('proyecto.jurados');
		parent::beforeFilter();
	}

	public function datos_impresion(){

		if ($this->request->is(array('post', 'put'))) {

			//$this->set('extra',$this->request->data['Extra']);

			$grupo = $this->Jurado->Proyecto->Grupo->find('first',array('conditions'=>array('Grupo.id'=>$this->request->data['Proyecto']['grupo_id'])));
			$old_meta = json_decode($grupo['Grupo']['meta'],true);
			$old_meta = ( $old_meta['fases'] ? $old_meta['fases'] : array() );
			$new_meta = array($this->request->data['Proyecto']['fase_id'] => $this->request->data['GrupoMeta']);
			$meta = array( 'fases'=>array_replace($old_meta,$new_meta) );

			$grupo_meta = json_encode($meta);

			$grupo_data['Grupo'] = array(
					'id'=>$this->request->data['Proyecto']['grupo_id'],
					'meta'=>$grupo_meta,
				);

			if($this->Jurado->Proyecto->Grupo->save($grupo_data)){
				$this->Session->setFlash('Datos Guardados correctamente','alert/success');

				if($this->request->data['boton'] == 'comunicacion'){
					return $this->redirect( array('action'=>'cartas_asignacion_defensa',$this->request->data['Proyecto']['grupo_id']) );

				}elseif($this->request->data['boton'] == 'actas_evaluacion'){
					return $this->redirect( array('action'=>'actas_evaluacion_defensa',$this->request->data['Proyecto']['grupo_id']) );

				}else{
					$this->set('grupo_meta',true);

				}
			}
		}

		$fases = $this->Jurado->Proyecto->Fase->find('list',array('conditions'=>array('Fase.tiene_jurados'=>true)));
		$grupos = $this->Jurado->Proyecto->Grupo->find('list');

		$this->set(compact(array('fases','grupos')));
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
