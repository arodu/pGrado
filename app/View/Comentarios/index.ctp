<div class="tab-timeline">
	<ul class="timeline">
		<li>
			<i class="fa fa-quote-left bg-gray"></i>

			<div class="timeline-item">
				<div class="timeline-body">
					<?php echo $this->Form->create('Comentario',array('id'=>'form-coment','action'=>'add')); ?>
						<?php echo $this->Form->hidden('proyecto_id', array('value'=>$proyecto_id)); ?>
						<?php echo $this->Form->hidden('tipo', array('id'=>'form-tipo','value'=>'add')); ?>
						<?php echo $this->Form->input('texto',array(
									'type'=>'textarea',
									'id'=>'add-coment',
									'class'=>'form-control',
									'label'=>false,
									'placeholder'=>'Agregar Nuevo Comentario...',
									'rows'=>'1',
								)); ?>
					<?php echo $this->Form->end(); ?>
				</div>
				<div class="timeline-footer hidden">
					<?php echo $this->Form->button('Publicar',array('type'=>'button','id'=>'btn-coment','class'=>'btn btn-primary'));?>
				</div>
			</div>
		</li>

		<?php $fecha = ""; ?>
		<?php foreach ($comentarios as $comentario) { ?>

			<?php
				$bg_class = '';
				$icon_bg_class = 'bg-blue';
				$icon = 'fa fa-comment-o';
				$user_active = false;
				$item_class = '';

				if($comentario['Usuario']['id'] == $userInfo['id']){
					$icon_bg_class = 'bg-blue';
					$icon = 'fa fa-comment fa-flip-horizontal';
					$user_active = true;
					$item_class = 'timeline-item-user';
				}
			?>

			<?php $coment_fecha = $this->General->niceDateFormatView($comentario['Comentario']['updated']); ?>

			<?php if($coment_fecha != $fecha){ ?>
				<?php $fecha = $coment_fecha; ?>
				<li class="time-label">
					<span class="bg-blue">
						<?php echo $fecha; ?>
					</span>
				</li>
			<?php } ?>

			<li>
				<i class="fa <?php echo $icon.' '.$icon_bg_class;?>"></i>
				<div class="timeline-item <?php echo $item_class;?>">


					<h3 class="timeline-header <?php echo $bg_class;?>" >


						<span class="btn-perfil" data-id="<?php echo $comentario['Usuario']['id'];?>">
							<?php
								$user_foto = $this->element('usuario/avatarXXS',array('foto' => $comentario['Usuario']['foto']));
							 	echo $this->Html->image($user_foto, array('class'=>'user-image img-circle','alt'=>'User Image','width'=>'20'));
							 ?>
							<?php echo $comentario['Usuario']['nombre_completo'];?>
						</span>
						<br class="visible-xs">
						<small class="time"><i class="fa fa-clock-o fa-fw"></i>&nbsp;<?php echo $this->General->timeFormatView($comentario['Comentario']['updated']);?></small>


						<?php if($user_active){ ?>
							<div class="btn-group pull-right">

								<a type="button" class="mano dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-caret-down"></i></a>

								<ul class="dropdown-menu" role="menu">
									<li class="divider"></li>
									<li><a href="#"><i class="fa fa-edit"></i> Editar</a></li>
									<li><a href="#"><i class="fa fa-trash"></i> Eliminar</a></li>
								</ul>
							</div>
						<?php } ?>

					</h3>

					<div class="timeline-body <?php echo $bg_class;?>">
						<?php
							$text =	$comentario['Comentario']['texto'];
							$text = str_replace(" ", "&nbsp;", $text);
							$text = str_replace("\n", "<br />", $text);

							echo $text;
						?>
					</div>

				</div>
			</li>

		<?php } ?>


		<li>
			<i class="fa fa-clock-o bg-gray"></i>
		</li>
	</ul>

</div>

<script type="text/javascript">

	autosize($('#add-coment'));

	$('#add-coment').focus(function(){
		$(this).closest('.timeline-item').find('.timeline-footer').removeClass('hidden');
	});

	$('#btn-coment').click(function(){
		$('#form-coment').submit();
	});

	$('#form-coment').on('submit',function(){
		var str = $('#add-coment').val();
		if(str.length > 0){
			$.ajax({
				url: "<?php echo $this->Html->url(array('controller'=>'comentarios','action'=>'add'));?>",
				type: 'post',
				data: {
						texto: str,
						proyecto_id: "<?php echo $proyecto_id;?>"
					},
				dataType: 'html',
				beforeSend: function(msg){
					$('#btn-coment').attr('disabled',true);
				},
				complete: function(msg){
					$('#add-coment').val("");
					$('#tab-coment').html(msg.responseText);
					$('#btn-coment').attr('disabled',false);
					$('#add-coment').focus();
				}
			});
		}
		return false;
	});


	$('.tab-timeline .btn-perfil').popoverPerfil();

</script>
