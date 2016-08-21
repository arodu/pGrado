<?php
  //$deleted = $comentario['Comentario']['eliminado'];
  //$edited = $comentario['Comentario']['created'] != $comentario['Comentario']['updated'];
  //$isMy = $user_active = $comentario['Usuario']['id'] == $userInfo['id'];

  /*

  if($deleted){  // My Comment
    $icon = array('bg'=>'bg-red','fa'=>'fa-trash', 'class'=>'');
  }elseif($isMy and !$edited){
    $icon = array('bg'=>'bg-blue','fa'=>'fa-comment fa-flip-horizontal', 'class'=>'');
  }elseif($isMy and $edited){
    $icon = array('bg'=>'bg-blue','fa'=>'fa-commenting fa-flip-horizontal', 'class'=>'');
  }elseif(!$isMy and !$edited){
    $icon = array('bg'=>'bg-green','fa'=>'fa-comment', 'class'=>'');
  }elseif(!$isMy and $edited){
    $icon = array('bg'=>'bg-green','fa'=>'fa-commenting', 'class'=>'');
  }else{
    $icon = array('bg'=>'bg-gray','fa'=>'fa-comments', 'class'=>'');
  }

  */
   $icon = array('bg'=>'bg-yellow','fa'=>'fa-desktop', 'class'=>'');

?>

<li>
	<i class="fa <?php echo $icon['fa'].' '.$icon['bg'];?>"></i>
	<div class="timeline-item">
		<h3 class="timeline-header <?php echo $icon['class'];?>" >
        <?php echo $comentario['Comentario']['texto'] ?>
			<br class="visible-xs">

      <br/>
      <small class="time">
        <span class="btn-perfil" data-id="<?php echo $comentario['Usuario']['id'];?>">
          <?php echo 'por '.$comentario['Usuario']['nombre_completo']; ?>
        </span>
        <i class="fa fa-clock-o fa-fw"></i>&nbsp;<?php echo $this->General->timeFormatView($comentario['Comentario']['created']);?>
      </small>

		</h3>
	</div>
</li>
