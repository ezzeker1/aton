<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = "site/home";
$route['404_override'] = '';


$route['admin/pages/aboutus'] = 'admin/pages/edit_about_page';
$route['admin/pages/(:any)'] = 'admin/pages/edit/$1';
$route['admin/(:any)'] = 'admin/$1';
$route['home'] = 'site/home';
$route['home/change_locale/(:any)'] = 'site/home/change_locale/$1';
$route['about-us'] = 'site/home/load_about/aboutus';
$route['contact-us'] = 'site/home/load_contact';
$route['gallery'] = 'site/gallery/index';
$route['categories/(:any)'] = 'site/product/load_cat/$1';

$route['product-list'] = 'site/product/product_list';
//$route['product-list/page/(:num)'] = 'site/product/product_list';
$route['product/(:any)'] = 'site/product/load/$1';
$route['applications/(:any)'] = 'site/home/load_application/$1';
$route['quote'] = 'site/quote';
/* End of file routes.php */
/* Location: ./application/config/routes.php */