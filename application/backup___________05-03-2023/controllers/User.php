<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['user_panel'] = true;
		$data['settings'] = $this->model->get_settings();
		$data['cats'] = $this->model->get_cats();
		$this->load->view('user/header',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
	/**
	*

		@CUSTOMER

	*
	*/
	public function check_login()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!= "")
		{
			$user = $_SESSION['user'];
			$phone = $user['phone'];
			$password = $user['password'];
			if ($user['signup_type'] == 'facebook') {
				$id = $user['fb_id'];
				$resp = $this->model->get_row("SELECT * FROM `customer` WHERE `fb_id` = '$id'");
			}
			else{
				$resp = $this->model->get_row("SELECT * FROM `customer` WHERE `phone` = '$phone'  AND `password` =  '$password'");
			}
			if ($resp)
			{
				return $resp;
			}
			else
			{
				redirect('login');
			}
		}
		else 
		{
			redirect('login');
		}
	}

	public function change_password()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | Change Password';
		$data['manage_account_menu'] = 'show active';
		$data['manage_account_menu_true'] = 'true';
		$data['page_my_profile'] = 'active';
		$this->template('user/change_password',$data);
	}

	public function change_password_submit()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$data);
			if ($user['password'] == md5($data['password'])) {
				if ($data['new_password'] === $data['new_password_2']) {
					$update['password'] = md5($data['new_password']);
					$resp = $this->db->update('customer',$update);
					if ($resp) {
						$resp = $this->model->get_row("SELECT * FROM `customer` WHERE `phone` = '".$user['phone']."' AND `password` = '".$update['password']."';");
						$_SESSION['user'] = $resp;
						echo json_encode(array("status"=>true,"msg"=>"password changed"));
					}
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"your new password and repeat password not matched"));
				}
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"password changed"));
			}
			
		}
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
	


	/**
	*

		@CUSTOMER RELATE

	*
	*/
	public function index($value='')
	{
		$this->dashboard();
	}
	public function dashboard()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['orders'] = $this->model->user_orders($user['customer_id']);
		$data['last_address'] = $this->model->get_row("SELECT `house_no`,`receiver_mobile` FROM `user_location` WHERE `user_id` = '".$user['customer_id']."' ORDER BY `location_id` DESC;");
		$data['meta_title'] = 'Easy Door | User Dashboard';
		$data['manage_account_menu'] = 'show active';
		$data['manage_account_menu_true'] = 'true';
		$data['page_dashboard'] = 'active';
		$this->template('user/dashboard',$data);
	}
	public function my_profile()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Profile';
		$data['manage_account_menu'] = 'show active';
		$data['manage_account_menu_true'] = 'true';
		$data['page_my_profile'] = 'active';
		$data['countries'] = $this->model->countries();
		$data['states'] = $this->model->states($user['country_id']);
		$data['cities'] = $this->model->cities($user['state_id']);
		$this->template('user/my_profile',$data);
	}
	public function address_book()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		//$data['locations'] = $this->model->user_locations($user['customer_id']);
		$data['locations'] = $this->model->user_addresses($user['customer_id']);
		$data['socities'] = $this->model->get_socities();
		$data['countries'] = $this->model->countries();
		$data['states'] = $this->model->states($user['country_id']);
		$data['cities'] = $this->model->cities($user['state_id']);
		$data['meta_title'] = 'Easy Door | User Address Book';
		$data['manage_account_menu'] = 'show active';
		$data['manage_account_menu_true'] = 'true';
		$data['page_address_book'] = 'active';
		$this->template('user/address_book',$data);
	}
	public function my_orders()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Orders';
		$data['orders_menu'] = 'show active';
		$data['orders_menu_true'] = 'true';
		$data['page_my_orders'] = 'active';
		$data['orders'] = $this->model->user_orders($user['customer_id']);
		$this->template('user/my_orders',$data);
	}
	public function my_delivered()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Delivered';
		$data['orders_menu'] = 'show active';
		$data['orders_menu_true'] = 'true';
		$data['page_my_delivered'] = 'active';
		$data['orders'] = $this->model->user_orders($user['customer_id']);
		$this->template('user/my_delivered',$data);
	}
	public function my_cancellation()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Cancellations';
		$data['orders_menu'] = 'show active';
		$data['orders_menu_true'] = 'true';
		$data['page_my_cancellation'] = 'active';
		$data['orders'] = $this->model->user_orders($user['customer_id']);
		$this->template('user/my_cancellation',$data);
	}
	public function my_returns()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Returns';
		$data['orders_menu'] = 'show active';
		$data['orders_menu_true'] = 'true';
		$data['page_my_returns'] = 'active';
		$data['orders'] = $this->model->user_orders($user['customer_id']);
		$this->template('user/my_returns',$data);
	}

	public function my_reviews()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Reviews';
		$data['my_reviews_menu'] = 'show active';
		$data['my_reviews_menu_true'] = 'true';
		$data['page_my_reviews'] = 'active';
		$data['purchesed_products'] = $this->model->get_user_purchesed_products_for_review($user['customer_id']);
		//$data['purchesed_products'] = array_unique(array_map(function($elem){return $elem;}, $data['purchesed_products']));
		$this->template('user/my_reviews',$data);
	}
	public function my_wishlist()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Returns';
		$data['my_wishlist_menu'] = 'show active';
		$data['my_wishlist_menu_true'] = 'true';
		$data['page_my_wishlist'] = 'active';
		$data['wishlist'] = $this->model->wishlist($user['customer_id']);
		$this->template('user/my_wishlist',$data);
	}
	public function cards()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Cards';
		$data['cards_menu'] = 'show active';
		$data['cards_menu_true'] = 'true';
		$data['page_cards'] = 'active';
		$data['cards'] = $this->model->get_cards($user['customer_id']);
		$this->template('user/cards',$data);
	}
	public function add_card()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Add Card';
		$data['cards_menu'] = 'show active';
		$data['cards_menu_true'] = 'true';
		$data['page_add_card'] = 'active';
		$data['post_url'] = BASEURL.'user/post-card/';
		$data['mode'] = 'post';
		$this->template('user/add_card',$data);
	}
	public function edit_card($id)
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['q'] = $this->model->get_card_byid($id);
		$data['meta_title'] = 'Easy Door | User Edit Card';
		$data['cards_menu'] = 'show active';
		$data['cards_menu_true'] = 'true';
		$data['page_cards'] = 'active';
		$data['post_url'] = BASEURL.'user/update-card/'.$id.'/';
		$data['mode'] = 'edit';
		$this->template('user/add_card',$data);
	}
	public function vouchers()
	{
		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | User Vouchers Orders';
		$data['manage_account_menu'] = 'show active';
		$data['manage_account_menu_true'] = 'true';
		$data['page_vouchers'] = 'active';
		$data['orders'] = $this->model->get_vouchers_orders($user['customer_id']);
		$this->template('user/vouchers',$data);
	}
	/**
	*

		@ACTION

	*
	*/
	public function cancel_order()
	{
		$user = $this->check_login();
		$id = $_POST['id'];
		$this->db->query("UPDATE `sale` SET `status` = '3', `tracking_status` = 'cancelled' WHERE `sale_id` = '$id'");
		$userID = $user['customer_id'];
		$orders = $this->model->get_results("SELECT * FROM `sale` WHERE `user_id` = '$userID' AND `status` = '3' ORDER BY `sale_id` DESC;");
		$html = '';
		foreach ($orders as $key => $order) {
        	if ($order['tracking_status'] == 'cancelled') {
          		$SaleID = $order['sale_id'];
	            $html.= '<div class="user-order-holder">';
	            	$html.= '<div class="top-detail">';
	            		$html.= '<span class="order">';
	            			$html.= 'Order #'.$order['sale_id'];
	            		$html.= '</span>';
	            		$html.= '<span class="placed">Placed on '.date('d M, Y H:i',strtotime($order['at'])).'</span>';
	            		$html.= '<span class="total-product">Total Product:  '.$order['total_items'].'</span>';
	            		$html.= '<span class="total-price">Total Price:  '.$order['total_amount']+$order['delivery_charge']-$order['discount'].'</span>';
	            	$html.= '</div><!-- /top-detail -->';
	            	$html.= '<ul class="order-list">';
						$items = $this->db->query("
							SELECT p.product_image AS image, p.product_name AS Product, si.*  
							FROM `sale_items` AS si 
							INNER JOIN `products` AS p ON si.product_id = p.product_id 
							WHERE si.sale_id = '$SaleID' 
						");
						if ($items->num_rows()>0){
							foreach ($items->result_array() as $item) {
									$html.= '<li>';
			            			$html.= '<div class="img-holder">';
			            				$html.= '<img src="'.UPLOADS_PRO.$item['image'].'" alt="image">';
			            			$html.= '</div>';
			            			$html.= '<div class="product-detail_holder">';
			            				$html.= '<p>'.$item['Product'].' </p>';
			            				$html.= '<em>Qty: '.$item['qty'].'</em>';
			            			$html.= '</div>';
			            			$html.= '<div class="right-btns">';
			            				$html.= '<span class="p-holder">';
			            					$html.= 'Price:';
			            					$html.= '<br>';
			            					$html.= 'Rs: '.$item['total'];
			            				$html.= '</span>';
			            				$html.= '<span class="cancel">'.$item['status'].'</span>';
			            			$html.= '</div>';
			            		$html.= '</li>';
							}
						}
	            	$html.= '</ul><!-- /order-list -->';
	            $html.= '</div><!-- /user-order-holder -->';
        	}
      	}

      	$orders2 = $this->model->get_results("SELECT * FROM `sale` WHERE `user_id` = '$userID' AND `status` = '0' ORDER BY `sale_id` DESC;");
		$html2 = '';
		foreach ($orders2 as $key => $order) {
        	if ($order['tracking_status'] == 'pending') {
          		$SaleID = $order['sale_id'];
	            $html2 .= '<div class="user-order-holder">';
	            	$html2 .= '<div class="top-detail">';
	            		$html2 .= '<span class="order">';
	            			$html2 .= 'Order #'.$order['sale_id'];
	            		$html2 .= '</span>';
	            		$html2 .= '<span class="placed">Placed on '.date('d M, Y H:i',strtotime($order['at'])).'</span>';
	            		$html2 .= '<span class="total-product">Total Product:  '.$order['total_items'].'</span>';
	            		$html2 .= '<span class="total-price">Total Price:  '.$order['total_amount']+$order['delivery_charge']-$order['discount'].'</span>';
	            		$html2 .= '<button class="cancel-order-btn" data-id="'.$order['sale_id'].'">Cancel Order</button>';
	            	$html2 .= '</div><!-- /top-detail -->';
	            	$html2 .= '<ul class="order-list">';
						$items = $this->db->query("
							SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
							FROM `sale_items` AS si 
							INNER JOIN `products` AS p ON si.product_id = p.product_id 
							LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
							WHERE si.sale_id = '$SaleID' 
						");
						if ($items->num_rows()>0){
							foreach ($items->result_array() as $item) {
									$html2 .= '<li>';
			            			$html2 .= '<div class="img-holder">';
			            				$html2 .= '<img src="'.UPLOADS_PRO.$item['image'].'" alt="image">';
			            			$html2 .= '</div>';
			            			$html2 .= '<div class="product-detail_holder">';
			            				$html2 .= '<p>'.$item['Product'].' </p>';
			            				$html2 .= '<em>Qty: '.$item['qty'].'</em>';
			            			$html2 .= '</div>';
			            			$html2 .= '<div class="right-btns">';
			            				$html2 .= '<span class="p-holder">';
			            					$html2 .= 'Price:';
			            					$html2 .= '<br>';
			            					$html2 .= 'Rs: '.$item['total'];
			            				$html2 .= '</span>';
			            				if ($order['status'] == 0) {
			            					if ($item['status'] != 'cancelled' && $item['status'] != 'returned') {
			            						$html2 .= '<span class="cancel"><a href="javascript://" data-id="'.$item['sale_item_id'].'" class="btn btn-danger change-item-status">cancel item</a></span>';
			            					}
			            					else{
			            						$html2 .= '<span class="cancel">'.$item['status'].'</span>';
			            					}
			            				}
			            				else{
			            					$html2 .= '<span class="cancel">'.$item['status'].'</span>';
			            				}
			            			$html2 .= '</div>';
			            		$html2 .= '</li>';
							}
						}
	            	$html2 .= '</ul><!-- /order-list -->';
	            $html2 .= '</div><!-- /user-order-holder -->';
        	}
      	}

        echo json_encode(array("status"=>true,"data"=>$sale,"html"=>$html,"html2"=>$html2));

	}

	/**
	*

		@AJAX

	*
	*/
	public function delete_wish_list()
	{
		$user = $this->check_login();
		$this->db->where('wishlist_id', $_POST['id']);
		$this->db->where('user_id', $user['customer_id']);
		$resp = $this->db->delete('wishlist');
		if ($resp) {
			echo json_encode(array("status"=>true));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"not deleted, please try again or reload your web page"));
		}
	}
	public function update_profile()
	{
		$user = $this->check_login();
		parse_str($_POST['data'],$data);
		$check = $this->model->get_row("SELECT `phone` FROM `customer` WHERE `customer_id` != '".$user['customer_id']."' AND `phone` = '".$data['phone']."';");
		if ($check) {
			echo json_encode(array("status"=>false,"msg"=>"not updated, mobile is already in use please try other mobile number."));
		}
		else{
			$data['dob'] = date('Y-m-d', strtotime($data['dob']));
			$this->db->where('customer_id',$user['customer_id']);
			$resp = $this->db->update('customer',$data);
			if ($resp) {
				echo json_encode(array("status"=>true,"data"=>$data));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not updated, please try again or reload your web page."));
			}
		}
	}
	public function change_order_item_status()
    {
		$user = $this->check_login();

		$id = $_POST['id'];
		$userID = $user['customer_id'];
        $item = $this->model->get_row("SELECT * FROM `sale_items` WHERE `sale_item_id` = '$id';");
        $slaeID = $item['sale_id'];
        $sale = $this->model->get_row("SELECT * FROM `sale` WHERE `sale_id` = '$slaeID' AND `user_id` = '$userID';");

        if ($sale) {
	        $update['status'] = 'cancelled';
	        $this->db->where('sale_item_id',$_POST['id']);
	        $resp = $this->db->update('sale_items',$update);
	        if ($resp) {
                $saleUpdate['total_amount'] = $sale['total_amount'] - $item['total'];
                $saleUpdate['total_items'] = $sale['total_items'] - 1;
                if ($saleUpdate['total_items'] == 0) {
                    $saleUpdate['status'] = '3';
                    $saleUpdate['tracking_status'] = 'cancelled';
                    $saleUpdate['delivery_charge'] = 0;
                    $saleUpdate['total_amount'] = 0;
                }
                $this->db->where('sale_id',$slaeID);
                $this->db->update('sale',$saleUpdate);
        		$sale = $this->model->get_row("SELECT * FROM `sale` WHERE `sale_id` = '$slaeID' AND `user_id` = '$userID';");

        		$orders = $this->model->get_results("SELECT * FROM `sale` WHERE `user_id` = '$userID' AND `status` = '3' ORDER BY `sale_id` DESC;");
        		$html = '';
        		if ($orders) {
	        		foreach ($orders as $key => $order) {
		            	if ($order['tracking_status'] == 'cancelled') {
			          		$SaleID = $order['sale_id'];
				            $html.= '<div class="user-order-holder">';
				            	$html.= '<div class="top-detail">';
				            		$html.= '<span class="order">';
				            			$html.= 'Order #'.$order['sale_id'];
				            		$html.= '</span>';
				            		$html.= '<span class="placed">Placed on '.date('d M, Y H:i',strtotime($order['at'])).'</span>';
				            		$html.= '<span class="total-product">Total Product:  '.$order['total_items'].'</span>';
				            		$html.= '<span class="total-price">Total Price:  '.$order['total_amount']+$order['delivery_charge']-$order['discount'].'</span>';
				            	$html.= '</div><!-- /top-detail -->';
				            	$html.= '<ul class="order-list">';
	    							$items = $this->db->query("
	    								SELECT p.product_image AS image, p.product_name AS Product, si.*  
	    								FROM `sale_items` AS si 
	    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
	    								WHERE si.sale_id = '$SaleID' 
									");
									if ($items->num_rows()>0){
										foreach ($items->result_array() as $item) {
	  										$html.= '<li>';
						            			$html.= '<div class="img-holder">';
						            				$html.= '<img src="'.UPLOADS_PRO.$item['image'].'" alt="image">';
						            			$html.= '</div>';
						            			$html.= '<div class="product-detail_holder">';
						            				$html.= '<p>'.$item['Product'].' </p>';
						            				$html.= '<em>Qty: '.$item['qty'].'</em>';
						            			$html.= '</div>';
						            			$html.= '<div class="right-btns">';
						            				$html.= '<span class="p-holder">';
						            					$html.= 'Price:';
						            					$html.= '<br>';
						            					$html.= 'Rs: '.$item['total'];
						            				$html.= '</span>';
						            				$html.= '<span class="cancel">'.$item['status'].'</span>';
						            			$html.= '</div>';
						            		$html.= '</li>';
										}
									}
				            	$html.= '</ul><!-- /order-list -->';
				            $html.= '</div><!-- /user-order-holder -->';
		            	}
		          	}
        		}

	          	$orders2 = $this->model->get_results("SELECT * FROM `sale` WHERE `user_id` = '$userID' AND `status` = '0' ORDER BY `sale_id` DESC;");
        		$html2 = '';
        		if ($orders2) {
	        		foreach ($orders2 as $key => $order) {
		            	if ($order['tracking_status'] == 'pending') {
			          		$SaleID = $order['sale_id'];
				            $html2 .= '<div class="user-order-holder">';
				            	$html2 .= '<div class="top-detail">';
				            		$html2 .= '<span class="order">';
				            			$html2 .= 'Order #'.$order['sale_id'];
				            		$html2 .= '</span>';
				            		$html2 .= '<span class="placed">Placed on '.date('d M, Y H:i',strtotime($order['at'])).'</span>';
				            		$html2 .= '<span class="total-product">Total Product:  '.$order['total_items'].'</span>';
				            		$html2 .= '<span class="total-price">Total Price:  '.$order['total_amount']+$order['delivery_charge']-$order['discount'].'</span>';
				            		$html2 .= '<button class="cancel-order-btn" data-id="'.$order['sale_id'].'">Cancel Order</button>';
				            	$html2 .= '</div><!-- /top-detail -->';
				            	$html2 .= '<ul class="order-list">';
	    							$items = $this->db->query("
	    								SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
	    								FROM `sale_items` AS si 
	    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
	    								LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
	    								WHERE si.sale_id = '$SaleID' 
									");
									if ($items->num_rows()>0){
										foreach ($items->result_array() as $item) {
	  										$html2 .= '<li>';
						            			$html2 .= '<div class="img-holder">';
						            				$html2 .= '<img src="'.UPLOADS_PRO.$item['image'].'" alt="image">';
						            			$html2 .= '</div>';
						            			$html2 .= '<div class="product-detail_holder">';
						            				$html2 .= '<p>'.$item['Product'].' </p>';
						            				$html2 .= '<em>Qty: '.$item['qty'].'</em>';
						            			$html2 .= '</div>';
						            			$html2 .= '<div class="right-btns">';
						            				$html2 .= '<span class="p-holder">';
						            					$html2 .= 'Price:';
						            					$html2 .= '<br>';
						            					$html2 .= 'Rs: '.$item['total'];
						            				$html2 .= '</span>';
						            				if ($order['status'] == 0) {
						            					if ($item['status'] != 'cancelled' && $item['status'] != 'returned') {
						            						$html2 .= '<span class="cancel"><a href="javascript://" data-id="'.$item['sale_item_id'].'" class="btn btn-danger change-item-status">cancel item</a></span>';
						            					}
						            					else{
						            						$html2 .= '<span class="cancel">'.$item['status'].'</span>';
						            					}
						            				}
						            				else{
						            					$html2 .= '<span class="cancel">'.$item['status'].'</span>';
						            				}
						            			$html2 .= '</div>';
						            		$html2 .= '</li>';
										}
									}
				            	$html2 .= '</ul><!-- /order-list -->';
				            $html2 .= '</div><!-- /user-order-holder -->';
		            	}
		          	}
        		}

	            echo json_encode(array("status"=>true,"data"=>$sale,"html"=>$html,"html2"=>$html2));
	        }
	        else{
	            echo json_encode(array("status"=>false));
	        }
        }
    }
    public function post_photo_ajax($folder)
	{
		if ($_FILES){
			$config['upload_path'] = 'uploads/'.$folder.'/';
        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
        	if ($this->upload->do_upload('img'))
        	{
	        	$img = $this->upload->data()['file_name'];
	        	echo json_encode(array("status"=>true,"data"=>$img));
        	}
        	else{
        		#error
	        	echo json_encode(array("status"=>false));
        	}

		}
		else{
			redirect('logout');
		}
	}
	public function post_user_address()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$post);
			$post['user_id'] = $user['customer_id'];
			$resp = $this->db->insert('user_address',$post);
			if ($resp) {
				$html2 = '';
				$html = '';
				$data = $this->model->user_addresses($user['customer_id']);
				foreach ($data as $key => $location) {
					$html .= '<tr id="user-address-'.$location['user_address_id'].'">';
						$html .= '<td>'.$location['receiver_name'].'</td>';
						$html .= '<td>'.$location['house_no'].','.$location['Socity'].'</td>';
						$html .= '<td>'.$location['city'].'</td>';
						$html .= '<td>'.$location['receiver_mobile'].'</td>';
						$html .= '<td class="last">';
							$html .= '<a href="javascript://" class="user-address-edit" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'"  data-title="'.$location['title'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">';
								$html .= '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
								$html .= 'edit';
							$html .= '</a>';
						$html .= '</td>';
					$html .= '</tr>';

					$html2 .= '<tr>';
						$html2 .= '<td><strong>'.$location['title'].'</strong></td>';
						$html2 .= '<td>'.$location['receiver_name'].'</td>';
						$html2 .= '<td>'.$location['house_no'].','.$location['Socity'].'</td>';
						$html2 .= '<td>'.$location['city'].'</td>';
						$html2 .= '<td>'.$location['receiver_mobile'].'</td>';
						$html2 .= '<td>';
							$html2 .= '<button class="btn btn-success add-address-to-form" data-name="'.$location['receiver_name'].'" data-pincode="'.$location['pincode'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">USE</button>';
							$html2 .= '<a href="javascript://" class="user-address-edit btn btn-info" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'"  data-title="'.$location['title'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-pincode="'.$location['pincode'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">';
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
	public function post_card()
	{
		$user = $this->check_login();
		if ($_POST) {
			$_POST['user_id'] = $user['customer_id'];
			$resp = $this->db->insert('card',$_POST);
			if ($resp) {
				redirect('user/cards?error=0&msg=card submitted :)');
			}
			else{
				redirect('user/add-card?error=1&msg=not submitted please try again');
			}
		}
		else{
			redirect('logout');
		}
	}
	public function update_card()
	{
		$user = $this->check_login();
		if ($_POST) {
			$this->db->where('user_id',$user['customer_id']);
			$this->db->where('card_id',$_POST['id']);unset($_POST['id']);
			$resp = $this->db->update('card',$_POST);
			if ($resp) {
				redirect('user/cards?error=0&msg=card updated :)');
			}
			else{
				redirect('user/edit-card/'.$_POST['id'].'/?error=1&msg=not updated please try again');
			}
		}
		else{
			redirect('logout');
		}
	}
	public function update_user_address()
	{
		$user = $this->check_login();
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
						$html .= '<td>'.$location['house_no'].','.$location['socity'].'</td>';
						$html .= '<td>'.$location['city'].'</td>';
						$html .= '<td>'.$location['receiver_mobile'].'</td>';
						$html .= '<td class="last">';
							$html .= '<a href="javascript://" class="user-address-edit" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'"  data-title="'.$location['title'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-pincode="'.$location['pincode'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">';
								$html .= '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
								$html .= 'edit';
							$html .= '</a>';
						$html .= '</td>';
					$html .= '</tr>';

					$html2 .= '<tr>';
						$html2 .= '<td><strong>'.$location['title'].'</strong></td>';
						$html2 .= '<td>'.$location['receiver_name'].'</td>';
						$html2 .= '<td>'.$location['house_no'].','.$location['socity'].'</td>';
						$html2 .= '<td>'.$location['city'].'</td>';
						$html2 .= '<td>'.$location['receiver_mobile'].'</td>';
						$html2 .= '<td>';
							$html2 .= '<button class="btn btn-success add-address-to-form" data-name="'.$location['receiver_name'].'" data-pincode="'.$location['pincode'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">USE</button>';
							$html2 .= '<a href="javascript://" class="user-address-edit btn btn-info" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'"  data-title="'.$location['title'].'" data-mobile="'.$location['receiver_mobile'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-pincode="'.$location['pincode'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">';
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
	public function save_newsletter()
	{
		$user = $this->check_login();
		if ($user['newsletter'] == 'no') {
			$_POST['user_id'] = $user['customer_id'];
			$check = $this->model->get_row("SELECT `email` FROM `newsletter` WHERE `email` = '".$_POST['email']."';");
			if ($check) {
				echo json_encode(array("status"=>false,"msg"=>"this email already subscribed, please othere one"));
			}
			else{
				$resp = $this->db->insert('newsletter',$_POST);
				if ($resp) {
					$update['newsletter'] = 'yes';
					$this->db->where('customer_id',$user['customer_id']);
					$this->db->update('customer',$update);
					echo json_encode(array("status"=>true));
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"not sumitted, please try again"));
				}
			}
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"already subscribed"));
		}
	}
	public function get_order_detail_ajax()
	{
		$user = $this->check_login();
		if ($_POST) {
			$id = $_POST['id'];
			$user_id = $user['customer_id'];
			$sale = $this->model->get_row("SELECT * FROM `sale` WHERE `sale_id` = '$id' AND `user_id` = '$user_id';");
			if ($sale) {
				$location_id = $sale['location_id'];
				$location = $this->model->get_location_byid($location_id);
				$html = '<div class="address-detail">';
					$html .= '<h2>Address</h2>';
					$html .= '<p>';
						$html .= '<strong>address</strong>: '.$location['house_no'].' <br>';
						if (isset($location['socity']) && strlen($location['socity']) > 0) {
							$html .= '<strong>town</strong>: '.$location['socity'].' <br>';
						}
						if (isset($location['city']) && strlen($location['city']) > 0) {
							$html .= '<strong>city</strong>: '.$location['city'].' <br>';
						}
						if (isset($location['pincode']) && strlen($location['pincode']) > 0) {
							$html .= '<strong>postcode</strong>: '.$location['pincode'].' <br>';
						}
						$html .= '<strong>name</strong>: '.$location['receiver_name'].' <br>';
						$html .= '<strong>mobile</strong>: '.$location['receiver_mobile'].' <br>';
						if (isset($location['receiver_mobile']) && strlen($location['receiver_mobile']) > 2) {
							$html .= '<strong>email</strong>: '.$location['receiver_mobile'].' <br>';
						}
						$html .= '<strong>dated</strong>: '.date('d-m-Y H:i', strtotime($sale['at'])).'';
					$html .= '</p>';
				$html .= '</div><!-- /address-detail -->';
				$html .= '<table class="table table-bordered table-hover">';
					$html .= '<thead>';
						$html .= '<th>Product</th>';
						$html .= '<th>Price</th>';
						$html .= '<th>Qty</th>';
						$html .= '<th>Total</th>';
						$html .= '<th>Detail</th>';
						$html .= '<th>Status</th>';
					$html .= '</thead>';
					$html .= '<tbody>';
						$sale_items = $this->model->get_sale_items($id);
						foreach ($sale_items as $key => $q) {
							$html .= '<tr>';
								$html .= '<td>'.$q['product_name'].'</td>';
								$html .= '<td>'.$q['price'].'</td>';
								$html .= '<td>'.$q['qty'].'</td>';
								$html .= '<td>'.$q['total'].'</td>';
								$html .= '<td>';
									if (strlen($q['SizeName']) > 0) {
										$html .= '<p><strong>size:</strong> '.$q['SizeName'].'</p>';
									}
									if (strlen($q['ColorName']) > 0) {
										$html .= '<p><strong>color:</strong> '.$q['ColorName'].'</p>';
									}
								$html .= '</td>';
								$html .= '<td>'.$q['status'].'</td>';
							$html .= '</tr>';
						}
						$html .= '<tr>';
							$html .= '<td colspan="3" style="text-align:right;">Delivery Charge</td>';
							$html .= '<td colspan="3" style="text-align:left;">'.$sale['delivery_charge'].'</td>';
						$html .= '</tr>';
						$html .= '<tr>';
							$html .= '<td colspan="3" style="text-align:right;font-weight:bold;">Total</td>';
							$totalAmount = $sale['total_amount']+$sale['delivery_charge'];
							$html .= '<td colspan="3" style="text-align:left;">'.$totalAmount.'</td>';
						$html .= '</tr>';
					$html .= '</tbody>';
				$html .= '</table>';
				echo json_encode(array("status"=>true,"html"=>$html));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"something wrong with you :)"));
			}
		}
	}
	public function change_card_type()
	{
		$user = $this->check_login();

		$this->db->where('user_id',$user['customer_id']);
		$this->db->where('type',$_POST['type']);
		$resp2 = $this->db->update('card',array("type"=>'none'));

		$this->db->where('user_id',$user['customer_id']);
		$this->db->where('card_id',$_POST['id']);
		$resp = $this->db->update('card',array("type"=>$_POST['type']));
		
		echo json_encode(array("status"=>true));
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
