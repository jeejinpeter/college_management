<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Student Attendance</a></li>
      </ol>
    </section>
<h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
                  
     <div class="col-md-10 col-md-offset-1">
<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Student Attendance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addattendance", "class" => "form-horizontal");
                echo form_open_multipart("Admin/select_attendance", $attributes);?>
              <div class="box-body">
                  
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label" placeholder="">Course</label>
                  <div class="col-sm-6">
                    <select class="form-control" required name="course" id="course">
				  <option value="">--select--</option>
                     <?php 
					 
     foreach($list as $row)
	 
     { 
       echo '<option value="'.$row->course_id.'">'.$row->c_name.'</option>';
     }?>
	  
                  </select>
       <span class="text-danger"> <?php echo form_error('course'); ?></span> 
                  </div>
				  </div>
               <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label" placeholder="">Batch</label>
                  <div class="col-sm-6">
                    <select class="form-control"  name="year" id="year">
                    <option>...Choose year...</option>
                     <?php foreach($list_yr as $row)
   
     { 
       echo '<option value="'.$row->batch_id.'">'.$row->batch_year.'</option>';
     }?>
                    
                  </select>
                <span class="text-danger"><?php echo form_error('medium'); ?></span>
                  </div>
				  </div>
                   
             <button type="submit" class="btn btn-warning">ok</button>
			  <?php echo form_close(); ?>
                </div>
				<?php if($stud) {?>
             <div class="box-body"> 
			 <?php $attributes = array("name" => "addattendance", "class" => "form-horizontal");
                echo form_open_multipart("Admin/insert_attendance", $attributes);?>
			<div class="col-lg-12">
			<span class="col-md-3"><b>Total working days</b></span><input class="col-md-2" type="text" name="totday" style="margin-bottom:10px;" required><span class="col-md-2"><b>Select Month</b></span>
			<input  name="date" id="startDate" class="date-picker col-md-3" required />
</div>			
	
      <table width="80%" align="center" >
    <div id="head_nav">
	
    <tr>
        <th>Roll No</th>
        <th>Name</th>
        <th>Total Present day</th>
        <th>Total Absent days</th>
    </tr>
</div>  
		<?php foreach($stud as $row)
	 
     { ?>
	
    <tr>
	
            <td><input type="text" name ="rolno[]" value="<?php echo $row->stud_roll_no; ?>" style="border:none;" readonly> </td>
            <td><input type="text" name="name[]" value="<?php echo $row->stud_name; ?>" style="border:none;" readonly> </td>
            <td><input type="text" name="present_day[]" required> <input name="curs_id" type="hidden" value="<?php echo $row->course_id; ?>"><input name="stud_batch" type="hidden" value="<?php echo $row->stud_batch_id; ?>"></td>
            <td><input type="text" name="absent_day[]" required> <input name="adno[]" type="hidden" value="<?php echo $row->stud_admno; ?>"></td>
		
       
    </tr> <?php }?>
	  
</table>
     <div class="col-lg-12"> <div class="col-md-10"></div> <div class="col-md-2"><button type="submit" class="btn btn-warning">submit</button></div></div>
	   <?php echo form_close(); ?>
				</div><center><?php }else{
					echo"===========================================================================================================";
				} ?></center>
             
           
          </div>
          </div>
          </div>
	  

<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst) { 
            $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        }
    });
});
</script> 
<script type="text/javascript">

</script>
<style type="text/css">
    body
    {
        font-family: arial ;
    }

    th,td
    {
        margin: 0;
        text-align: center;
        border-collapse: collapse;
        outline: 1px solid #e3e3e3;
    }

    td
    {
        padding: 5px 10px;
		color: black;
    }

    th
    {
        background: #666;
        color: white;
        padding: 5px 10px;
    }

   .ui-datepicker-calendar {
    display: none;
    }
    </style>