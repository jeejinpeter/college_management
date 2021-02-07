<!--DOCTYPE html-->
<html >
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>SNTrusts</title>
        <link rel="shortcut icon" href="<?php echo base_url('resource/images/logo.jpg');?>" type="image/x-icon">
        <!-- BOOTSTRAP SCRIPTS  -->
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo  base_url('resource/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
       <script src="<?php echo  base_url('resource/jquery-latest.min.js'); ?>" type="text/javascript"></script>
        <link href="<?php echo base_url();?>resource/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo  base_url();?>resource/jquery.min.js"></script> 
        <link href="<?php echo  base_url();?>resource/bootstrap/fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
        <script src="<?php echo  base_url();?>resource/bootstrap/js/bootstrap.min.js"></script>
        <!--//for display icon-->
        <link href="<?php echo  base_url();?>resource/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo  base_url();?>resource/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo  base_url();?>resource/custom_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  base_url();?>resource/bootstrap/css/jquery.dataTables.min.css">
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="<?php echo  base_url();?>resource/bootstrap/js/jquery.dataTables.min.js"></script>
        <meta name="_token" content="{!! csrf_token() !!}"/>
    </head>
   <body>
        <div id="wrapper">
            <div class="col-md-12 ">
                <div class="col-md-4">
                    <img src="<?php echo base_url('resource/images/logo.jpg');?>" style="paddding-top:5px; width:50px; height:50px;">
                </div>
               <div class="col-md-4">
               <em>You are at</em>&nbsp;<span>SNGCAS, Chelannur</span>
               </div>
                <div class="col-md-4">
                    <ul class="nav navbar-top-links navbar-right" style="float:right; padding-right:3%;">
                        <li class="dropdown">
                            <div class="profileicon">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:#fff;font-size:19px!important;">
                                    <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                            </div>
                            <ul class="dropdown-menu dropdown-user">
                                <li><h4><center>SN Trust-Staff</center></h4></li>
                                
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('Truststaff/change_staff_password');?>"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo base_url('User/super_logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="row">
                
                    <div class="col-md-12">
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav">
                                        <li>   <a  href="<?php echo base_url('Truststaff/index');?>">Home</a>
 </li>
    <li><a href="<?php echo base_url('Truststaff/link_add_admin');?>">Add New Admin</a>
                                            
                                        </li>  
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Allocate Fund<span class="caret"></span></a>
        <ul class="dropdown-menu">
                                               
                                                <li>    <a href="<?php echo base_url('Truststaff/Add_fund_view');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>Add Funds</b></a> </li>
                                                 <li>    <a href="<?php echo base_url('Truststaff/list_college_fund');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>View Funds</b></a> </li>
                                                 </ul>
                                         </li>                                  
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff List<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                                    <li>
                        <a href="<?php echo base_url('Truststaff/display_all_staff_list');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>All</b></a> 
                    </li>
                                                <li>    <a href="<?php echo base_url('Truststaff/display_teaching_list');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b> Teaching </b></a> </li>
                                                  <li>
                        <a href="<?php echo base_url('Truststaff/display_non_teaching_list');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b> Non-Teaching</b></a> 
                    </li>
                                            </ul>
                                        </li>
                  <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                               
                                                <li>    <a href="<?php echo base_url('Truststaff/list_Admission');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>View Admitted Students</b></a> </li>
                                                 <li>    <a href="<?php echo base_url('Truststaff/list_all_Admission');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>View All Students</b></a> </li>
                                                 </ul>
                                         </li> 
                                          <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fees Collection Details<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                     <li><a href="<?php echo base_url('Truststaff/get_fees_view');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>Student Fee Remittance</b></a> </li>
                      <li><a href="<?php echo base_url('Truststaff/get_all_fees_view');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>Pending Fees View</b></a></li>                            
                                            </ul>
                                        </li> 
                                           <li>
                                            <a href="<?php echo base_url('Truststaff/get_college_expenses');?>">Expense Details</a>
                                            
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Messages<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                     <li><a href="<?php echo base_url('Truststaff/link_send_message');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>New Message</b></a> </li>
                        <li>
                                            <a href="<?php echo base_url('Truststaff/get_sent_messages');?>"><i class="fa fa-gear fa-1x" aria-hidden="true"></i><b>Sent Messages</b></a>
                                            
                                        </li>                          
                                            </ul>
                                        </li> 
                                          
                                         
              </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

                <script>
$(document).ready(function () {
    $('li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
    $('li.dropdown-n').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

    $(".tab a").on("click", function () {

        $(".tab").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });


});
                </script>


                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-header" style="border-bottom: 2px solid #ffc107;">Welcome <b>Staff</b>, to the Panel of SNGCAS-Chelannur</h3>
                        <h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br></div>
                    <div class="col-md-12">
                        <div class="row"><div class="col-md-10 col-md-offset-1"></div></div>
                       
                    </div>
                </div>
            </div>
        </div>
 

    

 