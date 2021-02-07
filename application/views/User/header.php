<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>SNGC| Chelannur</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>resource/front/assets/img/icon.png" type="image/x-icon">

    <!-- Font awesome -->
    <link href="<?php echo base_url();?>resource/front/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>resource/front/assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resource/front/assets/css/slick.css">          
    <!-- Theme color -->
    <link id="switcher" href="<?php echo base_url();?>resource/front/assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="<?php echo base_url();?>resource/front/assets/css/style.css" rel="stylesheet">    
<meta name="_token" content="{!! csrf_token() !!}"/>
   
    <!-- Google Fonts -->
    
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-header-area">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-left">
                  <div class="mu-top-email">
                    <i class="fa fa-envelope"></i>
                    <span>info@markups.io</span>
                  </div>
                  <div class="mu-top-phone">
                    <i class="fa fa-phone"></i>
                    <span>(568) 986 652</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="mu-header-top-right">
                  <nav>
                    <ul class="mu-top-social-nav">
                      <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                      <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                      <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <!-- <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Varsity</span></a> -->
          <!-- IMG BASED LOGO  -->
         <a class="navbar-brand" href="index.html"><img src="<?php echo base_url();?>resource/front/assets/img/logo.png" alt="logo"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="<?php echo base_url('User/home');?>">Home</a></li>    
<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">About us <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('User/founder');?>">Founder</a></li>                
                <li><a href="<?php echo base_url('User/our_vision');?>">Vision & Mission</a></li>                
                <li><a href="<?php echo base_url('User/governingbody');?>">Governing Body</a></li>                
                <li><a href="<?php echo base_url('User/principals_desk');?>">From Principle's desk</a></li>                
                             
              </ul>
            </li> 			
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Courses <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                            
                <li><a href="<?php echo base_url('User/about_admissions');?>">Admissions</a></li> 
                <li><a href="<?php echo base_url('User/why_us');?>">Why us?</a></li>				
              </ul>
            </li>           
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Facilities <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                              
                <li><a href="<?php echo base_url('User/facilities');?>">Infrastructure</a></li>                
                             
              </ul>
			      <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Achivements <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                            
                <li><a href="<?php echo base_url('User/student_achievement_view');?>">Student Achivements</a></li> 
                 <li><a href="<?php echo base_url('User/college_achievement_view');?>">College Achivements</a></li> 
                <li><a href="<?php echo base_url('User/staff_achievement_view');?>">Staff Achivements</a></li> 
 			
              </ul>
            </li> 
            </li>  
                <li><a href="<?php echo base_url('User/placement');?>">Placements</a></li>  
              <li><a href="<?php echo base_url('User/gallery');?>">Gallery</a></li>			
            <li><a href="<?php echo base_url('User/contact');?>">Contact</a></li>
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="<?php echo base_url();?>resource/front/assets/img/slider/1.jpg" alt="img">
        </figure>
      </div>
      <!-- <div class="mu-slider-content"> -->
        <!-- <h4>Welcome To SNGC Chelannur</h4> -->
        <!-- <span></span> -->
        <!-- <h2>We Will Help You To Learn</h2> -->
        <!-- <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet error eius reiciendis eum sint unde eveniet deserunt est debitis corporis temporibus recusandae accusamus.</p> --> 
      
      <!-- </div> -->
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="<?php echo base_url();?>resource/front/assets/img/slider/21.jpg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Welcome To SNGC Chelannur</h4>
        <span></span>
        <h2>We Will Help You To Learn</h2>
        
       
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="<?php echo base_url();?>resource/front/assets/img/slider/3.jpg" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
       <h4>Welcome To SNGC Chelannur</h4>
        <span></span>
        <h2>Education For Everyone</h2>
       
      </div>
    </div>
    <!-- Start single slider item -->    
  </section>
  <!-- Start features section -->