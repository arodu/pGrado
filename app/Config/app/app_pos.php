<?php
	// Lenguaje de i18n
	Configure::write('Config.language', 'esp_pos');
	//$config['Config']['language'] = 'esp_pos';

	$config['proyectos']['cantidad']['tipo_autor']['estudiante'] = 1;


	$config['sistema']['modulos'] = array(
			'main.mensajes'	 => false,
			'proyecto.archivos' => false,
			'proyecto.escenarios' => false,
			'proyecto.comentarios'=> false,
			'proyecto.jurados'=> true,
		);
