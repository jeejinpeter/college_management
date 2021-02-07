<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->library('excel');
        $this->load->model('Achievement_model');
        $this->load->model('Admin_model');
        $this->load->model('Course_model');
        $this->load->model('User_model');
        $this->load->model('Fees_model');
        $this->load->model('Exam_model');
        $this->load->model('Batch_model');
        $this->load->model('Staff_model');
        $this->load->model('Student_model');
        $this->load->model('Subject_model');
        $this->load->model('Semester_model');
        $this->load->model('Department_model');
        $this->load->model('Timetable_model');
        $this->load->model('Attendance_model');
        $this->load->model('News_model');
        $this->load->model('Notice_model');
        $this->load->model('Event_model');
        $this->load->model('Expense_model');
        $this->load->model('Gallery_model');
    }
          public function index()
    {
      $this->load->helper(array('form', 'url'));
      $this->load->view('Admin/login');
    }
    public function admin_home_page()
    {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    { 
      $this->load->helper(array('form', 'url'));
       $year=date('Y');
      $data['fund'] = $this->Admin_model->get_fund_yr($year);
      $this->load->view('Admin/header');
      $this->load->view('Admin/dashboard', $data);
      $this->load->view('Admin/footer');
    }else
    {
       redirect('Admin/index','refresh'); 
    }
    }
    /*...................................Student-Admissions.....................................*/
     public function addstudent_view()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
          {

            $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();
            $data['batch']=$this->Batch_model->get_all_batch(); 
             if($data['course'])
             { 
                $this->load->view('Admin/header');
                $this->load->view('Admin/student_add',$data);
                $this->load->view('Admin/footer');
                 }
                else
                {
                   redirect('Admin/admin_home_page','refresh'); 
                }
          }else
            {
               redirect('Admin/index','refresh'); 
            }
  }
  public function addstudent_pro()
      {
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('courses', 'courses', 'trim|required');
    if ($this->form_validation->run() === true)
        { 
           $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert bg-maroon disabled color-palette text-center">Please enter Valid Details </div>');
             redirect('Admin/addstudent_view');
            
        }
          else
        {
      
    $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $images  = $this->input->post('file');
        
                }
             else
                {
                       $data = array('images' => $this->upload->data());
                       $images  = $data['images']['file_name'];                       
                 }  
      
      $data=array(
      'student_login_id'=>'4',
      'stud_admno'=>$this->input->post('admno'),
      'stud_name'=>$this->input->post('stdname'),
      'stud_roll_no'=>$this->input->post('rollno'),
      'gender'=>$this->input->post('gender'),
      'date_of_birth'=>$this->input->post('dob'),
      'stud_address'=>$this->input->post('address1'),
      'stud_join_date'=>$this->input->post('doj'),
      'stud_cast'=>$this->input->post('cast'),
      'stud_religion'=>$this->input->post('religion'),
      'stud_place'=>$this->input->post('stud_place'),
      'stud_district'=>$this->input->post('stud_district'),
      'stud_state'=>$this->input->post('stud_state'),
      'stud_ph'=>$this->input->post('stud_phone'),
      'stud_guardian_occupation'=>$this->input->post('guardian_occ'),
      'stud_p_address'=>$this->input->post('address2'),
      'stud_p_place'=>$this->input->post('per_place'),
      'stud_p_district'=>$this->input->post('per_district'),
      'stud_p_state'=>$this->input->post('per_state'),
      'stud_nationality'=>$this->input->post('nation'),
      'stud_qualifiication'=>$this->input->post('per_qual'),
      'course_id'=>$this->input->post('class'),
      'sem_id'=>$this->input->post('sem'),
      'stud_batch_id'=>$this->input->post('class2'),
      'stud_img'=>$images
      );
    $result = $this->Student_model->insert_admission($data);
   $data1=array(
      'st_admno'=>$this->input->post('admno')
    );
  $fees= $this->Student_model->insert_fees($data1);
   if($fees)
    {
      $this->load->view('Admin/header');
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Successfully Added your Details</div>');
        redirect('Admin/addstudent_view');
        
    }
    } 
    }
  else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
    public function get_by_search()
    { 
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
    $id =  $this->input->post('course');  
    $id2 = $this->input->post('sem');
            $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();   
       $data['search'] = $this->Student_model->get_by_type($id,$id2);   
    if($data){ 
         $this->load->view('Admin/header');   
         $this->load->view('Admin/search',$data);
         $this->load->view('Admin/footer');          
        }
    else
    {
       redirect('Admin/index','refresh'); 
    } 
  }
  else
    {
       redirect('Admin/index','refresh'); 
    }
  } 
 public function list_Admission()
    { 
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
            $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();
            $data['batch']=$this->Batch_model->get_all_batch(); 
    $data['admission_list'] = $this->Student_model->get_students();
    if($data){    
         $this->load->view('Admin/header');   
         $this->load->view('Admin/list_admission',$data);
         $this->load->view('Admin/footer');          
        }
    else
    {
       redirect('Admin/index','refresh'); 
    } 
  }
  else
    {
       redirect('Admin/index','refresh'); 
    }
  }  
    
    public function edit_Admission($id)
          {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  

    {   
    if(empty($id))  {
       redirect('Admin/list_Admission'); 
    } else{
$data['sem'] = $this->Subject_model->get_semester();
      $data['course'] = $this->Course_model->get_courses();
       $data['admission_update'] = $this->Student_model->get_students_details($id);
       
           $this->load->view('Admin/header');
       $this->load->view('Admin/update_admission',$data);
           $this->load->view('Admin/footer'); 
    }
  }
   else
    {
       redirect('Admin/index','refresh'); 
    }
}    
     public function update_processing()
      {
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('courses', 'courses', 'trim|required');
    if ($this->form_validation->run() === true)
        { 
           $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert bg-maroon disabled color-palette text-center">Please enter Valid Details </div>');
           redirect('Admin/addstudent_view');
            
        }
          else
        {
      
    $config['upload_path']  = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $images  = $this->input->post('image');
        
                }
             else
                {
                       $data = array('images' => $this->upload->data());
                       $images  = $data['images']['file_name'];                       
                 }  
      
      $data=array(
      'student_login_id'=>'4',
      'stud_admno'=>$this->input->post('admno'),
      'stud_name'=>$this->input->post('stdname'),
      'stud_roll_no'=>$this->input->post('rollno'),
      'gender'=>$this->input->post('gender'),
      'date_of_birth'=>$this->input->post('dob'),
      'stud_address'=>$this->input->post('address1'),
      'stud_join_date'=>$this->input->post('doj'),
      'stud_cast'=>$this->input->post('cast'),
      'stud_religion'=>$this->input->post('religion'),
      'stud_place'=>$this->input->post('stud_place'),
      'stud_district'=>$this->input->post('stud_district'),
      'stud_state'=>$this->input->post('stud_state'),
      'stud_ph'=>$this->input->post('stud_phone'),
      'stud_guardian_occupation'=>$this->input->post('guardian_occ'),
      'stud_p_address'=>$this->input->post('address2'),
      'stud_p_place'=>$this->input->post('per_place'),
      'stud_p_district'=>$this->input->post('per_district'),
      'stud_p_state'=>$this->input->post('per_state'),
      'stud_nationality'=>$this->input->post('nation'),
      'stud_qualifiication'=>$this->input->post('per_qual'),
      'course_id'=>$this->input->post('class'),
      'sem_id'=>$this->input->post('sem'),
      'stud_batch_id'=>$this->input->post('class2'),
      'stud_img'=>$images
      );
    $id = $this->input->post('s_id');
  $result2 = $this->Student_model->update_admiss($id,$data);
    $result = $this->Student_model->update_admission($id,$data);
  if($result);
    {
     
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Updated your Details Successfully</div>');
        redirect('Admin/list_Admission');
        
    }
    } 
    }
  else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function Delete_Admission()
          {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    { 
      $id = $this->input->post('student_id');
      $data=array(
        'reason' => $this->input->post('reason')
               );
  $result = $this->Student_model->update_reason($id, $data);
  $result = $this->Student_model->delete_admission($id);
   if($result)
    {
     
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Removed Successfully</div>');
        redirect('Admin/list_Admission');
        
    }
     
  else
    {
       redirect('Admin/index','refresh'); 
    }
    }
   else
    {
       redirect('Admin/index','refresh'); 
    }
}
 public function list_all_Admission()
    { 
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
    $data['admission_list'] = $this->Student_model->get_all_students();
    if($data){    
         $this->load->view('Admin/header');   
         $this->load->view('Admin/list_all_admission',$data);
         $this->load->view('Admin/footer');          
        }
    else
    {
       redirect('Admin/index','refresh'); 
    } 
  }
  else
    {
       redirect('Admin/index','refresh'); 
    }
  }  
  
 /*----------------------------Staff------------------------------*/
  public function staff()
  {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
      {
      $this->load->view('Admin/header');
      $data['list']=$this->Staff_model->get_all_staff();
      $data['teacher']=$this->Staff_model->get_all_teacher();
      $data['nonteacher']=$this->Staff_model->get_all_non_teacher();
      if($data){ 
        $this->load->view('Admin/staff_view',$data);
        $this->load->view('Admin/footer');
      }
      else {
      $this->session->set_flashdata('msg',' Error Occured.  Please try again later!!!');
      redirect('Admin/dashboard');
 }  
      }else
    {
       redirect('Admin/index','refresh'); 
    }
  }
  public function add_staff()
      {
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sname', 'Staff Name', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required'); 
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('district', 'District', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|is_natural|required');  
        $this->form_validation->set_rules('quali', 'Qualification', 'trim|required');
        $this->form_validation->set_rules('jdate', 'Join Date', 'trim|required');
        $this->form_validation->set_message('required', '*Field is required');

               $config['upload_path']          = './resource/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;//in kb
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);       
        if (!$this->upload->do_upload('photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
        {
                    $data = array('photo' => $this->upload->data());
                       
                    $photo=$data['photo']['file_name'];
                    //var_dump( $photo);die();
                 
        }
    if ($this->form_validation->run() === false)
     { 
         $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert bg-maroon disabled color-palette text-center">Existing Email..! Please select valid email </div>');
             redirect('Admin/staff');
             $this->load->view('Admin/footer');
      }
      else
        {
      $en_pass= $this->Staff_model->hash_password( $this->input->post('password'));
    $value=array(
       
       'username'=>$this->input->post('uname'),
       'password'=> $en_pass,
       'email'=> $this->input->post('email'),
       'role'=>$this->input->post('role'),
       'designation'=>'staff'
       );
   $id=$this->User_model->add_staff_details($value); 
      $data=array(
      'staff_login_id'=>$id,
      'staff_name'=>$this->input->post('sname'),
      'staff_gender'=>$this->input->post('gender'),
      'staff_address'=>$this->input->post('address'),
      'staff_place'=>$this->input->post('place'),
      'staff_district'=>$this->input->post('district'),
      'staff_state'=>$this->input->post('state'),
      'staff_dob'=>$this->input->post('dob'),
      'staff_ph_number'=>$this->input->post('phone'),
      'staff_qualification'=>$this->input->post('quali'),
      'staff_join_date'=>$this->input->post('jdate'),
      'staff_img'=>$photo
     );
    
   if($this->Staff_model->add_staff($data));
    {
    $this->load->view('Admin/header');
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Successfully Registered!</div>');
        redirect('Admin/staff');
        $this->load->view('Admin/footer');
    }
       } 
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
   public function staff_details($id){
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if(empty($id))  {
 redirect('Admin/staff');
      }else{
      $data = $this->Staff_model->get_staff_by_id($id);
      if($data){ echo form_open_multipart("Admin/update_staff_details"); 
      foreach ($data as $key => $value) {
      echo'<input type="hidden" name="id" class="form-control"  value="'.$value['staff_id'].'">';
     echo '<span class="col-sm-3 control-label-">Image</span>'; 
     echo'<input class="form-control" type="file" name="photo" value="'.$value['staff_img'].'"/>';
     echo'<input class="form-control" type="hidden" name="photo" value="'.$value['staff_img'].'"/>';
     echo '</br> <span class="col-sm-3 control-label-"> Staff Name</span>';
     echo'<input type="text" name="sname" class="form-control"  value="'.$value['staff_name'].'">';echo ' </br> <span class="col-sm-3 control-label-">Address</span>';
     echo'<input type="text" name="address" class="form-control"  value="'.$value['staff_address'].'">'; 
     echo ' </br> <span class="col-sm-3 control-label-">Place</span>';
    echo'<input type="text" name="place" class="form-control"  value="'.$value['staff_place'].'">';
    echo ' </br> <span class="col-sm-3 control-label-">District</span>';
    echo'<input type="text" name="district" class="form-control"  value="'.$value['staff_district'].'">';
    echo ' </br> <span class="col-sm-3 control-label-">District</span>';
    echo'<input type="text" name="state" class="form-control"  value="'.$value['staff_state'].'">';
     echo ' </br> <span class="col-sm-3 control-label-">Phone</span>';
    echo'<input type="text" name="phone" class="form-control"  value="'.$value['staff_ph_number'].'">';
    echo '</br> <span class="col-sm-3 control-label-">Qualification</span>';
    echo'<input type="text" name="quali" class="form-control"  value="'.$value['staff_qualification'].'">';   
     echo '</br> <span class="col-sm-3 control-label-">Join Date</span>';
    echo'<input type="text" name="jdate" class="form-control"  value="'.$value['staff_join_date'].'">';
      echo '</br> <span class="col-sm-3 control-label-">Email ID</span>';
      echo'<input type="text" name="email" class="form-control"  value="'.$value['email'].'">'; echo'</br><button type="submit" class="btn btn-warning" >Save</button>';  
            } 
            }else{echo "No data Available.";} echo form_close(); 
    }
  }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
    public function update_staff_details()
        {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
         $id=$this->input->post('id');
     $config['upload_path']          ='./resource/uploads/';
         $config['allowed_types']        = 'gif|jpg|png';
         $config['max_size']             = 2000;
         $config['max_width']            = 1024;
         $config['max_height']           = 768;
         $this->load->library('upload', $config);
         
              if ( ! $this->upload->do_upload('photo'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $photo = $this->input->post('photo');
                }
             else
                {
                       $data = array('photo' => $this->upload->data());
                       $photo = $data['photo']['file_name'];
               }
         $data=array(
      'staff_name'=>$this->input->post('sname'),
      'staff_address'=>$this->input->post('address'),
      'staff_place'=>$this->input->post('place'),
      'staff_district'=>$this->input->post('district'),
      'staff_state'=>$this->input->post('state'),
      'staff_ph_number'=>$this->input->post('phone'),
      'staff_qualification'=>$this->input->post('quali'),
      'staff_join_date'=>$this->input->post('jdate'),
      'staff_img'=>$photo);
    $value=array(
         'email'=>$this->input->post('email'),
      );
       if($this->Staff_model->update_staff($data,$id,$value))
     {
       $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success   text-center">Updated the Details.. </div>');
             redirect('Admin/staff');
             $this->load->view('Admin/footer'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function remove_staff($id) 
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if($this->Staff_model->remove_staff($id))
     {
       $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success   text-center">Staff details removed </div>');
             redirect('Admin/staff');
             $this->load->view('Admin/footer'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
   /*..................Attendence...............................*/
  public function add_attendence()
      {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $this->load->view('Admin/header');
     $data['list']=$this->Staff_model->list_all_teachers();
     $data['list2']=$this->Staff_model->list_all_nonteachers();
      $this->load->view('Admin/add_attendance',$data);
      $this->load->view('Admin/footer');
      }else
    {
       redirect('Admin/index','refresh'); 
    }
  }

  public function add_attendance_processing()
      {
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
     $id=$this->input->post('login_id');
      $data=array(
    'staff_login_id'=>$id,
     'month'=>$this->input->post('myDate'),
      'presents'=>$this->input->post('presents'),
      'absents'=>$this->input->post('absents'),
      'leaves'=>$this->input->post('leaves'),
      'half_day'=>$this->input->post('hd'),
      'casual_leave'=>$this->input->post('cl'),
      'late'=>$this->input->post('late'),
      'lop'=>$this->input->post('lop'),
      'remarks'=>$this->input->post('remark')
     );
    
   if($this->Staff_model->add_staff_attendance($data));
    {
    $this->load->view('Admin/header');
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Successfully added!</div>');
        redirect('Admin/add_attendence');
        $this->load->view('Admin/footer');
    }
       } 
    else
    {
       redirect('Admin/index','refresh'); 
    }
   }
 
  public function list_attendance_view()
          {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
       $this->load->view('Admin/header');
           $this->load->view('Admin/attendence_view');
             $this->load->view('Admin/footer'); 
     }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function list_attendance_view_processing()
          {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      
     $month=$this->input->post('myDate');
$role=$this->input->post('role');
$data['month']=$month;  
$data['role']=$role;
$data['month']=$month;  
      $data['teacher']=$this->Staff_model->get_all_teacher_role($month,$role);
       $this->load->view('Admin/header');
           $this->load->view('Admin/list_attendance_view',$data);
             $this->load->view('Admin/footer'); 
     }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
    public function excel($month,$role)
    {
    $month1=urldecode($month);
    $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Attendence_report');
        $this->excel->getActiveSheet()->SetCellValue('A3', 'Sl.no');
        $this->excel->getActiveSheet()->SetCellValue('B3', 'Staff name');
        $this->excel->getActiveSheet()->SetCellValue('E3', 'Total Presents');
        $this->excel->getActiveSheet()->SetCellValue('G3', 'Total Leaves');
        $this->excel->getActiveSheet()->SetCellValue('I3', 'Half Days');
        $this->excel->getActiveSheet()->SetCellValue('K3', 'Casual Leaves');
        $this->excel->getActiveSheet()->SetCellValue('M3', 'Lates');
        $this->excel->getActiveSheet()->SetCellValue('O3', 'LOP');
                $this->excel->getActiveSheet()->setCellValue('C1', 'Teacher Attendence Excel Sheet:'.$month1);
                $this->excel->getActiveSheet()->mergeCells('C1:I1');
                $this->excel->getActiveSheet()->mergeCells('B3:D3');
                $this->excel->getActiveSheet()->mergeCells('E3:F3');
                $this->excel->getActiveSheet()->mergeCells('G3:H3');
                $this->excel->getActiveSheet()->mergeCells('I3:J3');
                $this->excel->getActiveSheet()->mergeCells('K3:L3');
         $this->excel->getActiveSheet()->mergeCells('M3:N3');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('C1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('I'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
    $rs=$this->Staff_model->get_all_teacher_role_excel($month1,$role);
  $row = 4; // 1-based index
$col = 0;
$no = 1;  
    foreach($rs as $key=>$value) {
                        echo $row . ", ". $col . "<br>";
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$no);
                        $col++;$col++;
                         $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['staff_name']);
                        $col++;$col++;
          $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['presents']);
                        $col++;$col++; $col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['absents']);
                        $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['half_day']);
                        $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['casual_leave']);
                        $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['late']);
                        $col++;
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['lop']);
                        $row++;
            echo $row . ", ". $col . "<br>";
                        $col = 0;
     $no++;
   }
    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

              $filename=mt_rand(1,100000).'.xls'; //just some random filename
        ob_clean();
