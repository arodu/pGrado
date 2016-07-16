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
