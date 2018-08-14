<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	}
				
	public function index()
	{
		$this->load->model('login_model');
		
		$username = $_POST["username"];
		$pwd = $_POST["pwd"];
		
		
		$auth = $this->login_model->auth($username , $pwd);
		
		
		if(sizeof($auth)>0)
		{ //echo "success".base_url();
			//success
			foreach($auth as $key => $val)
			{
				$session['full_name'] = $val["usr_full_name"];
				$session['user_id'] = $val["usr_username"];
				$session['email'] = $val["usr_email"];
				$session['user_level'] = $val["usr_user_level"];
				$session['user_icno'] = $val["usr_username"];
				$session['username'] = $val["usr_username"];
				
				$this->session->set_userdata($session);
			}
			
			exit(header('Location:'.base_url().'index.php/main', true, 301));
			//header('Location:'.base_url().'index.php/ahli/sh0wpr0f1le/me', true, 301);
			
		}
		else 
		{
			//login fail
			exit(header('Location:'.base_url().'?login=fail', true, 301));
			
		}
		
	}
}
