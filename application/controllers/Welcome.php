<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	}
	
	
	public function index()
	{
		/*$data["content_header"] = "<h1>
										Dashboard <small>Control panel</small>
										
									</h1>
									<ol class='breadcrumb'>
										<li><a href='#'><i class='fa fa-dashboard'></i> Home</a></li>
										<li class='active'>Dashboard</li>
									</ol>";
		$data["content_main"] = "/template/main.php";*/
		
		
		//$this->load->view('template/dcm_layout',$data);
		$data["title"] = "login";
		$this->load->view('template/login_layout',$data);
	}
	
	public function resetpwd()
	{
		$data["content_header"] = "";
		$data["content_main"] 	= 'main/reset_pwd';//$content;
		$data["title"] = "reset";
		$this->load->view('template/blank_layout',$data);
	}
}
