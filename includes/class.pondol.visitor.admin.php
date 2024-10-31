<?php
class PondolWidget_Visitor_Admin {

	private $ctrl;
	
	function __construct($controller) {
		
		$this->ctrl = $controller;
	}
	
	
	function admin_init(){
		
		
		add_action( 'admin_menu', array($this, 'register_menu') );
		add_action( 'init', array($this, 'pondolwidget_visitorstats_scripts'));//add script and css style
		add_filter('plugin_row_meta', array($this, 'add_pondol_links'), 10, 2);
	}
	
	function pondolwidget_visitorstats_scripts() {
		wp_enqueue_script( 'pondolwidget-visitor-admin-js', plugins_url('../assets/js/jquery.wizchart.js', __FILE__ ), flase, '1.0', true);
		wp_enqueue_style( 'pondolwidget-visitor-admin-css', plugins_url('../assets/css/visitor.css', __FILE__ ));
	}
	
	
	function add_pondol_links($links, $file) {
		if ($file == "pondolwidget-visitorstats/poldolwidget_visitorstats.php") {
			$rate_url = 'http://wordpress.org/support/view/plugin-reviews/' . basename(dirname(__FILE__)) . '?rate=5#postform';
			$links[] = '<a target="_blank" href="' . $rate_url . '" title="Click here to rate and review this plugin on WordPress.org">Rate this plugin</a>';
			$links[] = '<a href="' . admin_url("admin.php?page=pondolwidget_visitor_stats_setting") . '" title="pondol widget_visitorstats settting">Setting</a>';
			//$links[] = '<strong><a target="_blank" href="'.PONDOL_URL.'/wp/widget/visitor/install/" title="Get Pondol pro">Get Pro &raquo;</a></strong>';
			$links[] = '<strong><a href="mailto:'.PONDOL_EMAIL.'" title="Send Mail">Mail</a></strong>';
		}
		return $links;
	}
	
	
	function print_backendoption(){
		
		
		//$options = $this->ctrl->get_pondole_options();
		//if ($_POST['pondol_widget_visitorstats_Submit']){
		//	$options['pondol_widget_visitorstats_log_delete'] = htmlspecialchars($_POST['pondol_widget_visitorstats_log_delete']);
			
		//	update_option("pondol_widget_visitorstats", $options);
		//}
		
		$str = '<p><a href="'.admin_url('admin.php?page=pondolwidget_visitor_stats_setting').'" class="button button-primary">'.__('Go to Setting Page', 'pondolwidget_visitor_stats').'</a></p>';
		echo $str;
	}
/**
	 * 
	 */
	 function register_menu()
	{
		//function add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null ) {
		$menu = add_menu_page(
				__('PondolWidget Visitor', 'pondolwidget_visitor_stats'),
				__('PondolWidget Visitor', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_overall',
				array($this, 'print_visitor_stats_overall'),
				PONDOLWIDGET_VISITOR_URL . 'assets/images/pondol-16.png' );
	
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('OverAll', 'pondolwidget_visitor_stats'),
				__('OverAll', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_overall',
				array($this, 'print_visitor_stats_overall' ));
				

								
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Daily Status', 'pondolwidget_visitor_stats'),
				__('Daily Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_daily',
				array($this, 'print_visitor_stats_daily' ));
				
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Weekly Status', 'pondolwidget_visitor_stats'),
				__('Weekly Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_weekly',
				array($this, 'print_visitor_stats_weekly' ));
				
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Monthly Status', 'pondolwidget_visitor_stats'),
				__('Monthly Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_monthly',
				array($this, 'print_visitor_stats_monthly' ));
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Yearly Status', 'pondolwidget_visitor_stats'),
				__('Yearly Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_yearly',
				array($this, 'print_visitor_stats_yearly' ));
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Referer Status', 'pondolwidget_visitor_stats'),
				__('Referer Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_referer',
				array($this, 'print_visitor_stats_referer' ));
				
				
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Setting', 'pondolwidget_visitor_stats'),
				__('Setting', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_setting',
				array($this, 'print_visitor_stats_setting' ));				
				/*
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('Robot Status', 'pondolwidget_visitor_stats'),
				__('Robot Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_robot',
				array($this, 'print_visitor_stats_robot' ));
		$menu = add_submenu_page(
				'pondolwidget_visitor_stats_overall',
				__('RefererMonthly Status', 'pondolwidget_visitor_stats'),
				__('RefererMonthly Status', 'pondolwidget_visitor_stats'),
				'manage_options',
				'pondolwidget_visitor_stats_referer_monthly',
				array($this, 'print_visitor_stats_referer_monthly' ));
				 * */

	}
	
	
	function print_visitor_stats_setting(){
		
		$options	= $this->ctrl->func->get_pondole_options();
		$skins		= $this->ctrl->func->read_dir(PONDOLWIDGET_VISITOR_PATH . 'modules');
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_setting.php';
	}
	/**
	 * 
	 */
	 function print_visitor_stats_overall(){
	 	global $wpdb;
		

		$table_main = $this->ctrl->model->get_table_name("main");
		$row						= $wpdb->get_row("select sum(UNIQUE_COUNTER) as UNIQUE_COUNTER, sum(PAGEVIEW) as PAGEVIEW from ".$table_main);
		

		$count["total_hit"]			= $row->UNIQUE_COUNTER;
		$count["total_view"]		= $row->PAGEVIEW;

		// 오늘 카운터 읽어오는 부분
		//$row						= $wpdb->get_row("select UNIQUE_COUNTER, PAGEVIEW from ".$table_main." where VISITDATE=".date("Ymd"));
		$row						= $wpdb->get_row($wpdb->prepare("select UNIQUE_COUNTER, PAGEVIEW from ".$table_main." where VISITDATE=%d", date("Ymd")));
		$count["today_hit"]			= $row->UNIQUE_COUNTER;
		$count["today_view"]		= $row->PAGEVIEW;
		// 어제 카운터 읽어오는 부분
		//$row						= $wpdb->get_row("select UNIQUE_COUNTER, PAGEVIEW from ".$table_main." where VISITDATE=". date("Ymd", strtotime("-1 day", time())));
		$row						= $wpdb->get_row($wpdb->prepare("select UNIQUE_COUNTER, PAGEVIEW from ".$table_main." where VISITDATE=%d", date("Ymd", strtotime("-1 day", time()))));
		$count["yesterday_hit"]		= $row->UNIQUE_COUNTER;
		$count["yesterday_view"]	= $row->PAGEVIEW;
		// 최고 카운터 읽어오는 부분
		//$row						= $wpdb->get_row("select max(UNIQUE_COUNTER) as UNIQUE_COUNTER, max(PAGEVIEW) as PAGEVIEW from ".$table_main);
		$row						= $wpdb->get_row("select max(UNIQUE_COUNTER) as UNIQUE_COUNTER, max(PAGEVIEW) as PAGEVIEW from ".$table_main);
		$count["max_hit"]			= $row->UNIQUE_COUNTER;
		$count["max_view"]			= $row->PAGEVIEW;
		// 최저 카운터 읽어오는 부분
		//$row						= $wpdb->get_row("select min(UNIQUE_COUNTER) as UNIQUE_COUNTER, min(PAGEVIEW) as PAGEVIEW from ".$table_main." where VISITDATE<".date("Ymd"));
		$row						= $wpdb->get_row($wpdb->prepare("
											select min(UNIQUE_COUNTER) as UNIQUE_COUNTER, min(PAGEVIEW) as PAGEVIEW 
											from ".$table_main." 
											where VISITDATE< %d", date("Ymd")));
		$count["min_hit"]			= $row->UNIQUE_COUNTER;
		$count["min_view"]			= $row->PAGEVIEW;
  		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_overall.php';
	 }

	function print_visitor_stats_daily(){
	 	global $wpdb;
		
		//print_r($_GET);
		
		
		$table_log = $this->ctrl->model->get_table_name("log");
		
		$s_year		= $_POST["s_year"] ? $_POST["s_year"] : date("Y");
		$s_month	= $_POST["s_month"] ? $_POST["s_month"] : date("m");
		$s_day		= $_POST["s_day"] ? $_POST["s_day"] : date("d");
		
		
		$visittime = $s_year.$s_month.$s_day;	
		
		//$rows = $wpdb->get_results($wpdb->prepare("select count(distinct(IP)) as COUNT, FROM_UNIXTIME(VISITTIME, '%Y%m%d%H') as VISITTIME from ".$table_log." where FROM_UNIXTIME(VISITTIME, '%Y%m%d') =%d group by FROM_UNIXTIME(VISITTIME, '%Y%m%d%H')", $visittime));
		$rows = $wpdb->get_results($wpdb->prepare("
													select 
														count(distinct(IP)) as COUNT, VISITTIME 
													from 
														".$table_log." 
													where 
														YEAR(FROM_UNIXTIME(VISITTIME)) =%s and MONTH(FROM_UNIXTIME(VISITTIME)) =%s and DAY(FROM_UNIXTIME(VISITTIME)) =%s  
													group by 
														HOUR(FROM_UNIXTIME(VISITTIME))", $s_year, $s_month, $s_day));

		$unique_total = 0;
		if(is_array($rows)) foreach($rows as $key => $val){
			$time	= date("H", $val->VISITTIME);
			$unique[$time]	= $val->COUNT;
			$unique_total	+= $val->COUNT;
		}

		$normal_total = 0;
		//$rows = $wpdb->get_results($wpdb->prepare("select count(IP) as COUNT, FROM_UNIXTIME(VISITTIME, '%Y%m%d%H') as VISITTIME from ".$table_log." where FROM_UNIXTIME(VISITTIME, '%Y%m%d') =%d group by FROM_UNIXTIME(VISITTIME, '%Y%m%d%H')", $visittime));
		$rows = $wpdb->get_results($wpdb->prepare("
													select 
														count(IP) as COUNT, VISITTIME 
													from 
														".$table_log." 
													where 
														YEAR(FROM_UNIXTIME(VISITTIME)) =%s and MONTH(FROM_UNIXTIME(VISITTIME)) =%s and DAY(FROM_UNIXTIME(VISITTIME)) =%s  
													group by 
														HOUR(FROM_UNIXTIME(VISITTIME))", $s_year, $s_month, $s_day));
		if(is_array($rows)) foreach($rows as $key => $val){
			//$time = substr($val->VISITTIME, -2);
			$time	= date("H", $val->VISITTIME);
			$normal[$time]	= $val->COUNT;
			$normal_total	+= $val->COUNT;
		}
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_daily.php';
	 }
	
	function print_visitor_stats_weekly(){
	 	global $wpdb;
	 	$table_main = $this->ctrl->model->get_table_name("main");
		$s_year		= $_POST["s_year"] ? $_POST["s_year"] : date("Y");
		$s_month	= $_POST["s_month"] ? $_POST["s_month"] : date("m");
		$s_day		= $_POST["s_day"] ? $_POST["s_day"] : date("d");
		$w_today	= date(w, mktime(0,0,0,$s_month, $s_day, $s_year));
		$start_day	= date("Ymd", mktime(0,0,0,$s_month,$s_day-$w_today,$s_year));
		$last_day	= date("Ymd", mktime(0,0,-1,$s_month,$s_day+7-$w_today,$s_year));
 		
		$week=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		$rows		= $wpdb->get_results($wpdb->prepare("select UNIQUE_COUNTER, PAGEVIEW, VISITDATE from ".$table_main." where VISITDATE between %d and %d", $start_day, $last_day));
		if(is_array($rows)) foreach($rows as $key => $val){

			$w	= date(w, mktime(0,0,0,substr($val->VISITDATE, 4, 2), substr($val->VISITDATE, -2), substr($val->VISITDATE, 0, 4)));

			$unique[$w]		= $val->UNIQUE_COUNTER;
			$unique_total	+= $val->UNIQUE_COUNTER;
			
			$normal[$w]		= $val->PAGEVIEW;
			$normal_total	+= $val->PAGEVIEW;
		}
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_weekly.php';
	 }

	function print_visitor_stats_monthly(){
	 	global $wpdb;
	 	$table_main = $this->ctrl->model->get_table_name("main");
		
		$s_year		= $_POST["s_year"] ? $_POST["s_year"] : date("Y");
		$s_month	= $_POST["s_month"] ? $_POST["s_month"] : date("m");
		
		$start_day	= date("Ymd", mktime(0,0,0,$s_month,1,$s_year));
		$last_day	= date("Ymd", mktime(0,0,-1,$s_month+1,1,$s_year));
		
		$rows		= $wpdb->get_results($wpdb->prepare("
															select UNIQUE_COUNTER, PAGEVIEW, VISITDATE 
															from ".$table_main." 
															where VISITDATE between %d and %d order by VISITDATE desc"
															, $start_day, $last_day));

		if(is_array($rows)) foreach($rows as $key => $val){
			$unique[$val->VISITDATE]		= $val->UNIQUE_COUNTER;
			$unique_total	+= $val->UNIQUE_COUNTER;
			$normal[$val->VISITDATE]		= $val->PAGEVIEW;
			$normal_total	+= $val->PAGEVIEW;
		}
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_monthly.php';
	 }

	function print_visitor_stats_yearly(){
	 	global $wpdb;
	 	$table_main = $this->ctrl->model->get_table_name("main");
		$s_year		= $_POST["s_year"] ? $_POST["s_year"] : date("Y");
		$rows		= $wpdb->get_results($wpdb->prepare("
															select sum(UNIQUE_COUNTER) as UNIQUE_COUNTER, sum(PAGEVIEW) as PAGEVIEW, LEFT(VISITDATE, 6) as VISITDATE 
															from ".$table_main." 
															where LEFT(VISITDATE, 4) = %d 
															group by LEFT(VISITDATE, 6) order by VISITDATE desc"
															, $s_year));

		if(is_array($rows)) foreach($rows as $key => $val){
			$month	= substr($val->VISITDATE, -2);
			$unique[$month]		= $val->UNIQUE_COUNTER;
			$unique_total	+= $val->UNIQUE_COUNTER;
			$normal[$month]		= $val->PAGEVIEW;
			$normal_total	+= $val->PAGEVIEW;
		}
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_yearly.php';
	 }

	function print_visitor_stats_referer(){
	 	global $wpdb;
		$table_log = $this->ctrl->model->get_table_name("log");
		
		$s_year		= $_POST["s_year"] ? $_POST["s_year"] : date("Y");
		$s_month	= $_POST["s_month"] ? $_POST["s_month"] : date("m");
		$s_day		= $_POST["s_day"] ? $_POST["s_day"] : date("d");
		
		$visittime = $s_year.$s_month.$s_day;
		
		$rows = $wpdb->get_results($wpdb->prepare("
												select 
													COUNT(REFERER) as REFERER_CNT,  REFERER from ".$table_log." 
												where 
													YEAR(FROM_UNIXTIME(VISITTIME)) =%s and MONTH(FROM_UNIXTIME(VISITTIME)) =%s and DAY(FROM_UNIXTIME(VISITTIME)) =%s 
												group by 
													REFERER 
												ORDER BY 
													REFERER_CNT DESC", $s_year, $s_month, $s_day));
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_referer.php';
	 }

	function print_visitor_stats_robot(){
	 	echo "printing.....";
	 	global $wpdb;
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_robot.php';
	 }

	function print_visitor_stats_referer_monthly(){
	 	echo "printing.....";
	 	global $wpdb;
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_header.php';
		@include_once PONDOLWIDGET_VISITOR_PATH . 'pages/visitor_stats_referer_monthly.php';
	 }
}