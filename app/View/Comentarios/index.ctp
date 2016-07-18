<div class="tab-timeline">
	<ul class="timeline">
		<li>
			<i class="fa fa-quote-left bg-gray"></i>

			<div class="timeline-item">
				<div class="timeline-body">
					<?php echo $this->Form->create('Comentario',array('id'=>'form-coment', 'url'=>array('controller'=>'comentarios', 'action'=>'add'))); ?>
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
		<?php foreach ($comentarios as $comentario): ?>

			<?php

				$bg_class = '';
				$icon_bg_class = 'bg-green';
				$icon = 'fa fa-comment';
				$user_active = false;
				$item_class = '';

				if( $comentario['Comentario']['eliminado'] ){
					$icon_bg_class = 'bg-red';
					$icon = 'fa fa-times';
				}elseif($comentario['Usuario']['id'] == $userInfo['id']){
					$icon_bg_class = 'bg-blue';
					$icon = 'fa fa-comment fa-flip-horizontal';
					$user_active = true;
					$item_class = 'timeline-item-user';
				}

			?>

			<?php $coment_fecha = $this->General->niceDateFormatView($comentario['Comentario']['created']); ?>

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
						<small class="time">
							<i class="fa fa-clock-o fa-fw"></i>&nbsp;<?php echo $this->General->timeFormatView($comentario['Comentario']['created']);?>

							<?php
								if($comentario['Comentario']['eliminado'] == true ){
									echo '<em>[Eliminado: '.$this->General->dateTimeFormatView($comentario['Comentario']['updated']).']</em>';
								}elseif( $comentario['Comentario']['created'] != $comentario['Comentario']['updated']){
									echo '<em>[Editado: '.$this->General->dateTimeFormatView($comentario['Comentario']['updated']).']</em>';
								}
							?>
						</small>


						<?php if($user_active and $comentario['Comentario']['eliminado'] == false): ?>
							<div class="btn-group pull-right">

								<a type="button" class="mano dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-caret-down fa-fw"></i></a>

								<ul class="dropdown-menu" role="menu">
									<li>
										<?php
											echo $this->Html->link(
												'<i class="fa fa-edit fa-fw"></i>'.__('Editar'),
												array('controller'=>'comentarios', 'action'=>'edit', $comentario['Comentario']['id']),
												array('class'=>'comment-modal-link','escape'=>false)
											);
										?>
									</li>
									<li>
										<?php
											echo $this->Html->link(
												'<i class="fa fa-trash fa-fw"></i>'.__('Eliminar'),
												array('controller'=>'comentarios', 'action'=>'delete', $comentario['Comentario']['id']),
												array('class'=>'comment-modal-link','escape'=>false)
											);
										?>
									</li>
								</ul>
							</div>
						<?php endif; ?>

					</h3>

					<?php if($comentario['Comentario']['eliminado'] == false ): ?>
						<div class="timeline-body <?php echo $bg_class;?>">
							<?php
								$text =	$comentario['Comentario']['texto'];
								$text = str_replace(" ", "&nbsp;", $text);
								$text = str_replace("\n", "<br />", $text);

								echo $text;
							?>
						</div>
					<?php endif; ?>

				</div>
			</li>

		<?php endforeach; ?>


		<li>
			<i class="fa fa-clock-o bg-gray"></i>
		</li>
	</ul>

</div>

<div id="editCommentModal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="edit_comemt_modal">
  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
				<h4 class="modal-title">Editar Comentario</h4>
			</div>
			<div class="modal-body">
				<p><i class="fa fa-refresh fa-spin"></i> Cargando...</p>
			</div>
		</div>
  </div>
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

	$('#editCommentModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var commemt_id = button.data('id') // Extract info from data-* attributes
		$modal = $(this);
		var url = "<?php echo $this->Html->url(array('controller'=>'comentarios', 'action'=>'edit')); ?>"+"/"+commemt_id;
		$.ajax({
			url: url,
			complete: function(result){
				$modal.find('.modal-body').html(result.responseText);
			},
		});
	});

	$('.commentDelete').on('click', function(){
		var commemt_id = $(this).data('id')
		var url = "<?php echo $this->Html->url(array('controller'=>'comentarios', 'action'=>'delete')); ?>"+"/"+commemt_id;
		$.ajax({
			url: url,
			type: "POST",
			complete: function(){
				//$modal.find('.modal-body').html(result.responseText);
				cargarComentarios();
			},
		});

		return false;
	});

	// ------------------
	$('.comment-modal-link').modalLink('#generalModal');


</script>
