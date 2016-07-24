<?php header('Content-type: text/html; charset=UTF-8'); ?>

<!DOCTYPE html>
<html lang="es">

<head>

    <?php echo $this->Html->charset('utf-8'); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>pGrado</title>

    <!-- Bootstrap Core CSS -->
    <?php echo $this->Html->css('/libs/bootstrap/dist/css/bootstrap.min'); // Bootstrap ?>

    <!-- Custom CSS -->
    <?php echo $this->Html->css('PanelAdmin.sb-admin'); ?>
    <?php echo $this->Html->css('PanelAdmin.style'); ?>

    <!-- Custom Fonts -->
    <?php echo $this->Html->css('/libs/font-awesome/css/font-awesome.min'); // Font Awesome Icons ?>

    <?php echo $this->fetch('css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php echo $this->Html->link('pGrado','/',array('class'=>'navbar-brand')); ?>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <?php // echo $this->element('nav/alerts'); ?>
                <?php echo $this->element('nav/user'); ?>

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">

                <?php echo $this->element('nav/left');?>

            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <!-- <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
            </div> -->
            <!-- /#page-wrapper -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /#wrapper -->


        <?php

                echo $this->Html->script('/libs/jquery/dist/jquery.min');           // jQuery
                echo $this->Html->script('/libs/bootstrap/dist/js/bootstrap.min');  // Bootstrap JS
                echo $this->Html->script('PanelAdmin.app');
                echo $this->fetch('script');
        ?>

</body>

</html>
