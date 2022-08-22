<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'User_controller';
$route['Home'] = 'User_controller/index';
$route['login_with_fb'] = 'User_controller/login_with_fb';
$route['oauth2callback'] = 'User_controller/oauth2callback';



//user routes 

//admin routes 
$route['dashboard'] = 'Admin_controller/dashboard';
$route['admin'] = 'Admin_controller/admin';
$route['actionLogin'] = 'Admin_controller/actionLogin';
$route['logout'] = 'Admin_controller/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Allcity'] = 'Admin_controller/Allcity';
$route['Allcountry'] = 'Admin_controller/Allcountry';
$route['Allstate'] = 'Admin_controller/Allstate';
$route['Addcity'] = 'Admin_controller/Addcity';
$route['Addcountry'] = 'Admin_controller/Addcountry';
$route['action_Editcity'] = 'Admin_controller/action_Editcity';
$route['action_addcity'] = 'Admin_controller/action_addcity';
$route['action_addcategory'] = 'Admin_controller/action_addcategory';
$route['citylist'] = 'Admin_controller/citylist';
$route['countrylist'] = 'Admin_controller/countrylist';
$route['statelist'] = 'Admin_controller/statelist';


$route['changecountrystatus'] = 'Admin_controller/changecountrystatus';
$route['deletestetuscountry'] = 'Admin_controller/deletestetuscountry';
$route['adminAlluserlist'] = 'Admin_controller/admin_All_userlist';
$route['userlist'] = 'Admin_controller/userlist';
$route['UserActiveinactive'] = 'Admin_controller/UserActiveinactive';
$route['deletestetususer'] = 'Admin_controller/deletestetususer';
$route['adminAdduser'] = 'Admin_controller/admin_adduser';
$route['ActionadminAdduser'] = 'Admin_controller/Action_adduser_byadmin';
$route['ActionadminEdituser'] = 'Admin_controller/Action_Edituser_byadmin';
$route['Actionadminupdateuser'] = 'Admin_controller/Action_updateuser_byadmin';
$route['actionupdatecity'] = 'Admin_controller/action_updatecity';
$route['adminChangePassword'] = 'Admin_controller/adminChangePassword';
$route['Action_adminChangePassword'] = 'Admin_controller/Action_adminChangePassword';
$route['showlistingForm'] = 'Admin_controller/showlisting_form';
$route['universityform'] = 'Admin_controller/universityform';
$route['fetchCity'] = 'Admin_controller/fetch_city';
$route['fetchsubcat'] = 'Admin_controller/fetch_subcat';


$route['Tourismlist'] = 'Admin_controller/Tourismlist';
$route['accomodationlist'] = 'Admin_controller/accomodationlist';
$route['UniversityViewlist'] = 'Admin_controller/University_viewlist';
$route['Universitylist'] = 'Admin_controller/Universitylist';
$route['UnActiveinactive'] = 'Admin_controller/UnActiveinactive';
$route['deletestatusUn'] = 'Admin_controller/deletestatusUn';

$route['actionEditaccomodationform'] = 'Admin_controller/action_Editaccomodationform';
$route['actionEdittourismform'] = 'Admin_controller/action_Edittourismform';
$route['actionEdituniversity'] = 'Admin_controller/action_Edituniversity';
$route['Edituniversityform'] = 'Admin_controller/Edituniversityform';
$route['upload_multiple'] = 'Admin_controller/upload';
$route['deletegallary'] = 'Admin_controller/deletegallary';
$route['imagepreview'] = 'Admin_controller/imagepreview';
$route['un_publicstatus'] = 'Admin_controller/un_publicstatus';
$route['AllUserInquiry'] = 'Admin_controller/UserInquiry_list';
$route['UserInquiryList'] = 'Admin_controller/userInquiry_listview';
$route['UserReviewList'] = 'Admin_controller/userReview_listview';
$route['AllUserReview'] = 'Admin_controller/userReview_list';
$route['ChangeReviewystatus'] = 'Admin_controller/ChangeReviewystatus';
$route['HomepageMange'] = 'Admin_controller/HomepageMange';
$route['Homepageform'] = 'Admin_controller/Homepageform';
$route['homeActiveinactive'] = 'Admin_controller/homeActiveinactive';
$route['Addcategory'] = 'Admin_controller/Addcategory';
$route['Allcategory'] = 'Admin_controller/Allcategory_list';
$route['AllcategoryView'] = 'Admin_controller/Allcategory_View';
$route['catActiveinactive'] = 'Admin_controller/catActiveinactive';
$route['deletestetuscategory'] = 'Admin_controller/deletestetuscategory';
$route['action_Editcategory'] = 'Admin_controller/action_Editcategory';
$route['Enquiry_detail'] = 'Admin_controller/Enquiry_detail';
$route['superadmin_profile'] = 'Admin_controller/superadmin_profile';
$route['Edit_admin_profile'] = 'Admin_controller/Edit_admin_profile';
$route['FormManageList'] = 'Admin_controller/FormManageList';
$route['EditMange_form'] = 'Admin_controller/EditMange_form';
$route['Action_addmanageform'] = 'Admin_controller/Action_addmanageform';
$route['Action_EditMange_form'] = 'Admin_controller/Action_EditMange_form';
$route['updatemanageform'] = 'Admin_controller/updatemanageform';
$route['deleteFormfield'] = 'Admin_controller/deleteFormfield';
$route['fetch_category_from'] = 'Admin_controller/fetch_category_from';

