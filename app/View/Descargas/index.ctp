<?php
	$this->assign('title-page', 'Descargas');

	$bc = array(
		'config'=>array('activo'=>'Descargas')
		);
	$this->assign('breadcrumb', $this->element('commons/breadcrumb',array('bc'=>$bc)));
?>

<?php if($this->Permit->hasPermission(array('admin','coordpg','root'))): ?>
	<div class="box box-warning box-solid">
		<div class="box-header with-border">
			<h3 class="box-title">Panel Coordinador</h3>
			<div class="box-tools pull-right">
				<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div style="display: block;" class="box-body text-right">
			<?php echo $this->Permit->link('Administrar', array('controller'=>'descargas', 'action'=>'admin'), array('class'=>'btn btn-default btn-flat', 'escape'=>false)); ?>
		</div><!-- /.box-body -->
	</div>
<?php endif; ?>



<div class="row">
	<div class="col-md-10">

    <?php foreach ($etiqueta_descargas as $etiqueta => $descargas): ?>
  		<div class="formatos box box-default">
  			<div class="box-header text-justify">
  				<h3 class="box-title"><?php echo $etiqueta; ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
  			</div>
  			<div class="box-body">
  				<div class="list-group">
            <?php foreach ($descargas as $descarga): ?>
  						<div class="list-group-item">
  							<div class="row">
  								<div class="col-xs-8 col-sm-10">
  									<h4 class="list-group-item-heading"><strong><?php echo $descarga['Descarga']['nombre'];?></strong></h4>
                    <p><?php echo $descarga['Descarga']['descripcion'];?></p>
  								</div>
  								<div class="col-xs-4 col-sm-2 text-center">
  									<?php
  										$link = '<i class="fa fa-download fa-2x"></i><br/><small>Descargar</small>';
  										echo $this->Html->link($link, array('controller'=>'descargas', 'action'=>'download', $descarga['Descarga']['id']),array('escape'=>false, 'target'=>'_blank'));
  									?>
  								</div>
  							</div>
  						</div>
  					<?php endforeach; ?>
  				</div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php // debug($etiqueta_descargas); ?>
