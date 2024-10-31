<?php
class PondolWidget_Visitor_Model {

	private $ctrl;
	
	function __construct($controller) {
		
		$this->ctrl = $controller;
	}
	
	function get_table_name($flag){
		global $wpdb;
		switch($flag){
			case "main"://daily sum table
				return $wpdb->prefix . "pondol_visitor_main";
				break;
			case "log"://log table
				return $wpdb->prefix . "pondol_visitor_log";
				break;
		}
		
	}
		
	function install_db () {
		global $wpdb;
		

		$charset = '';
	        if ( !empty($wpdb -> charset) )
	            $charset = "DEFAULT CHARACTER SET ".$wpdb->charset;
	        if ( !empty($wpdb -> collate) )
	            $charset .= " COLLATE ".$wpdb->collate;
	         
	   $table_name = $this->get_table_name("main");
	   $sql = "CREATE TABLE IF NOT EXISTS `".$table_name."` (
				  `VISITDATE` int(8) DEFAULT NULL,
				  `UNIQUE_COUNTER` int(10) DEFAULT NULL,
				  `PAGEVIEW` int(10) DEFAULT NULL,
				  PRIMARY KEY ( `VISITDATE`)
				)".$charset;
	   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	   dbDelta($sql);
	   
	   
	   $table_name = $this->get_table_name("log");
	   $sql = "CREATE TABLE IF NOT EXISTS `".$table_name."` (
				  `VISITTIME` int(11) DEFAULT NULL,
				  `REFERER` varchar(255) DEFAULT NULL,
				  `IP` varchar(15) DEFAULT NULL,
				  PRIMARY KEY ( `IP` , `VISITTIME` )
				)".$charset;
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    dbDelta($sql);
	}
	
	
	function insert_log(){
		global $wpdb;
		$table_main = $this->get_table_name("main");
		$table_log = $this->get_table_name("log");
		
		
		
		// get user Ip
		$user_ip	= $_SERVER["REMOTE_ADDR"];
		$referer	= $_SERVER["HTTP_REFERER"];
		if(!$referer) $referer="Typing or Bookmark Moving On This Site";
		
		$todaycount = $wpdb->get_var("SELECT COUNT(*) FROM ".$table_main." where VISITDATE = ".date("Ymd"));

		if(!$todaycount){
			$rtn = $wpdb->query( $wpdb->prepare(
					"
					INSERT INTO ".$table_main." (VISITDATE, UNIQUE_COUNTER, PAGEVIEW)
					VALUES (%d, %d, %d)
					",
					date("Ymd"), 0, 0
			) );
		}

		// check duplicate Ip  today
		$unique_ip = $wpdb->get_var($wpdb->prepare("
						SELECT 
							COUNT(*) 
						FROM 
							".$table_log." 
						where 
							YEAR(FROM_UNIXTIME(VISITTIME)) =%s and MONTH(FROM_UNIXTIME(VISITTIME)) =%s and DAY(FROM_UNIXTIME(VISITTIME)) =%s and IP=%s"
						, date("Y"), date("m"),date("d"), $user_ip
					));
		// visit first time today
		if(!$unique_ip){	// update total count of today 
			$rtn = $wpdb->query( $wpdb->prepare(
				"
				UPDATE ".$table_main."
				SET
					UNIQUE_COUNTER=UNIQUE_COUNTER+1, 
					PAGEVIEW=PAGEVIEW+1
				WHERE 
					VISITDATE=%d
				",
				date("Ymd")
			) );
		
		}else{// update page view
			$rtn = $wpdb->query( $wpdb->prepare(
				"
				UPDATE ".$table_main."
				SET PAGEVIEW=PAGEVIEW+1
				WHERE VISITDATE=%d
				",
				date("Ymd")
			) );
		}

		$rtn = $wpdb->query( $wpdb->prepare(
					"
					INSERT INTO ".$table_log." (VISITTIME, REFERER, IP)
					VALUES (%d, %s, %s)
					",
					time(), $referer, $user_ip
			) );

		// if pondol_widget_visitorstats_log_delete == "on" then delete log 3 month ago
		$options = $this->ctrl->func->get_pondole_options();
		
		if($options['pondol_widget_visitorstats_log_delete'] == "true"){
			$wpdb->query('DELETE FROM '.$table_log.' WHERE VISITTIME < '.(time()-60*60*24*30*3));
		}
			
	}

	public function save_option(){
		global $wpdb; 
		//echo "here i am";
		//print_r($_POST)
		if ($_POST['pondolwidget_visitor_stats_save_option']){
			$options['pondol_widget_visitorstats_skin']			= htmlspecialchars($_POST['pondol_widget_visitorstats_skin']);
			$options['pondol_widget_visitorstats_display']		= htmlspecialchars($_POST['pondol_widget_visitorstats_display']);
			$options['pondol_widget_visitorstats_log_delete']	= htmlspecialchars($_POST['pondol_widget_visitorstats_log_delete']);
			$options['pondol_widget_visitorstats_copyright']	= htmlspecialchars($_POST['pondol_widget_visitorstats_copyright']);
			
			update_option(PONDOLWIDGET_VISITOR_OPTION, $options);
			//print_r($options);
			//die(); // this is required to return a proper result
		}
		
		
	}
}
