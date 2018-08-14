<?php

class State_model extends CI_Model {

    //put your code here
    public function __construct() {
        $this->load->database();
    }
    
    //======== users ============================================================
    public function getAll()
    {
    	$sql = "SELECT * FROM ref_state ORDER BY rst_desc";
    	
    	$que = $this->db->query($sql);
    	return $que->result();
    	
    }
    
    //===================================================================================
  }

?>