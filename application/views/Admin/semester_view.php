 <div class="content-wrapper">
   <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Semester</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
      <div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Add Semester</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
       <div class="row">
	   <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-danger">
		 <?php $attributes = array("name" =>"semester_add");
           echo form_open("Admin/semester_add", $attributes);?>
           <div class="panel-body">
			<div class="form-group">
                <label>Semester Name</label>
                  <input type="text" class="form-control" placeholder="Semester Name" name="sem_name" required  value="<?php echo set_value('sem_name'); ?>">
				 <span class="text-danger"><?php echo form_error('sem_name'); ?></span>
              </div>
			  	<div class="form-group">
                <label>Semester Code</label>
                  <input type="text" class="form-control" placeholder="Semester Code" name="sem_code" required  value="<?php echo set_value('sem_code'); ?>">
				 <span class="text-danger"><?php echo form_error('sem_code'); ?></span>
              </div>
             <div>
				 <button type="submit" class="btn btn-info">save</button>
				  <button type="submit"  onclick="cancelFunction()"  class="btn btn-warning">close</button>
			</div>  
			</div>
	  <?php  echo form_close(); ?>    
	   </div>
	   </div>
</div>
</section>
<section class="content">

    <?php  if(isset($list)){ 

?>
<div class="info-box">
             <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Semester List</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
<div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Semester List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">

                <thead>
                <tr>
                  <th>Sl. No:</th>
                  <th>Semester Name</th>
                  <th>Semester Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;    
         foreach ($list as $row)  
         { 
          ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td> <?php echo $row['sem_name'];?></td>
                  <td><?php echo $row['sem_code'];?></td>
                 
                   <td> <div class="btn-group">
                  <button type="button" class="btn btn-warning">Actions</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/delete_semester/'.$row['sem_id']); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                    
                  </ul>
                </div>  </td>
                
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
          <?php } ?>
	   </section>
	   </div>