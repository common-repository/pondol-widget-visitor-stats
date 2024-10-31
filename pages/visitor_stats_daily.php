<script>
jQuery( document ).ready(function( $ ) {
	$(".uniquebar").chart({	height:5,bgcolor:"blue"});
	$(".pageviewbar").chart({	height:5,bgcolor:"red"});
});
</script>

<h2>Daily Status</h2>
			<table class="table">
				<col width="70px" />
				<col width="*" />
				<col width="120px" />
				<tbody>
<?php

  for($i=0;$i<24;$i++)
  {
  $j = str_pad($i, 2, "0", STR_PAD_LEFT);
  	
   $unique_per	= (int)($unique[$j]/$unique_total*100);
   $normal_per	= (int)($normal[$j]/$normal_total*100);
?>
					<tr>
						<th>
							-<?php echo $j?> Hour
						</th>
						<td><ul style="text-align:left">
								<li  ratio="<?php echo $unique_per?>" class="uniquebar" alt='<?php echo $i?>hour unique view : <?php echo $unique[$j]?>'></li>
								<li  ratio="<?php echo $normal_per?>" class="pageviewbar" alt='<?php echo $i?>hour page view : <?php echo $normal[$j]?>'></li>
							</ul></td>
						<th>Unique : <?php echo number_format($unique[$j])?>
							<br />
							PageView : <?php echo number_format($normal[$j])?>
						</th>
					</tr>
<?php
  } /* for($i=0;$i<24;$i++)문 닫음 */
?>
				</tbody>
			</table>
