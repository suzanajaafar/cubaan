<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {

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
		$this->load->helper('input_helper');
		$this->load->helper('date_helper');
		$this->load->helper('security_helper');
		$this->load->helper('file_helper');
		$this->load->library('session');
	}
				
	public function index()
	{
		$page = "";
		$action = "";
		
		$data["content_header"] 		= $this->getContentHeader($page,$action);
		$data["content_main"] 			= 'main/show_main';//$content;
		
		
		$this->load->view('template/main_layout',$data);
		
	}
	
	//============================================================
	
	//========= OTHERS ==============================================
	public function getContentHeader($page="",$action="")
	{
		$this->load->model('ref_model');
		$content_header = "";
		
		$title_1 = "Dashboard";
		$title_2 = "View";
		
		$header = $this->ref_model->getContentHeader("adm", $page, $action);
		foreach($header as $key => $val)
		{
			$title_1 = $val["che_title1"];
			$title_2 = $val["che_title2"];
		}
		
		$content_header =		"<h1>
		SenangStok <small> $title_1 </small>
		
		</h1>
		<ol class='breadcrumb'>
		<li><a href='".base_url()."index.php/main'><i class='fa fa-home'></i> Home</a></li>
		<li class='active'>SenangStok</li>
		<li class='active'> $title_1 </li>
		<li class='active'> $title_2 </li>
		</ol>";
		
		
		return $content_header;
		
	}
	
	//=================================================================
	
	
	
}
