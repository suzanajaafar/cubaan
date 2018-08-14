<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model {

    //put your code here
    public function __construct() {
        $this->load->database();
    }
    
    //======== state ============================================================
    public function auth($username , $password)
    {
    	$sql = "SELECT * FROM users WHERE usr_username = ? AND usr_password = MD5(?) AND usr_status_id = 1";
    	
    	$que = $this->db->query($sql, array($username , $password));
    	return $que->result_array();
    	
    }
    
    public function authReset($icno , $email)
    {
    	$this->db->select("*");
    	$this->db->where("usr_username", $icno);
    	$this->db->where("usr_email", $email);
    	
    	$this->db->from("users");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function update($data , $id)
    {
    	$this->db->where('usr_username', $id);
    	$result = $this->db->update('users', $data);
    	
    	return $result;
    }

    
  }

?>