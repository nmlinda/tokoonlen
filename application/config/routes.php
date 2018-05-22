<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'homepage';

// admin - user
$route['user/(:any)'] = 'user/view/$1';
$route['user/create'] = 'user/create';
$route['user/update/(:any)'] = 'user/update/$1';
$route['user/delete/(:any)'] = 'user/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'register';