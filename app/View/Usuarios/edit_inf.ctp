<?php // ----------------- HEADER ------------------- ?>
    <?php
        $this->assign('title-page', '<i class="fa fa-user fa-fw"></i> Perfil de Usuario <small>Editar datos del Usuario</small>');

        $bc = array(
            	'items'=>array(),
            	'config'=>array('activo'=>'Perfil de Usuario')
            );
        $this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
    ?>


<div class="row">
	<div class="col-sm-9">
		<div class="usuarios form box">
			<?php
			echo $this->Form->create('Usuario',array(
				'inputDefaults'=>array(
						'div'=>array('class'=>'form-group'),
						'label'=>array('class'=>'control-label'),
						'class'=>'form-control'
					)
				));?>

			<div class="box-body">
					<?php
						echo $this->Form->input('id');

						echo '<div class="form-group"><label class="control-label" for="UsuarioCedula">Cedula</label>';
						echo '<p class="form-control-static">'.$this->Form->value('cedula').'</p></div>';

						echo $this->Form->input('Usuario.nombres');
						echo $this->Form->input('Usuario.apellidos');
						echo $this->Form->input('Usuario.sexo',array(
								'label'=>'Genero',
								'options'=>array('F'=>'Femenino','M'=>'Masculino'),
								'empty'=>'-- seleccione --')
							);
						echo $this->Form->input('Usuario.email',array('label'=>'Correo Electronico'));
						//echo $this->Form->input('telefono', array('data-inputmask'=>'"mask": "(999) 999-9999"','data-mask'=>''));

						echo $this->Form->input('Usuario.sede_id',array('empty'=>'-- seleccione --'));

						echo '<hr/>';

						if( $tipo_usuario['code'] == 'profesor'){
							echo '<div class="row">';

								echo $this->Form->input('DescripcionTutor.id');

								echo $this->Form->input('DescripcionTutor.pos_inst',array('label'=>'Posición en la Institución','div'=>array('id'=>'target_pos_inst','class'=>'form-group col-md-4'),'empty'=>'-- seleccione --','options'=>$options['pos_inst']));

								echo $this->Form->input('DescripcionTutor.escalafon',array('type'=>'hidden','value'=>''));
								echo $this->Form->input('DescripcionTutor.escalafon',array('label'=>'Escalafón','div'=>array('id'=>'target_escalafon','class'=>'form-group col-md-4 required'),'empty'=>'-- seleccione --','required'=>'required','options'=>$options['escalafon']));

								echo $this->Form->input('DescripcionTutor.dedicacion',array('type'=>'hidden','value'=>''));
								echo $this->Form->input('DescripcionTutor.dedicacion',array('label'=>'Dedicación','div'=>array('id'=>'target_dedicacion','class'=>'form-group col-md-4 required'),'empty'=>'-- seleccione --','required'=>'required','options'=>$options['dedicacion']));

							echo '</div>';
							echo '<hr/>';
						}

							echo $this->Form->input('DescripcionUsuario.id');

							echo '<div class="row">';

								echo $this->Form->input('DescripcionUsuario.telf_cel', array('type'=>'tel','label'=>'Teléfono Celular','div'=>array('class'=>'form-group col-md-6'),'class'=>'mask-telef form-control'));

								echo $this->Form->input('DescripcionUsuario.telf_hab', array('type'=>'tel','label'=>'Teléfono de Habitación','div'=>array('class'=>'form-group col-md-6'),'class'=>'mask-telef form-control'));


							echo '</div>';

							echo '<div class="row">';
								echo $this->Form->input('DescripcionUsuario.direccion', array('label'=>'Dirección','div'=>array('class'=>'form-group col-md-12')));
							echo '</div>';

						echo '<hr/>';

							echo $this->Form->input('password_check',array('label'=>'Ingrese su contraseña actual','type'=>'password'));
					?>
			</div>

			<div class="box-footer">
					<?php echo $this->Form->submit('Guardar',array('class'=>'btn btn-primary', 'div'=>false)); ?>
					<?php echo $this->Html->link('Cancelar',array('controller'=>'usuarios','action'=>'view'),array('class'=>'btn btn-default')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

	<?php // echo $this->element('ayuda/main',array('ruta'=>'usuarios.edit')); ?>

</div>

<?php echo $this->Html->script('/libs/jquery-maskedinput/dist/jquery.maskedinput.min',array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$(function(){

		$('.mask-telef').mask("(9999)999-9999");

		$('#target_pos_inst select').change(function(){
			var val = $(this).val();
			if( val=='1' || val=='3'){
				$('#target_escalafon select').removeAttr('disabled');
				$('#target_dedicacion select').removeAttr('disabled');
			}else{
				$('#target_escalafon select').val(''); $('#target_escalafon select').attr('disabled','disabled');
				$('#target_dedicacion select').val(''); $('#target_dedicacion select').attr('disabled','disabled');
			}
		});

		$('#target_pos_inst select').each(function(){
			var val = $(this).val();
			if( val=='1' || val=='3'){
				$('#target_escalafon select').removeAttr('disabled');
				$('#target_dedicacion select').removeAttr('disabled');
			}else{
				$('#target_escalafon select').val(''); $('#target_escalafon select').attr('disabled','disabled');
				$('#target_dedicacion select').val(''); $('#target_dedicacion select').attr('disabled','disabled');
			}
		});

	});
<?php $this->Html->scriptEnd(); ?>
