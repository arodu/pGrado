<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Editar Comentario</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>
				<?php
					echo $this->bsForm->create('Comentario', array('class'=>'ajaxForm'));
							echo $this->bsForm->input('Comentario.id');
							echo $this->bsForm->input('Comentario.texto', array('type'=>'textarea', 'label'=>false));
					echo '<hr/>';
						echo $this->Form->button('Guardar', array('value'=>'Guardar', 'type'=>'submit','class'=>'btn btn-primary btn-submit')).'&nbsp;';
						echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal'));
					echo $this->bsForm->end();
				?>
			<?php else: ?>
				<hr/>
				<script type="text/javascript">
					cargarComentarios();
				</script>
				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>


<?php $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxForm({
		target: '#generalModal',
	});
<?php $this->Html->scriptEnd(); ?>














<!--

<div class="escenarios form">
	<?php echo $this->Form->create('Comentario',array('class'=>'ajaxform', 'inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control'))); ?>
	<?php
			echo $this->Form->input('Comentario.id');
			echo $this->Form->input('Comentario.texto', array('type'=>'textarea', 'label'=>false));
   ?>

    <?php echo $this->Form->button(__('Guardar Cambios'),array('type'=>'submit','class'=>'btn btn-primary',));?>
	<?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">

  //$('#editSubmit').on('click', function(){

  $('.ajaxform').submit(function(){

    //var form = $(this).closest('.modal').find('form');
    var form = $(this);
    var postData = form.serializeArray();
    var formURL = form.attr("action");
    $.ajax({
      url : formURL,
      type: "POST",
      data : postData,
      success:function(data, textStatus, jqXHR){
        //data: return data from server
        $('#editCommentModal')
          .modal('hide')
          .on('hidden.bs.modal', function (e) {
            cargarComentarios();
          });
      },
      error: function(jqXHR, textStatus, errorThrown){
        //if fails
      },
    });

    return false;
  });

</script>
-->
