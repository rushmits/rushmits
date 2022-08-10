<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['facebook_app_id']              = '1716074408701370';
$config['facebook_app_secret']          = '3266a767aad85dab0801ad9bf913e110';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'user_authentication';
$config['facebook_logout_redirect_url'] = 'user_authentication/logout';
$config['facebook_permissions']         = array('email');
$config['facebook_graph_version']       = 'v2.6';
$config['facebook_auth_on_load']        = TRUE;
