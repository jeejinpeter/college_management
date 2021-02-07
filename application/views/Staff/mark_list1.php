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
				<h1 class="page-header">Mark Lists Details</h1>
				
			</div>
		</div><!--/.row-->	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<h5>Course:<?php foreach($course as $row)
				{?>
					<?php echo $row->c_name;?>
				<?php }?>	<br>			
				Semester:<?php foreach($sem as $row)
				{?>
					<?php echo $row->sem_code;?>
				<?php }?><br>
				Year:<?php foreach($batch as $row)
				{?>
					<?php echo $row->batch_year;?>
				<?php }?>
					</div>
					<div class="panel-body">
						<table id="example1"class="table table-hover">
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

		
    <!--Pdt_box_start-->
    
    <!--Pdt_box_End-->
    <!--Pdt_box_start-->
   
    <!--Pdt_box_End-->
    <!--Pdt_box_start-->

				
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