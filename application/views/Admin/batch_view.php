<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Batch</a></li>
      </ol>
    </section>
    <?php echo $this->session->flashdata('msg');?>
      <section class="content">
       <h3 class="box-title">Batches</h3>
       <div class="row">
        <div class="col-xs-12">
           <div class="box-body">
      <ul class="nav nav-tabs bordered">
      <li class="active">
              <a href="#list" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;list</i> 
        </a></li>
      <li><a href="#add" data-toggle="tab"><i class="fa fa-plus">&nbsp;&nbsp;Add</i>
        </a></li>
        </ul>
      </br>
       <div class="tab-content">
   <!----Listing class-->
            <div class="tab-pane box active" id="list">
         <table id="example1" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th><div>Sl. No</div></th>
                        <th><div>Batch (Year)</div></th>
                        <th><div>Action</div></th>
                      </tr>
          </thead>
                    <tbody>
                    
          <?php $i=1;
          foreach($batch_list as $row):?>
                       <tr>
                            <td><?php echo $i++;?></td>
              <td><?php echo $row->batch_year;?></td>
              <td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
           <li>
            <a href=""  class="batch_id" data-toggle="modal" data-id="<?php echo $row->batch_year;?>"data-target="#myModal-<?=$row->batch_year?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
          </li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_batch/'.$row->batch_year);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                          </tr>
<!-- Modal edit class-->
  <div id="myModal-<?=$row->batch_year?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Details</h4>
        </div>
         
        <div class="modal-body">
        <?php $attributes = array("name" => "updatebatch");
                echo form_open("Admin/update_batchdetails", $attributes);?>
        <span class='ShowData'>
       <input type="hidden" name="id" value="<?php echo $row->batch_year;?>"/>
          <div class="form-group">
                   <div class="col-md-7">
                    <label>Batch Year</label>
                   
                    <input type="text" class="form-control" name="batch" value="<?php echo $row->batch_year;?>" required="required">
                    </div>
                  </div>
                   
        </span>
        <div class="modal-footer">
<button type="submit" class="btn btn-success">Update</button>
        </div>
         <?php echo form_close(); ?>
        </div>
       
        </div>
    </div>
  </div> 
  <!--------end modal-------------->
<?php endforeach;?>
                    </tbody>
                 </table>
      </div>
<!----list End--->
 <!----Add Class---->
      <div class="tab-pane box col-md-12" id="add">
                <div class="box-content">
        </br>
         <div class="info-box">
             
            <h3 class="box-title">Add New Batch (Year)</h3>
            </div>
      </br>
       <?php $attributes = array("name" => "addbatch");
                echo form_open("Admin/add_batch", $attributes);?>
                
                <div class="box-body">
                  <div class="form-group">
                   <div class="col-md-7">
                    <label>Batch Year</label>
                   
                    <input type="text" class="form-control" placeholder="Enter Batch" name="batch" required="required">
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" onclick="cancelFunction()" class="btn btn-danger">Cancel</button>
                </div>
               <?php echo form_close(); ?>          
      </div>
      <!----CREATION FORM ENDS-->
    </div>
      </div>
       </div> 
         </div>        
           
 </section>    
</div>
  <script>
$('.batch_id').click(function()
    {
        var Id = $(this).attr('data-id'); console.log(Id);
        
        $.ajax({
            url:"batch_details/"+Id, 
            cache:false,
            success:function(result)
            {
                $(".ShowData").html(result);
                $('table').addClass('table table-striped table-bordered');
            }
        });
    });
</script>