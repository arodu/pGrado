<nav class="navbar navbar-yellow">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand">Panel Coordinador</span>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php if(isset($links['left'])): ?>
        <ul class="nav navbar-nav">
          <?php foreach ($links['left'] as $link => $url): ?>
            <li><?php echo $this->Html->link($link, $url, array('escape'=>false)); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if(isset($links['right'])): ?>
        <ul class="nav navbar-nav navbar-right">
          <?php foreach ($links['right'] as $link => $url): ?>
            <li><?php echo $this->Html->link($link, $url, array('escape'=>false)); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
