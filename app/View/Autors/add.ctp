<?php echo $this->Form->create('Autor',array(
	'inputDefaults'=>array('div'=>array('class'=>'form-group'),'class'=>'form-control'),
	'class'=>'form-inline','role'=>'form'
	)); ?>
<div class="box-body">
<?php
	echo $this->Form->input('proyecto_id',array('type'=>'hidden','value'=>$proyecto_id));
	echo $this->Form->input('usuario_id',array('label'=>false));
	echo $this->Form->input('tipo_autor_id',array('type'=>'hidden','value'=>$tipoAutor['TipoAutor']['id']));
	//echo $this->Form->input('activo');
	echo $this->Form->submit('Guardar',array('class'=>'btn btn-primary', 'div'=>false));
	echo $this->Form->hidden('tipoAutorNombre',array('id'=>'tipoAutorNombre','value'=>$tipoAutor['TipoAutor']['nombre']));

	//debug($tipoAutor);
?>
<?php echo $this->Form->end(); ?>

<?php // sleep(2); ?>