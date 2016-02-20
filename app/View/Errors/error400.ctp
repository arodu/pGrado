<!--
<h2><?php echo $message; ?></h2>
<p class="error">
	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>
<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?> -->

<?php
	$this->assign('title-page', $error->getCode().' <small>Error Page</small>');
	$bc = array('config'=>array('activo'=> $error->getCode().' Error Page'));
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));	
?>

<section class="content">
	<div class="error-page">
		<h2 class="headline text-danger"><?php echo $error->getCode();?></h2>
		<div class="error-content">
			<h3><i class="fa fa-warning text-danger"></i> Oops! Página no encontrada.</h3>
			<p class="error">
				<strong><?php echo __d('cake', 'Error'); ?>: </strong>
				<?php printf(
					__d('cake', 
						'La dirección solicitada %s no se encontró en este servidor.'),
					"<strong>'{$url}'</strong>"
				); ?>
			</p>
			<p class="error">
				<?php echo $this->Html->link('<i class="fa fa-reply"></i>&nbsp;Retorna a la Página de Inicio.','/',array('escape'=>false));?>
			</p>

			<?php echo $this->element('callout/danger',array('titulo'=>$message));?>
		</div><!-- /.error-content -->
	</div><!-- /.error-page -->
</section><!-- /.content -->

<?php
if (Configure::read('debug') > 0):
	echo $this->element('exception_stack_trace');
endif;
?>