<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller{
  		
  public function view($page = 'home'){
  	 if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
		show_404();
	 }
	 
	 $data['title'] = $page;
				
	 if($data['title'] == 'home'){
		 $data['name'] = 'Welcome'; 	
	 }elseif($data['title'] == 'locations'){
		 $data['name'] = 'Locations'; 	
	 }elseif($data['title'] == 'radius'){
		 $data['name'] = 'Radius'; 	
	 }elseif($data['title'] == 'journey'){
		 $data['name'] = 'Journey'; 	
	 }elseif($data['title'] == 'events'){
		 $data['name'] = 'Events'; 	
	 }elseif($data['title'] == 'codes'){
		 $data['name'] = 'Promo Codes'; 	
	 }
	 
	 $data['radius'] = $this->Radius_model->get_radius(); //get all radius
	 $data['events'] = $this->Events_model->get_events(); //get all events
	 $data['locations'] = $this->Location_model->get_locations(); //get all locations
	 $data['promocodes'] = $this->Promo_code_model->get_promocodes(); //get all promo codes
				
	 $this->load->view('templates/header', $data);
	 $this->load->view('templates/sidenav', $data);
	 $this->load->view('pages/'.$page, $data);
	 $this->load->view('templates/footer', $data);
  }

}