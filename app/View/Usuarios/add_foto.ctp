<?php
	echo $this->element('commons/header_view', array(
		'title'=>'<i class="fa fa-crop fa-fw"></i> Cambiar Foto de Usuario',
		'subtitle'=>$usuario['Usuario']['nombre_completo'],
		'breadcrumb'=>array(
			__('Perfil de Usuario')=>array('controller'=>'usuarios','action'=>'index'),
			__('Cambiar Foto de Usuario')=>true,
		)
	));
?>

<!-- Main content -->
<section class="content">
	<?php echo $this->Flash->render(); ?>

  <div class="box box-default">
  	<div class="box-body with-border">
  		<div class="container-fluid" id="crop-avatar">

  			<div class="avatar-view hidden">
  				<?php
  					//$img = $this->Html->url(array('controller'=>'usuarios','action'=>'getFoto'),true);
  					//echo $this->Html->image($img);
  				?>
  			</div>

  			<?php $actionForm = $this->Html->url(array('controller'=>'usuarios','action'=>'add_foto')); ?>

  			<form class="avatar-form" action="<?php echo $actionForm; ?>" enctype="multipart/form-data" method="post">
  				<div class="avatar-body">

  					<!-- Upload image and data -->
  					<div class="avatar-upload">
  						<input class="avatar-src" name="avatar_src" type="hidden">
  						<input class="avatar-data" name="avatar_data" type="hidden">
  						<label for="avatarInput">Cargar Imagen</label>
  						<input class="avatar-input" id="avatarInput" name="avatar_file" type="file" accept="image/*">
  					</div>

  					<!-- Crop and preview -->
  					<div class="row">
  						<div class="col-md-9">
  							<div class="avatar-wrapper"></div>
  						</div>
  						<div class="col-md-3">
  							<div class="avatar-preview preview-lg"></div>
  							<div class="avatar-preview preview-md"></div>
  							<div class="avatar-preview preview-sm"></div>
                <div class="avatar-preview preview-sm preview-circle"></div>
  						</div>
  					</div>

  					<div class="row avatar-btns ">

  						<!-- <div class="col-md-9">
  							<div class="btn-group">
  								<button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
  								<button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
  								<button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
  								<button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
  							</div>
  							<div class="btn-group">
  								<button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
  								<button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
  								<button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
  								<button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
  							</div>
  						</div> -->

  						<div class="col-md-3 col-md-offset-9">
  							<button class="btn btn-primary btn-block avatar-save" type="submit">Guardar Cambios</button>
  						</div>
  					</div>
  				</div>
  				<!-- <div class="modal-footer">
  				<button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
  				</div> -->
  			</form>

  			<!-- Loading state -->
  			<!-- <div class="loading" aria-label="Loading" role="img" tabindex="-1">
  				<i class="fa fa-refresh fa-spin"></i>
  			</div> -->
  		</div>
  	</div>

  	<div class="overlay hidden">
  		<i class="fa fa-refresh fa-spin"></i>
  	</div>

  </div>
</section>


<?php echo $this->Html->css('/libs/cropper/dist/cropper.min',array('inline'=>false)); ?>
<?php echo $this->Html->script('/libs/cropper/dist/cropper.min',array('inline'=>false)); ?>
<?php echo $this->Html->css('/mods/cropper/main',array('inline'=>false)); ?>
<?php echo $this->Html->script('/mods/cropper/main',array('inline'=>false)); ?>
