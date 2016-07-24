<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Jurados',
		'subtitle'=>'Datos Impresión',
		'breadcrumb'=>array(
			__('Listado Proyectos')=>array('controller'=>'admin','action'=>'proyectos_index'),
			__('Datos Comunicaciones')=>true,
		)
	));
?>

<section class="content">
	<?php echo $this->Flash->render(); ?>
	<div class="row">
		<div class="col-sm-9">
			<div class="box box-primary">
				<?php echo $this->bsForm->create('Proyecto', array('class'=>'ajaxForm')); ?>
					<div class="box-body">
						<?php
							echo $this->bsForm->input('Proyecto.grupo_id',array(
									'id'=>'grupo_id',
									'empty'=>'-- seleccione --',
									'div'=>array('class'=>'form-group col-md-6 required')
								));

							echo $this->bsForm->input('Proyecto.fase_id',array(
									'id'=>'fase_id',
									'empty'=>'-- seleccione --',
									'div'=>array('class'=>'form-group col-md-6 required')
								));
						?>
					</div>
					<div class="box-footer">
						<?php echo $this->bsForm->button('Buscar...', array('type'=>'submit', 'name'=>'btn','value'=>'buscar', 'class'=>'btn btn-primary')); ?>
					</div>
				<?php echo $this->bsForm->end(); ?>
			</div>
		</div>
	</div>


	<div id="grupo-meta" class="row"></div>


</section>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxFormulario('#grupo-meta');
<?php echo $this->Html->scriptEnd(); ?>
