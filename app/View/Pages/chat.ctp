<?php
	echo $this->element('commons/header_view', array(
		'title'=>'Chat',
		'breadcrumb'=>array(
			__('Chat')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

	<div class="row">
		<div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Channel: Info</h3>
        </div>
        <div class="box-body chat-messages">
	
		

        </div>
        <div class="box-footer chat-input">
          <?php echo $this->bsForm->create('Chat', array('id'=>'chat')); ?>

            <?php echo $this->bsForm->input('add', array('label'=>false)); ?>

          <?php echo $this->bsForm->end(); ?>
        </div>
    </div>
  </div>
</section>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

  $('#chat').submit(function(){
		input = $('#chat input[type="text"]');
		
		var url = "<?= $this->Html->url(array('controller'=>'pages', 'action'=>'messages')) ?>";
		$.ajax({
			url: url,
			method: 'post',
			async: true,
			cache: false,
			data: { add: input.val() },
			success: function(msg){
				input.val('');
			},
		});
		return false;
  });

  function listen( last ) {
		var url = "<?= $this->Html->url(array('controller'=>'pages', 'action'=>'pull')) ?>"+"/"+last;
		$.ajax({
			url: url,
			dataType: 'json',
			async: true,
			cache: false,
			contentType: 'multipart/form-data',
			success: function(json){
				$('.chat-messages').recargar("<?= $this->Html->url(array('controller'=>'pages', 'action'=>'messages')) ?>");
				setTimeout(function(){ listen( json['last'] ) }, 1000);
			},
		});
  }

	setTimeout(function(){ listen( 0 ) }, 1000);

<?php echo $this->Html->scriptEnd(); ?>