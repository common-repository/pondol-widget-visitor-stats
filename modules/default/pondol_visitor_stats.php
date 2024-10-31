<style>
	.pondol_visitor_table{width:100%;}
	.pondol_visitor_table th{
		padding: 5px;
	}
</style>
<table class="pondol_visitor_table">
	<col width="100px">
	<col width="*">
	<thead>
		<tr>
			<th colspan="2" style="font-weight: bold;">Today Visitors</td>
		</tr>
	</thead>
	<?php 
		//print_r($options);
		if($options["pondol_widget_visitorstats_copyright"] == "true"){
	?>
	<tfoot>
		<tr>
			<th colspan="2" style="font-size: 10px; text-align: right;"><a href="http://www.shop-wiz.com/wp/plugins/visitorstats" target="_blank">* copyright by pondol</a></td>
		</tr>
	</tfoot>
	<?php
		}
	?>
	<tbody>
		<tr>
			<th>unique</th>
			<td>: <?php echo $row->UNIQUE_COUNTER;?></td>
		</tr>
		<tr>
			<th>pageview</td>
			<td>:<?php echo $row->PAGEVIEW; ?></td>
		</tr>
	</tbody>
</table>