<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Superadmin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->model('Staff_model');
        $this->load->model('Admin_model');
        $this->load->model('User_model');
        $this->load->model('Student_model');
        $this->load->model('Batch_model');
        $this->load->model('Subject_model');
        $this->load->model('Course_model');
        $this->load->model('Expense_model');
    }
public function index()
    { 
       $this->load->helper(array('form', 'url'));
       $this->load->view('Superadmin/login');   
    }
 public function home_page()
    {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    { 
      $this->load->helper(array('form', 'url'));
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/dashboard');
    }else
    {
       redirect('Superadmin/index','refresh'); 
    }
    }
    /*...............................Staff.....................................*/
      public function display_teaching_list()
  {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
      {

       $this->load->helper(array('form', 'url'));
      $data['teacher']=$this->Staff_model->get_all_teacher();
      if($data){
        $this->load->view('Superadmin/header'); 
        $this->load->view('Superadmin/teaching_staff_view',$data);
      }
      else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Error Occured.  Please try again later!!!</div>');
      redirect('Superadmin/dashboard');
 }  
      }else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
    public function display_non_teaching_list()
  {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
      {
      	
       $this->load->helper(array('form', 'url'));
      $data['nonteacher']=$this->Staff_model->get_all_non_teacher();
      if($data){
        $this->load->view('Superadmin/header'); 
        $this->load->view('Superadmin/non_teaching_staff_list',$data);
      }
      else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Error Occured.  Please try again later!!!</div>');
      redirect('Superadmin/dashboard');
 }  
      }else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
  public function display_all_staff_list()
  {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
      {
      	
       $this->load->helper(array('form', 'url'));
      $data['list']=$this->Staff_model->get_all_staff();
      if($data){
        $this->load->view('Superadmin/header'); 
        $this->load->view('Superadmin/all_staff_list',$data);
      }
      else {
      $this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Error Occured.  Please try again later!!!</div>');
      redirect('Superadmin/dashboard');
 }  
      }else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
  /*.............................Admin...............................*/
  public function link_add_admin()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $this->load->helper(array('form', 'url'));
      $data['list']=$this->Admin_model->get_all_admin();
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/admin_detail_view', $data);
    }else
   {
       redirect('Superadmin/index','refresh'); 
    }
    }
    public function admin_details($id)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $data = $this->Admin_model->get_admin_by_id($id); 
      if($data){ 
   echo form_open("Superadmin/update_admin_details"); 
      foreach ($data as $key => $value) {
      echo '<input type="hidden" name="id" class="form-control"  value="'.$value['login_id'].'">';
      echo '<span class="col-sm-3 control-label-">UserName</span>';
      echo '<input type="text" name="username" class="form-control"  value="'.$value['username'].'">'; 
      echo '</br> <span class="col-sm-5 control-label-">Change your Password</span>';
      echo '<input type="password" name="password" class="form-control" >';
      echo '</br> <span class="col-sm-5 control-label-">Retype the Password</span>';
      echo '<input type="password" name="password" class="form-control">';  
      echo '</br><button type="submit" class="btn btn-warning" >Enter</button>';  
            } 
            }else{ echo "No data Available."; } echo form_close(); 
      }else
   {
       redirect('Superadmin/index','refresh'); 
    }
   } 
  public function update_admin_details()
        {
           if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
         $id=$this->input->post('id');
         $password = $this->input->post('password');
         $encrypt_pass = $this->User_model->hash_password($password);
         $data=array(
      'username'=>$this->input->post('username'),
      'password'=> $encrypt_pass
      );
    if($this->Admin_model->update_admin($data, $id))
     {
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated the details... </div>');
      redirect('Superadmin/link_add_admin', 'refresh'); 
     }
    }else
   {
       redirect('Superadmin/index','refresh'); 
    }
   } 
  public function remove_admin($id) 
    {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      if($this->Admin_model->remove_admin($id))
     {
      $this->load->helper(array('form', 'url'));
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Removed details </div>');
             redirect('Superadmin/link_add_admin', '');           
     }
    }else
   {
       redirect('Superadmin/index','refresh'); 
    }
   }
   /*..................Change Password..............*/
   public function change_superadmin_password()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')
        { 
              $this->session->all_userdata();
              $id = $this->session->userdata('user_id');
              $data['user_data'] = $this->User_model->get_user($id); 
              $this->load->helper(array('form', 'url'));
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/change_password_view', $data);
        }
      else{
            redirect('Superadmin/index');
        }
    }
    public function validate_password()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')
        { 
          $this->session->all_userdata();
          $id = $this->session->userdata('user_id');
          $this->load->library('form_validation');
          $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
          $this->form_validation->set_rules('newpassword','New Password','required|trim|min_length[6]');
          $this->form_validation->set_rules('cnewpassword','Verify New Password','required|trim|matches[newpassword]');
        if($this->form_validation->run() == FALSE)
        {
          $data['user_data'] = $this->User_model->get_user($id); 
          $this->load->view('Superadmin/header');
          $this->load->view('Superadmin/change_password_view', $data);
        }else{
            $username=$this->input->post('uid');
            $newpswd=$this->input->post('newpassword');
              $new_pass = $this->User_model->hash_password($this->input->post('newpassword'));
            $data = array(
                  'password' => $new_pass
                  );
           $res = $this->User_model->change_superpassword($data);
           if($res){
            $this->session->set_flashdata('msg','<div class="alert alert-block alert-info text-center">Password Updated Successfully!!!</div>');
            redirect('Superadmin/change_superadmin_password', 'refresh');
           }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Password is not Successfully Updated!!!</div>');
            redirect('Superadmin/change_superadmin_password', 'refresh');
          }
        }
        }
        else{
            redirect('Superadmin/index', 'refresh');
          }
    }
    /*----------------------------Student-------------------*/  
 public function list_all_Admission()
    { 
   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
      {
    $data['admission_list'] = $this->Student_model->get_all_students();
    if($data){    
         $this->load->view('Superadmin/header');   
         $this->load->view('Superadmin/list_all_admission',$data);          
            }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Try again!!!</div>');
            redirect('Superadmin/home_page', 'refresh');
          }
          }
    else
    {
       redirect('Superadmin/index','refresh'); 
    } 
    }
  
  public function list_Admission()
    { 
   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
      {
        $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();
            $data['batch']=$this->Batch_model->get_all_batch(); 
    $data['admission_list'] = $this->Student_model->get_current_students_details(); 
    //$total = $this->Student_model->get_students_total_fees_paid();
   // var_dump($total); die();
    if($data){    
         $this->load->view('Superadmin/header');   
         $this->load->view('Superadmin/list_admission',$data);
                 
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Try again!!!</div>');
            redirect('Superadmin/home_page', 'refresh');
          }
      }
    else
    {
       redirect('Superadmin/index','refresh'); 
    } 
  }
 public function get_by_search()
    { 
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
      {
        $id =  $this->input->post('course');  
        $id2 = $this->input->post('sem');
            $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();   
            $data['search'] = $this->Student_model->get_by_type($id,$id2);  
      
    if($data){ 
         $this->load->view('Superadmin/header');   
         $this->load->view('Superadmin/search',$data);        
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Try again!!!</div>');
            redirect('Superadmin/home_page', 'refresh');
          }
      }
    else
    {
       redirect('Superadmin/index','refresh'); 
    } 
  }
