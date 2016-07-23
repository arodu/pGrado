<?php
	$contactos = Configure::read('sistema.contactos');

	$classAn = '';
	if(isset($animado) && $animado == true){
		$classAn = 'btngroup-contactos-animado';
	}
?>
<div class="text-center">
	<?php if(isset($text) && $text == false){

	}else{ ?>
		<div>Conectate con Nosotros:</div>
	<?php } ?>
	<div class="btngroup-contactos <?php echo $classAn;?>" style="font-size:.8em;">
		<a href="<?php echo $contactos['unerg']['url'];?>" class="contact-icon" title="<?php echo $contactos['unerg']['url'];?>" target="_blank">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x text-blue"></i>
				<i class="fa fa-university fa-stack-1x fa-inverse"></i>
			</span>
			<div class="text-link bg-blue"><?php echo $contactos['unerg']['url'];?></div>
		</a>

		<a href="<?php echo $contactos['unerg']['network'];?>" class="contact-icon" title="<?php echo $contactos['unerg']['network'];?>" target="_blank">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x text-green"></i>
				<i class="fa fa-home fa-stack-1x fa-inverse"></i>
			</span>
			<div class="text-link bg-green"><?php echo $contactos['unerg']['network'];?></div>
		</a>

		<a href="<?php echo $contactos['facebook']['url'];?>" class="contact-icon" title="<?php echo $contactos['facebook']['url'];?>" target="_blank">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x text-light-blue"></i>
				<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
			</span>
			<div class="text-link bg-light-blue"><?php echo $contactos['facebook']['url'];?></div>
		</a>

		<a href="mailto:<?php echo $contactos['email'];?>" class="contact-icon" title="<?php echo $contactos['email'];?>" target="_blank">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x text-yellow"></i>
				<i class="fa fa-at fa-stack-1x fa-inverse"></i>
			</span>
			<div class="text-link bg-yellow"><?php echo $contactos['email'];?></div>
		</a>
	</div>
</div>


<?php $this->Html->scriptStart(array('inline' => false)); ?>
	$('.btngroup-contactos .text-link').hide();
	//$('.btngroup-contactos-animado').btnTextAnimado();
<?php $this->Html->scriptEnd(); ?>
