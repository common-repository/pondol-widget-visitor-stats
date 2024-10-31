<?php 
require_once 'class.pondol.visitor.model.php';
require_once 'class.pondol.visitor.admin.php';
require_once 'class.pondol.visitor.view.php';
require_once 'func.visitor.php';

class PondolWidget_Visitor_Controller {
	public $model, $admin, $view, $func;

	function __construct() {
		$this->model	= new PondolWidget_Visitor_Model($this);	
		$this->admin	= new PondolWidget_Visitor_Admin($this);
		$this->view		= new PondolWidget_Visitor_View($this);
		$this->func		= new PondolWidget_Visitor_Func();
	}
	
	function init(){
		
	}
}