/*-------------------------Add Fund-----------------------*/

public function Add_fund_view()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $this->load->helper(array('form', 'url'));
     
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/add_fund');
      
    }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    } 
/*-------------------------Fund process-----------------------*/  
public function Add_fund_pro()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $data = array(
                          'ac_year' => $this->input->post('ac-year'),
                          'date_tr' =>$this->input->post('date_tr'),
                          'amount' =>$this->input->post('amount'),
                         
                        );
     $result = $this->Admin_model->Add_fund($data); 
          if($result){     
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated!</div>');
               redirect('Superadmin/Add_fund_view');
               }
          else
         {
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong!!!</div>');
          redirect('Superadmin/Add_fund_view');
         }
     }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    } 
public function list_college_fund()
    { 
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  

    {
    $data['fund'] = $this->Admin_model->get_fund();
    if($data){
    
         $this->load->view('Superadmin/header');   
         $this->load->view('Superadmin/list_fund',$data);
                 
        }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Try again!!!</div>');
            redirect('Superadmin/home_page', 'refresh');
          }
        }
    else
    {
       redirect('Superadmin/index','refresh'); 
    } 
  }
public function edit_funds($id)
          {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  

    {      
      $data['update_fund']=$this->Admin_model->get_fund_id($id);
    if($id != NULL){
           $this->load->view('Superadmin/header');
       $this->load->view('Superadmin/update_fund',$data);   
    }else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Try again!!!</div>');
            redirect('Superadmin/home_page', 'refresh');
          }
        }
    else{
    redirect('Superadmin/index','refresh'); 
    }
}  

