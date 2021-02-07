<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Marks</a></li>
      </ol>
    </section>
<h4><?php echo $this->session->flashdata('msg');?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Marks Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			 <?php
				  foreach($stud_list as $row)
				  {
				  ?>
            <?php $attributes = array("name" => "addnotice", "class" => "form-horizontal");
                echo form_open_multipart("Admin/student_mark", $attributes);?>
			 <div class="box-body">
			
			  <div class="form-group has-feedback">
                  <label for="exam" class="col-sm-2 control-label" placeholder="">Exam</label>
                  <div class="col-sm-6">
				   
                    <select class="form-control" name="exam" required>
                    <option value="choose">Choose exam...</option>
                    <option value="First Internal">First Internal</option>
                    <option value="Second Internal">Second Internal</option>
                    <option value="Model exam">Model exam</option>
                   </select>
                <span class="text-danger"><?php echo form_error('exam'); ?></span>
                  </div>
				  </div>
				  <input type="hidden" name="sid" value="<?php echo $row->student_id;?>">
				  <input type="hidden" name="cid" value="<?php echo $row->course_id;?>">
				  <input type="hidden" name="sem" value="<?php echo $row->sem_id;?>">
				  <input type="hidden" name="bid" value="<?php echo $row->stud_batch_id;?>">
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Admn</label>
				   <div class="col-sm-6">
				  
                    <input type="text" name="adm" id="adm" class="form-control" placeholder="Admission number" readonly required value="<?php echo $row->stud_admno;?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('adm'); ?></span>
				  <?php
				  }
				  ?>
                  </div>
			    <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Subject1</label>
                  <div class="col-sm-6">
                    <input type="text" name="sub1" class="form-control" onchange="checkmk(this)" placeholder="Enter mark for subject1" required value="<?php echo set_value('sub1');?>">
                    </div>
                <span class="text-danger"><?php echo form_error('sub1'); ?></span>
                  </div>
				  <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Subject2</label>
                  <div class="col-sm-6">
                    <input type="text" name="sub2" class="form-control" onchange="checkmk(this)" placeholder="Enter mark for subject2" required value="<?php echo set_value('sub2');?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('sub2'); ?></span>
                  </div>
				  <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Subject3</label>
                  <div class="col-sm-6">
                    <input type="text" name="sub3" class="form-control" onchange="checkmk(this)" placeholder="Enter mark for subject3" required value="<?php echo set_value('sub3');?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('sub3'); ?></span>
                  </div>
				  <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Subject4</label>
                  <div class="col-sm-6">
                    <input type="text" name="sub4" class="form-control" onchange="checkmk(this)" placeholder="Enter mark for subject4" required value="<?php echo set_value('sub4');?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('sub4'); ?></span>
                  </div>
				  <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Subject5</label>
                  <div class="col-sm-6">
                    <input type="text" name="sub5" class="form-control" onchange="checkmk(this)" placeholder="Enter mark for subject5" required value="<?php echo set_value('sub5');?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('sub1'); ?></span>
                  </div>
				  <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Subject6</label>
                  <div class="col-sm-6">
                    <input type="text" name="sub6" class="form-control" onchange="checkmk(this)" placeholder="Enter mark for subject6" required value="<?php echo set_value('sub6');?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('sub6'); ?></span>
                  </div>
				 <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Total</label>
                  <div class="col-sm-6">
                    <input type="text" name="tot" class="form-control" onchange="checkmk(this)" placeholder="Enter total mark " required value="<?php echo set_value('tot');?>" >
                    </div>
                <span class="text-danger"><?php echo form_error('tot'); ?></span>
                  </div>      
                </div>
                   
              <!-- /.box-body -->
              <div class="box-footer col-md-offset-4">
              <button type="submit" class="btn btn-warning">Submit</button>
              </div>
			  
              <!-- /.box-footer -->
            <?php echo form_close(); ?>
          </div>
          </div>
          </div>
		  <script>
function checkchr(a)
{
	var x=a.value;
	var letters=/^[A-Za-z ]+$/;
	if(!x.match(letters))
	{
		alert("please input alphabets");
		a.value=" ";
		a.focus();
	}
	
}
function checknm(a)
{
	var x=a.value;
	if(isNaN(x))
	{
		
		a.value=" ";
		a.focus();
	}
}
function checkmkn(a)
{
	var x=a.value;
	if(isNaN(x))
	{
		a.value=" ";
		a.focus();
	}
	else if(x.length==3)
	{
	}	
	else
		alert("Enter 2 digits for marks");
		
		
}
function checkmk(a)
{
	var x=a.value;
	if(isNaN(x))
	{
		a.value=" ";
		a.focus();
	}
	else if(x.length>=0 && x.length<=3)
	{
	}
	else
		alert("enter 1 or 2 or 3 digits");
		
		
}
function checkemail(a)
{
	var mail=/^\w+([\.]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(a.value.match(mail))
	{
		
	}
	else
	{
		alert("enter valid email id");
		
		a.focus();
	}
}
function checkpwd()
{
	var a=document.getElementById("t8").value;
	var b=document.getElementById("t9").value;
	if(a!=b)
	{
		alert("password mismatch");
	}
}</script>

       