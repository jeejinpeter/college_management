<style>
.green{color:#ff0c0c !important}
.red{color:#59d32c !important;}
</style>	
<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List of Students</h1>
				
			</div>
		</div><!--/.row-->	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">List of Students</div>
					<div class="panel-body">
						<table id="example1" class="table table-hover">
                      <thead>
                        <tr>
						
                         
                        <th>Serial no</th>
				          <th>Admission Number</th>
				          <th>Student Name</th>
                  <th>Course</th>				 
                  <th>Batch</th>				 
				          <th>Gender</th>
                        
					</tr>
                      </thead>
<tbody>
 <?php 
          $i=1;		 
         foreach ($admission_list as $row)  
         {   
           
              $g=$row->gender;		 
			  ?>
                <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->stud_admno;?></td>
				  <td><?php echo $row->stud_name;?></td>
				  <td><?php echo $row->c_name;?></td>			  
				  <td><?php echo $row->batch_year;?></td>			  
				  <td><?php if($g==0) {echo "Male";}
				  else {echo "Female";}?></td>				  
                </tr>
		  
	<?php }  
         ?>  
				
	</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->	