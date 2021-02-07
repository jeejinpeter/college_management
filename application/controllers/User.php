<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	 public function __construct()
	 {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
		$this->load->library(array('session', 'form_validation', 'email'));
 		$this->load->model('User_model');
    $this->load->model('Admin_model');
    $this->load->model('Course_model');
    $this->load->model('Achievement_model');
    $this->load->model('Gallery_model');
		}
    public function index()
  {
   redirect('User/home', 'refresh');
  }
public function home()
	{
	 $this->load->helper(array('form', 'url'));
     $this->load->view('User/header');
     $this->load->view('User/home');
     $this->load->view('User/footer');
	}
  public function superadmin_login_process() {
    $data = new stdClass();
    $this->load->helper('form');
    $this->load->helper('security');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_message('required', '*Field is required');
    if ($this->form_validation->run() == false) { 
      $this->load->view('Superadmin/login');
        } else { 
          date_default_timezone_set("Asia/Kolkata");
      $username = $this->input->post('username');
      $password = $this->input->post('password');
  if($username == NULL && $password == NULL){
         $this->load->view('Superadmin/login');
       } else {
          if($this->User_model->resolve_user_login($username, $password)) 
            { 
                          $user_id = $this->User_model->get_user_id_from_username($username);
                          $user    = $this->User_model->get_user($user_id); 
                                $this->load->library(array('session'));
                                $this->session->set_userdata(array(
                                        'user_id'       =>(int)$user->login_id,
                                        'username'      => (string)$user->username,
                                        'logged_in'     => (bool)true,
                                        'role'          => $user->role,
                                        'role_des'      => $user->designation
                                ));
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin') 
                            {
                             redirect('Superadmin/home_page', 'refresh');  
                  }
                  elseif(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '8' && $_SESSION['role_des'] === 'superstaff'){
                     redirect('Truststaff/index', 'refresh'); 
                  }
                   else
                    {
                    $data->error = 'You are not registered to access the requested page.';
                    $this->load->view('User/header');
                    $this->load->view('User/home', $data);
                    $this->load->view('User/footer');
                  }
            }
            else
            {
              $data->error = 'Wrong Username or Password!!!';
              $this->load->helper(array('form', 'url'));
              $this->load->view('Superadmin/login', $data);
            }
          }
       }
  }
  public function admin_add_process(){
    $data = new stdClass(); 
    $this->load->helper('form');
    $this->load->helper('security');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error col-md offset-1">', '</div>');
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_login.username]|min_length[4]');
    $this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|min_length[4]');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_login.email]');
    $this->form_validation->set_message('required', '*Field is required');
    if ($this->form_validation->run() === False) {
          $this->load->view('Superadmin/header');
         $data->list = $this->Admin_model->get_all_admin();
          $this->load->view('Superadmin/admin_detail_view', $data);
        } else {  
          date_default_timezone_set("Asia/Kolkata");
      $username = $this->input->post('username');
      $password = $this->input->post('password');
$encrypt_pass = $this->User_model->hash_password($password); 
      $data = array(
                'username' => $username,
                'password' => $encrypt_pass,
                'email' => $this->input->post('email'),
                'role' => 1,
                'designation' => 'admin'       
            );      
$res = $this->User_model->create_admin($data);
  if($res == true){ 
    $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Added new Admin. </div>');
         redirect('Superadmin/link_add_admin');
          }
          else
            { 
              $this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Something went Wrong.  Please try again later!!!</div>');
             redirect('Superadmin/link_add_admin');
           }
        }
}

public function admin_login_process() {
    $data = new stdClass();
    $this->load->helper('form');
    $this->load->helper('security');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_message('required', '*Field is required');
    if ($this->form_validation->run() == false) { 
      $this->load->view('Admin/login');
        } else { 
          date_default_timezone_set("Asia/Kolkata");
      $username = $this->input->post('username');
      $password = $this->input->post('password');
  if($username == NULL && $password == NULL){
         $this->load->view('Admin/login');
       } else {
          if($this->User_model->resolve_user_login($username, $password)) 
            { 
                          $user_id = $this->User_model->get_user_id_from_username($username);
                          $user    = $this->User_model->get_user($user_id); 
                                $this->load->library(array('session'));
                                $this->session->set_userdata(array(
                                        'user_id'       =>(int)$user->login_id,
                                        'username'      => (string)$user->username,
                                        'logged_in'     => (bool)true,
                                        'role'          => $user->role,
                                        'role_des'      => $user->designation
                                ));
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
                            {
                             redirect('Admin/admin_home_page', 'refresh');  
                  }
                   else
                    {
                    $data->error = 'You are not registered to access the requested page.';
                    $this->load->view('User/header');
                    $this->load->view('User/home', $data);
                    $this->load->view('User/footer');
                  }
            }
            else
            {
              $data->error = 'Wrong Username or Password!!!';
              $this->load->helper(array('form', 'url'));
              $this->load->view('Admin/login', $data);
            }
          }
       }
  }
