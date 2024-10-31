<?php 
class PondolWidget_Visitor_Func {

	function read_dir($dirList){
		$open_dir = opendir($dirList);
		$tmpl = array();
		while($opendir = readdir($open_dir)) {
			if(($opendir != ".") && ($opendir != "..") ) {
				array_push($tmpl, array("dir"=>$dirList.$opendir, "name"=>$opendir));
			}
		}
		closedir($open_dir);
		return $tmpl;
	}


	function get_pondole_options() {
	
		$options = get_option("pondol_widget_visitorstats");
		
		 $default = array(
		 	"pondol_widget_visitorstats_display" => "true", 
			"pondol_widget_visitorstats_skin" => "default", 
			"pondol_widget_visitorstats_log_delete" => "true",
			"pondol_widget_visitorstats_copyright" => "true" 
		);

		return array_replace($default, $options);
	}
	
	

}