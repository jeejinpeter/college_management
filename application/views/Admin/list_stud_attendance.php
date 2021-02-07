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
              <h3 class="box-title">View Student Attendance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $attributes = array("name" => "addattendance", "class" => "form-horizontal");
                echo form_open_multipart("Admin/list_std_attendance", $attributes);?>
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
				  <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label" placeholder="">Select Month</label>
                  <div class="col-sm-6">
                   <input name="myDate" class="form-control monthPicker" required>
                <span class="text-danger"><?php echo form_error('medium'); ?></span>
                  </div>
				  </div>
                   
             <button type="submit" class="btn btn-warning">ok</button>
			  <?php echo form_close(); ?>
                </div>
				<?php if($attenda) {?>
             <div class="box-body"> 
			
			
	
      <table width="80%" align="center" >
    <div id="head_nav">
	
    <tr>
        <th>Admission No</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>Total Working day</th>
        <th>Total Present day</th>
        <th>Total Absent days</th>
    </tr>
</div>  
		<?php foreach($attenda as $row)
	 
     { ?>
	
    <tr>
			
            <td><?php echo $row->stud_admno; ?> </td>
            <td><?php echo $row->stud_roll_no; ?> </td>
            <td><?php echo $row->stud_name; ?> </td>
            <td><?php echo $row->atten_day; ?> </td>
            <td><?php echo $row->std_prsnt_day; ?> </td>
            <td><?php echo $row->std_absnt_day; ?> </td>
            
            
		
       
    </tr> <?php } ?>
	  
</table>
    
	 <a class="btn bg-olive btn-flat margin pull-left" href="<?php echo base_url('Admin/excels/'.$myDate.'/'.$course.'/'.$year.'');?>" ><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Download as Excel Sheet</a>
				</div>

        <?php }else{
					echo"===========================================================================================================";
				} ?>
             
           
          </div>
          </div>
          </div>

	  
	<script type="text/javascript">
$(document).ready(function(){
    $('#course').on('change',function(){
        var deptID = $(this).val(); console.log(deptID);
        if(deptID){
            $.ajax({
                type:'POST',
                url:'listyear',
                data:'id='+deptID,
                success:function(html){
                    $('#year').html(html);
                }
            }); 
        }
    });
    
});
</script>	
<script type="text/javascript">
$(function() {
 $('.monthPicker').datepicker({
  changeMonth: true,
  changeYear: true,
  showButtonPanel: true,
  dateFormat: 'MM yy'
 }).focus(function() {
  var thisCalendar = $(this);
  $('.ui-datepicker-calendar').detach();
  $('.ui-datepicker-close').click(function() {
   var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
   var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
   thisCalendar.datepicker('setDate', new Date(year, month, 1));
  });
 });
});
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