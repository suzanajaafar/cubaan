<?php

class Ref_model extends CI_Model {

    //put your code here
    public function __construct() {
        $this->load->database();
    }
    
    //======== state ============================================================
    public function getAllState()
    {
    	$sql = "SELECT * FROM ref_state ORDER BY rst_desc";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
    public function getAllStateById($id)
    {
    	$this->db->select("*");
    	$this->db->where("rst_id", $id);
    	
    	$this->db->from("ref_state");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    	
    }
    
    public function setNewState($data)
    {
    	$this->db->insert('ref_state', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function updateState($data , $id)
    {
    	$this->db->where('rst_id', $id);
    	$result = $this->db->update('ref_state', $data);
    	
    	return $result;
    }
    
    public function deleteState($id)
    {
    	$result = $this->db->delete('ref_state', array('rst_id' => $id));
    	return $result;
    }
    
    //======== marital status ============================================================
    public function getAllMaritalStatus()
    {
    	$sql = "SELECT * FROM ref_marital_status ORDER BY rms_desc";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
    //======== job area ===================================================================
    public function getAllJobArea()
    {
    	$sql = "SELECT * FROM ref_job_area";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
    //======== expert area ===================================================================
    public function getAllExpertArea()
    {
    	$sql = "SELECT * FROM ref_expert_area";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
    //===================================================================================
    
    
  }

?>