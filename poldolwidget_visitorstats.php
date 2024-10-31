<?php
/*
Plugin Name: Pondol Widget Visitor Stats
Plugin URI: http://www.shop-wiz.com/wp/plugins/visitorstats
Description: Counts the number of visitors of your blog and shows the traffic information on a widget
Author: Pondol
Version: 1.2.2
Author URI: http://www.shop-wiz.com/wp/plugins/visitorstats
License: GPL2

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
define('PONDOL_URL', 'http://www.shop-wiz.com');
define('PONDOL_EMAIL', 'wangta69@naver.com');
define('PONDOLWIDGET_VISITOR_VERSION', '1.2.1');
define('PONDOLWIDGET_VISITOR_URL', plugin_dir_url( __FILE__ ));
define('PONDOLWIDGET_VISITOR_PATH', plugin_dir_path( __FILE__ ));
define('PONDOLWIDGET_VISITOR_OPTION', 'pondol_widget_visitorstats');

require_once 'includes/class.pondol.visitor.controller.php';


class VisitorStats extends WP_Widget {

	function __construct() {
		parent::__construct( false, 'pondol Vistor Stats' );
		$this->init();
	}
	
	public function init() {
		$this->ctrl = new PondolWidget_Visitor_Controller($this);
		
		
		if ( is_admin() )
		{
			$this->ctrl->admin->admin_init();
			$this->ctrl->model->install_db();//create table
			add_action( 'wp_ajax_pondol_visitor_saveoption', array($this->ctrl->model, 'save_option'));
		}else{
			
		}
    }

	function widget( $args, $instance ) {//display to frontend
		$this->ctrl->model->insert_log();
		$this->ctrl->view->view_log();
	}

	function update( $new_instance, $old_instance ) {//save widget option
		
	}

	function form( $instance ) {//this will be shown where admin > widgeht > option
		$this->ctrl->admin->print_backendoption();
	}
}


function pondolplugin_register_widgets() {
	register_widget( 'VisitorStats' );
}

add_action( 'widgets_init', 'pondolplugin_register_widgets' );
	