public function update_fund_pro()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $id = $this->input->post('id');
      $data = array(
                          'ac_year' => $this->input->post('ac-year'),
                          'date_tr' =>$this->input->post('date_tr'),
                          'amount' =>$this->input->post('amount'),
                         
                        );
       $result = $this->Admin_model->update_fund($id,$data); 
          if($result){     
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated!</div>');
               redirect('Superadmin/list_college_fund');
               }
          else
         {
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong!!!</div>');
          redirect('Superadmin/list_college_fund');
         }
    }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    }

 public function Delete_fund()
          {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    { 
      $id = $this->input->post('id');
      $result = $this->Admin_model->delete_fund($id);
   if($result)
    {
     $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Removed Successfully</div>');
      redirect('Superadmin/list_college_fund');       
    } 
else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please Try again!!!</div>');
            redirect('Superadmin/home_page', 'refresh');
          }
    }
   else
    {
       redirect('Superadmin/index','refresh'); 
    }
} 
 /*.................Fee Remittance.....................*/
   public function get_fees_view()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')   
    {
       $this->load->view('Superadmin/header');
       $data['list']=$this->Course_model->get_all_course();
       $data['val']=$this->Subject_model->get_semester();
       $data['batch']=$this->Batch_model->get_all_batch();
       $this->load->view('Superadmin/fees_remit_view.php',$data); 
    }else
    {
       redirect('Superadmin/index','refresh'); 
    }
   } 
    public function get_class_students()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')   
    {
          $data['list']=$this->Course_model->get_all_course();
          $data['val']=$this->Subject_model->get_semester();
          $data['batch']=$this->Batch_model->get_all_batch();
          $course=$this->input->post('course_id');
          $sem=$this->input->post('sem_id');
          $batch=$this->input->post('batch_id');
          $data['sem']=$sem;
          $data['course']=$course;
          $data['batch1']=$batch;
          $data['students']=$this->Course_model->get_class_section_id_batch($course, $sem,$batch); 
          $this->load->view('Superadmin/header');
          $this->load->view('Superadmin/fees_remit_view.php',$data); 
        }
 else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
  public function view_fees_processing()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')   
    {
          $data['course_id']=$this->input->post('course_id');
          $data['batch_id']=$this->input->post('batch_id');
          $data['sem_id']=$this->input->post('sem_id');
          $data['stud_addm']=$this->input->post('stud_adm');
          $data['stud_name']=$this->input->post('stud_name');
          $data['stud_course']=$this->input->post('stud_cour');
          $data['stud_sem']=$this->input->post('stud_sem');
          $data['stud_batch']=$this->input->post('stud_batch');
          $admno = $this->input->post('stud_adm');
          $course_fees = $this->Course_model->get_course_fees($admno);
         if(!empty($course_fees))
    {
      $due_amount = $course_fees->cfees_dues;
      $data['balance']= $due_amount;
      $data['total_amount'] = $course_fees->cfees_amount;
    }else{
      $data['balance']=0;
      $data['total_amount'] = 0; 
    }
          $course=$this->input->post('stud_cour_id');
          $sem=$this->input->post('stud_sem_id');
          $batch=$this->input->post('stud_batch_id');
          $data['sem']=$sem; 
          $data['students']=$this->Course_model->get_class_section_id_batch($course, $sem,$batch); 
          $this->load->view('Superadmin/header');
          $this->load->view('Superadmin/fees_remit_stu_view.php',$data);  
        }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
     public function get_all_fees_view()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
       $this->load->view('Superadmin/header');
       $data['list']=$this->Course_model->get_all_course();
       $data['val']=$this->Subject_model->get_semester();
      $data['batch']=$this->Batch_model->get_all_batch();
       $this->load->view('Superadmin/fees_strc_view.php',$data);  
    }else
    {
       redirect('Superadmin/index','refresh'); 
    }
   }  
