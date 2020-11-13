<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

   //checking authorization on every request
   public function __construct(){
     parent::__construct();
	 		
 	 $check_auth_client = $this->Promo_code_model->check_auth_client();//check auth
	 if($check_auth_client != true){
		die($this->output->get_output());
	 }	
  }
  
  //creating a location
  public function create(){
	$method = $_SERVER['REQUEST_METHOD']; //getting request method
	
	//checking request method
	if($method != 'POST'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	   
	   $params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   $data['name'] = htmlspecialchars(strip_tags(ucwords(strtolower($params['name']))));
			   
	   //check if location already exists by name 
	   $response = $this->Location_model->check_location($data['name']);
	   
	   //checking if record exists		
	   if($response['status'] == 201){
		   $resp = $this->Location_model->create_location($data); //creating location on false response			
	   }else{
		   $resp = $response;
	   }//check query*
       
	   json_output($response['status'], $resp); //showing message
	   
	}
  }
  
  //return all locations
  public function index(){
    $method = $_SERVER['REQUEST_METHOD']; //getting request method	  
	
	//checking request method
	if($method != 'GET'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
  	  $reponse = $this->Location_model->get_locations(); //get all locations
	  json_output(201, $reponse); //showing message

	}
  }
}