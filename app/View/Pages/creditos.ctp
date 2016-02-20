<?php
	$sisInfo = Configure::read('sistema.info');
	$sisVersion = Configure::read('sistema.version.largo');

	$this->assign('title-page', 'Créditos');

	$bc = array('config'=>array('activo'=>'Créditos'));
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));	
?>

<div class="row">
	<div class="col-sm-9">
		<div class="box box-primary">
			<div class="box-header">

				<h3 class="box-title"><?php echo '<strong><em>'.$sisInfo['icono'].$sisInfo['nombre'].':</em></strong> '.$sisInfo['descripcion'].' <small>v'.$sisVersion.'</small>';?></h3>

			</div>
			<div class="box-body">


				<p>
					Esta sistema fue desarrollado por los Ingenieros <a href="mailto:arodriguez@unerg.edu.ve">Alberto Rodriguez</a> y <a href="mailto:a.hernandez.unerg@gmail.com">Aholimar Hernandez</a> como trabajo de investigación para la <a href="http://www.unerg.edu.ve" target="_blank">Universidad Nacional Experimental de los Llanos Centrales Rómulo Gallegos</a>.
				</p>

				<p>
					Agredecimientos especiales a los desarrolladores de las diferentes aplicaciones que nos ayudaron a construir esta herramienta:

					<ul>
						<li>CakePhp: <?php echo $this->Html->link('cakephp.org','http://www.cakephp.org/',array('target'=>'_blank'));?></li>
						<li>jQuery: <?php echo $this->Html->link('jquery.com','http://jquery.com/',array('target'=>'_blank'));?></li>
						<li>Twitter Bootstrap: <?php echo $this->Html->link('getbootstrap.com','http://getbootstrap.com',array('target'=>'_blank'));?></li>
						<li>AdminLTE Template: <?php echo $this->Html->link(' almsaeedstudio.com','http://AlmsaeedStudio.com',array('target'=>'_blank'));?></li>
						<li>Font Awesome: <?php echo $this->Html->link(' fontawesome.io','http://fontawesome.io',array('target'=>'_blank'));?></li>
					</ul>
				</p>


			</div>
			<!-- <div class="box-footer">
			</div> -->
		</div>
	</div>
</div>