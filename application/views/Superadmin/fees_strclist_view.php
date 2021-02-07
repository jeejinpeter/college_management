 <div class="content-wrapper">
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
    <a  href="<?php echo base_url('Superadmin/get_all_fees_view');?>" class="btn btn-warning pull-left" style="margin-left:1em;">Previous</a>  
       <div class="row">
	 
 <?php $attributes = array("name" => "add section");
        echo form_open("Superadmin/generate_all_fees_payment_pdf", $attributes);?>
				   <input type="hidden" class="form-control"  name="course_id" value="<?php echo $course_id;?>" >
				    <input type="hidden" class="form-control"  name="sem_id" value="<?php echo $sem_id;?>" >
					<input type="hidden" class="form-control"  name="batch_id" value="<?php echo $batch_id;?>" >
					 <input type="hidden" class="form-control"  name="s_name" value="<?php echo $s_name;?>" >
				    <input type="hidden" class="form-control"  name="b_name" value="<?php echo $b_name;?>" >
					<input type="hidden" class="form-control"  name="c_name" value="<?php echo $c_name;?>" >				
	<button type="submit" class="btn btn-warning pull-right" style="margin-right:2em;">Pdf</button>
 <?php  echo form_close(); ?> <br/><br/>
<?php if(isset($students)): ?>
<div class="col-md-12">
        <div class="col-md-12 ">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Student's List- Pending Fees</h3>
			   <h4><?php echo $c_name;?>&nbsp;&nbsp;<?php echo $s_name;?><br/><?php echo $b_name;?></h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover st_list">

                <thead>
                <tr>
                  <th>Admission No:</th>
                  <th>Student's Name</th>                  
                  <th>Fees Amount</th>
                  <th>Fees pending</th>
                
                </tr>
                </thead>
                <tbody>
                <?php
		
               
         foreach ($students as $row)  
         { 
			
          ?>
                <tr>
               
                  <td> <?php echo $row['stud_admno'];?></td>
                  <td><?php echo $row['stud_name'];?></td>
                  <td><?php echo $row['cfees_amount'];?></td>
                  <td><?php echo $row['cfees_dues'];?></td>
                  
             
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