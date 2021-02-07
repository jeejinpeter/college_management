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
				<h1 class="page-header"> Add Expense</h1>
				<h4>  <?php echo $this->session->flashdata('msg'); ?></h4>
			</div>
		</div><!--/.row-->	
				
		<?php $attributes = array("name" => "addattendance", "class" => "form-horizontal");
                echo form_open_multipart("Staff/expense_add", $attributes);?>
              <div class="box-body">
                  
				   <div class="form-group has-feedback">
                  <label for="title" class="col-sm-2 control-label">Department</label>
                  <div class="col-sm-6">
				  <select class="form-control" name="dept" required>
				  <option>--Choose a Department--</option>
                  <?php 
     foreach($dept as $row)
     { 
       echo '<option value="'.$row['dept_id'].'">'.$row['dept_name'].'</option>';
     }?>
				  </select>
                <span class="text-danger"><?php echo form_error('dept'); ?></span>
                  </div>
				    </div>
               <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Expense Date</label>
                  <div class="col-sm-6">
                    <input type="date" name="edate" class="form-control" placeholder="Expense Date" value=""required ="required" >
					 <span class="text-danger"><?php echo form_error('edate'); ?></span>
                    </div>
                  </div>
				  <div class="form-group has-feedback">
                  <label for="name" class="col-sm-2 control-label">Amount</label>
                  <div class="col-sm-6">
                    <input type="text" name="amount" class="form-control" placeholder="Expense Amount" value=""required ="required" >
					 <span class="text-danger"><?php echo form_error('amount'); ?></span>
                    </div>
                  </div>
                   
             <center><button type="submit" class="btn btn-warning">Submit</button></center>
			 <br> <br> <br>
			  <?php echo form_close(); ?>
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