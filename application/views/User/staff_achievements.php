 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-12">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-archive">
                  <div class="row">
				  
				  <?php    
         foreach ($achi as $row) 
  { ?>
                    <div class="col-md-6 col-sm-6">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img" style="width=150px; height=150px;>

                          <a href="#"><img  src="<?php echo base_url("resource/images/"); 
             if($row->ach_image) echo $row->ach_image; else echo "no-photo.jpg"; ?>"   alt="img"></a>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="#"><?php echo $row->title;?>.</a></h3>
                          </figcaption>                      
                        </figure>
                        
                        <div class="mu-blog-description">
                          <p><?php echo $row->description;?></p>
                          <!--a class="mu-read-more-btn" href="#">Read More</a-->
                        </div>
                      </article> 
                    </div>                  
                  <?php } ?>     
                  </div>
                </div>
				</div>
				</div>
				</div>
				</div>
				</div>
				</div>
				</section>