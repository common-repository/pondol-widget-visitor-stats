<?php 
	$visitor_menu = array(
		"pondolwidget_visitor_stats_overall"=>"OverAll"
		,"pondolwidget_visitor_stats_daily"=>"Daily Status"
		,"pondolwidget_visitor_stats_weekly"=>"Weekly Status"
		,"pondolwidget_visitor_stats_monthly"=>"Monthly Status"
		,"pondolwidget_visitor_stats_yearly"=>"Yearly Status"
		,"pondolwidget_visitor_stats_referer"=>"Referer Status"
		,"pondolwidget_visitor_stats_setting"=>"Setting"
	);		
?>
<h2><?php _e($visitor_menu[$_GET["page"]], 'pondolwidget_visitor_stats');?>  | <a href="?page=pondolwidget_visitor_stats_setting" class="add-new-h2"><?php _e("Go To Setting", 'pondolwidget_visitor_stats');?></a></h2>



<p>
<!-- <ul class="subsubsub"> -->
<ul class="pondol_visitor_navy">
	<?php foreach($visitor_menu as $key=>$val){
		$selected	= $key == $_GET["page"] ? ' class="current"':'';
		echo '<li><a href="?page='.$key.'""'.$selected.'>'.$val.'</a> |</li>';
	}
	?>
</ul>
</p>



<p>
<?php 
	switch($_GET["page"]){ 
		case "pondolwidget_visitor_stats_daily":
		case "pondolwidget_visitor_stats_weekly":
		case "pondolwidget_visitor_stats_referer":
			
?>
	
	<form method="post">
		
			<label>Year: </label>
			<select name="s_year">
<?php
for($i=date("Y"); $i>=2014; $i--) {
	$selected = $i == $s_year ? " selected":"";
	echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
}
?>
			</select>

			<label>Month: </label>
			<select name="s_month">
<?php
for($i=1;$i<=12;$i++) {
	$j	= str_pad($i, 2, '00',STR_PAD_LEFT);
	$selected = $j == $s_month ? " selected":"";
	echo '<option value="'.$j.'"'.$selected.'>'.$j.'</option>';
}
?>
			</select>

			<label>Day: </label>
			<select name="s_day">
<?php
for($i=1;$i<=31;$i++) {
	$j	= str_pad($i, 2, '00',STR_PAD_LEFT);
	$selected = $j == $s_day ? " selected":"";
	echo '<option value="'.$j.'"'.$selected.'>'.$j.'</option>';
}
?>
			</select>

		<button type="submit">Go</button>
	</form>
<?php
		break;
		case "pondolwidget_visitor_stats_monthly":
?>
		<form method="post">
			<label>Year: </label>
			<select name="s_year">
<?php
for($i=date("Y"); $i>=2014; $i--) {
	$selected = $i == $s_year ? " selected":"";
	echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
}
?>
			</select>

			<label>Month: </label>
			<select name="s_month">
<?php
for($i=1;$i<=12;$i++) {
	$j	= str_pad($i, 2, '00',STR_PAD_LEFT);
	$selected = $j == $s_month ? " selected":"";
	echo '<option value="'.$j.'"'.$selected.'>'.$j.'</option>';
}
?>
			</select>
			<button type="submit">Go</button>
	</form>
<?php
		break;
		case "pondolwidget_visitor_stats_yearly":
?>
		<form method="post">
			<label>Year: </label>
			<select name="s_year">
<?php
for($i=date("Y"); $i>=2014; $i--) {
	$selected = $i == $s_year ? " selected":"";
	echo '<option value="'.$i.'"'.$selected.'>'.$i.'</option>';
}
?>
			</select>

			<button type="submit">Go</button>
	</form>
<?php
		break;
	} 
?>
</p>
