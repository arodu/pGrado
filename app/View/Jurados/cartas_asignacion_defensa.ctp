<?php 
	$espacio = '&nbsp;&nbsp;&nbsp;&nbsp;';
	$cod = 'UTF-8'; 

	$css = '<style type="text/css">
				.parrafo {text-align:justify;text-indent:40pt;margin-bottom:10pt;line-height: 1.2;}
				.center{text-align:center;}
				.right{text-align:right;}
				.strong{font-weight:bold;}
			</style>';

	$this->Pdf->init();
	//$this->Pdf->SetFont('helvetica', '', 11);
	$this->Pdf->SetFont('freesans', '', 11);

	$this->Pdf->SetMargins(17,30);

	// debug($proyectos); exit();

	foreach ($proyectos as $proyecto) {

		// AUTORES
			$tutoracad = null;
			$estudiante = null;
			foreach ($proyecto['Autor'] as $autor) {
				if($autor['TipoAutor']['code'] == 'tutoracad'){
					$tutoracad = $autor;
				}elseif($autor['TipoAutor']['code'] == 'estudiante'){
					$estudiante = $autor;
				}
			}

		// TIPO DE TRABAJO
			if($proyecto['Programa']['TipoPrograma']['code'] == 'doctor'){
				$trabajo = 'Trabajo Doctoral';
			}else{
				$trabajo = 'Trabajo de Grado';
			}

		// JURADOS
			$coordinador = null;
			$principales = null;
			$suplentes = null;
			foreach ($proyecto['Jurado'] as $jurado) {
				if($jurado['TipoJurado']['code'] == 'coordinador'){
					$coordinador = $jurado;
				}elseif($jurado['TipoJurado']['code'] == 'principal'){
					$principales[] = $jurado;
				}elseif($jurado['TipoJurado']['code'] == 'suplente'){
					$suplentes[] = $jurado;
				}
			}

				$tabla_jurados = '';
				$tabla_jurados .= '<table class="strong" style="width: 100%;"><tr><td>';
				$tabla_jurados .= 'JURADO PRINCIPAL<br/>';
					if($coordinador){
						$tabla_jurados .= $espacio.'PROF. '.mb_strtoupper($coordinador['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= $espacio.$espacio.'Coordinador(a)<br/>';
						$tabla_jurados .= $espacio.'PROF. '.mb_strtoupper($tutoracad['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= $espacio.$espacio.'Tutor(a) Académico<br/>';
					}else{
						$tabla_jurados .= $espacio.'PROF. '.mb_strtoupper($tutoracad['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= $espacio.$espacio.'Tutor(a) - Coordinador(a)<br/>';
					}

					if($principales)
						foreach ($principales as $principal) {
							$tabla_jurados .= $espacio.'PROF. '.mb_strtoupper($principal['Usuario']['nombre_completo'],$cod).'<br/>';
						}
				$tabla_jurados .= '</td><td>';
				$tabla_jurados .= 'JURADO SUPLENTE<br/>';
					if($suplentes)
						foreach ($suplentes as $suplente) {
							$tabla_jurados .= $espacio.'PROF. '.mb_strtoupper($suplente['Usuario']['nombre_completo'],$cod).'<br/>';
						}
				$tabla_jurados .= '</td></tr></table>';


		$aux = array(
				'Usuario'=>$tutoracad['Usuario'],
				'TipoJurado'=>array(
						'nombre'=>'PRINCIPAL (TUTOR ACADËMICO)'
					)
				);

		$proyecto['Jurado'][] = $aux;

		foreach ($proyecto['Jurado'] as $jurado) {
			$html = '';
			//<p class="right strong">San Juan de los Morros, 08 de Abril de 2015</p>
			$html .= '
				
				<p class="right strong">San Juan de los Morros, '.$this->General->dateFormatComplete($grupo_meta['fecha_comun']).'</p>

			<p style="text-align: left;">Ciudadano(a):<br/>
			<span class="strong">PROF. '.mb_strtoupper($jurado['Usuario']['nombre_completo'],$cod).'</span></p>


			<p class="parrafo">Me es grato dirigirme a usted a los fines de notificarle que en el Consejo de Estudios de Postgrado de la Universidad Nacional Experimental de los Llanos Centrales Rómulo Gallegos, en <span class="strong">Sesión Ordinaria N° '.$grupo_meta['no_consj_area'].' de fecha, '.$grupo_meta['fecha_consj_area'].'</span>, fue designado(a) <span class="strong">JURADO '.mb_strtoupper($jurado['TipoJurado']['nombre'],$cod).'</span>, para evaluar el '.$trabajo.' titulado: <span class="strong">'.mb_strtoupper($proyecto['Revision'][0]['titulo'],$cod).'</span>, realizado por el(la) ciudadano(a): <span class="strong">'.mb_strtoupper($estudiante['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad N° <span class="strong">'.mb_strtoupper($estudiante['Usuario']['cedula'],$cod).'</span>, como requisito parcial para obtener el grado de <span class="strong">'.mb_strtoupper($proyecto['Programa']['grado'],$cod).'</span>.</p>

			<p class="parrafo">Es de señalar que de acuerdo a lo establecido en el Reglamento de Estudios de Postgrado vigente, en el capítulo III, artículos 112 y 113 respectivamente, corresponde al Tutor(a)-Coordinador(a) del Jurado convocar a los demás miembros para la discusión del trabajo y fijar la fecha para la defensa pública del mismo, en un plazo máximo de treinta (30) días hábiles.</p>

			<p class="parrafo">Anexo a la presente el Trabajo en referencia e Instrumento de Evaluación para plasmas las observaciones y sugerencias que considere pertinentes, en un lapso de 5 - 10 días, a partir de haber recibido esta correspondencia. Dicho instrumento deberá consignarlo al Tutor(a)-Coordinador(a) del Jurado, quien lo remitirá al participante para incorporar las observaciones y sugerencias a que hubiere lugar, en la versión definitiva.</p>
				
			<p class="parrafo">El jurado está conformado de la siguiente manera:</p>

			<p>'.$tabla_jurados.'</p>

				<p class="parrafo">Con la seguridad de contar con su presencia en la defensa del Trabajo, quedo de usted.</p>

				<p class="center">Atentamente;</p>
				<p>&nbsp;<br/></p>
				<p class="center strong">'.$firma['asignacion_jurados.firma.nombre'].'<br/>
				'.$firma['asignacion_jurados.firma.cargo'].'</p>
			';

			//$html .= $jurado['id'].'<br/>';
			//$html .= $jurado['TipoJurado']['nombre'].'<br/>';
			//$html .= $jurado['Usuario']['nombre_completo'].'<br/>';
			//$html .= $proyecto['Revision'][0]['titulo'].'<br/>';
			//$html .= '<hr/>';

			// add a page
			$this->Pdf->AddPage();

			// output the HTML content
			$this->Pdf->writeHTML($css.$html);
			//$this->Pdf->writeHTML($html);

		}

		//$html = ;

		/*
			echo $css.$html;
			debug($proyecto);
			debug($planilla);
			debug($jurados);
			exit();
		/**/

		//$barcode = $this->Html->url(array('controller'=>'planillas','action'=>'verificar',$planilla['Planilla']['id'],$verificacion),true);

		//$this->Pdf->core->setBarcode( $barcode );

		//$html .= $barcode;

		// set font
		//debug($proyecto); exit();
	}
	// reset pointer to the last page
	$this->Pdf->lastPage();
	// ---------------------------------------------------------
	//Close and output PDF document
	$this->Pdf->Output($title_for_layout.'.pdf', 'D');

	//============================================================+
	// END OF FILE
	//============================================================+
	/**/



	/*
					San Juan de los Morros, 08 de Abril de 2015	

Ciudadano(a):
PROF. ASDADA ASD ASASDADD


	Me es grato dirigirme a usted a los fines de notificarle que en el Consejo de Estudios de Postgrado de la Universidad Nacional Experimental de los Llanos Centrales Rómulo Gallegos, en #Sesión Ordinaria N° 03 de fecha, 07/04/2015#, fue designado(a) #JURADO SUPLENTE#, para evaluar el #Trabajo Doctoral# titulado: #TITULO DEL TRABAJO#, realizado por el(la) ciudadano(a): #NOMBRE COMPLETO#, Titular de la Cédula de Identidad N° #2313123#, como requisito parcial para obtener el grado de #DOCTOR(A) EN CIENCIAS DE LA EDUCACION#.
	Es de señalar que de acuerdo a lo establecido en el Reglamento de Estudios de Postgrado vigente, en el capítulo III, articulos 112 y 113 respectivamente, corresponde al Tutor(a)-Coordinador(a) del Jurado convocar a los demas miembros para la discusión del trabajo y fijar la fecha para la defensa pública del mismo, en un plazo máximo de treinta (30) días hábiles.
	Anexo a la presente el Trabajo en referencia e Instrumento de Evaluación para plasmas las observaciones y sugerencias que considere pertinentes, en un lapso de 5 - 10 días, a partir de haber recibido esta correspondencia. Dicho instrumento deberá consignarlo al Tutor(a)-Coordinador(a) del Jurado, quien lo remitirá al participante para incorporar las observaciones y sugerencias a que hubiere lugar, en la versión definitiva.
	El jurado está conformado de la siguiente manera:

JURADO PRINCIPAL	|	JURADO SUPLENTE
Prof. sd		|	Prof. dwdwef
Tutor Coordinador	|	Prof. wefwfwe
Prof. dqd		|	Prof. wfwefw
Prof. qwd		|	Prof. fwef
Prof. qd	
Prof. qd	

	Con la seguridad de contar con su presencia en la defensa del Trabajo, quedo de usted.

	Atentamente;


	Dra. Nellys Chirinos
	Directora Académica de Postgrado
	*/



?>



