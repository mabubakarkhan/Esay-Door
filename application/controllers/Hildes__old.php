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
		$data['cats'] = $this->model->get_cats();
		$this->load->view('header',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
	/**
	*

		@CUSTOMER

	*
	*/
	public function signup()
	{
		$data['meta_title'] = 'Easy Door | Signup';
		$this->template('signup',$data);
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
		$_SESSION['url'] = 'index';
		redirect('index');
	}
	/**
	*

		@START

	*
	*/


	/**
	*

		@PAGES

	*
	*/
	public function about_us()
	{
		$_SESSION['url'] = 'index';
		$data['page'] = $this->model->get_page(2);
		$data['testimonials'] = $this->model->testimonials();
		$data['meta_title'] = 'Easy Door | About Us';
		$this->template('about_us',$data);	
	}
	public function contact_us()
	{
		$_SESSION['url'] = 'index';
		$data['meta_title'] = 'Easy Door | Contact Us';
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
			$data['meta_title'] = 'Easy Door | '.$data['blog']['title'];
			$this->template('blog_single',$data);
		}
		else{
			$_SESSION['url'] = 'blog';
			$data['meta_title'] = 'Easy Door | Blog';
			$data['blog'] = $this->model->blog();
			$this->template('blog',$data);
		}
	}

	/**
	*

		@CUSTOMER RELATE

	*
	*/
	public function index()
	{
		$data['meta_title'] = 'Easy Door';
		$_SESSION['url'] = 'index';
		$data['featured_products'] = $this->model->get_featured_products();
		$this->template('index',$data);
	}

	public function listing($slug)
	{
		$_SESSION['url'] = 'listing/'.$slug;
		$SlugUrl = explode('-', $slug);
		$cat = $SlugUrl[count($SlugUrl)-1];
		$data['cat'] = $this->model->get_cat_byid($cat);
		$data['meta_title'] = 'Easy Door | '.$data['cat']['title'].' | Listing';
		$data['products'] = $this->model->get_products($cat);
		$data['brands'] = $this->model->brands_listing_page($cat);
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `name` ASC;");
		$this->template('listing',$data);
	}
	public function search()
	{
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
		if ($CheckProduct == false) {
			if ($cat > 0) {
				$data['cat'] = $this->model->get_cat_byid($cat);
				$data['products'] = $this->model->get_products($cat);
				$data['brands'] = $this->model->brands_listing_page($cat);
			}
			else{
				$data['cat'] = false;
				$data['products'] = $this->model->get_products_by_brand($_GET['ref']);
				$data['brands'] = $this->model->get_related_brands($_GET['ref']);
				$data['brand'] = $this->model->get_row("SELECT * FROM `brand` WHERE `brand_id` = '".$_GET['ref']."';");
			}
		}
		else{
			$data['cat'] = $this->model->get_cat_byid($cat);
			$data['brands'] = $this->model->brands_listing_page($cat);
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
		$data['meta_title'] = 'Easy Door | '.$data['q']['product']['product_name'];
		$data['settings'] = $this->model->get_settings();
		$data['products_count_by_cat'] = $this->model->get_cat_product_count($data['q']['product']['category_id']);
		$data['return_policy'] = $this->model->get_page(4);
		$this->template('product',$data);
	}

	/**
	*

		@CART

	*
	*/
	public function add_to_cart()
	{
		if ($_POST) {
			$_POST['total'] = $_POST['price'] * $_POST['qty'];
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
			$data['cities'] = $this->model->get_cities();
			$data['delivery_charges'] = $this->model->delivery_charges();
			$data['delivery_charges_waive_off_limit'] = $this->model->delivery_charges_waive_off_limit();
			$data['delivery_information'] = $this->model->get_last_delivery_information_by_customer($_SESSION['user']['customer_id']);
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
					$html .= '<span class="heading">Pakage 1 of 2</span>';
					$html .= '<div class="box-detail">';
						$html .= '<span class="delivery-option">delivery option</span>';
						$html .= '<i class="fa fa-check-circle" aria-hidden="true"></i>';
						$html .= '<span class="price">Rs: 35</span>';
						$html .= '<span class="standard">Standard</span>';
						$html .= '<span class="get-by">Get by 1-3 Aug</span>';
					$html .= '</div>';
					$html .= '<div class="item-detail">';
						$html .= '<div class="left-box">';
							$html .= '<img src="'.UPLOADS_PRO.$cart['product']['product_image'].'" alt="'.$cart['product']['product_name'].'">';
							$html .= '<div class="text-box">';
								$html .= '<em>Side By Side</em>';
								$html .= '<span class="detail-heading">'.$cart['product']['product_name'].'</span>';
								$html .= '<em>Seller: '.$cart['product']['Brand'].'</em>';
							$html .= '</div>';
						$html .= '</div>';
						$html .= '<div class="price-box">';
							if ($cart['product']['new_price'] > 0){
								$html .= '<span class="new">Rs: '.$cart['product']['new_price'].'</span>';;
								$html .= '<span class="old">Rs: '.$cart['product']['price'].'</span>';
								$html .= '<span class="discount">-'.$cart['product']['sale_percentage'].'%</span>';
							}
							else{
								$html .= '<span class="new">Rs: '.$cart['product']['price'].'</span>';
							}
						$html .= '</div>';
						$html .= '<div class="qty-box">';
							$html .= '<span class="qty">Qty: '.$cart['cart']['qty'].'</span>';
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
				$TotalCart = 0;
				$DeliveryCharges = 0;
				$count = 0;
			}
			echo json_encode(array("status"=>true,"html"=>$html,"count"=>$count,"TotalCart"=>$TotalCart,"delivery_charges"=>$DeliveryCharges));
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
		if ($_POST) {
			if (isset($_SESSION['user']))
			{
				$user = $_SESSION['user'];
				parse_str($_POST['data1'], $data1);
				parse_str($_POST['data2'], $data2);
				require_once('application/libraries/stripe-php/init.php');
        		\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
		        
		        \Stripe\Charge::create ([
		                "amount" => 1500,
		                "currency" => "usd",
		                "source" => $data2['stripeToken'],
		                "description" => "sir ki payment" 
		        ]);
	        	$this->session->set_flashdata('success', 'Payment made successfully.');



				die;
		            
		             

				$location['user_id'] = $user['customer_id'];
				$location['pincode'] = $data1['pincode'];
				$location['house_no'] = $data1['house_no'];
				$location['receiver_name'] = $data1['receiver_name'];
				$location['receiver_mobile'] = $data1['receiver_mobile'];
				$location['socity_id'] = $data1['socity_id'];
				$location['city_id'] = $data1['city_id'];
				$this->db->insert('user_location',$location);
				$location_id = $this->db->insert_id();

				//$city = $this->model->get_city_byid($data1['city_id']);

				$cart['user_id'] = $user['customer_id'];
				$cart['location_id'] = $location_id;
				

				
				$cart['payment_method'] = $data2['payment_method'];
				$cart['total_amount'] = 0;
				// $cart['total_save'] = 0;
				$cart['total_items'] = 0;
				//$cart['total_rewards'] = 0;
				foreach ($_SESSION['cart'] as $key => $cart_) {
					$cart['total_amount'] = $cart['total_amount'] + $cart_['total'];
					//$cart['total_save'] = $cart['total_save'] + $cart_['save'];
					//$cart['total_rewards'] = $cart['total_rewards'] + $cart_['rewards'];
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

				$this->db->insert('sale',$cart);
				$sale_id = $this->db->insert_id();
				foreach ($_SESSION['cart'] as $k => $q) {
					$Product = $this->model->get_product_byid($q['id']);
					$item['sale_id'] = $sale_id;
					$item['product_id'] = $Product['product_id'];
					$item['product_name'] = $Product['product_name'];
					$item['qty'] = $q['qty'];
					if ($Product['new_price'] > 0) {
						$item['price'] = $Product['new_price'];
					}
					else{
						$item['price'] = $Product['price'];
					}
					$item['total'] = $q['total'];
					$item['size'] = $q['size_id'];
					$item['color'] = $q['color_id'];
					$this->db->insert('sale_items',$item);
				}

				unset($_SESSION['cart']);
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
			if ($data) {
				foreach ($data as $key => $q) {

					$html .= '<div class="column">';
						$html .= '<div class="img-box">';
							$html .= '<a href="'.BASEURL.'product/'.$q['slug'].'-'.$q['product_id'].'"><img src="'.UPLOADS_PRO.$q['product_image'].'" alt="'.$q['product_name'].'"></a>';
							if ($q['new'] == 'yes') {
								$html .= '<span class="offer">New</span>';
							}
						$html .= '</div><!-- /img-box -->';
						$html .= '<span class="heading">'.$q['product_name'].'</span>';
						$html .= '<div class="price-box">';
							$html .= '<div class="p-box">';
								if ($q['new_price'] > 0){
									$html .= '<span class="new">Rs. '.$q['new_price'].'</span>';
									$html .= '<span class="old">Rs. '.$q['price'].'</span>';
								}
								else{
									$html .= '<span class="new">Rs. '.$q['price'].'</span>';
								}
							$html .= '</div>';
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
						$html .= '</div><!-- /price-box -->';
						$html .= '<a class="add-cart" href="#">Add to Cart</a>';
						$html .= '<div class="overlay">';
							$html .= '<a href="#">';
								$html .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
								$html .= 'Add to Cart';
							$html .= '</a>';
						$html .= '</div><!-- /overlay -->';
					$html .= '</div><!-- /column -->';

				}
				echo json_encode(array("status"=>true,"html"=>$html));
			}
			else{
				$html = '<p class="alert alert-warning">No product found.</p>';
				echo json_encode(array("status"=>false,"html"=>$html));
			}
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
					$html .= '<li><a href="'.BASEURL.'search/?type=product&key='.$key.'&ref='.$pro['id'].'">'.$pro['product_name'].'</a></li>';
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
						$html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.$key.'&ref='.$brand['brand_id'].'&title='.$brand['title'].'&tag=">'.$brand['title'].'</a></li>';
						$count++;
						if (strlen($brand['categories']) > 0) {
							$categories = explode(',', $brand['categories']);
							foreach ($categories as $key2 => $CatID) {
								$cat = $this->model->get_row("SELECT `title`,`slug`,`id`,`tags` FROM `categories` WHERE `id` = '$CatID';");
								if (strlen($cat['tags']) > 0) {
									$tags = explode(',', $cat['tags']);
									for ($i=0; $i < count($tags); $i++) {
										$html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.$key.'&ref='.$brand['brand_id'].'&title='.$brand['title'].' '.$tags[$i].'&tag='.$tags[$i].'&cref='.$CatID.'">'.$brand['title'].' '.$tags[$i].'</a></li>';
										$count++;
									}
								}
							}
						}
						else{
							$html .= '<li><a href="'.BASEURL.'search/?type=brand&key='.$key.'&ref='.$brand['brand_id'].'&title='.$brand['title'].'&tag=">'.$brand['title'].'</a></li>';
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
									$html .= '<li><a href="'.BASEURL.'search/?type=category&key='.$key.'&ref='.$cat['id'].'&title='.$cat['title'].' '.$tag.'&tag='.$tag.'">'.$cat['title'].' '.$tag.'</a></li>';
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
		else{
			echo json_encode(array("status"=>false));
		}
	}
	/**
	*

		@TEST

	*
	*/
	public function test()
	{
		die;
		$query = $this->db->query('UPDATE `phase` SET `count`=`count`+1 WHERE `phase_id` = 1');
	}

}
