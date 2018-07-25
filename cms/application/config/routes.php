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
$route['default_controller'] = 'cms_admin/user/AdminLogin';

$route['contact'] = 'welcome/ContactUsSendMail';
$route['contact2'] = 'welcome/ContactUs2SendMail';
$route['chek_email'] = 'welcome/chek_email';

$route['admin/login'] = 'cms_admin/user/AdminLogin';
$route['admin/users'] = 'cms_admin/user/UsersList';
$route['admin/users/add'] = 'cms_admin/user/UserCreate';
$route['admin/users/edit/(:any)'] = 'cms_admin/user/UserUpdate/$1';
$route['admin/users/inactivate'] = 'cms_admin/user/UserDeactivate';
$route['admin/users/activate'] = 'cms_admin/user/UserActivate';
$route['admin/users/delete'] = 'cms_admin/user/UserDelete';
$route['admin/users/changepassword'] = 'cms_admin/user/ChangePassword';
$route['admin/forgotPassword'] = 'cms_admin/user/ForgotPassword';
$route['admin/reset-password/(:any)/(:any)'] = 'cms_admin/user/ResetPassword/$1/$2';
$route['admin/users/logout'] = 'cms_admin/user/Logout';

$route['admin/cms'] = 'cms_admin/cms/CmsList';
$route['admin/cms/add'] = 'cms_admin/cms/CmsCreate';
$route['admin/cms/edit/(:any)'] = 'cms_admin/cms/CmsUpdate/$1';
$route['admin/cms/delete'] = 'cms_admin/cms/CmsDelete';

$route['admin/faq'] = 'cms_admin/faq/FaqList';
$route['admin/faq/add'] = 'cms_admin/faq/FaqCreate';
$route['admin/faq/edit/(:any)'] = 'cms_admin/faq/FaqUpdate/$1';
$route['admin/faq/delete'] = 'cms_admin/faq/FaqDelete';

$route['admin/gallery'] = 'cms_admin/gallery/GalleryList';
$route['admin/gallery/add'] = 'cms_admin/gallery/GalleryCreate';
$route['admin/gallery/edit/(:any)'] = 'cms_admin/gallery/GalleryUpdate/$1';
$route['admin/gallery/delete'] = 'cms_admin/gallery/GalleryDelete';

$route['admin/team'] = 'cms_admin/team/TeamList';
$route['admin/team/add'] = 'cms_admin/team/TeamCreate';
$route['admin/team/edit/(:any)'] = 'cms_admin/team/TeamUpdate/$1';
$route['admin/team/delete'] = 'cms_admin/team/TeamDelete';

$route['admin/blog'] = 'cms_admin/blog/BlogList';
$route['admin/blog/add'] = 'cms_admin/blog/BlogCreate';
$route['admin/blog/(:any)/edit'] = 'cms_admin/blog/BlogUpdate/$1';
$route['admin/blog/(:any)/view'] = 'cms_admin/blog/BlogDetails/$1';
$route['admin/blog/delete'] = 'cms_admin/blog/BlogDelete';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
