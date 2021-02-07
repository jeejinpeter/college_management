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
				<h1 class="page-header">Notice List</h1>
				
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<table id="example1" class="table table-hover">
                      <thead>
                        <tr>
						<th>Sl. No:</th>
                  <th>Title</th>
                  <th>Notice</th>
                  <th>Date</th>   
                        </tr>
                      </thead>
<tbody>
				 <?php
                $i=1;    
         foreach ($notice->result() as $row)  
         { 
          ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td> <?php echo $row->title;?></td>
                  <td><?php echo $row->notice;?></td>
                  <td><?php echo $row->date;?></td>	
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