<div class="row">
	<div class="col-sm-9">
		<div class="usuarios form box">
			<?php echo $this->Form->create('Usuario',array('inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control')));?>
			<div class="box-body">
					<?php
						echo $this->Form->input('id');
						echo $this->Form->input('Categoria',array(
									'class'=>'checkbox',
									//'options'=>$categorias,
									'multiple' => 'checkbox'
								));
						echo '<hr/>';
						echo $this->Form->input('password_check',array('label'=>'Ingresa tu Contraseña Actual','type'=>'password'));
					?>		
			</div>
			<div class="box-footer">
					<?php echo $this->Form->submit('Guardar',array('class'=>'btn btn-primary', 'div'=>false)); ?>
					<?php echo $this->Html->link('Cancelar',array('controller'=>'usuarios','action'=>'view'),array('class'=>'btn btn-default')); ?>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<?php // echo $this->element('ayuda/main',array('ruta'=>'usuarios.editpassword')); ?>
</div>