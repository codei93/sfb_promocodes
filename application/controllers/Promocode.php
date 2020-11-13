<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promocode extends CI_Controller {

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

	   $data['radiusID'] = $params['radiusID'];
	   $data['eventID'] = $params['eventID'];
	   $data['code'] = htmlspecialchars(strip_tags(ucwords(strtolower($params['code']))));
	   $data['status'] =  $params['status'];
	   $data['amount'] =  $params['amount'];
	   $data['create_at'] =  date('Y-m-d H:i:s'); //date and time of creation
	   $data['expire_at'] =  $params['expire_at'];
	   
	   //promo code will expire in 48 hours. keep changing the hours of expiration
	   //$data['expire_at'] =  date("Y-m-d H:i:s", strtotime('+48 hours')); 
	   
	   //check if promo code already exists by name 
	   $response = $this->Promo_code_model->check_promocode($data['code']);
	   
	   //checking if record exists		
	   if($response['status'] == 201){
		   $resp = $this->Promo_code_model->create_promocode($data); //creating promo code on false response			
	   }else{
		   $resp = $response;
	   }//check query*
       
	   json_output($response['status'], $resp); //showing message
	   
	}
  }
  
  //return all promo codes
  public function index(){
    $method = $_SERVER['REQUEST_METHOD']; //getting request method	  
	
	//checking request method
	if($method != 'GET'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	
  	  $reponse = array();
	  $codes = $this->Promo_code_model->get_promocodes(); //get all promo codes
	  
	  foreach($codes as $code){ 	  
		  $radius = $this->Radius_model->get_radius_id($code->radiusID);
		  $event = $this->Events_model->get_event_id($code->eventID);
		  
		  $reponse[] = array( 
		    'id' => $code->id,
		    'radius_name' => $radius->name,
		    'event_name' => $event->name,
		    'code' => $code->code,
			'percentage' => $code->amount,
		    'status' => $code->status,
		    'create_at' => $code->create_at,
		    'expire_at' => $code->expire_at
		 );  	
	  }
	  //echo json_encode($reponse);
	  json_output(201, $reponse); //showing message

	}
  }
  
  //returning single promocode by id
  public function single($id){
	$method = $_SERVER['REQUEST_METHOD'];
	
	//checking request method
	if($method != 'GET'){
	    json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {

 		$reponse = $this->Promo_code_model->get_promocode_id($id);
		json_output(201, $reponse);
	}
  }

  //returning single promocode by status (Activate or inactive)
  public function code_status($status){
	$method = $_SERVER['REQUEST_METHOD'];
	
	//checking request method
	if($method != 'GET'){
	    json_output(400,array('status' => 400,'message' => 'Bad request.'));
	} else {
		
		$reponse = array();
 		$codes = $this->Promo_code_model->get_promocodes_status($status);//return data
	    
		foreach($codes as $code){ 	  
		  $radius = $this->Radius_model->get_radius_id($code->radiusID);
		  $event = $this->Events_model->get_event_id($code->eventID);
		  
		  $reponse[] = array( 
		    'id' => $code->id,
		    'radius_name' => $radius->name,
		    'event_name' => $event->name,
		    'code' => $code->code,
			'percentage' => $code->amount,
		    'status' => $code->status,
		    'create_at' => $code->create_at,
		    'expire_at' => $code->expire_at
		  );  	
	    }
		json_output(201, $reponse);
	}
  }
  
  //updating promo code (can be used to activate or deactive a promo code)
  public function update($id){	  
	$method = $_SERVER['REQUEST_METHOD'];
	if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
		json_output(400,array('status' => 400,'message' => 'Bad request.'));
	}else {
		$params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   //$params = $_REQUEST;
	   $data['radiusID'] = $params['radiusID'];
	   $data['eventID'] = $params['eventID'];
	   $data['code'] = htmlspecialchars(strip_tags(ucwords(strtolower($params['code']))));
	   $data['status'] =  $params['status'];
	   $data['amount'] =  $params['amount'];
	   $data['create_at'] =  date('Y-m-d H:i:s'); //date and time of creation
	   
	   $reponse = $this->Promo_code_model->update_promocode($id, $data);			
       json_output(201,$reponse); //showing message
		
    }//checking method
  }

   public function update_status(){
   	 $method = $_SERVER['REQUEST_METHOD'];
	 if($method != 'POST'){
		 json_output(400,array('status' => 400,'message' => 'Bad request.'));
	 }else {
	   $params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   $id = $params['id'];
	   $data['status'] = $params['status'];
	   
	   $reponse = $this->Promo_code_model->update_promocode($id, $data);			
       json_output(201, $reponse); //showing message
		
    }//checking method

   }
  
  //testing a promo code
  public function run_code(){
	$method = $_SERVER['REQUEST_METHOD']; //getting request method
	
	//checking request method
	if($method != 'POST'){ 
	   json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	   $output = array('data' => array());//setting output to an array
	   $params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   $data['origin'] = $params['origin'];
	   $data['destination'] = $params['destination'];
	   $data['code'] = $params['code'];
	   //$data['origin'] = 1;
	   //$data['destination'] = 5;
	   //$data['code'] = 'Kasajja';
		   
	   //returning promo code details
	   $code = $this->Promo_code_model->get_promocode_code($data['code']);
	    	
	   //checking if promo code is active or inactive
	   if($code->status == 0){
		  $msg['status'] = 200;
		  $msg["message"] = "Promo code is inactive";
		  json_output($msg['status'], $msg);//show error messages

	   }else{
		  
		  //checking if promo code has expired or not 
	   	  if($code->expire_at < date('Y-m-d H:i:s')){
		  	  $msg['status'] = 200;
			  $msg['message'] = 'Promo code is expired';
			  json_output($msg['status'], $msg);//show error messages

		  }else{
			  
			 //returning journey details  
			 $response = $this->Journey_model->get_radius($data['origin'], $data['destination']); 
			 
			 //checking if journey exists or not
			 if($response == ''){
				$msg['status'] = 200;
				$msg['message'] = 'No such journey, try again!';
				json_output($msg['status'], $msg);//show error messages 
			 
			 }else{   
			    
				//returning radius details
				$resp = $this->Promo_code_model->get_promocode_radius($response->radiusID, $data['code']); //return radius by code
			  
			  	//checking if promo code is valid in the radius or not
			    if($resp == ''){
				   $msg['status'] = 200;
				   $msg['message'] = 'Promo code is not valid in that radius';
				   json_output($msg['status'], $msg);//show error messages
				 
			    }else{
					
				   //returning events details 
				   $res = $this->Events_model->get_event_id($resp->eventID);
				   //json_output(201, $res);
				   
				   //checking if origin or destination is same as the event location
				   if($res->locationID == $data['origin'] || $res->locationID == $data['destination']){
				   
					 $radius = $this->Radius_model->get_radius_id($code->radiusID);
					 $event= $this->Events_model->get_event_id($code->eventID);
					 $location = $this->Location_model->get_location_id($event->locationID);
					 
					 $percentageAmount = ($resp->amount * $response->rate)/ 100;//get the percentage of the price 
				   	 $total = $response->rate - $percentageAmount; //deduct the amount from the price 	
					 
					 $details['status'] = 201;
					 $details['total'] = $total;
					 $details['rate'] = $response->rate;
					 
					 $details['radius'] = $radius->name;
					 $details['event_name'] = $event->name;
					 $details['location'] = $location->name;
					 
					 $details['codeStatus'] = $code->status;
					 $details['amount'] = $code->amount;
					 $details['create_at'] = $code->create_at;
					 $details['expire_at'] = $code->expire_at;
					 
					 json_output($details['status'], $details);//show error messages
				   
				   }else{
					  $msg['status'] = 200;
					  $msg['message'] = 'Sorry! Promo code is only used for the event';
					  json_output($msg['status'], $msg);//show error messages
				   
				   } 		
				}
			 
			 }
		  
		  }
	   } 

	}
  }
  
}