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
        <li><a href="#">Gallerylist</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
          <h3 class="box-title"></h3>

         <h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
        
        <div class="box-body">
		
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Gallery List</h3>
			    <a  href="<?php echo base_url('Admin/admin_home_page');?>" class="btn bg-olive btn-flat margin pull-right">back to home</a>
            </div>
			  
            <!-- /.box-header -->
            <div class="box-body">
         
		
		  <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>Serial no</th>
				  <th>Title</th>
                  <th>Image</th>
				  <th>Actions</th>
                </tr>
                </thead>
				  <tbody>
                  <?php 
          $i=1;		 
         foreach ($gallery as $row)  
         {   
            ?>
                <tr>
				  <td><?php echo $i++;?></td>
					<td><?php echo $row->title;?></td>	
					
                   <td><img src="<?php echo base_url('resource/images/'.$row->image);?>" width="50px" height="50px" class="img-responsive" 
				   alt=""/></td>                  
<td>
  <div class="btn-group">
  <button type="button" class="btn btn-warning btn-flat">Actions</button>
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('Admin/deletegallery/'.$row->gallery_id); ?>">Delete</a></li>
					</ul>
                </div>


</td>
              </tr>
			   </tbody>
			   
	
		   
	<?php }  
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