ob_start(); 
header('Content-type: application/vnd.ms-excel; charset=UTF-8' ); 
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($this->excel,'Excel5');
    $objWriter->save('php://output');
 }
            
  public function attendance_details($id){
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if(empty($id))  {
                redirect('Admin/list_attendance_view_processing');
      }else{
      $data = $this->Staff_model->get_staff_attendance_by_id($id);
      if($data){ echo form_open_multipart("Admin/update_attendance_details"); 
      foreach ($data as $key => $value) {
      echo'<input type="hidden" name="id" class="form-control"  value="'.$value['attend_id'].'">';
     echo '</br> <span class="col-sm-3 control-label-">Month</span>';
     echo'<input type="text" name="myDate" class="form-control"  value="'.$value['month'].'">';echo ' </br> <span class="col-sm-3 control-label-">Total Presents</span>';
     echo'<input type="text" name="presents" class="form-control"  value="'.$value['presents'].'">'; 
     echo ' </br> <span class="col-sm-3 control-label-">Total Absents</span>';
    echo'<input type="text" name="absents" class="form-control"  value="'.$value['absents'].'">';
    echo ' </br> <span class="col-sm-3 control-label-">Total Leave</span>';
    echo'<input type="text" name="leaves" class="form-control"  value="'.$value['leaves'].'">';
    echo ' </br> <span class="col-sm-3 control-label-">Half Day</span>';
    echo'<input type="text" name="hd" class="form-control"  value="'.$value['half_day'].'">';
     echo ' </br> <span class="col-sm-3 control-label-">Casual Leave</span>';
    echo'<input type="text" name="cl" class="form-control"  value="'.$value['casual_leave'].'">';
    echo '</br> <span class="col-sm-3 control-label-">Late</span>';
    echo'<input type="text" name="late" class="form-control"  value="'.$value['late'].'">';   
     echo '</br> <span class="col-sm-3 control-label-">Lop</span>';
    echo'<input type="text" name="lop" class="form-control"  value="'.$value['lop'].'">';
      echo '</br> <span class="col-sm-3 control-label-">Remarks</span>';
      echo'<input type="text" name="remark" class="form-control"  value="'.$value['remarks'].'">'; echo'</br><button type="submit" class="btn btn-warning" >Save</button>';  
            } 
            }else{echo "No data Available.";} echo form_close(); 
    }
  }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function update_attendance_details()
        {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
         $id=$this->input->post('id');
     
         $data=array(
      'month'=>$this->input->post('myDate'),
      'presents'=>$this->input->post('presents'),
      'absents'=>$this->input->post('absents'),
      'leaves'=>$this->input->post('leaves'),
      'half_day'=>$this->input->post('hd'),
      'casual_leave'=>$this->input->post('cl'),
      'late'=>$this->input->post('late'),
      'lop'=>$this->input->post('lop'),
      'remarks'=>$this->input->post('remark'));
   
       if($this->Staff_model->update_staff_attendance($data,$id))
     {
       $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success   text-center">Updated the Details.. </div>');
             redirect('Admin/list_attendance_view');
             $this->load->view('Admin/footer'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
    public function remove_staff_attendance($id) 
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if($this->Staff_model->remove_staff_attendance($id))
     {
       $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success   text-center">Staff details removed </div>');
             redirect('Admin/list_attendance_view');
             $this->load->view('Admin/footer'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }     
   /*................................Course Details..................................*/
   public function course()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
        {
          $this->load->view('Admin/header');
          $data['list']=$this->Semester_model->get_all_sem();
          $data['sub']=$this->Subject_model->get_all_subject();
        $data['dep']=$this->Department_model->get_all_department();
          $this->load->view('Admin/add_course', $data);
          $this->load->view('Admin/footer'); 
        }else
        {
          redirect('Admin/index','refresh'); 
        }
    }
  public function add_course()
        {  
   
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
      {
                $this->load->helper(array('form', 'url'));  
                $this->load->helper('security');
                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="col-md-offset-3 error">', '</div>');
                $this->form_validation->set_rules('c_name', '*', 'required'); 
                //$this->form_validation->set_rules('sem1_subject[]', '*', 'required');
          if ($this->form_validation->run() == FALSE)
                {
                  $this->load->view('Admin/header');
                  $data['list']=$this->Semester_model->get_all_sem();
                  $data['sub']=$this->Subject_model->get_all_subject();
                  $this->load->view('Admin/add_course.php', $data);
                  $this->load->view('Admin/footer');
                }
        else{
       date_default_timezone_set("Asia/Kolkata");
       $sem=$this->input->post('r1');
        if($sem==1)
        {
          if($this->input->post('sem1_subject'))
        {
        $sem1_sub = implode(",", $_POST['sem1_subject']);
        }
        if($this->input->post('sem2_subject'))
        {
        $sem2_sub = implode(",", $_POST['sem2_subject']);
        }if($this->input->post('sem3_subject'))
        {
        $sem3_sub = implode(",", $_POST['sem3_subject']);
        }if($this->input->post('sem4_subject'))
        {
        $sem4_sub = implode(",", $_POST['sem4_subject']);
        }
        if($this->input->post('sem5_subject'))
        {
        $sem5_sub = implode(",", $_POST['sem5_subject']);
        }if($this->input->post('sem6_subject'))
        {
        $sem6_sub = implode(",", $_POST['sem6_subject']);
        }
          $data = array(            
          'c_name' => $this->input->post('c_name'),
          'dept_id' => $this->input->post('dept'),
          'c_category' => $this->input->post('c_cate'),
          'c_type' =>'sem',
          'c_duration' => $this->input->post('duration1'),
          'c_description' => $this->input->post('description'),
          'semester1_id' => $this->input->post('semm1'),
          'sem1_couse_fee' => $this->input->post('sem1fees'),
          'sem1_subject_id' =>$sem1_sub,
          'semester2_id' => $this->input->post('sem2'),
          'sem2_couse_fee' => $this->input->post('sem2fees'),
          'sem2_subject_id' => $sem2_sub,
          'semester3_id' => $this->input->post('sem3'),
          'sem3_couse_fee' => $this->input->post('sem3fees'),
          'sem3_subject_id' => $sem3_sub,
          'semester4_id' => $this->input->post('sem4'),
          'sem4_couse_fee' => $this->input->post('sem4fees'),
          'sem4_subject_id' => $sem4_sub,
          'semester5_id' => $this->input->post('sem5'),
          'sem5_couse_fee' => $this->input->post('sem5fees'),
          'sem5_subject_id' => $sem5_sub,
          'semester6_id' => $this->input->post('sem6'),
          'sem6_couse_fee' => $this->input->post('sem6fees'),
          'sem6_subject_id' =>$sem6_sub
            );
            
       }  
            elseif($sem==2){
         
        $year1subject = implode(",", $_POST['year1subject']);
        $year2subject = implode(",", $_POST['year2subject']);
        $year3subject = implode(",", $_POST['year3subject']);
        $data = array(            
          'c_name' => $this->input->post('c_name'),
          'c_category' => $this->input->post('c_cate'),
          'c_type' =>'year',
          'c_duration' => $this->input->post('duration'),
          'c_description' => $this->input->post('description'),
          'semester1_id' => $this->input->post('year1'),
          'sem1_couse_fee' => $this->input->post('year1fees'),
          'sem1_subject_id' =>$year1subject,
          'semester2_id' => $this->input->post('year2'),
          'sem2_couse_fee' => $this->input->post('year2fees'),
          'sem2_subject_id' => $year2subject,
          'semester3_id' => $this->input->post('year3'),
          'sem3_couse_fee' => $this->input->post('year3fees'),
          'sem3_subject_id' => $year3subject,
          );
      }
              
        $result = $this->Course_model->insert_course($data);
        if($result)
          {
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Add Course Detils </div>');
            redirect('Admin/course');
          }
        else
          {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
            redirect('Admin/add_notice_form');        
          }  
        
      }
      }
      else
      {
        redirect('Admin/index','refresh');
      } 
    }
  public function course_list()
        {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
        {
          $data['list']=$this->Course_model->get_sem_course();
          $data['year']=$this->Course_model->get_year_course();
          
          $this->load->view('Admin/header');
          $this->load->view('Admin/list_course.php',$data);
          $this->load->view('Admin/footer'); 
        }else
        {
          redirect('Admin/index','refresh'); 
        }
    }
    public function semester_details($id)
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
      {
        $data = $this->Course_model->get_semester_by_id($id);
        if($data){ echo form_open("Admin/update_semester_details"); 
        foreach ($data as $key => $value) { $i=1; ?>
      <table>
      <tr>
        <th>Semester</th>  
        <th>fee</th>  
        <th>subject</th>  
        </tr>
      <tr>
      <td>
      <?php 
        echo'<input type="hidden" name="id" class="form-control"  value="'.$value['course_id'].'">';
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['semester1_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
      <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem1_couse_fee'].'" >';  ?></td>
      <td>
      <?php  $sub = $this->Subject_model->get_subjects();
        if(!empty($value['sem1_subject_id'])){
        $subj = array();
        $sub_list= explode(",", $value['sem1_subject_id']);
        array_push($subj, $sub_list);
      ?>
      <?php
        foreach ($sub ->result() as $rows)  
        { 
        if(in_array($rows->subject_id, $subj[0])){
        $new1[] = $rows->subject_name;
        $subject = implode(',',$new1); 
        }
      }
        echo'<input type="text" name="class_name" class="form-control"  value="'.$subject.'" >';?><?php }else{
        echo'<input type="text" class="form-control" value="">';}?></td> 
        </tr>
      <tr>
      <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['semester2_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
      <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem2_couse_fee'].'" >';  ?></td>
      <td>
      <?php
        $sub2 = $this->Subject_model->get_subjects();
        if(!empty($value['sem2_subject_id'])){
        $subj2 = array();
        $sub_list2= explode(",", $value['sem2_subject_id']);
        array_push($subj2, $sub_list2);
      ?>
      <?php
        foreach ($sub2 ->result() as $row)  
        { 
          if(in_array($row->subject_id, $subj2[0])){
          $new2[] = $row->subject_name;
          $subject2 = implode(',',$new2); 
        }
      }
            echo'<input type="text" name="class_name" class="form-control"  value="'.$subject2.'" >';
      ?><?php }else{
            echo'<input type="text" class="form-control" value="">';}?></td> 
      </tr>
      <tr>
      <td>
      <?php 
      echo'<input type="text" name="class_name" class="form-control"  value="'.$value['semester3_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
      <td>
      <?php 
      echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem3_couse_fee'].'" >';  ?></td>
      <td>
      <?php
      $sub3 = $this->Subject_model->get_subjects();
      if(!empty($value['sem3_subject_id'])){
      $subj3 = array();
      $sub_list3= explode(",", $value['sem3_subject_id']);
      array_push($subj3, $sub_list3);
      ?>
      <?php
      foreach ($sub3 ->result() as $list)  
      { 
      if(in_array($list->subject_id, $subj3[0])){
      $new3[] = $list->subject_name;
      $subject3 = implode(',',$new3); 
            }
      }
      echo'<input type="text" name="class_name" class="form-control"  value="'.$subject3.'" >';
      ?><?php }else{
        echo'<input type="text" class="form-control" value="">';}?></td> 
      </tr>
      <tr>
      <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['semester4_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
      <td>
      <?php 
      echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem4_couse_fee'].'" >';  ?></td>
      <td>
      <?php
        $sub4 = $this->Subject_model->get_subjects();
        if(!empty($value['sem4_subject_id'])){
        $subj4= array();
        $sub_list4= explode(",", $value['sem4_subject_id']);
        array_push($subj4, $sub_list4);
      ?>
      <?php foreach ($sub4 ->result() as $lists)  
        { 
        if(in_array($lists->subject_id, $subj4[0])){
        $new4[] = $lists->subject_name;
        $subject4 = implode(',',$new4); 
        }
        }
        echo'<input type="text" name="class_name" class="form-control"  value="'.$subject4.'" >';?><?php }else{
        echo'<input type="text" class="form-control" value="">';}?></td>
        </tr><tr><td>
      <?php  
        echo'<input type="text"   name="class_name"class="form-control"  value="'.$value['semester5_id'].'&nbsp;&nbsp; Sem" >';  ?></td><td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem5_couse_fee'].'" >';  ?></td><td>
      <?php
        $sub5 = $this->Subject_model->get_subjects();
        if(!empty($value['sem5_subject_id'])){
        $subj5= array();
        $sub_list5= explode(",", $value['sem5_subject_id']);
        array_push($subj5, $sub_list5);
      ?>
      <?php
      foreach ($sub5 ->result() as $ls)  
        { 
          if(in_array($ls->subject_id, $subj5[0])){
          $new5[] = $ls->subject_name;
          $subject5 = implode(',',$new5); 
        }
        }
      echo'<input type="text" name="class_name"   class="form-control"  value="'.$subject5.'" >';?><?php }else{
        echo'<input type="text" class="form-control" value="">';}?>   </td></tr>
        <tr>
      <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['semester6_id'].'&nbsp;&nbsp; Sem" >';  ?></td><td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem6_couse_fee'].'" >';  ?></td>
              <td>
      <?php
          $sub6 = $this->Subject_model->get_subjects();
          if(!empty($value['sem6_subject_id'])){
          $subj6= array();
          $sub_list6= explode(",", $value['sem6_subject_id']);
          array_push($subj6, $sub_list6);
          ?>
    <?php
      foreach ($sub6 ->result() as $li)  
      { 
            if(in_array($li->subject_id, $subj6[0])){
            $new6[] = $li->subject_name;
            $subject6 = implode(',',$new6); 
      }
      }
      echo'<input type="text" name="class_name" class="form-control"  value="'.$subject6.'" >';?><?php }else{
      echo'<input type="text" class="form-control" value="">';}?></td>
          
    <?php 
      echo'</br>';  
      } ?></tr><table> <?php 
      }else{echo "No data Available.";} echo form_close(); 
      }else
      {
      redirect('Admin/index','refresh'); 
      }
    } 
  public function edit_semester_details($id)
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
      {
        if(isset($id)){
        $data['subject']=$this->Subject_model->get_subjects();
        $data['list']=$this->Semester_model->get_all_sem();
        $data['sub']=$this->Subject_model->get_all_subject();
        $data['course'] = $this->Course_model->get_semester_by_id($id); 
        $this->load->view('Admin/header');
        $this->load->view('Admin/list_edit_course',$data);
        $this->load->view('Admin/footer'); 
        }
        else{
            redirect('Admin/course_list'); 
          }
      }else
        {
          redirect('Admin/index','refresh'); 
        }
    }
  public function update_course()
        {  
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
      {
        date_default_timezone_set("Asia/Kolkata");
        $cid=$this->input->post('c_id');
        if($this->input->post('sem1_subject'))
        {
          $sem1_sub = implode(",", $_POST['sem1_subject']);
          $subject_sem1 = $sem1_sub;
        }
        elseif($this->input->post('sem1_s'))
        {
          $subject_sem1=$this->input->post('sem1_s');
        }
        if($this->input->post('sem2_subject'))
        {
          $sem2_sub = implode(",", $_POST['sem2_subject']);
          $subject_sem2 = $sem2_sub;
        }
        elseif($this->input->post('sem2_s'))
        {
          $subject_sem2=$this->input->post('sem2_s');
        }
        if($this->input->post('sem3_subject'))
        {
          $sem3_sub = implode(",", $_POST['sem3_subject']);
          $subject_sem3= $sem3_sub;
          
        }
        elseif($this->input->post('sem3_s'))
        {
          $subject_sem3=$this->input->post('sem3_s');
          
        }
        if($this->input->post('sem4_subject'))
        { 
          $sem4_sub = implode(",", $_POST['sem4_subject']);
          $subject_sem4= $sem4_sub;
        }
        elseif($this->input->post('sem4_s'))
        {
          $subject_sem4=$this->input->post('sem4_s');
        }
        if($this->input->post('sem5_subject'))
        {
          $sem5_sub = implode(",", $_POST['sem5_subject']);
          $subject_sem5= $sem5_sub;
        }
        elseif($this->input->post('sem5_s'))
        {
          $subject_sem5=$this->input->post('sem5_s');
        }
        if($this->input->post('sem6_subject'))
        {
          $sem6_sub = implode(",", $_POST['sem6_subject']);
          $subject_sem6= $sem6_sub;
        }
        elseif($this->input->post('sem6_s'))
        {
          $subject_sem6=$this->input->post('sem6_s');
        }
          $data = array(            
          'c_name' => $this->input->post('c_name'),
          'c_category' => $this->input->post('c_category'),
          'c_description' => $this->input->post('c_description'),
          'semester1_id' => $this->input->post('sem1'),
          'sem1_couse_fee' => $this->input->post('sem1fees'),
          'sem1_subject_id' =>$subject_sem1,
          'semester2_id' => $this->input->post('sem2'),
          'sem2_couse_fee' => $this->input->post('sem2fees'),
          'sem2_subject_id' => $subject_sem2,
          'semester3_id' => $this->input->post('sem3'),
          'sem3_couse_fee' => $this->input->post('sem3fees'),
          'sem3_subject_id' => $subject_sem3,
          'semester4_id' => $this->input->post('sem4'),
          'sem4_couse_fee' => $this->input->post('sem4fees'),
          'sem4_subject_id' =>$subject_sem4,
          'semester5_id' => $this->input->post('sem5'),
          'sem5_couse_fee' => $this->input->post('sem5fees'),
          'sem5_subject_id' => $subject_sem5,
          'semester6_id' => $this->input->post('sem6'),
          'sem6_couse_fee' => $this->input->post('sem6fees'),
          'sem6_subject_id' =>$subject_sem6
            );
        $result = $this->Course_model->update_course($data,$cid);
        if($result)
          {
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Add Course Details </div>');
            redirect('Admin/course_list');
          }
        else
          {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
            redirect('Admin/course_list');        
          }  
      }
      else
      {
        redirect('Admin/index','refresh');
      } 
    } 
  public function remove_course($id) 
    {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if($this->Course_model->remove_course($id))
     {
          $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Remove  details </div>');
            redirect('Admin/course_list');
             $this->load->view('Admin/footer');
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
   public function year_details($id)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
   
    $data = $this->Course_model->get_semester_by_id($id);
      if($data){ echo form_open("Admin/update_year_details"); 
      foreach ($data as $key => $value) { $i=1; ?>
    <table>
      <tr>
      <th>Year</th>  
      <th>fee</th>  
      <th>subject</th>  
      </tr>
      <tr>
      <td>
      <?php 
        echo'<input type="hidden" name="id" class="form-control"  value="'.$value['course_id'].'">';
        if($value['semester1_id']){
        echo'<input type="text" name="class_name" class="form-control"  value="I st Year" >'; } ?></td>
        <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem1_couse_fee'].'" >';  ?></td>
        <td>
      <?php  $sub = $this->Subject_model->get_subjects();
          if(!empty($value['sem1_subject_id'])){
          $subj = array();
          $sub_list= explode(",", $value['sem1_subject_id']);
          array_push($subj, $sub_list);
      ?>
      <?php
          foreach ($sub ->result() as $rows)  
          { 
            if(in_array($rows->subject_id, $subj[0])){
            $new1[] = $rows->subject_name;
            $subject = implode(',',$new1); 
            }
          }
        echo'<input type="text" name="class_name" class="form-control"  value="'.$subject.'" >';?><?php }else{
        echo'<input type="text" class="form-control" value="">';}?></td> 
      </tr>
      <tr>
      <td>
      <?php 
      if($value['semester2_id']){
      echo'<input type="text" name="class_name" class="form-control"  value="II nd Year" >';  }?></td>
        <td>
      <?php 
        echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem2_couse_fee'].'" >';  ?></td>
        <td>
      <?php
          $sub2 = $this->Subject_model->get_subjects();
          if(!empty($value['sem2_subject_id'])){
          $subj2 = array();
          $sub_list2= explode(",", $value['sem2_subject_id']);
          array_push($subj2, $sub_list2);
      ?>
      <?php
          foreach ($sub2 ->result() as $row)  
          { 
            if(in_array($row->subject_id, $subj2[0])){
            $new2[] = $row->subject_name;
            $subject2 = implode(',',$new2); 
          }
          }
            echo'<input type="text" name="class_name" class="form-control"  value="'.$subject2.'" >';
      ?><?php }else{
            echo'<input type="text" class="form-control" value="">';}?></td> </td>
          </tr>
          <tr>
          <td>
      <?php if($value['semester3_id']){
      echo'<input type="text" name="class_name" class="form-control"  value="III rd Year" >'; } ?></td>
          <td>
      <?php 
          echo'<input type="text" name="class_name" class="form-control"  value="'.$value['sem3_couse_fee'].'" >';  ?></td>
          <td>
        
      <?php
          $sub3 = $this->Subject_model->get_subjects();
          if(!empty($value['sem3_subject_id'])){
          $subj3 = array();
          $sub_list3= explode(",", $value['sem3_subject_id']);
          array_push($subj3, $sub_list3);

      ?>
      <?php
          foreach ($sub3 ->result() as $list)  
          { 
          if(in_array($list->subject_id, $subj3[0])){
          $new3[] = $list->subject_name;
          $subject3 = implode(',',$new3); 
            }
          }
          echo'<input type="text" name="class_name" class="form-control"  value="'.$subject3.'" >';
      ?><?php }else{
           echo'<input type="text" class="form-control" value="">';}?></td> 
          </tr>
          <td>
      <?php 
          echo'</br>';  
          } ?></td></tr><table> <?php 
          }else{echo "No data Available.";} echo form_close(); 
          }else
        {
          redirect('Admin/index','refresh'); 
        }
  }
public function edit_year_details($id){
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
    if(isset($id)){
    $data['subject']=$this->Subject_model->get_subjects();
    $data['sub']=$this->Subject_model->get_all_subject();
        $data['course'] = $this->Course_model->get_semester_by_id($id); 
      $this->load->view('Admin/header');
      $this->load->view('Admin/list_edit_year',$data);
    $this->load->view('Admin/footer'); 
    }
    else{
      redirect('Admin/course_list'); 
    }
      
    }else
    {
       redirect('Admin/index','refresh'); 
    }
  }
  public function update_year()
        {  
   
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
      {
        
       date_default_timezone_set("Asia/Kolkata");
         $cid=$this->input->post('c_id');
        if($this->input->post('year1_subject'))
        {
            $sem1_sub = implode(",", $_POST['year1_subject']);
            $subject_sem1 = $sem1_sub;
          
        }
        elseif($this->input->post('year1_s'))
        {
          $subject_sem1=$this->input->post('year1_s');
          
        }
        if($this->input->post('year2_subject'))
        {
         $sem2_sub = implode(",", $_POST['year2_subject']);
            $subject_sem2 = $sem2_sub;
          
        }
        elseif($this->input->post('year2_s'))
        {
          $subject_sem2=$this->input->post('year2_s');
           
        }
        if($this->input->post('year3_subject'))
        {
         $sem3_sub = implode(",", $_POST['year3_subject']);
            $subject_sem3= $sem3_sub;
          
        }
        elseif($this->input->post('year3_s'))
        {
          $subject_sem3=$this->input->post('year3_s');
             
        }
        $data = array(            
          'c_name' => $this->input->post('c_name'),
          'c_category' => $this->input->post('c_category'),
          'c_description' => $this->input->post('c_description'),
          'semester1_id' => $this->input->post('year1'),
          'sem1_couse_fee' => $this->input->post('year1fees'),
          'sem1_subject_id' =>$subject_sem1,
          'semester2_id' => $this->input->post('year2'),
          'sem2_couse_fee' => $this->input->post('year2fees'),
          'sem2_subject_id' => $subject_sem2,
          'semester3_id' => $this->input->post('year3'),
          'sem3_couse_fee' => $this->input->post('year3fees'),
          'sem3_subject_id' => $subject_sem3,
          );
          
        $result = $this->Course_model->update_course($data,$cid);
        if($result)
          {
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Add Course Detils </div>');
            redirect('Admin/course_list');
          }
        else
          {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
            redirect('Admin/course_list');        
          }  
        }
      
      else
      {
        redirect('Admin/index','refresh');
      } 
    }   
 /*...................................Department.....................................*/
   public function manage_department()
    {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
      {
         $this->load->view('Admin/header');
         $data['list']=$this->Department_model->get_all_department();
         $this->load->view('Admin/department_view',$data);
         $this->load->view('Admin/footer');   
      }else
      {
         redirect('Admin/index','refresh'); 
      }
   } 
  public function department_add()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $data=array(
      'dept_name'=>$this->input->post('dept_name'),
        'dept_code'=>$this->input->post('dept_code'),
      );
      if ($this->Department_model->add_department($data))
    {
      $this->load->view('Admin/header');
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Department Added!</div>');
        redirect('Admin/manage_department');
        $this->load->view('Admin/footer');
    }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function department_details($id)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {

      $data = $this->Department_model->get_department_by_id($id);
      if($data){ echo form_open("Admin/update_department_details"); 
      foreach ($data as $key => $value) {
      echo'<input type="hidden" name="id" class="form-control"  value="'.$value['dept_id'].'">';
      echo '<label class="col-sm-4 control-label-">Department Name</label>';
      echo'<input type="text" name="dept_name" class="form-control"  value="'.$value['dept_name'].'">'; 
      echo ' </br> <label class="col-sm-3 control-label-">Department Code</label>';
      echo'<input type="text" name="dept_code" class="form-control"  value="'.$value['dept_code'].'">'; 
      echo'</br><button type="submit" class="btn btn-warning" >Save</button>';  
            } 
            }else{echo "No data Available.";} echo form_close(); 
      }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function update_department_details()
        {
           if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
         $id=$this->input->post('id');
         $data=array(
      'dept_name'=>$this->input->post('dept_name'),
      'dept_code'=>$this->input->post('dept_code')
      );
    if($this->Department_model->update_department($data,$id))
     {
       $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success   text-center">Updated the details... </div>');
             redirect('Admin/manage_department');
             $this->load->view('Admin/footer'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function remove_department($id) 
    {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if($this->Department_model->remove_department($id))
     {
       $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Remove  details </div>');
             redirect('Admin/manage_department');
             $this->load->view('Admin/footer'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
   /*-----------------------Semester---------------------------*/
    public function semester()
  {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $data['list']=$this->Subject_model->get_semester();
       $this->load->view('Admin/header');
           $this->load->view('Admin/semester_view.php', $data);
             $this->load->view('Admin/footer'); 
     }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
    public function semester_add()
    {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
      {
       
      $data=array(
      'sem_name'=>$this->input->post('sem_name'),
      'sem_code'=>$this->input->post('sem_code')
  
      );
       
      if($this->Subject_model->add_semester($data)){
       $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Details Added!!!  </div>');
       redirect('Admin/semester');
             $this->load->view('Admin/footer'); 
       } 
      }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
    public function delete_semester($id)
    {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
      $res = $this->Subject_model->semester_delete($id);
      if($res==TRUE)
       {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Deleted Succesfully !!! </div>');
       redirect('Admin/semester');
      }
       else
       {
         $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
         redirect('Admin/semester');
       }    
    }    
       else
    {
       redirect('Admin/index','refresh');
    }
  } 
  /*...................Subject............................*/    
    
  public function subject()
          {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $data['list']=$this->Subject_model->get_subject();
       $this->load->view('Admin/header');
           $this->load->view('Admin/subject_view.php', $data);
             $this->load->view('Admin/footer'); 
     }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
  
  public function subject_add()
    {
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
      {
        
        $data=array(
        'subject_name'=>$this->input->post('sub_name'),
        'subject_code'=>$this->input->post('sub_code')
        
        );
        if($this->Subject_model->add_subject($data)){
         $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Details Added!!!  </div>');
         redirect('Admin/subject'); 
         }
      }else
      {
         redirect('Admin/index','refresh'); 
      }
   }
  public function subject_list()  
         {
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
          $data['list']=$this->Subject_model->get_subject();
        $this->load->view('Admin/header');
        $this->load->view('Admin/subject_list_view.php',$data);
        $this->load->view('Admin/footer'); 
       } else
    {
       redirect('Admin/index','refresh'); 
    }
   }
   public function subject_details($id)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $data = $this->Subject_model->get_subject_by_id($id);
      if($data){ echo form_open("Admin/update_subject_details"); 
      foreach ($data as $key => $value) {
      echo'<input type="hidden" name="id" class="form-control"  value="'.$value['subject_id'].'">';
      echo '<label class="col-sm-3 control-label-">Department Name</label>';
      echo'<input type="text" name="sub_name" class="form-control"  value="'.$value['subject_name'].'">'; 
      echo ' </br> <label class="col-sm-3 control-label-">Department Code</label>';
      echo'<input type="text" name="sub_code" class="form-control"  value="'.$value['subject_code'].'">'; 
      echo'</br><button type="submit" class="btn btn-warning" >Save</button>';  
            } 
            }else{echo "No data Available.";} echo form_close(); 
      }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
    public function update_subject_details()
        {
           if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
         $id=$this->input->post('id');
         $data=array(
      'subject_name'=>$this->input->post('sub_name'),
      'subject_code'=>$this->input->post('sub_code')
      );
    if($this->Subject_model->update_subject($data,$id))
     {
           $this->session->set_flashdata('msg','<div class="alert alert-success   text-center">Updated the details... </div>');
             redirect('Admin/subject'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
  public function remove_subject($id) 
    {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      if($this->Subject_model->remove_subject($id))
     {
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Remove  details </div>');
             redirect('Admin/subject'); 
     }
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }  
  /*............................BATCH......................*/
 public function add_batchview()
  {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
      $data['batch_list'] = $this->Batch_model->get_all_batch();
        $this->load->helper(array('form','url'));
        $this->load->view('Admin/header');
        $this->load->view('Admin/batch_view', $data);
        $this->load->view('Admin/footer');
      
  }else{
    redirect('Admin/index');
  }
  }     
public function add_batch()
  {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('batch', 'Batch Year', 'trim|required');
    $this->form_validation->set_message('required', '*Field is required');
     if ($this->form_validation->run() == FALSE)
        {
          $data['batch_list'] = $this->Batch_model->get_all_batch();
               $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Enter valid information!!!</div>');
                $this->load->helper(array('form', 'url'));
                $this->load->view('Admin/header');
                $this->load->view('Admin/batch_view', $data);
                $this->load->view('Admin/footer');
        }
    else
    {
        $data = array(
          "batch_year" =>$this->input->post('batch')
                );
       $id=$this->Batch_model->insert_batchdetails($data);
        if ($id)
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully  added your details!</div>');
                 redirect('Admin/add_batchview');
            }
            else
            {
               
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">You are not Successfully  added your details!</div>');
               redirect('Admin/add_batchview');
            }
    }
  }else{
    redirect('Admin/index');
  }}
  
  public function update_batchdetails() 
    {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
      $id=$this->input->post("id");
     $data = array(
                    "batch_year" =>$this->input->post('batch')
                );
        $update=$this->Batch_model->update_batch($data,$id);
               if($update)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated!</div>');
                 redirect('Admin/add_batchview');
                } 
                else
                {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Updated!</div>');
                redirect('Admin/add_batchview');
                }
   }
   else{
     redirect('Admin/index');
   }
   }
   public function remove_batch($id)
    {   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
       $data = $this->Batch_model->delete_batch($id);
      if($data)
      {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Batch Details has been successfully removed!!!!</div>');
       redirect('Admin/add_batchview');
      }
      else
      {
      redirect('Admin/dashboard');
      }
    }
  else{
    redirect('Admin/index');
  }
  }
  /*..........................Timetable.........................*/
  public function getCourse($dept)
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')
      { 
        $course = $this->Timetable_model->get_course($dept); 
        if($course)
        {    
     foreach($course as $row)
     { 
       echo '<option value="'.$row->course_id.'">'.$row->c_name.'</option>';
     }
      }
        else{
            echo '<option value="">No course Available</option>';
          }

      }
      else{
          redirect('Admin/index');
        }
    }
    
public function add_timetable(){ 
 $data['dept']=$this->Timetable_model->get_all_department();
 $data['sem']=$this->Timetable_model->get_all_sem();
$this->load->view('Admin/header');
  $this->load->view('Admin/add_timetable',$data);
  $this->load->view('Admin/footer');
  }
Public function add_timetable_uploading(){  
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
     { 
      $data = new stdClass(); 
     $this->load->helper(array('form', 'url'));  
      $this->load->helper('security');
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="col-md-offset-3 error">', '</div>');
                $config['upload_path']          = './resource/uploads/';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = 3000;
                //$config['max_width']            = 1024;
               // $config['max_height']           = 1000;
            $this->load->library('upload', $config);
  if (!$this->upload->do_upload('timetable'))
                {
          $error = array('error' => $this->upload->display_errors());
          var_dump($error);
   } else
          {
              $data = array('timetable' => $this->upload->data());
              $timetable = $data['timetable']['file_name'];
            }
             $data = array(
                'course_id' => $this->input->post('course'),
                'sem_id' => $this->input->post('sem'),
                'timetable' => $timetable
              );
        $result=$this->Timetable_model->add_timetable($data);
  $this->db->trans_complete();
       if($result==TRUE)
       {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Time Table Added Succesfully !!! </div>');
         redirect('Admin/add_timetable', 'refresh');
        }
         else
         {
           $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('Admin/add_timetable');
         }
       
}
else
    {
       redirect('Admin/index','refresh');
       
    }
}
public function timetable_list(){
   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
     {
      $data['rout'] = $this->Timetable_model->get_all_timetable();  
          if($data != NULL){
        $this->load->view('Admin/header');
        $this->load->view('Admin/list_time_table',$data);
        $this->load->view('Admin/footer');
      }else{
        $this->load->view('Admin/header');
        $this->load->view('error_page_view');
        $this->load->view('Admin/footer');
      }
     } 
   else{
     redirect('Admin/index','refresh');
   }
}
public function timetable_download($file){ 
    $this->load->helper('download'); 
    $data = file_get_contents(base_url("resource/uploads/". $file));
    force_download($decodedFileInfo->fileName, $data);
     $file = '.resources/uploads/'.$file ;// make sure it should be a correct path
  if (file_exists($file)) { 
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Expires: 0');
        header("Content-Transfer-Encoding: binary");
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
   }
public function delete_time_table($id)
    {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
      $res = $this->Timetable_model->timetable_delete($id);
        if($res==TRUE)
       {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Deleted Succesfully !!! </div>');
         redirect('Admin/timetable_list');
        }
         else
         {
           $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('Admin/timetable_list');
         }    
    }    
         else
    {
       redirect('Admin/index','refresh');
    }
}
  /*..........................Exams.............................*/
    public function add_exam()
   { 
   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
      $data['course'] = $this->Exam_model->get_all_course();  
      $data['sem'] = $this->Semester_model->get_semesters();
        $this->load->helper(array('form','url'));
        $this->load->view('Admin/header');      
        $this->load->view('Admin/add_exam', $data);
        
      $this->load->view('Admin/footer');  
   }
   else{
     redirect('Admin/index');
   }
   }
   public function add_exam_processing()
   {
     $data = array(
        'e_date'=>$this->input->post('date'),
        'c_id'=>$this->input->post('course'),
    'typ_exam'=>$this->input->post('exam'),
    'e_sem'=>$this->input->post('sem'),
    
  );
  $result=$this->Exam_model->insert_exam($data);

   if($result)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Added the Exam Details!</div>');
        redirect('Admin/add_exam');
  
                } 
           
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Added Exam Details!</div>');
                    redirect('Admin/add_exam'); 
    }
   }
    public function list_exam()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
      $data['exam'] = $this->Exam_model->get_all_exam();  
        $this->load->helper(array('form','url'));
        $this->load->view('Admin/header');      
        $this->load->view('Admin/list_exam',$data);
        $this->load->view('Admin/footer');  
   }
   else{
     redirect('Admin/index');
   }
    
  }

