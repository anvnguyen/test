<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<select id="change-chart">
  <option value="line">Line chart</option>
  <option value="column">Column chart</option>
</select>

<div id="container"></div>
<div id="container2" style="display: none;"></div>

<?php
/* @var $this TransactionController */
/* @var $dataProvider CActiveDataProvider */
?>

<script>
jQuery(document).ready(function() {
    $.ajax({
		url: "<?php echo Yii::app()->createUrl("transaction/getData") ;?>", 
		success: function(result){
			var result = jQuery.parseJSON(result);
			for(var i = 0; i < result.count.length; i++)
    			result.count[i] = parseInt(result.count[i], 10);

        	lineChart(result);
        	columnChart(result);			
    	}
	});
});

function lineChart(data){
	Highcharts.chart('container', {
		title: {
			text: 'Orders per month'
		},
		yAxis: {
			title: {
				text: 'Number of orders'
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle'
		},

		plotOptions: {
			series: {
				pointStart: 1
			}
		},

		series: [{
			name: 'Orders',
			data: data.count
		}]
	});
}

function columnChart(data){
	Highcharts.chart('container2', {
		chart: {
			type: 'column'
		},

		title: {
			text: 'Number of orders'
		},

		xAxis: {
			categories: data.month
		},

		yAxis: {
			allowDecimals: false,
			min: 0,
			title: {
				text: 'Number of orders'
			}
		},

		tooltip: {
			formatter: function () {
				return '<b>' + this.x + '</b><br/>' +
					this.series.name + ': ' + this.y ;
			}
		},

		plotOptions: {
			column: {
				stacking: 'normal'
			}
		},

		series: [{
			name: 'Orders',
			data: data.count,
			stack: 'male'
		}]
	});
}

$( "#change-chart" ).change(function() {

	switch($( "#change-chart option:selected").val()){
		case "line":
			$("#container").show();
			$("#container2").hide();
			break;
		case "column":
			$("#container").hide();
			$("#container2").show();
			break;
	}
});

</script>






