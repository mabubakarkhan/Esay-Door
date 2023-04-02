<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hildes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	**/

	public function __construct()
	{
	        parent::__construct();
	        error_reporting(0);
	        $this->load->database();
	        $this->load->model('Model_functions','model');
	        $this->load->helper(array('form', 'url'));
	        $this->load->library('session');
	}

	/**
	*

		@HATH NA LAIE

	*
	*/
	public function template($page = '', $data = '')
	{
		$data['user_panel'] = false;
		$data['settings'] = $this->model->get_settings();
		//$data['cats'] 1 $this->model->get_cats();
		$data['parents'] = $this->model->get_parents();
		$data['main_menu'] = $this->model->get_main_menu();
		$data['ads'] = $this->model->get_ads();
		$this->load->view('header',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
	public function page_not_found()
	{
		$data['meta_title'] = 'Easy Door -> Requested Page Not Found -> 404 Error';
		$data['meta_key'] = 'Easy Door -> Requested Page Not Found -> 404 Error';
		$data['meta_desc'] = 'Easy Door -> Requested Page Not Found -> 404 Error';
		$this->template('page_not_found',$data);
	}
	/**
	*

		@CUSTOMER

	*
	*/
	public function forgot_password()
	{
		$data['meta_title'] = 'Forgot Password | Easy Door';
		$this->template('forgot_password',$data);	
	}
	public function forgot_password_mobile_submit()
	{
		if (strlen($_POST['mobile'] > 8)) {
			$mobile = $_POST['mobile'];
			$check = $this->model->get_row("SELECT `customer_id`,`email` FROM `customer` WHERE `phone` = '$mobile';");
			if ($check) {
				$code = substr('13238341434535461657175867685960850676078212703214348496716',rand(0,26),4);

				$mobile = str_replace('+', '', $mobile);
				$mobile = preg_replace('/-/', '', $mobile, 1);
				$mobile = preg_replace('/=/', '', $mobile, 1);
				$mobile = preg_replace('/00/', '', $mobile, 2);
				$mobile = preg_replace('/0/', '92', $mobile, 1);
				$sms_setting = $this->model->sms_setting();
				$ch = curl_init();
				$mask = urlencode($sms_setting['mask']);
				$pass = urlencode($sms_setting['password']);
				$id = urlencode($sms_setting['username']);
				$msg = urlencode($code);
				/*curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec($ch);
				curl_close ($ch);*/
				file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

				if (strlen($check['email']) > 3) {
					$to = $check['email'];
					$subject = 'Code forgot password | easydoor.pk';
					$message = $code;
					$from = EMAIL_FROM;
					$headers = ''; 
				    $headers .= "From: ".$from."" ."\r\n" .
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "X-Priority: 3\r\n";
					$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
					mail($to, $subject, $message, $headers);
				}

				$this->db->where('customer_id',$check['customer_id']);
				$this->db->update('customer',array("forgot_password_code"=>$code));
				echo json_encode(array("status"=>true));

			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"mobile number is not registered."));
			}
		}
	}
	public function forgot_password_code_submit()
	{
		if (strlen($_POST['mobile'] > 8) && strlen($_POST['code']) == 4) {
			$mobile = $_POST['mobile'];
			$code = $_POST['code'];
			$check = $this->model->get_row("SELECT `customer_id` FROM `customer` WHERE `phone` = '$mobile' AND `forgot_password_code` = '$code';");
			if ($check) {
				echo json_encode(array("status"=>true));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"code is not valid."));
			}
		}
	}
	public function forgot_password_submit()
	{
		if (strlen($_POST['mobile'] > 8) && strlen($_POST['code']) == 4 && strlen($_POST['password']) > 3) {
			$mobile = $_POST['mobile'];
			$code = $_POST['code'];
			$password = $_POST['password'];
			$check = $this->model->get_row("SELECT `customer_id` FROM `customer` WHERE `phone` = '$mobile' AND `forgot_password_code` = '$code';");
			if ($check) {
				$this->db->where('customer_id',$check['customer_id']);
				$resp = $this->db->update('customer',array("forgot_password_code"=>'',"password"=>md5($password)));
				if ($resp) {
					echo json_encode(array("status"=>true));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"not updated, please try again or reload your webpage."));
				}
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"mobile/code not valid"));
			}
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"password lenght is not valid, please enter minimum 4 characters"));
		}
	}
	public function signup()
	{
		$data['meta_title'] = 'Easy Door | Signup';
		$this->template('signup',$data);
	}
	public function social_signup()
	{
		if ($_POST) {
			$name = explode(' ', $_POST['res']['name']);
			$post['lname'] = $name[count($name)-1];
			unset($name[count($name)-1]);
			$post['fname'] = implode(' ', $name);
			$post['fb_id'] = $_POST['res']['id'];
			$post['email'] = $_POST['res']['email'];
			$post['signup_type'] = 'facebook';
			$post['status'] = 'active';
			//check already
			$check = $this->model->get_row("SELECT * FROM `customer` WHERE `fb_id` = '".$post['fb_id']."';");
			if ($check) {
				$_SESSION['user'] = $check;
				if ($_SESSION['url']) {
					$redirect = BASEURL.$_SESSION['url'];
				}
				else{
					$redirect = BASEURL.'index/';
				}
				echo json_encode(array("status"=>true,"url"=>$redirect));
			}
			else{
				//create new
				$resp = $this->db->insert('customer',$post);
				$UserID = $this->db->insert_id();
				if ($resp) {
					$resp = $this->model->login_social($post['fb_id']);
					$_SESSION['user'] = $resp;
					if ($_SESSION['url']) {
						$redirect = BASEURL.$_SESSION['url'];
					}
					else{
						$redirect = BASEURL.'index/';
					}
					echo json_encode(array("status"=>true,"url"=>$redirect));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"not submitted, please try again."));
				}
			}

		}
	}
	public function submit_signup()
	{
		if ($_POST) {
			$post['phone'] = $_POST['username'];
			$post['password'] = md5($_POST['password']);
			$post['status'] = 'active';
			$resp = $this->db->insert('customer',$post);
			$UserID = $this->db->insert_id();
			if ($resp) {

				$mobile = str_replace('+', '', $post['phone']);
				$mobile = preg_replace('/-/', '', $mobile, 1);
				$mobile = preg_replace('/=/', '', $mobile, 1);
				$mobile = preg_replace('/00/', '', $mobile, 2);
				$mobile = preg_replace('/0/', '92', $mobile, 1);
				$sms_setting = $this->model->sms_setting();
				$ch = curl_init();
				$mask = urlencode($sms_setting['mask']);
				$pass = urlencode($sms_setting['password']);
				$id = urlencode($sms_setting['username']);
				$msg = urlencode($sms_setting['signup_msg']);
				/*curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$server_output = curl_exec($ch);
				curl_close ($ch);*/
				file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

				$resp = $this->model->login($_POST['username'],$_POST['password']);
				$_SESSION['user'] = $resp;
				if ($_SESSION['url']) {
					$redirect = BASEURL.$_SESSION['url'];
				}
				else{
					$redirect = BASEURL.'index/';
				}
				echo json_encode(array("status"=>true,"url"=>$redirect));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted, please try again."));
			}
		}
	}
	public function login()
	{
		if ($_SESSION['user']) {
			if ($_SESSION['url']) {
				redirect($_SESSION['url']);
			}
			else{
				redirect('index');
			}
		}
		$data['meta_title'] = 'Easy Door | Login';
		$this->template('login',$data);
	}
	public function submit_login()
	{
		if ($_POST) {
			$resp = $this->model->login($_POST['username'],$_POST['password']);
			if ($resp) {
				$_SESSION['user'] = $resp;
				if ($_SESSION['url']) {
					$redirect = BASEURL.$_SESSION['url'];
				}
				else{
					$redirect = BASEURL.'index/';
				}
				$_SESSION['user'] = $resp;
				echo json_encode(array("status"=>true,"url"=>$redirect));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"password not valid."));
			}
		}
	}
	public function submit_login_1()
	{
		if ($_POST) {
			$phone = trim($_POST['username']);
			/*$mobile = str_replace('+', '', $phone);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);*/
			$resp = $this->model->login2($phone);
			
			if ($_SESSION['user']) {
				if ($_SESSION['url']) {
					redirect($_SESSION['url']);
				}
				else{
					redirect('index');
				}
			}
			if ($resp) {
				$data['type'] = 'login';
			}
			else{
				$data['type'] = 'signin';
			}
			$data['phone'] = $phone;
			$data['meta_title'] = 'Easy Door | Login Step Two';
			$this->template('login2',$data);

		}
	}
	public function logout()
	{
		unset($_SESSION['user']);
		unset($_SESSION['seller']);
		$_SESSION['url'] = 'index';
		redirect('index');
	}
	/**
	*

		@SELLER

	*
	*/
	public function seller_forgot_password()
	{
		$data['meta_title'] = 'Forgot Password | Easy Door';
		$this->template('seller_forgot_password',$data);	
	}
	public function seller_forgot_password_mobile_submit()
	{
		if (strlen($_POST['mobile'] > 8) && strlen($_POST['email'] > 8)) {
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$check = $this->model->get_row("SELECT `seller_id`,`email` FROM `seller` WHERE `mobile` = '$mobile' AND `email` = '$email';");
			if ($check) {
				$code = substr('13238341434535461657175867685960850676078212703214348496716',rand(0,26),4);

				$mobile = str_replace('+', '', $mobile);
				$mobile = preg_replace('/-/', '', $mobile, 1);
				$mobile = preg_replace('/=/', '', $mobile, 1);
				$mobile = preg_replace('/00/', '', $mobile, 2);
				$mobile = preg_replace('/0/', '92', $mobile, 1);
				$sms_setting = $this->model->sms_setting();
				$ch = curl_init();
				$mask = urlencode($sms_setting['mask']);
				$pass = urlencode($sms_setting['password']);
				$id = urlencode($sms_setting['username']);
				$msg = urlencode($code);
				
				file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

				if (strlen($check['email']) > 3) {
					$to = $check['email'];
					$subject = 'Code forgot password | easydoor.pk';
					$message = $code;
					$from = EMAIL_FROM;
					$headers = ''; 
				    $headers .= "From: ".$from."" ."\r\n" .
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "X-Priority: 3\r\n";
					$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
					mail($to, $subject, $message, $headers);
				}

				$this->db->where('seller_id',$check['seller_id']);
				$this->db->update('seller',array("forgot_password_code"=>$code));
				echo json_encode(array("status"=>true));

			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"mobile number is not registered."));
			}
		}
	}
	public function seller_forgot_password_code_submit()
	{
		if (strlen($_POST['mobile'] > 8) && strlen($_POST['email'] > 4) && strlen($_POST['code']) == 4) {
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$code = $_POST['code'];
			$check = $this->model->get_row("SELECT `seller_id` FROM `seller` WHERE `mobile` = '$mobile' AND `email` = '$email' AND `forgot_password_code` = '$code';");
			if ($check) {
				echo json_encode(array("status"=>true));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"code is not valid."));
			}
		}
	}
	public function seller_forgot_password_submit()
	{
		if (strlen($_POST['mobile'] > 8) && strlen($_POST['email'] > 4) && strlen($_POST['code']) == 4 && strlen($_POST['password']) > 3) {
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$code = $_POST['code'];
			$password = $_POST['password'];
			$check = $this->model->get_row("SELECT `seller_id` FROM `seller` WHERE `mobile` = '$mobile' AND `email` = '$email' AND `forgot_password_code` = '$code';");
			if ($check) {
				$this->db->where('seller_id',$check['seller_id']);
				$resp = $this->db->update('seller',array("forgot_password_code"=>'',"password"=>md5($password)));
				if ($resp) {
					echo json_encode(array("status"=>true));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"not updated, please try again or reload your webpage."));
				}
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"mobile/email/code not valid"));
			}
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"password lenght is not valid, please enter minimum 4 characters"));
		}
	}

	public function submit_seller_login()
	{
		if ($_POST) {
			parse_str($_POST['data'],$post);
			$resp = $this->model->seller_login($post['mobile'],md5($post['password']));
			if ($resp) {
				$_SESSION['seller'] = $resp;
				echo json_encode(array("status"=>true));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"mobile/password not valid"));
			}
		}
	}
	public function seller_login()
	{
		if (!($_SESSION['seller'])) {
			$data['meta_title'] = 'Easy Door | Seller Login';
			$this->template('seller_login',$data);
		}
		else{
			redirect('seller/index');
		}
	}
	public function seller_signup()
	{
		if (!($_SESSION['seller'])) {
			$data['meta_title'] = 'Easy Door | Seller Signup';
			$this->template('seller_signup',$data);
		}
		else{
			redirect('seller/index');
		}
	}
	public function seller_signup_step()
	{
		if ($_SESSION['seller']) {
			$data['seller'] = $this->model->seller_login($_SESSION['seller']['mobile'],$_SESSION['seller']['password']);
			$_SESSION['seller'] = $data['seller'];
			if ($data['seller']['signup_step'] == '1') {
				$data['meta_title'] = 'Easy Door | Seller Signup Step 2';
				$this->template('seller_signup_step_2',$data);
			}
			else if ($data['seller']['signup_step'] == '2' && $data['seller']['mobile_verified'] == 'yes') {
				$data['meta_title'] = 'Easy Door | Seller Signup Step 3';
				$this->template('seller_signup_step_3',$data);
			}
			else if ($data['seller']['signup_step'] == '3') {
				redirect('seller/index');
				/*$data['meta_title'] = 'Easy Door | Seller Signup Step 4';
				$this->template('seller_signup_step_4',$data);*/
			}
			else if ($data['seller']['signup_step'] == '4') {
				redirect('seller/index');
			}
		}
		else{
			redirect('index');
		}
	}
	public function post_seller_signup_form_1()
	{
		if ($_POST) {
			parse_str($_POST['data'],$post);
			$mobile = str_replace('+', '', $post['mobile']);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$post['mobile_sms'] = $mobile;
			$check_mobile = $this->model->get_row("SELECT `mobile` FROM `seller` WHERE `mobile` = '".$post['mobile']."';");
			if ($check_mobile) {
				echo json_encode(array("status"=>false,"msg"=>"mobile number is already in use"));
			}
			else{
				$post['password'] = md5($post['password']);
				$post['dob'] = $post['dob_year'].'-'.$post['dob_month'].'-'.$post['dob_day'];
				$post['dob'] = date('Y-m-d',strtotime($post['dob']));
				unset($post['dob_year']);unset($post['dob_month']);unset($post['dob_day']);
				$post['varification_code'] = substr('13238341434535461657175867685960850676078212703214348496716',rand(0,26),4);
				$post['varification_code_expiry'] = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +10 minutes"));
				//$post['signup_step'] = 1;
				// $post['signup_step'] = 2;
				$post['signup_step'] = 3;
				$post['mobile_verified'] = 'yes';
				$resp = $this->db->insert('seller',$post);
				$SellerID = $this->db->insert_id();
				if ($resp) {
					/*$sms_setting = $this->model->sms_setting();
					$ch = curl_init();
					$mask = urlencode($sms_setting['mask']);
					$pass = urlencode($sms_setting['password']);
					$id = urlencode($sms_setting['username']);
					$msg = urlencode($post['varification_code']);
					curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec($ch);
					curl_close ($ch);*/

					$seller = $this->model->seller_login($post['mobile'],$post['password']);
					$_SESSION['seller'] = $seller;
					echo json_encode(array("status"=>true));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"not submitted please try again."));
				}
			}
		}
		else{
			redirect('index');
		}
	}
	public function reset_seller_mobile_varification_code()
	{
		if ($_SESSION['seller']) {
			$update['varification_code'] = substr('13238341434535461657175867685960850676078212703214348496716',rand(0,26),4);
			$update['varification_code_expiry'] = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." +10 minutes"));
			$this->db->where('seller_id',$_SESSION['seller_id']);
			$resp = $this->db->update('seller',$update);
			if ($resp) {
				$mobile = $_SESSION['seller']['mobile_sms'];
				$sms_setting = $this->model->sms_setting();
				$ch = curl_init();
				$mask = urlencode($sms_setting['mask']);
				$pass = urlencode($sms_setting['password']);
				$id = urlencode($sms_setting['username']);
				$msg = urlencode($update['varification_code']);
				file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
				echo json_encode(array("status"=>true));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"please try again"));
			}
		}
		else{
			redirect('logout');
		}
	}
	public function varify_seller_mobile()
	{
		if ($_SESSION['seller']) {
			$code = $_POST['code'];
			$checkTime = $this->model->get_row("SELECT `varification_code` FROM `seller` WHERE `varification_code_expiry` >= CURDATE();");
			if ($checkTime) {
				if ($checkTime['varification_code'] == $code) {
					$update['signup_step'] = 2;
					$update['mobile_verified'] = 'yes';
					$this->db->where('seller_id',$_SESSION['seller']['seller_id']);
					$this->db->update('seller',$update);
					echo json_encode(array("status"=>ture));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"wrong code entered"));
				}
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"code expiry please resend code"));
			}
		}
		else{
			redirect('logout');
		}
	}
	public function submit_seller_signup_form_3()
	{
		if ($_SESSION['seller']) {
			parse_str($_POST['data'],$post);
			$this->db->where('seller_id',$_SESSION['seller']['seller_id']);
			$resp = $this->db->update('seller',$post);
			if ($resp) {
				$update['signup_step'] = 3;
				$this->db->where('seller_id',$_SESSION['seller']['seller_id']);
				$this->db->update('seller',$update);
				echo json_encode(array("status"=>true));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"please try again"));
			}
		}
		else{
			redirect('logout');
		}
	}
	public function submit_seller_signup_form_4()
	{
		if ($_SESSION['seller']) {
			
			if (strlen($_FILES['cnic_front']['name']) > 2) {
				$config['upload_path'] = 'uploads/seller/';
	        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
	        	$config['encrypt_name'] = TRUE;
	        	$ext = pathinfo($_FILES['cnic_front']['name'], PATHINFO_EXTENSION);
				$new_name = md5(time().$_FILES['cnic_front']['name']).'.'.$ext;
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
	        	if ($this->upload->do_upload('cnic_front'))
	        	{
		        	$file = $this->upload->data()['file_name'];
		        	$_POST['cnic_front'] = $file;
	        	}
			}
			if (strlen($_FILES['cnic_back']['name']) > 2) {
				$config['upload_path'] = 'uploads/seller/';
	        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
	        	$config['encrypt_name'] = TRUE;
	        	$ext = pathinfo($_FILES['cnic_back']['name'], PATHINFO_EXTENSION);
				$new_name = md5(time().$_FILES['cnic_back']['name']).'.'.$ext;
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
	        	if ($this->upload->do_upload('cnic_back'))
	        	{
		        	$file = $this->upload->data()['file_name'];
		        	$_POST['cnic_back'] = $file;
	        	}
			}
			if (strlen($_FILES['cheque_image']['name']) > 2) {
				$config['upload_path'] = 'uploads/seller/';
	        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
	        	$config['encrypt_name'] = TRUE;
	        	$ext = pathinfo($_FILES['cheque_image']['name'], PATHINFO_EXTENSION);
				$new_name = md5(time().$_FILES['cheque_image']['name']).'.'.$ext;
				$config['file_name'] = $new_name;
				$this->load->library('upload', $config);
	        	if ($this->upload->do_upload('cheque_image'))
	        	{
		        	$file = $this->upload->data()['file_name'];
		        	$_POST['cheque_image'] = $file;
	        	}
			}
			$this->db->where('seller_id',$_SESSION['seller']['seller_id']);
			$resp = $this->db->update('seller',$_POST);
			if ($resp) {
				$update['signup_step'] = 4;
				$update['status'] = 'new';
				$this->db->where('seller_id',$_SESSION['seller']['seller_id']);
				$this->db->update('seller',$update);
				redirect('seller-signup-step');
			}
			else{
				redirect('seller-signup-step');
			}
		}
		else{
			redirect('logout');
		}
	}
	/**
	*

		@PAGES

	*
	*/
	public function about_us()
	{
		$_SESSION['url'] = 'index';
		$data['page'] = $this->model->get_page(2);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$data['testimonials'] = $this->model->testimonials();
		$this->template('about_us',$data);	
	}
	public function privacy_policies()
	{
		$_SESSION['url'] = 'index';
		$data['page'] = $this->model->get_page(1);
		$data['testimonials'] = $this->model->testimonials();
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page',$data);
	}
	public function terms_of_use()
	{
		$_SESSION['url'] = 'index';
		$data['page'] = $this->model->get_page(3);
		$data['testimonials'] = $this->model->testimonials();
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page',$data);
	}
	public function return_policy()
	{
		$_SESSION['url'] = 'index';
		$data['page'] = $this->model->get_page(4);
		$data['testimonials'] = $this->model->testimonials();
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page',$data);
	}
	public function contact_us()
	{
		$_SESSION['url'] = 'index';
		$data['page'] = $this->model->get_page(6);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('contact_us',$data);	
	}
	public function terms()
	{
		$_SESSION['url'] = 'index';
		$data['meta_title'] = 'Easy Door | Terms & Conditions';
		$this->template('terms',$data);	
	}
	public function faqs()
	{
		$_SESSION['url'] = 'index';
		$data['meta_title'] = 'Easy Door | FAQs';
		$data['faqs'] = $this->model->get_results("SELECT * FROM `faq` ORDER BY `faq_id` ASC;");
		$this->template('faqs',$data);	
	}
	public function blog($slug = false)
	{
		if ($slug != false) {
			$_SESSION['url'] = 'blog/'.$slug;
			$data['blog'] = $this->model->get_blog_by_slug($slug);
			$data['meta_title'] = $data['blog']['meta_title'];
			$data['meta_key'] = $data['blog']['meta_key'];
			$data['meta_desc'] = $data['blog']['meta_desc'];
			$this->template('blog_single',$data);
		}
		else{
			$_SESSION['url'] = 'blog';
			$data['meta_title'] = 'Easy Door | Blog';
			$data['blog'] = $this->model->blog();
			$this->template('blog',$data);
		}
	}
	public function sellers()
	{
		if ($_SESSION['seller']) {
			redirect('seller/index');
		}
		$_SESSION['url'] = 'seller/index';
		$data['meta_title'] = 'Easy Door | Seller';
		$this->template('seller',$data);
	}

	/**
	*

		@CUSTOMER RELATE

	*
	*/
	public function index()
	{
		$data['page'] = $this->model->get_page(5);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$data['main_page_class'] = 'main-page';
		$_SESSION['url'] = 'index';
		$data['featured_products'] = $this->model->get_featured_products();
		$data['deals'] = $this->model->get_deals();
		$this->template('index',$data);
	}

	public function listing($slug, $brand = false)
	{
		$_SESSION['url'] = 'listing/'.$slug;
		/*$SlugUrl = explode('-', $slug);
		$cat = $SlugUrl[count($SlugUrl)-1];*/
		$data['cat'] = $this->model->get_cat_byslug($slug);
		$cat = $data['cat']['id'];
		//$data['cat'] = $this->model->get_cat_byid($cat);
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `name` ASC;");

		if ($brand) {
			$SlugUrl2 = explode('-', $brand);
			$BrandID = $SlugUrl2[count($SlugUrl2)-1];
			$data['brands'] = $this->model->get_results("SELECT `brand_id`,`title` FROM `brand` WHERE `brand_id` = '$BrandID';");
			$products = $this->model->get_products_by_brand_cat($cat,$BrandID);
			$data['meta_title'] = $data['brands'][0]['title'].' - '.$data['cat']['meta_title'];
			$data['meta_key'] = $data['brands'][0]['title'].' - '.$data['cat']['meta_key'];
			$data['meta_desc'] = $data['brands'][0]['title'].' - '.$data['cat']['meta_desc'];
			$data['brand_id'] = $BrandID;
		}
		else{
			$data['brands'] = $this->model->brands_listing_page($cat);
			$products = $this->model->get_products($cat);
			$filterIds = $data['cat']['filter_ids'];
			$filterIds = trim($filterIds, ',');
			if (strlen($filterIds) > 0) {
				$filetrSql = "`filter_id` IN($filterIds) AND";
				$filterCheck = true;
			}
			else{
				$filetrSql = '';
				$filterCheck = false;
			}
			if ($filterCheck) {
				$data['dynamicFiltters'] = $this->model->get_results("SELECT `filter_id`,`title` FROM `filter` WHERE $filetrSql `status` = 'active' ORDER BY `title`;");
			}
			else{
				$data['dynamicFiltters'] = false;
			}
			$data['meta_title'] = $data['cat']['meta_title'];
			$data['meta_key'] = $data['cat']['meta_key'];
			$data['meta_desc'] = $data['cat']['meta_desc'];
		}


		$sizes = array_map(function ($ar) {return $ar['size'];}, $products);
		$sizes = implode(',', $sizes);
		$sizes = implode(',', array_unique(explode(',', $sizes)));
		$data['check_sizes'] = explode(',', $sizes);

		$colors = array_map(function ($ar) {return $ar['color'];}, $products);
		$colors = implode(',', $colors);
		$colors = implode(',', array_unique(explode(',', $colors)));
		$data['check_colors'] = explode(',', $colors);

		$filters = array_map(function ($ar) {return $ar['dynamic_filters'];}, $products);
		$filters = implode(',', $filters);
		$data['active_filters'] = implode(',', array_unique(explode(',', $filters)));
		$data['active_filters'] = explode(',', $data['active_filters']);
		$data['active_filters'] = array_filter($data['active_filters']);
		$data['active_filters'] = implode(',', $data['active_filters']);
		$data['active_filters'] = rtrim($data['active_filters'], ", ");

		if ($products) {
			$data['products'] = $products;
			$this->template('listing',$data);
		}
		else{
			$data['child_cats'] = $this->model->get_child_cats($cat);
			$this->template('cat_listing_2',$data);
			//$this->template('cat_listing',$data);
		}
	}
	public function deals()
	{
		$deal = $this->model->get_row("SELECT * FROM `deal` WHERE NOW() >= `start` AND NOW() <= `end` ORDER BY `deal_id` ASC;");
		if (!$deal) {
			redirect('index');
		}
		$ids = $deal['products'];
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `name` ASC;");

		//$data['brands'] = $this->model->brands_listing_page($cat);
		$products = $this->model->get_deal_products($ids);
		$data['cats'] = $this->model->get_deal_cats($ids);
		$data['brands'] = $this->model->get_deal_brands($ids);
		$cats_filter_ids = $this->model->get_deal_cats_filter_id($ids);
		$filter_ids = '';
		foreach ($cats_filter_ids as $key => $filter) {
			if ($key == 0) {
				$filter_ids = $filter['filter_ids'];
			}
			else{
				$filter_ids = ','.$filter['filter_ids'];
			}
		}
		$filter_ids = implode(',', array_unique(explode(',',$filter_ids)));
		$filterIds = $filter_ids;
		$filterIds = trim($filterIds, ',');
		if (strlen($filterIds) > 0) {
			$filetrSql = "`filter_id` IN($filterIds) AND";
			$filterCheck = true;
		}
		else{
			$filetrSql = '';
			$filterCheck = false;
		}
		if ($filterCheck) {
			$data['dynamicFiltters'] = $this->model->get_results("SELECT `filter_id`,`title` FROM `filter` WHERE $filetrSql `status` = 'active' ORDER BY `title`;");
		}
		else{
			$data['dynamicFiltters'] = false;
		}
		$data['meta_title'] = $deal['title'];
		$data['meta_key'] = $deal['title'];
		$data['meta_desc'] = $deal['title'];


		$sizes = array_map(function ($ar) {return $ar['size'];}, $products);
		$sizes = implode(',', $sizes);
		$sizes = implode(',', array_unique(explode(',', $sizes)));
		$data['check_sizes'] = explode(',', $sizes);

		$colors = array_map(function ($ar) {return $ar['color'];}, $products);
		$colors = implode(',', $colors);
		$colors = implode(',', array_unique(explode(',', $colors)));
		$data['check_colors'] = explode(',', $colors);

		$filters = array_map(function ($ar) {return $ar['dynamic_filters'];}, $products);
		$filters = implode(',', $filters);
		$data['active_filters'] = implode(',', array_unique(explode(',', $filters)));
		$data['active_filters'] = explode(',', $data['active_filters']);
		$data['active_filters'] = array_filter($data['active_filters']);
		$data['active_filters'] = implode(',', $data['active_filters']);
		$data['active_filters'] = rtrim($data['active_filters'], ", ");

		$data['deal'] = $deal;

		if ($products) {
			$data['products'] = $products;
			$this->template('deal_listing',$data);
		}
		else{
			redirect('index');
		}
	}
	public function search()
	{
		$_GET['title'] = urldecode($_GET['title']);
		$_GET['key'] = urldecode($_GET['key']);
		if (isset($_GET['title'])) {
			$data['search'] = 'true';
			$data['search_key'] = trim($_GET['key']);
			$data['search_type'] = trim($_GET['type']);
		}
		$data['search'] = 'true';
		$data['search_key'] = trim($_GET['key']);
		$data['search_type'] = trim($_GET['type']);
		if ($_GET['type'] == 'category') {
			$cat = $_GET['ref'];
			$data['brand_id'] = 0;
			$data['page_heading'] = $_GET['title'];
			$CheckProduct = false;
		}
		else if ($_GET['type'] == 'brand') {
			if (strlen($_GET['cref']) > 0) {
				$cat = $_GET['cref'];
			}
			$data['page_heading'] = $_GET['title'];
			$data['brand_id'] = $_GET['ref'];
			$CheckProduct = false;
		}
		else if ($_GET['type'] == 'product') {
			$data['page_heading'] = 'Product Search';
			$data['products'] = $this->model->get_products_by_keyword($_GET['key']);
			$product = $this->model->get_product_byid($_GET['ref']);
			$cat = $product['category_id'];
			$CheckProduct = true;
		}
		else if ($_GET['type'] == 'direct') {
			$data['page_heading'] = 'Search: '.$_GET['key'];
			$data['products'] = $this->model->get_products_by_keyword($_GET['key']);
			$cat = false;
			$brand = false;
			$CheckProduct = false;
		}
		if ($CheckProduct == false) {
			if ($cat > 0) {
				$data['cat'] = $this->model->get_cat_byid($cat);
				$data['products'] = $this->model->get_products($cat);
				$data['brands'] = $this->model->brands_listing_page($cat);
			}
			else{
				$data['cat'] = false;
				if ($brand == false) {
					$data['brand'] = false;
				}
				else{
					$data['products'] = $this->model->get_products_by_brand($_GET['ref']);
					$data['brands'] = $this->model->get_related_brands($_GET['ref']);
					$data['brand'] = $this->model->get_row("SELECT * FROM `brand` WHERE `brand_id` = '".$_GET['ref']."';");
				}
			}
		}
		else{
			$data['cat'] = $this->model->get_cat_byid($cat);
			$data['brands'] = $this->model->brands_listing_page($cat);
		}

		$sizes = array_map(function ($ar) {return $ar['size'];}, $data['products']);
		if ($sizes != '') {
			$sizes = implode(',', $sizes);
			$sizes = implode(',', array_unique(explode(',', $sizes)));
			$data['check_sizes'] = explode(',', $sizes);
		}
		else{
			$data['check_sizes'] = false;
		}

		$colors = array_map(function ($ar) {return $ar['color'];}, $data['products']);
		if ($colors != '') {
			$colors = implode(',', $colors);
			$colors = implode(',', array_unique(explode(',', $colors)));
			$data['check_colors'] = explode(',', $colors);
		}
		else{
			$data['check_colors'] = false;
		}


		$data['meta_title'] = 'Easy Door | Search Results';
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `name` ASC;");


		$this->template('search',$data);
	}
	public function product($slug)
	{
		$_SESSION['url'] = 'product/'.$slug;
		$SlugUrl = explode('-', $slug);
		$id = $SlugUrl[count($SlugUrl)-1];
		$data['q'] = $this->model->get_product_detail_byid($id);
		$resp = $this->db->query("UPDATE `brand` SET `product_visit`=`product_visit`+1 WHERE `brand_id` = '".$data['q']['product']['brand_id']."'");
		$this->db->query("UPDATE `products` SET `visit`=`visit`+1 WHERE `product_id` = '$id'");
		$data['meta_title'] = $data['q']['product']['meta_title'];
		$data['meta_key'] = $data['q']['product']['meta_key'];
		$data['meta_desc'] = $data['q']['product']['meta_desc'];
		$data['images'] = $this->model->get_product_images($id);
		$data['ProID'] = $id;
		if ($data['q'] == false) {
			redirect('index');
			die;
		}
		$data['review_pages'] = $this->model->get_row("SELECT COUNT(`review_id`) AS count FROM `review` WHERE `product_id` = '$id' AND `status` = 'active';");
		$data['reviews'] = $this->model->review($id,$data['review_pages']['count'],1);
		if ($_SESSION['user']) {
			$review = $this->model->get_product_for_ratting($id,$_SESSION['user']['customer_id']);
			if ($review) {
				$finalReviewCheck = $this->model->get_row("SELECT `review_id` FROM `review` WHERE `user_id` = '".$_SESSION['user']['customer_id']."' AND `product_id` = '".$id."';");
				if ($finalReviewCheck) {
					$data['can_review'] = false;
				}
				else{
					$data['can_review'] = true;
				}
			}
			else{
				$data['can_review'] = false;
			}
			$WishList = $this->model->get_row("SELECT * FROM `wishlist` WHERE `user_id` = '".$_SESSION['user']['customer_id']."'  AND `product_id` = '".$id."'  AND `status` = 'active';");
			if ($WishList) {
				$data['check_wishlist'] = true;
			}
			else{
				$data['check_wishlist'] = false;
			}
		}
		$data['related_products'] = $this->model->get_related_products($data['q']['product']['product_id'],$data['q']['product']['category_id']);
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `color_id` ASC;");
		$data['products_count_by_cat'] = $this->model->get_cat_product_count($data['q']['product']['category_id']);
		$data['return_policy'] = $this->model->get_page(4);
		$this->template('product',$data);
	}
	public function brand2($slug)
	{
		$SlugUrl = explode('-', $slug);
		$id = $SlugUrl[count($SlugUrl)-1];
		$resp = $this->db->query("UPDATE `brand` SET `brand_visit`=`brand_visit`+1 WHERE `brand_id` = '$id'");
		$data['brand'] = $this->model->get_brand_byid($id);
		$catIdz = $this->model->get_cats_ids_by_brand($id);
		$categoriesIdz = '';
		foreach ($catIdz as $key => $catID) {
			if ($key == 0) {
				$categoriesIdz .= $catID['cat_id'];
			}
			else{
				$categoriesIdz .= ','.$catID['cat_id'];
			}
		}
		$Count = 0;
		//if (strlen($data['brand']['categories']) > 0 && $data['brand']['categories'] != 0) {
		if (strlen($categoriesIdz) > 0 && $categoriesIdz != 0) {
			// $cats = explode(',', $data['brand']['categories']);
			$cats = explode(',', $categoriesIdz);
			$final = array();
			$KEY = 0;
			foreach ($cats as $key => $cat) {
				$CatID = $cat;
				$CatData = $this->model->get_row("SELECT `id`,`title` FROM `categories` WHERE `id` = '$CatID';");
				if ($CatData) {
					$Products = $this->model->get_products_by_brand_cat($CatData['id'],$id);
					if ($Products) {
						$Count = count($Products) + $Count;
						$final[$KEY]['cat'] = $CatData;
						$final[$KEY]['products'] = $Products;
						$KEY++;
					}
				}
			}
			$data['content'] = $final;
			$data['Count'] = $Count;
			$data['meta_title'] = 'Easy Door | '.$data['brand']['title'];
			$this->template('brand_categories',$data);
		}
		else{
			$data['content'] = $this->model->get_products_by_brand($data['brand']['brand_id']);
			$data['Count'] = count($data['content']);
			$data['meta_title'] = 'Easy Door | '.$data['brand']['title'];
			$this->template('brand_products',$data);
		}
		//$this->template('brand',$data);
	}
	public function brand($slug)
	{
		$SlugUrl = explode('-', $slug);
		$id = $SlugUrl[count($SlugUrl)-1];
		$resp = $this->db->query("UPDATE `brand` SET `brand_visit`=`brand_visit`+1 WHERE `brand_id` = '$id'");
		$data['brand'] = $this->model->get_brand_byid($id);
		$data['brandAds'] = false;
		if (strlen($data['brand']['ad_1']) > 4) {
			$data['brandAds'][]['ad'] = $data['brand']['ad_1'];
		}
		if (strlen($data['brand']['ad_2']) > 4) {
			$data['brandAds'][]['ad'] = $data['brand']['ad_2'];
		}
		if ($data['brandAds'] == false) {
			$data['common_ad'] = $this->model->get_ads();
		}
		$brandSlider = false;
		if (strlen($data['brand']['slide_1']) > 0) {
			$brandSlider[]['slide'] = UPLOADS_CAT.$data['brand']['slide_1'];
		}
		if (strlen($data['brand']['slide_2']) > 0) {
			$brandSlider[]['slide'] = UPLOADS_CAT.$data['brand']['slide_2'];
		}
		if (strlen($data['brand']['slide_3']) > 0) {
			$brandSlider[]['slide'] = UPLOADS_CAT.$data['brand']['slide_3'];
		}
		if ($brandSlider) {
			$data['brandSlider'] = $brandSlider;
		}
		else{
			$data['brandSlider'] = false;
			if (!(strlen($data['brand']['banner']) > 4)) {
				$data['commonSlider'] = $this->model->get_results("SELECT `slider_image`,`slider_title` FROM `slider` WHERE `slider_status` = '1' ORDER BY `id` ASC;");
			}
		}
		$data['seller_listing'] = $this->model->get_lisitng($data['brand']['seller_id']);
		if ($data['seller_listing']) {
			$MainKEY = 0;
			$Count = 0;
			$final = array();
			foreach ($data['seller_listing'] as $listKey => $list) {
				$catIdz = $this->model->get_cats_ids_by_brand_listing($id,$list['seller_listing_id']);
				$categoriesIdz = '';
				foreach ($catIdz as $key => $catID) {
					if ($key == 0) {
						$categoriesIdz .= $catID['cat_id'];
					}
					else{
						$categoriesIdz .= ','.$catID['cat_id'];
					}
				}
				if (strlen($categoriesIdz) > 0 && $categoriesIdz != 0) {
					$cats = explode(',', $categoriesIdz);
					$KEY = 0;
					$final[$MainKEY]['list'] = $list;
					foreach ($cats as $key => $cat) {
						$CatID = $cat;
						$CatData = $this->model->get_row("SELECT `id`,`title` FROM `categories` WHERE `id` = '$CatID';");
						if ($CatData) {
							$Products = $this->model->get_products_by_brand_cat_listing($CatData['id'],$id,$list['seller_listing_id']);
							if ($Products) {
								$Count = count($Products) + $Count;
								$final[$MainKEY]['content'][$KEY]['cat'] = $CatData;
								$final[$MainKEY]['content'][$KEY]['products'] = $Products;
								$KEY++;
							}
						}
					}
					$MainKEY++;
				}
			}
		}
		$data['content'] = $final;
		$data['Count'] = $Count;

		//All
		$catIdz = $this->model->get_cats_ids_by_brand($id);
		$categoriesIdz = '';
		foreach ($catIdz as $key => $catID) {
			if ($key == 0) {
				$categoriesIdz .= $catID['cat_id'];
			}
			else{
				$categoriesIdz .= ','.$catID['cat_id'];
			}
		}
		if (strlen($categoriesIdz) > 0 && $categoriesIdz != 0) {
			$cats = explode(',', $categoriesIdz);
			$final = array();
			$data['catsData'] = $this->model->get_results("SELECT `id`,`title` FROM `categories` WHERE `id` IN($categoriesIdz);");
			$Products = false;
			foreach ($data['catsData'] as $key => $CatData) {
				$Products = $this->model->get_products_by_brand_cat($CatData['id'],$id);
				if ($Products) {
					$data['products'] = $Products;
					break;
				}
			}
		}
		else{
			$data['catsData']  = false;
		}
		$Count = $this->model->get_row("SELECT COUNT(`product_id`) AS 'total' FROM `products` WHERE `brand_id` = '$id';");
		if ($Count['total'] > 0) {
			$data['Count'] = $Count['total'];
		}
		else{
			$data['Count'] = 0;
		}
		$data['meta_title'] = 'Easy Door | '.$data['brand']['title'];
		if (!($Count > 0)) {
			$this->brand2($slug);
		}
		else{
			$this->template('brand_new',$data);
			// $this->template('brand2',$data);
		}
	}
	public function brand_old($slug)
	{
		$SlugUrl = explode('-', $slug);
		$id = $SlugUrl[count($SlugUrl)-1];
		$resp = $this->db->query("UPDATE `brand` SET `brand_visit`=`brand_visit`+1 WHERE `brand_id` = '$id'");
		$data['brand'] = $this->model->get_brand_byid($id);
		$data['seller_listing'] = $this->model->get_lisitng($data['brand']['seller_id']);
		if ($data['seller_listing']) {
			$MainKEY = 0;
			$Count = 0;
			$final = array();
			foreach ($data['seller_listing'] as $listKey => $list) {
				$catIdz = $this->model->get_cats_ids_by_brand_listing($id,$list['seller_listing_id']);
				$categoriesIdz = '';
				foreach ($catIdz as $key => $catID) {
					if ($key == 0) {
						$categoriesIdz .= $catID['cat_id'];
					}
					else{
						$categoriesIdz .= ','.$catID['cat_id'];
					}
				}
				if (strlen($categoriesIdz) > 0 && $categoriesIdz != 0) {
					$cats = explode(',', $categoriesIdz);
					$KEY = 0;
					$final[$MainKEY]['list'] = $list;
					foreach ($cats as $key => $cat) {
						$CatID = $cat;
						$CatData = $this->model->get_row("SELECT `id`,`title` FROM `categories` WHERE `id` = '$CatID';");
						if ($CatData) {
							$Products = $this->model->get_products_by_brand_cat_listing($CatData['id'],$id,$list['seller_listing_id']);
							if ($Products) {
								$Count = count($Products) + $Count;
								$final[$MainKEY]['content'][$KEY]['cat'] = $CatData;
								$final[$MainKEY]['content'][$KEY]['products'] = $Products;
								$KEY++;
							}
						}
					}
					$MainKEY++;
				}
			}
		}
		$data['content'] = $final;
		$data['Count'] = $Count;

		//All
		$catIdz = $this->model->get_cats_ids_by_brand($id);
		$categoriesIdz = '';
		foreach ($catIdz as $key => $catID) {
			if ($key == 0) {
				$categoriesIdz .= $catID['cat_id'];
			}
			else{
				$categoriesIdz .= ','.$catID['cat_id'];
			}
		}
		if (strlen($categoriesIdz) > 0 && $categoriesIdz != 0) {
			$cats = explode(',', $categoriesIdz);
			$final = array();
			$KEY = 0;
			foreach ($cats as $key => $cat) {
				$CatID = $cat;
				$CatData = $this->model->get_row("SELECT `id`,`title` FROM `categories` WHERE `id` = '$CatID';");
				if ($CatData) {
					$Products = $this->model->get_products_by_brand_cat($CatData['id'],$id);
					if ($Products) {
						$Count = count($Products) + $Count;
						$final[$KEY]['cat'] = $CatData;
						$final[$KEY]['products'] = $Products;
						$KEY++;
					}
				}
			}
			$data['all_content'] = $final;
		}
		else{
			$data['all_content'] = false;
		}

		$data['meta_title'] = 'Easy Door | '.$data['brand']['title'];
		if (!($Count > 0)) {
			$this->brand2($slug);
		}
		else{
			$this->template('brand2',$data);
		}
	}
	public function brand_categories($slug)
	{
		#working
		$this->db->query("UPDATE `brand` SET `brand_visit`=`brand_visit`+1 WHERE `brand_id` = '$id'");
		$SlugUrl = explode('-', $slug);
		$id = $SlugUrl[count($SlugUrl)-1];
		$data['brand'] = $this->model->get_brand_byid($id);
		$Count = 0;
		if (strlen($data['brand']['categories']) > 0) {
			$cats = explode(',', $data['brand']['categories']);
			$final = array();
			$KEY = 0;
			foreach ($cats as $key => $cat) {
				$CatID = $cat;
				$CatData = $this->model->get_row("SELECT `id`,`title` FROM `categories` WHERE `id` = '$CatID';");
				if ($CatData) {
					$Products = $this->model->get_products_by_brand_cat($CatData['id'],$id,4);
					if ($Products) {
						$Count = count($Products) + $Count;
						$final[$KEY]['cat'] = $CatData;
						$final[$KEY]['products'] = $Products;
						$KEY++;
					}
				}
			}
			$data['content'] = $final;
		}
		else{
			$data['content'] = false;
		}
		$data['Count'] = $Count;
		$data['meta_title'] = 'Easy Door | '.$data['brand']['title'];
		$this->template('brand_categories',$data);
	}
	/**
	*

		@CART

	*
	*/
	public function add_to_cart()
	{
		if ($_POST) {
			$product = $this->model->get_product_byid($_POST['id']);
			$product['price'] = $product['price'];
			if ($product['filter_price_show'] == 'color') {
				$Prices = $product['color_price'];
				$Prices = explode(',', $Prices);
				if ($product['color_price'] != '0') {
					foreach ($Prices as $key => $Price) {
						$Price = explode('-', $Price);
						if ($Price[0] == $_POST['color_id']) {
							$product['price'] = $Price[1];
							break;
						}
					}
				}
			}
			else if ($product['filter_price_show'] == 'size') {
				$Prices = $product['size_price'];
				$Prices = explode(',', $Prices);
				if ($product['size_price'] != '0') {
					foreach ($Prices as $key => $Price) {
						$Price = explode('-', $Price);
						if ($Price[0] == $_POST['size_id']) {
							$product['price'] = $Price[1];
							break;
						}
					}
				}
			}
			else{
				$product['price'] = $product['price'];
			}
			$_POST['total'] = $product['price'] * $_POST['qty'];
			$_POST['price'] = $product['price'];
			$_POST['sale'] = $product['sale_percentage'];
			$_POST['discount'] = $product['discount'];

			$_SESSION['cart'][] = $_POST;
			$count = count($_SESSION['cart']);
			$total = 0;
			foreach ($_SESSION['cart'] as $key => $cart) {
				$total = $total + $cart['total'];
			}
			echo json_encode(array("status"=>true,"count"=>$count,"total"=>$total));
		}
	}
	public function check_out()
	{
		$_SESSION['url'] = 'check-out';
		if ($_SESSION['user']) {
			$data['meta_title'] = 'Easy Door | Check Out';
			$data['checkout_products'] = $this->model->checkout_products($_SESSION['cart']);
			$data['socities'] = $this->model->get_socities();
			$data['countries'] = $this->model->countries();
			if ($_SESSION['user']['state_id'] > 0) {
				$data['cities'] = $this->model->cities($_SESSION['user']['state_id']);
			}
			else{
				$data['cities'] = $this->model->cities(2728);
			}
			$data['delivery_charges'] = $this->model->delivery_charges();
			$data['delivery_charges_waive_off_limit'] = $this->model->delivery_charges_waive_off_limit();
			$data['delivery_information'] = $this->model->get_last_delivery_information_by_customer($_SESSION['user']['customer_id']);
			$data['addresses'] = $this->model->user_addresses($_SESSION['user']['customer_id']);
			$data['cards'] = $this->model->get_cards($_SESSION['user']['customer_id']);
			$card = $this->model->get_row("SELECT * FROM `card` WHERE `user_id` = '".$_SESSION['user']['customer_id']."' AND `type` = 'primary';");
			if ($card) {
				$last = $this->model->get_row("SELECT `payment_method`,`save_my_card` FROM `sale` WHERE `user_id` = '".$_SESSION['user']['customer_id']."' AND `payment_method` = 'card' ORDER BY `sale_id` DESC;");	
				if (!($last)) {
					$last['payment_method'] = 'cod';
					$last['save_my_card'] = 'no';
				}
				$data['last_card']['payment_method'] = $last['payment_method'];
				$data['last_card']['card_name'] = $card['name'];
				$data['last_card']['card_number'] = $card['number'];
				$data['last_card']['card_cvc'] = $card['cvc'];
				$data['last_card']['card_expiry_month'] = $card['month'];
				$data['last_card']['card_expiry_year'] = $card['year'];
				$data['last_card']['save_my_card'] = $last['save_my_card'];
			}
			else{
				$data['last_card'] = $this->model->get_row("SELECT `payment_method`,`card_name`,`card_number`,`card_cvc`,`card_expiry_month`,`card_expiry_year`,`save_my_card` FROM `sale` WHERE `user_id` = '".$_SESSION['user']['customer_id']."' AND `payment_method` = 'card' ORDER BY `sale_id` DESC;");
			}
			$this->template('check_out',$data);
		}
		else{
			redirect('login');
		}
	}
	public function delete_cart_product()
	{
		if ($_POST) {
			unset($_SESSION['cart'][$_POST['key']]);
			$_SESSION['cart'] = array_values($_SESSION['cart']);
			$data = $this->model->checkout_products($_SESSION['cart']);
			$count = count($data);
			$TotalCart = 0;
			$html = '';
			foreach ($data as $key => $cart) {
				$TotalCart = $TotalCart + $cart['cart']['total'];
				$html .= '<div class="box">';
					// $html .= '<span class="heading">Pakage 1 of 2</span>';
					$html .= '<div class="box-detail">';
						/*$html .= '<span class="delivery-option">delivery option</span>';
						$html .= '<i class="fa fa-check-circle" aria-hidden="true"></i>';
						$html .= '<span class="price">Rs: 35</span>';
						$html .= '<span class="standard">Standard</span>';
						$html .= '<span class="get-by">Get by 1-3 Aug</span>';*/
					$html .= '</div>';
					$html .= '<div class="item-detail">';
						$html .= '<div class="left-box">';
							$html .= '<img src="'.UPLOADS_PRO.$cart['product']['category_id'].'/'.$cart['product']['product_image'].'" alt="'.$cart['product']['product_name'].'">';
							$html .= '<div class="text-box">';
								$html .= '<em>Side By Side</em>';
								$html .= '<span class="detail-heading">'.$cart['product']['product_name'].'</span>';
								$html .= '<em>Seller: '.$cart['product']['Brand'].'</em>';
							$html .= '</div>';
						$html .= '</div>';
						$html .= '<div class="price-box">';
							if ($cart['product']['sale_percentage'] > 0){
								$html .= '<span class="new">Rs: '.$cart['product']['price'].'</span>';;
								$html .= '<span class="old">Rs: '.$cart['product']['price']+$cart['product']['discount'].'</span>';
								$html .= '<span class="discount">-'.intval($cart['product']['sale_percentage']).'%</span>';
							}
							else{
								$html .= '<span class="new">Rs: '.$cart['product']['price'].'</span>';
							}
						$html .= '</div>';

						$html .= '<div class="quantity-block">';
							$html .= '<div class="q-box">';
								$html .= '<button class="quantity-arrow-minus quantity-arrow-minus-2"> - </button>';
								$html .= '<input class="quantity-num qty-input-2" data-id="'.$key.'" type="number" value="'.$cart['cart']['qty'].'" />';
								$html .= '<button class="quantity-arrow-plus quantity-arrow-plus-2"> + </button>';
							$html .= '</div>';
						$html .= '</div>';

					$html .= '</div>';
					$html .= '<div class="bottom-bar">';
						$html .= '<span class="shipment">Shipped by: Reasonable Store</span>';						
						$html .= '<a href="javascript://" class="delete-cart-btn" data-key="'.$key.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';
					$html .= '</div>';
				$html .= '</div><!-- /box -->';
			}
			$delivery_charges = $this->model->delivery_charges();
			$delivery_charges_waive_off_limit = $this->model->delivery_charges_waive_off_limit();
			if ($TotalCart > $delivery_charges_waive_off_limit) {
				$DeliveryCharges = 0;
			}
			else{
				$DeliveryCharges = $delivery_charges;
			}
			if (count($_SESSION['cart']) == 0) {
				unset($_SESSION['cart']);
				$TotalCart = 0;
				$DeliveryCharges = 0;
				$count = 0;
			}
			echo json_encode(array("status"=>true,"html"=>$html,"count"=>$count,"TotalCart"=>$TotalCart,"delivery_charges"=>$DeliveryCharges));
		}
	}
	public function change_cart_item_qty()
	{
		if ($_POST) {
			$total = 0;
			foreach ($_SESSION['cart'] as $key => $cart) {
				if ($_POST['key'] == $key) {
					$cart['total'] = $cart['price'] * $_POST['qty'];
					$_SESSION['cart'][$key]['qty'] = $_POST['qty'];
					$_SESSION['cart'][$key]['total'] = $cart['total'];
				}
				$total = $total + $cart['total'];
			}
			$TotalCart = $total;unset($total);

			$delivery_charges = $this->model->delivery_charges();
			$delivery_charges_waive_off_limit = $this->model->delivery_charges_waive_off_limit();
			if ($TotalCart > $delivery_charges_waive_off_limit) {
				$DeliveryCharges = 0;
			}
			else{
				$DeliveryCharges = $delivery_charges;
			}
			if (count($_SESSION['cart']) == 0) {
				unset($_SESSION['cart']);
				$TotalCart = 0;
				$DeliveryCharges = 0;
				$count = 0;
			}
			echo json_encode(array("status"=>true,"count"=>count($_SESSION['cart']),"TotalCart"=>$TotalCart,"delivery_charges"=>$DeliveryCharges));


		}
	}
	public function get_coupon_discount()
	{
		if ($_POST) {	
			if ($_SESSION['user']) {
				$user = $_SESSION['user'];
				$discount = $this->model->get_coupon($_POST['code']);
				if ($discount) {
					$today = date('d-m-Y');
					$from = date('d-m-Y',strtotime($discount['valid_from']));
					$to = date('d-m-Y',strtotime($discount['valid_to']));
					if ($today >= $from && $today <= $to) {
						echo json_encode(array("status"=>true,"data"=>$discount));
					}
					else{
						echo json_encode(array("status"=>false,"msg"=>"Code expired."));
					}
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"Code is not valid."));
				}
			}
		}
	}
	public function submit_order()
	{
		if (count($_SESSION['cart']) > 0) {
			if ($_POST) {
				if (isset($_SESSION['user']))
				{
					$user = $_SESSION['user'];
					parse_str($_POST['data1'], $data1);
					parse_str($_POST['data2'], $data2);

					$location['user_id'] = $user['customer_id'];
					$location['pincode'] = $data1['pincode'];
					$location['house_no'] = $data1['house_no'];
					$location['receiver_name'] = $data1['receiver_name'];
					$location['receiver_mobile'] = $data1['receiver_mobile'];
					$location['receiver_email'] = $data1['receiver_email'];
					$location['socity_id'] = 1;
					$location['city_id'] = $data1['city_id'];
					$this->db->insert('user_location',$location);
					$location_id = $this->db->insert_id();

					$addresses = $this->model->get_row("SELECT `user_address_id` FROM `user_address` WHERE `user_id` = '".$user['customer_id']."' ORDER BY `user_address_id` DESC;");
					if (!($addresses)) {
						$location['title'] = 'Address 1';
						$this->db->insert('user_address',$location);
					}

					$cart['user_id'] = $user['customer_id'];
					$cart['location_id'] = $location_id;
					

					
					$cart['payment_method'] = $data2['payment_method'];
					if ($cart['payment_method'] == 'card' && $data2['save_my_card'] == 'yes') {
						$cart['card_name'] = $data2['card_name'];
						$cart['card_number'] = $data2['card_number'];
						$cart['card_cvc'] = $data2['card_cvc'];
						$cart['card_expiry_month'] = $data2['card_expiry_month'];
						$cart['card_expiry_year'] = $data2['card_expiry_year'];
						$cart['save_my_card'] = 'yes';
					}
					$cart['total_amount'] = 0;
					$cart['total_items'] = 0;
					foreach ($_SESSION['cart'] as $key => $cart_) {
						$cart['total_amount'] = $cart['total_amount'] + $cart_['total'];
						$cart['total_items']++;
					}

					$delivery_charges = $this->model->delivery_charges();
					$delivery_charges_waive_off_limit = $this->model->delivery_charges_waive_off_limit();
					if ($cart['total_amount'] > $delivery_charges_waive_off_limit) {
						$cart['delivery_charge'] = 0;
					}
					else{
						$cart['delivery_charge'] = $delivery_charges;
					}


					$discount = $this->model->get_coupon($data1['coupon']);
					if ($discount && $cart['total_amount'] >= $discount['cart_value']) {
						$today = date('d-m-Y');
						$from = date('d-m-Y',strtotime($discount['valid_from']));
						$to = date('d-m-Y',strtotime($discount['valid_to']));
						if ($today >= $from && $today <= $to) {
							$cart['discount_code'] = $data1['coupon'];
							$cart['discount'] = $discount['discount_value'];
						}
						else{
							$cart['discount_code'] = '';
							$cart['discount'] = 0;
						}
					}
					else{
						$cart['discount_code'] = '';
						$cart['discount'] = 0;
					}

					$stripeAmount = ($cart['delivery_charge']+$cart['total_amount'])*100;
					$cart['sale_id'] = $this->order_number();
					$this->db->insert('sale',$cart);
					//$sale_id = $this->db->insert_id();
					$sale_id = $cart['sale_id'];
					foreach ($_SESSION['cart'] as $k => $q) {
						$Product = $this->model->get_product_byid($q['id']);
						$item['sale_id'] = $sale_id;
						$item['product_id'] = $Product['product_id'];
						$item['product_name'] = $Product['product_name'];
						$item['qty'] = $q['qty'];
						if ($Product['sale_percentage'] > 0) {
							$item['price'] = $q['price'];
						}
						else{
							$item['price'] = $q['price'];
						}
						$item['total'] = $q['total'];
						$item['size'] = $q['size_id'];
						$item['color'] = $q['color_id'];
						$this->db->insert('sale_items',$item);
					}
					unset($_SESSION['cart']);

					if ($cart['payment_method'] == 'card') {
						require_once('application/libraries/stripe-php/init.php');
		        		\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
				        
				        
			        	$charge = \Stripe\Charge::create ([
				                "amount" => $stripeAmount,
				                "currency" => "pkr",
				                "source" => $data2['stripeToken'],
				                "description" => "easy door payment" 
				        ]);
				        $status = $charge->status;
				        if ($status == 'succeeded') {
				        	$Update2['card_payment_status'] = 'paid';
				        	$Update2['strip_id'] = $charge->id;
				        	$Update2['strip_balance_transaction'] = $charge->balance_transaction;
				        	$this->db->where('sale_id',$sale_id);
				        	$this->db->update('sale',$Update2);
		        			$this->session->set_flashdata('success', 'Payment made successfully.');
				        }
				        else{
				        	$Update2['status'] = '3';
				        	$Update2['tracking_status'] = 'cancelled';
				        	$Update2['card_payment_status'] = 'unpaid';
				        	$this->db->update('sale',$Update2);
				        	
				        	$this->db->where('sale_id',$sale_id);
				        	$this->db->update('sale_items',array("status","cancelled"));
		        			$this->session->set_flashdata('failure', 'Payment Not Made.');
				        }
					}

					$mobile = str_replace('+', '', $user['phone']);
					$mobile = preg_replace('/-/', '', $mobile, 1);
					$mobile = preg_replace('/=/', '', $mobile, 1);
					$mobile = preg_replace('/00/', '', $mobile, 2);
					$mobile = preg_replace('/0/', '92', $mobile, 1);
					$sms_setting = $this->model->sms_setting();
					$ch = curl_init();
					$mask = urlencode($sms_setting['mask']);
					$pass = urlencode($sms_setting['password']);
					$id = urlencode($sms_setting['username']);
					$msg = urlencode($sms_setting['order_msg']);
					/*curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec($ch);
					curl_close ($ch);*/
					file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");


					if (strlen($user['email']) > 3) {
						$to = $user['email'];
						$subject = 'Order Submit | easydoor.pk';
						$message = $sms_setting['order_msg'];
						$from = EMAIL_FROM;
						$headers = ''; 
					    $headers .= "From: ".$from."" ."\r\n" .
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						$headers .= "X-Priority: 3\r\n";
						$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
						mail($to, $subject, $message, $headers);
					}

					$mobile = str_replace('+', '', '923455555613');
					$mobile = preg_replace('/-/', '', $mobile, 1);
					$mobile = preg_replace('/=/', '', $mobile, 1);
					$mobile = preg_replace('/00/', '', $mobile, 2);
					$mobile = preg_replace('/0/', '92', $mobile, 1);
					$sms_setting = $this->model->sms_setting();
					$ch = curl_init();
					$mask = urlencode($sms_setting['mask']);
					$pass = urlencode($sms_setting['password']);
					$id = urlencode($sms_setting['username']);
					$msg = urlencode('new order on easydoor.pk.');
					/*curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$server_output = curl_exec($ch);
					curl_close ($ch);*/
					file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");

					$from = 'sale@easydoor.pk';
					$to = 'sale@easydoor.pk';
					$subject = 'Order Submitted';
					$message = 'new order on easydoor.pk.';
					$headers = '';
				    $headers .= "From: ".$from."" ."\r\n" .
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "X-Priority: 3\r\n";
					$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
					mail($to, $subject, $message, $headers);

					echo json_encode(array("status"=>true,"msg"=>"order submitted successfully, will contact back you very soon"));
				}
				else{
					echo json_encode(array("msg"=>'login first'));
				}
			}
			else{
				echo json_encode(array("msg"=>'lanat teri zindgi te'));
			}
		}
		else{
			echo json_encode(array("msg"=>'zero item in your cart'));
		}
	}
	/**
	*

		@AJAX

	*
	*/
	public function get_listting()
	{
		if ($_POST) {
			$data = $this->model->get_listting_filtters($_POST);
			$html = '';
			if ($data['products']) {
				foreach ($data['products'] as $key => $q) {
					$uploadsUrl = UPLOADS_PRO.$q['category_id'].'/';
					$ProUrl = BASEURL.'product/'.$q['slug'].'-'.$q['product_id'];
					$html .= '<div class="column" onclick="window.location.href = \''.$ProUrl.'\';" style="cursor: pointer;">';
						$html .= '<div class="img-box">';
							$ProImage = $q['product_image'];
							if (strlen($q['color_images']) > 10) {
								$ColorImages = explode(',', $q['color_images']);
								foreach ($ColorImages as $keyCI => $ColorImage) {
	                                $colorImage = explode('-', $ColorImage);
	                                if ($colorImage[0] == $_POST['ColorID'] && strlen($ColorImage) > 4) {
	                                	$ProImage = $ColorImage;
	                                	break;
	                                }
	                            }
							}
							$html .= '<a href="'.BASEURL.'product/'.$q['slug'].'-'.$q['product_id'].'"><img src="'.$uploadsUrl.$ProImage.'" alt="'.$q['product_name'].'"></a>';
							if ($q['new'] == 'yes') {
								$html .= '<span class="offer">New</span>';
							}
							if ($q['sale_percentage'] > 0){
								$html .= '<span class="discount">';
									$html .= '<img src="'.IMG.'img172.png" alt="image">';
									$html .= '<span class="discount-text"> '.$q['sale_percentage'].'%<br><em>off</em></span>';
								$html .= '</span>';
							}
						$html .= '</div><!-- /img-box -->';
						$html .= '<span class="heading">'.$q['product_name'].'</span>';
						$html .= '<div class="price-box">';
							$html .= '<div class="p-box">';
								if ($q['sale_percentage'] > 0){
									$html .= '<span class="new">Rs. '.$q['price'].'</span>';
									$html .= '<span class="old">Rs. '.($q['price']+$q['discount']).'</span>';
								}
								else{
									$html .= '<span class="new">Rs. '.$q['price'].'</span>';
								}
							$html .= '</div>';
							if ($q['reviews'] > 0) {
								$html .= '<div class="rating-holder">';
									$html .= '<fieldset class="rating">';
										if ($q['ratting'] == '5' || $q['ratting'] > '4.5') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star5'.$q['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['review_id'].'" title="Awesome - 5 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star5'.$q['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['review_id'].'" title="Awesome - 5 stars"></label>';
										}
										if ($q['ratting'] == '4.5' || $q['ratting'] > '4') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star4half'.$q['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['review_id'].'" title="Pretty good - 4.5 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star4half'.$q['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['review_id'].'" title="Pretty good - 4.5 stars"></label>';
										}
										if ($q['ratting'] == '4' || $q['ratting'] > '3.5') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star4'.$q['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['review_id'].'" title="Pretty good - 4 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star4'.$q['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['review_id'].'" title="Pretty good - 4 stars"></label>';
										}
										if ($q['ratting'] == '3.5' || $q['ratting'] > '3') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star3half'.$q['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['review_id'].'" title="Meh - 3.5 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star3half'.$q['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['review_id'].'" title="Meh - 3.5 stars"></label>';
										}
										if ($q['ratting'] == '3' || $q['ratting'] > '2.5') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star3'.$q['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['review_id'].'" title="Meh - 3 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star3'.$q['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['review_id'].'" title="Meh - 3 stars"></label>';
										}
										if ($q['ratting'] == '2.5' || $q['ratting'] > '2') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star2half'.$q['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star2half'.$q['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
										}
										if ($q['ratting'] == '2' || $q['ratting'] > '1.5') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star2'.$q['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['review_id'].'" title="Kinda bad - 2 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star2'.$q['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['review_id'].'" title="Kinda bad - 2 stars"></label>';
										}
										if ($q['ratting'] == '1.5' || $q['ratting'] > '1') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star1half'.$q['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['review_id'].'" title="Meh - 1.5 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star1half'.$q['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['review_id'].'" title="Meh - 1.5 stars"></label>';
										}
										if ($q['ratting'] == '1' || $q['ratting'] > '0.5') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star1'.$q['review_id'].'" value="1" required="required"/><label class = "full" for="star1'.$q['review_id'].'" title="Sucks big time - 1 star"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="star1'.$q['review_id'].'" value="1" required="required"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
										}
										if ($q['ratting'] == '0.5' || $q['ratting'] > '0') {
									    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="starhalf'.$q['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
										}
										else{
									    	$html .= '<input type="radio" readonly="readonly" id="starhalf'.$q['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf'.$q['review_id'].'" title="Sucks big time - 0.5 stars"></label>';
										}
									$html .= '</fieldset>';
									$html .= '<em>('.$q['reviews'].')</em>';
								$html .= '</div><!-- /rating-holder -->';
							}
							if (strlen($q['BrandImage']) > 4) {
								$html .= '<img src="'.UPLOADS_CAT.$q['BrandImage'].'" alt="image" class="brand-logo">';
							}
						$html .= '</div><!-- /price-box -->';
						$html .= '<a class="add-cart" href="'.BASEURL.'product/'.$q['slug'].'-'.$q['product_id'].'">Add to Cart</a>';
						$html .= '<div class="overlay">';
							$html .= '<a href="'.BASEURL.'product/'.$q['slug'].'-'.$q['product_id'].'">';
								$html .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
								$html .= 'Add to Cart';
							$html .= '</a>';
						$html .= '</div><!-- /overlay -->';
					$html .= '</div><!-- /column -->';
				}
				if ($data['pages']) {
					$pages = '';
					for ($i=1; $i <= $data['pages']; $i++) { 
						$pages .= '<li><a href="javascript://" class="deal-page-number" data-page="'.$i.'">'.$i.'</a></li>';
					}
				}
				echo json_encode(array("status"=>true,"html"=>$html,"pages"=>$pages));
			}
			else{
				$html = '<p class="alert alert-warning">No product found.</p>';
				echo json_encode(array("status"=>false,"html"=>$html,"pages"=>false));
			}
		}
	}
	public function get_brand_pros_bycat()
	{
		$Products = $this->model->get_products_by_brand_cat($_POST['cat'],$_POST['brand']);
		$html = '';
		if ($Products) {
			foreach ($Products as $key => $q) {
				$ProUrl = BASEURL.'product/'.$q['slug'].'-'.$q['product_id'];
				$html .= '<div class="column" onclick="window.location.href = \''.$ProUrl.'\';" style="cursor: pointer;">';
					$html .= '<div class="img-box">';
						$ProImage = $q['product_image'];
						$html .= '<a href="'.BASEURL.'product/'.$q['slug'].'-'.$q['product_id'].'"><img src="'.UPLOADS_PRO.$q['category_id'].'/'.$ProImage.'" alt="'.$q['product_name'].'"></a>';
						if ($q['new'] == 'yes') {
							$html .= '<span class="offer">New</span>';
						}
					$html .= '</div><!-- /img-box -->';
					$html .= '<span class="heading">'.$q['product_name'].'</span>';
					$html .= '<div class="price-box">';
						$html .= '<div class="p-box">';
							if ($q['sale_percentage'] > 0){
								$html .= '<span class="new">Rs. '.$q['price'].'</span>&nbsp;&nbsp;';
								$html .= '<span class="old">'.($q['price']+$q['discount']).'</span>';
							}
							else{
								$html .= '<span class="new">Rs. '.$q['price'].'</span>';
							}
						$html .= '</div>';
					$html .= '</div><!-- /price-box -->';
					$html .= '<a class="add-cart" href="'.BASEURL.'product/'.$q['slug'].'-'.$q['product_id'].'">Add to Cart</a>';
				$html .= '</div><!-- /column -->';
			}
			$count = count($Products)." product(s) found";
			echo json_encode(array("status"=>true,"html"=>$html,"count"=>$count));
		}
		else{
			$count = "";
			$html = '<p class="alert alert-warning">No product found.</p>';
			echo json_encode(array("status"=>false,"html"=>$html,"count"=>$count));
		}
	}
	public function submit_review()
	{
		if ($_SESSION['user'] && $_POST) {
			parse_str($_POST['data'],$post);
			$check = $this->model->get_row("SELECT `review_id` FROM `review` WHERE `user_id` = '".$post['user_id']."' AND `product_id` = '".$post['product_id']."';");
			if ($check) {
				echo json_encode(array("status"=>false,"msg"=>"your comment is already sumitted for this product"));
			}
			else{
				$reload = $post['reload'];
				unset($post['reload']);
				$this->db->insert('review',$post);
				$review_pages = $this->model->get_row("SELECT COUNT(`review_id`) AS count FROM `review` WHERE `product_id` = '".$post['product_id']."' AND `status` = 'active';");
				$reviews = $this->model->review($post['product_id'],$review_pages['count'],1);
				$html = '';
				if ($reviews) {
					foreach ($reviews as $key => $q) {
						$html .= '<li>';
							$html .= '<div class="left-box">';
								$html .= '<div class="top-box">';
									$html .= '<strong>'.$q['title'].'</strong>';
									$html .= '<span class="verify"><img src="'.IMG.'img134.png" alt="image"> verified purchese</span>';
									if (strlen($q['fname']) > 0 || strlen($q['fname']) > 0) {
										$html .=  '<strong>'.$q['fname'].' '.$q['lname'].'</strong>';
									}
									else{
										$html .=  '<strong>user</strong>';
									}
								$html .= '</div>';
								$html .= '<p>'.$q['comment'].'</p>';
							$html .= '</div>';
							$html .= '<div class="right_box">';
								$html .= '<span class="date">'.date('d M, Y',strtotime($q['at'])).'</span>';
								$html .= '<fieldset class="rating">';
								    if ($q['ratting'] == '5' || $q['ratting'] > '4.5') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star5'.$q['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['review_id'].'" title="Awesome - 5 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star5'.$q['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['review_id'].'" title="Awesome - 5 stars"></label>';
									}
									if ($q['ratting'] == '4.5' || $q['ratting'] > '4') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star4half'.$q['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['review_id'].'" title="Pretty good - 4.5 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star4half'.$q['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['review_id'].'" title="Pretty good - 4.5 stars"></label>';
									}
									if ($q['ratting'] == '4' || $q['ratting'] > '3.5') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star4'.$q['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['review_id'].'" title="Pretty good - 4 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star4'.$q['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['review_id'].'" title="Pretty good - 4 stars"></label>';
									}
									if ($q['ratting'] == '3.5' || $q['ratting'] > '3') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star3half'.$q['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['review_id'].'" title="Meh - 3.5 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star3half'.$q['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['review_id'].'" title="Meh - 3.5 stars"></label>';
									}
									if ($q['ratting'] == '3' || $q['ratting'] > '2.5') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star3'.$q['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['review_id'].'" title="Meh - 3 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star3'.$q['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['review_id'].'" title="Meh - 3 stars"></label>';
									}
									if ($q['ratting'] == '2.5' || $q['ratting'] > '2') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star2half'.$q['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star2half'.$q['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
									}
									if ($q['ratting'] == '2' || $q['ratting'] > '1.5') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star2'.$q['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['review_id'].'" title="Kinda bad - 2 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star2'.$q['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['review_id'].'" title="Kinda bad - 2 stars"></label>';
									}
									if ($q['ratting'] == '1.5' || $q['ratting'] > '1') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star1half'.$q['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['review_id'].'" title="Meh - 1.5 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star1half'.$q['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['review_id'].'" title="Meh - 1.5 stars"></label>';
									}
									if ($q['ratting'] == '1' || $q['ratting'] > '0.5') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star1'.$q['review_id'].'" value="1" required="required"/><label class = "full" for="star1'.$q['review_id'].'" title="Sucks big time - 1 star"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="star1'.$q['review_id'].'" value="1" required="required"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
									}
									if ($q['ratting'] == '0.5' || $q['ratting'] > '0') {
								    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="starhalf'.$q['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
									}
									else{
								    	$html .= '<input type="radio" readonly="readonly" id="starhalf'.$q['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf'.$q['review_id'].'" title="Sucks big time - 0.5 stars"></label>';
									}
								$html .= '</fieldset>';
								$html .= '<div class="share-box">';
									$html .= '<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>';
									$html .= '<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>';
								$html .= '</div><!-- /share-box -->';
							$html .= '</div><!-- /right_box -->';
						$html .= '</li>';
					}
				}
				/*$ratting = $this->model->get_row("SELECT AVG(`ratting`) AS ratting FROM `review` WHERE `product_id` = '".$post['product_id']."';");
				$this->db->query("UPDATE `products` SET `reviews`=`reviews`+1, `ratting` = '".$ratting['ratting']."' WHERE `product_id` = ".$post['product_id']."");*/
				echo json_encode(array("status"=>true,"msg"=>"thank you for submition review, review will post after admin approval.","html"=>$html,"reload"=>$reload));
			}
		}
	}
	public function get_review_ajax()
	{
		if ($_POST) {
			$review_pages = $this->model->get_row("SELECT COUNT(`review_id`) AS count FROM `review` WHERE `product_id` = '".$_POST['product_id']."' AND `status` = 'active';");
			$reviews = $this->model->review($_POST['product_id'],$review_pages['count'],$_POST['page']);
			$html = '';
			if ($reviews) {
				foreach ($reviews as $key => $q) {
					$html .= '<li>';
						$html .= '<div class="left-box">';
							$html .= '<div class="top-box">';
								$html .= '<strong>'.$q['title'].'</strong>';
								$html .= '<span class="verify"><img src="'.IMG.'img134.png" alt="image"> verified purchese</span>';
								if (strlen($q['fname']) > 0 || strlen($q['fname']) > 0) {
									$html .=  '<strong>'.$q['fname'].' '.$q['lname'].'</strong>';
								}
								else{
									$html .=  '<strong>user</strong>';
								}
							$html .= '</div>';
							$html .= '<p>'.$q['comment'].'</p>';
						$html .= '</div>';
						$html .= '<div class="right_box">';
							$html .= '<span class="date">'.date('d M, Y',strtotime($q['at'])).'</span>';
							$html .= '<fieldset class="rating">';
							    if ($q['ratting'] == '5' || $q['ratting'] > '4.5') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star5'.$q['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['review_id'].'" title="Awesome - 5 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star5'.$q['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['review_id'].'" title="Awesome - 5 stars"></label>';
								}
								if ($q['ratting'] == '4.5' || $q['ratting'] > '4') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star4half'.$q['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['review_id'].'" title="Pretty good - 4.5 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star4half'.$q['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['review_id'].'" title="Pretty good - 4.5 stars"></label>';
								}
								if ($q['ratting'] == '4' || $q['ratting'] > '3.5') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star4'.$q['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['review_id'].'" title="Pretty good - 4 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star4'.$q['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['review_id'].'" title="Pretty good - 4 stars"></label>';
								}
								if ($q['ratting'] == '3.5' || $q['ratting'] > '3') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star3half'.$q['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['review_id'].'" title="Meh - 3.5 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star3half'.$q['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['review_id'].'" title="Meh - 3.5 stars"></label>';
								}
								if ($q['ratting'] == '3' || $q['ratting'] > '2.5') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star3'.$q['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['review_id'].'" title="Meh - 3 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star3'.$q['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['review_id'].'" title="Meh - 3 stars"></label>';
								}
								if ($q['ratting'] == '2.5' || $q['ratting'] > '2') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star2half'.$q['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star2half'.$q['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
								}
								if ($q['ratting'] == '2' || $q['ratting'] > '1.5') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star2'.$q['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['review_id'].'" title="Kinda bad - 2 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star2'.$q['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['review_id'].'" title="Kinda bad - 2 stars"></label>';
								}
								if ($q['ratting'] == '1.5' || $q['ratting'] > '1') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star1half'.$q['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['review_id'].'" title="Meh - 1.5 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star1half'.$q['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['review_id'].'" title="Meh - 1.5 stars"></label>';
								}
								if ($q['ratting'] == '1' || $q['ratting'] > '0.5') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="star1'.$q['review_id'].'" value="1" required="required"/><label class = "full" for="star1'.$q['review_id'].'" title="Sucks big time - 1 star"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="star1'.$q['review_id'].'" value="1" required="required"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
								}
								if ($q['ratting'] == '0.5' || $q['ratting'] > '0') {
							    	$html .= '<input type="radio" readonly="readonly" checked="checked" id="starhalf'.$q['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
								}
								else{
							    	$html .= '<input type="radio" readonly="readonly" id="starhalf'.$q['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf'.$q['review_id'].'" title="Sucks big time - 0.5 stars"></label>';
								}
							$html .= '</fieldset>';
							$html .= '<div class="share-box">';
								$html .= '<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>';
								$html .= '<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>';
							$html .= '</div><!-- /share-box -->';
						$html .= '</div><!-- /right_box -->';
					$html .= '</li>';
				}
				echo json_encode(array("status"=>true,"html"=>$html));
			}
		}
	}
	public function add_wishlist()
	{
		if ($_POST && $_SESSION['user']) {
			$check = $this->model->get_row("SELECT * FROM `wishlist` WHERE `user_id` = '".$_SESSION['user']['customer_id']."'  AND `product_id` = '".$_POST['id']."'  AND `status` = 'active';");
			if ($check) {
				echo json_encode(array("status"=>true));
			}
			else{
				$post['user_id'] = $_SESSION['user']['customer_id'];
				$post['product_id'] = $_POST['id'];
				$resp = $this->db->insert('wishlist',$post);
				if ($resp) {
					echo json_encode(array("status"=>true));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"not saved, please try again or reload your web page."));
				}
			}
		}
	}

	public function get_search_ajax()
	{
		if (strlen($_POST['key']) > 0) {
			$key = $_POST['key'];
			$html = '';
			$products = $this->model->get_results("SELECT `product_id` AS 'id',`slug`,`product_name` FROM `products` WHERE `product_name` LIKE '%$key%' ORDER BY `product_name` ASC LIMIT 10;");
			if ($products) {
				foreach ($products as $key00 => $pro) {
					//$html .= '<li><a href="'.BASEURL.'search/?type=product&key='.$key.'&ref='.$pro['id'].'">'.$pro['product_name'].'</a></li>';
					$html .= '<li><a href="'.BASEURL.'search/?type=product&key='.urlencode($pro['product_name']).'&ref='.$pro['id'].'">'.$pro['product_name'].'</a></li>';
				}
				echo json_encode(array("status"=>true,"html"=>$html));
			}
			else{
				$brands = $this->model->get_results("
					SELECT b.brand_id,b.slug,b.title,b.categories 
					FROM `brand` AS b 
					WHERE b.title LIKE '%$key%' 
					ORDER BY b.title ASC 
					LIMIT 10;
				");
				if ($brands) {
					$final = array();
					$count = 0;
					foreach ($brands as $key1 => $brand) {
						//$html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.urlencode($key).'&ref='.$brand['brand_id'].'&title='.urlencode($brand['title']).'&tag=">'.$brand['title'].'</a></li>';
						$html .= '<li><a href="'.BASEURL.'brand/'.$brand['slug'].'-'.$brand['brand_id'].'">'.$brand['title'].'</a></li>';
						$count++;
						if (strlen($brand['categories']) > 0) {
							$categories = explode(',', $brand['categories']);
							foreach ($categories as $key2 => $CatID) {
								$cat = $this->model->get_row("SELECT `title`,`slug`,`id`,`tags` FROM `categories` WHERE `id` = '$CatID';");
								if (strlen($cat['tags']) > 0) {
									$tags = explode(',', $cat['tags']);
									for ($i=0; $i < count($tags); $i++) {
										// $html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.$key.'&ref='.$brand['brand_id'].'&title='.$brand['title'].' '.$tags[$i].'&tag='.$tags[$i].'&cref='.$CatID.'">'.$brand['title'].' - '.$tags[$i].'</a></li>';
										$html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.urlencode($key).'&ref='.$brand['brand_id'].'&title='.urlencode($brand['title']).' '.$tags[$i].'&tag='.$tags[$i].'&cref='.$CatID.'">'.$tags[$i].'</a></li>';
										$count++;
									}
								}
							}
						}
						else{
							//$html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.urlencode($key).'&ref='.$brand['brand_id'].'&title='.urlencode($brand['title']).'&tag=">'.$brand['title'].'</a></li>';
							//$html .= '<li><a href="'.BASEURL.'brand/'.$brand['slug'].'">'.$brand['title'].'</a></li>';
							//$count++;
						}
					}
					echo json_encode(array("status"=>true,"html"=>$html));
				}
				else{
					$cats = $this->model->get_results("SELECT `title`,`slug`,`id`,`tags` FROM `categories` WHERE `title` LIKE '$key%' ORDER BY `title` ASC LIMIT 10;");
					if ($cats) {
						$final = array();
						$count = 0;
						foreach ($cats as $key3 => $cat) {
							$tags = explode(',', $cat['tags']);
							foreach ($tags as $key4 => $tag) {
								if (strlen($tag) > 1) {
									// $html .= '<li><a href="'.BASEURL.'search/?type=category&key='.$key.'&ref='.$cat['id'].'&title='.$cat['title'].' '.$tag.'&tag='.$tag.'">'.$cat['title'].' - '.$tag.'</a></li>';
									$html .= '<li><a href="'.BASEURL.'search/?type=category&key='.urlencode($key).'&ref='.$cat['id'].'&title='.$tag.'&tag='.$tag.'">'.$tag.'</a></li>';
								}
								else{
									$html .= '<li><a href="'.BASEURL.'search/?type=category&key='.urlencode($key).'&ref='.$cat['id'].'&title='.urlencode($cat['title']).'&tag='.$tag.'">'.$cat['title'].'</a></li>';
								}
								$count++;
							}
						}						
						echo json_encode(array("status"=>true,"html"=>$html));
					}
					else{

						$cats = $this->model->get_results("SELECT `title`,`slug`,`id`,`tags` FROM `categories` WHERE `tags` LIKE '$key%' OR `tags` LIKE '%,$tags%' ORDER BY `title` ASC LIMIT 10;");
						if ($cats) {
							$final = array();
							$count = 0;
							foreach ($cats as $key3 => $cat) {
								$tags = explode(',', $cat['tags']);
								foreach ($tags as $key4 => $tag) {
									if (strpos($tag, $key) !== false) {
										//$html .= '<li><a href="'.BASEURL.'search/?type=category&key='.$key.'&ref='.$cat['id'].'&title='.$cat['title'].' '.$tag.'&tag='.$tag.'">'.$cat['title'].' - '.$tag.'</a></li>';
										$html .= '<li><a href="'.BASEURL.'search/?type=category&key='.urlencode($key).'&ref='.$cat['id'].'&title='.$tag.'&tag='.$tag.'">'.$tag.'</a></li>';
										$count++;
									}
								}
							}						
							echo json_encode(array("status"=>true,"html"=>$html));
						}
						else{
							echo json_encode(array("status"=>false));
						}

					}
				}
			}
		}
		else{
			echo json_encode(array("status"=>false));
		}
	}
	public function update_user_address()
	{
		$user = $_SESSION['user'];
		if ($_POST) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('user_address_id',$id);
			$resp = $this->db->update('user_address',$post);
			if ($resp) {
				$html2 = '';
				$html = '';
				$data = $this->model->user_addresses($user['customer_id']);
				foreach ($data as $key => $location) {
					$html .= '<tr id="user-address-'.$location['user_address_id'].'">';
						$html .= '<td>'.$location['receiver_name'].'</td>';
						//$html .= '<td>'.$location['house_no'].','.$location['socity'].'</td>';
						$html .= '<td>'.$location['house_no'].'</td>';
						$html .= '<td>'.$location['city'].'</td>';
						$html .= '<td>'.$location['receiver_mobile'].'</td>';
						$html .= '<td class="last">';
							$html .= '<a href="javascript://" class="user-address-edit" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'"  data-title="'.$location['title'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-pincode="'.$location['pincode'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">';
								$html .= '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
								$html .= 'edit';
							$html .= '</a>';
						$html .= '</td>';
					$html .= '</tr>';

					$html2 .= '<tr>';
						$html2 .= '<td><strong>'.$location['title'].'</strong></td>';
						$html2 .= '<td>'.$location['receiver_name'].'</td>';
						//$html2 .= '<td>'.$location['house_no'].','.$location['socity'].'</td>';
						$html2 .= '<td>'.$location['house_no'].'</td>';
						$html2 .= '<td>'.$location['city'].'</td>';
						$html2 .= '<td>'.$location['receiver_mobile'].'</td>';
						$html2 .= '<td>';
							$html2 .= '<button class="btn btn-success add-address-to-form" data-name="'.$location['receiver_name'].'" data-pincode="'.$location['pincode'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'"  data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">USE</button>';
							$html2 .= '<a href="javascript://" class="user-address-edit btn btn-info" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'"  data-title="'.$location['title'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-pincode="'.$location['pincode'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">';
								$html2 .= '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
								$html2 .= 'edit';
							$html2 .= '</a>';
						$html2 .= '</td>';
					$html2 .= '</tr>';
				}
				echo json_encode(array("status"=>true,"html"=>$html,"html2"=>$html2));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"try again please or reload your web page"));
			}
		}
	}
	//CARD
	public function get_single_card_ajax()
	{
		$user = $_SESSION['user'];
		$card = $this->model->get_row("SELECT * FROM `card` WHERE `card_id` = '".$_POST['id']."' AND `user_id` = '".$user['customer_id']."';");
		if ($card) {
			echo json_encode(array("status"=>true,"card"=>$card));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"no card found!"));
		}
	}
	public function submit_card()
	{
		$user = $_SESSION['user'];
		parse_str($_POST['data'],$post);
		$post['user_id'] = $user['customer_id'];
		$resp = $this->db->insert('card',$post);
		if ($resp) {
			$id = $this->db->insert_id();
			$card = $this->model->get_card_byid($id);		
			$cards = $this->model->get_cards($user['customer_id']);
			$html = '';
			foreach ($cards as $key => $card_) {
				if ($id == $card_['card_id']) {
					$checked = 'selected';
				}
				else{
					$checked = '';
				}
				if ($card_['type'] != 'none'){
					$html .= '<option '.$checked.' value="'.$card_['card_id'].'">'.$card_['name'].'('.$card_['company'].') - '.$card_['type'].'</option>';
				}
				else{
					$html .= '<option '.$checked.' value="'.$card_['card_id'].'">'.$card_['name'].'('.$card_['company'].')</option>';
				}
			}		
			echo json_encode(array("status"=>true,"card"=>$card,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>true,"msg"=>"not submitted, please try again or reload your web page."));
		}
	}
	/**
	*

		@FB/GOOGLE

	*
	*/
	/**
	*

		@CRONz

	*
	*/
	public function send_sms_to_customers()
	{
		$user = $this->model->get_row("SELECT * FROM `send_sms` WHERE `status` = '0';");
		if ($user) {
			$this->db->where('send_sms_id',$user['send_sms_id']);
			$this->db->update('send_sms',array("status"=>'1'));
			$mobile = str_replace('+', '', $user['phone']);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$sms_setting = $this->model->sms_setting();
			$ch = curl_init();
			$mask = urlencode($sms_setting['mask']);
			$pass = urlencode($sms_setting['password']);
			$id = urlencode($sms_setting['username']);
			$msg = urlencode($user['sms']);
			/*curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$server_output = curl_exec($ch);
			curl_close ($ch);*/
			file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
			$this->send_sms_to_customers();
		}
	}
	/**
	*

		@CITY/STATE/COUNTRY

	*
	*/
	public function get_state_html()
	{
		$states = $this->model->states($_POST['id']);
		if ($states) {
			$html = '<option value="">Select State</option>';
			foreach ($states as $key => $q) {
				$html .= '<option value="'.$q['state_id'].'">'.$q['name'].'</option>';
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"no state found according to selected country."));
		}
	}
	public function get_city_html()
	{
		$cities = $this->model->cities($_POST['id']);
		if ($cities) {
			$html = '<option value="">Select City</option>';
			foreach ($cities as $key => $q) {
				$html .= '<option value="'.$q['city_id'].'">'.$q['name'].'</option>';
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"no city found according to selected state."));
		}
	}



	/**
	*

		@ORDER NUMBER

	*
	*/
	protected function order_number()
	{
		date_default_timezone_set('Asia/Karachi');
		$lastOrder = $this->model->get_row("SELECT `sale_id`,`at` FROM `sale` ORDER BY `sale_id` DESC");
		$today = new DateTime();
		$lastDate = new DateTime($lastOrder['at']);
		$interval = $today->diff($lastDate);
		$hours = ($interval->format('%d')*24)+$interval->format('%h');
		if ($hours <= 4) {
			$a = array(5,7,9);
			$rand = array_rand($a,1);
			$id = $lastOrder['sale_id'] + $a[$rand];
		}
		else if ($hours <= 24) {
			$a = array(21,23,27);
			$rand = array_rand($a,1);
			$id = $lastOrder['sale_id'] + $a[$rand];
		}
		else {
			$days = round($hours/24);
			$id = $lastOrder['sale_id'] + $days;
		}
		return intval($id);
	}
	/**
	*

		@IMAGE RENAME

	*
	*/
	public function image_rename()
	{
		$product = $this->model->get_row("SELECT `product_id`,`product_image` FROM `products` WHERE `image_change` = 'no' ORDER BY `product_id` ASC;");
		rename (UPLOADS_TO."products/".$product['product_image'], UPLOADS_TO."products/easydoor-".$product['product_image']);
		$this->db->where('product_id',$product['product_id']);
		$this->db->update('products',array('product_image' =>"easydoor-".$product['product_image'], "image_change"=>"yes"));
		redirect();
	}
	/**
	*

		@TEST

	*
	*/
	public function test_send()
	{
		$_REQUEST['data'][0] = array(
			"product_id"=>7983,
			"qty"=>1,
			"price"=>127192,
			"total"=>127192,
			"size"=>'',
			"color"=>''
		);
		$_REQUEST['data'][1] = array(
			"product_id"=>7981,
			"qty"=>1,
			"price"=>94999,
			"total"=>94999,
			"size"=>'',
			"color"=>''
		);

		$json = json_encode($_REQUEST);
		echo $json;die;

		$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://admin.easydoor.pk/index.php/api/post_order?user_id=110&address_id=1&payment_method=cod&save_my_card=no&total_amount=222191&total_products=2&shipping_fee=200',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
	  		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;




		die;
		/*$_REQUEST['user_id'] = 1;
		$_REQUEST['address_id'] = 1;
		$_REQUEST['payment_method'] = 'cod';
		$_REQUEST['save_my_card'] = 'no';
		$_REQUEST['total_amount'] = '1500';
		$_REQUEST['total_products'] = '2';
		$_REQUEST['shipping_fee'] = '200';*/

		$_REQUEST['data'][0] = array(
			"product_id"=>3,
			"qty"=>4,
			"price"=>100,
			"total"=>400,
			"size"=>'',
			"color"=>''
		);
		$_REQUEST['data'][1] = array(
			"product_id"=>2,
			"qty"=>2,
			"price"=>550,
			"total"=>1100,
			"size"=>'',
			"color"=>''
		);

		$json = json_encode($_REQUEST);

		$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://localhost/MM/easy_door_admin/index.php/api/post_order/?user_id=1&address_id=1&payment_method=cod&save_my_card=no&total_amount=1500&total_products=2&shipping_fee=200',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
	  		),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}
	public function test()
	{
		//---------
		die;
		error_reporting(E_ALL);
		$mobile = str_replace('+', '', '923331022025');
		$mobile = preg_replace('/-/', '', $mobile, 1);
		$mobile = preg_replace('/=/', '', $mobile, 1);
		$mobile = preg_replace('/00/', '', $mobile, 2);
		$mobile = preg_replace('/0/', '92', $mobile, 1);
		$sms_setting = $this->model->sms_setting();
		$ch = curl_init();
		$mask = urlencode($sms_setting['mask']);
		$pass = urlencode($sms_setting['password']);
		$id = urlencode($sms_setting['username']);
		$msg = urlencode($sms_setting['order_msg']);

		$resp =file_get_contents("https://fastsmsalerts.com/api/composesms&id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");


		var_dump($resp);die;
		die;
		$query = $this->db->query("UPDATE `table` SET `count`=`count`+1 WHERE `id` = 1");
	}
	public function test_($arg = 0)
	{
		$cats = $this->model->get_all_cats();
		if ($arg == 1) {
			$fp = fopen('results.json', 'w');
			fwrite($fp, json_encode($cats));
			fclose($fp);
		}
		else{
			echo json_encode($cats);
		}
		
		/*$resp = $this->model->get_results("SELECT * FROM `test_` WHERE `city` = 'Reillyland';");
		echo json_encode($resp);*/
	}

}