public function edit_exam($id){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
if(isset($id)){   
   $data['course'] = $this->Exam_model->get_all_course();  
    $data['sem'] = $this->Semester_model->get_semesters();
      $data['exam'] = $this->Exam_model->get_exam($id); 
          if($data != NULL){
                $this->load->view('Admin/header');
                $this->load->view('Admin/edit_exam', $data);
                $this->load->view('Admin/footer');
      }else{
        redirect('Admin/list_exam');
      }
}
else{
  redirect('Admin/list_exam');
}
      }
   else
    {
       redirect('Admin/index','refresh');    
    }
}
public function edit_exam_processing(){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
    $id=$this->input->post('eid');
     $data = array(
          'e_date' =>$this->input->post('date') ,
          'c_id' =>$this->input->post('course') , 
          'typ_exam' =>$this->input->post('exam') , 
          'e_sem' =>$this->input->post('sem') , 
         );
  }
  $result=$this->Exam_model->edit_exam($data,$id);

   if($result)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated the Exam Details!</div>');
        redirect('Admin/list_exam');
  
                } 
           
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Updated Exam Details!</div>');
                    redirect('Admin/list_exam'); 
    }
}
public function delete_exam($id)
    {  
   $data = $this->Exam_model->delete_exam($id);
  $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Exam details has been successfully removed!!!!</div>');
       redirect('Admin/list_exam');
      }
  /*.....................Mark.................................*/
 public function addmark()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
          {
        $data['batch']=$this->Student_model->get_all_batch();
             $data['course']=$this->Student_model->get_all_course();
       $data['sem']=$this->Student_model->get_all_sem();
             if($data)
             {
                $this->load->view('Admin/header');
                $this->load->view('Admin/addmark',$data);
                $this->load->view('Admin/footer');
                 }
                else
                {
                   redirect('Admin/index','refresh'); 
                }
          }else
            {
               redirect('Admin/index','refresh'); 
            }
  }
  public function student_list()
    { 
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
     $cr=$this->input->post('course');
     $sm=$this->input->post('sem');
     $yr=$this->input->post('batch');
         $data['stu_list'] = $this->Student_model->get_all_studentlist($cr,$sm,$yr);
 if($data){    
         $this->load->view('Admin/header');   
         $this->load->view('Admin/student_list1',$data);
        $this->load->view('Admin/footer');          
  }
    else
    {
       redirect('Admin/index','refresh'); 
    } 
  }else
    {
       redirect('Admin/index','refresh'); 
    }
  }
   public function addmark_details($id)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
          {
            if(empty($id)){
              redirect('Admin/addmark');
            }else{
             $data['course']=$this->Student_model->get_all_course();
             $data['stud_list']=$this->Student_model->get_stud($id);  
             if($data)
             {
                $this->load->view('Admin/header');
                $this->load->view('Admin/markdetails',$data);
                $this->load->view('Admin/footer');
                 }
                else
                {
                   redirect('Admin/addmark','refresh'); 
                }
          }
        }else
            {
               redirect('Admin/index','refresh'); 
            }
  }
  public function student_mark()
  {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
  {
    $id=$this->input->post('sid');
          $data = array(            
            'exam' => $this->input->post('exam'),
      'admno' => $this->input->post('adm'),
      'course' => $this->input->post('cid'),
      'sem' => $this->input->post('sem'),
      'batch' => $this->input->post('bid'),
      'subject1' => $this->input->post('sub1'),
            'subject2' => $this->input->post('sub2'),
      'subject3' => $this->input->post('sub3'),
            'subject4' => $this->input->post('sub4'),
      'subject5' => $this->input->post('sub5'),
            'subject6' => $this->input->post('sub6'),
      'total' => $this->input->post('tot'),
           );      
       $result = $this->Student_model->insert_marks($data);
    if($result)
         {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Marks added Successfully </div>');
              redirect('Admin/addmark_details/'.$id);
         }
      else
      {
       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
        redirect('Admin/addmark_details/'.$id);        
      }  
}
  
else
    {
       redirect('Admin/index','refresh');
     } 
  }
  Public function marklist()
    {
       $data['batch']=$this->Student_model->get_all_batch();
             $data['course']=$this->Student_model->get_all_course();
        $data['sem']=$this->Student_model->get_all_sem();
             if($data)
             {
                $this->load->view('Admin/header');
                $this->load->view('Admin/mark_list',$data);
                $this->load->view('Admin/footer');
                 }
                else
                {
                   redirect('Admin/index','refresh'); 
                }
    }
      
  public function mark_listdetails()
    { 
       $cr=$this->input->post('course');
     $sm=$this->input->post('sem');
     $yr=$this->input->post('batch');
     $data['course']=$this->Student_model->select_course($cr);
     $data['batch']=$this->Student_model->select_batch($yr);
     $data['sem']=$this->Student_model->select_sem($sm);
     $data['mark'] = $this->Student_model->get_all_marklist($cr,$sm,$yr);
 if($data){    
         $this->load->view('Admin/header');   
         $this->load->view('Admin/mark_list1',$data);
         $this->load->view('Admin/footer');          
  }
  else
    {
       redirect('Admin/index','refresh'); 
    }
  }
  
   
  /*--------------------Fee Category---------------------------*/
  public function add_fee_category()
{
   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
      
        $this->load->helper(array('form','url'));
        $this->load->view('Admin/header');      
        $this->load->view('Admin/fee_category');
        $this->load->view('Admin/footer');  
   }
   else{
     redirect('Admin/index');
   }
   }
   public function add_fee_category_processing()
   {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
        $this->load->library('form_validation');
     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('category', 'Fee Category', 'required|callback__alpha_dash_space');
    $this->form_validation->set_rules('fee', 'Fee', 'required|numeric');
    if ($this->form_validation->run() == false){
       $this->session->set_flashdata('msg','<div class="alert bg-maroon disabled color-palette text-center">Please Insert Valid Data</div>');
      redirect ('Admin/add_fee_category');
    }
    else{
     $data = array(
        'fc_category'=>$this->input->post('category'),
           'fc_fee'=>$this->input->post('fee'),
  );
  $result=$this->Fees_model->insert_fee_category($data);
if($result)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Added the Fee Details!</div>');
        redirect('Admin/add_fee_category');
  }        
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Added Fee Details!</div>');
                    redirect('Admin/add_fee_category'); 
    }
  
  }  
  }else{
     redirect('Admin/index');
   }
   }
    public function list_fee_category()
  {
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin'){
      $data['fee'] = $this->Fees_model->get_fee_category();  
        $this->load->helper(array('form','url'));
        $this->load->view('Admin/header');      
        $this->load->view('Admin/list_fee_category',$data);
        $this->load->view('Admin/footer');  
   }
   else{
     redirect('Admin/index');
   }
  }
  
