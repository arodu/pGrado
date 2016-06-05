<p class="login-box-msg">Registro de Nuevos Usuarios</p>
<?php echo $this->Form->create('Usuario'); ?>

	<?php
		echo $this->Form->input('nueva_cedula',array(
			'label'=>false,
			'type'=>'number',
			'div'=>array('class'=>'form-group no-border-red'),
			'required'=>true,
			'class'=>'form-control',
			'placeholder'=>'Cedula de Identidad',
		));

		echo $this->Form->input('email',array(
			'label'=>false,
			'type'=>'email',
			'div'=>array('class'=>'form-group no-border-red'),
			'required'=>true,
			'class'=>'form-control',
			'placeholder'=>'Correo Electronico',
		));

		echo $this->Form->input('email_confirm',array(
			'label'=>false,
			'type'=>'email',
			'div'=>array('class'=>'form-group no-border-red'),
			'required'=>true,
			'class'=>'form-control',
			'placeholder'=>'Confirmacion de Correo Electronico',
		));

		echo $this->Form->input('password',array(
			'label'=>false,
			'type'=>'password',
			'div'=>array('class'=>'form-group no-border-red'),
			'required'=>true,
			'class'=>'form-control',
			'placeholder'=>'Contraseña',
		));

		echo $this->Form->input('password_confirm',array(
			'label'=>false,
			'type'=>'password',
			'div'=>array('class'=>'form-group no-border-red'),
			'required'=>true,
			'class'=>'form-control',
			'placeholder'=>'Confirmacion de Contraseña',
		));
	?>

	<?php if($mod_activo['external.google_recaptcha']){ ?>
		<div class="form-group">
			<?php echo $this->element('external/google_recaptcha'); ?>
		</div>
	<?php } ?>

	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->Form->button('<i class="fa fa-arrow-circle-right"></i> Guardar Registro',
				array(
					'type'=>'submit',
					'class'=>'btn btn-primary btn-block btn-flat',
					'escape'=>false,
				)
			);?>
		</div>
	</div>

	<br/>

	<?php echo $this->Html->link('<i class="fa fa-caret-left"></i> Ya me encuentro registrado',array('controller'=>'usuarios','action'=>'login'),array('escape'=>false)); ?>

<?php echo $this->Form->end(); ?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$('#loading').on('submit', function () {
		var b = $(this);
		b.button("loading");
	})

	// Recargar Captcha
	$('.btn-reload').on('click', function() {
		var img = $(this).closest('.panel-reload').find('.img-reload');
		var mySrc = img.attr('src');
		var glue = '?';
		if(mySrc.indexOf('?')!=-1)  { glue = '&'; }
		img.attr('src', mySrc + glue + new Date().getTime());
		return false;
	});

<?php $this->Html->scriptEnd(); ?>
