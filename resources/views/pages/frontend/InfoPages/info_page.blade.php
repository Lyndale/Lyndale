@extends('layouts.info')
@section('pagecontent')
     <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="inner-banner">
        <!-- Breadcrumb -->
        <div class="container">
       <h1><?php echo $master_title;  ?></h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><?php echo $master_title;  ?></li>
            </ol>
        </div>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-sm-2">
                <section id="sidebar">
                    <aside>
                        <ul class="sidebar-navigation">
                            <li class="<?php echo ($master_title=='Tenants')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/tenants"><i class="fa fa-home"></i><span>Tenants</span></a></li>
                            <li class="<?php echo ($master_title=='Info for Tenants')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/info_for_tenants"><i class="fa fa-users"></i><span>Info for Tenants</span></a></li>
                            <li class="<?php echo ($master_title=='Managed Properties')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/managed_properties"><i class="fa fa-users"></i><span>Managed Properties</span></a></li>
                            <li class="<?php echo ($master_title=='Fees')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/fees"><i class="fa fa-users"></i><span>Fees</span></a></li>
                            <li class="<?php echo ($master_title=='Helpful Resources')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/helpful_resources"><i class="fa fa-users"></i><span>Helpful Resources</span></a></li>
                            <li class="<?php echo ($master_title=='Request a Repair')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/request_a_repair"><i class="fa fa-users"></i><span>Request a Repair</span></a></li>
                            <li class="<?php echo ($master_title=='About Us')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/about_us"><i class="fa fa-users"></i><span>About Us</span></a></li>
                            <li class="<?php echo ($master_title=='Meet The Team')?'active':'';  ?>">
                               <a href="<?php echo URL::to('/')?>/meet_the_team"><i class="fa fa-users"></i><span>Meet The Team</span></a></li>
                          </ul>
                    </aside>
                </section><!-- /#sidebar -->
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <section id="profile"> 
                    <header><h1><?php echo $master_title;  ?></h1></header>                   
                       <div class="account-profile">
                         <div class="">
                           <p><?php $page_data =  get_cms_page_data($master_title);
                                    echo $page_data->description;  ?></p>
                         </div>
                        </div><!-- /.account-profile -->
                    </section><!-- /#profile -->
                </div><!-- /.col-md-9 -->
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
@endsection