public function get_all_studentfees()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
       $this->load->helper('security');
       $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
       $this->form_validation->set_rules('course_id', 'Course', 'required');
       $this->form_validation->set_rules('sem_id', 'Semester' , 'required');
       $this->form_validation->set_rules('batch_id', 'Batch' , 'required');
      if ($this->form_validation->run() == FALSE)
                {
       $data['list']=$this->Course_model->get_all_course();
     $data['val']=$this->Subject_model->get_semester();
      $data['batch']=$this->Batch_model->get_all_batch();
      $this->load->view('Superadmin/header');
       $this->load->view('Superadmin/fees_remit_view.php',$data);
                }
                else
                {
        $data['list']=$this->Course_model->get_all_course();
        $data['val']=$this->Subject_model->get_semester();
        $data['batch']=$this->Batch_model->get_all_batch();
        $course=$this->input->post('course_id');
        $sem=$this->input->post('sem_id');
        $batch=$this->input->post('batch_id');
        $data['course_id']=$this->input->post('course_id');
        $data['batch_id']=$this->input->post('batch_id');
        $data['sem_id']=$this->input->post('sem_id');
        $course_name=$this->Course_model->get_semester_by_id($course);
        $sem_name=$this->Subject_model->get_semester_by_id($sem);
        $batch_name=$this->Batch_model->get_batch_for_stu($batch);
        $data['c_name'] = $course_name[0]['c_name'];
        $data['s_name'] = $sem_name[0]['sem_code'];
        $data['b_name'] = $batch_name[0]['batch_year'];
                $data['students']=$this->Course_model->get_all_studentfees($course,$sem,$batch); 
          $this->load->view('Superadmin/header');
          $this->load->view('Superadmin/fees_strclist_view.php',$data); 
        }
  }else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }  

public function generate_all_fees_payment_pdf()
{
    $this->load->library('Pdf');
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Students Fees Pending Report');
    $pdf->SetHeaderMargin(30);
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
      $data['course_id']=$this->input->post('course_id');
          $data['batch_id']=$this->input->post('batch_id');
        $data['sem_id']=$this->input->post('sem_id');
          $data['s_name']=$this->input->post('s_name');
          $data['b_name']=$this->input->post('b_name');
        $data['c_name']=$this->input->post('c_name');
      $course=$data['course_id'];
          $sem=$data['sem_id'];
          $batch= $data['batch_id'];
          $data['students']=$this->Course_model->get_all_studentfees($course,$sem,$batch); 
    $html = $this->load->view('Superadmin/fees_all_student_report',$data,true);
    $pdf->writeHTML($html, true, false, true, false, '');
    ob_end_clean();     
    $pdf->Output();
 }  
  /*...................Messages......................*/
  public function link_send_message()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/send_message_view'); 
    }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    } 
   public function send_message_to_admin()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $data=array(
                'm_subject' => $this->input->post('sub'),
                'message' => $this->input->post('message'),
                'm_date' => date('Y-m-d'),
                'm_status' => 0
        );
       $result = $this->Admin_model->send_message($data);
       if($result)
    {
    $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Message Sent Successfully</div>');
    $this->load->view('Superadmin/header');
    $this->load->view('Superadmin/send_message_view'); 
    } 
  else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Error Sending Message ..Try again..</div>');
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/send_message_view');  
    } 
}
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
}
 public function get_sent_messages()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
       $data['messages']=$this->Admin_model->get_all_sent_messages();
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/send_messages_list', $data); 
    }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    } 
/*...........................Expenses.........................*/
  public function get_college_expenses()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/get_dept_expense_view'); 
    }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    } 
  public function get_month_expense()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '9' && $_SESSION['role_des'] === 'superadmin')  
    {
      $month = $this->input->post('month'); 
      $year = date('Y');
      $data['m'] = $month; $data['y'] = $year;
      $data['expenses']=$this->Expense_model->get_monthly_expense($month, $year); 
      $this->load->view('Superadmin/header');
      $this->load->view('Superadmin/get_dept_expense_view',$data); 
    }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
    }
  public function generate_expenses_pdf($m)
{
    $this->load->library('Pdf');
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('College Expenses Report');
    $pdf->SetHeaderMargin(30);
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    $pdf->AddPage();
         $year = date('Y');
         $data['m'] = $m; $data['y'] = $year;
        $data['expenses']=$this->Expense_model->get_monthly_expense($m, $year); 
    $html = $this->load->view('Superadmin/college_expense_report',$data,true);
    $pdf->writeHTML($html, true, false, true, false, '');
    ob_end_clean();     
    $pdf->Output();
 }   
  }
?>