
 	<div class="row">
                    <div class="col-md-12">
                       <div class="col-md-10 col-md-offset-1"><div class="panel panel-warning">
        <div class="panel-heading">
            <h4>Fund Transfer Details</h4>
            </div>
						</div>
                       
                    </div>
                </div>
            </div>
<div class="container">

		 <div class="box-body">
         <table class="table table-bordered table-striped fund_list">

                <thead>
                <tr>
                  <th>Serial no</th>
				  <th>Academic Year</th>
				  <th>Date</th>
                  <th>Amount</th>					 
				  <th>Action</th>   
				  
                </tr>
                </thead>
				  <tbody>
                  <?php 
          $i=1;		 
         foreach ($fund as $row)  
         {   
           
              		 
			  ?>
                <tr>
				  <td><?php echo $i++;?></td>
				  <td><?php echo $row->ac_year;?></td>
				  <td><?php echo $row->date_tr;?></td>
				  <td><?php echo $row->amount;?></td>			  
				<td><a href="<?php echo site_url('Truststaff/edit_funds/'.$row->f_id); ?>" class="glyphicon glyphicon-pencil red "></a>&nbsp; &nbsp;
	<a class="glyphicon glyphicon-trash green"  data-toggle="modal" data-target="#delete-<?=$row->f_id?>" href="#"></a></td>
              </tr>
			  </tbody>
		   
	 <div class="modal fade" id="delete-<?=$row->f_id;?>" role="dialog" >
      <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Truststaff/Delete_fund' ?>" >
    <input type="hidden" id="student_id"  name= "id"  value="<?php echo $row->f_id;?>">
	
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>   
      </div>
        <div class="modal-footer ">
         <button name="save" type="submit" class="btn btn-success" ><span class="glyphicon 
		glyphicon-ok-sign"></span>Yes</button>
	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
      </div> 
	  </form>
        </div>
    <!-- /.modal-content --> 
  </div>
  
      <!-- /.modal-dialog --> 
	  
    </div>
		   
	<?php }  
         ?>  
           
            </table>
		 
        </div>
        <!-- /.box-body -->

</div>
<script>
$(document).ready(function() {
my_table = $(".fund_list").dataTable({
"fnRowCallback": function (nRow, aData, iDisplayIndex) {
$("td:first", nRow).html(iDisplayIndex + 1);
return nRow;
},
});
});
  </script>