public function user_login_process() {
    $data = new stdClass(); 
    $this->load->helper('form');
    $this->load->helper('security');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('username', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_message('required', '*Field is required');
    if($this->form_validation->run() === False) { 
      $this->load->view('User/login_header');
      $this->load->view('login');
      $this->load->view('User/footer');
        } else { 
          date_default_timezone_set("Asia/Kolkata");
      $username = $this->input->post('username');
      $password = $this->input->post('password'); 
       $parent = $this->input->post('parent');
       if($username == NULL && $password == NULL){
         $this->load->view('User/login_header');
      $this->load->view('login');
      $this->load->view('User/footer');
       } else {
       if ($this->User_model->resolve_user_login($username, $password)) 
            { 
                          $user_id = $this->User_model->get_user_id_from_username($username);
                          $user    = $this->User_model->get_user($user_id); 
                                $this->load->library(array('session'));
                                $this->session->set_userdata(array(
                                        'user_id'       =>(int)$user->user_id,
                                        'username'      => (string)$user->username,
                                        'logged_in'     => (bool)true,
                                        'role'          => $user->role,
                                        'role_des'      => $user->designation
                                ));
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff') 
                            {
                             redirect('Teacher/index', 'refresh');  
                  }
                    elseif (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '3' && $_SESSION['role_des'] === 'student') 
                            {
                            	if(isset($parent)){
                             redirect('Parents/index', 'refresh');
                             }  else{
                             	redirect('Student/index', 'refresh');
                             }
                  }
                  else
                    {
                    $data->error = 'You are not registered to access the requested page.';
                   $this->load->view('User/header');
                    $this->load->view('User/home', $data->error);
                    $this->load->view('User/footer');
                  }
            }
            else
            {
              $data->error = 'Wrong Username or Password!!!';
              $this->load->helper(array('form', 'url'));
              $this->load->view('User/header');
              $this->load->view('User/home', $data->error);
              $this->load->view('User/footer');
            }
       }
     }
  }

 public function logout() {
  $data = new stdClass();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      foreach ($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
      }
      $this->session->set_flashdata('logout_notification', 'logged_out');
      redirect('User/index', 'refresh');  
} else {
      redirect('/');      
    } 
  }
  public function super_logout() {
  $data = new stdClass();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
      foreach ($_SESSION as $key => $value) {
        unset($_SESSION[$key]);
      }
      $this->session->set_flashdata('logout_notification', 'logged_out');
      redirect('http://localhost/sntrust', 'refresh');  
} else {
      redirect('/'); 
       
    }
    
  }
  /*------------------------HTML Pages-----------------------------*/
   public function founder()
           {
           $this->load->view('User/header');
         $this->load->view('User/founder');
         $this->load->view('User/footer'); 
       }
           public function more_about_sn_trust()
           {
           $this->load->view('User/header');
           $this->load->view('User/about_trust');
           $this->load->view('User/footer'); 
       }
             public function our_vision()
           {
           $this->load->view('User/header');
         $this->load->view('User/vision');
               $this->load->view('User/footer'); 
       }
  
             public function governingbody()
           {
           $this->load->view('User/header');
         $this->load->view('User/governing');
               $this->load->view('User/footer'); 
       }
           public function principals_desk()
           {
           $this->load->view('User/header');
         $this->load->view('User/welcome');
               $this->load->view('User/footer'); 
       }
       
       public function about_admissions()
    {
      $this->load->helper(array('form', 'url'));
      $this->load->view('User/header');
      $data['course'] = $this->Course_model->get_all_course();
      if($data['course']){
      $this->load->view('User/admissions',$data);
      }
      else {
        $this->load->view('User/no_data');
      }
      $this->load->view('User/footer'); 
    }
          public function course_details($id)
    {
      if(isset($id))
      {
      $this->load->view('User/header');
      $data['subject']=$this->Subject_model->get_subjects();
      $data['course'] = $this->Course_model->get_all_course();
      $data['c_details'] = $this->Course_model->get_semester_by_id($id);
      $this->load->view('User/courselisting',$data);
      $this->load->view('User/footer'); 
      }
      else{
        redirect('User/admission');
      }
    }
            public function why_us()
           {
           $this->load->view('User/header');
           $this->load->view('User/why_us');
           $this->load->view('User/footer'); 
       }
             public function facilities()
           {
           $this->load->view('User/header');
         $this->load->view('User/no_data');
          $this->load->view('User/footer'); 
       }
       public function staff_achievement_view()
  {
       $this->load->helper(array('form', 'url'));
  $data['achi'] = $this->Achievement_model->get_all_listachievement_staff(); 

     $this->load->view('User/header');
  if(empty($data['achi'] )){
      $this->load->view('User/no_data');
      }
      else {
       $this->load->view('User/staff_achievements',$data);
   }
     $this->load->view('User/footer');
  }
  public function student_achievement_view()
  {
  $data['achi'] = $this->Achievement_model->get_all_listachievement_student(); 
   $this->load->helper(array('form', 'url'));
     $this->load->view('User/header');
     if(empty($data['achi'] )){
      $this->load->view('User/no_data');
      }
      else {
       $this->load->view('User/student_achievements',$data);
   }
     $this->load->view('User/footer');
  }
  public function college_achievement_view()
  {
  $data['achi'] = $this->Achievement_model->get_all_listachievement_teacher(); 
   $this->load->helper(array('form', 'url'));
     $this->load->view('User/header');
     if(empty($data['achi'] )){
      $this->load->view('User/no_data');
      }
      else {
       $this->load->view('User/college_achievements',$data);
   }
     $this->load->view('User/footer');
  }
         public function activities()
           {
           $this->load->view('User/header');
         $this->load->view('User/activities');
               $this->load->view('User/footer'); 
       }
         public function placement()
           {
           $this->load->view('User/header');
         $this->load->view('User/placement');
               $this->load->view('User/footer'); 
       }
          public function gallery()
           {
          $data['gallery'] = $this->Gallery_model->get_all_gallery();
         $this->load->helper(array('form', 'url'));
           $this->load->view('User/header');
         $this->load->view('User/gallery',$data);
               $this->load->view('User/footer'); 
       }
       
      public function contact()
           {
           $this->load->view('User/header');
         $this->load->view('User/contact');
               $this->load->view('User/footer'); 
       }
}
?>