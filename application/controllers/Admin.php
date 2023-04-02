<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	}

	/**
     * 
     * 
     * @ ADMIN LOGIN
     * 
     * 
     * 
     * **/
     // sk 
    public function changeImagename(){
        echo 'fhdgfhgf'; die ; 
        $orders2 = $this->model->get_results("SELECT product_id , product_image FROM `products` WHERE  1=1");
        foreach ($orders2 as $key => $order) {
            $ext =  explode("." , $order['product_image']) ;         
            $imgname = $order['product_image'].'jpg' ;
            if(empty($ext[1])){
                echo "UPDATE  products SET product_image = '".$imgname."' WHERE product_id = '".$order['product_id']."' " ;  
                $this->db->query("UPDATE  products SET product_image = '".$imgname."' WHERE product_id = '".$order['product_id']."' " ) ; 
                
            }
                
            }
        }
    
        
    
    public function brand_login($brand)
    {
        $data['brand'] = $brand;
        $this->load->view('seller/brand_login',$data);
    }
    public function process_login($brand)
    {
        if(!isset($_POST['email']) || $_POST['email'] == "")
        {
            $data['brand'] = $brand;
            $this->load->view('seller/brand_login',$data);
        }
        else
        {
            $result = $this->model->get_row("SELECT * FROM `users` WHERE `user_email` = '".$_POST['email']."' AND `user_password` = '".md5($_POST['password'])."';");
            if(!$result)
            {
                $data['brand'] = $brand;
                $this->load->view('seller/brand_login',$data);
            }
            else
            {
                $_SESSION['user'] = serialize($result);
                redirect("admin/products/".$brand);
            }
        }
    }
    public function check_login($brand)
    {
        if(isset($_SESSION['user']) && $_SESSION['user']!= "" )
        {
            $user = unserialize($_SESSION['user']);
            $username = $user['user_email'];
            $password = $user['user_password'];
            $new = $this->model->get_row("SELECT * FROM `users` WHERE `user_email` = '$username' AND `user_password` = '$password';");
            if($new)
            {
                $_SESSION['user'] = serialize($new);
                return $new;
            }
            else
            {
                unset($_SESSION['user']);
                redirect('admin/brand-login/'.$brand);
            }
        }
        else
        {
            redirect('admin/brand-login/'.$brand);
        }
    }




    public function products($brand)
    {
        $user = $this->check_login($brand);
        $data['brand'] = $brand;
        $data['brand_data'] = $this->model->get_brand_byid($brand);
        $data['products'] = $this->model->get_products_by_brand($brand);
        $data['listing'] = $this->model->get_lisitng($data['brand_data']['seller_id']);
        $this->load->view('seller/brand_products',$data);
    }

    public function download_products_pricing($brand)
    {
        $user = $this->check_login($brand);
        if ($brand) {
            $data = array("Product ID","Product Name","Price");
            $products = $this->model->get_results("SELECT `product_id`,`product_name`,`price` FROM `products` WHERE `brand_id` = '$brand' ORDER BY `product_id` ASC;");
            $file = date('d-m-y H-i-s').'_'.str_replace(' ', '-', $brand).'_products-prices.csv';
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

    public function products_pricing_csv_upload($brand)
    {
        $user = $this->check_login($brand);
        if ($brand) {
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
                $this->db->where('brand_id', $brand);
                $this->db->update('products', array("price"=>$price,"product_name"=>$name));
            }
            fclose($fp) or die("can't close file");
            redirect('admin/products/'.$brand);
            
        }
        else{
            echo json_encode(array("status"=>false,"msg"=>"you have no brand yet"));
        }
    }

}
