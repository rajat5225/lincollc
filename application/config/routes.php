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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'site';
$route['about-us'] = 'site/about_us';
$route['about'] = 'site/about_us';
$route['login'] = 'site/login';
$route['logout'] = 'site/logout';
//$route[''] = 'site/project_tracker';
$route['dropbox/get_files'] = 'dropbox/get_files';
$route['dropbox/create_folder'] = 'dropbox/create_folder';
$route['dropbox/upload_data'] = 'dropbox/upload_data';
$route['employee-portal/dropbox/(:any)'] = 'dropbox/index/$1';
$route['employee-portal/dropbox'] = 'dropbox/index';
$route['employee-portal/manage-employee/(:any)'] = 'site/edit_training/$1';
$route['employee-portal/manage-employee'] = 'site/edit_training';
$route['employee-portal/manage-course'] = 'site/manage_course';
$route['employee-portal/training-tracker'] = 'site/training_tracker';
$route['employee-portal/project-tracker'] = 'site/project_single';
$route['employee-portal/manage-project'] = 'site/project_tracker';
$route['employee-portal/manage-project/(:any)'] = 'site/project_tracker/$1';
$route['employee-portal'] = 'site/employee_portal';
$route['safety'] = 'site/safety';
$route['careers'] = 'site/careers';
$route['contact'] = 'site/contact';
$route['projects'] = 'site/projects';
$route['privacy-policy'] = 'site/privacy_policy';
$route['guiding-principles'] = 'site/guiding_principles';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
