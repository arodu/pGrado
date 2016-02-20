<?php if(isset($userInfo)){ ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> <?php echo $userInfo['nombre']; ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <?php echo $this->Html->link('<i class="fa fa-fw fa-user"></i> Perfil',array('controller'=>'usuarios','action'=>'perfilUsuario'),array('escape'=>false)); ?>
            </li>
            <li>
                <?php echo $this->Html->link('<i class="fa fa-fw fa-arrow-circle-left"></i> Volver','/',array('escape'=>false)); ?>
            </li>

            <!--<li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li> -->
            <li class="divider"></li>
            <li>
                <?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Cerrar Sesión',array('controller'=>'usuarios','action'=>'logout'),array('escape'=>false)); ?>
            </li>
        </ul>
    </li>
<?php } ?>

<?php // debug($this->Session->read('userInfo'));?>