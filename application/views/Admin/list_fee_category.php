<div class="content-wrapper">
<section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Fee Category</a></li>
      </ol>
    </section>
<h4><?php  echo $this->session->flashdata('msg'); ?></h4>
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">List Fee Category</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
			  <thead>
                <tr>
                  <th>Sl. No:</th>
                  <th>Fee Category</th>
                  <th>Fee</th>
                   <th>Action</th>                   
                </tr>
                </thead>
                <tbody>
                <?php
                $i=1;    
         foreach($fee as $row)  
         { 
          ?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td> <?php echo $row->fc_category;?></td>
                  <td><?php echo $row->fc_fee;?></td>
               <td> 
				 <div class="btn-group">
                  <button type="button" class="btn btn-warning">Actions</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('Admin/edit_fee_category/'.$row->fc_id); ?>">Update</a></li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/delete_fee_category/'.$row->fc_id); ?>">Delete</a></li>
                </ul>
                </div>  
				</td>
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
          </section>
          </div>
   