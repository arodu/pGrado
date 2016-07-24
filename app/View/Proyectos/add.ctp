<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Proyectos',
		'subtitle'=>'Agregar',
		'breadcrumb'=>array(
			__('Proyectos')=>array('controller'=>'proyectos','action'=>'index'),
			__('Agregar Proyecto')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-sm-9">
			<div class="box">
				<?php echo $this->Form->create('Proyecto',array('inputDefaults'=>array('div'=>array('class'=>'form-group well well-sm'),'class'=>'form-control'))); ?>
				<div class="box-body">

					<?php
						echo $this->Form->input('Revision.titulo',array('label'=>'Título'));

						echo $this->Form->input('Proyecto.tema',array('label'=>'Tema de Investigación'));

						echo '<div class="row">';
							echo '<div class="col-md-6">';
							echo $this->Form->input('Proyecto.programa_id',array('label'=>__("Programa de Estudio"),'empty'=>'-- seleccione --','div'=>array('id'=>'programas','class'=>'form-group well well-sm')));
							echo '</div>';

							echo '<div class="col-md-6 ">';

								echo '<div class="form-group well well-sm required" id="categorias">';
									echo '<label class="control-label">Linea de Investigación</label> ';
									echo '<small>(Seleccione Programa de Estudio)</small>';
									echo '<span class="form-control-static form-control bg-gray text-muted">';
										echo '<em><i class="fa fa-ban fa-fw"></i> Sin Lineas de Investigación</em>';
									echo '</span>';
								echo '</div>';

							echo '</div>';
						echo '</div>';


						echo '<div class="row">';
							echo '<div class="col-md-6 ">';
							echo $this->Form->input('Proyecto.grupo_id',array('empty'=>'-- seleccione --'));
							echo '</div>';

							echo '<div class="col-md-6">';
							echo $this->Form->input('Autor.tutor_id',array('label'=>'Tutor Académico','options'=>$tutors,'empty'=>'-- seleccione --'));
							echo '</div>';
						echo '</div>';

						echo $this->Form->input('Revision.resumen',array('class'=>'form-control textarea-wysihtml5'));

						echo $this->Form->input('Revision.etiquetas',array('label'=>'Palabras Clave ','between'=>'&nbsp;<span>separadas por coma ( , )</span>'));

						echo $this->Form->input('Revision.descripcion',array('label'=>'Descripción','class'=>'form-control textarea-wysihtml5'));

						echo $this->Form->input('Revision.observaciones',array('class'=>'form-control textarea-wysihtml5'));

						//echo $this->Form->input('usuario_id');
						//echo $this->Form->input('Revision.metadata');
					?>
				</div>

				<div class="box-footer">
					<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar Propuesta',array('type'=>'submit','class'=>'btn btn-primary',));?>

					<?php echo $this->Html->link('<i class="fa fa-reply fa-fw"></i> Cancelar',array('controller'=>'proyectos','action'=>'index'),array('class'=>'btn btn-default','escape'=>false)); ?>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>

		<?php echo $this->element('ayuda/main',array('ruta'=>'proyectos.add')); ?>

	</div>


	<?php
		echo $this->Html->script('/libs/wysihtml5/dist/wysihtml5-0.3.0.min',array('inline'=>false));
		echo $this->Html->css('/libs/bootstrap3-wysihtml5/dist/bootstrap-wysihtml5-0.0.2',array('inline'=>false));
		echo $this->Html->script('/libs/bootstrap3-wysihtml5/dist/bootstrap-wysihtml5-0.0.2',array('inline'=>false));
		echo $this->Html->script('/mods/bootstrap3-wysihtml5/bootstrap-wysihtml5.es-MO',array('inline'=>false));
	?>
	<?php $this->Html->scriptStart(array('inline' => false)); ?>
		$(function(){
			$('.textarea-wysihtml5').each(function(){

				$(this).wysihtml5({
							"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
							"emphasis": true, //Italics, bold, etc. Default true
							"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
							"html": false, //Button which allows you to edit the generated HTML. Default false
							"link": true, //Button to insert a link. Default true
							"image": true, //Button to insert an image. Default true,
							"color": false, //Button to change color of font
							"size": 'sm',
							"fa": true,
							locale: "es-MO",
					});
			});

			$('.wysihtml5-toolbar').addClass('pull-right');

			$('#programas select').change(function(){
				var programa_id = $(this).val();
				var url = '<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'getCategoria')); ?>';
				var $divCategorias = $('#categorias');

				var $divCategoriasLabel = $divCategorias.find('label');

				$.ajax({
					url: url+'/'+programa_id,
					dataType: 'html',
					beforeSend: function(){
						$divCategorias.find('select').attr('disabled',true);

						$divCategoriasLabel.html('<i class="fa fa-refresh fa-spin"></i> '+$divCategoriasLabel.html() );

					},
					success: function(data) {
						$divCategorias.html(data);
					}
				});
			});
		});

	<?php $this->Html->scriptEnd(); ?>

</section><!-- /.content -->
