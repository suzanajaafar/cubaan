<?php

class Ahli_model extends CI_Model {

    //put your code here
    public function __construct() {
        $this->load->database();
    }
    
    //======== users ============================================================
    public function getAll()
    {
    	$sql = "SELECT * FROM users";
    	
    	$que = $this->db->query($sql);
    	return $que->result_array();
    	
    }
    
    public function searchList()
    {
    	$this->db->select("*");

    	$this->db->from("users");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function searchById($id)
    {
    	$this->db->select("*");
    	$this->db->where("usr_id", $id);
    	
    	$this->db->from("users");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function searchByIc($ic)
    {
    	$this->db->select("*");
    	$this->db->where("usr_icno", $ic);
    	
    	$this->db->from("users");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function setNew($data)
    {
    	$this->db->insert('users', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function updateData($data , $id)
    {
    	$this->db->where('usr_id', $id);
    	$result = $this->db->update('users', $data);
    	
    	return $result;
    }
    
    public function deleteData($id)
    {
    	$result = $this->db->delete('users', array('usr_id' => $id)); 
    	return $result;
    }
    
   
    //==== END users ====================================================================
    
    //==== work profile ===================================================================
    public function getWorkProfile($usrid)
    {
    	$this->db->select("*");
    	$this->db->where("uwp_usr_id", $usrid);
    	
    	$this->db->from("user_work_profile");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function setNewWork($data)
    {
    	$this->db->insert('user_work_profile', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function updateWorkData($data , $usr_id)
    {
    	$this->db->where('uwp_usr_id', $usr_id);
    	$result = $this->db->update('user_work_profile', $data);
    	
    	return $result;
    }
    
    //====  expert area profile ========================================================
    public function getExpertProfile($usrid)
    {
    	$this->db->select("a.* , b.rea_desc");
    	$this->db->where("uex_usr_id", $usrid);
    	
    	$this->db->from("user_expert_profile a");
    	$this->db->join("ref_expert_area b","b.rea_id = a.uex_area_id","LEFT JOIN");
    	
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function setNewExpert($data)
    {
    	$this->db->insert('user_expert_profile', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function deleteExpert($id)
    {
    	$result = $this->db->delete('user_expert_profile', array('uex_id' => $id));
    	return $result;
    }
    
    //===== lampiran ===================================================================
    public function setNewAttachment($data)
    {
    	$this->db->insert('user_attachment', $data);
    	return $last_id = $this->db->insert_id();
    }
    
    public function getAllAttachment($usrid)
    {
    	$this->db->select("*");
    	$this->db->where("uat_usr_id", $usrid);
    	
    	$this->db->from("user_attachment");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function getAttachmentById($id)
    {
    	$this->db->select("*");
    	$this->db->where("uat_id", $id);
    	
    	$this->db->from("user_attachment");
    	$query = $this->db->get();
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    public function deleteAttachment($id)
    {
    	$result = $this->db->delete('user_attachment', array('uat_id' => $id));
    	return $result;
    }
    
    //===================================================================================
    
    
    //others ====================================================================
    
    public function cariAhli($nama, $kepakaran, $bidang_kerja, $negeri, $negeri_majikan )
    {
    	$param = array();
    	
    	$que = " SELECT a.*, b.rst_desc FROM users a LEFT JOIN ref_state b ON b.rst_id=a.usr_state_id WHERE 1 ";
    	//$this->db->select("*");
    	//$this->db->where_like("usr_name", $nama);
    	
    	if($nama!= "")
    	{
    		$que .= " AND usr_name like '%?%' ";
    		array_push($param,$nama);
    	}
    	
    	if($kepakaran != "")
    	{
    		//$this->db->where("(SELECT count(*) FROM user_expert_profile WHERE uex_area_id=$kepakaran AND )");
    		$que .= " AND (SELECT count(*) FROM user_expert_profile WHERE uex_area_id=? AND uex_usr_id=a.usr_id) >0 ";
    		array_push($param,$kepakaran);
    	}
    	
    	if($bidang_kerja!= "")
    	{
    		//$this->db->where("(SELECT count(*) FROM user_expert_profile WHERE uex_area_id=$kepakaran AND )");
    		$que .= " AND (SELECT count(*) FROM user_work_profile WHERE uwp_jobarea_id=? AND uwp_usr_id=a.usr_id) >0 ";
    		array_push($param,$bidang_kerja);
    	}
    	
    	if($negeri!= "")
    	{
    		$que .= " AND usr_state_id = ? ";
    		array_push($param,$negeri);
    	}
    	
    	if($negeri_majikan!= "")
    	{
    		//$this->db->where("(SELECT count(*) FROM user_expert_profile WHERE uex_area_id=$kepakaran AND )");
    		$que .= " AND (SELECT count(*) FROM user_work_profile WHERE uwp_state_id=? AND uwp_usr_id=a.usr_id) >0 ";
    		array_push($param,$negeri_majikan);
    	}
    	
    	//$this->db->from("users");
    	//$query = $this->db->get();
    	$query = $this->db->query($que, $param);
    	
    	$myresult = $query->result_array();
    	
    	//echo $this->db->last_query();
    	return $myresult;
    }
    
    //==================================================================================
    
    
    
  }

?>