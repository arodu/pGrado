<ul class="menu">
	<?php if(count($mensajes) > 0){ ?>
		<?php foreach($mensajes as $mensaje){ ?>
			<?php
				$texto = $mensaje['PrincipalMensaje']['titulo'];
				$tam = 32;
				//$sub_texto = substr($texto , 0, $tam).( strlen($texto) > $tam ? '...' : '');
				$meta = json_decode($mensaje['PrincipalMensaje']['TipoMensaje']['meta']);
			?>
			<li class=""><!-- start message -->
				<a href="<?php echo $this->Html->url(array('controller'=>'mensajes','action'=>'view',$mensaje['Mensaje']['id'],'admin'=>false));?>" title="<?php echo $texto;?>" data-toggle='tooltip'>
					<?php echo '<i class="fa '.$meta->icon.' '.$meta->color.' pull-left"></i>';?>
					<p class="text-justify"><?php echo $texto;?></p>
					<p class="text-right"><small><i class="fa fa-clock-o"></i> <?php echo $this->General->timeFormatView($mensaje['Mensaje']['created']);?></small></p>
				</a>
			</li><!-- end message -->
		<?php } ?>
	<?php }else{ ?>
			<br/>
			<div class="text-center">
				<i class="fa fa-flag-o fa-3x"></i><br/>
				No hay mensajes nuevos<br/>
				<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target=".bs-mensajes-modal"><i class="fa fa-history"></i> Ver Historial de Mensajes</button><br/>
			</div>
	<?php } ?>
</ul>
<span id="cant-mensajes" class="hidden"><?php echo count($mensajes);?></span>

<?php if($this->request->is('ajax')){ ?>
	<script type="text/javascript">
		cargarListaMensajes();
	</script>
<?php } ?>