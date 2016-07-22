<div class="box-header">
  <h3 class="box-title"><?php echo ((count($estudiantes) >= 2) ? 'Autores' : 'Autor');?></h3>
</div>
<div class="box-body">
  <?php foreach ($estudiantes as $estudiante): ?>
      <?php $btn_perfil = ( $estudiante['Autor']['activo'] ? 'btn-perfil' : '' ); ?>
      <div class="autor <?php echo ( $estudiante['Autor']['activo'] ? 'activo' : 'inactivo' ); ?>">
        <div class="avatar">
          <?php echo $this->Custom->userFoto( $estudiante['Usuario']['avatar'], 'xs', array('class'=>'img-circle '.$btn_perfil,'data-id' => $estudiante['Usuario']['id']) ); ?>
        </div>
        <div class="datos">
          <span class="nombre"><?php echo $estudiante['Usuario']['nombre_completo']; ?></span>
          <span class="cedula"><?php echo $estudiante['Usuario']['cedula']; ?></span>
          <i class="user-inactivo fa fa-user-times fa-fw btn-tooltip mano" title="No ha aceptado <br/>solicitud de proyecto"></i>
        </div>

        <?php if( !$proyecto['Proyecto']['bloqueado'] and (!$estudiante['Autor']['activo'] or $userInfo['id']==$estudiante['Usuario']['id']) ): ?>
            <?php
              echo $this->Form->button('<i class="fa fa-times-circle"></i>',array(
                'type' => 'button',
                'class'=>'text-danger close estudiante-modal-link',
                'data-url'=> $this->Html->url(array('controller'=>'autors', 'action'=>'delete_estudiante', $estudiante['Autor']['id'])),
                'data-action'=>'add',
                'title'=>'Eliminar Estudiante',
              ));
            ?>
        <?php endif; ?>

      </div>
  <?php endforeach; ?>
</div>

<?php if(!$proyecto['Proyecto']['bloqueado'] and !$proyecto['Proyecto']['activo']): ?>
    <?php $cant_pos_estudiante = Configure::read('proyectos.cantidad.tipo_autor.estudiante'); ?>
    <?php if(count($estudiantes) < $cant_pos_estudiante): ?>
      <div class="box-footer">
        <?php
          echo $this->Form->button('<i class="fa fa-plus"></i> '.__('Compañero'),array(
            'type' => 'button',
            'class'=>'btn btn-default btn-xs btn-tooltip estudiante-modal-link',
            'data-url'=> $this->Html->url(array('controller'=>'autors', 'action'=>'add_estudiante', $proyecto['Proyecto']['id'])),
            'data-action'=>'add',
            'title'=>'Agregar Compañero',
          ));
        ?>
      </div>
    <?php endif; ?>
<?php endif; ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
  $('.estudiante-modal-link').modalLink('#generalModal');
<?php echo $this->Html->scriptEnd(); ?>
