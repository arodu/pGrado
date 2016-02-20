<?php
$sistemaInfoNombre = Configure::read('sistema.info.nombre');

$title_for_layout = ( $title_for_layout!=false ? ' | '.$title_for_layout : '');

echo $sistemaInfoNombre.' | AIS UNERG | Proyecto de Grado'.$title_for_layout;
?>