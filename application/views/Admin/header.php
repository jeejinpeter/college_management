<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SNGCAS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo base_url();?>resource/front/assets/img/icon.png" type="image/x-icon">
  <!-- Bootstrap 3.3.6 -->
  <script src="<?php echo  base_url('/resource/jquery.min.js'); ?>"></script>
  <link rel="stylesheet" href="<?php echo  base_url('/resource/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo  base_url('/resource/dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo  base_url('/resource/dist/css/skins/_all-skins.min.css'); ?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo  base_url('/resource/plugins/iCheck/all.css');?>">
<link rel="stylesheet" href="<?php echo  base_url('/resource/plugins/datatables/dataTables.bootstrap.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo  base_url();?>resource/bootstrap/css/jquery.dataTables.min.css">
 <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="<?php echo  base_url('resource/plugins/fullcalendar/fullcalendar.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo  base_url('resource/plugins/fullcalendar/fullcalendar.print.css'); ?>" media="print">
  <link rel="stylesheet" href="<?php echo base_url('resource/plugins/select2/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('resource/css/jquery-ui.css'); ?>">
  <script type="text/javascript" src="<?php echo base_url('resource/plugins/ckeditor/ckeditor.js'); ?>"></script>

  <script src="<?php echo  base_url('/resource/js/jquery.zoom.min.js'); ?>"></script>
  <script src="<?php echo  base_url('/resource/js/jquery.zoom.js'); ?>"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SN</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SNGCAS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-i-cursor"></i>
              <span class="label label-success"></span>
            </a>
           
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> </li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <div class="text-center">
                      <i class="fa fa-battery-quarter text-aqua"></i> </br>
                      
                    </div>
                      <div class="text-center">
                      <i class="fa fa-battery-quarter text-aqua"></i> </br>
                      
                    </div>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo  base_url(''); ?>"><b>View all</b></a></li>
            </ul>
          </li>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-i-cursor"></i>
              <span class="label label-danger"></span>
            </a>
             
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>resource/front/assets/img/icon.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin's Page</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>resource/front/assets/img/icon.png" class="img-circle" alt="User Image">

                <p>
                  
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div-->
                <!-- /.row -->
              <!--/li-->
              <!-- Menu Footer-->
              <li class="user-footer">
              <?php  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && $_SESSION['role'] === '1' && $_SESSION['role_des'] === 'admin')
                  $this->session->all_userdata();
                  $id = $this->session->userdata('user_id');?>
                <div class="pull-left">
                  <a href="<?php echo  base_url('Admin/password_edit_form'); ?>" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('User/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>resource/front/assets/img/icon.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>SNGCAS</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
        <div class="input-group">
         
        </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li class="active treeview">
          <a href=" <?php echo base_url('Admin/admin_home_page');?>">
            <i class="fa fa-dashboard"></i> <span>Home</span>
           
          </a>
         
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa  fa-users"></i> <span>Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/addstudent_view');?>"><i class="fa  fa-plus-square-o"></i>Add New Students</a></li>
             <li><a href="<?php echo base_url('Admin/list_Admission');?>"><i class="fa fa-reorder"></i>View Students</a></li>
             <li>
                <a href="<?php echo site_url('/index.php/admin/list_all_Admission');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b> View  all Admissions</b></a> 
              </li>
          </ul>
        </li>

       <li class="treeview">
          <a href="<?php echo base_url('Admin/staff'); ?>">
            <i class="fa fa-user"></i> <span>Staff</span>
            
          </a>
        </li> 
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bookmark"></i> <span>Courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/course');?>"><i class="fa fa-list-alt"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/course_list');?>"><i class="fa fa-th-list"></i>List </a></li>
          </ul>
       
        </li> 
        <li class="treeview">
          <a href="<?php echo base_url('Admin/manage_department'); ?>">
            <i class="fa fa-university"></i> <span>Our Departments</span>
            
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Staff Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_attendence');?>"><i class="fa fa-television"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/list_attendance_view');?>"><i class="fa  fa-ellipsis-v"></i>List</a></li>
          </ul>
       
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i> <span>Student Attendance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_stud_attendance');?>"><i class="fa fa-television"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/list_stud_attendance');?>"><i class="fa  fa-ellipsis-v"></i>List</a></li>
          </ul>
       
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-clock-o"></i> <span>Time Table</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_timetable');?>"><i class="fa fa-list-alt"></i>Add Timetable</a></li>
            <li><a href="<?php echo base_url('Admin/timetable_list');?>"><i class="fa fa-th-list"></i>List Timetable </a></li>
          </ul>
       
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa  fa-pencil-square-o"></i> <span>Examinations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_exam');?>"><i class="fa fa-list-alt"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/list_exam');?>"><i class="fa fa-th-list"></i>List </a></li>
          </ul>
       
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil-square"></i> <span>Mark</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/addmark');?>"><i class="fa  fa-plus-square-o"></i>Add</a></li>
             <li><a href="<?php echo base_url('Admin/marklist');?>"><i class="fa fa-reorder"></i>List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-plus"></i> <span>Fee Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_fee_category');?>"><i class="fa fa-list-alt"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/list_fee_category');?>"><i class="fa fa-th-list"></i>List </a></li>
          </ul>
       
        </li> 
          <li class="treeview">
          <a href="#">
            <i class="fa  fa-inr"></i> <span>Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
 <li class="active"><a href="<?php echo base_url('Admin/get_fees_view');?>"><i class="fa fa-credit-card"></i>Fee Remittance</a></li>
  <li class="active"><a href="<?php echo base_url('Admin/get_fees_paid_view');?>"><i class="fa fa-credit-card"></i>Fee Payments</a></li>
   <li class="active"><a href="<?php echo base_url('Admin/get_all_fees_view');?>"><i class="fa fa-credit-card"></i>Pending Fees View</a></li>
          </ul>
        </li>
