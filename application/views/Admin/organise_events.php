<style type="text/css">
.thumbimage {
    float:left;
    width:100px;
    position:relative;
    padding:5px;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
      <h1 class="text-center">
        S N G College of Advanced Studies 
       <br> <small>Chelannur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Events</a></li>
      </ol>
    </section>
     <h4><?php  echo $this->session->flashdata('msg'); ?></h4>
      <section class="content">
       <h3 class="box-title">Events</h3>
       <div class="row">
        <div class="col-xs-12">
           <div class="box-body box box-warning">
			<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="fa fa-list">&nbsp;&nbsp;Event List</i> 
				</a></li>
			<li><a href="#add" data-toggle="tab"><i class="fa fa-plus">&nbsp;&nbsp;Add New Event</i>
				</a></li>
		    </ul>
			</br>
			 <div class="tab-content">
   <!----Listing class-->
            <div class="tab-pane box active" id="list">
				 <table id="example1" class="table table-bordered table-hover">
                	<thead>
                		<tr>
						 <th><div>Sl. No:</div></th>
                    	<th><div>About</div></th>
                    		<th><div>Event</div></th>
                        <th><div>Venue & Time</div></th>
                        <th><div>Photo</div></th>
                    		<th><div>Actions</div></th>
                    	</tr>
					</thead>
                    <tbody>
					
					<?php 
					 $i=1;    
					foreach($event as $val):?>
                    	 <tr>
							<td><?php echo $i++;?></td>
                            <td><?php echo $val['event_name'];?></td>
							<td><?php echo substr($val['event_description'],0,80);?></td>
              <td><?php echo $val['event_place'];?>, on <?php echo $val['event_date'];?></td>
              <td><img src="<?php echo base_url("resource/images/"); 
             if($val['event_img']) echo $val['event_img']; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/></td>
							<td> <div class="btn-group">
                  <button type="button" class="btn bg-orange color-palette">Actions</button>
                  <button type="button" class="btn bg-orange color-palette dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                   <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				   <li>
				    <a href=""  class="event_id" data-toggle="modal" data-id="<?php echo $val['event_id'];?>"data-target="#myModal-<?=$val['event_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
					</li>
                    <li><a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo base_url('Admin/remove_event/'.$val['event_id']);?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a></li>
                  </ul>
                </div></td>
                          </tr>
<!-- Modal edit class-->
	<div id="myModal-<?=$val['event_id']?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Details</h4>
				</div>
				<div class="modal-body">
        <?php $attributes = array("name" => "updatebatch");
                echo form_open_multipart("Admin/update_eventdetails", $attributes);?>
				<span class='ShowData'>
        <div class="row">
          <input type="hidden" name="id" value="<?php echo $val['event_id'];?>"/>
           <div class="form-group">
      <label for="exampleInputFile">Image</label>
      <br/>
      <img src="<?php echo base_url("resource/images/"); 
             if($val['event_img']) echo $val['event_img']; else echo "no-photo.jpg"; ?>" alt="" height="50" width="50"/>
                    <br/><br/>            
      <input type="file"  name="news_image" value="<?php echo set_value('news_image'); ?>" class="imageupload" id="exampleInputFile">
     
      </div> <span id="preview-image"></span><br/><br/><br/><br/>
      <input type="hidden" name="news_image" value="<?php  echo $val['event_img']; ?>"/>
          <div class="form-group">
                   <div class="col-md-7">
                    <label>Event Name</label>
                   
                    <input type="text" class="form-control" name="e_name" value="<?php echo $val['event_name'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-12 control-label no-padding-right" for="form-field-2">Venue</label>

                    <div class="col-sm-12">
                      <input type="text" name="place" id="form-field-2" placeholder="Venue" value="<?php echo $val['event_place'];?>"
                      class="form-control" required />
                      
                    </div>
                  </div >
                  <div class="form-group">
                    <label class="col-sm-12 control-label no-padding-right" for="form-field-3">Date & time</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="time" id="form-field-3" placeholder="Date" 
                      
                      class="form-control" value="<?php echo $val['event_date'];?>" required/>
                      
                    </div>
                  </div>
           <div class="form-group">
                   <div class="col-md-7">
                    <label>Event Description</label>
                   
                     <textarea name="details" class="form-control" rows="3" required ><?php echo $val['event_description']; ?></textarea>
                    </div>
                  </div>
   </div>
        </span>
				<div class="modal-footer">
        <button type="submit" class="btn btn-success">Update</button>
				</div>
        
				</div>
        <?php echo form_close(); ?>
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
             <span class="info-box-icon bg-yellow"><i class="fa fa-cog"></i></span>
            <div class="info-box-content">
            <span class="info-box-text"><h3>Add New Event</h3></span>
            </div>
            <!-- /.info-box-content -->
          </div>
		  </br>
		   <?php $attributes = array("name" => "department_add");
           echo form_open_multipart("Admin/add_events_processing", $attributes);?>
                	<div class="padded">
                     <div class="col-md-12">
                      <div class="col-md-4">
                     <div class="form-group">
                                <label class="col-sm-12 control-label">Event Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" required name="e_name"  data-validate="required"/>
									
                                </div>
							</div>
              </div>
             
              <div class="col-md-4">
              <div class="form-group">
                    <label class="col-sm-12 control-label no-padding-right" for="form-field-2">Venue</label>

                    <div class="col-sm-12">
                      <input type="text" name="place" id="form-field-2" placeholder="Venue" onblur="venue(this);"
                      class="form-control" required />
                      
                    </div>
                  </div >
                  </div>
                   <div class="col-md-4">
                <div class="form-group">
                    <label class="col-sm-12 control-label no-padding-right" for="form-field-3">Date & time</label>

                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="time" id="form-field-3" placeholder="Date" 
                      
                      class="form-control" required/>
                      
                    </div>
                  </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
      <label for="exampleInputFile">Event Image</label>
                  
  <input type="file"  name="news_image" value="<?php echo set_value('news_image'); ?>" class="imageupload" id="exampleInputFile">
    
  <div id="preview-image" width="100" height="80"> </div><br/><br/><br/><br/>
              
    <span class="text-danger"> <?php echo form_error('news_image'); ?></span>
                  
      </div></div>
                   <div class="col-md-4">
               <div class="form-group">
               <label class="col-sm-12 control-label">Description </label>
                                <div class="col-sm-12">
                                   <textarea name="details" class="form-control" rows="3" required ></textarea>
                                </div>
                
                            </div>
              </div>
               <div class="col-md-4">
						 <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5" style="margin-top:50px;">
						<br>
                                  <button type="submit" class="btn btn-warning">&nbsp;Add Event&nbsp;</button>
                              </div>
							</div>
              </div>
							
                 </div>   </div>  <?php  echo form_close(); ?>              
			</div>
			<!----CREATION FORM ENDS-->
		</div>
      </div> </div>   </div>        
           
 </section>
</div>
<!----get class_id-------->
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