<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header bg-red">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title" id="addAutorLabel"><i class="fa fa-exclamation-triangle fa-fw"></i> ¿Esta seguro que desea elimiar el Proyecto?</h4>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render() ?>

			<?php if(!$success): ?>

        <div class="box-body bg-danger">
          <p class="text-justify">Si elimina el proyecto no podra volver a recuperar los datos, antes de seleccionar esta opcion primero este seguro que desea hacerlo.
          </p>
        </div>
        <br/>

				<?php echo $this->bsForm->create('Proyecto', array('class'=>'')); ?>
					<?php echo $this->bsForm->hidden('Proyecto.proyecto_id', array('value'=>$proyecto_id)); ?>
					<?php
						echo $this->bsForm->input('Proyecto.user_password', array('label'=>'Por seguridad, ingrese la contraseña del usuario <em>'.$userInfo['nombre'].'</em>', 'required'=>true, 'type'=>'password'));
					?>
					<hr/>
					<?php echo $this->Form->button('Aceptar', array('value'=>'Aceptar', 'type'=>'submit','class'=>'btn btn-danger btn-submit')); ?>
					<?php echo $this->Form->buttom('Cancelar', array('value'=>'Cancelar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
				<?php echo $this->bsForm->end(); ?>

			<?php else: ?>
				<hr/>

				<?php echo $this->Form->buttom('Cerrar', array('value'=>'Cerrar', 'type'=>'button', 'class'=>'btn btn-default', 'data-dismiss'=>'modal')); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
