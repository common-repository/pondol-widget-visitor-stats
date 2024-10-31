<?php
class PondolWidget_Visitor_View {

	private $ctrl;
	
	function __construct($controller) {
		
		$this->ctrl = $controller;
	}
	
	function view_log(){
		global $wpdb;
		$table_main = $this->ctrl->model->get_table_name("main");
		
		$options = $this->ctrl->func->get_pondole_options();
		$row = $wpdb->get_row($wpdb->prepare("SELECT * FROM ".$table_main." WHERE VISITDATE = %d", date("Ymd")));
		if($options["pondol_widget_visitorstats_display"] == "true"){
			@include_once PONDOLWIDGET_VISITOR_PATH . 'modules/'.$options["pondol_widget_visitorstats_skin"].'/pondol_visitor_stats.php';
		}
		
	}
	

}
