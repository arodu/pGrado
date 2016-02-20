<?php
	$cn = 0;

?>

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php if($cn > 0){ ?>
			<i class="fa fa-bell-o"></i>
			<span class="label label-danger"><?php echo $cn;?></span>
		<?php }else{ ?>
			<i class="fa fa-bell-slash-o text-gray"></i>
		<?php } ?>
	</a>

	<ul class="dropdown-menu">
		<li class="header">
			<?php
				if($cn == 0){
					echo 'No tienes Notificaciones';
				}elseif($cn == 1){
					echo 'Tienes 1 notificación';
				}else{
					echo 'Tienes '.$cn.' notificaciones';
				}
			?>
		</li>

		<li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
				<li>
					<a href="#">
						<i class="fa fa-users text-aqua"></i>
						 5 new members joined today 5 new members joined today 
						 <br/><small class="text-muted"><i class="fa fa-clock-o fa-fw"></i> hace 4 minutos</small>
					</a>
				</li>
				<li>
					<a href="#">	
						<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page 	and may cause design problems
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-users text-red"></i> 5 new members joined
						<br/><small class="text-muted"><i class="fa fa-clock-o fa-fw"></i> hace 4 minutos</small>
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-shopping-cart text-green"></i> 25 sales made
					</a>
				</li>
				<li>
					<a href="#">
						<i class="fa fa-user text-red"></i> You changed your username
					</a>
				</li>
			</ul>
		</li>

		<li class="footer"><a href="#">Ver todos</a></li>
	</ul>
</li>