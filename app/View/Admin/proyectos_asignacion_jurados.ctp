<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Proyecto',
		'subtitle'=>'Editar Datos del Proyecto',
		'breadcrumb'=>array(
			__('Listado Proyectos')=>array('controller'=>'admin','action'=>'proyectos_index'),
			__('Ver Proyecto')=>array('controller'=>'proyectos','action'=>'view',$proyecto['Proyecto']['id']),
			__('Asignar Jurados')=>true,
		)
	));
?>
<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>


	<?php echo $this->Form->create('Proyecto',array('inputDefaults'=>array('div'=>array('class'=>'form-group col-md-12 required'),'class'=>'form-control'))); ?>

	<div class="row">
		<div class="col-sm-9">
			<div class="box box-primary">
				<div class="box-header">
					<h4><?php echo $proyecto['Revision']['titulo']; ?></h4>
					<ul class="list-unstyled">
						<?php foreach ($proyecto['Autor'] as $autor): ?>
							<li>
								<?php
									if($autor['TipoAutor']['code'] != 'estudiante'){
										echo '<strong>'.$autor['TipoAutor']['nombre'].': </strong>';
									}
									echo $autor['Usuario']['nombre_completo'];
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="box-body">

					<?php echo $this->bsForm->input('Proyecto.id',array('type'=>'hidden','value'=>$proyecto['Proyecto']['id'])); ?>

					<ul id="jurados-form" class="products-list product-list-in-box">

						<li class="item">
							<?php
								echo $this->Form->input('fase_id',array(
									'label'=>false,
									'required'=>true,
									'class'=>'form-control fases',
									'options'=>$fases,
									'div'=>'form-group col-md-6 required',
									'selected'=>$fase_id,
								));
							?>

							<div class="col-md-3">
								<span class="loading hidden text-info"><i class="fa fa-refresh fa-spin fa-fw"></i>Cargando...</span>
							</div>
						</li>


						<li class="item">

							<div class="form-group col-sm-4 col-xs-6">
						      <p class="form-control form-control-static">Tutor Académico</p>
						  </div>
							<div class="form-group col-sm-7 col-xs-6">
						      <p class="form-control form-control-static"><?php echo $tutoracad['Usuario']['nombre_completo'] ?></p>
							</div>

						</li>


						<?php $i = 0; ?>

						<?php if($jurados){ ?>
							<?php foreach ($jurados as $jurado) { ?>
								<li class="item">
									<?php
										echo $this->Form->input('Jurado.'.$i.'.id', array(
													'type'=>'hidden',
													'value'=>$jurado['Jurado']['id'],
												));

										echo $this->Form->input('Jurado.'.$i.'.tipo_jurado_id',array(
													'label'=>false,
													'empty'=>'-- Seleccione --',
													'required'=>true,
													'options'=>$tipo_jurados,
													'div'=>'form-group col-sm-4 col-xs-6 required',
													'selected'=>$jurado['Jurado']['tipo_jurado_id'],
												));

										echo $this->Form->input('Jurado.'.$i.'.usuario_id',array(
													'label'=>false,
													'empty'=>'-- Seleccione --',
													'class'=>'form-control usuarios',
													'required'=>true,
													'options'=>$usuarios,
													'div'=>'form-group col-sm-7 col-xs-6 required',
													'selected'=>$jurado['Jurado']['usuario_id'],
												));

										echo '<div class="col-sm-1 col-xs-12">';
											if( $i > 0 ){
												echo $this->Html->link('<i class="fa fa-minus"></i>','#',array(
														'class'=>'btn btn-default btn-rmv-jurado',
														'escape'=>false,
														'title'=>'Remover Jurado',
													));
											}else{
												echo $this->Html->link('<i class="fa fa-plus"></i>','#',array(
														'class'=>'btn btn-default btn-add-jurado',
														'escape'=>false,
														'title'=>'Agregar Otro Jurado',
													));
											}
										echo '</div>';

									?>
								</li>
								<?php $i++; ?>
							<?php } ?>
						<?php }else{ ?>

							<li class="item">
								<?php
									echo $this->Form->input('Jurado.0.id', array(
													'type'=>'hidden',
													'value'=>'',
												));

									echo $this->Form->input('Jurado.0.tipo_jurado_id',array(
												'label'=>false,
												'empty'=>'-- Seleccione --',
												'required'=>true,
												'options'=>$tipo_jurados,
												'div'=>'form-group col-sm-4 col-xs-6 required',
											));
									echo $this->Form->input('Jurado.0.usuario_id',array(
												'label'=>false,
												'empty'=>'-- Seleccione --',
												'class'=>'form-control usuarios',
												'required'=>true,
												'options'=>$usuarios,
												'div'=>'form-group col-sm-7 col-xs-6 required',
											));

									echo '<div class="col-sm-1 col-xs-12">';
										echo $this->Html->link('<i class="fa fa-plus"></i>','#',array(
														'class'=>'btn btn-default btn-add-jurado',
														'escape'=>false,
														'title'=>'Agregar Otro Jurado',
													));
									echo '</div>';
								?>
							</li>
							<?php $i++; ?>
						<?php } ?>



					</ul>

					<!-- <hr/>
					<div class="form-group col-md-12">
						<a class="btn btn-default btn-add-jurado pull-right">
							<i class="fa fa-plus"></i> Agregar otro Jurado
						</a>
					</div> -->

				</div>

				<div class="box-footer">
					<?php echo $this->Form->submit('Guardar',array('class'=>'btn btn-primary', 'div'=>false)); ?>
					<?php echo $this->Form->reset('Reset',array('class'=>'btn btn-default', 'div'=>false)); ?>
					<?php echo $this->Html->link('Cancelar',array('action'=>'view',$proyecto['Proyecto']['id']),array('class'=>'btn btn-default')); ?>
				</div>

			</div>

		</div>

		<div class="col-sm-3">
			<div class="box box-success">
				<!--<div class="box-header">
					<h4 class="text-justify">Proyectos</h4>
				</div> -->
				<div class="box-body">

					<?php

						if($fase['Fase']['code'] == 'defensa'){
							echo $this->Html->link('<i class="fa fa-print fa-fw"></i> Carta de Asignación',
									array('controller'=>'jurados','action'=>'cartas_asignacion_defensa',0,$proyecto['Proyecto']['id'],'admin'=>false),
									array('class'=>'btn btn-success btn-block','target'=>'_blank','escape'=>false));
							echo $this->Html->link('<i class="fa fa-print fa-fw"></i> Acta de Evaluación',
								array('controller'=>'jurados','action'=>'actas_evaluacion_defensa',0,$proyecto['Proyecto']['id'],'admin'=>false),
								array('class'=>'btn btn-success btn-block','target'=>'_blank','escape'=>false));
						}
					?>
				</div>
			</div>
		</div>
	</div>


	<?php echo $this->Form->end(); ?>

	<?php $this->Html->scriptStart(array('inline' => false)); ?>

		$(function(){

			$('.fases').on('change',function(){
				var option = $(this).find('option:selected');
				var url = "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'asignacion_jurados','admin'=>true,$proyecto['Proyecto']['id'])); ?>";
				url = url +"/"+ option.val();

	 			window.location = url;
	 			$('.loading').removeClass('hidden');

	 			//window.open(url);
			});

			var item = <?php echo $i;?>;

			$('.btn-add-jurado').on('click',function(){

				var li = $('<li/>')
	        		.addClass('item')
	        		.appendTo('#jurados-form');

				li.html( $('#agregar-jurado').html() );

				li.find('#id')
					.attr('id','Jurado'+item+'id')
					.attr('name','data[Jurado]['+item+'][id]');

				li.find('#tipo_jurado_id')
					.attr('id','Jurado'+item+'tipo_jurado_id')
					.attr('name','data[Jurado]['+item+'][tipo_jurado_id]');

				li.find('#usuario_id')
					.attr('id','Jurado'+item+'usuario_id')
					.attr('name','data[Jurado]['+item+'][usuario_id]');

				item++;

				li.find('.btn-rmv-jurado')
					.on('click',function(){
						$(this).closest('.item').remove();
						return false;
					});

				usuariosChange();

				return false;

			});

			$('.btn-rmv-jurado').on('click',function(){
				$(this).closest('.item').remove();
				return false;
			});

			usuariosChange();

		});

		function usuariosChange(){
			/*$('.usuarios').on('change',function(){
				var option = $(this).find('option:selected');

				$('select option[value="' + option.val() + '"]').attr('disabled','disabled');

				option.removeAttr('disabled');
			});*/
		}

	<?php $this->Html->scriptEnd(); ?>


	<div id="agregar-jurado" class="hidden">
		<?php 	echo $this->Form->input('id', array(
							'type'=>'hidden',
							'value'=>'',
						));

				echo $this->Form->input('tipo_jurado_id',array(
							'label'=>false,
							'empty'=>'-- Seleccione --',
							'required'=>true,
							'options'=>$tipo_jurados,
							'div'=>'form-group col-sm-4 col-xs-6 required',
						));

				echo $this->Form->input('usuario_id',array(
							'label'=>false,
							'empty'=>'-- Seleccione --',
							'class'=>'form-control usuarios',
							'required'=>true,
							'options'=>$usuarios,
							'div'=>'form-group col-sm-7 col-xs-6 required',
						));

				echo '<div class="col-sm-1 col-xs-12">';
				echo $this->Html->link('<i class="fa fa-minus"></i>','#',array(
							'class'=>'btn btn-default btn-rmv-jurado',
							'escape'=>false,
						));
				echo '</div>';
		?>
	</div>

</section>