public function edit_fee_category($id){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
if(isset($id)){   
  $data['fee'] = $this->Fees_model->get_fee_category_edit($id);
          if($data != NULL){
                $this->load->view('Admin/header');
                $this->load->view('Admin/edit_fee_category', $data);
                $this->load->view('Admin/footer');
      }else{
        redirect('Admin/list_fee_category');
      }
}
else{
  redirect('Admin/list_fee_category');
}
      }
   else
    {
       redirect('Admin/index','refresh');    
    }
}
public function edit_fee_category_processing(){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
    $id=$this->input->post('fid');
    $this->load->library('form_validation');
     $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_rules('category', 'Fee Category', 'required|callback__alpha_dash_space');
    $this->form_validation->set_rules('fee', 'Fee', 'required|numeric');
    if ($this->form_validation->run() == false){
       $this->session->set_flashdata('msg','<div class="alert bg-maroon disabled color-palette text-center">Please Insert Valid Data</div>');
      redirect ('Admin/edit_fee_category');
    }
    else{
     $data = array(
          'fc_category' =>$this->input->post('category') ,
          'fc_fee' =>$this->input->post('fee') , 
          );
  $result=$this->Fees_model->edit_fee_category($data,$id);
   if($result)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated the Fee Category!</div>');
        redirect('Admin/list_fee_category');
  } 
           
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Updated Exam Details!</div>');
                    redirect('Admin/list_fee_category'); 
    }
}
}else{
     redirect('Admin/index');
   }
 }
 function _alpha_dash_space($str_in = '')
{
    if (! preg_match("/^([-a-z_ ])+$/i", $str_in))
    {
        $this->form_validation->set_message('_alpha_dash_space', 'The %s field may only contain alphabets and spaces.');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}
public function delete_fee_category($id)
    {  
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
   $data = $this->Fees_model->delete_fee($id);
  $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Fee Category has been successfully Deleted!!!!</div>');
       redirect('Admin/list_fee_category');
      }else{
     redirect('Admin/index');
   } 
   } 
   /*.................Fee Remittance.....................*/
   public function student_fee_view($admis_no)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
          {
            if(empty($admis_no)){
              redirect('Admin/index');
            }else{
            $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();
            $data['batch']=$this->Batch_model->get_all_batch();
            $data['student'] = $this->Student_model->get_students_details_by_admis($admis_no);     
             if($data['student'])
             { 
                $this->load->view('Admin/header');
                $this->load->view('Admin/stu_fees_add',$data);
                $this->load->view('Admin/footer');
                 }
                else
                {
                   redirect('Admin/admin_home_page','refresh'); 
                }
          }
        }else
            {
               redirect('Admin/index','refresh'); 
            }
  }
   public function addstudent_fees_process()
      {
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $admno=$this->input->post('admno');          
      $data=array(
      
      'cfees_amount'=>$this->input->post('fees'), 
      'cfees_dues'=>$this->input->post('fees') 
    );
    $result= $this->Student_model->update_fees($data,$admno);
   
   if($result);
    {
  $this->load->view('Admin/header');
    $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Successfully Added the Fees Details</div>');
    redirect($_SERVER['HTTP_REFERER']);
        
    }

  }
  else
    {
       redirect('Admin/index','refresh'); 
    }

    }
   public function get_fees_view()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
       $this->load->view('Admin/header');
       $data['list']=$this->Course_model->get_all_course();
       $data['val']=$this->Subject_model->get_semester();
      $data['batch']=$this->Batch_model->get_all_batch();
       $this->load->view('Admin/fees_remit_view',$data);
         $this->load->view('Admin/footer');   
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   } 
    public function get_class_students()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
       $this->load->helper('security');
       $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
       $this->form_validation->set_rules('course_id', 'Course', 'required');
       $this->form_validation->set_rules('sem_id', 'Semester' , 'required');
      if ($this->form_validation->run() == FALSE)
                {
       $data['list']=$this->Course_model->get_all_course();
     $data['val']=$this->Subject_model->get_semester();
      $data['batch']=$this->Batch_model->get_all_batch();
      $this->load->view('Admin/header');
       $this->load->view('Admin/fees_remit_view',$data);
      $this->load->view('Admin/footer');
                }
                else
                {
        $data['list']=$this->Course_model->get_all_course();
        $data['val']=$this->Subject_model->get_semester();
        $data['batch']=$this->Batch_model->get_all_batch();
        $course=$this->input->post('course_id');
        $sem=$this->input->post('sem_id');
        $batch=$this->input->post('batch_id');
        $data['sem']=$sem;
        $data['students']=$this->Course_model->get_class_section_id_fees_add($course,$sem,$batch);
          $this->load->view('Admin/header');
          $this->load->view('Admin/fees_remit_view',$data);
          $this->load->view('Admin/footer');   
        }
  }else
    {
       redirect('Admin/index','refresh'); 
    }
  }
