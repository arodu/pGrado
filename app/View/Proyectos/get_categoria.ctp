<?php

if( $categorias ){

	echo $this->Form->input('Proyecto.categoria_id',array('label'=>__("Categoría"),'options'=>$categorias,'empty'=>'-- seleccione --','div'=>false, 'class'=>'form-control','required'=>true,'between'=>' <small>(seleccione el programa primero)</small>'));

}else{
	?>
		<label class="control-label"><?php echo __("Categoría");?></label>
		<small>(seleccione el programa primero)</small>
		<span class="form-control-static form-control bg-gray"><em><?php echo '<i class="fa fa-ban fa-fw"></i> Sin '.__("Categorias");?></em></span>
	<?php 
}



?>