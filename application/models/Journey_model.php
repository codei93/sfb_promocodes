<?php
class Journey_model extends CI_Model{
  
  //properties
  public $table = 'sf_journeys'; //table 
  
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

  //check if Journey already exists
  public function check_journey($origin, $destination){
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('origin', $origin);
	$this->db->where('destination', $destination); 
	$query = $this->db->get(); 
	
	//checking if the query returns any rows
	if($query->num_rows() > 0){
		return array('status' =>200, 'message'=>'Journey already exists, choose another one');		 
	}else{  
    	return array('status' => 201,'message' => 'Journey does not exist.');
    }//check query*/

  }

  
  //insert Journey
  public function create_journey($data){
    $this->db->insert($this->table, $data); //inserting
	return array('status' => 201,'message' => 'Data has been created.');
  }
  
  //reterive all Journeys 
  public function get_journey(){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->order_by('id', 'DESC'); 
	$query = $this->db->get(); 
	return $query->result(); 
  }
  
  //getting radius by origin and destination
  public function get_radius($origin, $destination){
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('origin', $origin);
	$this->db->where('destination', $destination); 
	$query = $this->db->get(); 
	
	return $query->row(); 
  }


}