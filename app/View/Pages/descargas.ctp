<?php

	$fileDescargas = Configure::read('sistema.descargas');

	$ico = array(
			'pdf' => '<i class="fa fa-file-pdf-o fa-fw"></i> ',
		);

	function ico($tipo = null){
		switch ($tipo) {
			case 'pdf': $out = '<i class="fa fa-file-pdf-o fa-fw"></i> '; break;
			default: $out = '<i class="fa fa-file-o fa-fw"></i> '; break;
		}
		return $out;
	}

	
	$col_xs_izq = 'col-xs-8';	$col_xs_der = 'col-xs-4';
	$col_sm_izq = 'col-sm-10';	$col_sm_der = 'col-sm-2';
	$col_md_izq = '';	$col_md_der = '';
	
	


	$baremos = array(
		array(
				'titulo'=>'Auditoria - Planilla de evaluación - Predefensa',
				'file'=>'Auditoria_Planilla_de_evaluación_Predefensa.pdf',
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Inteligencia Artificial- Planilla de evaluación - Predefensa',
				'file'=>'Inteligencia_Artificial_Planilla_de_evaluación_Predefensa.pdf',
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Redes y Telecomunicaciones - Planilla de evaluación - Predefensa',
				'file'=>'Redes_y_Telecomunicaciones_Planilla_de_evaluación_Predefensa.pdf',
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Sistemas de Información - Planilla de evaluación - Predefensa',
				'file'=>'Sistemas_de_Información_Planilla_de evaluación_Predefensa.pdf',
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Sistemas Web - Planilla de evaluación -Predefensa',
				'file'=>'Sistemas_Web_Planilla_de_evaluación_Predefensa.pdf',
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Software Educativo - Planilla de evaluación - Predefensa',
				'file'=>'Software_Educativo_Planilla_de_evaluación_Predefensa.pdf',
				'tipo'=>'pdf',
			),
		);


	$formatos = array(
			'indv'=>array(
					array(
							'titulo'=>'Aval de Presentación - Individual',
							'file'=>'Aval_de_Presentacion_Individual.pdf',
							'tipo'=>'pdf',
						),
					array(
							'titulo'=>'Carta de Aprobación Docente - Individual',
							'file'=>'Carta_de_Aprobacion_Docente_Individual.pdf',
							'tipo'=>'pdf',
						),
					array(
							'titulo'=>'Carta de Aprobación Tutor Academico - Individual',
							'file'=>'Carta_de_Aprobacion_Tutor_Academico_Individual.pdf',
							'tipo'=>'pdf',
						),
				),
			'grup'=>array(
					array(
							'titulo'=>'Aval de Presentación - Grupal',
							'file'=>'Aval_de_Presentacio_Grupal.pdf',
							'tipo'=>'pdf',
						),
					array(
							'titulo'=>'Carta de Aprobación Docente - Grupal',
							'file'=>'Carta_de_Aprobacion_Docente_Grupal.pdf',
							'tipo'=>'pdf',
						),
					array(
							'titulo'=>'Carta de Aprobación Tutor Academico - Grupal',
							'file'=>'Carta_de_Aprobacion_Tutor_Academico_Grupal.pdf',
							'tipo'=>'pdf',
						),
				),
		);



	$otros = array(
		array(
				'titulo'=>'Cronograma de Predefensas 2014-II Proyecto de Grado II, AIS',
				'file'=>$fileDescargas['cronograma_20142'],
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Reglamento para la Presentación de Predefensas de Trabajos de Investigación Tecnológicos',
				'file'=>$fileDescargas['reglamento_predefensas'],
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Formato Carta de Aceptación de la empresa, institución u organización',
				'file'=>$fileDescargas['carta_aceptacion'],
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Formato Carta de Implementación de la empresa, institución u organización',
				'file'=>$fileDescargas['carta_implementacion'],
				'tipo'=>'pdf',
			),
		array(
				'titulo'=>'Manual de Ayuda al Usuario sistema pGrado',
				'file'=>$fileDescargas['manual_usuario'],
				'tipo'=>'pdf',
			),
		);
