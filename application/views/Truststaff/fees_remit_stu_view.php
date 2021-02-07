<style>
.panel-warning {
    border-color: #ffc107;
	border-width:3px;
}

</style>
<div class="content-wrapper">
    
      <section class="content">
      
       <div class="row">
	 <?php $attributes = array("name" => "add section");
        echo form_open("Truststaff/get_class_students", $attributes);?>
				   <input type="hidden" class="form-control"  name="course_id" value="<?php echo $course_id;?>" >
				    <input type="hidden" class="form-control"  name="sem_id" value="<?php echo $sem_id;?>" >
					<input type="hidden" class="form-control"  name="batch_id" value="<?php echo $batch_id;?>" >
	<button type="submit" class="btn btn-warning pull-right" style="margin-right:12em;">Previous Page</button>
 <?php  echo form_close(); ?> 

<?php if(isset($students)): ?>
<div class="col-md-12 col-md-offset-1">

        <div class="col-md-10 ">
		<br/><br/>
          <div class="panel panel-warning">
            <div class="box-header">
			 
           <center><h3>Fees Details</h3></center>
     
			  <div class="info-box-content col-md-12">
            <span class="info-box-text"><h3><?php echo $stud_name;?></h3><h4>Admission no:<?php echo $stud_addm;?><br/><?php echo $stud_course;?>&nbsp;&nbsp;<?php echo $stud_sem;?>&nbsp;&nbsp;<?php echo $stud_batch;?><h3 style="color:red;">Total Fees Amount:Rs.<?php echo $total_amount;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Due amount:Rs.<?php echo $balance;?></h3>
			</h4></span>
            </div>
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
              <table class ="table table-bordered table-hover st_list"  border="3">

                <thead>
                <tr>
                    <th>Serial no</th>               
                  <th>Date of Payment</th>
                  <th>Fees Amount Paid</th>
                  <th>Fine(If Any)</th>
                 
                </tr>
                </thead>
                <tbody>
                <?php
		
                $i=1;    
         foreach ($students as $row)  
         { 
			
				
          ?>
               <tr>
                
                 <td><?php echo $i++;?></td>
                  <td><?php echo $row['fee_pay_date']; ?></td>
					<td><?php echo  $row['fee_pay_amount'];?></td>
                  <td><?php echo  $row['fee_pay_fine'];?></td>
				
            
                </tr>
             
              <?php 
              }
              ?>  
            </tbody>
          </table>
          </div>
          </div>
          </div>
          </div>

<?php endif; ?>
	   </section>
	   </div>
 <script>
$(document).ready(function() {
my_table = $(".st_list").dataTable({
"fnRowCallback": function (nRow, aData, iDisplayIndex) {
$("td:first", nRow).html(iDisplayIndex + 1);
return nRow;
},
});
});
  </script>