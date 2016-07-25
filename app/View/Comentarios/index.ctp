<div class="btn-group pull-right">
	<?php
		echo $this->Form->button('<i class="fa fa-comments fa-fw"></i> '.__('Todos'),array(
			'type' => 'button',
			'class'=>'reload btn btn-default btn-sm',
			'data-url'=> $this->Html->url(array('controller'=>'comentarios','action'=>'index',$proyecto_id)),
		));
	?>
	<?php
		echo $this->Form->button('<i class="fa fa-users fa-fw"></i> '.__('Usuarios'),array(
			'type' => 'button',
			'class'=>'reload btn btn-default btn-sm',
			'data-url'=> $this->Html->url(array('controller'=>'comentarios','action'=>'index',$proyecto_id,'users')),
		));
	?>
	<?php
		echo $this->Form->button('<i class="fa fa-desktop fa-fw"></i> '.__('Sistema'),array(
			'type' => 'button',
			'class'=>'reload btn btn-default btn-sm',
			'data-url'=> $this->Html->url(array('controller'=>'comentarios','action'=>'index',$proyecto_id,'system')),
		));
	?>
</div>
<div class="clearfix"></div>

<?php echo $this->Flash->render(); ?>

<div class="tab-timeline">
	<ul class="timeline">

		<?php if($tipo!='system'): ?>
			<li>
				<i class="fa fa-quote-left bg-gray"></i>
				<div class="timeline-item">
					<div class="timeline-body">
						<?php echo $this->Form->create('Comentario',array('class'=>'form-coment', 'url'=>array('controller'=>'comentarios', 'action'=>'add'))); ?>
							<?php echo $this->Form->hidden('proyecto_id', array('value'=>$proyecto_id)); ?>
							<?php echo $this->Form->hidden('tipo', array('id'=>'form-tipo','value'=>'add')); ?>
							<?php echo $this->Form->input('texto',array(
										'type'=>'textarea',
										'class'=>'form-control add-coment',
										'label'=>false,
										'placeholder'=>'Agregar Nuevo Comentario...',
										'rows'=>'1',
									)); ?>
						<?php echo $this->Form->end(); ?>
					</div>
					<div class="timeline-footer hidden">
						<?php echo $this->Form->button('Publicar',array('type'=>'button','class'=>'btn btn-primary btn-coment'));?>
					</div>
				</div>
			</li>
		<?php endif; ?>

		<?php $fecha = ""; ?>
		<?php foreach ($comentarios as $comentario): ?>

			<?php $coment_fecha = $this->General->niceDateFormatView($comentario['Comentario']['created']); ?>

			<?php if($coment_fecha != $fecha): ?>
			  <?php $fecha = $coment_fecha; ?>
			  <li class="time-label">
			    <span class="bg-blue">
			      <?php echo $fecha; ?>
			    </span>
			  </li>
			<?php endif; ?>

			<?php
				if(!$comentario['Comentario']['sistema']){
					echo $this->element('entity/comentario_user', array('comentario'=>$comentario));
				}else{
					echo $this->element('entity/comentario_system', array('comentario'=>$comentario));
				}
			 ?>

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

	$('.reload').on('click', function(){
		$('#tab-coment').recargar( $(this).data('url') );
	});

	autosize($('.add-coment'));

	$('.add-coment').focus(function(){
		$(this).closest('.timeline-item').find('.timeline-footer').removeClass('hidden');
	});

	$('.btn-coment').click(function(){
		$('.form-coment').submit();
	});

	$('.form-coment').on('submit',function(){
		var str = $('.add-coment').val();
		if(str.length > 0){
			$.ajax({
				url: "<?php echo $this->Html->url(array('controller'=>'comentarios','action'=>'add',$tipo));?>",
				type: 'post',
				data: {
						texto: str,
						proyecto_id: "<?php echo $proyecto_id;?>"
					},
				dataType: 'html',
				beforeSend: function(msg){
					$('.btn-coment').attr('disabled',true);
				},
				complete: function(msg){
					$('.add-coment').val("");
					$('#tab-coment').html(msg.responseText);
					$('.btn-coment').attr('disabled',false);
					$('.add-coment').focus();
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
				$('#tab-coment').recargar("<?php echo $this->Html->url(array('controller'=>'comentarios','action'=>'index',$proyecto_id,$tipo));?>");
			},
		});

		return false;
	});

	// ------------------
	$('.comment-modal-link').modalLink('#generalModal');


</script>
