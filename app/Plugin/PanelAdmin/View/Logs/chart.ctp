<div class="panel panel-default">
  <div class="panel-heading">
	<?php
		echo $this->Form->create('Log', array('class'=>'form-chart form-inline'));
		echo $this->Form->input('descripcionLogCode',array('options'=>$descripcionLogs, 'class'=>'form-control'));
		echo $this->Form->end();
	?>
  </div>
  <div class="panel-body">
    <div id="line-chart" style="height: 400px;"></div>
  </div>
</div>


<?php
	echo $this->Html->script('/libs/flot/jquery.flot.min',array('inline'=>false));
	echo $this->Html->script('/libs/flot/jquery.flot.resize.min',array('inline'=>false));
	echo $this->Html->script('/libs/flot/jquery.flot.pie.min',array('inline'=>false));
	echo $this->Html->script('/libs/flot/jquery.flot.categories.min',array('inline'=>false));
	echo $this->Html->script('/libs/flot/jquery.flot.time.min',array('inline'=>false));

	/*
	<script src="../../dist/js/demo.js" type="text/javascript"></script>
	<!-- FLOT CHARTS -->
	<script src="../../plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="../../plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
	<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
	<script src="../../plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
	<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
	<script src="../../plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
	*/
?>

<?php $this->Html->scriptStart(array('inline' => false)); ?>


	$('.form-chart select').on('change',function(){
		// alert("asdasd");
		$('.form-chart').submit();
	});
	

	var line_data1 = <?php echo json_encode($data1);?>;

	$.plot("#line-chart", [line_data1], {
		grid: {
			hoverable: true,
			borderColor: "#f3f3f3",
			borderWidth: 1,
			tickColor: "#f3f3f3"
		},
		series: {
			shadowSize: 0,
			lines: {
				show: true
			},
			points: {
				show: true
			}
		},
		lines: {
			fill: false,
			color: ["#3c8dbc", "#f56954"]
		},
		yaxis: {
			show: true,
		},
		xaxis: {
			show: true,
			mode: "time",
			timeformat: "%d/%m/%Y"
		}
	});


	//Initialize tooltip on hover
	$("<div class='tooltip-inner' id='line-chart-tooltip'></div>").css({
		position: "absolute",
		display: "none",
		opacity: 0.8
	}).appendTo("body");


	$("#line-chart").bind("plothover", function (event, pos, item) {
		if (item) {



			var x = item.datapoint[0].toFixed(2),
			y = item.datapoint[1].toFixed(2);

			var date = new Date( parseInt(x) );
			var x_date = date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();


			$("#line-chart-tooltip").html(item.series.label + " of " + x_date + " = " + y)
				.css({top: item.pageY + 5, left: item.pageX + 5})
				.fadeIn(200);
		} else {
			$("#line-chart-tooltip").hide();
		}
	});

<?php $this->Html->scriptEnd(); ?>