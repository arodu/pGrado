<p class="login-box-msg">Ingrese con su Numero de Cedula y Contraseña</p>
<?php echo $this->Form->create('Usuario'); ?>

	<?php echo $this->Form->input('cedula',array(
		'id'=>'login-cedula',
		'placeholder'=>'Numero de Cedula',
		'label'=>false,
		'type'=>'number',
		'required'=>true,
		'div'=>array('class'=>'form-group has-feedback no-border-red'),
		'class'=>'form-control',
		'after'=>'<span class="glyphicon glyphicon-user form-control-feedback"></span>',
	)); ?>


	<?php echo $this->Form->input('password',array(
		'id'=>'login-password',
		'placeholder'=>'Contraseña',
		'label'=>false,
		'type'=>'password',
		'required'=>true,
		'div'=>array('class'=>'form-group has-feedback no-border-red'),
		'class'=>'form-control',
		'after'=>'<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
	)); ?>

	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->Form->button('<i class="fa fa-sign-in fa-fw"></i> Ingresar',
				array(
					'type'=>'submit',
					'class'=>'btn btn-primary btn-block btn-flat',
					'escape'=>false,
				)
			);?>
		</div>
	</div>

	<br/>
	<div class="row">
		<div class="col-xs-6 text-center"><?php echo $this->Html->link('Recuperar Contraseña',array('controller'=>'usuarios','action'=>'recover'),array('escape'=>false));?></div>
		<div class="col-xs-6 text-center"><?php echo $this->Html->link('Registrar Nueva Cuenta',array('controller'=>'usuarios','action'=>'register'),array('escape'=>false)); ?></div>
	</div>

<?php echo $this->Form->end(); ?>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
	
<?php $this->Html->scriptEnd(); ?>