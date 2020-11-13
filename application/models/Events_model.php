<?php
class Events_model extends CI_Model{
  
  //properties
  public $table = 'sf_events'; //table 
  
  //api authentication
  var $client_service = "frontend-client";
  var $auth_key       = "aggrey";

  //check authentication	
  public function check_auth_client(){
    $client_service = $this->input->get_request_header('Client-Service', TRUE);
    $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);
        
    if($client_service == $this->client_service && $auth_key == $this->auth_key){
        return true;
    } else {
        return json_output(400,array('status' => 400,'message' => 'Unauthorized User.'));
    }
  }

  //check if event already exists
  public function check_event($data){
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('name', $data); 
	$query = $this->db->get(); 
	
	//checking if the query returns any rows
	if($query->num_rows() > 0){
		return array('status' =>200, 'message'=>'Event already exists, choose another one');		 
	}else{  
    	return array('status' => 201,'message' => 'Event does not exist.');
    }//check query*/

  }

  
  //insert event
  public function create_event($data){
    $this->db->insert($this->table, $data); //inserting
	return array('status' => 201,'message' => 'Data has been created.');
  }
  
  //reterive all events 
  public function get_events(){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->order_by('id', 'DESC'); 
	$query = $this->db->get(); 
	return $query->result(); 
  }
  
  //reterive event by id 
  public function get_event_id($id){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('id', $id); 
	$query = $this->db->get(); 
	return $query->row(); 
  }

}