<style>
.green{color:#ff0c0c !important}
.red{color:#59d32c !important;}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	<div class="row">
			
		</div><!--/.row-->	
<!--/.row-->

<!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Student Attendance</h1>
				
			</div>
		</div><!--/.row-->	
				
		<?php $attributes = array("name" => "addattendance", "class" => "form-horizontal");
                echo form_open_multipart("Staff/list_std_attendance", $attributes);?>
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
			 <br> <br> <br>
			  <?php echo form_close(); ?>
                </div>
				<?php if($attenda) {?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<table id="example1"class="table table-hover">
                      <thead>
                        <tr>
						<th>Admission No</th>
        <th>Roll No</th>
        <th>Name</th>
        <th>Total Working day</th>
        <th>Total Present day</th>
        <th>Total Absent days</th>  
                        </tr>
                      </thead>
<tbody>

		
    <!--Pdt_box_start-->
    
    <!--Pdt_box_End-->
    <!--Pdt_box_start-->
   
    <!--Pdt_box_End-->
    <!--Pdt_box_start-->

				
				 <?php foreach($attenda as $row)
	 
     { ?>
           
              
                <tr>
				  <td><?php echo $row->stud_admno; ?> </td>
            <td><?php echo $row->stud_roll_no; ?> </td>
            <td><?php echo $row->stud_name; ?> </td>
            <td><?php echo $row->atten_day; ?> </td>
            <td><?php echo $row->std_prsnt_day; ?> </td>
            <td><?php echo $row->std_absnt_day; ?> </td>
              </tr>
	<?php }  
         ?> 	
      <!--price_wrap_start-->
	</tbody>
						</table>
						<a href="<?php echo base_url('Admin/excels/'.$myDate.'/'.$course.'/'.$year.'');?>" class="btn bg-olive btn-flat margin pull-left"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Download</a>
	
				</div><?php }else{
					echo"===========================================================================================================";
				} ?>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!--/.row-->	
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
.ui-datepicker
	{
	
		 display: none;
	}
    </style>