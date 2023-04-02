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
$route['default_controller'] = 'hildes';
$controller_exceptions = array('user','seller','seo','cron','admin');



/* Common */
$route['index'] = 'Hildes/index';
$route['listing/(.*)'] = 'Hildes/listing/$1';
$route['deals'] = 'Hildes/deals';
$route['product/(.*)'] = 'Hildes/product/$1';
$route['add-to-cart'] = 'Hildes/add_to_cart';
$route['check-out'] = 'Hildes/check_out';
$route['get-coupon-discount'] = 'Hildes/get_coupon_discount';
$route['submit-order'] = 'Hildes/submit_order';
$route['delete-cart-product'] = 'Hildes/delete_cart_product';
$route['get-listting'] = 'Hildes/get_listting';
$route['brand/(.*)'] = 'Hildes/brand/$1';
$route['brand-categories/(.*)'] = 'Hildes/brand_categories/$1';

$route['get-state-html'] = 'Hildes/get_state_html';
$route['get-city-html'] = 'Hildes/get_city_html';

$route['get-brand-pros-bycat'] = 'Hildes/get_brand_pros_bycat';

/* Customer */
$route['forgot-password'] = 'Hildes/forgot_password';
$route['forgot-password-mobile-submit'] = 'Hildes/forgot_password_mobile_submit';
$route['forgot-password-code-submit'] = 'Hildes/forgot_password_code_submit';
$route['forgot-password-submit'] = 'Hildes/forgot_password_submit';
$route['signup'] = 'Hildes/signup';
$route['submit-signup'] = 'Hildes/submit_signup';
$route['login'] = 'Hildes/login';
$route['login2'] = 'Hildes/login2';
$route['submit-login'] = 'Hildes/submit_login';
$route['submit-login-1'] = 'Hildes/submit_login_1';
$route['submit-login-2'] = 'Hildes/submit_login_2';
$route['social-signup'] = 'Hildes/social_signup';
$route['logout'] = 'Hildes/logout';

$route['logout'] = 'Hildes/logout';

$route['submit-review'] = 'Hildes/submit_review';
$route['get-review-ajax'] = 'Hildes/get_review_ajax';
$route['add-wishlist'] = 'Hildes/add_wishlist';

$route['about-us'] = 'Hildes/about_us';
$route['privacy-policies'] = 'Hildes/privacy_policies';
$route['terms-of-use'] = 'Hildes/terms_of_use';
$route['return-policy'] = 'Hildes/return_policy';
$route['contact-us'] = 'Hildes/contact_us';
$route['terms'] = 'Hildes/terms';
$route['faqs'] = 'Hildes/faqs';

$route['get-search-ajax'] = 'Hildes/get_search_ajax';
$route['search'] = 'Hildes/search';

$route['get-single-card-ajax'] = 'Hildes/get_single_card_ajax';
$route['submit-card'] = 'Hildes/submit_card';

$route['blog'] = 'Hildes/blog';
$route['blog/(.*)'] = 'Hildes/blog/$1';

$route['change-cart-item-qty'] = 'Hildes/change_cart_item_qty';




/* SELLER */
$route['seller-forgot-password'] = 'Hildes/seller_forgot_password';
$route['seller-forgot-password-mobile-submit'] = 'Hildes/seller_forgot_password_mobile_submit';
$route['seller-forgot-password-code-submit'] = 'Hildes/seller_forgot_password_code_submit';
$route['seller-forgot-password-submit'] = 'Hildes/seller_forgot_password_submit';

$route['sellers'] = 'Hildes/sellers';
$route['seller-signup'] = 'Hildes/seller_signup';
$route['post-seller-signup-form-1'] = 'Hildes/post_seller_signup_form_1';
$route['seller-signup-step'] = 'Hildes/seller_signup_step';
$route['reset-seller-mobile-varification-code'] = 'Hildes/reset_seller_mobile_varification_code';
$route['varify-seller-mobile'] = 'Hildes/varify_seller_mobile';
$route['submit-seller-signup-form-3'] = 'Hildes/submit_seller_signup_form_3';
$route['submit-seller-signup-form-4'] = 'Hildes/submit_seller_signup_form_4';
$route['seller-login'] = 'Hildes/seller_login';
$route['submit-seller-login'] = 'Hildes/submit_seller_login';

$route['update-user-address'] = 'Hildes/update_user_address';

$route['send-sms-to-customers'] = 'Hildes/send_sms_to_customers';


/* CRONz */
$route['cron-send-email'] = 'Cron/cron_send_email';

/* SCRIPTs */
$route['image-rename'] = 'Hildes/image_rename';

/* TEST */
$route['test-send'] = 'Hildes/test_send';

$route['404_override'] = 'HilDes/page_not_found';
$route['translate_uri_dashes'] = TRUE;
