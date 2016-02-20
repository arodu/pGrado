<?php $recaptcha = Configure::read('google_recaptcha'); ?>

<?php if($recaptcha){ ?>

	<div id="reCaptcha" class="g-recaptcha" style="margin: 0 auto;display: table;"></div>
	<div class="loading"><i class="fa fa-refresh fa-spin"></i> Cargando reCAPTCHA..</div>


	<?php echo $this->Html->script('https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',array('inline'=>false)); ?>

	<?php $this->Html->scriptStart(array('inline' => false)); ?>
		var verifyCallback = function(response) {
			//alert(response);
			$('#reCaptcha').closest('form').find('button[type="submit"],input[type="submit"]').removeClass('disabled');
		};

		var expiredCallback = function(response) {
			//alert(response);
			$('#reCaptcha').closest('form').find('button[type="submit"],input[type="submit"]').addClass('disabled');
		};

		var onloadCallback = function() {
			grecaptcha.render('reCaptcha', {
				'sitekey' : '<?php echo $recaptcha["sitekey"];?>',
				'callback' : verifyCallback,
				'expired-callback': expiredCallback,
			});

			$('.loading').remove();
		};

		$('#reCaptcha').closest('form').find('button[type="submit"],input[type="submit"]').addClass('disabled');
		
	<?php $this->Html->scriptEnd(); ?>

<?php } ?>