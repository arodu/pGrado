<?php
	error_reporting(false);
	$espacio = '&nbsp;&nbsp;&nbsp;&nbsp;';
	$cod = 'UTF-8';

	$css = '<style type="text/css">
				.parrafo {text-align:justify;text-indent:40pt;margin-bottom:10pt;line-height: 1.2;}
				.center{text-align:center;}
				.right{text-align:right;}
				.strong{font-weight:bold;}
			</style>';

	$out = array();

	foreach ($proyectos as $proyecto):
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

		foreach ($proyecto['Jurado'] as $jurado):
			$html = '';
			//<p class="right strong">San Juan de los Morros, 08 de Abril de 2015</p>
			$html .= '<p class="right strong">San Juan de los Morros, '.$this->General->dateFormatComplete($grupo_meta['fecha_comun']).'</p>';
			$html .= '<p style="text-align: left;">Ciudadano(a):<br/>';
			$html .= '<span class="strong">PROF. '.mb_strtoupper($jurado['Usuario']['nombre_completo'],$cod).'</span></p>';
			$html .= '<p class="parrafo">Me es grato dirigirme a usted a los fines de notificarle que en el Consejo de Estudios de Postgrado de la Universidad Nacional Experimental de los Llanos Centrales Rómulo Gallegos, en <span class="strong">Sesión Ordinaria N° '.$grupo_meta['no_consj_area'].' de fecha, '.$grupo_meta['fecha_consj_area'].'</span>, fue designado(a) <span class="strong">JURADO '.mb_strtoupper($jurado['TipoJurado']['nombre'],$cod).'</span>, para evaluar el '.$trabajo.' titulado: <span class="strong">'.mb_strtoupper($proyecto['Revision'][0]['titulo'],$cod).'</span>, realizado por el(la) ciudadano(a): <span class="strong">'.mb_strtoupper($estudiante['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad N° <span class="strong">'.mb_strtoupper($estudiante['Usuario']['cedula'],$cod).'</span>, como requisito parcial para obtener el grado de <span class="strong">'.mb_strtoupper($proyecto['Programa']['grado'],$cod).'</span>.</p>';
			$html .= '<p class="parrafo">Es de señalar que de acuerdo a lo establecido en el Reglamento de Estudios de Postgrado vigente, en el capítulo III, artículos 112 y 113 respectivamente, corresponde al Tutor(a)-Coordinador(a) del Jurado convocar a los demás miembros para la discusión del trabajo y fijar la fecha para la defensa pública del mismo, en un plazo máximo de treinta (30) días hábiles.</p>';
			$html .= '<p class="parrafo">Anexo a la presente el Trabajo en referencia e Instrumento de Evaluación para plasmas las observaciones y sugerencias que considere pertinentes, en un lapso de 5 - 10 días, a partir de haber recibido esta correspondencia. Dicho instrumento deberá consignarlo al Tutor(a)-Coordinador(a) del Jurado, quien lo remitirá al participante para incorporar las observaciones y sugerencias a que hubiere lugar, en la versión definitiva.</p>';
			$html .= '<p class="parrafo">El jurado está conformado de la siguiente manera:</p>';
			$html .= '<p>'.$tabla_jurados.'</p>';
			$html .= '<p class="parrafo">Con la seguridad de contar con su presencia en la defensa del Trabajo, quedo de usted.</p>';
			$html .= '<p class="center">Atentamente;</p>';
			$html .= '<p>&nbsp;<br/></p>';
			$html .= '<p class="center strong">'.$firma['asignacion_jurados.firma.nombre'].'<br/>';
			$html .= $firma['asignacion_jurados.firma.cargo'].'</p>';

			$out[] = $html;

		endforeach;
	endforeach;



	$css = $this->element('pdf/style');
	$this->Pdf->init(array('tipo'=>'memo'));
	$this->Pdf->SetFont('freesans', '', 8);
	$this->Pdf->writeHTML($css);
	foreach ($out as $page) {
		$this->Pdf->AddPage();
		$this->Pdf->writeHTML($html);
	}
	$this->Pdf->lastPage();
	$this->Pdf->Output($title_for_layout.'.pdf', 'I');

?>
