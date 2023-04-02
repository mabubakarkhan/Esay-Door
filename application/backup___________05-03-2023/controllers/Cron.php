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
    
        
	
	public function template($page = '', $data = '')
	{
	  //  die('template');
		$this->load->view('seo/header',$data);
		$this->load->view($page,$data);
        $this->load->view('seo/footer',$data);
    }
    

	public function cron_send_email()
	{
		$checkCron = $this->model->get_email_cron_setting();
		if ($checkCron['value'] == 'unlock') {
			$this->db->where('id',8);
			$this->db->update('settings',array("value"=>"lock"));
			$emails = $this->model->get_results("
				SELECT se.send_email_id ,se.email, se.status, et.template, et.title 
				FROM `send_email` AS se 
				INNER JOIN `email_template` AS et ON se.email_template_id = et.email_template_id 
				WHERE se.status = 'pending' 
				ORDER BY `send_email_id` ASC 
				LIMIT 10
			;");
			if ($emails) {
				foreach ($emails as $key => $q) {
					
					$to = $q['email'];
					$subject = $q['title'];
					$message = $q['template'];
					$from = EMAIL_FROM;
					$headers = ''; 
				    $headers .= "From: ".$from."" ."\r\n" .
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "X-Priority: 3\r\n";
					$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
					mail($to, $subject, $message, $headers);

					$this->db->where('send_email_id',$q['send_email_id']);
					$this->db->update('send_email',array("status"=>"sent"));

				}
				$this->db->where('id',8);
				$this->db->update('settings',array("value"=>"unlock"));
			}
			else{
				$this->db->where('id',8);
				$this->db->update('settings',array("value"=>"unlock"));
			}
		}
	}
}
