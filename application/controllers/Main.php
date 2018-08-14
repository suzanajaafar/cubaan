<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('input_helper');
	}
				
	public function index()
	{
		$page = "main";
		$action = "view";
		
		//$this->load->model('stock_model');
		$this->load->model('ref_model');
		
		$data["bil_myleads"] = 0;
		$data["bil_myopportunity"] = 0;
		$data["bil_mysales"] = 0;
		$data["mysales_amount"] = 0;
		$data["bil_customer"] = 0;
		$data["bil_task"] = 0;
		
		$data["content_header"] 		= $this->getContentHeader($page,$action);
		$data["content_main"] 			= 'main/show_main';//$content;
		$data["panel_title"] 			= "Dashboard";
		
		
		$this->load->view('template/main_layout',$data);
		
	}
	
	public function getContentHeader($page,$action)
	{
		$content_header = "";
		
		$title_1 = "Dashboard";
		$title_2 = "View";
		
		//LETTER IN OUT
		if($page=="main" && $action=="view")
		{
			$title_1 = "Dashboard";
			$title_2 = "View";
		}
		
		
		$content_header =		"<h1>
		SenangStok <small> $title_1 </small>
		
		</h1>
		<ol class='breadcrumb'>
		<li><a href='".base_url()."index.php/main'><i class='fa fa-home'></i> Home</a></li>
		<li class='active'>mySales</li>
		<li class='active'> $title_1 </li>
		<li class='active'> $title_2 </li>
		</ol>";
		
		
		return $content_header;
	}
}
