<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->model('user_model');
    }
public function home(){
      $this->load->helper(array('form', 'url'));
    	$this->load->view('header');
    }
    /*
public function  display_register_form(){
      $this->load->helper(array('form', 'url'));
      $this->load->view('header');
      $this->load->view('customer/display_registration_form');
    }    
public function user_registartion_process(){
	$this->load->helper('security');
	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('email', 'Email','trim|required|valid_email|is_unique[tbl_users.email]');
	$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
	$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	$this->form_validation->set_rules('confirm_pwd', 'Re-type Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) 
    {
       $this->load->view('header');
			$this->load->view('customer/display_registration_form');
		}

     else 
     {
       date_default_timezone_set("Asia/Kolkata");
        $en_pass= $this->user_model->hash_password( $this->input->post('password'));

			$data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $en_pass,
                'role' => 3,
                'role_des' =>'customer',
                'created_at' => date('Y-m-d H:i:s')     	
            ); 
        $user_id = $this->user_model->create_and_get_id($data);
if($user_id) {
  $user = array(
          'user_id' => $user_id,
          'name' => $this->input->post('name'),
          'phone' => $this->input->post('phone'),
          'dob' => $this->input->post('dob')
        );
     
	 $res = $this->user_model->details_user($user);
}
		   if($res == TRUE){ 
			   
        
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Registered Succesfully with us. </div>');
                    $this->load->view('header');
                    $this->load->view('customer/display_registration_form');
          }
          else
            {
              $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
               $this->load->view('header');
            $this->load->view('customer/display_registration_form');
				   }
			}

}
 
    function verify($hash=NULL)
    {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
		 { 
        if ($this->user_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('user/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('user/register');
        }
    }
	else
    {
       redirect('customer/index','refresh');
    }
           
    }




*/


}