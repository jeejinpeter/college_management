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
				<h1 class="page-header">Expense Details</h1>
				
			</div>
		</div><!--/.row-->	
				
		<?php $attributes = array("name" => "addattendance", "class" => "form-horizontal");
                echo form_open_multipart("Staff/get_month_expense", $attributes);?>
              <div class="box-body">
                  
				   <div class="form-group has-feedback col-md-8">
                  <label>Select a month</label>
        
					<select class="form-control"  name="month">
          <option value="">----Select Month------</option>
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
          </select>
		  <br>
		   <button type="submit" class="btn btn-success">Go!</button>
                  </div>
				  </div>
       
			 <br> <br> <br>
			  <?php echo form_close(); ?>
                </div>
				<?php if(isset($expenses)): ?>
		<div class="row col-md-12 col-md-offset-1">
		 
			<div class="col-lg-12 ">
				<div class="panel panel-primary">
					<div class="panel-heading col-md-10 col-md-offset-1" >
					 <center><h3 style="padding-left:2em;">Expense Details for the Month of <?php if($m==1){echo "January"; } elseif($m==2){echo "February"; }elseif($m==3){echo "March"; }elseif($m==4){echo "April"; }elseif($m==5){echo "May"; }elseif($m==6){echo "June"; }elseif($m==7){echo "July"; }elseif($m==8){echo "August"; }elseif($m==9){echo "September"; }elseif($m==10){echo "October"; }elseif($m==11){echo "November"; }elseif($m==12){echo "December"; }?>,  <?php echo $y;?></h3></center>
					</div>
					<div class="panel-body col-md-10 col-md-offset-1">
					<a class="btn btn-default" href="<?php echo base_url('Superadmin/generate_expenses_pdf/'.$m); ?>">Convert to PDF</a><br><br><br>
					
						<table class="table table-hover ">
                      <thead>
                        <tr>
						<th>#</th>             
                  <th>Department</th>
                  <th>Date Entered</th>
                  <th>Expense Amount</th>
                        </tr>
                      </thead>
<tbody>
<?php $i=0;
		    if(!empty($expenses)){
         foreach ($expenses as $row)  
         { 
			?>
               <tr>
               <td> <?php echo $i++;?></td>
                  <td><?php echo  $row['dept_name']; ?></td>
					        <td><?php echo  $row['exp_date']; ?></td>
                  <td><?php echo  $row['exp_amount']; ?></td>
				        </tr>
             
              <?php 
              } }
               ?>
				
				
      <!--price_wrap_start-->

	 
	</tbody>
						</table>
						<div class="col-lg-12">
					
						
						 
				</div>
				<?php endif; ?>
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