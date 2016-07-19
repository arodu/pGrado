<?php

	$s = ";";
	$str = "\"";
	$salto = "\n";

	echo __('Numeral').$s;
	echo __('Tema').$s;
	echo __('Cedula Autor 1').$s;
	echo __('Autor 1').$s;
	echo __('Cedula Autor 2').$s;
	echo __('Autor 2').$s;
	echo __('Tutor').$s;
	echo __('Programa').$s;
	echo __('Categoria').$s;
	echo __('Fase').$s;
	echo __('Estado').$s;
	echo __('Grupo').$s;
	echo __('Sede');
	echo $salto;

	foreach ($proyectos as $proyecto) {

		$estudiante = null;
		$tutor = null;

		foreach($proyecto['Autor'] as $autor){
			if($autor['TipoAutor']['code'] == 'estudiante'){
				$estudiante[] = array('cedula' => $autor['Usuario']['cedula'], 'nombre_completo' => $autor['Usuario']['nombre_completo']);
			}elseif($autor['TipoAutor']['code'] == 'tutoracad'){
				$tutor = array('cedula' => $autor['Usuario']['cedula'], 'nombre_completo' => $autor['Usuario']['nombre_completo']);
			}
		}

		//debug($proyecto);

		echo $proyecto['Proyecto']['id'].$s;
		echo $str.$proyecto['Proyecto']['tema'].$str.$s;
		echo $str.$estudiante[0]['cedula'].$str.$s;
		echo $str.$estudiante[0]['nombre_completo'].$str.$s;
		echo $str.( isset($estudiante[1]['cedula']) ? $estudiante[1]['cedula'] : '' ).$str.$s;
		echo $str.( isset($estudiante[1]['nombre_completo']) ? $estudiante[1]['nombre_completo'] : '' ).$str.$s;
		echo $str.$tutor['nombre_completo'].$str.$s;
		echo $str.$proyecto['Programa']['nombre'].$str.$s;
		echo $str.$proyecto['Categoria']['nombre'].$str.$s;
		echo $str.$proyecto['Fase']['nombre'].$str.$s;
		echo $str.$proyecto['Estado']['nombre'].$str.$s;
		echo $str.$proyecto['Grupo']['nombre'].$str.$s;
		echo $str.$proyecto['Sede']['nombre'].$str;
		echo $salto;
	}

?>
