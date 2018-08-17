<?php

class Leads_model extends CI_Model {

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
	
	
    
    //======== LEADS PROGRAM ============================================================
    public function getAllLeadsProgram()
    {
    	$sql = "SELECT * FROM leads_generation_program ORDER BY lgp_name";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
	public function getAllMyLeadsProgram($myusername)
    {
    	$sql = "SELECT * FROM leads_generation_program WHERE lgp_owner = ? ORDER BY lgp_name";
    	
    	$que = $this->db->query($sql, array($myusername));
    	return $que->result_array();
    	
    }
    
	
    public function getLeadsProgramById($id)
    {
    	$this->db->select("*");
    	$this->db->where("lgp_id", $id);
    	
    	$this->db->from("leads_generation_program");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    	
    }
    
    public function setNewLeadsProgram($data)
    {
    	$this->db->insert('leads_generation_program', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function updateLeadsProgram($data , $id)
    {
    	$this->db->where('lgp_id', $id);
    	$result = $this->db->update('leads_generation_program', $data);
    	
    	return $result;
    }
    
    public function deleteLeadsProgram($id)
    {
    	$result = $this->db->delete('leads_generation_program', array('lgp_id' => $id));
    	return $result;
    }
    

   
  }

?>