@extends('layouts.property')
@section('pagecontent')
    <!-- Page Content -->
  <div id="page-content">
        <!-- Breadcrumb -->
        <div class="inner-banner">
        <!-- Breadcrumb -->
        <div class="container">
         <h1><?php  echo $master_title;  ?></h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><?php  echo $master_title;  ?></li>
            </ol>
        </div>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Property Detail Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="property-detail">
                        <header class="property-title">
                            <h1 class="heading"><?php  echo $property_data->title;  ?></h1>
                            <figure><?php  echo $property_data->address;  ?></figure>
                            <span class="actions">
                                <!--<a href="#" class="fa fa-print"></a>-->
                                <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Add to bookmark</span><span class="title-added">Added</span></a>
                            </span>
                        </header>
                        <section id="property-gallery">
                            <div class="owl-carousel property-carousel">
								
							<?php foreach($property_data->images as $key => $val){  ?>
                                <div class="property-slide">
                                    <a href="" class="image-popup">
                                        <div class="overlay"><h3>Front View</h3></div>
                                        <img alt="" src="<?php  echo URL::to('/').'/assets/property_images/large/'.$val->image ; ?>">
                                    </a>
                                </div><!-- /.property-slide -->
                                
                             <?php } ?>   

                            </div><!-- /.property-carousel -->
                        </section>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <section id="quick-summary" class="clearfix">
                                    <header><h2 class="heading">Quick Summary</h2></header>
                                    <dl>
                                        <dt>Location</dt>
                                            <dd><?php  echo $property_data->property_location;  ?></dd>
                                        <dt>Price</dt>
                                            <dd><span class="tag price">$<?php echo $property_data->price_monthly;  ?>  /mo</span></dd>
                                        <dt>Property Type:</dt>
                                            <dd><?php  echo $property_data->property_type;  ?></dd>
                                        <dt>Status:</dt>
                                            <dd><?php  echo $property_data->property_status;  ?></dd>
                                        <dt>Area:</dt>
                                            <dd><?php echo substr($property_data->area, 0, -1); ?><sup><?php  echo substr($property_data->area, -1); ?></sup></dd>
                                        <dt>Beds:</dt>
                                            <dd><?php echo $property_data->beds  ?></dd>
                                        <dt>Baths:</dt>
                                            <dd><?php echo $property_data->baths  ?></dd>
                                        <dt>Garages:</dt>
                                            <dd><?php echo $property_data->garages  ?></dd>
                                        <dt>Rating:</dt>
                                            <dd><div class="rating rating-overall" data-score="<?php echo $property_data->rating  ?>"></div></dd>
                                    </dl>
                                </section><!-- /#quick-summary -->
                                <section id="quick-summary" class="clearfix">
                                    <header><h2 class="heading">Download PDF</h2></header>
                                    <dl class="download">
                                         <?php $documents = get_documents($property_data->id); 
                                            foreach($documents as $key => $val){ ?>
                                            <dt><?php echo $val->document; ?></dt>
                                            <dd><a href="<?php  echo URL::to('/').'/assets/property_documents/'.$val->document ; ?>" target="_blank" ><i class="fa fa-download" aria-hidden="true"></i></a></dd>
                                         <?php } ?>
                                       
                                    </dl>
                                </section><!-- /#quick-summary -->
                            </div><!-- /.col-md-4 -->
                            <div class="col-md-8 col-sm-12">
                                <section id="description">
                                    <header><h2 class="heading">Property Description</h2></header>
                                    <p> <?php echo $property_data->property_description  ?> </p>
                                </section><!-- /#description -->
                                <section id="property-features">
                                    <header><h2 class="heading">Property Amenities</h2></header>
                                    <ul class="list-unstyled property-features-list">
                                       <?php  $amenities = get_amenities();
                                             foreach($amenities as $key=>$val){  ?> 
                                                 <li><?php echo $val->amenities_name;  ?></li>
                                       <?php } ?>    
                                    </ul>
                                </section><!-- /#property-features -->
                              
                                
                                <!-- /#property-rating -->
                                <!-- /#video-presentation -->
                            </div><!-- /.col-md-8 -->                             
                            <!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </section><!-- /#property-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Property Detail Content -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h3 class="heading">Arrange Viewing</h3></header>
                            <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                                <div class="form-group">
                                   <label>Name <span class="requried">*</span></label>
                                   <input type="text" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Email <span class="requried">*</span></label>
                                    <input type="email" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                 <label>Telephone <span class="requried">*</span></label>
                                 <input type="text" class="form-control" />
                                </div><!-- /.form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Request Callback</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->
                        <aside id="featured-properties">
                            <header><h3 class="heading">Featured Properties</h3></header>
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/properties/property-06.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>2186 Rinehart Road</h4></a>
                                    <figure>Doral, FL 33178 </figure>
                                   
                                </div>
                            </div><!-- /.property -->
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/properties/property-09.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>2479 Murphy Court</h4></a>
                                    <figure>Minneapolis, MN 55402</figure>
                                    
                                </div>
                            </div><!-- /.property -->
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="assets/img/properties/property-03.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>1949 Tennessee Avenue</h4></a>
                                    <figure>Minneapolis, MN 55402</figure>
                                    
                                </div>
                            </div><!-- /.property -->
                        </aside><!-- /#featured-properties -->
                        <!-- /#our-guide -->
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
                <div class="col-sm-12">
                              <section id="property-map">
                                    <header><h2 class="heading">Map</h2></header>
                                    <div class="property-detail-map-wrapper">
                                        <div class="property-detail-map" id="property-detail-map"></div>
                                    </div>
                                </section><!-- /#property-map -->
                             </div>
                <div class="col-md-12 col-sm-12">
                                <section id="similar-properties">
                                    <header><h2  class="heading" style="margin-top:50px;">Similar Properties</h2></header>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="property">
                                                <a href="property-detail.html">
                                                    <div class="property-image">
                                                        <img alt="" src="assets/img/properties/property-06.jpg">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <div class="tag price">$ 11,000</div>
                                                            <h3>3398 Lodgeville Road</h3>
                                                            <figure>Golden Valley, MN 55427</figure>
                                                        </div>
                                                        <ul class="additional-info">
                                                            <li>
                                                                <header>Area:</header>
                                                                <figure>240m<sup>2</sup></figure>
                                                            </li>
                                                            <li>
                                                                <header>Beds:</header>
                                                                <figure>2</figure>
                                                            </li>
                                                            <li>
                                                                <header>Baths:</header>
                                                                <figure>2</figure>
                                                            </li>
                                                            <li>
                                                                <header>Garages:</header>
                                                                <figure>0</figure>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div><!-- /.property -->
                                        </div><!-- /.col-md-3 -->
                                        <div class="col-md-3 col-sm-6">
                                            <div class="property">
                                                <a href="property-detail.html">
                                                    <div class="property-image">
                                                        <img alt="" src="assets/img/properties/property-04.jpg">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <div class="tag price">$ 38,000</div>
                                                            <h3>2186 Rinehart Road</h3>
                                                            <figure>Doral, FL 33178 </figure>
                                                        </div>
                                                        <ul class="additional-info">
                                                            <li>
                                                                <header>Area:</header>
                                                                <figure>240m<sup>2</sup></figure>
                                                            </li>
                                                            <li>
                                                                <header>Beds:</header>
                                                                <figure>3</figure>
                                                            </li>
                                                            <li>
                                                                <header>Baths:</header>
                                                                <figure>1</figure>
                                                            </li>
                                                            <li>
                                                                <header>Garages:</header>
                                                                <figure>1</figure>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div><!-- /.property -->
                                        </div><!-- /.col-md-3 -->
                                        <div class="col-md-3 col-sm-6">
                                            <div class="property">
                                                <a href="property-detail.html">
                                                    <div class="property-image">
                                                        <img alt="" src="assets/img/properties/property-07.jpg">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <div class="tag price">$ 325,000</div>
                                                            <h3>3705 Brighton Circle Road</h3>
                                                            <figure>Glenwood, MN 56334</figure>
                                                        </div>
                                                        <ul class="additional-info">
                                                            <li>
                                                                <header>Area:</header>
                                                                <figure>240m<sup>2</sup></figure>
                                                            </li>
                                                            <li>
                                                                <header>Beds:</header>
                                                                <figure>3</figure>
                                                            </li>
                                                            <li>
                                                                <header>Baths:</header>
                                                                <figure>1</figure>
                                                            </li>
                                                            <li>
                                                                <header>Garages:</header>
                                                                <figure>1</figure>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div><!-- /.property -->
                                        </div><!-- /.col-md-3 -->
                                        <div class="col-md-3 col-sm-6">
                                            <div class="property">
                                                <a href="property-detail.html">
                                                    <div class="property-image">
                                                        <img alt="" src="assets/img/properties/property-07.jpg">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <div class="tag price">$ 325,000</div>
                                                            <h3>3705 Brighton Circle Road</h3>
                                                            <figure>Glenwood, MN 56334</figure>
                                                        </div>
                                                        <ul class="additional-info">
                                                            <li>
                                                                <header>Area:</header>
                                                                <figure>240m<sup>2</sup></figure>
                                                            </li>
                                                            <li>
                                                                <header>Beds:</header>
                                                                <figure>3</figure>
                                                            </li>
                                                            <li>
                                                                <header>Baths:</header>
                                                                <figure>1</figure>
                                                            </li>
                                                            <li>
                                                                <header>Garages:</header>
                                                                <figure>1</figure>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div><!-- /.property -->
                                        </div><!-- /.col-md-3 -->
                                    </div><!-- /.row-->
                                </section><!-- /#similar-properties -->
                                
                                <section id="comments">
                                    <header><h2 style="color:#F7921E">Comments</h2></header>
                                    <ul class="comments">
                                        <li class="comment">
                                            <figure>
                                                <div class="image">
                                                    <img alt="" src="assets/img/client-01.jpg">
                                                </div>
                                            </figure>
                                            <div class="comment-wrapper">
                                                <div class="name pull-left">Catherine Brown</div>
                                                <span class="date pull-right"><span class="fa fa-calendar"></span>12.05.2014</span>
                                                <div class="rating rating-individual" data-score="4"></div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum, sem ut sollicitudin consectetur,
                                                    augue diam ornare massa, ac vehicula leo turpis eget purus. Nunc pellentesque vestibulum mauris, eget suscipit
                                                    mauris imperdiet vel. Nulla et massa metus. Nam porttitor quam eget ante elementum consectetur. Aenean ac nisl
                                                    et nulla placerat suscipit eu a mauris. Curabitur quis augue condimentum, varius mi in, ultricies velit.
                                                    Suspendisse potenti.
                                                </p>
                                                <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                                                <hr>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="comments-child">
                                                <li class="comment">
                                                    <figure>
                                                        <div class="image">
                                                            <img alt="" src="assets/img/agent-01.jpg">
                                                        </div>
                                                    </figure>
                                                    <div class="comment-wrapper">
                                                        <div class="name">John Doe</div>
                                                        <span class="date"><span class="fa fa-calendar"></span>24.06.2014</span>
                                                        <div class="rating rating-individual" data-score="3"></div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum, sem ut sollicitudin consectetur,
                                                            augue diam ornare massa, ac vehicula leo turpis eget purus. Nunc pellentesque vestibulum mauris, eget suscipit
                                                            mauris.
                                                        </p>
                                                        <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                                                        <hr>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="comment">
                                            <figure>
                                                <div class="image">
                                                    <img alt="" src="assets/img/user-02.jpg">
                                                </div>
                                            </figure>
                                            <div class="comment-wrapper">
                                                <div class="name">John Doe</div>
                                                <span class="date"><span class="fa fa-calendar"></span>08.05.2014</span>
                                                <div class="rating rating-individual" data-score="5"></div>
                                                <p>Quisque iaculis neque at dui cursus posuere. Sed tristique pharetra orci, eu malesuada ante tempus nec.
                                                    Phasellus enim odio, facilisis et ante vel, tempor congue sapien. Praesent eget ligula
                                                    eu libero cursus facilisis vel non arcu. Sed vitae quam enim.
                                                </p>
                                                <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                                                <hr>
                                            </div>
                                        </li>
                                    </ul>
                                </section>
                            </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->                
@endsection
