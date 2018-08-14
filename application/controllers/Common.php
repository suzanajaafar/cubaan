<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

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
		$this->load->helper('security_helper');
		$this->load->helper('file_helper');
		$this->load->library('session');
		$this->load->helper('input_helper');
	}
				
	public function viewFile($section,$id)
	{
		$id = decrypt($id);
		$file_name = "";//"arnab.png";
		$fullpath = "";
		$thisFileType = "";
		$main_path = $this->config->item('attachment_folder');
		
		if($section=="medal")
		{
			$this->load->model('ref_model');
		
		
			//get info
			$att = $this->ref_model->getAllMedalById($id);
			foreach($att as $key => $val)
			{
				$fullpath = $val["rem_picture"];
			}
			
			$file_name = substr($fullpath,strripos($fullpath,"/"));
		}
		
		$fullpath = $main_path."".$fullpath;
		
		$file_exist = file_exists($fullpath);
		//
		if($file_name!="" && $file_exist)
		{
			$directviewfile = array('jpg','jpeg','png','gif','bmp');
			$uploaded_file = file_get_contents($fullpath);
			
			if($thisFileType=="")
			{
				$thisFileType = "".pathinfo($fullpath,PATHINFO_EXTENSION);
			}
			
			if(strpos($thisFileType,"image")!==false || in_array($thisFileType,$directviewfile))
			{
				$imageData = base64_encode($uploaded_file);
				$src = 'data: '.$thisFileType.';base64,'.$imageData;
				echo '<img src="'.$src.'" />';
			}
			else // force download
			{
				header('Content-Type: application/$thisFileType');
				header("Content-Transfer-Encoding: Binary");
				header("Content-disposition: attachment; filename=\"" . $file_name . "\"");
				echo $uploaded_file;
			}
			
		}
	}

	public function getList($item, $param1="", $param2="")
	{
		if($item=="activecourse")
		{
			$this->load->model('ref_model');
			
			$list = $this->ref_model->getAllActiveCourseByFaculty($param1);
		}
		else if($item=="activedept")
		{
			$this->load->model('ref_model');
			
			$list = $this->ref_model->getAllActiveDepartmentByFacultyId($param1);
		}
		else if($item=="activesubjectdept")
		{
			$this->load->model('ref_model');
			
			$list = $this->ref_model->getAllActiveSubjectByDepartmentId($param1);
		}
		else if($item=="activelecturerdept")
		{
			$this->load->model('user_model');
			
			$list = $this->user_model->getAllActiveLecturerByDepartment($param1);
		}
		else if($item=="activelecturersubject")
		{
			$this->load->model('user_model');
			
			$list = $this->user_model->getAllActiveLecturerBySubject($param1);
		}
		
		echo json_encode($list);
	}
	
	public function refreshlist($item, $param1="", $param2="", $param3="")
	{
		
		//$param1 = decrypt($param1);
		$content_main 	= "";
		$data 			= array();
		$userid 		= $this->session->userdata("user_id");
		
		if($item=="pesananbarang")
		{
			$this->load->model('stock_model');
			$this->load->model('ref_model');
			
			$id =  decrypt($param1);
			
			$myproduk = $this->stock_model->getAllSelectedProdukByPesanan($id);
			$data["myproduk"] = $myproduk;
			
			$senaraikaedahbayar = $this->ref_model->getAllKaedahBayaran();//active
			$data["senaraikaedahbayar"] 			= $senaraikaedahbayar;
			
			$pesanan = $this->stock_model->getAllPesananById($id);
			$data["info"] = $pesanan[0];
			
			$data["list"]			= $myproduk;
			$content_main 			= 'common/list/index_pesanan_barang';//$content;
		}
		else if($item=="barangmasuk")
		{
			$this->load->model('stock_model');
			$this->load->model('ref_model');
			
			$id =  decrypt($param1);
			
			$myproduk = $this->stock_model->getAllSelectedProdukByStokMasuk($id);
			$data["myproduk"] 		= $myproduk;
			
			$stokmasuk = $this->stock_model->getStokMasukById($id);
			$data["info"] 			= $stokmasuk[0];
			
			$data["list"]			= $myproduk;
			$content_main 			= 'common/list/index_barang_masuk';//$content;
		}
		
		$this->load->view($content_main , $data);
		///$this->load->view('template/blank_layout',$data);
	}
	
}
