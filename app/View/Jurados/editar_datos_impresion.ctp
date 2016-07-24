<div class="col-sm-9">
  <div class="box box-primary">
    <div class="box-header text-justify">
      <h3 class="box-title">
        <?php echo $cant_proyectos.' Proyectos Encontrado' ?>
      </h3>
    </div>

    <?php echo $this->bsForm->create('GrupoMeta', array('class'=>'ajaxForm')); ?>
      <div class="box-body">

        <?php echo $this->Flash->render(); ?>

        <?php
          echo $this->Form->hidden('GrupoMeta.grupo_id');
          echo $this->Form->hidden('GrupoMeta.fase_id');

          echo $this->Form->input('GrupoMeta.no_consj_area',array(
        				'label'=>'N° Consejo de Área',
        				'required'=>true,
        				'type'=>'number',
        				'class'=>'form-control',
        				'div'=>array('class'=>'form-group col-md-4 required')
        			));

        	echo $this->Form->input('GrupoMeta.fecha_consj_area',array(
        				'label'=>'Fecha de Consejo de Área',
        				'required'=>true,
        				'type'=>'text',
        				'class'=>'datepicker form-control',
        				'placeholder'=>'dd-mm-yyyy',
        				'div'=>array('class'=>'form-group col-md-4 required')
        			));

        	echo $this->Form->input('GrupoMeta.fecha_comun',array(
        				'label'=>'Fecha de Comunicación',
        				'required'=>true,
        				'type'=>'text',
        				'class'=>'datepicker form-control',
        				'placeholder'=>'dd-mm-yyyy',
        				'div'=>array('class'=>'form-group col-md-4 required')
        			));
        ?>
      </div>
      <div class="box-footer">
        <?php echo $this->bsForm->button('Guardar', array('type'=>'submit', 'class'=>'btn btn-primary btn-submit')); ?>

        <?php if( $cant_proyectos > 0 and !$empty ): ?>
          <?php
            echo $this->Html->link(
              'Comunicaciones',
              array('controller'=>'jurados', 'action'=>'cartas_asignacion_defensa',$this->Form->value('GrupoMeta.grupo_id')),
              array('class'=>'btn btn-success', 'target'=>'blank')
            );
          ?>

          <?php //echo $this->bsForm->button('Comunicaciones', array('type'=>'submit', 'name'=>'btn','value'=>'comunicaciones', 'class'=>'btn btn-success')); ?>
          <?php //echo $this->bsForm->button('Actas de Evaluación', array('type'=>'submit', 'name'=>'btn','value'=>'actas_evaluacion', 'class'=>'btn btn-success')); ?>
        <?php endif; ?>

      </div>
    <?php echo $this->bsForm->end(); ?>
  </div>
</div>


<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>
	$('.ajaxForm').ajaxFormulario('#grupo-meta');
<?php echo $this->Html->scriptEnd(); ?>
