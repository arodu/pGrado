<div class="box-header">
  <h3 class="box-title">Escenario</h3>
</div>
<div class="box-body">
  <?php if($escenario['Escenario']['id'] != null){ ?>
    <?php echo '<strong>Nombre: </strong>'.$escenario['Escenario']['nombre'] ?><br/>
    <?php echo '<strong>Dirección: </strong>'.$escenario['Escenario']['direccion'] ?><br/>
    <?php echo '<strong>Contacto: </strong>'.$escenario['Escenario']['persona'] ?><br/>
    <?php echo '<strong>Telefono: </strong>'.$escenario['Escenario']['telefono'] ?><br/>

    <?php echo ($escenario['Escenario']['carta_aceptacion'] ? '<span class="label label-success">Aceptado</span>' : '<span class="label label-warning">Sin Aceptación</span>' ) ?>
    <?php echo ($escenario['Escenario']['carta_implementacion'] ? '<span class="label label-success">Implementado</span>' : '<span class="label label-warning">Sin Implementación</span>' ) ?>

  <?php }else{
      echo '<p>Sin Escenario de Proyecto</p>';
  } ?>
</div>
<?php if(!$proyecto['Proyecto']['bloqueado']): ?>
  <div class="box-footer">
    <?php
      echo $this->Form->button('<i class="fa fa-edit"></i> '.__('Escenario'),array(
        'type' => 'button',
        'class'=>'btn btn-default btn-xs btn-tooltip btn-tooltip-escenario modal-link escenario-modal-link',
        'data-url'=> $this->Html->url(array('controller'=>'escenarios', 'action'=>'edit', $proyecto['Proyecto']['id'])),
        'data-action'=>'edit',
        'title'=>'Editar Escenario',
      ));
    ?>
  </div>
<?php endif; ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
  $('.escenario-modal-link').modalLink('#generalModal');
  $('.btn-tooltip-escenario').tooltip({ html: true });
<?php echo $this->Html->scriptEnd(); ?>
