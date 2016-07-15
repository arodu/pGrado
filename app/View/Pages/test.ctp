<?php

	// echo '<hr/>';
		$options = array(
				'1'=>array(
						'1.1'=>array(
								'opcion 1.1.1','opcion 1.1.2','opcion 1.1.3',
							),
						'1.2'=>array(
								'opcion 1.2.1','opcion 1.2.2','opcion 1.2.3',
							),
					),
				'2'=>array(
						'2.1'=>array(
								'opcion 2.1.1','opcion 2.1.2','opcion 2.1.3',
								'opcion 2.1.4'=>array(
										'2.1.4.1','2.1.4.2'=>array('no'),
										'2.1.4.3','2.1.4.4',
									),
							),
						'2.2'=>array(
								'opcion 2.2.1','opcion 2.2.2','opcion 2.2.3',
							),
					),
				'Opcion 3'
			);

	echo $this->bsForm->create('Proyecto');


	echo $this->bsForm->selectMultilevel('Proyecto.grupo_id', array('options'=>$options, 'id'=>'grupito','empty'=>'-- Seleccione --'));
	echo $this->bsForm->selectMultilevel('Proyecto.grupo_id', $options, array('id'=>'grupito','empty'=>'-- Seleccione --'));
	echo $this->bsForm->input('Proyecto.grupo_id',
		array(
			'required'=>true,
			'options'=>$options,
			'div'=>array('class'=>'form-group '),
			'label'=>'Seleccion de Grupos',
			'type'=>'selectMultilevel',
			'class'=>'form-control',
			'empty'=>'-- Seleccione un Grupo --'
		)
	);


	echo $this->bsForm->input('Proyecto.grupo_id',array('type'=>'static_form', 'label'=>'Prueba de Static', 'class'=>''));

	?>
	<hr/>
	<?php


		echo $this->bsForm->input('Proyecto.group_id',array('div'=>array('class'=>'form-group'),'label'=>'<i class="fa fa-cog fa-spin"></i> Seleccion de Grupos','type'=>'checkbox'));
	?>


	<?php // echo $this->bsForm->input('activar',array('type'=>'bsCheckbox','before'=>'asdasd','div'=>array('class'=>'checkbox'))); ?>

	<?php // echo $this->Form->input('activar',array('type'=>'checkbox','class'=>'form-control','div'=>array('class'=>'form-group'))); ?>

	<?php

		// echo $this->bsForm->input('activar',array('type'=>'checkbox'));

		echo $this->bsForm->bsCheckbox('activar', array('label'=>'Activar el Proyecto'));

		echo $this->bsForm->input('activar',array('type'=>'bsCheckbox','label'=>'Activar el Proyecto'));

		echo $this->bsForm->input('activar',array('type'=>'bsCheckbox','label'=>'Activar el Proyecto','div'=>array('tag'=>'span')));

	?>


<?php
		/* $value = "Hola Mundo!!!";


		$key = 'wt1U5MACWJFTXGenFoZoiLwQGrLgdbHA';

		/*
		$result = Security::encrypt($value, $key);

		echo urlencode($result).'<br/>';

		$result = Security::decrypt($result, $key);

		echo $result;

		echo '<br/>';
		echo '<br/>'; */


		//echo Security::generateAuthKey();

		/*
		$sha1 = Security::hash('1234', 'sha1', true);
		echo urlencode($sha1);
		echo '<br/>';

		// Using a custom salt value
		$md5 = Security::hash('1234', 'md5', true);
		echo urlencode($md5);
		echo '<br/>';

		// Using the default hash algorithm
		$hash = Security::hash('1234');
		echo urlencode($hash);
		echo '<br/>';
		*/


?>


<?php echo $this->element('commons/contact-botons', array('text'=>false,'animado'=>true)); ?>
