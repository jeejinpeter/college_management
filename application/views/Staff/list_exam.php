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
				<h1 class="page-header">Exam List</h1>
				
			</div>
		</div><!--/.row-->	
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Exam List</div>
					<div class="panel-body">
						<table id="example1" class=" table table-hover">
                      <thead>
                        <tr>
						<th>Sl. No:</th>
                  <th>Exam Date</th>
                  <th>Course</th>
                  <th>Type Of Exam</th>                  
                  <th>Semester</th>
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
         foreach ($exam as $row)  
         { 
          ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td> <?php echo $row->e_date;?></td>
                  <td><?php echo $row->c_name;?></td>
                  <td><?php echo $row->typ_exam;?></td>
				  <td><?php echo $row->e_sem;?></td>
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