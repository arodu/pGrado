
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

	<?php echo $this->element('sidebar/panel/usuario'); ?>

	<?php // echo $this->element('sidebar/panel/search'); ?>

	<ul class="sidebar-menu">
		<li class="header">MENÚ PRINCIPAL</li>

		<li>
			<?php echo $this->Html->link('<i class="fa fa-home"></i> <span>Inicio</span>','/',array('escape'=>false)); ?>
		</li>

		<?php
			if(isset($userInfo['perfil']['estudiante']) && $userInfo['perfil']['estudiante'])
				echo $this->element('sidebar/menu/estudiante');

			//if(isset($userInfo['perfil']['tutoracad']) && $userInfo['perfil']['tutoracad'])
			//	echo $this->element('sidebar/menu/tutoracad');

			//if(isset($userInfo['perfil']['tutormetod']) && $userInfo['perfil']['tutormetod'])
			//	echo $this->element('sidebar/menu/tutormetod');

			if(isset($userInfo['perfil']['tutoracad']) && $userInfo['perfil']['tutoracad'])
				echo $this->element('sidebar/menu/docente');

			if(isset($userInfo['perfil']['coordpg']) && $userInfo['perfil']['coordpg'])
				echo $this->element('sidebar/menu/coordpg');

			//if(isset($userInfo['perfil']['admin']) && $userInfo['perfil']['admin'])
			//    echo $this->element('sidebar/menu/admin');

			if(isset($userInfo) && $userInfo)
				echo $this->element('sidebar/menu/usuario');

		/*
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-files-o"></i>
				<span>Layout Options</span>
				<span class="label label-primary pull-right">4</span>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
				<li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
				<li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
				<li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
			  </ul>
			</li>
			<li>
			  <a href="../widgets.html">
				<i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
			  </a>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-pie-chart"></i>
				<span>Charts</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
				<li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
				<li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
			  </ul>
			</li>
			<li class="treeview active">
			  <a href="#">
				<i class="fa fa-laptop"></i>
				<span>UI Elements</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li class="active"><a href="general.html"><i class="fa fa-circle-o"></i> General</a></li>
				<li><a href="icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
				<li><a href="buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
				<li><a href="sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
				<li><a href="timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
				<li><a href="modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-edit"></i> <span>Forms</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
				<li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
				<li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-table"></i> <span>Tables</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
				<li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
			  </ul>
			</li>
			<li>
			  <a href="../calendar.html">
				<i class="fa fa-calendar"></i> <span>Calendar</span>
				<small class="label pull-right bg-red">3</small>
			  </a>
			</li>
			<li>
			  <a href="../mailbox/mailbox.html">
				<i class="fa fa-envelope"></i> <span>Mailbox</span>
				<small class="label pull-right bg-yellow">12</small>
			  </a>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-folder"></i> <span>Examples</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
				<li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
				<li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
				<li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
				<li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
				<li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
				<li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
			  </ul>
			</li>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-share"></i> <span>Multilevel</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
				<li>
				  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
				  <ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
					<li>
					  <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
					  <ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
						<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
					  </ul>
					</li>
				  </ul>
				</li>
				<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
			  </ul>
			</li>
			<li><a href="../../documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
			<li class="header">LABELS</li>
			<li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
			<li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
			<li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
		*/ ?>

	</ul>

	<?php //echo $this->element('sidebar/panel/facebook'); ?>

</section>
