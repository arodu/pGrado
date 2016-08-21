<?php

  $deleted = $comentario['Comentario']['eliminado'];
  $edited = $comentario['Comentario']['created'] != $comentario['Comentario']['updated'];
  $isMy = $user_active = $comentario['Usuario']['id'] == $userInfo['id'];

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

?>




			<li>
				<i class="fa <?php echo $icon['fa'].' '.$icon['bg'];?>"></i>
				<div class="timeline-item">
					<h3 class="timeline-header <?php echo $icon['class'];?>" >
						<span class="btn-perfil" data-id="<?php echo $comentario['Usuario']['id'];?>">
							<?php echo $this->Custom->userFoto( $comentario['Usuario']['avatar'], 'xxs', array('class'=>'user-image img-circle','alt'=>'User Image','width'=>'20') ); ?>
							<?php echo $comentario['Usuario']['nombre_completo'];?>
						</span>
						<br class="visible-xs">
						<small class="time">
							<i class="fa fa-clock-o fa-fw"></i>&nbsp;<?php echo $this->General->timeFormatView($comentario['Comentario']['created']);?>

							<?php
								if($comentario['Comentario']['eliminado'] == true ){
									echo '<em>[Eliminado: '.$this->General->dateTimeFormatView($comentario['Comentario']['updated']).']</em>';
								}elseif( $comentario['Comentario']['created'] != $comentario['Comentario']['updated']){
									echo '<em>[Editado: '.$this->General->dateTimeFormatView($comentario['Comentario']['updated']).']</em>';
								}
							?>
						</small>


						<?php if($user_active and $comentario['Comentario']['eliminado'] == false): ?>
							<div class="btn-group pull-right">

								<a type="button" class="mano dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-caret-down fa-fw"></i></a>

								<ul class="dropdown-menu" role="menu">
									<li>
										<?php
											echo $this->Html->link(
												'<i class="fa fa-edit fa-fw"></i>'.__('Editar'),
												array('controller'=>'comentarios', 'action'=>'edit', $comentario['Comentario']['id']),
												array('class'=>'comment-modal-link','escape'=>false)
											);
										?>
									</li>
									<li>
										<?php
											echo $this->Html->link(
												'<i class="fa fa-trash fa-fw"></i>'.__('Eliminar'),
												array('controller'=>'comentarios', 'action'=>'delete', $comentario['Comentario']['id']),
												array('class'=>'comment-modal-link','escape'=>false)
											);
										?>
									</li>
								</ul>
							</div>
						<?php endif; ?>

					</h3>

					<?php if($comentario['Comentario']['eliminado'] == false ): ?>
						<div class="timeline-body <?php echo $icon['class'];?>">
							<?php
								$text =	$comentario['Comentario']['texto'];
								//$text = str_replace(" ", "&nbsp;", $text);
								$text = str_replace("\n", "<br />", $text);

								echo $text;
							?>
						</div>
					<?php endif; ?>

				</div>
			</li>