public function add_fees()
      {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {      
      $data=array(
      'fee_pay_date'=>date('Y-m-d'),
      'fee_pay_amount'=>$this->input->post('fee_amount'), 
      'fee_pay_fine'=>$this->input->post('fine_amount'), 
    'fee_pay_sem'=>$this->input->post('sem'), 
    'fee_pay_adm_no'=>$this->input->post('admno') 
    );
    $admno=$this->input->post('admno');
    $paidamount=$this->input->post('fee_amount');
  $course_fees= $this->Course_model->get_course_fees($admno);
  if(!empty($course_fees))
    {
  $due_amount = $course_fees->cfees_dues;
  $due_deduct=$due_amount - $paidamount;
  $data1=array(
      'cfees_dues'=>$due_deduct
    );
  $course_fees= $this->Course_model->update_course_fee($data1,$admno);
  $result = $this->Student_model->insert_fees_payment($data);
   if($result);
    {
  $this->load->view('Admin/header');
    $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Successfully Added the Fees payment Details</div>');
    redirect($_SERVER['HTTP_REFERER']);
        
    }

  }
  else  
  {
   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please add fees details for Student!!!</div> ');
      redirect('Admin/get_fees_view');  
  }
  }
  else
    {
       redirect('Admin/index','refresh'); 
    }
  }
  /*.................Fee Payments.....................*/
    public function get_fees_paid_view()
      {
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
       $this->load->view('Admin/header');
       $data['list']=$this->Course_model->get_all_course();
       $data['val']=$this->Subject_model->get_semester();
       $data['batch']=$this->Batch_model->get_all_batch();
       $this->load->view('Admin/fees_paid_view',$data);
       $this->load->view('Admin/footer');    
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
   public function get_all_students()
      {
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
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
          $data['students']=$this->Course_model->get_class_section_id_fees_add($course, $sem,$batch); 
     $this->load->view('Admin/header');
         $this->load->view('Admin/fees_paid_view',$data);
     $this->load->view('Admin/footer'); 
        }
 else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
public function view_fees_processing()
      {
         if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')   
    {
       
    $data['course_id']=$this->input->post('course_id');
          $data['batch_id']=$this->input->post('batch_id');
        $data['sem_id']=$this->input->post('sem_id');
      
      $data['stud_addm']=$this->input->post('stud_adm');
          $data['stud_name']=$this->input->post('stud_name');
        $data['stud_course']=$this->input->post('stud_cour');
          $data['stud_sem']=$this->input->post('stud_sem');
          $data['stud_batch']=$this->input->post('stud_batch');
      $admno=$this->input->post('stud_adm');
      $course_fees= $this->Course_model->get_course_fees($admno);
       if(!empty($course_fees))
    {
      $due_amount = $course_fees->cfees_dues;
      $data['balance']= $due_amount;
      $total_fee=$course_fees->cfees_amount;
      $data['amt']=$total_fee;
    }else{
    $data['balance']=0; 
    $data['amt']=0;
    }
      $course=$this->input->post('stud_cour_id');
          $sem=$this->input->post('stud_sem_id');
          $batch=$this->input->post('stud_batch_id');
          $data['sem']=$sem;
          $data['students']=$this->Course_model->get_class_section_id_batch($course, $sem,$batch); 
          $this->load->view('Admin/header');
          $this->load->view('Admin/fees_paidt_stu_view',$data);
          $this->load->view('Admin/footer');   
        }
  else
    {
       redirect('Superadmin/index','refresh'); 
    }
  }
public function generate_fees_payment_pdf()
{
    $this->load->library('Pdf');
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Student Fees Report');
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
          $data['stud_addm']=$this->input->post('s_admno');
          $data['stud_name']=$this->input->post('s_name');
        $data['stud_course']=$this->input->post('s_cou');
          $data['stud_sem']=$this->input->post('s_sem');
          $data['stud_batch']=$this->input->post('s_batch');
          $data['fees_due']=$this->input->post('s_bal');
          $data['fees_amt']=$this->input->post('s_amt');
      $course=$data['course_id'];
          $sem=$data['sem_id'];
          $batch= $data['batch_id'];
          $data['students']=$this->Course_model->get_class_section_id_batch($course, $sem,$batch); 
    $html = $this->load->view('Admin/fees_student_report',$data,true);
    $pdf->writeHTML($html, true, false, true, false, '');
    ob_end_clean();     
    $pdf->Output();
 }  
 /*........................Pending fees..................*/
  public function get_all_fees_view()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
       $this->load->view('Admin/header');
       $data['list']=$this->Course_model->get_all_course();
       $data['val']=$this->Subject_model->get_semester();
      $data['batch']=$this->Batch_model->get_all_batch();
       $this->load->view('Admin/fees_strc_view',$data);
         $this->load->view('Admin/footer');   
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }  
public function get_all_studentfees()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
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
      $this->load->view('Admin/header');
       $this->load->view('Admin/fees_remit_view',$data);
      $this->load->view('Admin/footer');
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
        $course_name=$this->Course_model->
        get_semester_by_id($course);
        $sem_name=$this->Subject_model->get_semester_by_id($sem);
        $batch_name=$this->Batch_model->get_batch_for_stu($batch);
        $data['c_name'] = $course_name[0]['c_name'];
        $data['s_name'] = $sem_name[0]['sem_code'];
        $data['b_name'] = $batch_name[0]['batch_year'];
                $data['students']=$this->Course_model->get_all_studentfees($course,$sem,$batch); 
          $this->load->view('Admin/header');
          $this->load->view('Admin/fees_strclist_view',$data);
          $this->load->view('Admin/footer');   
        }
  }else
    {
       redirect('Admin/index','refresh'); 
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
    $html = $this->load->view('Admin/fees_all_student_report',$data,true);
    $pdf->writeHTML($html, true, false, true, false, '');
    ob_end_clean();     
    $pdf->Output();
 }    
   /*...................Events............................*/ 
 public function show_events_page()
{
          $data['event'] = $this->Event_model->get_all_listevent(); 
          $this->load->view('Admin/header');
          $this->load->view('Admin/organise_events', $data);
          $this->load->view('Admin/footer');
      
  
}
    public function add_events_processing()
    {
           $this->load->helper('security');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
             $this->form_validation->set_rules('e_name', 'Title', 'required');
      $this->form_validation->set_rules('details', 'Description' , 'required');    
        if($this->form_validation->run() == FALSE)
                {
            $data['event'] = $this->Event_model->get_all_listevent(); 
         $this->load->view('Admin/header');
         $this->load->view('Admin/organise_events', $data);
          $this->load->view('Admin/footer');
                }
                else
                {
            
 if($_FILES['news_image']['size']>1000 * 1000)
{
     $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Image is too big and not exceed 1000KB!</div>');
            redirect('admin/show_events_page');
}

                $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;

                $this->load->library('upload', $config);
        if (!$this->upload->do_upload('news_image'))
                {
          $error = array('error' => $this->upload->display_errors());
    }
                else
                {
                       $data = array('news_image' => $this->upload->data());
                       $news_image=$data['news_image']['file_name'];
                 }
             $data = array(
                        'event_name' => $this->input->post('e_name'),
                        'event_description' =>$this->input->post('details'),
                        'event_place' =>$this->input->post('place'),
                        'event_date' =>$this->input->post('time'),
                        'event_img' => NULL   
                    );
         $insert_e_id =$this->Event_model->insert_event($data);   
             if(isset($news_image) && $insert_e_id > 0){ 
                $image = array(
                  'event_img' => $news_image
                  );
          $result = $this->Event_model->insert_image($insert_e_id, $image);
     
      }
              if($result)
                      {
              $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Event Succesfully added . </div>');
                redirect('Admin/show_events_page');
                                                
                      }
                      else
                        {
                         $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                            redirect('Admin/show_events_page');
                        }
         }       
    }
  public  function update_eventdetails() 
            {
        $id = $this->input->post("id");
if($_FILES['news_image']['size']>1000 * 1000)// to check what is your post name print_r($_FILES);
{
     $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Image is too big and not exceed 1000KB!</div>');
            redirect('Admin/show_events_page');
}
                $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('news_image'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $e_image  = $this->input->post('news_image');
        
                }
             else
                {
                       $data = array('news_image' => $this->upload->data());
                       $e_image  = $data['news_image']['file_name'];                       
                 }
            $data = array(
                     
                       'event_name' => $this->input->post('e_name'),
                        'event_description' =>$this->input->post('details'),
                        'event_place' =>$this->input->post('place'),
                        'event_date' =>$this->input->post('time'),
                        'event_img' => $e_image             
                 );
                   $result = $this->Event_model->update_event($data,$id); 
                if($result)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated!</div>');
        redirect('Admin/show_events_page');
  
                } 
           
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Updated!</div>');
                    redirect('Admin/show_events_page'); 
    }    
    }
    public function remove_event($id)
    {   
      $data = $this->Event_model->delete_event($id);
      if($data)
      {
  $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Event has been successfully removed!!!!</div>');
       redirect('Admin/show_events_page');
      
      }
      else
      {
      redirect('Admin/index','refresh'); 
      }
    }
  /*...................News............................*/ 
 public function add_news_view()
{
   $this->load->view('Admin/header');
         $this->load->view('Admin/news_add');
     $this->load->view('Admin/footer');  
}
    public function add_news_processing()
    {
            $this->load->helper('security');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('news_title', 'News Title', 'required');
            $this->form_validation->set_rules('desc', 'Description' , 'required');      
 if($_FILES['news_image']['size']>1000 * 1000)
{
     $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Image is too big and not exceed 1000KB!</div>');
            redirect('admin/add_news_view');
}
                $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;//in kb
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
$this->load->library('upload', $config);
         if ( !$this->upload->do_upload('news_image'))
                {
          
                     $error = array('error' => $this->upload->display_errors());
    }
                else
                {
                       $data = array('news_image' => $this->upload->data());
                       $news_image=$data['news_image']['file_name'];                      
                }
                 if ($this->form_validation->run() == FALSE)
                {          
      $this->load->view('Admin/header');
         $this->load->view('Admin/news_add');
     $this->load->view('Admin/footer');
                }
                else
                {
        $data = array(
                        'news_title' => $this->input->post('news_title'),
                        'news_description' =>$this->input->post('desc'),
                        'news_image' => NULL   
                    );

              $insert_news_id =$this->News_model->insert_news($data);  
             if(isset($news_image) &&   $insert_news_id >0){
                $image = array(
                   'news_image' => $news_image
                  );
          $result = $this->News_model->insert_image($insert_news_id,$image);     
      }
              if($insert_news_id)
                      {
              $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully added to the news list. </div>');
                redirect('Admin/add_news_view');
                                                
                      }
                      else
                        {                         
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                            redirect('Admin/add_news_view');
                        }
         }       
    }
  
  
   public function list_news()
    {          
         $data['news'] = $this->News_model->get_all_listnews();  
      $this->load->view('Admin/header');
         $this->load->view('Admin/news_list',$data);
     $this->load->view('Admin/footer');          
  }
   public function edit_news($id)
           {
        $data['get_by_id']= $this->News_model->get_by_news_id($id);
        $this->load->view('Admin/header');
        $this->load->view('Admin/news_edit',$data);
        $this->load->view('Admin/footer');        
       } 
       public  function update_news() 
            {
        $id = $this->input->post("id");
if($_FILES['news_image']['size']>1000 * 1000)// to check what is your post name print_r($_FILES);
{
     $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Image is too big and not exceed 1000KB!</div>');
            redirect('Admin/list_news');
}
                $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('news_image'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $news_image  = $this->input->post('news_image');
        
                }
             else
                {
                       $data = array('news_image' => $this->upload->data());
                       $news_image  = $data['news_image']['file_name'];                       
                 }
            $data = array(
                     
                        'news_title' => $this->input->post('news_title'),
                        'news_description' =>$this->input->post('desc'),
                        'news_image' => $news_image             
                 );
                   $result = $this->News_model->update_news($data,$id); 
                if($result)
                {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have Successfully Updated!</div>');
        redirect('Admin/list_news');
  
                } 
           
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You have not Successfully Updated!</div>');
                    redirect('Admin/list_news'); 
    }
     
    }
    public function remove_news()
    {  
    
     $news_id = $this->input->post('news_id');
           $data = $this->News_model->delete_news($news_id);
      if($data)
      {
  $this->session->set_flashdata('msg','<div class="alert alert-success text-center">News has been successfully removed!!!!</div>');
       redirect('Admin/list_news');
      
      }
      else
      {
      redirect('Admin/index','refresh'); 
      }
    }
    /*...................Notices............................*/ 
  public function add_notice_form(){
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
  {  
        $this->load->view('Admin/header');
        $this->load->view('Admin/add_notice');
        $this->load->view('Admin/footer');
  } else
    {
       redirect('Admin/index','refresh');      
    } 
}
  Public function add_notice(){  
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
  {
    $this->load->helper(array('form', 'url'));  
      $this->load->helper('security');
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="col-md-offset-3 error">', '</div>');
      $this->form_validation->set_rules('title','Title', 'trim|required' );
      $this->form_validation->set_rules('notice','Notice', 'trim|required' );
      $this->form_validation->set_message('required', '*Field is required');
   if ($this->form_validation->run() == FALSE)
     {
    $this->load->helper(array('form','url'));
    $this->load->view('Admin/header');
    $this->load->view('Admin/add_notice');
    $this->load->view('Admin/footer');
     } else
     {
       date_default_timezone_set("Asia/Kolkata");
       $data = array(            
            'title' => $this->input->post('title'),
            'notice' => $this->input->post('notice'),
            'date' => $this->input->post('date')
           );      
       $result = $this->Notice_model->insert_notice($data);
      if($result)
         {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> notice added Successfully </div>');
              redirect('Admin/add_notice_form');
         }
      else
      {
       $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
        redirect('Admin/add_notice_form');        
      }  
}
  }
else
    {
       redirect('Admin/index','refresh');
     } 
}
public function notice_list(){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
      $data['notice'] = $this->Notice_model->get_all_details();  
          if($data != NULL){
        $this->load->view('Admin/header');
        $this->load->view('Admin/list_notice', $data);
        $this->load->view('Admin/footer');
      }else{
        $this->load->view('Admin/header');
        $this->load->view('error_page_view');
        $this->load->view('Admin/footer');
      }    
}else
    {
       redirect('Admin/index','refresh'); 
    }
}
public function edit_notice($id){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
if(isset($id)){   
       $data['notice'] = $this->Notice_model->get_notice($id);    
          if($data != NULL){        
        $this->load->view('Admin/header');
        $this->load->view('Admin/edit_notice', $data);
        $this->load->view('Admin/footer');
      }else{
        $this->load->view('Admin/header');
        $this->load->view('error_page_view');
        $this->load->view('Admin/footer');
      }
}
else{
  redirect('Admin/notice_list');
}
      }
   else
    {
       redirect('Admin/index','refresh');
   }
}
public function update_notice(){  
 if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
  $id = $this->input->post("notice_id");
  $this->load->helper(array('form', 'url'));  
  $this->load->helper('security');
  $this->load->library('form_validation');
  $this->form_validation->set_error_delimiters('<div class="col-md-offset-3 error">', '</div>');
  $this->form_validation->set_rules('title','Title', 'trim|required' );
  $this->form_validation->set_rules('notice','Notice', 'trim|required' );  
   if ($this->form_validation->run() == FALSE)
     {
      redirect('Admin/notice_list');
    }
     else{
       date_default_timezone_set("Asia/Kolkata");
       $data = array(
            'title' => $this->input->post('title'), 
            'notice' => $this->input->post('notice'),
            'date' => $this->input->post('date'),
            );
      $result = $this->Notice_model->update_notice($data, $id);
 if($result)
       {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Details Updated Succesfully !!! </div>');
         redirect('Admin/notice_list');
        }
         else
         {
           $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('Admin/notice_list');
         }
         }        
}else
    {
       redirect('Admin/index','refresh');
   }
}
function delete_notice($id)
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
      $result =  $this->Notice_model->notice_delete($id);
     if($result)
       {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Details Deleted Succesfully !!! </div>');
         redirect('Admin/notice_list');
        }
         else
         {
           $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('Admin/notice_list');
         }            
} else
    {
       redirect('Admin/index','refresh');
   }
}
 /**************************Student attendance************************************************/
   
   public function add_stud_attendance()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
    
        $this->load->view('Admin/header');
    $data['stud']= $this->Attendance_model->selected_stud(0,0);
    $data['list']=$this->Attendance_model->get_all_course(); 
     $data['list_yr']=$this->Attendance_model->selected_year();
        $this->load->view('Admin/add_stud_attendance',$data);
        $this->load->view('Admin/footer');   
    }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
 
   public function select_attendance()
   {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
      $id = $this->input->post('course');
        $id1 =  $this->input->post('year');
    $data['list']=$this->Attendance_model->get_all_course(); 
     $data['list_yr']=$this->Attendance_model->selected_year();
        $data['stud']= $this->Attendance_model->selected_stud($id,$id1); 
 if($data['stud'] != NULL){   
      $this->load->view('Admin/header');
      $this->load->view('Admin/add_stud_attendance',$data);
        $this->load->view('Admin/footer');  
}else{
   $this->load->view('Admin/header');
  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">data not avilable!</div>');
   redirect('Admin/add_stud_attendance'); 
   $this->load->view('Admin/footer');
   
} }else
    {
       redirect('Admin/index','refresh'); 
    }
   }
   public function insert_attendance()
   {
      $form_data=  $this->input->post();
    $totalday=$form_data['totday'];
    $date=$form_data['date'];
    $course=$form_data['curs_id'];
    $batch=$form_data['stud_batch'];
    
  
   $data= array(
        'atten_day'=>$totalday,
                'atten_month'=>$date,       
        'atten_cour_id'=>$course,
        'atten_batch_id'=>$batch
        );
    $result=$this->Attendance_model->insertatten($form_data,$data);
  
     if($result)
      {
      $this->load->view('Admin/header');
  $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> successfully Added!!!!</div>');
       redirect('Admin/add_stud_attendance');
     $this->load->view('Admin/footer');
      
      }
      else
      {
     $this->load->view('Admin/header');
  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Try after some time!!!!</div>');
       redirect('Admin/add_stud_attendance');
     $this->load->view('Admin/footer');
      }
 
}
  public function list_stud_attendance()
  {
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
    
        $this->load->view('Admin/header');
    $data['stud']= $this->Attendance_model->selected_stud(0,0);
     $data['list_yr']=$this->Attendance_model->selected_year();
    $data['list']=$this->Attendance_model->get_all_course(); 
    $data['attenda']= $this->Attendance_model->selected_attendan(0,0,0);
        $this->load->view('Admin/list_stud_attendance',$data);
        $this->load->view('Admin/footer');   
    }else
    {
       redirect('Admin/index','refresh'); 
    }
  }
  public function list_std_attendance()
  {
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
    $id = $this->input->post('course');
        $id1 =  $this->input->post('year');
    $month= $this->input->post('myDate');
    $data['course'] = $this->input->post('course');
    $data['year'] =  $this->input->post('year');
    $data['myDate']= $this->input->post('myDate');
    $data['list_yr']=$this->Attendance_model->selected_year();
    $data['list']=$this->Attendance_model->get_all_course(); 
    $data['stud']= $this->Attendance_model->selected_stud(0,0);
    $data['attenda']= $this->Attendance_model->selected_attendan($id,$id1,$month);
    if($data != NULL){  
    $this->load->view('Admin/header');
    $this->load->view('Admin/list_stud_attendance',$data);
        $this->load->view('Admin/footer');    
  }
}else
    {
       redirect('Admin/index','refresh'); 
    }
}
   public function excels($myDate,$course,$year)
    {
     $batches = $this->Attendance_model->selected_dtl($course,$year);
    $cour['cour']=$batches[0]['c_name'];
    $cou['cou']=$batches[0]['batch_year'];
    $courses=$cour['cour'];
    $yearr=$cou['cou'];
    $month1=urldecode($myDate);
     
               // $this->excel->getActiveSheet()->setTitle('Countries');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Attendence_report');
        $this->excel->getActiveSheet()->SetCellValue('A3', 'Sl.no');
        $this->excel->getActiveSheet()->SetCellValue('B3', 'Admission no');
        $this->excel->getActiveSheet()->SetCellValue('D3', 'Roll NO');
        $this->excel->getActiveSheet()->SetCellValue('E3', 'Name');
        $this->excel->getActiveSheet()->SetCellValue('H3', 'Total Present Day');
        $this->excel->getActiveSheet()->SetCellValue('J3', 'Total Absent Day');
        $this->excel->getActiveSheet()->SetCellValue('L3', 'Total Working Day');
       
                $this->excel->getActiveSheet()->setCellValue('B1','Student Attendance Sheet:'.$courses.'   '.$yearr.'    '.$month1);
                $this->excel->getActiveSheet()->mergeCells('B1:L1');
                $this->excel->getActiveSheet()->mergeCells('B3:C3');
                $this->excel->getActiveSheet()->mergeCells('E3:G3');
                $this->excel->getActiveSheet()->mergeCells('H3:I3');
                $this->excel->getActiveSheet()->mergeCells('J3:K3');
         $this->excel->getActiveSheet()->mergeCells('L3:M3');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('B1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('I'); $col++){ 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
    $rs=$this->Attendance_model->selected_attendan_excel($month1,$course,$year);
    
  $row = 4;
$col = 0;
$no = 1;  
    foreach($rs as $key=>$value) {
                       
                        echo $row . ", ". $col . "<br>";
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row,$no);
                        $col++;
                         $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['stud_admno']);
                        $col++;$col++;
           $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['stud_roll_no']);
                         $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['stud_name']);
                        $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['std_prsnt_day']);
                        $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['std_absnt_day']);
                        $col++;$col++;
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value['atten_day']);
                        $row++;
             echo $row . ", ". $col . "<br>";
                        $col = 0;
     $no++;
      
    }
    $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

              $filename=mt_rand(1,100000).'.xls'; //just some random filename
        ob_clean();
