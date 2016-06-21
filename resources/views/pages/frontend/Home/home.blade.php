 @extends('layouts.home')
@section('pagecontent')
    <!-- Page Content -->
    <div id="page-content">
        <section id="banner">
            <div class="block has-dark-background background-color-default-darker center text-banner">
                <div class="container">
                    <h1 class="no-bottom-margin no-border">Lorem ipsum dolor sit amet, consectetur  <a href="#" class="text-underline">adipiscing elit</a>!</h1>
                </div>
            </div>
        </section><!-- /#banner -->
        <section id="our-services" class="block">
            <div class="container">
                <header class="section-title"><h2 style="color:#F7921E">Our Services</h2></header>
                <div class="row">
                   <?php
                    $Services = get_services();
                    foreach($Services as $key => $val){ ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><?php  echo $val->service_icon ?></figure>
                            <aside class="description">
                                <header><h3><?php echo $val->service_name  ?></h3></header>
                                <p><?php echo  substr($val->service_detail, 0, 70).'......';  ?></p>
                                <a href="#" class="link-arrow">Read More</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                   <?php } ?>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#our-services -->

        <aside id="advertising" class="block" style=" background:#ddd">
            <div class="container">
                
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">Do you want your property to be listed here?</span>
                            <a href="#" class="submit">Request a Viewing!</a>
                        </div>
                    </div><!-- /.banner-->
                
            </div>
        </aside><!-- /#adveritsing-->
        <section id="new-properties" class="block">
            <div class="container">
                <header class="section-title">
                    <h2 style="color:#F7921E">New Properties for You</h2>
                    <a href="#" class="link-arrow">All Properties</a>
                </header>
                <div class="row">
				<?php  $property = get_properties_atHomepage();
				    foreach($property as $key => $val){    ?>	
                    <div class="col-md-3 col-sm-6">
                        <div class="property">
                            <a href="<?php echo URL::to('property_detail', ['id'=>base64_encode($val->id)]) ?>">
                                <div class="property-image">
                                    <img alt="" src="<?php  echo URL::to('/').'/assets/property_images/'.$val->image ; ?>">
                                </div>
                                <div class="overlay">
                                    <div class="info">
                                        <h3><?php echo $val->title ; ?></h3>
                                        <figure><?php echo $val->address ; ?></figure>
                                    </div>
                                    <ul class="additional-info">
                                        <li>
                                            <header>Area:</header>
                                            <figure><?php echo substr($val->area, 0, -1); ?><sup><?php  echo substr($val->area, -1); ?></sup></figure>
                                        </li>
                                        <li>
                                            <header>Beds:</header>
                                            <figure><?php echo $val->beds ; ?></figure>
                                        </li>
                                        <li>
                                            <header>Baths:</header>
                                            <figure><?php echo $val->baths ; ?></figure>
                                        </li>
                                        <li>
                                            <header>Garages:</header>
                                            <figure><?php echo $val->garages ; ?></figure>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div><!-- /.property -->
                    </div><!-- /.col-md-3 -->
                    <?php } ?>
                </div><!-- /.row-->
            </div><!-- /.container-->
        </section><!-- /#new-properties-->
        <section id="testimonials" class="block">
            <div class="container">
                <header class="section-title"><h2 style=" color:#F7921E">Testimonials</h2></header>
                <div class="owl-carousel testimonials-carousel">
				<?php 
				   $testimonials = get_testimonials();
				   foreach($testimonials as $key => $val){
				  ?>	
                    <blockquote class="testimonial">
                        <figure>
                            <div class="image">
                                <img alt="" src="<?php  echo URL::to('/').'/assets/testimonial_images/'.$val->image ; ?>">
                            </div>
                        </figure>
                        <aside class="cite">
                            <p><?php echo substr($val->comment, 0, 200).'......';  ?></p>
                            <footer><?php echo $val->name; ?></footer>
                        </aside>
                    </blockquote>
                 <?php } ?>
                </div><!-- /.testimonials-carousel -->
            </div><!-- /.container -->
        </section><!-- /#testimonials -->
        <section id="partners" class="block">
            <div class="container">
                <header class="section-title"><h2 style="color:#F7921E">Our Partners</h2></header>
                <div class="logos">
					<?php
					$partners = get_partners();
					foreach($partners as $key => $val){  ?>
                    <div class="logo">
						<a href=""><img src="<?php  echo URL::to('/').'/assets/partners_image/'.$val->image ; ?>" alt=""></a>
					</div>
					<?php } ?>
                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
    </div>
    <!-- end Page Content -->
@endsection
