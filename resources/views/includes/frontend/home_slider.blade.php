    <!-- Slider -->
    <div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel homepage-slider carousel-full-width">
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            <?php  $banner_content = get_banner_content_info(); ?>
                            <h3><?php  echo $banner_content->title; ?></h3>
                            <figure><?php  echo $banner_content->description; ?></figure>
                        </div>
                        
                        <a href="#" class="link-arrow btn-default" style="margin-right:15px;">Contact Agent</a>
                        <a href="#" class="link-arrow btn-default">Request a Viewing</a>
                    </div>
                </div>
              <!--  <img alt="" src="assets/img/slide-01.jpg">-->
               
                <img src="<?php  echo URL::to('/').'/assets/banner_image/'.$banner_content->image ; ?>" alt="banner image" />
            </div>
            
            <div class="slide">
                <div class="container">
                    <div class="overlay">
                        <div class="info">
                            
                            <h3>1866 Clement Street</h3>
                            <figure>Atlanta, GA 30303</figure>
                        </div>
                        
                        <a href="#" class="link-arrow btn-default">Call Agent</a>
                        <a href="#" class="link-arrow btn-default">Email Agent</a>
                    </div>
                </div>
                <img alt="" src="<?php echo URL::to('/')?>/assets/frontend/img/slide-01.jpg">
            </div>
        </div>
    </div>
    <!-- end Slider -->
