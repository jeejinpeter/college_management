<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	 public function __construct()
	 {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->database();
		$this->load->library(array('session', 'form_validation', 'email'));
 		$this->load->model('User_model');
		 $this->load->model('Admin_model');
		$this->load->model('Course_model');
		$this->load->model('Batch_model');
		$this->load->model('Student_model');
		$this->load->model('Subject_model');
		$this->load->model('Achievement_model');
		$this->load->model('Gallery_model');
		$this->load->model('Timetable_model');
		$this->load->model('Exam_model');
		$this->load->model('Notice_model');
		$this->load->model('Event_model');
		$this->load->model('Expense_model');
		$this->load->model('Attendance_model');
		}
	public function index()
	{
	 $this->load->helper(array('form', 'url'));
     $this->load->view('Staff/login');
	}
	public function staff_home_page()
    {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{ 
		 
		  $this->load->helper(array('form', 'url'));
		  $this->load->view('Staff/header');
		  $this->load->view('Staff/home');
		  $this->load->view('Staff/footer');
		}else
		{
		   redirect('Staff/index','refresh'); 
		}
    }
	public function staff_login_process() 
	{
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
         $this->load->view('Staff/login');
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
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff') 
                            {
                             redirect('Staff/staff_home_page', 'refresh');  
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
              $this->load->view('Staff/login', $data);
            }
          }
       }
	}
	/*--------------------Students---------------------------*/
	public function list_Admission()
    { 
	  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{
			 $data['sem'] = $this->Subject_model->get_semester();
				$data['course'] = $this->Course_model->get_courses();
				$data['batch']=$this->Batch_model->get_all_batch(); 
		$data['admission_list'] = $this->Student_model->get_students();
		if($data){    
			 $this->load->view('Staff/header');   
			 $this->load->view('Staff/list_admission',$data);
			  $this->load->view('Staff/footer');   
				 
			}
		else
		{
		   redirect('Staff/index','refresh'); 
		} 
	  }
	  else
		{
		   redirect('Staff/index','refresh'); 
		}
	}  
	public function get_by_search()
    { 
        $id =  $this->input->post('course');  
		$id2 = $this->input->post('sem');
            $data['sem'] = $this->Subject_model->get_semester();
            $data['course'] = $this->Course_model->get_courses();   
            $data['search'] = $this->Student_model->get_by_type($id,$id2); 
			if($data){ 
				 $this->load->view('Staff/header');   
				 $this->load->view('Staff/search',$data);        
				}
			else
			{
			   redirect('Staff/index','refresh'); 
			} 
	}
	public function list_all_Admission()
    { 
		$data['admission_list'] = $this->Student_model->get_all_students();
		if($data){    
			 $this->load->view('Staff/header');   
			 $this->load->view('Staff/list_all_admission',$data);    
			$this->load->view('Staff/footer');
				}
		else
		{
		   redirect('Staff/index','refresh'); 
		} 
    }
	/*--------------------------Course--------------------*/
	public function course_list()
    {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
        {
          $data['list']=$this->Course_model->get_sem_course();$data['year']=$this->Course_model->get_year_course();
          
          $this->load->view('Staff/header');
          $this->load->view('Staff/course_list.php',$data);
          $this->load->view('Staff/footer'); 
        }else
        {
          redirect('Staff/index','refresh'); 
        }
    }
	public function semester_details($id)
    {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{
			$data = $this->Course_model->get_semester_by_id($id);
			if($data){ echo form_open("Staff/update_semester_details"); 
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
				echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['semester1_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
				<td>
			  <?php 
				echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem1_couse_fee'].'" >';  ?></td>
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
				echo'<input type="text" name="class_name" class="form-control" readonly  value="'.$subject.'" >';?><?php }else{
				echo'<input type="text" class="form-control" value="">';}?></td> 
			  </tr>
			  <tr>
			  <td>
			  <?php 
				echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['semester2_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
				<td>
			  <?php 
				echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem2_couse_fee'].'" >';  ?></td>
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
					echo'<input type="text" name="class_name" class="form-control" readonly value="'.$subject2.'" >';
			  ?><?php }else{
					echo'<input type="text" class="form-control" value="">';}?></td> </td>
				  </tr>
				  <tr>
				  <td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly  value="'.$value['semester3_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
				  <td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem3_couse_fee'].'" >';  ?></td>
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
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$subject3.'" >';
			  ?><?php }else{
				   echo'<input type="text" class="form-control" value="">';}?></td> 
				  </tr>
				  <tr>
				  <td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['semester4_id'].'&nbsp;&nbsp; Sem" >';  ?></td>
				  <td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem4_couse_fee'].'" >';  ?></td>
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
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$subject4.'" >';?><?php }else{
				  echo'<input type="text" class="form-control" value="">';}?></td>
				  </tr><tr><td>
			  <?php  
				  echo'<input type="text"   name="class_name"class="form-control" readonly value="'.$value['semester5_id'].'&nbsp;&nbsp; Sem" >';  ?></td><td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem5_couse_fee'].'" >';  ?></td><td>
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
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$subject5.'" >';?><?php }else{
				   echo'<input type="text" class="form-control" value="">';}?></td></tr>
				  <tr>
				  <td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['semester6_id'].'&nbsp;&nbsp; Sem" >';  ?></td><td>
			  <?php 
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem6_couse_fee'].'" >';  ?></td>
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
				  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$subject6.'" >';?><?php }else{
				  echo'<input type="text" class="form-control" value="">';}?></td>
				  <td>
			  <?php 
				  echo'</br>';  
				  } ?></td></tr><table> <?php 
				  }else{echo "No data Available.";} echo form_close(); 
				  }else
				{
				  redirect('Staff/index','refresh'); 
				}
	} 
	public function year_details($id)
    {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{
			$data = $this->Course_model->get_semester_by_id($id);
		  if($data){ echo form_open("Staff/update_year_details"); 
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
			echo'<input type="text" name="class_name" class="form-control" readonly value="I st Year" >'; } ?></td>
			<td>
		  <?php 
			echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem1_couse_fee'].'" >';  ?></td>
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
			echo'<input type="text" name="class_name" class="form-control" readonly value="'.$subject.'" >';?><?php }else{
			echo'<input type="text" class="form-control" value="">';}?></td> 
		  </tr>
		  <tr>
		  <td>
		  <?php 
		  if($value['semester2_id']){
		  echo'<input type="text" name="class_name" class="form-control" readonly value="II nd Year" >';  }?></td>
			<td>
		  <?php 
			echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem2_couse_fee'].'" >';  ?></td>
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
				echo'<input type="text" name="class_name" class="form-control" readonly  value="'.$subject2.'" >';
		  ?><?php }else{
				echo'<input type="text" class="form-control" value="">';}?></td> </td>
			  </tr>
			  <tr>
			  <td>
		  <?php if($value['semester3_id']){
		  echo'<input type="text" name="class_name" class="form-control" readonly value="III rd Year" >'; } ?></td>
			  <td>
		  <?php 
			  echo'<input type="text" name="class_name" class="form-control" readonly value="'.$value['sem3_couse_fee'].'" >';  ?></td>
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
			  echo'<input type="text" name="class_name" class="form-control" readonly  value="'.$subject3.'" >';
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
			  redirect('Staff/index','refresh'); 
			}
	}
	/*-------------------Time table----------------------*/
	public function timetable_list()
	{
	   if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff') 
		 {
		  $data['rout'] = $this->Timetable_model->get_all_timetable();  
			  if($data != NULL){
			$this->load->view('Staff/header');
			$this->load->view('Staff/list_time_table',$data);
			$this->load->view('Staff/footer');
		  }else{
			$this->load->view('Staff/header');
			$this->load->view('error_page_view');
			$this->load->view('Staff/footer');
		  }
		 } 
	   else{
		 redirect('Staff/index','refresh');
	   }
	}
	public function timetable_download($file)
	{ 
		$this->load->helper('download'); 
		$data = file_get_contents(base_url("resources/uploads/". $file));
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
   /*--------------Exam--------------------*/
   public function list_exam()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff'){
		  $data['exam'] = $this->Exam_model->get_all_exam();  
			$this->load->helper(array('form','url'));
			$this->load->view('Staff/header');      
			$this->load->view('Staff/list_exam',$data);
			$this->load->view('Staff/footer');
	   }
	   else{
		 redirect('Staff/index');
	   }
	}
	/*------------------Notice-------------------*/
	public function notice_list()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff') 
		{
		  $data['notice'] = $this->Notice_model->get_all_details();  
			  if($data != NULL){
			$this->load->view('Staff/header');
			$this->load->view('Staff/list_notice', $data);
			$this->load->view('Staff/footer');
			
		  }else{
			$this->load->view('Staff/header');
			$this->load->view('error_page_view');
			$this->load->view('Staff/footer');
		  }    
		}else
			{
			   redirect('Staff/index','refresh'); 
			}
	}
	/*---------------------Events--------------*/
	public function show_events_page()
	{
			  $data['event'] = $this->Event_model->get_all_listevent(); 
			  $this->load->view('Staff/header');
			  $this->load->view('Staff/organise_events', $data);
			  $this->load->view('Staff/footer');
	}
	/*---------------Student Attendance---------------------*/
	public function add_stud_attendance()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{
    
			$this->load->view('Staff/header');
			$data['stud']= $this->Attendance_model->selected_stud(0,0);
			$data['list']=$this->Attendance_model->get_all_course(); 
			$data['list_yr']=$this->Attendance_model->selected_year();
			$this->load->view('Staff/add_stud_attendance',$data);
			$this->load->view('Staff/footer');   
		}
		else
		{
		   redirect('Staff/index','refresh'); 
		}
   }
   public function select_attendance()
   {
       if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{
			$id = $this->input->post('course');
			$id1 =  $this->input->post('year');
			$data['list']=$this->Attendance_model->get_all_course(); 
			$data['list_yr']=$this->Attendance_model->selected_year();
			$data['stud']= $this->Attendance_model->selected_stud($id,$id1); 
			 if($data['stud'] != NULL){   
				  $this->load->view('Staff/header');
				  $this->load->view('Staff/add_stud_attendance',$data);
			}
			else
			{
			   $this->load->view('Staff/header');
			  $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">data not avilable!</div>');
			   redirect('Staff/add_stud_attendance'); 
			}
		}else
		{
		   redirect('Staff/index','refresh'); 
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
			$this->load->view('Staff/header');
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> successfully Added!!!!</div>');
			redirect('Staff/add_stud_attendance');
		}
		else
		{
			$this->load->view('Staff/header');
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Try after some time!!!!</div>');
			redirect('Staff/add_stud_attendance');
			$this->load->view('Staff/footer');
		}
	}
	public function list_stud_attendance()
	{
          if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
			{
				$this->load->view('Staff/header');
			$data['stud']= $this->Attendance_model->selected_stud(0,0);
			 $data['list_yr']=$this->Attendance_model->selected_year();
			$data['list']=$this->Attendance_model->get_all_course(); 
			$data['attenda']= $this->Attendance_model->selected_attendan(0,0,0);
				$this->load->view('Staff/list_stud_attendance',$data);
				$this->load->view('Staff/footer');   
			}else
			{
			   redirect('Staff/index','refresh'); 
			}
	}
	public function list_std_attendance()
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
		$this->load->view('Staff/header');
		$this->load->view('Staff/list_stud_attendance',$data);
		$this->load->view('Staff/footer');    
	  }
	}
	/*-------------------Marks-----------------------*/
	public function addmark()
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
          {
			$data['batch']=$this->Student_model->get_all_batch();
             $data['course']=$this->Student_model->get_all_course();
			$data['sem']=$this->Student_model->get_all_sem();
             if($data)
             {
                $this->load->view('Staff/header');
                $this->load->view('Staff/addmark',$data);
				$this->load->view('Staff/footer');
              }
                else
                {
                   redirect('Staff/index','refresh'); 
                }
          }else
            {
               redirect('Staff/index','refresh'); 
            }
	}
	public function student_list()
    { 
	  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
		{
		 $cr=$this->input->post('course');
		 $sm=$this->input->post('sem');
		 $yr=$this->input->post('batch');
			$data['stu_list'] = $this->Student_model->get_all_studentlist($cr,$sm,$yr);
		 if($data){    
				 $this->load->view('Staff/header');   
				 $this->load->view('Staff/student_list1',$data);
				 $this->load->view('Staff/footer');
		  }
			else
			{
			   redirect('Staff/index','refresh'); 
			} 
	  }else
		{
		   redirect('Staff/index','refresh'); 
		}
	}
	public function addmark_details($id)
      {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
          {
             $data['course']=$this->Student_model->get_all_course();
			$data['stud_list']=$this->Student_model->get_stud($id);  
             if($data)
             {
                $this->load->view('Staff/header');
                $this->load->view('Staff/markdetails',$data);
				$this->load->view('Staff/footer');
                 }
                else
                {
                   redirect('Staff/index','refresh'); 
                }
          }else
            {
               redirect('Staff/index','refresh'); 
            }
	}
	public function student_mark()
	{
     if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff') 
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
				  redirect('Staff/addmark_details/'.$id);
			 }
		  else
		  {
		   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
			redirect('Staff/addmark_details/'.$id);        
		  }  
	}
	else
		{
		   redirect('Staff/index','refresh');
		 } 
	}
	Public function marklist()
    {
       $data['batch']=$this->Student_model->get_all_batch();
             $data['course']=$this->Student_model->get_all_course();
        $data['sem']=$this->Student_model->get_all_sem();
             if($data)
             {
                $this->load->view('Staff/header');
                $this->load->view('Staff/mark_list',$data);
				$this->load->view('Staff/footer');    
                 }
                else
                {
                   redirect('Staff/index','refresh'); 
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
				 $this->load->view('Staff/header');   
				 $this->load->view('Staff/mark_list1',$data);
				$this->load->view('Staff/footer');          
		  }
		  else
			{
			   redirect('Staff/index','refresh'); 
			}
	}
	/*-=================================Expense=======================================-*/		
	public function expense()
    {
         if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
          {
			$data['dept']=$this->Expense_model->get_all_departments();
			
				  if($data)
				 {
					$this->load->view('Staff/header');
					$this->load->view('Staff/addexpense',$data);
					$this->load->view('Staff/footer'); 
					 }
					else
					{
					   redirect('Staff/index','refresh'); 
					}
			  }else
            {
               redirect('Staff/index','refresh'); 
            }
	} 
	public function expense_add()
	{
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff') 
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
				  redirect('Staff/expense/');
			 }
		  else
		  {
		   $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed  !!!</div>'); 
			redirect('Staff/expense/');        
		  }  
		}
		else
		{
		   redirect('Staff/index','refresh');
		 } 
	}  
	public function expense_list()
    { 
      if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
        {
          $this->load->view('Staff/header');
          $this->load->view('Staff/get_dept_expense_view'); 
			$this->load->view('Staff/footer'); 
        }
      else
        {
          redirect('Staff/index','refresh'); 
        } 
    }
	public function get_month_expense()
    {
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '2' && $_SESSION['role_des'] === 'staff')  
        {
          $month = $this->input->post('month'); 
          $year = date('Y');
          $data['m'] = $month; $data['y'] = $year;
          $data['expenses']=$this->Expense_model->get_monthly_expense($month, $year); 
          $this->load->view('Staff/header');
          $this->load->view('Staff/get_dept_expense_view',$data); 
		  $this->load->view('Staff/footer'); 
        }
        else
        {
           redirect('Staff/index','refresh'); 
        }
    }
	public function logout() 
	{
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
	
	
}