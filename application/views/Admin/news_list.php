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
        <li><a href="#">News</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">News Lists</h3>

         <h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
        </div>
        <div class="box-body">		
          <!-- general form elements disabled -->      
		
		  <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>Serial no</th>
				          <th>Title</th>
                  <th>Image</th>
				          <th>Description</th>
      				    <th>Actions</th>
                </tr>
                </thead>
				  <tbody>
                 <?php 
          $i=1;    
         foreach ($news->result() as $row) 
  { ?>
  <tr>
        <td><?php echo $i++;?></td>  
        <td><?php echo $row->news_title;?></td>
        <td><img src="<?php echo base_url("resource/images/"); 
             if($row->news_image) echo $row->news_image; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/></td>
        <td><?php echo substr($row->news_description,0,140);?></td>
                   
<td>
  <div class="btn-group">
  <button type="button" class="btn btn-warning btn-flat">Actions</button>
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('Admin/edit_news/'.$row->news_id); ?>">Edit</a></li>
				
					 
                 <li><a data-toggle="modal" data-target="#delete-<?=$row->news_id?>" href="#">Delete</a></li>
                   
                  </ul>
                </div>


</td>
              </tr>
			   </tbody>
			   
	 <div class="modal fade" id="delete-<?=$row->news_id?>" role="dialog" >
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Admin/remove_news' ?>" >
  <input type="hidden" id="news_id"  name= "news_id"  value="<?php echo $row->news_id?>">
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
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /.content-ends -->
<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
