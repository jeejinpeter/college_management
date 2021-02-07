<style>
.panel-warning {
    border-color: #ffc107;
	border-width:3px;
}

</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Fees</a></li>
      </ol>
    </section>
      <section class="content">
      <?php $attributes = array("name" => "add section");
        echo form_open("Admin/generate_fees_payment_pdf", $attributes);?>
				   <input type="hidden" class="form-control"  name="course_id" value="<?php echo $course_id;?>" >
				    <input type="hidden" class="form-control"  name="sem_id" value="<?php echo $sem_id;?>" >
					<input type="hidden" class="form-control"  name="batch_id" value="<?php echo $batch_id;?>" >
					 <input type="hidden" class="form-control"  name="s_name" value="<?php echo $stud_name;?>" >
				    <input type="hidden" class="form-control"  name="s_admno" value="<?php echo $stud_addm;?>" >
					<input type="hidden" class="form-control"  name="s_sem" value="<?php echo $stud_sem;?>" >
					<input type="hidden" class="form-control"  name="s_cou" value="<?php echo $stud_course;?>" >
					<input type="hidden" class="form-control"  name="s_batch" value="<?php echo $stud_batch;?>" >
				    <input type="hidden" class="form-control"  name="s_bal" value="<?php echo $balance;?>" >
					<input type="hidden" class="form-control"  name="s_amt" value="<?php echo $amt;?>" >
	<button type="submit" class="btn btn-success pull-left" style="margin-right:10em;">Export to Pdf</button>
 <?php  echo form_close(); ?> 
       <div class="row">
	 <?php $attributes = array("name" => "add section");
        echo form_open("Admin/get_all_students", $attributes);?>
				   <input type="hidden" class="form-control"  name="course_id" value="<?php echo $course_id;?>" >
				    <input type="hidden" class="form-control"  name="sem_id" value="<?php echo $sem_id;?>" >
					<input type="hidden" class="form-control"  name="batch_id" value="<?php echo $batch_id;?>" >
	<button type="submit" class="btn btn-warning pull-right" style="margin-right:10em;">Previous</button>
 <?php  echo form_close(); ?> 
<br/><br/>
<?php if(isset($students)): ?>
        <div class="col-md-12 ">
          <div class="box box-warning">
            <div class="box-header">
              <center><h3>Fees Details</h3></center>
			   
          <h3><?php echo $stud_name;?></h3><h4>Admission no:<?php echo $stud_addm;?><br/><?php echo $stud_course;?>&nbsp;&nbsp;<?php echo $stud_sem;?>&nbsp;&nbsp;<?php echo $stud_batch;?><br/><h3 style="color:red;">Total Fees amount:Rs.<?php echo $amt;?>&nbsp;&nbsp;Due amount:Rs.<?php echo $balance;?></h3>
			</h4>
            </div>
            <!-- /.box-header -->
            <div class="panel-body">
              <table  id="example1" class="table table-bordered table-hover"  border="3">

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
     <!----fee remittance-------->
  <!--script>
$('.section_id').click(function()
    {
        var Id = $(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"section_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script-->