ob_start(); 
header('Content-type: application/vnd.ms-excel; charset=UTF-8' ); 
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel,'Excel5');
    $objWriter->save('php://output');
    }
/*.............................Expenses...........................*/
public function expense()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
        {
          $data['dept']=$this->Expense_model->get_all_departments();
          if($data)
          {
            $this->load->view('Admin/header');
            $this->load->view('Admin/addexpense',$data);
              $this->load->view('Admin/footer');
          }
                else
          {
              redirect('Admin/index','refresh'); 
          }
        } 
      else
        {
        redirect('Admin/index','refresh'); 
        }
    } 
  public function expense_add()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
        {
          $data = array(            
            'dept_id' => $this->input->post('dept'),
             'exp_date' => $this->input->post('edate'),
             'exp_amount' => $this->input->post('amount'),
          
             );      
        $result = $this->Expense_model->insert_expense($data);
        if($result)
           {
          $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Expense added Successfully </div>');
              redirect('Admin/expense');
           }
        else
          {
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
          redirect('Admin/expense');        
          }  
        }
      else
        {
           redirect('Admin/index','refresh');
        } 
    }
 public function expense_list()
    { 
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
        {
          
           $this->load->view('Admin/header');
            $this->load->view('Admin/get_dept_expense_view');
              $this->load->view('Admin/footer'); 
        }
      else
        {
          redirect('Admin/index','refresh'); 
        } 
    }
  public function get_month_expense()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
        {
          $month = $this->input->post('month'); 
          $year = date('Y');
          $data['m'] = $month; $data['y'] = $year;
          $data['expenses']=$this->Expense_model->get_monthly_expense($month, $year); 
           $this->load->view('Admin/header');
            $this->load->view('Admin/get_dept_expense_view',$data);
              $this->load->view('Admin/footer'); 
        }
        else
        {
           redirect('admin/index','refresh'); 
        }
    } 
    /*.................   Gallery      ..........................*/
