<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Radius extends CI_Controller {

   //checking authorization on every request
   public function __construct(){
     parent::__construct();
	 		
 	 $check_auth_client = $this->Promo_code_model->check_auth_client();//check auth
	 if($check_auth_client != true){
		die($this->output->get_output());
	 }	
  }
  
  //creating a radius
  public function create(){
	$method = $_SERVER['REQUEST_METHOD']; //getting request method
	
	//checking request method
	if($method != 'POST'){
	  json_output(400,array('status' => 400,'message' => 'Bad request.'));
	
	} else {	
	   
	   $params = json_decode(file_get_contents('php://input'), TRUE);//getting raw data 

	   $data['name'] = htmlspecialchars(strip_tags(ucwords(strtolower($params['name']))));
			   
	   //check if promo code already exists by name 
	   $response = $this->Radius_model->check_radius($data['name']);
	   
	   //checking if record exists		
	   if($response['status'] == 201){
		   $resp = $this->Radius_model->create_radius($data); //creating radius on false response			
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
  	  $reponse = $this->Radius_model->get_radius(); //get all radius
	  json_output(201, $reponse); //showing message

	}
  }
}