<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usr extends CI_Controller {

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
	
	public function u1001() //profile
	{
		$page = "user";
		$action = "profile";
		
		$data["type"] = $action;
		$data["content_header"] 		= $this->getContentHeader($page,$action);
		$data["content_main"] 			= 'user/profile';//$content;
		$data["panel_title"] 			= "User Profile";
		
		$this->load->view('template/main_layout',$data);
		
	}
	
	public function u1002() //Change Password
	{
		$page = "user";
		$action = "password";
		
		$data["type"] = $action;
		$data["content_header"] 		= $this->getContentHeader($page,$action);
		$data["content_main"] 			= 'user/password';//$content;
		$data["panel_title"] 			= "User Authentication";
		
		$this->load->view('template/main_layout',$data);
		
	}
	
	public function getContentHeader($page="",$action="")
	{
		$content_header = "";
		
		$title_1 = "Dashboard";
		$title_2 = "View";
		
		//LETTER IN OUT
		if($page=="user" && $action=="profile")
		{
			$title_1 = "User";
			$title_2 = "Profile";
		}
		else if($page=="user" && $action=="password")
		{
			$title_1 = "User";
			$title_2 = "User Authentication";
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
	
	
	//============ others
	public function show($item, $id)
	{
		if($item=="profileimg")
		{
			$this->viewProfileImage($id);
		}
		else if($item=="myprofileimg")
		{
			$this->viewProfileImage($id,"profilethumb");
		}
		else if($item=="profile")
		{
			
		}
	}
	
	public function viewProfileImage($id , $type='thumb')
	{
		$this->load->model('ahli_model');
		
		$file_name = "";
		$fullpath = "";
		$thisFileType = "";
		$width = "";
		$height = "";
		$prop = "";
		$filepath = "";
		$class = "";
		//$main_path = config('server.template.training.storagepath');
		//$main_path = "D:/APPLICATION/ATTACHMENT/DAS/";
		$main_path = $this->config->item('attachment_folder');;
		
		if($type=="thumb")
		{
			$width = "width='50'";
			$height = "height='50'";
			//$prop = "onclick = 'loadFullProfileImage(".$pro_id.")' style='cursor:pointer'";
			$class = "class='img-circle'";
		}
		else if($type=="profilethumb")
		{
			$width = "width='200'";
			$height = "height='200'";
			//$prop = "onclick = 'loadFullProfileImage(".$pro_id.")' style='cursor:pointer'";
			
		}
		
		//get image path
		$ahli = $this->ahli_model->searchById($id);
		
		foreach($ahli as $key => $val)
		{
			$filepath = $val["usr_profile_picture"];
		}
		
		//$fullpath = storage_path().$filepath;
		$fullpath = $main_path.$filepath;
		$file_name = substr($filepath,strripos($filepath,"/"));
		
		if($file_name!="")
		{
			$directviewfile = array('jpg','jpeg','png','gif','pdf');
			$uploaded_file = file_get_contents($fullpath);
			
			if($thisFileType=="")
			{
				$thisFileType = pathinfo($fullpath,PATHINFO_EXTENSION);
			}
			
			$imageData = base64_encode($uploaded_file);
			$src = 'data: '.$thisFileType.';base64,'.$imageData;
			echo '<img id="myimage" name="myimage" '.$class.' src="'.$src.'"  '.$width.' '.$height.' '.$prop.' />';
		
		}
		else
		{
			$file_apps_path = base_url()."assets/img/default.jpg";
			
			echo '<img id="myimage" name="myimage" '.$class.'  src="'.$file_apps_path.'" '.$width.' '.$height.' />';
		}
		
	}

	
	
}
