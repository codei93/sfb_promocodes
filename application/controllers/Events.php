<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

   //checking authorization on every request
   public function __construct(){
     parent::__construct();
	 		
 	 $check_auth_client = $this->Promo_code_model->check_auth_client();//check auth
	 if($check_auth_client != true){
		die($this->output->get_output());
	 }	
  }
  
  //creating  a promo code
  public function create(){
	$method = $_SERVER['REQUEST_METHOD']; //getting request method
	
	//checking request method
	if($method != 'POST'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	   
	   $params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   $data['locationID'] = $params['locationID'];
	   $data['name'] = htmlspecialchars(strip_tags(ucwords(strtolower($params['name']))));
	   //$data['happen_on'] =  date('Y-m-d H:i:s'); //date of the event
	   $data['happen_on'] = $params['happen_on'];
	   
	   //check if promo code already exists by name 
	   $response = $this->Events_model->check_event($data['name']);
	   
	   //checking if record exists		
	   if($response['status'] == 201){
		   $resp = $this->Events_model->create_event($data); //creating promo code on false response			
	   }else{
		   $resp = $response;
	   }//check query*
       
	   json_output($response['status'], $resp); //showing message
	   
	}
  }
  
  //return all events
  public function index(){
    $method = $_SERVER['REQUEST_METHOD']; //getting request method	  
	
	//checking request method
	if($method != 'GET'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	  
	  $reponse = array();
	  $events = $this->Events_model->get_events(); //get all promo codes

	  foreach($events as $event){ 
	  	  
		 $location = $this->Location_model->get_location_id($event->locationID);
		  
		 $reponse[] = array( 
		    'id' => $event->id,
		    'location' => $location->name,
		    'event_name' => $event->name,
		    'date' => $event->happen_on
		 );  	
	  }

	  json_output(201, $reponse); //showing message

	}
  }
}