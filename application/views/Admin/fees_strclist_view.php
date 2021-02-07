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
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
    <a  href="<?php echo base_url('Admin/get_all_fees_view');?>" class="btn btn-warning pull-left" style="margin-left:1em;">Previous</a>  
       <div class="row">
	 
 <?php $attributes = array("name" => "add section");
        echo form_open("Admin/generate_all_fees_payment_pdf", $attributes);?>
				   <input type="hidden" class="form-control"  name="course_id" value="<?php echo $course_id;?>" >
				    <input type="hidden" class="form-control"  name="sem_id" value="<?php echo $sem_id;?>" >
					<input type="hidden" class="form-control"  name="batch_id" value="<?php echo $batch_id;?>" >
					 <input type="hidden" class="form-control"  name="s_name" value="<?php echo $s_name;?>" >
				    <input type="hidden" class="form-control"  name="b_name" value="<?php echo $b_name;?>" >
					<input type="hidden" class="form-control"  name="c_name" value="<?php echo $c_name;?>" >				
	<button type="submit" class="btn btn-success pull-right" style="margin-right:2em;">Export to Pdf</button>
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
              <table id="example1" class="table table-bordered table-hover">

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