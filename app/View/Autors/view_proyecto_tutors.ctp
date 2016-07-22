<div class="box-header">
  <h3 class="box-title"><?php echo ((count($tutors) >= 2) ? 'Tutores' : 'Tutor');?></h3>
</div>
<div class="box-body">
  <?php $academico = $metodologico = false; ?>
  <?php foreach ($tutors as $tutor): ?>
      <?php $btn_perfil = ( $tutor['Autor']['activo'] ? 'btn-perfil' : '' ); ?>
      <div class="autor <?php echo ( $tutor['Autor']['activo'] ? 'activo' : 'inactivo' ); ?>">
        <div class="avatar">
          <?php
            $user_imagen = $this->element('usuario/avatarXS',array('foto' => $tutor['Usuario']['foto']));
            echo $this->Html->image($user_imagen,array('class'=>'img-circle '.$btn_perfil,'data-id' => $tutor['Usuario']['id'] ));
          ?>
        </div>
        <div class="datos">
          <span class="nombre"><?php echo $tutor['Usuario']['nombre_completo']; ?></span>
          <span class="cedula"><?php echo $tutor['TipoAutor']['nombre']; ?></span>
          <i class="user-inactivo fa fa-user-times fa-fw btn-tooltip mano" title="No ha aceptado <br/>solicitud de proyecto"></i>
        </div>
        <?php if( !$proyecto['Proyecto']['bloqueado'] and (!$tutor['Autor']['activo']) ): ?>
          <?php //if( !$proyecto['Proyecto']['bloqueado'] and (!$autor['activo'] or $userInfo['id']==$autor['Usuario']['id']) ): ?>
          <?php echo $this->Form->postLink('<i class="fa fa-times-circle"></i>', array('controller'=>'autors','action' => 'delete',$tutor['Autor']['id']), array('class'=>'text-danger close','title'=>'Eliminar','escape'=>false), __('¿Esta seguro que desea eliminar este '.$tutor['TipoAutor']['nombre'].' de su Proyecto?')); ?>
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
      <button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="tutoracad" title="Agregar Tutor Académico"><i class="fa fa-plus"></i> Académico</button>
    <?php endif; ?>

    <?php if(!$metodologico): ?>
      <button type="button" class="btn btn-default btn-xs btn-tooltip" data-toggle="modal" data-target="#addAutor" data-whatever="tutormetod" title="Agregar Tutor Metodológico"><i class="fa fa-plus"></i> Metodológico</button>
    <?php endif; ?>

  </div>
<?php endif; ?>
