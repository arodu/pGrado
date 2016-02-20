<?php $descargas = Configure::read('aplicacion.sistema.descargas'); ?>

<strong>Nombre empresa, institución u organización:</strong> donde se implementará la herramienta o solución tecnológica.<br/>

<strong>Direccion:</strong> del espacio físico o lugar donde se implementará la herramienta o solución tecnológica.<br/>

<strong>Cedula de la Persona de Contacto :</strong> del lugar o espacio físico donde se implementará la herramienta o solución tecnológica<br/>

<strong>Nombre y Apellido de la Persona de Contacto:</strong> de la empresa, institución u organización donde se implementará la herramienta o solución tecnológica.<br/>

<strong>Telefono de Contacto:</strong> Número de Telefono de la persona contácto de la empresa, institución u organización; preferiblemente un número local, que sea verificable<br/>

<strong>Carta de Aceptación:</strong> corresponde al memorando oficial donde la empresa, institución u organización acepta sea desarrollado e implementado la herramienta o solución tecnológica, debe estar debidamente membretado, firmado y sellado, y debe contener datos verificables como la dirección y teléfono. <?php echo $this->Html->link('<i class="fa fa-download"></i> Descargar Formato','/descargas/'.$descargas['carta_aceptacion'],array('escape'=>false)); ?><br/>

<strong>Carta de Implementación:</strong> corresponde al memorando oficial donde la empresa, institución u organización da constancia de que la herramienta o solución tecnológica ha sido implementada con pruebas alfas y betas, el mismo debe estar debidamente membretado, firmado y sellado, y debe contener datos verificables como la dirección y teléfono. <?php echo $this->Html->link('<i class="fa fa-download"></i> Descargar Formato','/descargas/'.$descargas['carta_implementacion'],array('escape'=>false)); ?><br/>