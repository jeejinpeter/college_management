<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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

         <h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
          <h3 class="box-title"></h3>

        
        <div class="box-body">
		
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Mark Lists Details</h3>
			    <a  href="<?php echo base_url('Admin/admin_home_page');?>" class="btn bg-olive btn-flat margin pull-right">back to home</a>
				
				<h5>Course:<?php foreach($course as $row)
				{?>
					<?php echo $row->c_name;?>
				<?php }?>				</h5>
				<h5>Semester:<?php foreach($sem as $row)
				{?>
					<?php echo $row->sem_code;?>
				<?php }?>	</h5>
				<h5>Year:<?php foreach($batch as $row)
				{?>
					<?php echo $row->batch_year;?>
				<?php }?></h5>
			</div>
			  
            <!-- /.box-header -->
            <div class="box-body">
         
		
		  <table id="example1" class="table table-bordered table-striped">

                <thead>
			     <tr>
                  <th>Serial no</th>
				  <th>Admission No</th>
				  <th>Name</th>
				  <th>Subject1</th>
				  <th>Subject2</th>
				  <th>Subject3</th>
				  <th>Subject4</th>
				  <th>Subject5</th>
				  <th>Subject6</th>	
				  <th>Total</th>
			       </tr>
                </thead>
				  <tbody>
                  <?php 
          $i=1;		 
         foreach ($mark as $row)  
         {   
            ?>
                <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->admno;?></td>				  
                  <td><?php echo $row->stud_name;?></td>
				  <td><?php echo $row->subject1;?></td> 
                  <td><?php echo $row->subject2;?></td>
				  <td><?php echo $row->subject3;?></td>
				  <td><?php echo $row->subject4;?></td>
				  <td><?php echo $row->subject5;?></td>				  
				  <td><?php echo $row->subject6;?></td>
				  <td><?php echo $row->total;?></td>
              </tr>
			   </tbody>
			    
	<?php
	}  
      ?>  
           
            </table>
		 
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /.content-ends -->
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
