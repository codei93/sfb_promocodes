<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journey extends CI_Controller {

   //checking authorization on every request
   public function __construct(){
     parent::__construct();
	 		
 	 $check_auth_client = $this->Promo_code_model->check_auth_client();//check auth
	 if($check_auth_client != true){
		die($this->output->get_output());
	 }	
  }
  
  //creating a journey
  public function create(){
	$method = $_SERVER['REQUEST_METHOD']; //getting request method
	
	//checking request method
	if($method != 'POST'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	   
	   $params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   $data['radiusID'] = $params['radiusID'];
	   $data['origin'] = $params['origin'];
	   $data['destination'] = $params['destination'];
	   $data['rate'] = $params['rate'];
			   
	   //check if promo code already exists by name 
	   $response = $this->Journey_model->check_journey($data['origin'], $data['destination'] );
	   
	   //checking if record exists		
	   if($response['status'] == 201){
		   $resp = $this->Journey_model->create_journey($data); //creating journey on false response			
	   }else{
		   $resp = $response;
	   }//check query*
       
	   json_output($response['status'], $resp); //showing message
	   
	}
  }
  
  //return all journeys
  public function index(){
    $method = $_SERVER['REQUEST_METHOD']; //getting request method	  
	
	//checking request method
	if($method != 'GET'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	

	  $reponse = array();
  	  $journeys = $this->Journey_model->get_journey(); //get all journey
	  
	  foreach($journeys as $journey){ 
	  	  
		  $radius = $this->Radius_model->get_radius_id($journey->radiusID);
		  $origin = $this->Location_model->get_location_id($journey->origin);
		  $destination = $this->Location_model->get_location_id($journey->destination);		  
		  
		  $reponse[] = array( 
		    'id' => $journey->id,
		    'radius_name' => $radius->name,
		    'origin' => $origin->name,
		    'destination' => $destination->name,
		    'rate' => $journey->rate
		 );  	
	  }

	  json_output(201, $reponse); //showing message

	}
  }
}