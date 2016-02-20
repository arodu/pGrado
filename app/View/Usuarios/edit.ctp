<div class="row">
	<div class="col-sm-9">
		<div class="usuarios form box">
		<?php echo $this->Form->create('Usuario',array('inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control'))); ?>
			<div class="box-body">
					<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cedula');
		echo $this->Form->input('password');
		echo $this->Form->input('nombres');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('sexo');
		echo $this->Form->input('email');
		echo $this->Form->input('sede_id');
		echo $this->Form->input('tipo_usuario_id');
		echo $this->Form->input('activo');
		echo $this->Form->input('admin');
		echo $this->Form->input('actualizado');
		echo $this->Form->input('observaciones');
		echo $this->Form->input('Categoria');
		echo $this->Form->input('Perfil');
	?>
					

			</div>
			<div class="box-footer">
				<?php echo $this->Form->submit('Guardar',array('class'=>'btn btn-primary', 'div'=>false)); ?>				<?php echo $this->Html->link('Cancelar',array('action'=>'index'),array('class'=>'btn btn-default')); ?>			</div>
			<?php echo $this->Form->end(); ?>
	</div>
		<!--<div class="col-sm-3">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title"></h3>
				</div>
				<div class="box-body">
				</div>
				<div class="box-footer">
				</div>
			</div>
		</div> -->
	</div>
</div>