<li class="treeview">
          <a href="#">
            <i class="fa  fa-pencil"></i> <span>Expenses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 <li class="active"><a href="<?php echo base_url('Admin/expense');?>"><i class="fa fa-credit-card"></i>Add Expense</a></li>
  <li class="active"><a href="<?php echo base_url('Admin/expense_list');?>"><i class="fa fa-bar-chart-o"></i>list Expenses</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Achievements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 <li class="active"><a href="<?php echo base_url('Admin/add_achievement_view');?>"><i class="fa fa-circle-o"></i>Add</a></li>
 <li><a href="<?php echo base_url('Admin/list_achievement');?>"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li> 
       <li class="treeview">
          <a href="<?php echo base_url('Admin/semester'); ?>">
            <i class="fa fa-book"></i> <span>Semesters</span>
            
          </a>
        </li> 
         <li class="treeview">
          <a href="<?php echo base_url('Admin/subject'); ?>">
            <i class="fa fa-inbox"></i> <span>Course Subjects</span>
            
          </a>
        </li> 
        <li class="treeview">
          <a href="<?php echo base_url('Admin/add_batchview'); ?>">
            <i class="fa fa-certificate"></i> <span>Batch/Year</span>
            
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url('Admin/show_events_page'); ?>">
            <i class="fa fa-fire"></i> <span>Events</span>
            
          </a>
        </li> 
           <li class="treeview">
          <a href="#">
            <i class="fa  fa-newspaper-o"></i> <span>News</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 <li class="active"><a href="<?php echo base_url('Admin/add_news_view');?>"><i class="fa fa-circle-o"></i>Add</a></li>
 <li><a href="<?php echo base_url('Admin/list_news');?>"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li> 
         <li class="treeview">
          <a href="#">
            <i class="fa  fa-info-circle"></i> <span>Noticeboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_notice_form');?>"><i class="fa fa-television"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/notice_list');?>"><i class="fa  fa-ellipsis-v"></i>List</a></li>
          </ul>
       
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa  fa-camera"></i> <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="active"><a href="<?php echo base_url('Admin/add_gallery');?>"><i class="fa fa-television"></i>Add </a></li>
            <li><a href="<?php echo base_url('Admin/gallery_list');?>"><i class="fa  fa-ellipsis-v"></i>List</a></li>
          </ul>
       
        </li>
               </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- =============================================== -->

 

    

 