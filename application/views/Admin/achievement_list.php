<style type="text/css">
.thumbimage {
    float:left;
    width:100px;
    position:relative;
    padding:5px;
}
</style>
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
        <li><a href="#">Achievements</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Achievement Lists</h3>

         <h4>  <?php echo $this->session->flashdata('msg'); ?></h4><br>
        </div>
        <div class="box-body">		
          <!-- general form elements disabled -->      
		
		  <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                  <th>Serial no</th>
				   <th>Category</th>
				   <th>Title</th>
                  <th>Image</th>
				   <th>Description</th>
      				<th>Actions</th>
                </tr>
                </thead>
				  <tbody>
                 <?php 
          $i=1;    
         foreach ($achi as $row) 
  { ?>
  <tr>
        <td><?php echo $i++;?></td>
 <td><?php if($row->cat_id==1){echo "Student";} elseif($row->cat_id==2){echo "College";}else{echo "Staff";}?></td>		
        <td><?php echo $row->title;?></td>
		
        <td><img src="<?php echo base_url("resource/images/"); 
             if($row->ach_image) echo $row->ach_image; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/></td>
        <td><?php echo substr($row->description,0,140);?></td>
                   
<td>
  <div class="btn-group">
  <button type="button" class="btn btn-warning btn-flat">Actions</button>
                  <button type="button" class="btn btn-warning btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                   
				
					 <li><a data-toggle="modal" data-target="#edit-<?=$row->ach_id?>" href="#">Edit</a></li> 
                 <li><a data-toggle="modal" data-target="#delete-<?=$row->ach_id?>" href="#">Delete</a></li>
                   
                  </ul>
                </div>


</td>
              </tr>
			  
	<div class="modal fade" id="edit-<?=$row->ach_id?>" role="dialog" >
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Update this entry</h4>
      </div>
          <div class="modal-body">
       <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Admin/update_achievement' ?>" >
  <input type="hidden" id="ach_id"  name= "ach_id"  value="<?php echo $row->ach_id?>">
      <div class="form-group ">
						<label>Category</label>
					
						<select name="a_cate" class="form-control" placeholder="Select Achievement Category" value="<?php echo set_value('a_cate');?>" required >
						<option value="<?php echo $row->cat_id?>"><?php if($row->cat_id==1){echo "Student";} elseif($row->cat_id==2){echo "College";}else{echo "Staff";}?></option>
						<option value="1">Student</option>
						<option value="2">College</option>
						<option value="3">Staff</option>
						</select>
				
						
                  </div> 
		  
				 <div class="form-group">
                  <label>Title</label>
               <input type="text" class="form-control" placeholder="Achievement Title" name="achi_title"  value="<?php echo $row->title; ?>">
				
                </div>
             
					<div class="form-group">
			<label for="exampleInputFile">Image</label>
	<img src="<?php echo base_url("resource/images/"); 
             if($row->ach_image) echo $row->ach_image; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/>
<br/><br/>			 
	<input type="file"  name="achi_image" value="<?php echo set_value('achi_image'); ?>" class="imageupload" id="exampleInputFile">
		
	<div id="preview-image"></div><br/><br/><br/><br/>
 							
			</div>
	<input type="hidden" name="achi_image" value="<?php  echo $row->ach_image; ?>"/>		
			<div class="form-group">
              <label>Description</label>
       <?php echo form_textarea(array('name' =>'desc','id'=>'desc','class'=>"form-control ckeditor",'value'=>"$row->description",'rows' =>'3')); ?>
                 </div>
			 


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
	 <div class="modal fade" id="delete-<?=$row->ach_id?>" role="dialog" >
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       <form name="billing" method="post"  enctype="multipart/form-data" action="<?php echo base_url().'Admin/remove_achievement' ?>" >
  <input type="hidden" id="news_id"  name= "ach_id"  value="<?php echo $row->ach_id?>">
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
            </tbody>
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
<script type="text/javascript">
 $(".imageupload").on('change', function () {
 
     var countFiles = $(this)[0].files.length;
 
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image");
     image_holder.empty();
 
     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {
 
             for (var i = 0; i < countFiles; i++) {
 
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumbimage"
                     }).appendTo(image_holder);
                 }
 
                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }
 
         } else {
             alert("It doesn't supports");
         }
     } else {
         alert("Select Only images");
     }
 });
 </script>
