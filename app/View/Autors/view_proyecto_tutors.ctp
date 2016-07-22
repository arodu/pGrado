<div class="box-header">
  <h3 class="box-title"><?php echo ((count($tutors) >= 2) ? 'Tutores' : 'Tutor');?></h3>
</div>
<div class="box-body">
  <?php $academico = $metodologico = false; ?>
  <?php foreach ($tutors as $tutor): ?>
      <?php $btn_perfil = ( $tutor['Autor']['activo'] ? 'btn-perfil-tutor' : '' ); ?>
      <div class="autor <?php echo ( $tutor['Autor']['activo'] ? 'activo' : 'inactivo' ); ?>">
        <div class="avatar">
          <?php echo $this->Custom->userFoto( $tutor['Usuario']['avatar'], 'xs', array('class'=>'img-circle '.$btn_perfil,'data-id' => $tutor['Usuario']['id']) ); ?>
        </div>
        <div class="datos">
          <span class="nombre"><?php echo $tutor['Usuario']['nombre_completo']; ?></span>
          <span class="cedula"><?php echo $tutor['TipoAutor']['nombre']; ?></span>
          <i class="user-inactivo fa fa-user-times fa-fw btn-tooltip mano" title="No ha aceptado <br/>solicitud de proyecto"></i>
        </div>
        <?php if( !$proyecto['Proyecto']['bloqueado'] and (!$tutor['Autor']['activo'] or $userInfo['id']==$tutor['Usuario']['id']) ): ?>
            <?php
              echo $this->Form->button('<i class="fa fa-times-circle"></i>',array(
                'type' => 'button',
                'class'=>'text-danger close tutor-modal-link',
                'data-url'=> $this->Html->url(array('controller'=>'autors', 'action'=>'delete_tutor', $tutor['Autor']['id'])),
                'data-action'=>'delete',
                'title'=>'Eliminar Tutor',
              ));
            ?>
        <?php endif; ?>

      </div>

      <?php
        $academico = ( $tutor['TipoAutor']['code']=='tutoracad' ? true : $academico );
        $metodologico = ( $tutor['TipoAutor']['code']=='tutormetod' ? true : $metodologico );
      ?>
  <?php endforeach; ?>
</div>

<?php if(!$proyecto['Proyecto']['bloqueado']): ?>
  <div class="box-footer">
    <?php if(!$academico): ?>
      <?php
        echo $this->Form->button('<i class="fa fa-plus"></i> '.__('Académico'),array(
          'type' => 'button',
          'class'=>'btn btn-default btn-xs btn-tooltip tutor-modal-link',
          'data-url'=> $this->Html->url(array('controller'=>'autors', 'action'=>'add_tutor', $proyecto['Proyecto']['id'], 'tutoracad')),
          'data-action'=>'add',
          'title'=>'Agregar Tutor Académico',
        ));
      ?>
    <?php endif; ?>
    <?php if(!$metodologico): ?>
      <?php
        echo $this->Form->button('<i class="fa fa-plus"></i> '.__('Metodológico'),array(
          'type' => 'button',
          'class'=>'btn btn-default btn-xs btn-tooltip tutor-modal-link',
          'data-url'=> $this->Html->url(array('controller'=>'autors', 'action'=>'add_tutor', $proyecto['Proyecto']['id'], 'tutormetod')),
          'data-action'=>'add',
          'title'=>'Agregar Tutor Metodológico',
        ));
      ?>
    <?php endif; ?>

  </div>
<?php endif; ?>

<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
  $('.tutor-modal-link').modalLink('#generalModal');
  $('.btn-perfil-tutor').popoverPerfil();
<?php echo $this->Html->scriptEnd(); ?>
