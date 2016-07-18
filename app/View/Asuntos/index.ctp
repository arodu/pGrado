<?php // debug($metas); ?>


<div id="metas" class="metas index">

	<?php // ------------- Controles ---------- ?>
		<div class="pull-left controls">
			<div class="btn-toolbar" role="toolbar">

				<div class="btn-group" role="group">
					<button class="sort btn btn-primary btn-xs" data-sort="seq:asc">Asc</button>
					<button class="sort btn btn-primary btn-xs" data-sort="seq:desc">Desc</button>
				</div>

				<div class="btn-group">
					<button type="button" class="btn btn btn-primary btn-xs filter" data-filter=".meta-all">Metas</button>
					<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu">
						<?php foreach ($metas as $meta_id => $meta): ?>
							<li><a href="#" class="filter" data-filter="<?php echo '.meta-'.$meta_id;?>"><?php echo $meta; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="btn-group" role="group">
					<button class="filter btn btn-primary btn-xs" data-filter=".status-abierto">Abiertos</button>
					<button class="filter btn btn-primary btn-xs" data-filter=".status-cerrado">Cerrados</button>
					<button class="filter btn btn-primary btn-xs" data-filter=".status-all">Todos</button>
			  </div>

				<div class="btn-group">
					<button type="button" class="btn btn btn-primary btn-xs filter" data-filter=".responsable-all">Responsable</button>
					<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="#" class="filter" data-filter=".responsable-none"><em>-- Sin Responsable --</em></a></li>
						<li role="separator" class="divider"></li>
						<?php foreach ($usuarios_proyecto as $usuario_id => $usuario): ?>
							<li><a href="#" class="filter" data-filter="<?php echo '.responsable-'.$usuario_id;?>"><?php echo $usuario; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="btn-group">
					<button type="button" class="btn btn btn-primary btn-xs filter" data-filter=".propietario-all">Propietario</button>
					<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu">
						<?php foreach ($usuarios_proyecto as $usuario_id => $usuario): ?>
							<li><a href="#" class="filter" data-filter="<?php echo '.propietario-'.$usuario_id;?>"><?php echo $usuario; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>

			</div>
		</div>

	<?php // ------------- Boton Agregar Asunto ------- ?>
		<div class="pull-right">
			<?php
				echo $this->Html->link(
					'<i class="fa fa-plus fa-fw"></i> '.__('Nuevo Asunto'),
					array('controller'=>'asuntos', 'action'=>'add', $proyecto_id),
					array(
						'id'=>'btn-nuevo-asunto',
						'class'=>'btn btn-default btn-sm',
						'escape'=>false,
					)
				);
			?>
		</div>

	<div class="clearfix"></div>

	<div class="mix-container">
		<?php foreach ($asuntos as $asunto): ?>
			<?php
				$filter['meta'] = 'meta-all meta-'.$asunto['Meta']['id'].'';
				$filter['status'] = 'status-all status-'.( $asunto['Asunto']['cerrado'] ? 'cerrado' : 'abierto' ).'';
				$filter['responsable'] = 'responsable-all responsable-'.( $asunto['Asunto']['responsable_id'] ? $asunto['Asunto']['responsable_id'] : 'none' );
				$filter['propietario'] = 'propietario-all propietario-'.$asunto['Asunto']['propietario_id'];
			?>
			<div class="mix <?php echo implode(' ',$filter);?>" data-seq="<?php echo $asunto['Asunto']['num_secuencia']; ?>">

				<div class="row asunto">
						<div class="secuencia col-xs-1 col-sm-1 col-md-1">
							<span><?php echo h($asunto['Asunto']['num_secuencia']); ?>&nbsp;</span>
						</div>
						<div class="col-md-9">
							<div class="row">
								<div class="descripcion text-justify col-md-11"><?php echo h($asunto['Asunto']['descripcion']); ?>&nbsp;</div>
								<div class="responsable col-md-1 pull-right">
									<?php
										if($asunto['Responsable']['id']){
											$user_imagen = $this->element('usuario/avatarXXS',array('foto' => $asunto['Responsable']['updated_foto'].'$'.$asunto['Responsable']['id']));
											echo $this->Html->image($user_imagen,array('class'=>'img-circle btn-perfil-asunto','data-id' => $asunto['Responsable']['id'] ));
										}
									?>
								</div>
							</div>
							<div class="row">
								<div class="propietario">
									<?php echo $this->General->dateTimeFormatView($asunto['Asunto']['updated']).' por '.$asunto['Propietario']['nombres'].' '.$asunto['Propietario']['apellidos']; ?>
								</div>
								<div class="meta"><?php echo $asunto['Meta']['titulo']; ?></div>
							</div>
						</div>
						<div class="col-md-2">
							<?php if($asunto['Asunto']['cerrado']): ?>
								<?php
									echo $this->Html->link(
										'<i class="fa fa-unlock-alt fa-fw"></i> '.__('Abrir'),
										array('controller'=>'asuntos', 'action'=>'change', $asunto['Asunto']['id']),
										array(
											'class'=>'btn btn-danger btn-xs btn-block btn-edit-asunto',
											'escape'=>false,
										)
									);
								?>
							<?php else: ?>
								<?php
									echo $this->Html->link(
										'<i class="fa fa-lock fa-fw"></i> '.__('Cerrar'),
										array('controller'=>'asuntos', 'action'=>'change', $asunto['Asunto']['id']),
										array(
											'class'=>'btn btn-primary btn-xs btn-block btn-edit-asunto',
											'escape'=>false,
										)
									);
								?>

								<?php if( $userInfo['id'] == $asunto['Propietario']['id'] ): ?>
									<?php
										echo $this->Html->link(
											'<i class="fa fa-edit fa-fw"></i> '.__('Editar'),
											array('controller'=>'asuntos', 'action'=>'edit', $asunto['Asunto']['id']),
											array(
												'class'=>'btn btn-default btn-xs btn-block btn-edit-asunto',
												'escape'=>false,
											)
										);
									?>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="clearfix"></div>


<?php // ----------------- JavaScript ------------------- ?>
	<script type="text/javascript">
		$('#btn-nuevo-asunto, .btn-edit-asunto').modalLink('#generalModal');

		$('.btn-perfil-asunto').popoverPerfil();

		$('.mix-container').mixItUp({
			layout: {
				display: 'block'
			},
			load: {
				filter: '.status-abierto',
			},
		});

	</script>
