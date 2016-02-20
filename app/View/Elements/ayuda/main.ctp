<?php
$ayuda = @$this->element('ayuda/'.$ruta);

$col = ( isset($col) ? $col : 'col-sm-3' ); 

 if($ayuda){ ?>
		<div class="panel-ayuda <?php echo $col;?>">
			<div class="box box-primary">
				<!-- <div class="box-header">
					<h3 class="box-title">Ayuda</h3>
				</div> -->
				<div class="box-body text-justify">

					<?php echo $ayuda; ?>

				</div>
				<!-- <div class="box-footer">
					sdasdasd
					asda
					sda
					sdasdsd
				</div> -->
			</div>
		</div>
<?php } ?>