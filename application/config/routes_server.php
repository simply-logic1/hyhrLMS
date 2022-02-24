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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

	/* Home Front Page - Route List */

$route['add_user']='Home/add_user';
$route['home']="Home/index";
$route['login_process']='Home/login_process';
$route['login']='Home/login';
// $route['signup']='Home/signup';
$route['signup']='Home/signup';
$route['forgot']='Home/forgot';

$route['about']='Home/about';
$route['courses']='Home/courses';
$route['contact']='Home/contact';
$route['thankyou']='Home/thankyou';
$route['verfiy_email/(:any)/(:any)']='Home/verfiy_email';
$route['pricing']='Home/pricing';
$route['test_mail']='Home/test_mail';
/*client Dashboard */

$route['dashboard/(:any)']='client/Dashboard/index/$i';
$route['account/(:any)']='client/Dashboard/account';
$route['employee/(:any)']='client/Dashboard/employee';
$route['logs/(:any)']='client/Dashboard/user_logs';
$route['analytics/(:any)']='client/Dashboard/analytics';
$route['video_analytics/(:any)']='client/Dashboard/video_analytics';
$route['leaderboard/(:any)']='client/Dashboard/leaderboard';

$route['logout']='client/Dashboard/logout';
$route['chennals/(:any)']='client/Dashboard/chennals';
$route['team/(:any)']='client/Dashboard/add_team';
$route['details/(:any)']='client/courses_client/get_course_det';
$route['details/video/(:any)']='client/courses_client/view_course_video';
$route['employee/details/(:any)']='client/Dashboard/get_emp_detail';
$route['del_emp']='client/Dashboard/del_emps';
$route['del_test']='client/Test/del_test';
$route['assign_video']='client/courses_client/assign_video';
$route['employee/test_details/(:any)/(:any)']='client/analytics_emp/get_test_result';
$route['employee_result/(:any)']='client/Test/result_details';


$route['test/(:any)']='client/Test';
$route['add_test/(:any)']='client/Test/add_test';
$route['add_test_data']='client/Test/add_test_data';
$route['test/details/(:any)']='client/Test/view_test_data';
$route['test/edit_details/(:any)']='client/Test/edit_test_data';
$route['test/save_edit_details/(:any)']='client/Test/view_test_data';
$route['result/(:any)']='client/Test/result';



// $route['employee_analytics/time/(:any)']='client/analytics_emp/get_view_time';
// $route['employee_analytics/courses/(:any)']='client/analytics_emp/get_view_courses';


/* Employee Route list */
$route['library/(:any)']='employee/Employee';

/* Send Email Url */

$route['send_invite']='client/Send_notify/send_invite';


/*Employee */
$route['signup_emp']='employee/Employee/signup_process';

$route['register/(:any)/(:any)']='employee/Employee/register';
$route['register']='employee/Employee/register_site';
$route['library']='employee/Employee';
$route['library-list']='employee/Employee/course_library';
$route['store_emp_perform']='employee/Course_empctrl/store_emp_video_status';
$route['video_details/(:any)']='employee/Course_empctrl/view_video';

$route['library/take_test/(:any)']='employee/Testctrl/test';
$route['library/result/(:any)']='employee/Testctrl/show_result';

/* route -test page */

$route['library/quiz']='employee/Testctrl/test';
$route['library/start_test/(:any)']='employee/Testctrl/take_test';
$route['add_emp_tdata']='employee/Testctrl/add_emp_test_data';
$route['library/quiz_result/(:any)']='employee/Testctrl/view_result';



/* vlaidation email - already exit or not */

$route['check_email']='validation/Validate/check_email';
$route['check_forgot_email']='validation/Validate/check_user_email';
$route['check_exist_email']='validation/Validate/check_exist_email';
$route['check_exist_femail']='validation/Validate/forgot_password';

$route['del_test_data']='client/Test/del_test_data';
$route['change_password/(:any)/(:any)']='validation/Validate/check_change_details';
$route['change_data']='validation/Validate/save_new_password';




/* Admin -Side */
$route['admin/del_video/(:any)']='admin/Courses/del_video_course';
$route['admin/test/details/(:any)']='admin/Client/view_test_data';
$route['admin/add_test_data']='admin/Client/add_test_data';
$route['add_course_link']='admin/Courses/add_course_link';
$route['admin/add_partner']='admin/Client/add_partner';
$route['admin/add_partner_data']='admin/Client/add_partner_data';
$route['admin/users']='admin/Client/users';
$route['admin/add_user']='admin/Client/add_user';
$route['admin/add_user_data']='admin/Client/add_user_data';

$route['admin/del_client']='admin/Client/del_client';
$route['admin/quiz']='admin/Client/quiz';
$route['admin/add_quiz']='admin/Client/add_quiz';

$route['admin']='admin/Dashboard/index';
$route['admin/login']='admin/Dashboard/index';
$route['check_user']='admin/Dashboard/check_user';
$route['admin/dashboard']='admin/Dashboard/admin_dash';
$route['admin/analytics']='admin/Dashboard/analytics';
$route['admin/client']='admin/Dashboard/client';
$route['admin/profile/(:any)']='admin/client/get_data_id';
$route['admin/videos']='admin/Dashboard/courses';
$route['admin/content']='admin/Dashboard/content';
$route['admin/content/(:any)']='admin/Dashboard/content_data';
$route['admin/all_content']='admin/Dashboard/content_list';
$route['admin/category']='admin/Dashboard/category';
$route['admin/employee']='admin/Dashboard/employee';
$route['admin/upload']='admin/Dashboard/upload_video';
$route['admin/employee/(:any)']='admin/Client/emp_data';
$route['admin/del_client']='admin/Client/del_client';
$route['admin/del_content']='admin/Courses/del_content';
$route['admin/logout']='admin/Dashboard/logout';
$route['admin/add_category']='admin/Courses/add_category';
$route['admin/category/(:any)']='admin/Dashboard/view_category';	

/* Admin- courses */
$route['add_course']='admin/Courses/add_course';
$route['add_content']='admin/Courses/add_content';
$route['update_content']='admin/Courses/update_content';
$route['admin/media']='admin/Dashboard/media';
$route['admin/add_media']='admin/Courses/media_data';
$route['admin/edit_content/(:any)']='admin/Dashboard/edit_content';
$route['admin/upload_img']='admin/EditorVisual/saveImage';