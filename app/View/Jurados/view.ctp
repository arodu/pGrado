<div class="view_jurados">


	<?php if($jurados): ?>

		<?php foreach ($fases as $fase_id => $fase) { ?>
			<?php if(isset($jurados[$fase_id])){ ?>
				<fieldset>
					<legend>Jurados Fase <?php echo $fase;?>:</legend>
					<ul class="users-list clearfix">
						<?php foreach ($jurados[$fase_id] as $jurado) { ?>
							<li>
								<a class="btn-perfil text-center" tabindex="0" role="button" data-id="<?php echo $jurado['Usuario']['id'];?>">
								<?php echo $this->Custom->userFoto( $jurado['Usuario']['avatar'], 'md', array('class'=>'img-circle','data-id' => $jurado['Usuario']['id']) ); ?>
								<span class="users-list-name"><?php echo $jurado['Usuario']['nombre_completo']; ?></span></a>
								<span class="users-list-date"><?php echo $jurado['TipoJurado']['nombre']; ?></span>
							</li>
						<?php } ?>
					</ul>
				</fieldset>
			<?php } ?>
		<?php } ?>

		<style type="text/css">
			$('[data-toggle="popover"]').popover({
				'html': true
			});
		</style>

	<?php else: ?>

		<?php echo $this->element('callout/gray',array('titulo'=>'No se ha encontrado Jurados asignados al Proyecto actual')); ?>


	<?php endif; ?>

</div>


<style type="text/css">

</style>

<script type="text/javascript">
	//user_popover();

	$('.view_jurados .btn-perfil').popoverPerfil();

</script>


<?php
/*


<fieldset>
	<legend>Jurados Fase Defensa:</legend>
		<ul class="users-list clearfix">
			<li>
				<a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" title="Alexander Pierce" data-content="arod.unerg@gmail.com<br/>0412-7609320">
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<span class="users-list-name">Alexander Pierce</span></a>
				<span class="users-list-date">Coordinador</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">Norman</a>
				<span class="users-list-date">Principal</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">Jane</a>
				<span class="users-list-date">Principal</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">John</a>
				<span class="users-list-date">Principal</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">Alexander</a>
				<span class="users-list-date">Principal</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">Sarah</a>
				<span class="users-list-date">Suplente</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">Nora</a>
				<span class="users-list-date">Suplente</span>
			</li>
			<li>
				<?php echo $this->Html->image('avatar.default.50.png'); ?>
				<a class="users-list-name" href="#">Nadia</a>
				<span class="users-list-date">Suplente</span>
			</li>
		</ul><!-- /.users-list -->
</fieldset>	 */ ?>