$route['languageView']     = 'Admin_controller/languageView';
$route['languageList']     = 'Admin_controller/languageList';
$route['action_Editlanguage']     = 'Admin_controller/action_Editlanguage';
$route['action_updatecategory']     = 'Admin_controller/action_updatecategory';


//End

//Sub admin route
$route['Add_sub_admin']            = 'Admin_controller/Add_subadmin_view';
$route['ActionaddSubadmin']        = 'Admin_controller/ActionaddSubadmin';
$route['Allsub_adminlist']         = 'Admin_controller/Allsub_adminlist';
$route['Subadminist']              = 'Admin_controller/Subadminist';
$route['adminActiveinactive']      = 'Admin_controller/adminActiveinactive';
$route['deletestetusadmin']        = 'Admin_controller/deletestetusadmin';
$route['ViewEditSubAdmin']         = 'Admin_controller/ViewEditSubAdmin';
$route['Action_Edit_Subadmin']     = 'Admin_controller/Action_Edit_Subadmin';
$route['Addstate']     = 'Admin_controller/Addstate';
$route['action_addstate']     = 'Admin_controller/action_addstate';
$route['Actionadmindeletereview']     = 'Admin_controller/Actionadmindeletereview';
$route['ActionadminEditreview']     = 'Admin_controller/ActionadminEditreview';
$route['actionEditrevew']     = 'Admin_controller/actionEditrevew';

$route['managecontactus']     = 'Admin_controller/managecontactus';
$route['manageaboutus']     = 'Admin_controller/manageaboutus';
$route['manageservice']     = 'Admin_controller/manageservice';



//End

//user route

$route['fetch_state'] = 'User_controller/fetch_state';
$route['fetch_city'] = 'User_controller/fetch_city';
$route['tourismsearch'] = 'User_controller/tourismsearch';
$route['accomodationsearch'] = 'User_controller/accomodationsearch';
$route['universitysearch'] = 'User_controller/universitysearch';
$route['addcomment'] = 'User_controller/action_add_comment';
$route['CountrywiseUniversityList/(:any)'] = 'User_controller/Countrywise_UniversityList';
$route['CountrywiseUniversityList/(:any)/(:any)'] = 'User_controller/Countrywise_UniversityList/';
$route['action_addinquirey'] = 'User_controller/action_addinquirey';
$route['UniversitysingleDetail'] = 'User_controller/UniversitysingleDetail';
$route['UniversityListingWab'] = 'User_controller/UniversityListing_wab';
$route['action_adduser'] = 'User_controller/action_adduser';
$route['actionuser_login'] = 'User_controller/actionuser_login';
$route['user_dashboard'] = 'User_controller/user_dashboard';
$route['user_logout'] = 'User_controller/user_logout';
$route['user_profile'] = 'User_controller/user_profile';
$route['user_edit_profile'] = 'User_controller/user_edit_profile';
$route['userChangePassword'] = 'User_controller/user_Change_Password';
$route['userUpdatePassword'] = 'User_controller/user_Update_Password';
$route['userforgotPassword'] = 'User_controller/user_forgot_Password';
$route['change_password/(:any)']     = 'User_controller/changePassword/$1';
$route['userforgotPasswordnew'] = 'User_controller/create_New_ForgotPassword';
$route['ViewAllCountryList'] = 'User_controller/ViewAllCountryList';
$route['ViewAllCountryList/(:any)'] = 'User_controller/ViewAllCountryList/';
$route['autocomplete_uni'] = 'User_controller/autocomplete_uni';
$route['autocomplete_agency'] = 'User_controller/autocomplete_agency';
$route['Apply_from'] = 'User_controller/Apply_from';


$route['ViewAlluniversityList'] = 'User_controller/ViewAlluniversityList';
$route['ViewAlluniversityList/(:any)'] = 'User_controller/ViewAlluniversityList/';
$route['ViewAllAccomodationList'] = 'User_controller/ViewAllAccomodationList';
$route['ViewAllAccomodationList/(:any)'] = 'User_controller/ViewAllAccomodationList/';
$route['ViewAllTourismList/(:any)'] = 'User_controller/ViewAllTourismList/';
$route['ViewAllTourismList'] = 'User_controller/ViewAllTourismList';
//ems
$route['privacy_policy'] = 'User_controller/privacy_policy';
$route['term_and_conditions'] = 'User_controller/term_and_conditions';

$route['about-us'] = 'User_controller/about';
$route['contact-us'] = 'User_controller/contact';

$route['services'] = 'User_controller/service';
$route['faq'] = 'User_controller/faq';
$route['visa-application'] = 'User_controller/visaApplication';
$route['changeLanguage'] = 'User_controller/changeLanguage';
