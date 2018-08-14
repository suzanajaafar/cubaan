<?php

class Login_model extends CI_Model {

    //put your code here
    public function __construct() {
        $this->load->database();
    }
    
    //======== state ============================================================
    public function auth($username , $password)
    {
    	$sql = "SELECT * FROM users WHERE usr_icno = ? AND usr_password = MD5(?) AND usr_status = 2";
    	
    	$que = $this->db->query($sql, array($username , $password));
    	return $que->result_array();
    	
    }
    
    public function authReset($icno , $email)
    {
    	$this->db->select("*");
    	$this->db->where("usr_icno", $icno);
    	$this->db->where("usr_email", $email);
    	
    	$this->db->from("users");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function update($data , $id)
    {
    	$this->db->where('usr_id', $id);
    	$result = $this->db->update('users', $data);
    	
    	return $result;
    }
    
    public function updateByIc($data , $id)
    {
    	$this->db->where('usr_icno', $id);
    	$result = $this->db->update('users', $data);
    	
    	return $result;
    }
    
  }

?>