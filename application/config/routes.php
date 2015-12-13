<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'leafblast';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['users/(:any)/cars'] = 'cars';
$route['users/(:any)/cars/add'] = 'cars/add';
$route['users/(:any)/cars/edit'] = 'cars/edit';
$route['users/(:any)/cars/edit/(:any)'] = 'cars/edit/$2';
$route['users/(:any)/cars/delete'] = 'cars/delete';
$route['users/(:any)/cars/delete/(:any)'] = 'cars/delete/$2';
//MONTHS
$route['appointments/year/(:any)/month/january'] 	= 'appointments/months/$1/01';
$route['appointments/year/(:any)/month/february'] 	= 'appointments/months/$1/02';
$route['appointments/year/(:any)/month/march'] 		= 'appointments/months/$1/03';
$route['appointments/year/(:any)/month/april'] 		= 'appointments/months/$1/04';
$route['appointments/year/(:any)/month/may'] 		= 'appointments/months/$1/05';
$route['appointments/year/(:any)/month/june'] 		= 'appointments/months/$1/06';
$route['appointments/year/(:any)/month/july'] 		= 'appointments/months/$1/07';
$route['appointments/year/(:any)/month/august'] 	= 'appointments/months/$1/08';
$route['appointments/year/(:any)/month/september'] 	= 'appointments/months/$1/09';
$route['appointments/year/(:any)/month/october'] 	= 'appointments/months/$1/10';
$route['appointments/year/(:any)/month/november'] 	= 'appointments/months/$1/11';
$route['appointments/year/(:any)/month/december'] 	= 'appointments/months/$1/12';
//DAYS
$route['appointments/year/(:any)/month/january/day/(:any)'] 	= 'appointments/day/$1/01/$2';
$route['appointments/year/(:any)/month/february/day/(:any)'] 	= 'appointments/day/$1/02/$2';
$route['appointments/year/(:any)/month/march/day/(:any)'] 		= 'appointments/day/$1/03/$2';
$route['appointments/year/(:any)/month/april/day/(:any)'] 		= 'appointments/day/$1/04/$2';
$route['appointments/year/(:any)/month/may/day/(:any)'] 		= 'appointments/day/$1/05/$2';
$route['appointments/year/(:any)/month/june/day/(:any)'] 		= 'appointments/day/$1/06/$2';
$route['appointments/year/(:any)/month/july/day/(:any)'] 		= 'appointments/day/$1/07/$2';
$route['appointments/year/(:any)/month/august/day/(:any)'] 		= 'appointments/day/$1/08/$2';
$route['appointments/year/(:any)/month/september/day/(:any)'] 	= 'appointments/day/$1/09/$2';
$route['appointments/year/(:any)/month/october/day/(:any)'] 	= 'appointments/day/$1/10/$2';
$route['appointments/year/(:any)/month/november/day/(:any)'] 	= 'appointments/day/$1/11/$2';
$route['appointments/year/(:any)/month/december/day/(:any)'] 	= 'appointments/day/$1/12/$2';
