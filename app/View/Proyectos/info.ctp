<div class="text-muted text-right">
  <small>
    <strong>Ultima Actualización: </strong>
    <br class="visible-xs" />
    <?php echo h($revision['Usuario']['nombre_completo']).' - '.
        $this->General->dateTimeFormatView($revision['Revision']['updated']
      ); ?>
  </small>
</div>

<?php // ----------------- BOX RESUMEN ------------------------- ?>
<div class="box box-default box-solid">
  <div class="box-header with-border">
    <strong><?php echo __('Resumen'); ?></strong>
    <div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
  </div>

  <div class="box-body text-justify">
    <?php echo $this->General->htmlTrim($revision['Revision']['resumen']); ?>
  </div>

  <div class="box-footer">
    <?php
    $etiquetas = explode(',', $revision['Revision']['etiquetas']);
    foreach ($etiquetas as $etiqueta) {
      echo '<span class="label label-default">'.
          trim($etiqueta).
          '</span> ';
    }
    ?>
  </div>

</div>

<?php // ----------------- BOX DESCRIPCION --------------------- ?>
<div class="box box-default box-solid">
  <div class="box-header with-border">
    <strong><?php echo __('Descripción'); ?></strong>
    <div class="box-tools pull-right"><button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div>
  </div>

  <div class="box-body text-justify">
    <?php echo $this->General->htmlTrim($revision['Revision']['descripcion']); ?>
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
      if($revision['Revision']['observaciones'] == ''){
        echo '<div class="text-muted"><small>Sin Observaciones</small></div>';
      }else{
        echo $this->General->htmlTrim($revision['Revision']['observaciones']);
      }
    ?>
  </div>
</div>

<?php // ----------------- BOX FOOTER ------------------- ?>
<div>
  <hr/>
  <?php
    if($mod_activo['proyecto.revisions'] and !$revision['Proyecto']['bloqueado']){
      echo $this->Html->link('<i class="fa fa-edit"></i> '.__('Editar Revision'),
          array('controller'=>'revisions','action' => 'edit', $revision['Revision']['id']),
          array('class'=>'btn btn-primary','escape'=>false)
        ).'&nbsp;';

      /* Botones de VER REVISINES Y VERSION PARA IMPRIMIR */
      echo $this->Html->link('<i class="fa fa-code-fork"></i>' .__('Ver Revisiones'),
          array('controller'=>'revisions','action' => 'index',$revision['Proyecto']['id']),
          array('class'=>'btn btn-default','escape'=>false)
        ).'&nbsp;';
    }

    if($mod_activo['proyecto.imprimir']){
      echo $this->Html->link('<i class="fa fa-print fa-fw"></i> '.__('Imprimir Planillas'), '#',
        array('class'=>'btn btn-default','escape'=>false, 'data-toggle'=>'modal', 'data-target'=>'#planillasModal')
      );
    }
  ?>
</div>


<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
  alert("asdasd");
  //$('.panel_main .proyecto_titulo').text('<?php echo strip_tags($revision['Revision']['titulo']); ?>');
<?php echo $this->Html->scriptEnd(); ?>
