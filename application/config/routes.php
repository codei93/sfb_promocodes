<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
| Configuring the Api URL requests    
*/
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1'; //web pages
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//promo code URL configurations
$route['promocode/create'] = 'promocode/create'; //create request
$route['promocode/all'] = 'promocode/index'; //return all 
$route['promocode/(:any)'] = 'promocode/single/$1'; //return all 
$route['promocode/status/(:any)'] = 'promocode/code_status/$1'; //return promo code by status(Activate or inactive) 
$route['promocode/update/(:any)'] = 'promocode/update/$1'; //update promo code data
$route['promocode/change/status'] = 'promocode/update_status'; //update status
$route['promocode/run/code'] = 'promocode/run_code'; //testing vadility of promo code

//Events URL configurations
$route['event/create'] = 'events/create'; //create request
$route['event/all'] = 'events/index'; //return all 

//Location URL configurations
$route['location/create'] = 'location/create'; //create request
$route['location/all'] = 'location/index'; //return all 

//radius URL configurations
$route['radius/create'] = 'radius/create'; //create request
$route['radius/all'] = 'radius/index'; //return all 

//route URL configurations
$route['journey/create'] = 'journey/create'; //create request
$route['journey/all'] = 'journey/index'; //return all 

