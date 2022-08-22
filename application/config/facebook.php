<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Facebook App details
| -------------------------------------------------------------------
|
| To get an facebook app details you have to be a registered developer
| at http://developer.facebook.com and create an app for your project.
|
|  facebook_app_id               string   Your facebook app ID.
|  facebook_app_secret           string   Your facebook app secret.
|  facebook_login_type           string   Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string   URL tor redirect back to after login. Do not include domain.
|  facebook_logout_redirect_url  string   URL tor redirect back to after login. Do not include domain.
|  facebook_permissions          array    The permissions you need.
|  facebook_graph_version        string   Set Facebook Graph version to be used. Eg v2.6
|  facebook_auth_on_load         boolean  Set to TRUE to have the library to check for valid access token on every page load.
*/
// 'app_id' => '350859666646570',
// 'app_secret' => 'e2e19027967323d86d71a61e3a7e92f7',
// 'default_graph_version' => 'v2.5',

$config['facebook_app_id']              = '350859666646570';
$config['facebook_app_secret']          = 'e2e19027967323d86d71a61e3a7e92f7';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'login_with_fb';
$config['facebook_logout_redirect_url'] = '';
$config['facebook_permissions']         = array('public_profile', 'publish_actions', 'email');
$config['facebook_graph_version']       = 'v2.5';
$config['facebook_auth_on_load']        = TRUE;
