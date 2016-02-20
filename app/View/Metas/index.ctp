<div id="metas" class="metas index">
	<?php
		echo $this->Html->link('<i class="fa fa-plus fa-fw"></i> '.__('Agregar Nueva Meta'),
			array('action' => 'add',$proyecto_id),
			array('class'=>'ajax-link btn btn-primary btn-sm','data-target'=>'#tab-metas','escape'=>false)
		);

		//echo '&nbsp;&nbsp;';

		//echo $this->Form->input('Buscar', array(
		//	'type'=>'search',
		//	'placeholder'=>'Buscar...',
		//	'class'=>'form-control input-sm',
		//	'label'=>false, 'div'=>false,
		//	'style'=>'width: 30%;display: inline;'
		//));

		echo $this->Html->link('<i class="fa fa-list fa-fw"></i> '.__('Abiertos'),'#',
			array('class'=>'ajax-link pull-right','data-target'=>'#tab-metas','escape'=>false)
		);

		//echo $this->Html->link('<i class="fa fa-list fa-fw"></i> '.__('Ver Todos'),'#',
		//	array('class'=>'ajax-link pull-right','data-target'=>'#tab-metas','escape'=>false)
		//);
	?>
	<hr/>

	<?php echo printMetas($metas, $this->Html); ?>
	
</div>

<?php
	function printMetas($metas, $html, $rec = 0){
		$out = '<ul class="" style="list-style-type: none;">';
			foreach($metas as $meta){
				$out .= '<li>';

					$out .= $meta['Meta']['titulo'].' ('.$meta['Meta']['alias'].')';

					$out .= '<div class="pull-right">';
						if($meta['Meta']['cerrado']){
							$out .= $html->link('reabrir','#',array('class'=>'btn btn-danger btn-xs'));$out .= '&nbsp;&nbsp;';
							$out .= $html->link('editar','#',array('class'=>'btn btn-default btn-xs disabled','disabled'=>'disabled'));
						}else{
							$out .= $html->link('cerrar','#',array('class'=>'btn btn-primary btn-xs'));$out .= '&nbsp;&nbsp;';
							$out .= $html->link('editar','#',array('class'=>'btn btn-default btn-xs'));
						}
					$out .= '</div>';

					$out .= '<div class="progress progress-xs" style="margin-right:120px;">
								<div class="progress-bar '.progress_color($rec).'" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: '.completado($meta['Meta']['completado'], $meta['Meta']['total']).'">
									<span class="sr-only">'.completado($meta['Meta']['completado'], $meta['Meta']['total']).'</span>
								</div>
							</div>';

					$out .= '<hr style="margin-top:10px; margin-bottom:10px;"/>';
					if( !empty($meta['children']) ){
						$out .= printMetas($meta['children'], $html, $rec+1);
					}
				$out .= '</li>';
			}
		$out .= '</ul>';
		return $out;
	}

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

	function completado($completado, $total){
		return (($completado * 100) / $total).'%';
	}


	//debug($metas);
?>

<style>

</style>




<?php // ----------------- JavaScript ------------------- ?>
	<?php $this->Html->scriptStart(array('inline' => false)); ?>

		$('.ajax-link').on('click', function () {
			url = $(this).attr('href');
			target = $(this).data('target');

			$.ajax({
				url: url,
				dataType: 'html',
				beforeSend: function(){
					$(target).html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
				},
				complete: function(msg){
					$(target).html(msg.responseText);
				}
			});

			return false;
		});
	<?php $this->Html->scriptEnd(); ?>


<?php /*
	$.ajax({
		url: "<?php echo $this->Html->url(array('controller'=>'proyectos','action'=>'view_jurados','admin'=>false,$proyecto['Proyecto']['id']));?>",
		dataType: 'html',
		beforeSend: function(){
			$('#tab-jurados').html('<i class="fa fa-refresh fa-spin"></i> Cargando...');
		},
		complete: function(msg){
			$('#tab-jurados').html(msg.responseText);
		}
	});

	// e.target // newly activated tab
	// e.relatedTarget // previous active tab

});
*/ ?>

<!--
<div class="metas index">
	<h2><?php echo __('Metas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('proyecto_id'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('principal'); ?></th>
			<th><?php echo $this->Paginator->sort('cerrado'); ?></th>
			<th><?php echo $this->Paginator->sort('bloqueado'); ?></th>
			<th><?php echo $this->Paginator->sort('completado'); ?></th>
			<th><?php echo $this->Paginator->sort('total'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th><?php echo $this->Paginator->sort('finalized'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($metas as $meta): ?>
	<tr>
		<td><?php echo h($meta['Meta']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($meta['Proyecto']['tema'], array('controller' => 'proyectos', 'action' => 'view', $meta['Proyecto']['id'])); ?>
		</td>
		<td><?php echo h($meta['Meta']['alias']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['principal']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['cerrado']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['bloqueado']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['completado']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['total']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($meta['ParentMeta']['alias'], array('controller' => 'metas', 'action' => 'view', $meta['ParentMeta']['id'])); ?>
		</td>
		<td><?php echo h($meta['Meta']['lft']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['rght']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['created']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['updated']); ?>&nbsp;</td>
		<td><?php echo h($meta['Meta']['finalized']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $meta['Meta']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meta['Meta']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $meta['Meta']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $meta['Meta']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Meta'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('controller' => 'proyectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Proyecto'), array('controller' => 'proyectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Metas'), array('controller' => 'metas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Meta'), array('controller' => 'metas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asuntos'), array('controller' => 'asuntos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asunto'), array('controller' => 'asuntos', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