public function add_gallery()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
          {
           
                $this->load->view('Admin/header');
                $this->load->view('Admin/gallery');
                $this->load->view('Admin/footer');
      } 
                else
                {
                   redirect('Admin/index','refresh'); 
                }
          
  } 
 public function addgallery()
      {
           if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
       if ($this->form_validation->run() === true)
        { 
           $this->load->view('Admin/header');
           $this->session->set_flashdata('msg','<div class="alert bg-maroon disabled color-palette text-center">Please enter Valid Details </div>');
             redirect('Admin/add_gallery');
            
        }
          else
        {
      
                $config['upload_path']  = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('file'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $images  = $this->input->post('file');
        
                }
             else
                {
                       $data = array('images' => $this->upload->data());
                       $images  = $data['images']['file_name'];                       
                 }  
      
      $data=array(
      'title'=>$this->input->post('title'),
      'image'=>$images
      );
    $result = $this->Gallery_model->insert_gallery($data);
   
   if($result)
    {
    $this->load->view('Admin/header');
      $this->session->set_flashdata('msg','<div class="alert alert-success  text-center"> Successfully Added Gallery</div>');
        redirect('Admin/add_gallery');
        
    }
    } 
    }
  else
    {
       redirect('Admin/index','refresh'); 
    }
   }
