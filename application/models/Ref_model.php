<?php

class Ref_model extends CI_Model {

    //put your code here
    public function __construct() {
        $this->load->database();
    }
	
	//======= content header ==================================================
	public function getContentHeader($controller, $page, $action)
	{
		$sql = "SELECT * FROM content_header WHERE che_controller=? AND che_page=? AND che_action=?";
		$que = $this->db->query($sql , array($controller, $page, $action) );
    	return $que->result_array();
	}
	
	/* PELANGGAN */
	public function getAllPelanggan()
    {
    	$sql = "SELECT * FROM pelanggan ORDER BY pel_nama";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
    //======== STATUS ============================================================
    public function getAllStatus()
    {
    	$sql = "SELECT * FROM ref_status ORDER BY rst_nama";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
	public function getAllActiveStatus()
    {
    	$sql = "SELECT * FROM ref_status WHERE rst_display = 1 ORDER BY rst_nama";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
	
    public function getAllStatusById($id)
    {
    	$this->db->select("*");
    	$this->db->where("rst_id", $id);
    	
    	$this->db->from("ref_status");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    	
    }
    
    public function setNewStatus($data)
    {
    	$this->db->insert('ref_status', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function updateStatus($data , $id)
    {
    	$this->db->where('rst_id', $id);
    	$result = $this->db->update('ref_status', $data);
    	
    	return $result;
    }
    
    public function deleteStatus($id)
    {
    	$result = $this->db->delete('ref_status', array('rst_id' => $id));
    	return $result;
    }
    
	//=== KAEDAH BAYARAN ===========================================
	public function getAllKaedahBayaran()
    {
    	$sql = "SELECT * FROM ref_kaedah_bayaran ORDER BY rkb_nama";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
	
	//=== KAEDAH BEKALAN ===========================================
	public function getAllKaedahBekalan()
    {
    	$sql = "SELECT * FROM ref_kaedah_bekalan ORDER BY reb_nama";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
	
	//=== PEMBEKAL ===========================================
	public function getAllPembekal()
    {
    	$sql = "SELECT * FROM pembekal ORDER BY pem_nama_syarikat";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
   
  }

?>