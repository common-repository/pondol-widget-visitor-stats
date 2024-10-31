<script>
jQuery( document ).ready(function( $ ) {
	$(".uniquebar").chart({	height:5,bgcolor:"blue"});
	$(".pageviewbar").chart({	height:5,bgcolor:"red"});
});
</script>


<table class="table">
	<col width="150px" />
	<col width="*" />
	<col width="120px" />
	<tbody>
<?php
  for($i=0;$i<7;$i++)
  {
   $unique_per=(int)($unique[$i]/$unique_total*100);
   $normal_per=(int)($normal[$i]/$normal_total*100);
?>
		<tr>
			<th>-
				<?php echo $week[$i]?>
				(
				<?php echo date("Y/m/d", mktime(0,0,0,$s_month,$s_day-$w_today+$i,$s_year));?>
				) 
			</th>
			<td><div>
					<ul style="text-align:left">
						<li ratio="<?php echo $unique_per?>" class="uniquebar" alt='<?php echo $week[$i]?> unique view : <?php echo $unique[$i]?>'></li>
						<li ratio="<?php echo $normal_per?>"  class="pageviewbar" alt='<?php echo $week[$i]?> page view : <?php echo $normal[$i]?>'></li>
					</ul>
				</div></td>
			<th>&nbsp; Unique :
				<?php echo $unique[$i]?>
				<br />
				&nbsp; PageView :
				<?php echo $normal[$i]?>
			</th>
		</tr>
<?php
  }/* for($i=0;$i<7;$i++) */
?>
	</tbody>
</table>
