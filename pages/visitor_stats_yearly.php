<script>
    jQuery(document).ready(function($) {
        $(".uniquebar").chart({
            height : 5,
            bgcolor : "blue"
        });
        $(".pageviewbar").chart({
            height : 5,
            bgcolor : "red"
        });
    });
</script>
<table class="table">
	<col width="70px" />
	<col width="*" />
	<col width="120px" />
	<tbody>
<?php
for($i=1; $i<=12; $i++){
	$j = str_pad($i, 2, "0", STR_PAD_LEFT);
$unique_per=(int)($unique[$j]/$unique_total*100);
$normal_per=(int)($normal[$j]/$normal_total*100);   
?>
		<tr>
			<th>
				-<?php echo $j?>월 
			</th>
			<td><div>
					<ul style="text-align:left">
						<li ratio="<?php echo $unique_per?>" class="uniquebar" alt='<?php echo $week[$i]?> 방문자수 : <?php echo $unique[$j]?>'></li>
						<li ratio="<?php echo $normal_per?>" class="pageviewbar" alt='<?php echo $week[$i]?> 페이지뷰 : <?php echo $normal[$j]?>'></li>
					</ul>
				</div></td>
			<th>Unique :
				<?php echo $unique[$j]?>
				<br />
				PageView :
				<?php echo $normal[$j]?>
			</th>
		</tr>
<?php
} /* for($i=0;$i<12;$i++) */
		?>
	</tbody>
</table>
