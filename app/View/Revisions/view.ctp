
<!-- 
<div class="text-muted text-right">
	<small>
		<strong>Ultima Actualización: </strong><br class="visible-xs" />
		<?php echo h($revision['Usuario']['nombre_completo']).' - '.$this->General->dateTimeFormatView($revision['updated']); ?>
	</small>
</div>


<?php // ----------------- BOX RESUMEN ------------------- ?>
	<div class="box box-default box-solid">
		<div class="box-header with-border">
			<strong><?php echo __('Resumen'); ?></strong>
			<div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
		</div>

		<div class="box-body text-justify">
			<?php echo $this->General->htmlTrim($revision['resumen']); ?>
		</div>

		<div class="box-footer">
			<?php
			$etiquetas = explode(',', $revision['etiquetas']);
			foreach ($etiquetas as $etiqueta) {
				echo '<span class="label label-default">'.trim($etiqueta).'</span> ';
			}
			?>
		</div>

	</div>

<?php // ----------------- BOX DESCRIPCION ------------------- ?>
	<div class="box box-default box-solid">
		<div class="box-header with-border">
			<strong><?php echo __('Descripción'); ?></strong>
			<div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
		</div>

		<div class="box-body text-justify">
			<?php echo $this->General->htmlTrim($revision['descripcion']); ?>
		</div>
	</div>

<?php // ----------------- BOX OBSERVACIONES ------------------- ?>
	<div class="box box-default box-solid">
		<div class="box-header with-border">
			<strong><?php echo __('Observaciones'); ?></strong>
			<div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
		</div>
		<div class="box-body text-justify">
			<?php
				if($revision['observaciones'] == ''){
					echo '<div class="text-muted"><small>Sin Observaciones</small></div>';
				}else{
					echo $this->General->htmlTrim($revision['observaciones']);
				}
			?>
		</div>
	</div>

-->
