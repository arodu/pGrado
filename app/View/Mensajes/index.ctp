<?php //debug($mensajes); ?>
<ul class="list-group">
	<?php foreach ($mensajes as $mensaje) { ?>
		<li class="list-group-item caja">
			
			<?php echo $this->Html->link(
					'<i class="fa fa-trash"></i>',
					array('controller'=>'mensajes','action' => 'delete', $mensaje['Mensaje']['id'],'admin'=>false),
					array('class'=>'close mensaje-delet','title'=>'Eliminar Mensaje','escape'=>false)
				); ?>

			<?php
				$texto = ( $mensaje['Mensaje']['leido']==false ? '<strong>'.$mensaje['PrincipalMensaje']['titulo'].'</strong>' : $mensaje['PrincipalMensaje']['titulo'] );

			?>
			<?php echo $this->Html->link($texto, array('controller'=>'mensajes','action'=>'view',$mensaje['Mensaje']['id']),array('escape'=>false)); ?><br/>

			<small class="text-muted"><?php echo $this->General->timeFormatView($mensaje['Mensaje']['created']);?></small>
		</li>
	<?php } ?>
</ul>

<script type="text/javascript">
	$('.list-group-item .close').addClass('hidden');

	$('.list-group-item').hover(function(){
		$(this).find('.close').toggleClass('hidden');
	});

	$('.mensaje-delet').click(function(){
		if (confirm("\u00bfEsta seguro que desea eliminar este mensaje?")){

			var item = $(this);
			var mensajes = item.parent("li.list-group-item");
        	
            $.ajax({
                url: item.attr('href'),
                //type: 'post',
                //data: {mensaje_id: ''},
                dataType: 'html',
                beforeSend: function(){
					mensajes.append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                },
                success: function(msg){
                	mensajes.find('.overlay').html('<i class="fa fa-check"></i>');
                	item.parent("li.list-group-item").slideUp('slow');
                	$('#menu-mensaje #lista-mensaje').html(msg);
                },
                error: function(msg){
                	alert("Ha ocurrido un error intentando eliminar este mensaje!");
                },
                complete: function(msg){
                	//alert("Completado");
                    //modal.find('#modal-content').html(msg.responseText);
                }
            }); /**/
		}
		return false;
	});


</script>