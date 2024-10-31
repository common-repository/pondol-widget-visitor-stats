<div id="dashboard-widgets" class="metabox-holder">
    <div class="postbox-container" width="50%">

	
		<div id="dashboard_right_now" class="postbox ">
			<h3 class="hndle"><span><?php _e('Total ', 'pondolwidget_visitor_stats')?></span></h3>
			<div class="inside">
				<div class="main">
					<ul>
						<li>
							<?php _e('Total number of visitors', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["total_hit"])?>
						</li>
						<li>
							<?php _e('Total number of Page Views', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["total_view"])?>
						</li>
					</ul>
					<p id="wp-version-message">
					</p>
				</div>
				<div class="sub">
					<p class="akismet-right-now">
						<?php _e('Total Vistor count ', 'pondolwidget_visitor_stats')?>

					</p>
				</div>
			</div>
		</div>

		
		<div id="dashboard_right_now" class="postbox ">
			<h3 class="hndle"><span><?php _e('Today ', 'pondolwidget_visitor_stats')?></span></h3>
			<div class="inside">
				<div class="main">
					<ul>
						<li>
							<?php _e('Visitors today', 'pondolwidget_visitor_stats')?>  :
							<?php echo number_format($count["today_hit"])?>
						</li>
						<li>
							<?php _e('Page Views today', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["today_view"])?>
						</li>
					</ul>
					<p id="wp-version-message">
					</p>
				</div>
				<div class="sub">
					<p class="akismet-right-now">
						<?php _e('Today Vistor count ', 'pondolwidget_visitor_stats')?>

					</p>
				</div>
			</div>
		</div>
	

		<div id="dashboard_right_now" class="postbox ">
			<h3 class="hndle"><span><?php _e('YesterDay ', 'pondolwidget_visitor_stats')?></span></h3>
			<div class="inside">
				<div class="main">
					<ul>
						<li>
							<?php _e('Visitors yesterday', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["yesterday_hit"])?>
						</li>
						<li>
							<?php _e('Page Views yesterday', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["yesterday_view"])?>
						</li>
					</ul>
					<p id="wp-version-message">
					</p>
				</div>
				<div class="sub">
					<p class="akismet-right-now">
						<?php _e('Yesterday Vistor count ', 'pondolwidget_visitor_stats')?>

					</p>
				</div>
			</div>
		</div>
		
		
		
	</div><!-- . postbox-container -->
	<div class="postbox-container" width="50%">
		
		
		<div id="dashboard_right_now" class="postbox ">
			<h3 class="hndle"><span><?php _e('Maximum ', 'pondolwidget_visitor_stats')?></span></h3>
			<div class="inside">
				<div class="main">
					<ul>
						<li>
							<?php _e('Maximum Visitors', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["max_hit"])?>
						</li>
						<li>
							<?php _e('Maximum Page Views', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["max_view"])?>
						</li>
					</ul>
					<p id="wp-version-message">
					</p>
				</div>
				<div class="sub">
					<p class="akismet-right-now">
						<?php _e('Maximum Vistor count ', 'pondolwidget_visitor_stats')?>

					</p>
				</div>
			</div>
		</div>
		
		
		<div id="dashboard_right_now" class="postbox ">
			<h3 class="hndle"><span><?php _e('Lowest ', 'pondolwidget_visitor_stats')?></span></h3>
			<div class="inside">
				<div class="main">
					<ul>
						<li>
							<?php _e('Lowest Visitors', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["min_hit"])?>
						</li>
						<li>
							<?php _e('Lowest Page Views', 'pondolwidget_visitor_stats')?> :
							<?php echo number_format($count["min_view"])?>
						</li>
					</ul>
					<p id="wp-version-message">
					</p>
				</div>
				<div class="sub">
					<p class="akismet-right-now">
						<?php _e('Lowest Vistor count ', 'pondolwidget_visitor_stats')?>

					</p>
				</div>
			</div>
		</div>
		
	</div><!-- . postbox-container -->
</div>