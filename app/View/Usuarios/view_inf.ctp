<?php // ----------------- HEADER ------------------- ?>
    <?php
        $this->assign('title-page', '<i class="fa fa-user fa-fw"></i> Perfil de Usuario <small>'.$usuario['Usuario']['nombre_completo'].'</small>');

        $bc = array(
            'items'=>array(),
            'config'=>array('activo'=>'Perfil de Usuario')
            );
        $this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
    ?>

<div class="row">

	<div class="col-md-3 col-md-push-9">

		<div class="box user-foto">

			<div class="box-body text-center">
				<div class="img-user-foto">
					<?php //echo $this->Html->image('avatar.default.90.png',array('class'=>'img-responsive','style'=>'margin: auto;')); ?>

					<?php
						$user_foto = $this->element('usuario/avatar',array('foto' => $usuario['Usuario']['foto']));
						echo $this->Html->image($user_foto,array('class'=>'img-responsive img-thumbnail','style'=>'margin: auto;')); ?>
				</div>
			</div>

			<div class="box-footer">
				<?php echo $this->Html->link('<i class="fa fa-user-plus"></i>&nbsp;&nbsp;Añadir Foto',
						array('controller'=>'usuarios','action'=>'add_foto','admin'=>false),
						array('escape'=>false,'class'=>'btn btn-default btn-sm')
					); ?>


			</div>

			<div class="overlay hidden"><i class="fa fa-refresh fa-spin"></i></div>

		</div>

		<div class="accesos box">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Accesos'); ?></h3>
			</div>

			<div class="box-body">
				<?php if (!empty($usuario['Perfil'])): ?>
					<ul>
					<?php foreach ($usuario['Perfil'] as $perfil): ?>
						<li><?php echo $perfil['nombre']; ?></li>
					<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="box-footer">
				<?php echo $this->Html->link('<i class="fa fa-refresh"></i>&nbsp;Actualizar',array('action'=>'index'),array('class'=>'btn btn-default btn-sm','escape'=>false));?>
			</div>
		</div>
	</div>

	<div class="col-md-9 col-md-pull-3">
		<div class="usuarios view box">


				<div class="box-body">


					<div class="row">
						<div class="col-md-4">
							<dl class="">
								<dt><?php echo __('Cedula'); ?></dt>
								<dd>
									<?php echo h($usuario['Usuario']['cedula']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Nombres'); ?></dt>
								<dd>
									<?php echo h($usuario['Usuario']['nombres']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Apellidos'); ?></dt>
								<dd>
									<?php echo h($usuario['Usuario']['apellidos']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Correo Electrónico'); ?></dt>
								<dd>
									<?php echo h($usuario['Usuario']['email']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Sede'); ?></dt>
								<dd>
									<?php echo h($usuario['Sede']['nombre']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Tipo Usuario'); ?></dt>
								<dd>
									<?php echo h($usuario['TipoUsuario']['nombre']); ?>
									&nbsp;
								</dd>
								<dd>
								<?php if($usuario['Usuario']['activo']){
									echo '<span class="text-primary">Activo</span>';
									}else{
									echo '<span class="text-muted">Inactivo</span>';
								} ?>
								</dd>

								<dd>
								<?php if($usuario['Usuario']['admin']){
									echo '<span class="text-primary">Admin</span>';
								} ?>
								</dd>
							</dl>
						</div>

						<div class="col-md-4">
							<dl class="">
								<dt><?php echo __('Teléfono Celular'); ?></dt>
								<dd>
									<?php echo h($usuario['DescripcionUsuario']['telf_cel']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Teléfono Habitación'); ?></dt>
								<dd>
									<?php echo h($usuario['DescripcionUsuario']['telf_hab']); ?>
									&nbsp;
								</dd>
								<dt><?php echo __('Dirección'); ?></dt>
								<dd>
									<?php echo h($usuario['DescripcionUsuario']['direccion']); ?>
									&nbsp;
								</dd>
							</dl>
						</div>
						<?php if($tipo_usuario['code'] == 'profesor'){ ?>
							<div class="col-md-4">
								<dl class="">
									<dt><?php echo __('Posición en la Institución'); ?></dt>
									<dd>
										<?php echo $options['pos_inst'][$usuario['DescripcionTutor']['pos_inst']]; ?>
										&nbsp;
									</dd>
									<dt><?php echo __('Escalafón'); ?></dt>
									<dd>
										<?php echo ( !$usuario['DescripcionTutor']['escalafon'] ? '<span class="text-muted">N/A</span>' : $options['escalafon'][$usuario['DescripcionTutor']['escalafon']]); ?>
										&nbsp;
									</dd>
									<dt><?php echo __('Dedicación'); ?></dt>
									<dd>
										<?php echo ( !$usuario['DescripcionTutor']['dedicacion'] ? '<span class="text-muted">N/A</span>' : $options['dedicacion'][$usuario['DescripcionTutor']['dedicacion']]); ?>
										&nbsp;
									</dd>
								</dl>
							</div>
						<?php } ?>

					</div>

				</div>

			<div class="box-footer">
				<?php echo $this->Html->link('<i class="fa fa-edit"></i>&nbsp;Actualizar Datos',array('controller'=>'usuarios','action'=>'edit'),array('class'=>'btn btn-primary','escape'=>false));?>

				<?php echo $this->Html->link('<i class="fa fa-lock"></i>&nbsp;	Modificar Contraseña',array('controller'=>'usuarios','action'=>'editpassword'),array('class'=>'btn btn-primary','escape'=>false));?>
			</div>
		</div>
	</div>

</div>
