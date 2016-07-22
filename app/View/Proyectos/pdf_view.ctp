<?php
error_reporting(false);

$verf = crypt($proyecto['Proyecto']['id'].$proyecto['Revision'][0]['updated'], 'rl');

$revision = $proyecto['Revision'][0];
// debug($proyecto_autor);
$tutor_academico = null;

$cant_estudiantes=0;
$cant_tutores=0;
foreach($proyecto['Autor'] as $autor){
	if($autor['TipoAutor']['code'] == 'estudiante'){
		$cant_estudiantes++;
	}else{
		$cant_tutores++;
	}
}

?>

<h3>Planilla 001 - Proyecto</h3>
<div class="text-justify">
	<strong><?php echo $revision['titulo'];?></strong>
</div>
<div class="text-right">
	<strong><?php echo (($cant_estudiantes >= 2) ? 'Autores' : 'Autor');?></strong>
	<?php
		foreach ($proyecto['Autor'] as $autor) {
			if($autor['TipoAutor']['code']=='estudiante'){
				echo '<div>'.$autor['Usuario']['cedula_nombre_completo'].'</div>';
			}elseif($autor['TipoAutor']['code']=='tutoracad'){
				$tutor_academico = $autor['Usuario']['nombre_completo'];
			}
		}

		if($tutor_academico){
			echo '<div><strong>Tutor Académico: </strong>'.$tutor_academico.'</div>';
		}
	?>
</div>
<div id="proyecto">
	<div class="text-center"><strong>Datos del Proyecto</strong></div>
	<div>
		<?php echo '<strong>Tema: </strong>'.$proyecto['Proyecto']['tema'] ?><br/>
		<?php echo '<strong>'.__('Categoria').': </strong>'.$proyecto['Categoria']['nombre'] ?><br/>
		<?php echo '<strong>Sede: </strong>'.$proyecto['Sede']['nombre'] ?><br/>
		<?php echo '<strong>Fase: </strong>'.$proyecto['Fase']['nombre'] ?><br/>
		<?php echo '<strong>Estatus: </strong>'.$proyecto['Estado']['nombre'] ?><br/>
		<?php echo '<strong>Grupo: </strong>'.$proyecto['Grupo']['nombre'] ?><br/>
		<?php echo '<strong>Numeral: </strong>'.$proyecto['Proyecto']['id'] ?><br/>
	</div>
</div>
<div id="autor">
	<div class="text-center"><strong>Datos del Autor</strong></div>
	<div>
		<?php foreach ($proyecto['Autor'] as $autor) {
			if($autor['TipoAutor']['code']=='estudiante'){
				//debug($autor);
				$aux=null;
				$aux[] = $autor['Usuario']['cedula_nombre_completo'];
				$aux[] = $autor['Usuario']['email'];
				if(isset($autor['Usuario']['DescripcionUsuario']['telf_cel'])){ $aux[] = $autor['Usuario']['DescripcionUsuario']['telf_cel']; }
				if(isset($autor['Usuario']['DescripcionUsuario']['telf_hab'])){ $aux[] = $autor['Usuario']['DescripcionUsuario']['telf_hab']; }

				echo implode(' / ', $aux).'<br/>';
			}
		} ?>

	</div>
</div>
<div id="resumen">
	<div class="text-center"><strong>Resumen</strong></div>
	<div class="text-justify"><?php echo $revision['resumen'];?></div>

	<div class="text-justify">
		<strong>Palabras Clave: </strong><?php echo implode('; ', explode(',',$revision['etiquetas']));?></div>
</div>
<div id="descripcion">
	<div class="text-center"><strong>Descripción</strong></div>
	<div class="text-justify"><?php echo $revision['descripcion'];?></div>
</div>
<div id="escenario">
	<div class="text-center"><strong>Escenario</strong></div>
	<?php if($proyecto['Escenario']['id'] != null){ ?>
		<?php echo '<strong>Nombre: </strong>'.$proyecto['Escenario']['nombre'] ?><br/>
		<?php echo '<strong>Dirección: </strong>'.$proyecto['Escenario']['direccion'] ?><br/>
		<?php echo '<strong>Contacto: </strong>'.$proyecto['Escenario']['persona'] ?><br/>
		<?php echo '<strong>Telefono: </strong>'.$proyecto['Escenario']['telefono'] ?><br/>
		<?php echo '<strong>Carta de Aceptación: </strong>'. ($proyecto['Escenario']['carta_aceptacion'] ? 'Si' : 'No' ); ?><br/>
		<?php echo '<strong>Carta de Implementación: </strong>'. ($proyecto['Escenario']['carta_implementacion'] ? 'Si' : 'No' ); ?><br/>
	<?php }else{
			echo '<p>Sin Escenario de Proyecto</p>';
	} ?>
</div>
<div id="observaciones">
	<div class="text-center"><strong>Observaciones</strong></div>
	<div class="text-justify"><?php
		if($revision['observaciones'] == ''){
			echo '<small><em>Sin Observaciones</em></small>';
		}else{
			echo $revision['observaciones'];
		}
		?></div>
</div>
<div id="usuario" class="text-right text-muted">
	<small><strong>Actualización: </strong><em><?php echo $revision['Usuario']['nombre_completo'].' - '.$this->General->dateTimeFormatView($revision['updated']);?>,</em> <?php echo $verf;?></small>
</div>
