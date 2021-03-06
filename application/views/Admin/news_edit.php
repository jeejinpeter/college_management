
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
        <li><a href="#">News</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="col-md-10 col-md-offset-1">
        
        <div class="box-body">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
            
	<h3 class="box-title">Edit News</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php $attributes = array("name" => "news");
                echo form_open_multipart("Admin/update_news", $attributes);?>
            
              <h4><?php echo $this->session->flashdata('msg'); ?></h4><br>
                <!-- text input -->
		        <?php
                
                 foreach ($get_by_id->result() as $row) 
                 { ?>
				  
           <input type="hidden" name="id" value="<?php echo $row->news_id;?>" readonly/>
				          
				 <div class="form-group">
                  <label>News Title</label>
               <input type="text" class="form-control" placeholder="News Title" name="news_title" value="<?php echo $row->news_title; ?>">
				
                </div>
            
					<div class="form-group">
			<label for="exampleInputFile">News Image</label>
			<br/>
			<img src="<?php echo base_url("resource/images/"); 
             if($row->news_image) echo $row->news_image; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/>
                    <br/><br/>						
			<input type="file"  name="news_image" value="<?php echo set_value('news_image'); ?>" class="imageupload" id="exampleInputFile">
			<div id="preview-image"></div><br/><br/><br/><br/>
			</div>
			<input type="hidden" name="news_image" value="<?php  echo $row->news_image; ?>"/>
	
			<div class="form-group">
              <label>Description</label>
			  <?php echo form_textarea(array('name' =>'desc','id'=>'desc','class'=>"form-control ckeditor",'value'=>"$row->news_description",'rows' =>'3')); ?>
     
                 </div>
				<div class="box-footer">
                <button type="submit" class="col-xs-1 btn btn-warning">Submit</button>
              </div>
				<?php } ?>

                <?php echo form_close(); ?>				 
 
            </div>
            <!-- /.box-body -->
          </div>
		
        </div>
        <!-- /.box-body -->
      
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- /.content-ends -->
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
