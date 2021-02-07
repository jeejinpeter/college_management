<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Staff Login Form</title>
  <link rel="shortcut icon" href="<?php echo base_url('resource/images/logo.jpg');?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url();?>resource/login/style.css">

  
</head>

<body>
  <!--Google Font - Work Sans-->
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>

<div class="container">
  <div class="profile">
    <button class="profile__avatar" id="toggleProfile">
     <img src="https://pbs.twimg.com/profile_images/554631714970955776/uzPxPPtr.jpeg" alt="Avatar" /> 
    </button>
	
    <div class="profile__form">
      <div class="profile__fields">
	  <?php $attributes = array("class" => "form-signin",);
                echo form_open("Staff/staff_login_process", $attributes);?>
        <div class="field">
          <input type="text" name="username" id="fieldUser" placeholder="Username" class="input" required="required" />
		 <div style="color:red;";> <b><?php echo form_error('username'); ?></b></div><br>
       
        </div>
        <div class="field">
          <input type="password" name="password" id="fieldPassword" placeholder="Password" class="input" required="required" />
		  <div style="color:red;";> <b><?php echo form_error('password'); ?></b></div><br>
        
        </div>
        <div class="profile__footer">
         <input type="submit" name="login" class="btn" value="Login">
        </div>
		 <?php echo form_close(); ?>
      </div>
      <div class="profile__footer">
       <label class="danger" style="color:red;"><?php if(isset($error))  echo "$error"; else echo ""; ?></label>
       </div>
     </div>
  </div>
</div>
  
    <script src="<?php echo base_url();?>resource/login/index.js"></script>

</body>
</html>