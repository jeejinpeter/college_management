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
				<h1 class="page-header">Students List</h1>
				
			</div>
		</div><!--/.row-->	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Students List</div>
					<div class="panel-body">
						<table id="example1"class="table table-hover">
                      <thead>
                        <tr>
						<th>Serial no</th>
				  <th>Admission Number</th>
				  <th>Student Name</th>
                  <th>Course</th>				 
                  <th>Batch</th>				 
                  <th>Reason</th>				 
				  <th>Gender</th>   
                        </tr>
                      </thead>
<tbody>

		
    <!--Pdt_box_start-->
    
    <!--Pdt_box_End-->
    <!--Pdt_box_start-->
   
    <!--Pdt_box_End-->
    <!--Pdt_box_start-->

				
				 <?php 
          $i=1;		 
         foreach ($admission_list as $row)  
         {   
           
              $g=$row->gender;		 
              $d=$row->reason;		 
			  ?>
                <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->stud_admno;?></td>
				  <td><?php echo $row->stud_name;?></td>
				  <td><?php echo $row->c_name;?></td>			  
				  <td><?php echo $row->batch_year;?></td>			  
				  <?php  if($d==NULL){echo "<td> Admitted </td>";} else{echo "<td style='background:red;color:#fff;'> $d</td>"; }?>			  
				  <td><?php if($g==0) {echo "Male";}
				  else {echo "Female";}?></td>
              </tr>
	<?php }  
         ?>  
      <!--price_wrap_start-->
	</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!--/.row-->	