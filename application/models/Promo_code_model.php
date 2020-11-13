<?php
class Promo_code_model extends CI_Model{
  
  //properties
  public $table = 'sf_promocodes'; //table 
  
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

  //check if promo code already exists
  public function check_promocode($data){
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('code', $data); 
	$query = $this->db->get(); 
	
	//checking if the query returns any rows
	if($query->num_rows() > 0){
		return array('status' =>200, 'message'=>'Promo code already exists, choose another one');		 
	}else{  
    	return array('status' => 201,'message' => 'Promo code does not exist.');
    }//check query*/

  }

  
  //insert promo code
  public function create_promocode($data){
    $this->db->insert($this->table, $data); //inserting
	return array('status' => 201,'message' => 'Data has been created.');
  }
  
  //reterive all promo codes 
  public function get_promocodes(){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->order_by('id', 'DESC'); 
	$query = $this->db->get(); 
	return $query->result(); 
  }

  //reterive activate promo codes by id 
  public function get_promocode_id($id){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('id', $id);
	$query = $this->db->get(); 
	return $query->row(); 
  }
  
  //reterive activate promo codes by id 
  public function get_promocode_code($code){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('code', $code);
	$query = $this->db->get(); 
	return $query->row(); 
  }

  //reterive activate promo codes by status 
  public function get_promocodes_status($status){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('status', $status);
	$this->db->order_by('id', 'DESC'); 
	$query = $this->db->get(); 
	return $query->result(); 
  }
  
  //update promo code 
  public function update_promocode($id, $data){ 
	 $this->db->where('id', $id)->update($this->table, $data);
     return array('status' => 201, 'message' => 'Data has been updated');  
  }
	
  //reterive promo codes details by promo code and radius 
  public function get_promocode_radius($radiusID, $promocode){ 
    $this->db->select('*'); 
	$this->db->from($this->table);
	$this->db->where('radiusID', $radiusID);
	$this->db->where('code', $promocode);
	$query = $this->db->get(); 
	return $query->row(); 
  }

}