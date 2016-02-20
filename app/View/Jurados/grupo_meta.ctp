<?php

	if(isset($GrupoMeta)) debug($GrupoMeta);

	echo '<hr/>';

	echo $this->Form->input('GrupoMeta.no_consj_area',array(
				'label'=>'N° Consejo de Área',
				'required'=>true,
				'type'=>'number',
				'class'=>'form-control',
				'div'=>array('class'=>'form-group col-md-4 required')
			));

	echo $this->Form->input('GrupoMeta.fecha_consj_area',array(
				'label'=>'Fecha de Consejo de Área',
				'required'=>true,
				'type'=>'text',
				'class'=>'datepicker form-control',
				'placeholder'=>'dd-mm-yyyy',
				'div'=>array('class'=>'form-group col-md-4 required')
			));

	echo $this->Form->input('GrupoMeta.fecha_comun',array(
				'label'=>'Fecha de Comunicación',
				'required'=>true,
				'type'=>'text',
				'class'=>'datepicker form-control',
				'placeholder'=>'dd-mm-yyyy',
				'div'=>array('class'=>'form-group col-md-4 required')
			));
?>

<div id="cant-proyectos" class="hidden"><?php echo $cant_proyectos;?></div>


<script type="text/javascript">
	grupo_meta();
</script>