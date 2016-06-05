<p class="login-box-msg">Ingrese su Correo Electronico para recuperar su Contraseña</p>
<?php echo $this->Form->create('Usuario'); ?>

	<?php
		echo $this->Form->input('recover_email',array(
			'label'=>false,
			'type'=>'email',
			'div'=>array('class'=>'form-group has-feedback no-border-red'),
			'required'=>true,
			'class'=>'form-control',
			'placeholder'=>'Ingrese su Correo Electronico',
			'after'=>'<span class="glyphicon glyphicon-envelope form-control-feedback"></span>',
		));
	?>

	<?php if($mod_activo['external.google_recaptcha']){ ?>
		<div class="form-group">
			<?php echo $this->element('external/google_recaptcha'); ?>
		</div>
	<?php } ?>

	<div class="row">
		<div class="col-xs-12">
			<?php echo $this->Form->button('<i class="fa fa-send fa-fw"></i> Enviar Correo',
				array(
					'id'=>'loading',
					'type'=>'submit',
					'class'=>'btn btn-primary btn-block btn-flat',
					'data-loading-text'=>'Enviando, por favor espere...',
					'escape'=>false,
				)
			); ?>
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
