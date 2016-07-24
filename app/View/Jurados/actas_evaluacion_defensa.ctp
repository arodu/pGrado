<?php
	error_reporting(false);
	$espacio = '&nbsp;&nbsp;&nbsp;&nbsp;';
	$cod = 'UTF-8';
	$esp_firma = '&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>';

	$pages = array();

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
				$trabajo['title'] = 'TESIS DOCTORAL';
				$trabajo['text'] = 'la Tesis Doctoral';
			}else{
				$trabajo['title'] = 'TRABAJO DE GRADO';
				$trabajo['text'] = 'el Trabajo de Grado';
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
				$tabla_jurados .= '<div class="center strong">JURADO EVALUADOR</div>';
				$tabla_jurados .= '<table class="strong" style="width: 100%;">';
				$tabla_jurados .= '<tr>';

					$tabla_jurados .= '<td colspan="2" class="center">';
					if(!$coordinador){

						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. (Tutor(a) - Coordinador(a)) '.mb_strtoupper($tutoracad['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$tutoracad['Usuario']['cedula'];
					}else{
						$tabla_jurados .= '&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>';
						$tabla_jurados .= 'Prof. Tutor(a) '.mb_strtoupper($tutoracad['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$tutoracad['Usuario']['cedula'];

					}
					$tabla_jurados .= '</td>';


					$tabla_jurados .= '</tr><tr>';


					$p = 0;

					if($coordinador){
						$tabla_jurados .= '<td class="center">';
						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. Coordinador(a) '.mb_strtoupper($coordinador['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$coordinador['Usuario']['cedula'];
						$tabla_jurados .= '</td>';


						$tabla_jurados .= '<td class="center">';
						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. '.mb_strtoupper($principales[$p]['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$principales[$p]['Usuario']['cedula'];
						$tabla_jurados .= '</td>';
						$p++;

					}else{
						$tabla_jurados .= '<td class="center">';
						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. '.mb_strtoupper($principales[$p]['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$principales[$p]['Usuario']['cedula'];
						$tabla_jurados .= '</td>';
						$p++;

						$tabla_jurados .= '<td class="center">';
						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. '.mb_strtoupper($principales[$p]['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$principales[$p]['Usuario']['cedula'];
						$tabla_jurados .= '</td>';
						$p++;

					}

					if($proyecto['Programa']['TipoPrograma']['code'] != 'doctor'){

						$tabla_jurados .= '</tr><tr>';

						$tabla_jurados .= '<td class="center">';
						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. '.mb_strtoupper($principales[$p]['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$principales[$p]['Usuario']['cedula'];
						$tabla_jurados .= '</td>';
						$p++;


						$tabla_jurados .= '<td class="center">';
						$tabla_jurados .= $esp_firma;
						$tabla_jurados .= 'Prof. '.mb_strtoupper($principales[$p]['Usuario']['nombre_completo'],$cod).'<br/>';
						$tabla_jurados .= 'C.I. No. '.$principales[$p]['Usuario']['cedula'];
						$tabla_jurados .= '</td>';
						$p++;

					}

				$tabla_jurados .= '</tr>';
				$tabla_jurados .= '</table>';


				//$tabla_jurados = '';


				/*
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

				/******************************************************/


				$texto_jurados = '';

					if($coordinador){
						$texto_jurados .= '<span class="strong">Prof. (Tutor(a)) '.mb_strtoupper($tutoracad['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad No. <span class="strong">'.mb_strtoupper($tutoracad['Usuario']['cedula'],$cod).'</span>, ';
						$texto_jurados .= '<span class="strong">Prof. (Coordinador(a)) '.mb_strtoupper($coordinador['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad No. <span class="strong">'.mb_strtoupper($coordinador['Usuario']['cedula'],$cod).'</span>, ';
					}else{
						$texto_jurados .= '<span class="strong">Prof. (Tutor(a) - Coordinador(a)) '.mb_strtoupper($tutoracad['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad No. <span class="strong">'.mb_strtoupper($tutoracad['Usuario']['cedula'],$cod).'</span>, ';
					}

					if($principales)
						foreach ($principales as $principal) {
							$texto_jurados .= '<span class="strong">Prof. '.mb_strtoupper($principal['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad No. <span class="strong">'.mb_strtoupper($principal['Usuario']['cedula'],$cod).'</span>, ';
						}

			$html = '';
			//<p class="right strong">San Juan de los Morros, 08 de Abril de 2015</p>
			$html .= '<p class="text-center strong">ACTA DE EVALUACIÓN<br/>'.$trabajo['title'].'</p>';
			$html .= '<p class="parrafo">Nosotros, '.$texto_jurados.' En nuestro carácter de Jurados Principales designados por el Consejo de Estudios de Postgrado de la Universidad Nacional Experimental de los Llanos Centrales Rómulo Gallegos, en  <span class="strong"> Sesión Ordinaria N° '.$grupo_meta['no_consj_area'].' de fecha, '.$grupo_meta['fecha_consj_area'].'</span>, para evaluar '.$trabajo['text'].' presentado por el(la) ciudadano(a): <span class="strong">'.mb_strtoupper($estudiante['Usuario']['nombre_completo'],$cod).'</span>, Titular de la Cédula de Identidad N° <span class="strong">'.$estudiante['Usuario']['cedula'].'</span>, Titulado: <span class="strong">'.mb_strtoupper($proyecto['Revision'][0]['titulo'],$cod).'</span>, mediante el cual, opta al Grado de <span class="strong">'.mb_strtoupper($proyecto['Programa']['grado'],$cod).'</span>, dejamos constancia de que dicho Trabajo fue:<br/>APROBADO____, NO APROBADO____.</p>';
			$html .= '<p class="parrafo">Observaciones: __________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>';
			$html .= '<p class="parrafo">En fe de todo lo anterior suscribimos la presente ACTA DE EVALUACIÓN, En la Ciudad de San Juan de los Morros a los _____ dias del mes de __________________ del año __________.</p>';
			$html .= $tabla_jurados;

			$pages[] = $html;

	endforeach;


	$css = $this->element('pdf/style');
	$this->Pdf->init(array('tipo'=>'memo'));
	$this->Pdf->SetFont('freesans', '', 8);
	$this->Pdf->writeHTML($css);
	foreach ($pages as $page) {
		$this->Pdf->AddPage();
		$this->Pdf->writeHTML($html);
	}
	$this->Pdf->lastPage();
	$this->Pdf->Output($title_for_layout.'.pdf', 'I');


?>
