    <section id="mu-our-teacher">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>Our Gallery</h2>
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <?php if(isset($gallery)): ?>
            <div class="mu-our-teacher-content">
              <div class="row">
              <?php foreach($gallery as $row){ ?>
                <div class="col-lg-3 col-md-3  col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="<?php echo base_url("resource/images/"); 
             if($row->image) echo $row->image; else echo "no-photo.jpg"; ?>" alt="teacher img">
             <div class="mu-our-teacher-social"><?php  echo $row->title; ?></div>
                    </figure>  
                  </div>
                </div>
               <?php } ?>
              </div>
            </div> 
          <?php else: ?>
             <div class="mu-our-teacher-content">
             <h2><a href="#">Currently No Images Available...</a></h2>
             </div>
           <?php endif; ?>
            <!-- End our teacher content -->           
          </div>
        </div>
      </div>
    </div>
  </section>