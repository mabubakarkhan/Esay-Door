<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

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
        $this->load->library('upload');
        if ($_SESSION['seller']['signup_step'] != 4 && $_SESSION['seller']['signup_step'] != 3) {
            redirect('seller-signup-step');
        }
        /*else if ($_SESSION['seller']['status'] != 'active') {
        	$this->account_msg();
        }*/
	}

	/**
	*

		@HATH NA LAIE

	*
	*/
	public function template($page = '', $data = '')
	{
		$data['user_panel'] = true;
		$data['cats'] = $this->model->get_cats();
        $data['BRAND'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$_SESSION['seller']['seller_id']."';");
		$this->load->view('seller/header',$data);
		$this->load->view($page,$data);
		$this->load->view('seller/footer',$data);
	}
    public function account_msg()
    {
        echo json_encode('account not active yet');
    }
	/**
	*

		@CUSTOMER

	*
	*/
	public function check_login()
	{
		if(isset($_SESSION['seller']) && $_SESSION['seller']!= "")
		{
			$user = $_SESSION['seller'];
			$phone = $user['mobile'];
			$password = $user['password'];
			$resp = $this->model->get_row("SELECT * FROM `seller` WHERE `mobile` = '$phone'  AND `password` =  '$password'");
			if ($resp)
			{
				$_SESSION['seller'] = $resp;
				return $resp;
			}
			else
			{
				redirect('seller-login');
			}
		}
		else 
		{
			redirect('seller-login');
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
	public function all()
	{

		$user = $this->check_login();
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | Seller Dashboard';
		$data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `color_id` ASC;");
		$data['business_detail'] = $this->model->get_business_detail($user['seller_id']);
		$data['countries'] = $this->model->countries();
		if ($data['business_detail']) {
			$data['states'] = $this->model->states($data['business_detail']['country']);
			$data['cities'] = $this->model->cities($data['business_detail']['state']);
		}
		else{
			$data['states'] = $this->model->states(166);
		}
		$data['warehouse'] = $this->model->get_warehouse($user['seller_id']);
		if ($data['warehouse']) {
			$data['states2'] = $this->model->states($data['warehouse']['country']);
			$data['cities2'] = $this->model->cities($data['warehouse']['state']);
		}
		else{
			$data['states2'] = $this->model->states(166);
		}
		$data['return_address'] = $this->model->get_return_address($user['seller_id']);
		if ($data['return_address']) {
			$data['states3'] = $this->model->states($data['return_address']['country']);
			$data['cities3'] = $this->model->cities($data['return_address']['state']);
		}
		else{
			$data['states3'] = $this->model->states(166);
		}
        $data['products'] = $this->model->get_products_by_brand($data['brand']['brand_id']);
        $data['orders'] = $this->model->get_orders_items_by_brand($data['brand']['brand_id']);
        $data['parents'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '0' AND `leval` = '0' ORDER BY `title` ASC");
        $data['deals'] = $this->model->get_deals_by_brand($data['brand']['brand_id']);
        $data['product_counts'] = $this->model->get_seller_products_count($data['brand']['brand_id']);
        $data['product_categories'] = $this->model->get_product_categories($data['brand']['brand_id']);
		$data['transfer_history'] = $this->model->get_transfer_history($user['seller_id']);
        $this->template('seller/index',$data);
    }
    public function index()
    {
        $user = $this->check_login();
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Seller Dashboard';
        $data['dashboard_menu'] = 'show active';
        $data['dashboard_menu_true'] = 'true';
        $data['page_dashboard'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        if ($data['brand']['brand_id'] > 0) {
            $data['deals'] = $this->model->get_deals_by_brand($data['brand']['brand_id']);
            $data['product_check'] = $this->model->get_row("SELECT * FROM `products` WHERE `brand_id` = '".$data['brand']['brand_id']."' ");
            $data['product_counts'] = $this->model->get_seller_products_count($data['brand']['brand_id']);
        }
        else{
            $data['deals'] = false;
            $data['product_check'] = false;
            $data['product_counts'] = 0;
        }
        $data['total_sale'] = $this->model->get_total_sale_by_brand($data['brand']['brand_id']);
        $data['pending_orders_by_days'] = $this->model->get_pending_orders_bydays($data['brand']['brand_id']);
        $this->template('seller/dashboard',$data);
    }
    public function categories()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Categories';
        $data['products_menu'] = 'show active';
        $data['products_menu_true'] = 'true';
        $data['page_categories'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $catIdz = $Products = $this->model->get_cats_ids_by_brand($data['brand']['brand_id']);
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
        if (strlen($categoriesIdz) > 0 && $categoriesIdz != 0) {
            $cats = explode(',', $categoriesIdz);
            $final = array();
            $KEY = 0;
            foreach ($cats as $key => $cat) {
                $CatID = $cat;
                $CatData = $this->model->get_row("SELECT `id`,`title` FROM `categories` WHERE `id` = '$CatID';");
                if ($CatData) {
                    $Products = $this->model->get_products_by_brand_cat($CatData['id'],$data['brand']['brand_id'],8);
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
        }

        $this->template('seller/categories',$data);
    }
    public function single_category($CatID)
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Categories';
        $data['products_menu'] = 'show active';
        $data['products_menu_true'] = 'true';
        $data['page_categories'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $data['cat'] = $this->model->get_cat_byid($CatID);
        $data['products'] = $this->model->get_products_by_brand_cat($CatID,$data['brand']['brand_id']);

        $this->template('seller/single_category',$data);
    }
    public function products()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Prodcuts';
        $data['products_menu'] = 'show active';
        $data['products_menu_true'] = 'true';
        $data['page_products'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        if ($data['brand']['brand_id'] == 0) {
            $data['products'] = false;
        }
        else{
            $data['products'] = $this->model->get_products_by_brand($data['brand']['brand_id']);
        }
        $data['parents'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '0' AND `leval` = '0' ORDER BY `title` ASC");
        $data['listing'] = $this->model->get_lisitng($user['seller_id']);
        $this->template('seller/products',$data);
    }
    public function listing_products($list)
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['list'] = $list;
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Prodcuts';
        $data['products_menu'] = 'show active';
        $data['products_menu_true'] = 'true';
        $data['page_products'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $data['products'] = $this->model->get_products_by_list($list);
        $data['parents'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '0' AND `leval` = '0' ORDER BY `title` ASC");
        $data['listing'] = $this->model->get_lisitng($user['seller_id']);
        $this->template('seller/listing_products',$data);
    }
    public function add_product()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Add Product';
        $data['products_menu'] = 'show active';
        $data['products_menu_true'] = 'true';
        $data['page_add_product'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
        $data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `color_id` ASC;");
        $data['parents'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '0' AND `leval` = '0' ORDER BY `title` ASC");
		$this->template('seller/add_product',$data);
    }
	public function edit_product($id)
	{
		$user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
		$data['user'] = $user;
		$data['meta_title'] = 'Easy Door | Edit Product';
        $data['products_menu'] = 'show active';
        $data['products_menu_true'] = 'true';
        $data['page_products'] = 'active';
        $data['parents'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '0' AND `leval` = '0' ORDER BY `title` ASC");
		$data['q'] = $this->model->get_product_byid($id);
		$cat_id = $data["q"]['category_id'];

        $data['brand'] = $this->model->get_row("SELECT `brand_id`,`seller_id` FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        if ($data['brand']['seller_id'] != $user['seller_id']) {
            redirect('seller/index');
        }

        $data['cat'] = $this->model->get_row("SELECT * FROM `categories` WHERE `id` = '$cat_id';");
        $PrentID = $data['cat']['parent'];
        $parent = $this->model->get_row("SELECT * FROM `categories` WHERE `id` = '$PrentID';");
        if ($parent['parent'] > 0) {
            $data['Cat1'] = $parent;
            $PrentID = $data['Cat1']['parent'];
            $data['Parent'] = $this->model->get_row("SELECT * FROM `categories` WHERE `id` = '$PrentID';");
            $data['Cat1s'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '$PrentID';");
            $data['Cats'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '".$data['Cat1']['id']."';");
        }
        else{
            $data['Cat1'] = false;
            $data['Parent'] = $parent;
            $data['Cats'] = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '$PrentID';");
        }

        $ProductFilters = explode(',', $data['q']['dynamic_filters']);
        $FiltersIds = $data['cat']['filter_ids'];
        if ($FiltersIds && strlen($FiltersIds) > 0) {
            $resp = $this->model->get_results("SELECT `filter_id`,`title` FROM `filter` WHERE `filter_id` IN($FiltersIds) AND `status` = 'active' ORDER BY `title`;");
        }
        else{
            $resp = false;
        }
        if ($resp) {
            $html = '';
            foreach ($resp as $key => $Filter) {
                $FilterID = $Filter['filter_id'];
                $values = $this->model->get_results("SELECT `filter_value_id`,`title` FROM `filter_value` WHERE `filter_id` = '$FilterID' AND `status` = 'active' ORDER BY `title`;");
                if ($values) {
                    $html .= '<h1>'.$Filter['title'].'</h1>';
                    $html .= '<div class="dynamic-filter-x-class">';
                        $html .= '<div class="l-info">';
                            $html .= '<input class="styled-checkbox" type="checkbox" id="check-all-tags-seller-'.$key.'" value="1">';
                            $html .= '<label for="check-all-tags-seller-'.$key.'" class="check-all-tags-seller">All</label>';
                        $html .= '</div>';
                        foreach ($values as $key => $filter){
                            $html .= '<div class="l-info">';
                                if (in_array($filter['filter_value_id'], $ProductFilters)) {
                                    $html .= '<input class="styled-checkbox" id="styled-checkbox-'.$filter['filter_value_id'].'-101" type="checkbox" name="filter_value_id[]" value="'.$filter['filter_value_id'].'" checked="checked">';
                                }
                                else{
                                    $html .= '<input class="styled-checkbox" id="styled-checkbox-'.$filter['filter_value_id'].'-101" type="checkbox" name="filter_value_id[]" value="'.$filter['filter_value_id'].'">';
                                }
                                $html .= '<label for="styled-checkbox-'.$filter['filter_value_id'].'-101">'.$filter['title'].'</label>';
                            $html .= '</div>';
                        }
                    $html .= '</div>';
                }
            }
            $data['filters_html'] = $html;
        }
        else{
            $data['filters_html'] = 'false';
        }


		$tags = $this->model->get_results("
            SELECT ct.*, pt.value 
            FROM `cat_tag` AS ct 
            LEFT JOIN `product_tag` AS pt ON ct.cat_tag_id = pt.cat_tag_id 
            WHERE ct.status = 'active' AND ct.category_id = '$cat_id' AND pt.product_id = '$id' 
            ORDER BY ct.name ASC;
        ");
        if ($tags) {
            $data['tags_html'] = $this->get_cat_tags_edit($tags);
        }
        else{
            $data['tags_html'] = false;
        }
		$data['sizes'] = $this->model->get_results("SELECT * FROM `size` WHERE `status` = 'active' ORDER BY `size_id` ASC;");
		$data['colors'] = $this->model->get_results("SELECT * FROM `color` WHERE `status` = 'active' ORDER BY `color_id` ASC;");
		$this->template('seller/edit_product',$data);
	}
    public function listing()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Volume Listing';
        $data['listing_menu'] = 'show active';
        $data['listing_menu_true'] = 'true';
        $data['page_listing'] = 'active';
        $data['listing'] = $this->model->get_lisitng($user['seller_id']);
        $this->template('seller/listing',$data);
    }
    public function add_list()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Add Volume Listing';
        $data['listing_menu'] = 'show active';
        $data['listing_menu_true'] = 'true';
        $data['page_add_list'] = 'active';
        $data['form_id'] = 'add-list-form';
        $this->template('seller/add_list',$data);
    }
    public function post_list()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        parse_str($_POST['data'],$post);
        $post['seller_id'] = $user['seller_id'];
        $resp = $this->db->insert('seller_listing',$post);
        if ($resp) {
            echo json_encode(array("status"=>true,"msg"=>"submited :)"));
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"not submited :( please try again or reload your web page."));
        }
    }
    public function edit_list($id)
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Add Volume Listing';
        $data['listing_menu'] = 'show active';
        $data['listing_menu_true'] = 'true';
        $data['page_listing'] = 'active';
        $data['q'] = $this->model->get_lisitng_byid($id,$user['seller_id']);
        if (!($data['q'])) {
            redirect('logout');
        }
        else{
            $data['mode'] = 'edit';
            $data['form_id'] = 'edit-list-form';
        }
        $this->template('seller/add_list',$data);
    }
    public function update_list()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        parse_str($_POST['data'],$post);
        $id = $post['id'];unset($post['id']);
        $this->db->where('seller_listing_id',$id);
        $this->db->where('seller_id',$user['seller_id']);
        $resp = $this->db->update('seller_listing',$post);
        if ($resp) {
            echo json_encode(array("status"=>true,"msg"=>"updated :)"));
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"not updated :( please try again or reload your web page."));
        }
    }
    public function delete_list($id)
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $this->db->where('seller_listing_id',$id);
        $this->db->where('seller_id',$user['seller_id']);
        $resp = $this->db->delete('seller_listing');
        if ($resp) {
            echo json_encode(array("status"=>true,"msg"=>"deleted :)"));
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"not deleted :( please try again or reload your web page."));
        }
    }
    public function campaign()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Campaign';
        $data['campaign_menu'] = 'show active';
        $data['campaign_menu_true'] = 'true';
        $data['page_campaign'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        if ($data['brand']['brand_id'] > 0) {
            $data['deals'] = $this->model->get_deals_by_brand($data['brand']['brand_id']);
        }
        else{
            $data['deals'] = false;
        }
        $this->template('seller/campaign',$data);
    }
    public function orders()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Orders';
        $data['finance_menu'] = 'show active';
        $data['finance_menu_true'] = 'true';
        $data['page_orders'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $data['orders'] = $this->model->get_orders_items_by_brand($data['brand']['brand_id']);
        $this->template('seller/orders',$data);
    }
    public function order_search()
    {
        $user = $this->check_login();
        if ($user['status'] != 'active') {
            redirect('seller/index');
        }
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Orders Search';
        $data['finance_menu'] = 'show active';
        $data['finance_menu_true'] = 'true';
        $data['page_order_search'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        if (isset($_GET['search']) && $_GET['search'] == 'true') {
            $resp = $this->model->get_brand_orders_items_by_search($data['brand']['brand_id'],$_GET);
            $data['orders'] = $resp['orders'];
            $data['download_url'] = $resp['url'];
            $data['get'] = $_GET;
        }
        else if (isset($_GET['download']) && $_GET['download'] == 'true') {
            $resp = $this->model->get_brand_orders_items_by_search($data['brand']['brand_id'],$_GET);
            $data['orders'] = $resp['orders'];
            $data['download_url'] = $resp['url'];
            $data['get'] = $_GET;

            $head = array("Order No","Order Date","Product","SKU","Payment Method","QTY","Price","Total","Status","Order Status");
            $file = date('d-m-y H-i-s').'__order_list.csv';
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="'.$file.'"');
            $fp = fopen('php://output', 'w');
            fputcsv($fp, $head);
            foreach ($data['orders'] as $row) {
                $recordRow[0] = $row['sale_id'];
                $recordRow[1] = date('d-m-Y',strtotime($row['at']));
                $recordRow[2] = $row['product_name'];
                $recordRow[3] = $row['sku'];
                $recordRow[4] = $row['payment_method'];
                $recordRow[5] = $row['qty'];
                $recordRow[6] = $row['price'];
                $recordRow[7] = $row['total'];
                $recordRow[8] = $row['status'];
                if($row['OrderStatus'] == 0){
                    $recordRow[9] = 'Pending';
                }
                else if($row['OrderStatus'] == 1){
                    $recordRow[9] = 'Confirm';
                }
                else if($row['OrderStatus'] == 2){
                    $recordRow[9] = 'Out';
                }
                else if($row['OrderStatus'] == 3){
                    $recordRow[9] = 'Cancel';
                }
                else if($row['OrderStatus'] == 4){
                    $recordRow[9] = 'Complete';
                }
                fputcsv($fp, $recordRow);
            }
            fclose($fp);
        }
        else{
            $data['orders'] = false;
            $data['download_url'] = 'javascript://';
        }
        $this->template('seller/order_search',$data);
    }
    public function download_order_search()
    {
        if ($_GET) {
            $user = $this->check_login();
            $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
            $resp = $this->model->get_brand_orders_items_by_search($data['brand']['brand_id'],$_GET);
            $orders = $resp['orders'];

            $head = array("Order No","Order Date","Product","SKU","Payment Method","QTY","Price","Total","Status","Order Status");
            $file = date('d-m-y H-i-s').'__order_list.csv';
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="'.$file.'"');
            $fp = fopen('php://output', 'w');
            fputcsv($fp, $head);
            foreach ($orders as $row) {
                $recordRow[0] = $row['sale_id'];
                $recordRow[1] = date('d-m-Y',strtotime($row['at']));
                $recordRow[2] = $row['product_name'];
                $recordRow[3] = $row['sku'];
                $recordRow[4] = $row['payment_method'];
                $recordRow[5] = $row['qty'];
                $recordRow[6] = $row['price'];
                $recordRow[7] = $row['total'];
                $recordRow[8] = $row['status'];
                if($row['OrderStatus'] == 0){
                    $recordRow[9] = 'Pending';
                }
                else if($row['OrderStatus'] == 1){
                    $recordRow[9] = 'Confirm';
                }
                else if($row['OrderStatus'] == 2){
                    $recordRow[9] = 'Out';
                }
                else if($row['OrderStatus'] == 3){
                    $recordRow[9] = 'Cancel';
                }
                else if($row['OrderStatus'] == 4){
                    $recordRow[9] = 'Complete';
                }
                fputcsv($fp, $recordRow);
            }
            fclose($fp);
        }
    }
    public function transactions()
    {
        $user = $this->check_login();
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | All Transactions';
        $data['finance_menu'] = 'show active';
        $data['finance_menu_true'] = 'true';
        $data['page_transactions'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $data['transfer_history'] = $this->model->get_transfer_history($user['seller_id']);
        $this->template('seller/transactions',$data);
    }
    public function profile()
    {
        $user = $this->check_login();
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Profile';
        $data['account_menu'] = 'show active';
        $data['account_menu_true'] = 'true';
        $data['page_profile'] = 'active';
        $data['brand'] = $this->model->get_row("SELECT * FROM `brand`  WHERE `seller_id` = '".$user['seller_id']."';");
        $data['business_detail'] = $this->model->get_business_detail($user['seller_id']);
        $data['countries'] = $this->model->countries();
        if ($data['business_detail']) {
            $data['states'] = $this->model->states($data['business_detail']['country']);
            $data['cities'] = $this->model->cities($data['business_detail']['state']);
        }
        else{
            $data['states'] = $this->model->states(166);
        }
        $data['warehouse'] = $this->model->get_warehouse($user['seller_id']);
        if ($data['warehouse']) {
            $data['states2'] = $this->model->states($data['warehouse']['country']);
            $data['cities2'] = $this->model->cities($data['warehouse']['state']);
        }
        else{
            $data['states2'] = $this->model->states(166);
        }
        $data['return_address'] = $this->model->get_return_address($user['seller_id']);
        if ($data['return_address']) {
            $data['states3'] = $this->model->states($data['return_address']['country']);
            $data['cities3'] = $this->model->cities($data['return_address']['state']);
        }
        else{
            $data['states3'] = $this->model->states(166);
        }
        $this->template('seller/profile',$data);
    }
    public function account_setting()
    {
        $user = $this->check_login();
        $data['user'] = $user;
        $data['meta_title'] = 'Easy Door | Account Setting';
        $data['account_menu'] = 'show active';
        $data['account_menu_true'] = 'true';
        $data['page_account_setting'] = 'active';
        $this->template('seller/account_setting',$data);
    }
	/**
	*

		@ACTION

	*
	*/
	public function post_product()
	{
		$user = $this->check_login();
        if($_POST)
        {
            if($_FILES["prod_img"]["size"] > 0){
                $config['upload_path'] = UPLOADS_TO.'products/'.$_POST['category_id'].'/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //$this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('prod_img'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $img_data = $this->upload->data();
                    $_POST["product_image"]=$img_data['file_name'];
                }
            }

            unset($_FILES["prod_img"]['name']);unset($_FILES["prod_img"]);



            //color
            /*$colors = '';
            foreach ($_POST['color'] as $key => $color) {
                if ($key == 0) {
                    $colors = $color;
                }
                else{
                    $colors .= ','.$color;
                }
                unset($_POST['color'][$key]);
            }
            $_POST['color'] = $colors;*/
            $colors = '';
            $colorImages = '';
            $ImageCount = 0;
            $ColorCount = 0;
            $colorPrice = 0;
            foreach ($_POST['color'] as $key => $color) {
                if ($key == 0) {
                    $colors = $color;
                }
                else{
                    $colors .= ','.$color;
                }
                unset($_POST['color'][$key]);
                if ($ColorCount == 0) {
                    if (isset($_POST['color_price'.$color])) {
                        $colorPrice = $color.'-'.$_POST['color_price'.$color];
                        $ColorCount = 1;
                        unset($_POST['color_price'.$color]);
                    }
                }
                else{
                    if (isset($_POST['color_price'.$color])) {
                        $colorPrice .= ','.$color.'-'.$_POST['color_price'.$color];
                        unset($_POST['color_price'.$color]);
                    }
                }
                unset($_POST['color_price'.$color]);
                if($_FILES['color_file'.$color]['size'] > 0){
                    $config['upload_path'] = UPLOADS_TO.'products/'.$_POST['category_id'].'/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    //$config['encrypt_name'] = TRUE;
                    $ext = pathinfo($_FILES['color_file'.$color]['name'], PATHINFO_EXTENSION);
                    $new_name = $color.'-'.md5(time().$_FILES['color_file'.$color]['name']).'.'.$ext;
                    $config['file_name'] = $new_name;
                    //$this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('color_file'.$color))
                    {
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else
                    {
                        $img_data = $this->upload->data();
                        if ($ImageCount == 0) {
                            $colorImages = $img_data['file_name'];
                            $ImageCount = 1;
                        }
                        else{
                            $colorImages .= ','.$img_data['file_name'];
                        }
                    }
                }
            }
            $_POST['color'] = $colors;
            $_POST['color_price'] = $colorPrice;
            $_POST['color_images'] = $colorImages;


            //size
            $sizes = '';
            $SizeCount = 0;
            $sizePrice = 0;
            foreach ($_POST['size'] as $key => $size) {
                if ($key == 0) {
                    $sizes = $size;
                }
                else{
                    $sizes .= ','.$size;
                }
                unset($_POST['size'][$key]);
                if ($SizeCount == 0) {
                    if (isset($_POST['size_price'.$size])) {
                        $sizePrice = $size.'-'.$_POST['size_price'.$size];
                        $SizeCount = 1;
                        unset($_POST['size_price'.$size]);
                    }
                }
                else{
                    if (isset($_POST['size_price'.$size])) {
                        $sizePrice .= ','.$size.'-'.$_POST['size_price'.$size];
                        unset($_POST['size_price'.$size]);
                    }
                }
                unset($_POST['size_price'.$size]);
            }
            $_POST['size'] = $sizes;
            $_POST['size_price'] = $sizePrice;


            $cat_tag_value = $_POST['cat_tag_value'];unset($_POST['cat_tag_value']);
            $cat_tag_id = $_POST['cat_tag_id'];unset($_POST['cat_tag_id']);

            $_POST['slug'] = $this->clean($_POST['product_name']);
            $_POST['product_description'] = $_POST['editor1'];unset($_POST['editor1']);

            $_POST['price'] = $_POST['price'] - $_POST['discount'];

            $filters = $_POST['filter_value_id'];unset($_POST['filter_value_id']);
            $_POST['dynamic_filters'] = implode(',', $filters);
            if (strlen($_POST['dynamic_filters']) > 0) {
                $_POST['dynamic_filters'] = $_POST['dynamic_filters'];
            }
            else{
                $_POST['dynamic_filters'] = 0;
            }

            //Meta Data
            $Brand = $this->model->get_row("SELECT `title` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."'");
            $Category = $this->model->get_row("SELECT `title` FROM `categories` WHERE `id` = '".$_POST['category_id']."'");
            //meta_title
            $meta_title = $this->model->get_setting_byid(9);
            $meta_title = str_replace('[product]', $_POST['product_name'], $meta_title['value']);
            $meta_title = str_replace('[brand]', $Brand['title'], $meta_title);
            $meta_title = str_replace('[category]', $Category['title'], $meta_title);
            $_POST['meta_title'] = $meta_title;

            //meta_key
            $meta_key = $this->model->get_setting_byid(10);
            $meta_key = str_replace('[product]', $_POST['product_name'], $meta_key['value']);
            $meta_key = str_replace('[brand]', $Brand['title'], $meta_key);
            $meta_key = str_replace('[category]', $Category['title'], $meta_key);
            $_POST['meta_key'] = $meta_key;

            //meta_desc
            $meta_desc = $this->model->get_setting_byid(11);
            $meta_desc = str_replace('[product]', $_POST['product_name'], $meta_desc['value']);
            $meta_desc = str_replace('[brand]', $Brand['title'], $meta_desc);
            $meta_desc = str_replace('[category]', $Category['title'], $meta_desc);
            $_POST['meta_desc'] = $meta_desc;

            $this->db->insert("products",$_POST);
            $lastID = $this->db->insert_id();
            
            foreach ($cat_tag_id as $key => $id) {
                $post['product_id'] = $lastID;
                $post['cat_tag_id'] = $id;
                $post['value'] = $cat_tag_value[$key];
                $this->db->insert("product_tag",$post);
            }
            $final = array();
            if ($_FILES){
	            for ($i=0; $i < count($_FILES); $i++) {
	            	if (strlen($_FILES['post_photos']['name'][$i]) > 2) {

	            		$_FILES['file']['name']     = $_FILES['post_photos']['name'][$i]; 
	                    $_FILES['file']['type']     = $_FILES['post_photos']['type'][$i]; 
	                    $_FILES['file']['tmp_name'] = $_FILES['post_photos']['tmp_name'][$i]; 
	                    $_FILES['file']['error']     = $_FILES['post_photos']['error'][$i]; 
	                    $_FILES['file']['size']     = $_FILES['post_photos']['size'][$i];

                        $config['upload_path'] = UPLOADS_TO.'products/'.$_POST['category_id'].'/';
		                $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG';
		                $config['encrypt_name'] = TRUE;
		                $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		                $new_name = md5(time().$_FILES['file']['name']).'.'.$ext;
		                $config['file_name'] = $new_name;
		                //$this->load->library('upload', $config);
                        $this->upload->initialize($config);
		                if ($this->upload->do_upload('file'))
		                {
		                    $final[$i]['img'] = $this->upload->data()['file_name'];
		                }
	            	}
	            }
	            if (count($final) > 0) {
	                foreach ($final as $key => $img) {
	                    $post2['product_id'] = $lastID;
	                    $post2['image'] = $img['img'];
	                    $this->db->insert('product_image',$post2);
	                }
	            }
	        }

            $purchaasr=$this->db->query("Insert into purchase(product_id, qty, unit, date, store_id_login) values('".$lastID."', 1, '".$_POST['unit']."', '".date('d-m-y h:i:s ')."', '".$user['seller_id']."')");
            redirect('seller/products');
        }
	}
	public function update_product()
	{
		$user = $this->check_login();
        if($_POST)
        {
            if($_FILES["prod_img"]["size"] > 0){
                $config['upload_path'] = UPLOADS_TO.'products/'.$_POST['category_id'].'/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //$this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('prod_img'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $img_data = $this->upload->data();
                    $_POST["product_image"]=$img_data['file_name'];
                }
            }
            unset($_FILES["prod_img"]['name']);unset($_FILES["prod_img"]);


            $colors = '';
            $colorImages = '';
            $ImageCount = 0;
            $ColorCount = 0;
            foreach ($_POST['color'] as $key => $color) {
                if ($key == 0) {
                    $colors = $color;
                }
                else{
                    $colors .= ','.$color;
                }
                if ($ColorCount == 0) {
                    if (isset($_POST['color_price'.$color])) {
                        $colorPrice = $color.'-'.$_POST['color_price'.$color];
                        $ColorCount = 1;
                    }
                }
                else{
                    if (isset($_POST['color_price'.$color])) {
                        $colorPrice .= ','.$color.'-'.$_POST['color_price'.$color];
                    }
                }
                unset($_POST['color_price'.$color]);
                unset($_POST['color'][$key]);
                if($_FILES['color_file'.$color]['size'] > 0){
                    $config['upload_path'] = UPLOADS_TO.'products/'.$_POST['category_id'].'/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    // $config['encrypt_name'] = TRUE;
                    $ext = pathinfo($_FILES['color_file'.$color]['name'], PATHINFO_EXTENSION);
                    $new_name = $color.'-'.md5(time().$_FILES['color_file'.$color]['name']).'.'.$ext;
                    $config['file_name'] = $new_name;
                    //$this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('color_file'.$color))
                    {
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else
                    {
                        $img_data = $this->upload->data();
                        if ($ImageCount == 0) {
                            $colorImages = $img_data['file_name'];
                            $ImageCount = 1;
                        }
                        else{
                            $colorImages .= ','.$img_data['file_name'];
                        }
                    }
                }
                else{
                    if ($key == 0) {
                        if (strlen($_POST['color_file_value'.$color]) > 4) {
                            $colorImages = $_POST['color_file_value'.$color];
                            unset($_POST['color_file_value'.$color]);
                        }
                    }
                    else{
                        if (strlen($_POST['color_file_value'.$color]) > 4) {
                            $colorImages .= ','.$_POST['color_file_value'.$color];
                            unset($_POST['color_file_value'.$color]);
                        }
                    }
                }
            }
            $_POST['color'] = $colors;
            $_POST['color_price'] = $colorPrice;
            $_POST['color_images'] = $colorImages;



            $sizes = '';
            $SizeCount = 0;
            foreach ($_POST['size'] as $key => $size) {
                if ($key == 0) {
                    $sizes = $size;
                }
                else{
                    $sizes .= ','.$size;
                }
                unset($_POST['size'][$key]);
                if ($SizeCount == 0) {
                    if (isset($_POST['size_price'.$size])) {
                        $sizePrice = $size.'-'.$_POST['size_price'.$size];
                        $SizeCount = 1;
                    }
                }
                else{
                    if (isset($_POST['size_price'.$size])) {
                        $sizePrice .= ','.$size.'-'.$_POST['size_price'.$size];
                    }
                }
                unset($_POST['size_price'.$size]);
            }
            $_POST['size'] = $sizes;
            $_POST['size_price'] = $sizePrice;



            $cat_tag_value = $_POST['cat_tag_value'];unset($_POST['cat_tag_value']);
            $cat_tag_id = $_POST['cat_tag_id'];unset($_POST['cat_tag_id']);

            $_POST['slug'] = $this->clean($_POST['product_name']);
            $_POST['product_description'] = $_POST['editor1'];unset($_POST['editor1']);

            $_POST['price'] = $_POST['price'] - $_POST['discount'];

            $filters = $_POST['filter_value_id'];unset($_POST['filter_value_id']);
            $_POST['dynamic_filters'] = implode(',', $filters);
            if (strlen($_POST['dynamic_filters']) > 0) {
                $_POST['dynamic_filters'] = $_POST['dynamic_filters'];
            }
            else{
                $_POST['dynamic_filters'] = 0;
            }

            //Meta Data
            $Brand = $this->model->get_row("SELECT `title` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."'");
            $Category = $this->model->get_row("SELECT `title` FROM `categories` WHERE `id` = '".$_POST['category_id']."'");
            //meta_title
            $meta_title = $this->model->get_setting_byid(9);
            $meta_title = str_replace('[product]', $_POST['product_name'], $meta_title['value']);
            $meta_title = str_replace('[brand]', $Brand['title'], $meta_title);
            $meta_title = str_replace('[category]', $Category['title'], $meta_title);
            $_POST['meta_title'] = $meta_title;

            //meta_key
            $meta_key = $this->model->get_setting_byid(10);
            $meta_key = str_replace('[product]', $_POST['product_name'], $meta_key['value']);
            $meta_key = str_replace('[brand]', $Brand['title'], $meta_key);
            $meta_key = str_replace('[category]', $Category['title'], $meta_key);
            $_POST['meta_key'] = $meta_key;

            //meta_desc
            $meta_desc = $this->model->get_setting_byid(11);
            $meta_desc = str_replace('[product]', $_POST['product_name'], $meta_desc['value']);
            $meta_desc = str_replace('[brand]', $Brand['title'], $meta_desc);
            $meta_desc = str_replace('[category]', $Category['title'], $meta_desc);
            $_POST['meta_desc'] = $meta_desc;


            $product_id = $_POST['product_id'];unset($_POST['product_id']);
            $this->db->where("product_id",$product_id);
            $this->db->update("products",$_POST);
            $this->db->delete("product_tag",array("product_id"=>$product_id));
            
            foreach ($cat_tag_id as $key => $id) {
                $post['product_id'] = $product_id;
                $post['cat_tag_id'] = $_POST['category_id'];
                $post['value'] = $cat_tag_value[$key];
                $this->db->insert("product_tag",$post);
            }
            redirect('seller/products');
        }
	}
    public function product_add_to_list()
    {
        $user = $this->check_login();
        $listId = $_POST['list'];
        $proId = $_POST['product'];
        $oldList = $this->model->get_row("SELECT `seller_listing_id` FROM `products` WHERE `product_id` = '$proId';");
        if ($oldList['seller_listing_id'] > 0) {
            $oldListCount = $this->model->get_row("SELECT `count` FROM `seller_listing` WHERE `seller_listing_id` = '".$oldList['seller_listing_id']."';");
            if ($oldListCount) {
                $Count = $oldListCount['count'] - 1;
                $this->db->where('seller_listing_id',$oldList['seller_listing_id']);
                $this->db->update('seller_listing',array("count"=>$Count));
            }
        }
        $this->db->where('product_id',$proId);
        $this->db->update('products',array("seller_listing_id"=>$listId));
        $this->db->query("UPDATE `seller_listing` SET `count`=`count`+1 WHERE `seller_listing_id` = '$listId'");
        echo json_encode(array("status"=>true,"msg"=>"product added to list :)"));
    }
    public function product_remove_from_list()
    {
        $user = $this->check_login();
        $proId = $_POST['product'];
        $oldList = $this->model->get_row("SELECT `seller_listing_id` FROM `products` WHERE `product_id` = '$proId';");
        if ($oldList['seller_listing_id'] > 0) {
            $oldListCount = $this->model->get_row("SELECT `count` FROM `seller_listing` WHERE `seller_listing_id` = '".$oldList['seller_listing_id']."';");
            if ($oldListCount) {
                $Count = $oldListCount['count'] - 1;
                $this->db->where('seller_listing_id',$oldList['seller_listing_id']);
                $this->db->update('seller_listing',array("count"=>$Count));
            }
        }
        $this->db->where('product_id',$proId);
        $this->db->update('products',array("seller_listing_id"=>0));
        echo json_encode(array("status"=>true,"msg"=>"product removed from list :)"));
    }
	public function uploadData()
	{
    	$count=0;
        $fp = fopen($_FILES['userfile']['tmp_name'],'r') or die("can't open file");
        while($csv_line = fgetcsv($fp,1024))
        {
            $count++;
            if($count == 1)
            {
                continue;
            }//keep this if condition if you want to remove the first row
            for($i = 0, $j = count($csv_line); $i < $j; $i++)
            {
                $insert_csv = array();
                $insert_csv['product_name'] = $csv_line[0];
                $insert_csv['product_description'] = $csv_line[1];
                $insert_csv['product_image'] = $csv_line[2];
                $insert_csv['category_id'] = $csv_line[3];
                $insert_csv['in_stock'] = $csv_line[4];
                $insert_csv['price'] = $csv_line[5];
                $insert_csv['unit_value'] = $csv_line[6];
                $insert_csv['unit'] =  $csv_line[7];
                $insert_csv['increament'] = $csv_line[8];
                $insert_csv['rewards'] = $csv_line[9];
                $insert_csv['urdu_title'] = $csv_line[10];
                $insert_csv['brand_id'] = $csv_line[11];
                $insert_csv['new_price'] = $csv_line[12];
                $insert_csv['sale_percentage'] = $csv_line[13];
                $insert_csv['size'] = $csv_line[14];
                $insert_csv['color'] = $csv_line[15];
                $insert_csv['warranty'] = $csv_line[16];
                $insert_csv['sku'] = $csv_line[17];
            }
            $i++;

            $BrandID = $insert_csv['brand_id'];
            $brands = $this->db->query("SELECT `brand_id` FROM `brand` WHERE `title` = '$BrandID' LIMIT 1");
            $brands = $brands->result();
            foreach ($brands as $brand):
                $BrandID = $brand->brand_id;
            endforeach;

            $data = array(
                'product_id' => "" ,
                'product_name' => $insert_csv['product_name'],
                'product_description' => $insert_csv['product_description'],
                'product_image' => $insert_csv['product_image'],
                'category_id' => $insert_csv['category_id'],
                'in_stock' => $insert_csv['in_stock'],
                'price' => $insert_csv['price'],
                'unit_value' => $insert_csv['unit_value'],
                'unit' => $insert_csv['unit'],
                'increament' => $insert_csv['increament'],
                'rewards' => $insert_csv['rewards'],
                'urdu_title' => $insert_csv['urdu_title'],
                'brand_id' => $BrandID,
                'new_price' => $insert_csv['new_price'],
                'sale_percentage' => $insert_csv['sale_percentage'],
                'size' => $insert_csv['size'],
                'color' => $insert_csv['color'],
                'warranty' => $insert_csv['warranty'],
                'sku' => $insert_csv['sku']
                );
            $data['crane_features']=$this->db->insert('products', $data);
            $in_id=$this->db->insert_id();
            $date=date('Y-m-d h:i:s');
            
            $data1 = array(
                'purchase_id' => "" ,
                'product_id' => $in_id,
                'qty' => '1',
                'unit' => $insert_csv['unit'],
                'date' => $date,
                'store_id_login' => '1'
                );
            $data['crane_features']=$this->db->insert('purchase', $data1);
        }
        fclose($fp) or die("can't close file");
        $data['success']="Product upload success";
        return $data;
    }
    public function change_sale_item_status()
    {
		$user = $this->check_login();
    	if ($_POST) {
    		parse_str($_POST['data'],$data);

    		$id = $data['id'];
	        $item = $this->model->get_row("SELECT * FROM `sale_items` WHERE `sale_item_id` = '$id';");
	        $slaeID = $item['sale_id'];
	        $sale = $this->model->get_row("SELECT * FROM `sale` WHERE `sale_id` = '$slaeID';");

	        if ($sale) {
		        $update['status'] = $data['status'];
		        $update['msg'] = $data['msg'];
		        $this->db->where('sale_item_id',$id);
		        $resp = $this->db->update('sale_items',$update);
		        if ($resp && $data['status'] == 'cancelled') {
	                $saleUpdate['total_amount'] = $sale['total_amount'] - $item['total'];
	                $saleUpdate['total_items'] = $sale['total_items'] - 1;
	                if ($saleUpdate['total_items'] == 0) {
	                    $saleUpdate['status'] = '3';
	                    $saleUpdate['tracking_status'] = 'cancelled';
	                    $saleUpdate['delivery_charge'] = 0;
	                }
	                $this->db->where('sale_id',$slaeID);
	                $this->db->update('sale',$saleUpdate);
	        		$sale = $this->model->get_row("SELECT * FROM `sale` WHERE `sale_id` = '$slaeID';");
				}
	        }

            $orders = $this->model->get_orders_items_by_brand($_POST['brand']);
            $pending = '';
            if ($orders) {
                foreach ($orders as $key => $order){
                    if ($order['status'] == 'pending' && $order['OrderStatus'] != '3'){
                        $pending .= '<tr id="order-item-id-'.$order['sale_item_id'].'">';
                            $pending .= '<td>'.$order['sale_id'].'</td>';
                            $pending .= '<td>'.date('d-m-Y',strtotime($order['at'])).'</td>';
                            $pending .= '<td>'.$order['product_name'].'</td>';
                            $pending .= '<td>'.$order['sku'].'</td>';
                            $pending .= '<td>'.$order['payment_method'].'</td>';
                            $pending .= '<td>'.$order['qty'].'</td>';
                            $pending .= '<td>'.$order['price'].'</td>';
                            $pending .= '<td>'.$order['total'].'</td>';
                            $pending .= '<td class="order-item-status">'.$order['status'].'</td>';
                            $pending .= '<td>';
                                if($order['OrderStatus'] == 0){
                                    $pending .= '<span class="badge badge-default">Pending</span>';
                                }
                                else if($order['OrderStatus'] == 1){
                                    $pending .= '<span class="badge badge-success">Confirm</span>';
                                }
                                else if($order['OrderStatus'] == 2){
                                    $pending .= '<span class="badge badge-info">Out</span>';
                                }
                                else if($order['OrderStatus'] == 3){
                                    $pending .= '<span class="badge badge-danger">Cancel</span>';
                                }
                                else if($order['OrderStatus'] == 4){
                                    $pending .= '<span class="badge badge-info">complete</span>';
                                }
                            $pending .= '</td>';
                            $pending .= '<td><a href="javascript://" class="change-order-item-status-seller" data-id="'.$order['sale_item_id'].'">Change Status</a></td>';
                        $pending .= '</tr>';
                    }
                }
            }
            $in_process = '';
            if ($orders) {
                foreach ($orders as $key => $order){
                    if ($order['status'] == 'in process' && $order['OrderStatus'] != '3'){
                        $in_process .= '<tr id="order-item-id-'.$order['sale_item_id'].'">';
                            $in_process .= '<td>'.$order['sale_id'].'</td>';
                            $in_process .= '<td>'.date('d-m-Y',strtotime($order['at'])).'</td>';
                            $in_process .= '<td>'.$order['product_name'].'</td>';
                            $in_process .= '<td>'.$order['sku'].'</td>';
                            $in_process .= '<td>'.$order['payment_method'].'</td>';
                            $in_process .= '<td>'.$order['qty'].'</td>';
                            $in_process .= '<td>'.$order['price'].'</td>';
                            $in_process .= '<td>'.$order['total'].'</td>';
                            $in_process .= '<td class="order-item-status">'.$order['status'].'</td>';
                            $in_process .= '<td>';
                                if($order['OrderStatus'] == 0){
                                    $in_process .= '<span class="badge badge-default">Pending</span>';
                                }
                                else if($order['OrderStatus'] == 1){
                                    $in_process .= '<span class="badge badge-success">Confirm</span>';
                                }
                                else if($order['OrderStatus'] == 2){
                                    $in_process .= '<span class="badge badge-info">Out</span>';
                                }
                                else if($order['OrderStatus'] == 3){
                                    $in_process .= '<span class="badge badge-danger">Cancel</span>';
                                }
                                else if($order['OrderStatus'] == 4){
                                    $in_process .= '<span class="badge badge-info">complete</span>';
                                }
                            $in_process .= '</td>';
                            $in_process .= '<td><a href="javascript://" class="change-order-item-status-seller" data-id="'.$order['sale_item_id'].'">Change Status</a></td>';
                        $in_process .= '</tr>';
                    }
                }
            }
            $delivered_to_courier = '';
            if ($orders) {
                foreach ($orders as $key => $order){
                    if ($order['status'] == 'delivered to courier' && $order['OrderStatus'] != '3'){
                        $delivered_to_courier .= '<tr id="order-item-id-'.$order['sale_item_id'].'">';
                            $delivered_to_courier .= '<td>'.$order['sale_id'].'</td>';
                            $delivered_to_courier .= '<td>'.date('d-m-Y',strtotime($order['at'])).'</td>';
                            $delivered_to_courier .= '<td>'.$order['product_name'].'</td>';
                            $delivered_to_courier .= '<td>'.$order['sku'].'</td>';
                            $delivered_to_courier .= '<td>'.$order['payment_method'].'</td>';
                            $delivered_to_courier .= '<td>'.$order['qty'].'</td>';
                            $delivered_to_courier .= '<td>'.$order['price'].'</td>';
                            $delivered_to_courier .= '<td>'.$order['total'].'</td>';
                            $delivered_to_courier .= '<td class="order-item-status">'.$order['status'].'</td>';
                            $delivered_to_courier .= '<td>';
                                if($order['OrderStatus'] == 0){
                                    $delivered_to_courier .= '<span class="badge badge-default">Pending</span>';
                                }
                                else if($order['OrderStatus'] == 1){
                                    $delivered_to_courier .= '<span class="badge badge-success">Confirm</span>';
                                }
                                else if($order['OrderStatus'] == 2){
                                    $delivered_to_courier .= '<span class="badge badge-info">Out</span>';
                                }
                                else if($order['OrderStatus'] == 3){
                                    $delivered_to_courier .= '<span class="badge badge-danger">Cancel</span>';
                                }
                                else if($order['OrderStatus'] == 4){
                                    $delivered_to_courier .= '<span class="badge badge-info">complete</span>';
                                }
                            $delivered_to_courier .= '</td>';
                            $delivered_to_courier .= '<td><a href="javascript://" class="change-order-item-status-seller" data-id="'.$order['sale_item_id'].'">Change Status</a></td>';
                        $delivered_to_courier .= '</tr>';
                    }
                }
            }
            $delivered = '';
            if ($orders) {
                foreach ($orders as $key => $order){
                    if ($order['status'] == 'delivered' && $order['OrderStatus'] != '3'){
                        $delivered .= '<tr id="order-item-id-'.$order['sale_item_id'].'">';
                            $delivered .= '<td>'.$order['sale_id'].'</td>';
                            $delivered .= '<td>'.date('d-m-Y',strtotime($order['at'])).'</td>';
                            $delivered .= '<td>'.$order['product_name'].'</td>';
                            $delivered .= '<td>'.$order['sku'].'</td>';
                            $delivered .= '<td>'.$order['payment_method'].'</td>';
                            $delivered .= '<td>'.$order['qty'].'</td>';
                            $delivered .= '<td>'.$order['price'].'</td>';
                            $delivered .= '<td>'.$order['total'].'</td>';
                            $delivered .= '<td class="order-item-status">'.$order['status'].'</td>';
                            $delivered .= '<td>';
                                if($order['OrderStatus'] == 0){
                                    $delivered .= '<span class="badge badge-default">Pending</span>';
                                }
                                else if($order['OrderStatus'] == 1){
                                    $delivered .= '<span class="badge badge-success">Confirm</span>';
                                }
                                else if($order['OrderStatus'] == 2){
                                    $delivered .= '<span class="badge badge-info">Out</span>';
                                }
                                else if($order['OrderStatus'] == 3){
                                    $delivered .= '<span class="badge badge-danger">Cancel</span>';
                                }
                                else if($order['OrderStatus'] == 4){
                                    $delivered .= '<span class="badge badge-info">complete</span>';
                                }
                            $delivered .= '</td>';
                            $delivered .= '<td><a href="javascript://" class="change-order-item-status-seller" data-id="'.$order['sale_item_id'].'">Change Status</a></td>';
                        $delivered .= '</tr>';
                    }
                }
            }
            $cancelled = '';
            if ($orders) {
                foreach ($orders as $key => $order){
                    if ($order['status'] == 'cancelled' && $order['OrderStatus'] == '3'){
                        $cancelled .= '<tr id="order-item-id-'.$order['sale_item_id'].'">';
                            $cancelled .= '<td>'.$order['sale_id'].'</td>';
                            $cancelled .= '<td>'.date('d-m-Y',strtotime($order['at'])).'</td>';
                            $cancelled .= '<td>'.$order['product_name'].'</td>';
                            $cancelled .= '<td>'.$order['sku'].'</td>';
                            $cancelled .= '<td>'.$order['payment_method'].'</td>';
                            $cancelled .= '<td>'.$order['qty'].'</td>';
                            $cancelled .= '<td>'.$order['price'].'</td>';
                            $cancelled .= '<td>'.$order['total'].'</td>';
                            $cancelled .= '<td class="order-item-status">'.$order['status'].'</td>';
                            $cancelled .= '<td>';
                                if($order['OrderStatus'] == 0){
                                    $cancelled .= '<span class="badge badge-default">Pending</span>';
                                }
                                else if($order['OrderStatus'] == 1){
                                    $cancelled .= '<span class="badge badge-success">Confirm</span>';
                                }
                                else if($order['OrderStatus'] == 2){
                                    $cancelled .= '<span class="badge badge-info">Out</span>';
                                }
                                else if($order['OrderStatus'] == 3){
                                    $cancelled .= '<span class="badge badge-danger">Cancel</span>';
                                }
                                else if($order['OrderStatus'] == 4){
                                    $cancelled .= '<span class="badge badge-info">complete</span>';
                                }
                            $cancelled .= '</td>';
                            $cancelled .= '<td></td>';
                        $cancelled .= '</tr>';
                    }
                }
            }
            $returned = '';
            if ($orders) {
                foreach ($orders as $key => $order){
                    if ($order['status'] == 'returned' && $order['OrderStatus'] != '3'){
                        $returned .= '<tr id="order-item-id-'.$order['sale_item_id'].'">';
                            $returned .= '<td>'.$order['sale_id'].'</td>';
                            $returned .= '<td>'.date('d-m-Y',strtotime($order['at'])).'</td>';
                            $returned .= '<td>'.$order['product_name'].'</td>';
                            $returned .= '<td>'.$order['sku'].'</td>';
                            $returned .= '<td>'.$order['payment_method'].'</td>';
                            $returned .= '<td>'.$order['qty'].'</td>';
                            $returned .= '<td>'.$order['price'].'</td>';
                            $returned .= '<td>'.$order['total'].'</td>';
                            $returned .= '<td class="order-item-status">'.$order['status'].'</td>';
                            $returned .= '<td>';
                                if($order['OrderStatus'] == 0){
                                    $returned .= '<span class="badge badge-default">Pending</span>';
                                }
                                else if($order['OrderStatus'] == 1){
                                    $returned .= '<span class="badge badge-success">Confirm</span>';
                                }
                                else if($order['OrderStatus'] == 2){
                                    $returned .= '<span class="badge badge-info">Out</span>';
                                }
                                else if($order['OrderStatus'] == 3){
                                    $returned .= '<span class="badge badge-danger">Cancel</span>';
                                }
                                else if($order['OrderStatus'] == 4){
                                    $returned .= '<span class="badge badge-info">complete</span>';
                                }
                            $returned .= '</td>';
                            $returned .= '<td><a href="javascript://" class="change-order-item-status-seller" data-id="'.$order['sale_item_id'].'">Change Status</a></td>';
                        $returned .= '</tr>';
                    }
                }
            }


	        echo json_encode(array("status"=>true,"id"=>$id,"item_status"=>$data['status'],"pending"=>$pending,"in_process"=>$in_process,"delivered_to_courier"=>$delivered_to_courier,"delivered"=>$delivered,"cancelled"=>$cancelled,"returned"=>$returned));
    	}
    }
	/**
	*

		@FORM(s)

	*
	*/
	public function seller_account_form_1()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$update);
			$this->db->where('seller_id',$user['seller_id']);
			$resp = $this->db->update('seller',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"updated, changes wil appear after page reload"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not updated, please try again"));
			}
		}
	}
	public function seller_account_form_2()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$update);
			$update['seller_id'] = $user['seller_id'];
			$mobile = str_replace('+', '', $update['person_in_charge_mobile']);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$update['person_in_charge_mobile_sms'] = $mobile;
			if ($update['form'] == 'update') {
				unset($update['form']);
				$this->db->where('seller_id',$user['seller_id']);
				$resp = $this->db->update('business_detail',$update);
			}
			else{
				unset($update['form']);
				$resp = $this->db->insert('business_detail',$update);
			}
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"updated, changes wil appear after page reload"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not updated, please try again"));
			}
		}
	}
	public function seller_account_form_3()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$update);
			$this->db->where('seller_id',$user['seller_id']);
			$resp = $this->db->update('seller',$update);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"updated, changes wil appear after page reload"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not updated, please try again"));
			}
		}
	}
	public function seller_account_form_4()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$update);
			$update['seller_id'] = $user['seller_id'];
			$mobile = str_replace('+', '', $update['mobile']);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$update['mobile_sms'] = $mobile;
			if ($update['form'] == 'update') {
				unset($update['form']);
				$this->db->where('seller_id',$user['seller_id']);
				$resp = $this->db->update('warehouse',$update);
			}
			else{
				unset($update['form']);
				$resp = $this->db->insert('warehouse',$update);
			}
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"updated, changes wil appear after page reload"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not updated, please try again"));
			}
		}
	}
	public function seller_account_form_5()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$update);
			$update['seller_id'] = $user['seller_id'];
			$mobile = str_replace('+', '', $update['mobile']);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/0/', '92', $mobile, 1);
			$update['mobile_sms'] = $mobile;
			if ($update['form'] == 'update') {
				unset($update['form']);
				$this->db->where('seller_id',$user['seller_id']);
				$resp = $this->db->update('return_address',$update);
			}
			else{
				unset($update['form']);
				$resp = $this->db->insert('return_address',$update);
			}
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"updated, changes wil appear after page reload"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not updated, please try again"));
			}
		}
	}
	public function change_password()
	{
		$user = $this->check_login();
		if ($_POST) {
			parse_str($_POST['data'],$data);
			if ($user['password'] == md5($data['password'])) {
				if ($data['new_password'] === $data['new_password_2']) {
					$update['password'] = md5($data['new_password']);
					$resp = $this->db->update('seller',$update);
					if ($resp) {
						$resp = $this->model->seller_login($user['mobile'],md5($data['password']));
						$_SESSION['seller'] = $resp;
						echo json_encode(array("status"=>true,"msg"=>"password changed"));
					}
				}
				else{
					echo json_encode(array("status"=>false,"msg"=>"your new password and repeat password not matched"));
				}
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"you entered wrong password"));
			}
			
		}
	}
    public function products_csv_uploads($value='')
    {
        $user = $this->check_login();
        $BrandID = $this->model->get_row("SELECT `brand_id` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        if (!($BrandID)) {
            redirect('seller/index');
        }
        if ($_FILES) {
            if ($_POST['category_id'] > 0) {
                $categoryId = $_POST['category_id'];
            }
            $count=0;
            $fp = fopen($_FILES['csv']['tmp_name'],'r') or die("can't open file");
            while($csv_line = fgetcsv($fp,1024))
            {
                $count++;
                if($count == 1)
                {
                    $categoryIdFromFile = $csv_line[3];
                    if ($categoryId > 0){
                        if ($categoryId != $categoryIdFromFile) {
                            redirect('seller/products?error=1&msg=wrong category selected');
                        }
                    }
                    $heading = array();
                    for ($a=26; $a < count($csv_line); $a++) { 
                        $heading[$a] = $csv_line[$a];
                    }
                    continue;
                }//keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {
                    $insert_csv = array();
                    $insert_csv['product_name'] = $csv_line[0];
                    $insert_csv['product_description'] = $csv_line[1];
                    $insert_csv['product_image'] = $csv_line[2];
                    if ($categoryId > 0) {
                        $insert_csv['category_id'] = $categoryId;
                    }
                    else{
                        $insert_csv['category_id'] = $csv_line[3];
                    }
                    $insert_csv['category_id'] = $csv_line[3];
                    $insert_csv['in_stock'] = $csv_line[4];
                    $insert_csv['price'] = $csv_line[5];
                    $insert_csv['unit_value'] = $csv_line[6];
                    $insert_csv['unit'] =  $csv_line[7];
                    $insert_csv['increament'] = $csv_line[8];
                    $insert_csv['rewards'] = $csv_line[9];
                    $insert_csv['urdu_title'] = $csv_line[10];
                    $insert_csv['brand_id'] = $csv_line[11];

                    if (strlen($csv_line[12]) > 0) {
                        $sizes = explode(',', $csv_line[12]);
                        foreach ($sizes as $sizeKey => $size) {
                            $sizeID = $this->db->query("SELECT `size_id` FROM `size` WHERE `name` = '$size' LIMIT 1");
                            $sizeID = $sizeID->result();
                            foreach ($sizeID as $sizeId):
                                $SizeID = $sizeId->size_id;
                            endforeach;
                            if ($sizeKey == 0) {
                                $Size_IDs = $SizeID;
                            }
                            else{
                                $Size_IDs = ','.$SizeID;
                            }
                        }
                        $insert_csv['size'] = $Size_IDs;
                    }
                    else{
                        $insert_csv['size'] = $csv_line[12];
                    }
                    if (strlen($csv_line[13]) > 0) {
                        $sizes = explode(',', $csv_line[13]);
                        foreach ($sizes as $sizeKey => $size) {
                            $size = explode('-', $size);
                            $sizeID = $this->db->query("SELECT `size_id` FROM `size` WHERE `name` = '".$size[0]."' LIMIT 1");
                            $sizeID = $sizeID->result();
                            foreach ($sizeID as $sizeId):
                                $SizeID = $sizeId->size_id;
                            endforeach;
                            if ($sizeKey == 0) {
                                $Size_Price = $SizeID.'-'.$size[1];
                            }
                            else{
                                $Size_Price = ','.$SizeID.'-'.$size[1];
                            }
                        }
                        $insert_csv['size_price'] = $Size_Price;
                    }
                    else{
                        $insert_csv['size_price'] = $csv_line[13];
                    }

                    if (strlen($csv_line[14]) > 0) {
                        $colors = explode(',', $csv_line[14]);
                        foreach ($colors as $colorKey => $color) {
                            $colorID = $this->db->query("SELECT `color_id` FROM `color` WHERE `name` = '$color' LIMIT 1");
                            $colorID = $colorID->result();
                            foreach ($colorID as $colorId):
                                $ColorID = $colorId->color_id;
                            endforeach;
                            if ($colorKey == 0) {
                                $Color_IDs = $ColorID;
                            }
                            else{
                                $Color_IDs = ','.$ColorID;
                            }
                        }
                        $insert_csv['color'] = $Color_IDs;
                    }
                    else{
                        $insert_csv['color'] = $csv_line[14];
                    }
                    if (strlen($csv_line[15]) > 0) {
                        $colors = explode(',', $csv_line[14]);
                        foreach ($colors as $colorKey => $color) {
                            $color = explode('-', $color);
                            $colorID = $this->db->query("SELECT `color_id` FROM `color` WHERE `name` = '".$color[0]."' LIMIT 1");
                            $colorID = $colorID->result();
                            foreach ($colorID as $colorId):
                                $ColorID = $colorId->color_id;
                            endforeach;
                            if ($colorKey == 0) {
                                $Color_Price = $ColorID.'-'.$color[1];
                            }
                            else{
                                $Color_Price = ','.$ColorID.'-'.$color[1];
                            }
                        }
                        $insert_csv['color_price'] = $Color_Price;
                    }
                    else{
                        $insert_csv['color_price'] = $csv_line[15];
                    }

                    $insert_csv['filter_price_show'] = $csv_line[16];
                    $insert_csv['warranty'] = $csv_line[17];
                    $insert_csv['sku'] = $csv_line[18];
                    for ($a=26; $a < count($csv_line); $a++) {
                        $Heading = $heading[$a];
                        if ($a == 26) {
                            $dynamic_filters = $csv_line[$a];
                        }
                        else{
                            $dynamic_filters .= ','.$csv_line[$a];
                        }
                        $filters = $this->db->query("SELECT `filter_id` FROM `filter` WHERE `title` = '$Heading' LIMIT 1");
                        $filters = $filters->result();
                        foreach ($filters as $filter):
                            $FilterID = $filter->filter_id;
                        endforeach;
                        $DynamicFilters = explode(',', $dynamic_filters);
                        $DynamicFilterQuery = '';
                        foreach ($DynamicFilters as $keyKey2 => $DynamicFilter) {
                            if ($keyKey2 == 0) {
                                $DynamicFilterQuery .= "`title` = '".$DynamicFilter."' ";
                            }
                            else{
                                $DynamicFilterQuery .= "OR `title` = '".$DynamicFilter."' ";
                            }
                        }
                        $filterValues = $this->db->query("SELECT `filter_value_id` FROM `filter_value` WHERE ($DynamicFilterQuery) AND `filter_id` = '$FilterID';");
                        $filterValues = $filterValues->result();
                        foreach ($filterValues as $Fkey => $value):
                            if ($Fkey == 0 && $a == 26) {
                                $FilterIDz = $value->filter_value_id;
                            }
                            else{
                                $FilterIDz .= ','.$value->filter_value_id;
                            }
                        endforeach;
                    }
                }
                $i++;

                if (!(strlen($FilterIDz) > 0) && !(isset($FilterIDz))) {
                    $FilterIDz = 0;
                }

                /*$BrandID = $insert_csv['brand_id'];
                $brands = $this->db->query("SELECT `brand_id` FROM `brand` WHERE `title` = '$BrandID' LIMIT 1");
                $brands = $brands->result();
                foreach ($brands as $brand):
                    $BrandID = $brand->brand_id;
                endforeach;*/
                $slug = $this->clean($insert_csv['product_name']);
                $data = array(
                    'product_id' => "" ,
                    'product_name' => $insert_csv['product_name'],
                    'slug' => $slug,
                    'product_description' => $insert_csv['product_description'],
                    'product_image' => $insert_csv['product_image'],
                    'category_id' => $categoryId,
                    'in_stock' => $insert_csv['in_stock'],
                    'price' => $insert_csv['price'] - $insert_csv['discount'],
                    'unit_value' => $insert_csv['unit_value'],
                    'unit' => $insert_csv['unit'],
                    'increament' => $insert_csv['increament'],
                    'rewards' => $insert_csv['rewards'],
                    'urdu_title' => $insert_csv['urdu_title'],
                    'brand_id' => $BrandID['brand_id'],
                    'size' => $insert_csv['size'],
                    'color' => $insert_csv['color'],
                    'warranty' => $insert_csv['warranty'],
                    'sku' => $insert_csv['sku'],
                    'dynamic_filters' => $FilterIDz
                );

                //Meta Data
                $Brand = $this->model->get_row("SELECT `title` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."'");
                $Category = $this->model->get_row("SELECT `title` FROM `categories` WHERE `id` = '$categoryId'");
                //meta_title
                $meta_title = $this->model->get_setting_byid(9);
                $meta_title = str_replace('[product]', $insert_csv['product_name'], $meta_title['value']);
                $meta_title = str_replace('[brand]', $Brand['title'], $meta_title);
                $meta_title = str_replace('[category]', $Category['title'], $meta_title);
                $_POST['meta_title'] = $meta_title;

                //meta_key
                $meta_key = $this->model->get_setting_byid(10);
                $meta_key = str_replace('[product]', $insert_csv['product_name'], $meta_key['value']);
                $meta_key = str_replace('[brand]', $Brand['title'], $meta_key);
                $meta_key = str_replace('[category]', $Category['title'], $meta_key);
                $_POST['meta_key'] = $meta_key;

                //meta_desc
                $meta_desc = $this->model->get_setting_byid(11);
                $meta_desc = str_replace('[product]', $insert_csv['product_name'], $meta_desc['value']);
                $meta_desc = str_replace('[brand]', $Brand['title'], $meta_desc);
                $meta_desc = str_replace('[category]', $Category['title'], $meta_desc);
                $_POST['meta_desc'] = $meta_desc;



                $data['crane_features']=$this->db->insert('products', $data);
                $in_id=$this->db->insert_id();
                $date=date('Y-m-d h:i:s');

                $CatId = $csv_line[3];
                $CatTags = $this->db->query("SELECT `cat_tag_id`,`name` FROM `cat_tag` WHERE `category_id` = '$CatId' ORDER BY `cat_tag_id` ASC");
                $CatTags = $CatTags->result();
                $keyForCatTag = 0;
                for ($i=19; $i < 26; $i++) {
                    if (strlen($csv_line[$i]) > 0) {
                        $CatTagInsert['product_id'] = $in_id;
                        $CatTagInsert['cat_tag_id'] = $CatTags[$keyForCatTag]->cat_tag_id;
                        $CatTagInsert['value'] = $csv_line[$i];
                        $this->db->insert("product_tag",$CatTagInsert);
                    }
                    $keyForCatTag++;
                }
            }
            fclose($fp) or die("can't close file");
            redirect('seller/products?error=0&msg=products uploaded');
        }
    }
    public function download_products_pricing()
    {
        $user = $this->check_login();
        $BrandID = $this->model->get_row("SELECT `brand_id`,`title` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        if ($BrandID) {
            $data = array("Product ID","Product Name","Price");
            $products = $this->model->get_results("SELECT `product_id`,`product_name`,`price` FROM `products` WHERE `brand_id` = '".$BrandID['brand_id']."' ORDER BY `product_id` ASC;");
            $file = date('d-m-y H-i-s').'_'.str_replace(' ', '-', $BrandID['title']).'_products-prices.csv';
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="'.$file.'"');

            $fp = fopen('php://output', 'w');
            fputcsv($fp, $data);
            foreach ($products as $row) {
                $product[0] = $row['product_id'];
                $product[1] = $row['product_name'];
                $product[2] = $row['price'];
                fputcsv($fp, $product);
            }
            fclose($fp);
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"you have no brand yet"));
        }
    }
    public function download_list_products_pricing($list)
    {
        $user = $this->check_login();
        $BrandID = $this->model->get_row("SELECT `brand_id`,`title` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        if ($BrandID) {
            $data = array("Product ID","Product Name","Price");
            $products = $this->model->get_results("SELECT `product_id`,`product_name`,`price` FROM `products` WHERE `seller_listing_id` = '$list' ORDER BY `product_id` ASC;");
            $file = date('d-m-y H-i-s').'_'.str_replace(' ', '-', $BrandID['title']).'_products-prices.csv';
            header('Content-Type: application/csv');
            header('Content-Disposition: attachment; filename="'.$file.'"');

            $fp = fopen('php://output', 'w');
            fputcsv($fp, $data);
            foreach ($products as $row) {
                $product[0] = $row['product_id'];
                $product[1] = $row['product_name'];
                $product[2] = $row['price'];
                fputcsv($fp, $product);
            }
            fclose($fp);
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"you have no brand yet"));
        }
    }
    public function products_pricing_csv_upload($value='')
    {
        $user = $this->check_login();
        $BrandID = $this->model->get_row("SELECT `brand_id` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        if ($BrandID) {
            $count=0;
            $fp = fopen($_FILES['csv']['tmp_name'],'r') or die("can't open file");
            while($csv_line = fgetcsv($fp,1024))
            {
                $count++;
                if($count == 1)
                {
                    continue;
                }//keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {
                    $id = $csv_line[0];
                    $name = $csv_line[1];
                    $price = $csv_line[2];
                }
                $i++;
                $this->db->where('product_id', $id);
                $this->db->where('brand_id', $BrandID['brand_id']);
                $this->db->update('products', array("price"=>$price,"product_name"=>$name));
            }
            fclose($fp) or die("can't close file");
            redirect('seller/products');
            
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"you have no brand yet"));
        }
    }
    public function create_bulk_products_csv_file($id)
    {
        $filters = $this->model->get_row("SELECT `id`,`title`,`filter_ids` FROM `categories` WHERE `id` = '$id';");
        $data = 'Product Name,Product Description,Product Image,'.$filters['id'].',In Stock,Price,Unit Value,Unit,Increament,Rewards,Urdu Title,Brand,Size,size_price,color,color_price,filter_price_show,Warranty,SKU,Tag 1,Tag 2,Tag 3,Tag 4,Tag 5,Tag 6,Tag 7';
        // $data = 'Product Name,Product Description,Product Image,Category Id,In Stock,Price,Unit Value,Unit,Increament,Rewards,Urdu Title,Brand,Size,size_price,color,color_price,filter_price_show,Warranty,SKU,Tag 1,Tag 2,Tag 3,Tag 4,Tag 5,Tag 6,Tag 7';
        $file = str_replace(' ', '-', $filters['title']).'.csv';
        if (strlen($filters['filter_ids']) > 0) {
            $ids = $filters['filter_ids'];
            $filters = $this->model->get_results("SELECT `title` FROM `filter` WHERE `filter_id` IN($ids) ORDER BY `title` ASC;");
            if ($filters) {
                foreach ($filters as $key => $q) {
                    $data .= ','.$q['title'];
                }
            }
        }
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$file.'"');
        echo $data; exit();
    }
    /**
    *

    @AJAX PHOTO
        
    *
    */
    public function post_photo_ajax()
    {
        $user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = 'uploads/seller/';
        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
			$config['file_name'] = $new_name;
			//$this->load->library('upload', $config);
            $this->upload->initialize($config);
        	if ($this->upload->do_upload('img'))
        	{
	        	$img = $this->upload->data()['file_name'];
	        	echo json_encode(array("status"=>true,"data"=>$img));
        	}
        	else{
	        	echo json_encode(array("status"=>false));
        	}

		}
		else{
			redirect('seller/logout');
		}
	}
	public function post_brand_logo_ajax()
    {
        $user = $this->check_login();
        if ($_FILES){
            $config['upload_path'] = UPLOADS_TO.'category/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
            $config['encrypt_name'] = TRUE;
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
            $config['file_name'] = $new_name;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $img = $this->upload->data()['file_name'];
                $update['image'] = $img;
                $this->db->where('seller_id',$user['seller_id']);
                $this->db->update('brand',$update);
                echo json_encode(array("status"=>true,"data"=>$img));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            redirect('seller/logout');
        }
    }
    public function post_brand_banner_ajax()
	{
		$user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = UPLOADS_TO.'category/';
        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
			$config['file_name'] = $new_name;
			//$this->load->library('upload', $config);
            $this->upload->initialize($config);
        	if ($this->upload->do_upload('img'))
        	{
	        	$img = $this->upload->data()['file_name'];
	        	$update['banner'] = $img;
	        	$this->db->where('seller_id',$user['seller_id']);
	        	$this->db->update('brand',$update);
	        	echo json_encode(array("status"=>true,"data"=>$img));
        	}
        	else{
	        	echo json_encode(array("status"=>false));
        	}
		}
		else{
			redirect('seller/logout');
		}
	}
    public function post_brand_ad_1_ajax()
    {
        $user = $this->check_login();
        if ($_FILES){
            $config['upload_path'] = UPLOADS_TO.'category/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
            $config['encrypt_name'] = TRUE;
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
            $config['file_name'] = $new_name;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $img = $this->upload->data()['file_name'];
                $update['ad_1'] = $img;
                $this->db->where('seller_id',$user['seller_id']);
                $this->db->update('brand',$update);
                echo json_encode(array("status"=>true,"data"=>$img));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            redirect('seller/logout');
        }
    }
    public function post_brand_ad_2_ajax()
    {
        $user = $this->check_login();
        if ($_FILES){
            $config['upload_path'] = UPLOADS_TO.'category/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
            $config['encrypt_name'] = TRUE;
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
            $config['file_name'] = $new_name;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $img = $this->upload->data()['file_name'];
                $update['ad_2'] = $img;
                $this->db->where('seller_id',$user['seller_id']);
                $this->db->update('brand',$update);
                echo json_encode(array("status"=>true,"data"=>$img));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            redirect('seller/logout');
        }
    }
    public function post_brand_slide_1_ajax()
    {
        $user = $this->check_login();
        if ($_FILES){
            $config['upload_path'] = UPLOADS_TO.'category/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
            $config['encrypt_name'] = TRUE;
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
            $config['file_name'] = $new_name;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $img = $this->upload->data()['file_name'];
                $update['slide_1'] = $img;
                $this->db->where('seller_id',$user['seller_id']);
                $this->db->update('brand',$update);
                echo json_encode(array("status"=>true,"data"=>$img));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            redirect('seller/logout');
        }
    }
    public function post_brand_slide_2_ajax()
    {
        $user = $this->check_login();
        if ($_FILES){
            $config['upload_path'] = UPLOADS_TO.'category/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
            $config['encrypt_name'] = TRUE;
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
            $config['file_name'] = $new_name;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $img = $this->upload->data()['file_name'];
                $update['slide_2'] = $img;
                $this->db->where('seller_id',$user['seller_id']);
                $this->db->update('brand',$update);
                echo json_encode(array("status"=>true,"data"=>$img));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            redirect('seller/logout');
        }
    }
    public function post_brand_slide_3_ajax()
    {
        $user = $this->check_login();
        if ($_FILES){
            $config['upload_path'] = UPLOADS_TO.'category/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
            $config['encrypt_name'] = TRUE;
            $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            $new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
            $config['file_name'] = $new_name;
            //$this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img'))
            {
                $img = $this->upload->data()['file_name'];
                $update['slide_3'] = $img;
                $this->db->where('seller_id',$user['seller_id']);
                $this->db->update('brand',$update);
                echo json_encode(array("status"=>true,"data"=>$img));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            redirect('seller/logout');
        }
    }
    public function update_brand_about()
    {
        $user = $this->check_login();
        $this->db->where('seller_id',$user['seller_id']);
        $this->db->update('brand',$_POST);
        echo json_encode(array("status"=>true));
    }
	public function post_profile_img_ajax()
	{
		$user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = 'uploads/seller/';
        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
			$config['file_name'] = $new_name;
			//$this->load->library('upload', $config);
            $this->upload->initialize($config);
        	if ($this->upload->do_upload('img'))
        	{
	        	$img = $this->upload->data()['file_name'];
	        	$update['profile_img'] = $img;
	        	$this->db->where('seller_id',$user['seller_id']);
	        	$this->db->update('seller',$update);
	        	echo json_encode(array("status"=>true,"data"=>$img));
        	}
        	else{
	        	echo json_encode(array("status"=>false,"msg"=>"please try again"));
        	}
		}
		else{
			redirect('seller/logout');
		}
	}
	/**
	*

		@AJAX

	*
	*/
	public function get_cat_tags()
    {
		$id = $_POST['cat'];
		$tags = $this->model->get_results("SELECT * FROM `cat_tag` WHERE `category_id` = '$id';");
		if ($tags) {
			$html = '';
			foreach ($tags as $key => $q) {
			    $html .= '<div class="l-info">';
	  				$html .= '<label>'.$q['name'].'</label>';
					$html .= '<input type="hidden" name="cat_tag_id[]" value="'.$q['cat_tag_id'].'"/>';
					$html .= '<input type="text" name="cat_tag_value[]"/>';
	  			$html .= '</div><!-- /l-info -->';
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false));
		}
    }
    public function get_states()
    {
    	$user = $this->check_login();
    	if ($_POST) {
	   		$resp = $this->model->states($_POST['country']);
	   		if ($resp) {
	   			$html = '<option value="">Select State</option>';
	   			foreach ($resp as $key => $q) {
	   				$html .= '<option value="'.$q['state_id'].'">'.$q['name'].'</option>';
	   			}
	   			echo json_encode(array("status"=>true,"html"=>$html));
	   		}
	   		else{
	   			echo json_encode(array("status"=>false,"msg"=>"no state found"));
	   		}
    	}
    }
    public function get_cities()
    {
    	$user = $this->check_login();
    	if ($_POST) {
	   		$resp = $this->model->cities($_POST['state']);
	   		if ($resp) {
	   			$html = '<option value="">Select City</option>';
	   			foreach ($resp as $key => $q) {
	   				$html .= '<option value="'.$q['city_id'].'">'.$q['name'].'</option>';
	   			}
	   			echo json_encode(array("status"=>true,"html"=>$html));
	   		}
	   		else{
	   			echo json_encode(array("status"=>false,"msg"=>"no city found"));
	   		}
    	}
    }
    public function get_child_cats()
    {
        if (isset($_POST['id']) && strlen($_POST['id']) > 0) {
            $id = $_POST['id'];
            $resp = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '$id' ORDER BY `title` ASC;");
            if ($resp) {
                $next = explode('-', $_POST['blockID']);
                $next = $next[1];
                if ($_POST['child'] == 'yes') {
                    $html = '<div class="l-info child-cat-remove-before-append">';
                }
                else{
                    $html = '<div class="l-info ">';
                }
                    $html .= '<label>Select Category<em>*</em></label>';
                    $html .= '<select class="text-input category-select-tag category-select-tag-dynamic" id="'.$_POST['blockID'].'" data-id="'.$next.'" required="required">';
                        $html .= '<option value="">Select Catgory</option>';
                        foreach ($resp as $key => $q) {
                            $filters = explode(',', $q['filters']);
                            if (in_array('size', $filters)) {
                                $SizesFilter = 'true';
                            }
                            else{
                                $SizesFilter = 'false';
                            }
                            if (in_array('color', $filters)) {
                                $ColorsFilter = 'true';
                            }
                            else{
                                $ColorsFilter = 'false';
                            }
                            $html .= '<option value="'.$q['id'].'" data-size="'.$SizesFilter.'" data-color="'.$ColorsFilter.'" data-filter-ids="'.$q['filter_ids'].'">'.$q['title'].'</option>';
                        }
                    $html .= '</select>';
                $html .= '</div>';
                echo json_encode(array("status"=>true,"html"=>$html));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
    }
    public function get_child_cats_for_bulk()
    {
        if (isset($_POST['id']) && strlen($_POST['id']) > 0) {
            $id = $_POST['id'];
            $checkLevel = $this->model->get_row("SELECT `leval` FROM `categories` WHERE `id` = '$id';");
            $resp = $this->model->get_results("SELECT * FROM `categories` WHERE `parent` = '$id' ORDER BY `title` ASC;");
            if ($resp) {
                if ($checkLevel['leval'] == '1') {
                    $class = ' remove-me-before-new-call';
                }
                else{
                    $class = '';
                }
                $html = '<div class="form-group'.$class.'">';
                    $html .= '<label>Select Category<em>*</em></label>';
                    $html .= '<select class="form-control category-select-tag-dynamic-bulk" required="required">';
                        $html .= '<option value="">Select Catgory</option>';
                        foreach ($resp as $key => $q) {
                            $html .= '<option value="'.$q['id'].'">'.$q['title'].'</option>';
                        }
                    $html .= '</select>';
                $html .= '</div>';
                echo json_encode(array("status"=>true,"html"=>$html));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
    }
    public function get_cat_tags2()
    {
       if(_is_user_login($this)){
           $id = $_POST['cat'];
           $tags = $this->get_results("SELECT * FROM `cat_tag` WHERE `category_id` = '$id';");
           if ($tags) {
                $html = '';
               foreach ($tags as $key => $q) {
                    $html .= '<div class="row"  style="margin-top:50px">';
                        $html .= '<label class="col-md-3 label-on-left">'.$q['name'].' :</label>';
                        $html .= '<div class="col-md-9">';
                            $html .= '<div class="form-group label-floating is-empty">';
                                $html .= '<label class="control-label"></label>';
                                $html .= '<input type="hidden" name="cat_tag_id[]" value="'.$q['cat_tag_id'].'"/>';
                                $html .= '<input type="text" name="cat_tag_value[]" class="form-control"/>';
                            $html .= '<span class="material-input"></span></div>';
                        $html .= '</div>';
                    $html .= '</div>';
               }
               echo json_encode(array("status"=>true,"html"=>$html));
           }
           else{
            echo json_encode(array("status"=>true));
           }
        }
        else
        {
            redirect('admin');
        }
    }
    public function get_filter_values_html()
    {
        $id = $_POST['id'];
        if (isset($id) && strlen($id) > 0) {
            $resp = $this->model->get_results("SELECT `filter_id`,`title` FROM `filter` WHERE `filter_id` IN($id) AND `status` = 'active' ORDER BY `title`;");
        }
        else{
            $resp = false;
        }
        if ($resp) {
            $html = '';
            foreach ($resp as $key => $Filter) {
                $FilterID = $Filter['filter_id'];
                $values = $this->model->get_results("SELECT `filter_value_id`,`title` FROM `filter_value` WHERE `filter_id` = '$FilterID' AND `status` = 'active' ORDER BY `title`;");
                if ($values) {
                    $html .= '<h1>'.$Filter['title'].'</h1>';
                    $html .= '<div class="dynamic-filter-x-class">';
                        $html .= '<div class="l-info">';
                            $html .= '<input class="styled-checkbox" type="checkbox" id="check-all-tags-seller-'.$key.'" value="1" checked="checked">';
                            $html .= '<label for="check-all-tags-seller-'.$key.'" class="check-all-tags-seller">All</label>';
                        $html .= '</div>';
                        foreach ($values as $key => $filter){
                            $html .= '<div class="l-info">';
                                $html .= '<input class="styled-checkbox" id="styled-checkbox-'.$filter['filter_value_id'].'-101" type="checkbox" name="filter_value_id[]" value="'.$filter['filter_value_id'].'" checked="checked">';
                                $html .= '<label for="styled-checkbox-'.$filter['filter_value_id'].'-101">'.$filter['title'].'</label>';
                            $html .= '</div>';
                        }
                    $html .= '</div>';
                }
            }
            echo json_encode(array("status"=>true,"html"=>$html));
        }
        else{
            echo json_encode(array("status"=>false));
        }
    }
    public function get_seller_products_ajax()
    {
        $user = $this->check_login();
        $BrandID = $this->model->get_row("SELECT `brand_id` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        if ($_POST['id'] > 0) {
            $products = $this->model->get_products_seller_products_by_catid($BrandID['brand_id'],$_POST['id']);
            $count = $this->model->get_seller_category_products_count($BrandID['brand_id'],$_POST['id']);
        }
        else{
            $products = $this->model->get_products_by_brand($BrandID['brand_id']);
            $count = $this->model->get_seller_products_count($BrandID['brand_id']);
        }
        $count['all']['count'] = count($products);
        $html .= '';
        if ($products) {
            foreach ($products as $key => $product){
                $html .= '<tr>';
                    $html .= '<td>'.$product['product_name'].'</td>';
                    $html .= '<td>'.$product['sku'].'</td>';
                    $html .= '<td>'.$product['price'].'</td>';
                    $html .= '<td><img src="'.UPLOADS_PRO.$product['product_image'].'/'.$product['product_image'].'" width="150"></td>';
                    $html .= '<td>'.$product['ratting'].'</td>';
                    $html .= '<td>'.$product['reviews'].'</td>';
                    $html .= '<td><a href="'.BASEURL.'seller/edit-product/'.$product['product_id'].'">Edit</a></td>';
                $html .= '</tr>';
            }
            echo json_encode(array("status"=>true,"html"=>$html,"count"=>$count));
        }
        else{
            $html .= '<tr>';
                $html .= '<td colspan="7">No Product Found</td>';
            $html .= '</tr>';
            echo json_encode(array("status"=>false,"html"=>$html));
        }
    }
    public function get_product_images()
    {
        $user = $this->check_login();
        $product = $this->model->get_product_byid($_POST['id']);
        $images = $this->model->get_results("SELECT * FROM `product_image` WHERE `product_id` = '".$_POST['id']."';");
        if ($images) {
            $html = '';
            foreach ($images as $key => $q) {
                $html .= '<tr>';
                    $html .= '<td><img width="200px" src="'.UPLOADS_PRO.$product['category_id'].'/'.$q['image'].'" /></td>';
                    $html .= '<td><a href="javascript://" class="delete-product-image btn btn-danger" data-id="'.$q['product_image_id'].'">Delete</a></td>';
                $html .= '</tr>';
            }
            echo json_encode(array("status"=>true,"html"=>$html,"category_id"=>$product['category_id']));
        }
        else{
            echo json_encode(array("status"=>false));
        }
    }
    public function delete_product_image()
    {
        $id = $_POST['id'];
        $user = $this->check_login();
        $BrandID = $this->model->get_row("SELECT `brand_id` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        $ProductId = $this->model->get_row("
            SELECT images.product_id, p.brand_id 
            FROM `product_image` AS images 
            INNER JOIN `products` AS p ON images.product_id = p.product_id 
            WHERE images.product_image_id = '$id';");
        if ($ProductId['brand_id'] == $BrandID['brand_id']) {
            $id = $_POST['id'];
            $resp = $this->db->query("delete from product_image where product_image_id = '".$id."' AND product_id = '".$ProductId['product_id']."'");
            if ($resp) {
                echo json_encode(array("status"=>true));
            }
            else{
                echo json_encode(array("status"=>false,"msg"=>"not deleted, please try again or reload youyr web page."));
            }   
        }
        else
        {
            echo json_encode(array("status"=>false,"msg"=>"not deleted, please try again or reload youyr web page."));
        }
    }
    public function upload_product_images_2()
    {
        #working
        if ($_FILES){
            for ($i=0; $i < count($_FILES); $i++) { 
                $config['upload_path'] = UPLOADS_TO.'products/';
                $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG';
                $config['encrypt_name'] = FALSE;
                $config['file_name'] = $_FILES['img'.$i]['name'];
                $this->upload->initialize($config);
                $this->upload->do_upload('img'.$i);
            }
            echo json_encode(array("status"=>true,"msg"=>"images uploaded :)"));
        }
    }
    public function upload_product_images($id)
    {
        if ($_FILES){
            for ($i=0; $i < count($_FILES); $i++) { 
                $config['upload_path'] = UPLOADS_TO.'products/'.$_POST['category_id'].'/';
                $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG';
                $config['encrypt_name'] = TRUE;
                $ext = pathinfo($_FILES['img'.$i]['name'], PATHINFO_EXTENSION);
                $new_name = md5(time().$_FILES['img'.$i]['name']).'.'.$ext;
                $config['file_name'] = $new_name;

                $this->upload->initialize($config);
                if ($this->upload->do_upload('img'.$i))
                {
                    $final[$i]['img'] = $this->upload->data()['file_name'];
                }
            }
            if (count($final) > 0) {
                foreach ($final as $key => $img) {
                    $post['product_id'] = $id;
                    $post['image'] = $img['img'];
                    $this->db->insert('product_image',$post);
                }
                $images = $this->model->get_results("SELECT * FROM `product_image` WHERE `product_id` = '$id';");
                if ($images) {
                    $html = '';
                    foreach ($images as $key => $q) {
                        $html .= '<tr>';
                            $html .= '<td><img width="200px" src="'.UPLOADS_PRO.$q['image'].'" /></td>';
                            $html .= '<td><a href="javascript://" class="delete-product-image btn btn-danger" data-id="'.$q['product_image_id'].'">Delete</a></td>';
                        $html .= '</tr>';
                    }
                    echo json_encode(array("status"=>true,"html"=>$html));
                }
                else{
                    echo json_encode(array("status"=>false));
                }
            }
            else {
                echo json_encode(array("status"=>false,"data"=>'Images not uploaded, please try again or reload your webpage or check your internet connection'));
            }
        }
    }
    public function delete_product()
    {
        $user = $this->check_login();
        $brand = $this->model->get_row("SELECT `brand_id` FROM `brand` WHERE `seller_id` = '".$user['seller_id']."';");
        $id = $_GET['id'];
        $brandID = $brand['brand_id'];
        $productID = $_GET['id'];
        //seller_listing_id
        $list = $this->model->get_row("SELECT `seller_listing_id` FROM `products` WHERE `product_id` = '$productID' AND `brand_id` = '$brandID';");
        if ($list) {
            $listID = $list['seller_listing_id'];
            $this->db->where('product_id',$productID);
            $this->db->where('brand_id',$brandID);
            $this->db->delete('products');
            if (intval($listID) > 0) {
                $listID = intval($listID);
                $this->db->query("UPDATE `seller_listing` SET `count`=`count`-1 WHERE `seller_listing_id` = '$listID'");
            }
            redirect('seller/products/?error=0&msg=product deleted.');
        }
        else{
            redirect('seller/products/');
        }
    }
    public function get_sizes_by_cat()
    {
        if ($_POST) {
            $id = $_POST['id'];
            $cat = $this->model->get_row("SELECT `id`,`sizes`,`title` FROM `categories` WHERE `id`= '$id';");
            if ($cat) {
                $cat['sizes'] = trim($cat['sizes']);
                $catsizes = explode(',', $cat['sizes']);
                $sizes = $this->model->get_results("SELECT `size_id`,`name` FROM `size` ORDER BY `name` ASC;");

                if (strlen($catsizes[0]) > 0) {
                    $html = '<h1>Size</h1>';
                    foreach ($sizes as $key => $q) {
                        if (in_array($q['size_id'], $catsizes)) {
                            $html .= '<div class="l-info size-info">';
                                $html .= '<div class="form-group">';
                                    $html .= '<div class="size_holder">';
                                        $html .= '<span class="dummy">Size</span>';
                                        $html .= '<div class="dummy-holder">';
                                            $html .= '<div class="check-size">';
                                                $html .= '<input class="styled-checkbox" id="styled-checkbox-'.$q['size_id'].'" type="checkbox" value="'.$q['size_id'].'" name="size[]">';
                                                $html .= '<label for="styled-checkbox-'.$q['size_id'].'">'.$q['name'].'</label>';
                                            $html .= '</div>';
                                            $html .= '<div class="price_frame">';
                                                $html .= '<span>Price</span>';
                                                $html .= '<input type="text" data-name="size_price'.$q['size_id'].'" class="size-price size-filter-price" value="0"> &nbsp;&nbsp;';
                                            $html .= '</div>';
                                        $html .= '</div>';
                                    $html .= '</div>';
                                $html .= '</div>';
                            $html .= '</div><!-- /l-info -->';
                            $html .= '<div class="l-info price-info" style="display: none;"> <!-- none -->';
                                $html .= '<label>Price</label>';
                                $html .= '<input type="text" data-name="size_price'.$q['size_id'].'" class="size-price size-filter-price" value="0"> &nbsp;&nbsp;';
                            $html .= '</div><!-- /l-info -->';
                        }
                    }
                    echo json_encode(array("status"=>true,"html"=>$html));
                }
                else{
                    echo json_encode(array("status"=>false));
                }

            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
    }
    public function get_colors_by_cat()
    {
        if ($_POST) {
            $id = $_POST['id'];
            $cat = $this->model->get_row("SELECT `id`,`colors`,`title` FROM `categories` WHERE `id`= '$id';");
            if ($cat) {
                $cat['colors'] = trim($cat['colors']);
                $catColors = explode(',', $cat['colors']);
                if (strlen($catColors[0]) > 0) {
                    $colors = $this->model->get_results("SELECT `color_id`,`name` FROM `color` ORDER BY `name` ASC;");
                    $html = '<div class="color-column"></div>';
                    foreach ($colors as $key => $q) {
                        if (in_array($q['color_id'], $catColors)) {
                            $html .= '<div class="l-info">';
                                $html .= '<div class="form-group label-floating is-empty">';
                                    $html .= '<div class="color-check-box">';
                                        $html .= '<input class="styled-checkbox" id="color-styled-checkbox-'.$q['color_id'].'" type="checkbox" value="'.$q['color_id'].'" name="color[]">';
                                        $html .= '<label for="color-styled-checkbox-'.$q['color_id'].'">'.$q['name'].'</label>';
                                    $html .= '</div>';
                                $html .= '</div>';
                            $html .= '</div><!-- /l-info -->';
                            $html .= '<div class="l-info">';
                                $html .= '<label>Price</label>';
                                $html .= '<input type="text" data-name="color_price'.$q['color_id'].'" class="form-control color-price color-filter-price" value="0"> &nbsp;&nbsp;';
                            $html .= '</div><!-- /l-info -->';
                            $html .= '<div class="l-info info-color-box">';
                                $html .= '<label  style="background:'.$q['name'].';color: '.$q['font_color'].';">'.$q['name'].' Image';
                                    $html .= '<input type="file" name="color_file'.$q['color_id'].'">';
                                $html .= '</label> ';
                            $html .= '</div><!-- /l-info-->';
                        }
                    }
                    echo json_encode(array("status"=>true,"html"=>$html));
                }
                else{
                    echo json_encode(array("status"=>false));
                }
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
    }


    /**
     * 
     * 
     * @ ADMIN LOGIN
     * 
     * 
     * 
     * **/
    public function brand_login()
    {
        die;
        $data['meta_title'] = 'Login';
        $this->load->view('seller/brand_login',$data);
    }


	/**
	*

		@IN-CLASS

	*
	*/
	private function clean($string) {
        $string = str_replace(' ', '-', $string);
        $string = str_replace('&', '-', $string);
        $string = str_replace('/', '-', $string);
        $string = str_replace('%', '-', $string);
        $string = str_replace('(', '-', $string);
        $string = str_replace(')', '-', $string);
        $string = str_replace('{', '-', $string);
        $string = str_replace('}', '-', $string);
        $string = str_replace('[', '-', $string);
        $string = str_replace(']', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }
    private function get_cat_tags_edit($tags)
    {
        $html = '';
        foreach ($tags as $key => $q) {
            $html .= '<div class="l-info">';
  				$html .= '<label>'.$q['name'].'</label>';
				$html .= '<input type="hidden" name="cat_tag_id[]" value="'.$q['cat_tag_id'].'"/>';
				$html .= '<input type="text" name="cat_tag_value[]" value="'.$q['value'].'"/>';
  			$html .= '</div><!-- /l-info -->';
        }
        return $html;
    }
	/**
	*

		@TEST

	*
	*/
	public function test()
	{
        die;
        //unzip folder
        $zip = new ZipArchive;
        $zip->open(UPLOADS_TO.'products/new.zip');
        $resp = $zip->extractTo(UPLOADS_TO.'products');
		die;
		$query = $this->db->query('UPDATE `phase` SET `count`=`count`+1 WHERE `phase_id` = 1');
	}

}
