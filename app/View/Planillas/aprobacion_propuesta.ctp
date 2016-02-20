<?php

	$autores = null;
	$tutores = null;
	$tutoracad = '';
	$vacio = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;------------';

	foreach ($proyecto['Autor'] as $autor) {
		if($autor['TipoAutor']['code'] == 'estudiante'){
			$aux=null;
			$aux[] = $autor['Usuario']['cedula_nombre_completo'];
			$aux[] = $autor['Usuario']['email'];
			if(isset($autor['Usuario']['DescripcionUsuario']['telf_cel'])){ $aux[] = $autor['Usuario']['DescripcionUsuario']['telf_cel']; }
			if(isset($autor['Usuario']['DescripcionUsuario']['telf_hab'])){ $aux[] = $autor['Usuario']['DescripcionUsuario']['telf_hab']; }

			$aux=implode(' / ', $aux);

			$autores .= '<tr>'.
				'<td>'.'<b>'.__('Autor').'</b>: '.$aux.'</td>'.
			'</tr>';
			/*<tr>
				<td><b>email: </b>'.$autor['Usuario']['email'].'</td>
				<td><b>Telef. Celular: </b>'.$autor['Usuario']['DescripcionUsuario']['telf_cel'].'</td>
				<td><b>Telef. Habitación: </b>'.$autor['Usuario']['DescripcionUsuario']['telf_hab'].'</td>
			</tr>'; */
		}

		if($autor['TipoAutor']['code'] == 'tutoracad'){
			$tutoracad = $autor['Usuario']['nombre_completo'];
			$tutoracad .= ( !$autor['activo'] ? ' <small>(No Confirmado)</small>' : '' );
		}
	}

	$html = '';
	$html .= '<h3>Planilla 002 - Revisión de Propuesta - Proyecto de Grado I</h3>';
	$html .= '<table border="1" cellspacing="0" cellpadding="4">
		<tr>
			<td colspan="4">'.strip_tags($proyecto['Revision'][0]['titulo']).'</td>
		</tr>
		<tr>
			<td colspan="2"><b>Tema:</b> '.$proyecto['Proyecto']['tema'].'</td>
			<td colspan="2"><b>Tutor Académico:</b> '.( $tutoracad ? $tutoracad : $vacio ) .'</td>
		</tr>
		<tr>
			<th>'.__('Programa').'</th>
			<th>'.__('Categoria').'</th>
			<th>'.__('Sede').'</th>
			<th>'.__('Escenario').'</th>
		</tr>
		<tr>
			<td>'.$proyecto['Programa']['nombre'].'</td>
			<td>'.$proyecto['Categoria']['nombre'].'</td>
			<td>'.$proyecto['Sede']['nombre'].'</td>
			<td>'.( $proyecto['Escenario']['nombre'] ? $proyecto['Escenario']['nombre'] : $vacio ).'</td>
		</tr>
	</table>';
	$html .= '<br/><br/>';

	$html .= '<table border="1" cellspacing="0" cellpadding="4">'.$autores.'</table>';
	$html .= '<br/><br/>';

	$aux = '';
	foreach ($jurados as $jurado) {
		$aux .= '<table border="1" cellspacing="0" cellpadding="4">
				<tr>
					<td>Jurado Examinador: '.$jurado['Usuario']['nombre_completo'].'</td>
					<td>Firma si desea aprobar este Tema:<br/></td>
				</tr>
				<tr>
					<td colspan="2">Observaciones:<br/><br/><br/><br/><br/><br/><br/><br/></td>
				</tr>
			</table>'; /**/
		$aux .= '<br/><br/>';
	}

	$html .= $aux;

	$html .= '<table border="1" cellspacing="0" cellpadding="4" style="font-size:.8em;">
		<tr>
			<td align="left">
				P: '.$proyecto['Proyecto']['id'].';&nbsp;&nbsp;D: '.$planilla['Planilla']['id'].';&nbsp;&nbsp;V: '.$verificacion.'
			</td>
			<td align="right">
				Ultima Actualización: '.$this->General->dateTimeFormatPrint($proyecto['Revision'][0]['updated']).'
			</td>
		</tr>
	</table>'; /**/


	$html .= '<ol style="font-size:80%; text-align:justify;">
	<caption><b>Pasos a seguir para la Aprobación de Propuestas de Proyecto de Grado I</b></caption>
	<li> Registrarse en el Sistema Automatizado para Proyecto de Grado <u>https://pgrado.aisunerg.net.ve</u></li>
	<li> Llenar la planilla correspondiente con tus datos personales e introducir los títulos y tema respectivo a tu área de investigación. Debes tener cuidado de ingresar todos los datos importantes para hacer conocer lo que deseas desarrollar como trabajo de investigación, de manera tal que el jurado evaluador comprenda fácilmente la relevancia de tu estudio.</li>
	<li> Imprimir las planillas 001 y 002 para entregarlas al jurado evaluador.</li>
	<li> Buscar al jurado asignado y llevar la planilla para que éste evalué el tema y coloque las observaciones pertinentes al caso.</li>
	<li> Es Obligatorio la firma de los tres jurados para considerar el tema aprobado para desarrollarlo como trabajo de investigación. De faltar una de las firmas se considerará como un tema no aprobado y no procederá a la confirmación de la Coordinación de Proyecto de Grado I.</li>
	<li> El jurado debe colocar sus respectivas observaciones tanto en el caso de ser aprobado el tema como en el caso de no ser aprobado, con la finalidad de tener una recomendación del jurado que está evaluando el tema.</li>
	<li> En caso de la propuesta no sea aprobada, se pueden realizar nuevas propuestas en el sistema, o mejorar las propuestas ya creadas.</li>
	<li> Una vez que la planilla posea las firmas de los tres jurados se debe entregar en las fechas propuestas por la Coordinación en la oficina de Proyecto de Grado.</li>
	</ol>';

	//debug($verificacion);



	$css = '<style>
    	th { text-align: center; font-weight: bold; }
    	td { padding-left: 10em; }
	</style>';

	/*
	echo $css.$html;
	debug($proyecto);
	debug($planilla);
	debug($jurados);
	exit();
	/**/


	$this->Pdf->init();

	$barcode = $this->Html->url(array('controller'=>'planillas','action'=>'verificar',$planilla['Planilla']['id'],$verificacion),true);

	$this->Pdf->core->setBarcode( $barcode );

	//$html .= $barcode;

	// set font
	//debug($proyecto); exit();


	$this->Pdf->SetFont('freesans', '', 8);
	// add a page
	$this->Pdf->AddPage();

	// output the HTML content
	$this->Pdf->writeHTML($css.$html);

	// reset pointer to the last page
	$this->Pdf->lastPage();

	// ---------------------------------------------------------

	//Close and output PDF document
	$this->Pdf->Output('aprobacionPropuesta.pdf', 'I');

	//============================================================+
	// END OF FILE
	//============================================================+
	/**/
?>
