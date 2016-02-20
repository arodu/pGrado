<?php if(!empty($archivos)){ ?>
		<?php foreach ($archivos as $archivo) { ?>
					<div class="media">
						<div class="media-left">
							<?php echo '<i class="fa '.$this->General->iconFileType($archivo['Archivo']['nombre']).' fa-3x text-gray" style="padding:10px;"></i>'; ?>
						</div>
						<div class="media-body">
							<h4 id="media-heading" class="media-heading bold"><?php echo $archivo['Archivo']['nombre'];?></h4>
							<?php echo $this->General->byteSize($archivo['Archivo']['tamano']).' - '.$this->General->dateTimeFormatPrint($archivo['Archivo']['created']); ?><br/>
							<div class="btn-group">
							<?php echo $this->Html->link('<i class="fa fa-download fa-fw"></i> Descargar',
								array('controller'=>'archivos','action'=>'download',$archivo['Archivo']['id'],true),
								array('class'=>'btn btn-default btn-xs','escape'=>false)); ?>
							<?php echo $this->Html->link('<i class="fa fa-search fa-fw"></i> Vista Previa',
								array('controller'=>'archivos','action'=>'download',$archivo['Archivo']['id']),
								array('class'=>'btn btn-default btn-xs','target'=>'_blank','escape'=>false)); ?>
							</div>
						</div>
					</div>

			<?php } ?>
<?php }else{ ?>
	<small class="text-muted">No se han encontrado archivos en este Proyecto</small>
<?php } ?>


<span id="cant-archivos" class="hidden"><?php echo count($archivos);?></span>






<?php /*<?php if(!empty($archivos)){ ?>
	<ul class="list-unstyled">
		<?php
			foreach ($archivos as $archivo) {
					echo '<li>';
					echo $this->Html->link(
						'<i class="fa fa-file-o"></i> '.$archivo['Archivo']['nombre'].' - '.$this->General->byteSize($archivo['Archivo']['tamano']).' - '.$this->General->dateTimeFormatPrint($archivo['Archivo']['created']),
									array('controller'=>'archivos','action'=>'download',$archivo['Archivo']['id']),
									array('escape'=>false)
								);
					echo '</li>';
			}
		?>
	</ul>
<?php }else{ ?>
	<small class="text-muted">No hay existen archivos en este Proyecto</small>
<?php } ?>


<span id="cant-archivos" class="hidden"><?php echo count($archivos);?></span>*/ ?>