?>

<div class="row">
	<div class="col-sm-9">

			<div class="formatos box box-default">
				<div class="box-header text-justify">
					<h3 class="box-title">Formatos para Presentar ante la Coordinacion de Proyecto de Grado</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="box-body">

					<div class="list-group">
						<h4><i class="fa fa-user"></i> Formatos Individuales</h4>
						<?php foreach ($formatos['indv'] as $formato) { ?>
							<div class="list-group-item">
								<div class="row">
									<div class="<?php echo $col_xs_izq.' '.$col_sm_izq.' '.$col_md_izq; ?>">
										<h4 class="list-group-item-heading"><?php echo $formato['titulo'];?></h4>
										<!--<p class="list-group-item-text"></p> -->
									</div>
									<div class="<?php echo $col_xs_der.' '.$col_sm_der.' '.$col_md_der; ?> text-center">
										<?php
											$link = '<i class="fa fa-download fa-2x"></i><br/><small>Descargar</small>';
											echo $this->Html->link($link,'/descargas/'.$formato['file'],array('escape'=>false));
										?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>

					<div class="list-group">
						<h4><i class="fa fa-users"></i> Formatos Grupales</h4>
						<?php foreach ($formatos['grup'] as $formato) { ?>
								<div class="list-group-item">
									<div class="row">
										<div class="<?php echo $col_xs_izq.' '.$col_sm_izq.' '.$col_md_izq; ?>">
											<h4 class="list-group-item-heading"><?php echo $formato['titulo'];?></h4>
											<!--<p class="list-group-item-text"></p> -->
										</div>
										<div class="<?php echo $col_xs_der.' '.$col_sm_der.' '.$col_md_der; ?> text-center">
											<?php
												$link = '<i class="fa fa-download fa-2x"></i><br/><small>Descargar</small>';
												echo $this->Html->link($link,'/descargas/'.$formato['file'],array('escape'=>false));
											?>
										</div>
									</div>
								</div>

						<?php } ?>
					</div>

				</div>

			</div>

			<div class="baremos box box-default">
				<div class="box-header text-justify">
					<h3 class="box-title">Baremos de Evaluación</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="list-group">
					<?php foreach ($baremos as $baremo) { ?>
							<div href="#" class="list-group-item">
								<div class="row">
									<div class="<?php echo $col_xs_izq.' '.$col_sm_izq.' '.$col_md_izq; ?>">
										<h4 class="list-group-item-heading"><?php echo $baremo['titulo'];?></h4>
										<!--<p class="list-group-item-text"></p> -->
									</div>
									<div class="<?php echo $col_xs_der.' '.$col_sm_der.' '.$col_md_der; ?> text-center">
										<?php
											$link = '<i class="fa fa-download fa-2x"></i><br/><small>Descargar</small>';
											echo $this->Html->link($link,'/descargas/'.$baremo['file'],array('escape'=>false));
										?>
									</div>
								</div>
							</div>

					<?php } ?>
					</div>
				</div>
			</div>

			<div class="otros box box-default">
				<div class="box-header text-justify">
					<h3 class="box-title">Otros</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="list-group">
					<?php foreach ($otros as $otro) { ?>
							<div href="#" class="list-group-item">
								<div class="row">
									<div class="<?php echo $col_xs_izq.' '.$col_sm_izq.' '.$col_md_izq; ?>">
										<h4 class="list-group-item-heading"><?php echo $otro['titulo'];?></h4>
										<!--<p class="list-group-item-text"></p> -->
									</div>
									<div class="<?php echo $col_xs_der.' '.$col_sm_der.' '.$col_md_der; ?> text-center">
										<?php
											$link = '<i class="fa fa-download fa-2x"></i><br/><small>Descargar</small>';
											echo $this->Html->link($link,'/descargas/'.$otro['file'],array('escape'=>false));
										?>
									</div>
								</div>
							</div>

					<?php } ?>
					</div>
				</div>
			</div>
	</div>

	<?php // echo $this->element('ayuda/main',array('ruta'=>'pages.descargas')); ?>

</div>





