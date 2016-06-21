@extends('layouts.property')
@section('pagecontent')
     <!-- Page Content -->
    <div id="page-content">
     <div class="inner-banner">
        <!-- Breadcrumb -->
        <div class="container">
         <h1><?php  echo $master_title; ?></h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><?php  echo $master_title; ?></li>
            </ol>
        </div>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
               <!-- sidebar -->
                <div class="col-md-12 col-sm-12">
                    <section id="sidebar">
                        <aside id="edit-search">
                            <header><h3 class="heading">Search Properties</h3></header>
                            <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                             <div class="row">
                              <div class="col-sm-4 col-md-2">
                                <div class="form-group">
                                    <select name="type">
                                        <option value="">Location</option>
                                        <option value="1">Rent</option>
                                        <option value="2">Sale</option>
                                    </select>
                                </div><!-- /.form-group -->
                                </div>
                                <div class="col-sm-4 col-md-2">
                                <div class="form-group">
                                    <select name="country">
                                        <option value="">Property Type</option>
                                        <option value="1">France</option>
                                        <option value="2">Great Britain</option>
                                        <option value="3">Spain</option>
                                        <option value="4">Russia</option>
                                        <option value="5">United States</option>
                                    </select>
                                </div><!-- /.form-group -->
                                </div>
                                <div class="col-sm-4 col-md-2">
                                <div class="form-group">
                                    <select name="city">
                                        <option value="">Bedrooms</option>
                                        <option value="1">New York</option>
                                        <option value="2">Los Angeles</option>
                                        <option value="3">Chicago</option>
                                        <option value="4">Houston</option>
                                        <option value="5">Philadelphia</option>
                                    </select>
                                </div><!-- /.form-group -->
                                </div>
                                <div class="col-sm-4 col-md-2">
                                <div class="form-group">
                                    <select name="district">
                                        <option value="">Furnished</option>
                                        <option value="1">Manhattan</option>
                                        <option value="2">The Bronx</option>
                                        <option value="3">Brooklyn</option>
                                        <option value="4">Queens</option>
                                        <option value="5">Staten Island</option>
                                    </select>
                                </div><!-- /.form-group -->
                                </div>
                                
                                <div class="col-sm-4 col-md-2">
                                <div class="form-group">
                                    <div class="price-range">
                                        <input id="price-input" type="text" name="price" value="1000;299000">
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Search Now</button>
                                </div>
                                </div><!-- /.form-group -->
                                </div>
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->
                      
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-12 -->
                <!-- end Sidebar -->
                <!-- Results -->
                <div class="col-md-12 col-sm-12">
                    <section id="results">
                        
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Search Results:</h3>
                                <span class="search-count">28</span>
                                <div class="sorting">
                                    <div class="form-group">
                                        <select name="sorting">
                                            <option value="">Sort By</option>
                                            <option value="1">Lowest price first</option>
                                            <option value="2">Highest price first</option>
                                            <option value="3">Date added</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                            </figure>
                        </section>
                        <section id="properties">
                        <div class="grid">
                         <?php foreach($properties as $key => $val){ ?>
                        <div class="property masonry">
                            <div class="inner">
                                <a href="<?php echo URL::to('/property_detail', ['id'=>base64_encode($val->id)]) ?>">
                                    <div class="property-image">
                                        <figure class="tag status"><?php echo (!empty($val->property_status))?$val->property_status:'';  ?></figure>
                                        <?php $icon = ($val->property_type=='1')?'villa.png':'cottage.png'; ?>
                                        <figure class="type" title="Apartment"><img src="<?php  echo URL::to('/').'/assets/frontend/img/property-types/'.$icon ; ?>"  alt=""></figure>
                                        <div class="overlay" >
                                            <div class="info pull-left">
                                                <div style=" font-size: 12px;" class="tag price">$<?php echo $val->price_weekly;  ?>  /week</div>
                                            </div>
                                            <div class="info pull-right">
                                                <div style=" font-size: 12px;" class="tag price">$<?php echo $val->price_monthly;  ?>  /mo</div>
                                            </div>
                                        </div>
                                        <img alt="" src="<?php  echo URL::to('/').'/assets/property_images/'.$val->image ; ?>">
                                    </div>
                                </a>
                                <aside>
                                    <header>
                                        <a href="<?php echo URL::to('property_detail', ['id'=>base64_encode($val->id)]) ?>"><h3><?php echo $val->title  ?></h3></a>
                                        <figure><?php echo $val->address  ?></figure>
                                        								 
                                    </header>
                                    <p><?php echo substr($val->property_description, 0, 70).'......'; ?></p>
                                    <dl>
                                        <dt>Status:</dt>
                                        <dd><?php echo $val->property_status  ?></dd>
                                        <dt>Area:</dt>
                                        <dd><?php echo substr($val->area, 0, -1); ?><sup><?php  echo substr($val->area, -1); ?></sup></dd>
                                        <dt>Beds:</dt>
                                        <dd><?php echo $val->beds  ?></dd>
                                        <dt>Baths:</dt>
                                        <dd><?php echo $val->baths  ?></dd>
                                    </dl>
                                    <a href="<?php echo URL::to('/property_detail', ['id'=>base64_encode($val->id)]) ?>" class="link-arrow">Read More</a>
                                </aside>
                            </div>
                        </div><!-- /.property -->
                        <?php } ?>
                        

                        </div><!-- /js-masonry-->
                            <!-- Pagination -->
                            <div class="center">
                                <ul class="pagination">
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul><!-- /.pagination-->
                            </div><!-- /.center-->
                        </section><!-- /#properties-->
                    </section><!-- /#results -->
                </div><!-- /.col-md-12 -->
                <!-- end Results -->

              
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
@endsection
