<script>
jQuery( document ).ready(function( $ ) {
	$(".uniquebar").chart({	height:5,bgcolor:"blue"});
	$(".pageviewbar").chart({	height:5,bgcolor:"red"});
});
</script>
<table class="table">
	<col width="70px" />
	<col width="*" />
	<col width="120px" />
	<tbody>
<?php

//print_r($normal);
for($i=$start_day; $i<=$last_day; $i++){
	$unique_per=(int)($unique[$i]/$unique_total*100);
	$normal_per=(int)($normal[$i]/$normal_total*100);
?>
		<tr>
			<th>-
				<?php echo substr($i, -2);?> day
			</th>
			<td><div>
					<ul style="text-align:left">
						<li ratio="<?php echo $unique_per?>" class="uniquebar" alt='Unique : <?php $unique[$i]?>'></li>
						<li ratio="<?php echo $normal_per?>" class="pageviewbar" alt='PageView : <?php echo $normal[$i]?>'></li>
					</ul>
				</div></td>
			<th>Unique :
				<?php echo $unique[$i]?>
				<br />
				PageView :
				<?php echo $normal[$i]?>
			</th>
		</tr>
<?php	 
}
?>
	</tbody>
</table>