public function gallery_list()
    { 
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
     $data['gallery'] = $this->Gallery_model->get_all_gallery();
 if($data){    
         $this->load->view('Admin/header');   
         $this->load->view('Admin/list_gallery',$data);
        $this->load->view('Admin/footer');          
  }
    else
    {
       redirect('Admin/index','refresh'); 
    } 
  }else
    {
       redirect('Admin/index','refresh'); 
    }
  } 
function deletegallery($id)
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin') 
    {
      $result =  $this->Gallery_model->gallery_delete($id);
     if($result)
       {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Details Deleted Succesfully !!! </div>');
         redirect('Admin/gallery_list');
        }
         else
         {
           $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
             redirect('Admin/gallery_list');
         }            
} else
    {
       redirect('Admin/index','refresh');
   }
}
 /*...................Achievements............................*/ 
 public function add_achievement_view()
{
 if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
   $this->load->view('Admin/header');
         $this->load->view('Admin/achievement_add');
     $this->load->view('Admin/footer');
      
  
}
 else
      {
      redirect('Admin/index','refresh'); 
}}
    public function add_achievement_processing()
    {
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    {
           $this->load->helper('security');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
             $this->form_validation->set_rules('achi_title', 'News Title', 'required');
      $this->form_validation->set_rules('desc', 'Description' , 'required');
        
        
 if($_FILES['achi_image']['size']>1000 * 1000)
{
     $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Image is too big and not exceed 1000KB!</div>');
            redirect('admin/add_achievement_view');
}

                $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;//in kb
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload('achi_image'))
                {
          $error = array('error' => $this->upload->display_errors());
                 }
                else
                {
                       $data = array('achi_image' => $this->upload->data());
                        $achi_image=$data['achi_image']['file_name'];     
                }
                 if ($this->form_validation->run() == FALSE)
                {
         $this->load->view('Admin/header');
         $this->load->view('Admin/achievement_add');
         $this->load->view('Admin/footer');
                }
                else
                {
        $data = array(
                        'cat_id' => $this->input->post('a_cate'),
                        'title' => $this->input->post('achi_title'),
                        'description' =>$this->input->post('desc'),
                        'ach_image' => NULL   
                    );

         $insert_achi_id =$this->Achievement_model->insert_achievement($data);    
             if(isset($achi_image) &&   $insert_achi_id >0){
                $image = array(
                  
                   'ach_image' =>$achi_image
                  );
          $result = $this->Achievement_model->insert_image($insert_achi_id,$image);
     
      }
              
      
                      if($insert_achi_id)
                      {
              $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully added to the achievement list. </div>');
                redirect('Admin/add_achievement_view');
                                                
                      }
                      else
                        {
                         
                            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                            redirect('Admin/add_achievement_view');
                        }
         }       
    }
  
  else
      {
      redirect('Admin/index','refresh'); 
  }}
   public function list_achievement()
    {    
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    { 
         $data['achi'] = $this->Achievement_model->get_all_listachievement();  
      $this->load->view('Admin/header');
         $this->load->view('Admin/achievement_list',$data);
     $this->load->view('Admin/footer');    
        
  }
  else
      {
      redirect('Admin/index','refresh'); 
  }}
    
       public  function update_achievement() 
            {
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    { 
        $id = $this->input->post("ach_id");
if($_FILES['achi_image']['size']>1000 * 1000)// to check what is your post name print_r($_FILES);
{
     $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Image is too big and not exceed 1000KB!</div>');
            redirect('Admin/list_achievement');
}
                $config['upload_path']          = './resource/images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('achi_image'))
                {
                      $error = array('error' => $this->upload->display_errors());
                      $achi_image  = $this->input->post('achi_image');
        
                }
             else
                {
                       $data = array('achi_image' => $this->upload->data());
                       $achi_image  = $data['achi_image']['file_name'];                       
                 }
            $data = array(
                     
                        'cat_id' => $this->input->post('a_cate'),
                        'title' => $this->input->post('achi_title'),
                        'description' =>$this->input->post('desc'),
                        'ach_image' =>$achi_image           
                 );
            $result = $this->Achievement_model->update_achievement($data,$id); 
                if($result)
                {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Achievement have Successfully Updated!</div>');
        redirect('Admin/list_achievement');
  
                } 
           
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Achievement have not Successfully Updated!</div>');
                    redirect('Admin/list_achievement'); 
    }
  }
    else
      {
      redirect('Admin/index','refresh'); 
      }}
    public function remove_achievement()
    {  
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')  
    { 
     $id = $this->input->post('ach_id');
     $data = $this->Achievement_model->delete_achievement($id);
    if($data)
              {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Achievement have Successfully Removed!</div>');
        redirect('Admin/list_achievement');
  
                } 
      else
    {
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Achievement have not Successfully Removed!</div>');
                    redirect('Admin/list_achievement'); 
    }
  }
      else
      {
      redirect('Admin/index','refresh'); 
      }
    }
  /*........................Change PAssword.......................*/
    public function password_edit_form()
    {
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')
        { 
                  $this->session->all_userdata();
                    $id = $this->session->userdata('user_id'); 
          $this->load->view('Admin/header');
          $this->load->view('Admin/change_password');
          $this->load->view('Admin/footer');
        }
      else{
            redirect('Admin/index');
        }
    }
  public function validate_password()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')
        { 
          $this->session->all_userdata();
    $id = $this->session->userdata('user_id');
          $this->load->library('form_validation');
          $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
          $this->form_validation->set_rules('newpassword','New Password','required|trim|min_length[6]');
          $this->form_validation->set_rules('cnewpassword','Verify New Password','required|trim|matches[newpassword]');
        if ($this->form_validation->run() == FALSE)
        {
          $this->load->view('Admin/header');
          $this->load->view('Admin/change_password');
          $this->load->view('Admin/footer');
        }else{
            $new_pass = $this->User_model->hash_password( $this->input->post('newpassword'));
            $data = array(
                  'password' => $new_pass
                  );
          $res = $this->User_model->update_new_password($data, $id);
          if($res){
            $this->session->set_flashdata('msg','<div class="alert alert-block alert-success text-center">Password Updated Successfully!!!</div>');
            redirect('Admin/password_edit_form');
            }
          
        else{
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Password is not Successfully Updated!!!</div>');
            redirect('Admin/password_edit_form');
      
          }
    }
    }else{
            redirect('Admin/index');
        }
        } 
  }
?>