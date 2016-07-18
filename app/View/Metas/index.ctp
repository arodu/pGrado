<div id="metas" class="metas index">
	<div class="pull-right">
		<?php
			echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> '.__('Nueva Meta'),array(
				'type' => 'button',
				'class'=>'btn btn-default btn-sm meta-modal-link',
				'data-url'=> $this->Html->url(array('controller'=>'metas', 'action'=>'add', $proyecto_id)),
				'data-action'=>'add',
				'title'=>'Agregar Nueva Meta',
			));
		?>
	</div>
	<div class="clearfix"></div>
	<hr/>
	<div>
		<?php echo printMetas($metas, $this); ?>
	</div>
</div>

	<?php function printMetas($metas, $object, $rec = 0){ ?>
		<?php foreach($metas as $meta): ?>
			<div class="meta">
				<div class="row father">
					<div class="col-md-10">
						<div class="meta-titulo">

							<?php if($meta['Meta']['cerrado']): ?>
								<span class="label label-default">Cerrado</span>
							<?php endif; ?>

							<span><?php echo $meta['Meta']['titulo']; ?></span>
							<?php if($meta['Meta']['culminacion'] != null): ?>
								<date>[ Fecha Limite: <?php echo $object->General->dateFormatPrint($meta['Meta']['culminacion']); ?> ]</date>
							<?php endif; ?>

						</div>
						<p class="text-justify">
							<?php echo $meta['Meta']['descripcion']; ?>
						</p>

						<?php $progreso = progreso($meta['Meta']['completado'], $meta['Meta']['total']); ?>

						<small class="pull-right">Completado: <?php echo $progreso; ?>%</small>
						<div class="clearfix"></div>
						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $progreso; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progreso; ?>%">
								<span class="sr-only"><?php echo $progreso; ?>% Complete</span>
							</div>
						</div>

					</div>
					<div class="col-md-2">
						<?php if($meta['Meta']['cerrado']): ?>
							<?php
								echo $object->Form->button('<i class="fa fa-unlock-alt fa-fw"></i> '.__('Abrir'),array(
									'type' => 'button',
									'class'=>'btn btn-danger btn-xs btn-block meta-modal-link',
									'data-url'=> $object->Html->url(array('controller'=>'metas', 'action'=>'change', $meta['Meta']['id'])),
									'data-action'=>'edit',
									'title'=>'Abrir Meta',
								));
							?>
						<?php else: ?>
							<?php
								echo $object->Form->button('<i class="fa fa-lock fa-fw"></i> '.__('Cerrar'),array(
									'type' => 'button',
									'class'=>'btn btn-primary btn-xs btn-block meta-modal-link',
									'data-url'=> $object->Html->url(array('controller'=>'metas', 'action'=>'change', $meta['Meta']['id'])),
									'data-action'=>'edit',
									'title'=>'Cerrar Meta',
								));
							?>
							<?php
								echo $object->Form->button('<i class="fa fa-edit fa-fw"></i> '.__('Editar'),array(
									'type' => 'button',
									'class'=>'btn btn-default btn-xs btn-block meta-modal-link',
									'data-url'=> $object->Html->url(array('controller'=>'metas', 'action'=>'edit', $meta['Meta']['id'])),
									'data-action'=>'edit',
									'title'=>'Editar Meta',
								));
							?>
						<?php endif; ?>

					</div>
				</div>
				<div class="child">
					<!-- childs -->
					<?php printMetas($meta['children'], $object, $rec+1); ?>
					<!-- /childs -->
				</div>
			</div>
		<?php endforeach; ?>
	<?php } // end printMetas ?>


<?php
	/*function printMetas($metas, $object, $rec = 0){
		$out = '<ul class="" style="list-style-type: none;">';
			foreach($metas as $meta){
				$out .= '<li>';

					$out .= '<strong>'.$meta['Meta']['titulo'].'</strong>';
					if($meta['Meta']['culminacion'] != null){
						$out .= ' [ <em>Fecha Limite: '.$object->General->dateFormatPrint($meta['Meta']['culminacion']).'</em> ]';
					}
					$out .= '<br/>'.$meta['Meta']['descripcion'];

					$out .= '<div class="pull-right">';
						if($meta['Meta']['cerrado']){
							$out .= $object->Html->link('reabrir','#',array('class'=>'btn btn-danger btn-xs'));$out .= '&nbsp;&nbsp;';
							$out .= $object->Html->link('editar','#',array('class'=>'btn btn-default btn-xs disabled','disabled'=>'disabled'));
						}else{
							$out .= $object->Html->link('cerrar','#',array('class'=>'btn btn-primary btn-xs'));$out .= '&nbsp;&nbsp;';
							$out .= $object->Html->link('editar','#',array('class'=>'btn btn-default btn-xs'));
						}
					$out .= '</div>';

					$out .= '<div class="progress progress-xs" style="margin-right:120px;">
								<div class="progress-bar '.progress_color($rec).'" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.completado($meta['Meta']['completado'], $meta['Meta']['total']).'">
									<span class="sr-only">'.completado($meta['Meta']['completado'], $meta['Meta']['total']).'</span>
								</div>
							</div>';

					$out .= '<hr style="margin-top:10px; margin-bottom:10px;"/>';
					if( !empty($meta['children']) ){
						$out .= printMetas($meta['children'], $object, $rec+1);
					}
				$out .= '</li>';
			}
		$out .= '</ul>';
		return $out;
	} */

	function progress_color($rec){
		switch($rec){
			case 0:	return 'progress-bar-blue'; break;
			case 1:	return 'progress-bar-red'; break;
			case 2:	return 'progress-bar-yellow'; break;
			case 3:	return 'progress-bar-green'; break;
			case 4:	return 'progress-bar-orange'; break;
			default: return 'progress-bar-gray'; break;
		}
	}

	function progreso($completado, $total){
		if($total == 0)
			return '0';
		else
			return round(($completado * 100) / $total);
	}

	//debug($metas);
?>



<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#metasModal" data-action="add" title="Agregar Nueva Meta">Nueva Meta</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#metasModal" data-action="edit" title="Editar Meta">Editar</button> -->
<!--
<div class="modal fade" id="metasModal" tabindex="-1" role="dialog" aria-labelledby="metasModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"></h4>
      </div>
      <div class="modal-body">
				<i class="fa fa-refresh fa-spin"></i> Cargando...
      </div>
    </div>
  </div>
</div> -->

<?php // ----------------- JavaScript ------------------- ?>
	<script type="text/javascript">

		// ------------------
		$('.meta-modal-link').modalLink('#generalModal');
	</script>
