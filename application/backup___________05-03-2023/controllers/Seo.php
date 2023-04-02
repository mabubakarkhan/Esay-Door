<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends CI_Controller {
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
	// ================ SK START 
	public function changeImagename(){
       // echo 'fhdgfhgf'; die ; 
        $orders2 = $this->model->get_results("SELECT product_id , product_image FROM `products` WHERE  1=1");
        foreach ($orders2 as $key => $order) {
            $ext =  explode("." , $order['product_image']) ;         
            $imgname = $order['product_image'].'.jpg' ;
            
            if(empty($ext[1])){
               // echo $imgname ; die ; 
                //echo "UPDATE  products SET product_image = '".$imgname."' WHERE product_id = '".$order['product_id']."' "  ;  
                //$this->db->query("UPDATE  products SET product_image = '".$imgname."' WHERE product_id = '".$order['product_id']."' " ) ; 
                $update['product_image'] = $imgname;
                $this->db->where('product_id',$order['product_id']);
                
		    	$resp = $this->db->update('products',$update);
                
                
            }
                
            }
        }
    public function setmetatitle(){
        $orders2 = $this->model->get_results("SELECT category_id , brand_id ,  product_id , product_name FROM `products` WHERE  1=1");
        foreach ($orders2 as $key => $order) {
            
            $brand = $this->model->get_row("SELECT `title` FROM `brand` WHERE `brand_id` = '".$order['brand_id']."'");
            $catid = $this->model->get_row("SELECT title  FROM `categories` WHERE `id` = '".$order['category_id']."'");
           $proname =  strlen($order['product_name']) ;
            $bname =  strlen($brand['title']) ;
            $metatitle = $order['product_name'];
            $brandtitle = $brand['title'];
            if($proname >=23){
                $metatitle = substr($order['product_name'], 0, 23);
                
            }
             $metatitle = "Buy ".$metatitle ; 
           if ($bname >=12){
               $brandtitle = substr($brand['title'], 0, 12);
            }
            $brandtitle = " | Shop ".$brandtitle." at Easydoor.pk ";
            
           $metades =  "Get the latest ".$order['product_name']." of ".$brand['title']." from ".$catid['title']." with best features and quality. Shop now from ".$brand['title']." at easydoor.pk and enjoy free shipping.";
           
           $metakeywords = "".$order['product_name'].", ".$order['product_name']." ".$brand['title'].", ".$brand['title']." ".$order['product_name'].", ".$order['product_name']. "easydoor.pk, ".$order['product_name']." ".$brand['title']. "easydoor.pk";
           // $update['meta_title'] = $metatitle.$brandtitle;
            //$update['meta_desc'] = $metades;
            $update['meta_key'] = $metakeywords;
            //$update['status_sk'] = "pending";
            $this->db->where('product_id',$order['product_id']);
            $resp = $this->db->update('products',$update);
            }
        }
    
    /*
    
    Cateogry  Cateogry title
 Get the Best price for*cateogry name| easydoor.pk

Meta description
Get the latest products of *cateogry from best and well reputed brands with best features and quality. shop now *category products at easy door.pk
    */
public function setmetainfoCat(){
        $orders2 = $this->model->get_results("SELECT  title , id FROM `categories` WHERE  1=1");
        foreach ($orders2 as $key => $order) {
            $meta_title = $order['title'];
            $meta_key = "Get the Best price for ".$order['title']." | easydoor.pk";
            $meta_desc = "Get the latest products of ".$order['title']." from best and well reputed brands with best features and quality. shop now ".$order['title']." products at easydoor.pk";;
            $update['meta_title'] = $meta_title;
            $update['meta_desc'] = $meta_desc;
            $update['meta_key'] = $meta_key;
            //$update['status_sk'] = "pending";
            $this->db->where('id',$order['id']);
            $resp = $this->db->update('categories',$update);
            }
        }
    // ================ SK END
	public function template($page = '', $data = '')
	{
		$this->load->view('seo/header',$data);
		$this->load->view($page,$data);
        $this->load->view('seo/footer',$data);
    }
    /**
    *

        @LOGIN

    *
    */
    public function login()
    {
    	if ($_SESSION['seo']['login'] == true) {
    		redirect('seo/index');
    	}
        $data['title'] = 'Login';
		$this->load->view('seo/login',$data);
    }
    public function post_login()
    {
    	if ($_POST['username'] == 'admin' && $_POST['password'] == 'chor') {
    		$_SESSION['seo']['login'] = true;
    		redirect('seo/index');
    	}
    	else{
    		redirect('seo/login');
    	}
    }
	public function logout()
	{
		unset($_SESSION['seo']);
		redirect('seo/index');
	}

	/**
	*

		@PAGES

	*
	*/
	public function index()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'All Categories';
			$data['cats'] = $this->model->get_results("SELECT `title`,`leval`,`id` FROM `categories` ORDER BY `title` ASC;");
			$this->template('seo/index',$data);
		}
		else{
			redirect('seo/login');
		}
	}
	public function pages()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'All Categories';
			$data['pages'] = $this->model->get_results("SELECT * FROM `pageapp` ORDER BY `pg_title` ASC;");
			$this->template('seo/pages',$data);
		}
		else{
			redirect('seo/login');
		}
	}
	public function blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			$data['title'] = 'Blog';
			$data['blog'] = $this->model->blog();
			$this->template('seo/blog',$data);
		}
		else{
			redirect('seo/login');
		}
	}

	/**
	*

		@AJAX

	*
	*/
	public function get_cat()
	{
		if ($_SESSION['seo']['login'] == true) {
			$id = $_POST['id'];
			$cat = $this->model->get_row("SELECT `title`,`slug`,`description`,`meta_title`,`meta_key`,`meta_desc` FROM `categories` WHERE `id` = '$id';");
			if ($cat) {
				echo json_encode(array("status"=>true,"data"=>$cat));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function submit_cat()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('id',$id);
			$resp = $this->db->update('categories',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	public function get_page()
	{
		if ($_SESSION['seo']['login'] == true) {
			$id = $_POST['id'];
			$page = $this->model->get_row("SELECT * FROM `pageapp` WHERE `id` = '$id';");
			if ($page) {
				echo json_encode(array("status"=>true,"data"=>$page));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function submit_page()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('id',$id);
			$resp = $this->db->update('pageapp',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	public function get_blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			$id = $_POST['id'];
			$blog = $this->model->get_row("SELECT * FROM `blog` WHERE `blog_id` = '$id';");
			if ($blog) {
				echo json_encode(array("status"=>true,"data"=>$blog));
			}
			else{
				echo json_encode(array("status"=>false));
			}
		}
	}
	public function update_blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$id = $post['id'];unset($post['id']);
			$this->db->where('blog_id',$id);
			$resp = $this->db->update('blog',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	public function post_blog()
	{
		if ($_SESSION['seo']['login'] == true) {
			parse_str($_POST['data'],$post);
			$this->db->where('blog_id',$id);
			$resp = $this->db->insert('blog',$post);
			if ($resp) {
				echo json_encode(array("status"=>true,"msg"=>"submitted"));
			}
			else{
				echo json_encode(array("status"=>false,"msg"=>"not submitted"));
			}
		}
	}
	/**
	*

		@DIRECT HIT

	*
	*/
	public function slug()
	{
		$data = $this->model->get_results("SELECT `product_name`,`product_id` FROM `products` WHERE `check_slug` = 'pending' ORDER BY `product_id` ASC LIMIT 100;");
		if ($data) {
			foreach ($data as $key => $q) {
				$slug = str_replace(' ','-',$q['product_name']);
				$slug = str_replace('&',' and ',$slug);
				$slug = str_replace('/','',$slug);
				$update['slug'] = $slug;
				$update['check_slug'] = 'done';
				$this->db->where('product_id',$q['product_id']);
				$this->db->update('products',$update);
			}
			$this->load->view('seo/auto_slug',$data);
		}
		else{
			die('Completed');
		}
	}
	public function xml()
	{
		$data = $this->model->get_results("SELECT `slug`,`product_name`,`product_id` FROM `products` WHERE `site_map` = 'pending';");
		header("Content-Type: application/xml; charset=utf-8");
		echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
		foreach ($data as $key => $q) {
			echo '<url>' . PHP_EOL;
			echo '<loc>'.BASEURL.'home/'.$q['slug'].'-'.$q['product_id'].'</loc>' . PHP_EOL;
			echo '<changefreq>'.$q['product_name'].'</changefreq>' . PHP_EOL;
			echo '</url>' . PHP_EOL;
		}
		echo '</urlset>' . PHP_EOL;
		foreach ($data as $key => $q) {
			$this->db->where('product_id',$q['product_id']);
			$this->db->update('products',array("site_map"=>"done"));
		}
	}
	/**
	*

		@TEST

	*
	*/
	public function test()
	{

		$mobile = 923331234567;
		$mask = 'Mask';
		$password = 'password';
		$username = 'username';
		$msg = 'Hello World!';

		$ch = curl_init();
		$mask = urlencode($mask);
		$pass = urlencode($password);
		$id = urlencode($username);
		$msg = urlencode($msg);
		
		curl_setopt($ch, CURLOPT_URL,"http://fastsmsalerts.com/api/composesms");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"id=".$id."&pass=".$pass."&mask=".$mask."&to=".$mobile."&portable=&lang=english&msg=".$msg."&type=json");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec($ch);
		curl_close ($ch);
		print_r($server_output);
	}
}
