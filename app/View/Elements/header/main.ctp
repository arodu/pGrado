<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
	<!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>

	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<?php
				if(isset($userInfo) && $userInfo){
					//echo $this->element('header/menu/messages');
					if($mod_activo['main.mensajes']){ echo $this->element('header/menu/notifications'); }
					//echo $this->element('header/menu/tasks');
					echo $this->element('header/menu/user');
				}
			?>
		</ul>
	</div>
</nav>
