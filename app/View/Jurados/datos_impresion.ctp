<?php
	$this->assign('title-page', 'Datos Impresión <small>Agregar/Editar</small>');

	$bc = array(
			'items'=>array(
					0 => array('title'=>'Admin'),
				),
			'config'=>array('activo'=>'Datos Comunicaciones')
		);
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));	
?>

<?php echo $this->Form->create('Proyecto',array('inputDefaults'=>array('div'=>array('class'=>'form-group col-md-6 required'),'class'=>'form-control'))); ?>
<div class="row">
	<div class="col-sm-9">
		<div class="box box-primary">

			<!--
			<div class="box-header">
				<h4 class="text-justify"></h4>
			</div> -->

			<div class="box-body">
				<?php
					echo '<div class="proyectos-opciones row">';

						echo $this->Form->input('Proyecto.grupo_id',array(
								'id'=>'grupo_id',
								'empty'=>'-- seleccione --',
								'div'=>array('class'=>'form-group col-md-6 required')
							));

						echo $this->Form->input('Proyecto.fase_id',array(
								'id'=>'fase_id',
								'empty'=>'-- seleccione --',
								'div'=>array('class'=>'form-group col-md-6 required')
							));

					echo '</div>';

					echo '<div class="grupo-meta row">';
						if(isset($grupo_meta) && $grupo_meta==true){

							echo $this->requestAction(
									array(
										'controller' => 'jurados',
										'action' => 'grupo_meta',
										$this->Form->value('Proyecto.grupo_id'),
										$this->Form->value('Proyecto.fase_id'),
									),
									array('return')
							);
						}
					echo '</div>';

				?>
			</div>

			<div class="box-footer">
				<?php echo $this->Form->button('<i class="fa fa-save fa-fw"></i> Guardar Datos',array(
						'type'=>'submit',
						'class'=>'btn btn-primary',
						'name'=>'boton','value'=>'guardar',
						'div'=>false,
						'escape'=>false
					)); ?>
				<?php echo $this->Form->reset('Reset',array('class'=>'btn btn-default', 'div'=>false)); ?>
				<?php echo $this->Html->link('Cancelar','/',array('class'=>'btn btn-default')); ?>
			</div>
		</div>
	</div>

	<div class="col-sm-3">
		<div class="box box-success">
			<div class="box-header">
				<h4>Proyectos Encontrados: <span class="cant-proyectos">0</span></h4>
			</div>
			<div class="box-body">
				<?php echo $this->Form->button('<i class="fa fa-print fa-fw"></i> Generar Comunicaciones',array(
						'type'=>'submit',
						'class'=>'btn btn-success btn-block',
						'name'=>'boton','value'=>'comunicacion',
						'div'=>false,
						'escape'=>false
					)); ?>

				<?php echo $this->Form->button('<i class="fa fa-print fa-fw"></i> Generar Actas de Evaluación',array(
						'type'=>'submit',
						'class'=>'btn btn-success btn-block',
						'name'=>'boton','value'=>'actas_evaluacion',
						'div'=>false,
						'escape'=>false
					)); ?>


			</div>	
		</div>
	</div>


</div>


<?php echo $this->Form->end(); ?>


<?php echo $this->Html->css('/libs/datepicker/datepicker3',array('inline'=>false)); ?>
<?php echo $this->Html->script('/libs/datepicker/bootstrap-datepicker',array('inline'=>false)); ?>
<?php echo $this->Html->script('/libs/datepicker/locales/bootstrap-datepicker.es',array('inline'=>false)); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>

	function grupo_meta(){

		$('.datepicker').datepicker({
			format: "dd-mm-yyyy",
			todayBtn: "linked",
			language: "es",
			autoclose: true
		});

		$('.cant-proyectos').text( $('#cant-proyectos').text() );
	}



	$(function(){

		grupo_meta();



		$('.proyectos-opciones select').on('change',function(){
			var opt = 0;

			$('.proyectos-opciones select').each(function(){
				if(!$(this).val()){
					opt++;
				}
			});

			if(opt == 0){

				var grupo_id = $('#grupo_id').val();
				var fase_id = $('#fase_id').val();

				$.ajax({
					method: "POST",
					url: "<?php echo $this->Html->url(array('action'=>'grupo_meta')); ?>/"+grupo_id+"/"+fase_id,
					//data: { name: "John", location: "Boston" },
					beforeSend: function(){
						$('.grupo-meta').html('<hr/><div class="col-xs-12"><i class="fa fa-refresh fa-spin"></i> Cargando...</div>');
					},
					success: function(msg){
						$('.grupo-meta').html(msg);
					}
				});

			}else{
				$('.grupo-meta').html("");
			}
		});

	});
<?php $this->Html->scriptEnd(); ?>