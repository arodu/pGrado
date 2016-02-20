<ol class="breadcrumb">

	<li><?php echo $this->Html->link('<i class="fa fa-home fa-fw"></i>Inicio','/',array('escape'=>false)); ?></li>

	<?php
		if(isset($bc['items'])){
			foreach ($bc['items'] as $item) {
				if(isset($item['url']))
					echo '<li>'.$this->Html->link($item['title'],$item['url']).'</li>';
				else
					echo '<li class="active">'.$item['title'].'</li>';
			}
		}
	?>

	<?php if(isset($bc['config']['activo'])){ ?>
		<li class="active"><?php echo $bc['config']['activo'];?></li>
	<?php } ?>

</ol>
