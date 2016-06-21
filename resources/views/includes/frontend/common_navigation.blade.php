 <div class="navigation">        
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="<?php echo URL::to('/')?>"><img src="<?php echo URL::to('/')?>/assets/frontend/img/logo.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo ($master_title=='Home')?'active':'';  ?>"><a href="<?php echo URL::to('/')?>">Home</a>
                            
                        </li>
                        <li class=""><a href="properties-listing.html">Properties</a>
                          
                        </li>
                        <li class="has-child <?php echo ($master_title=='Tenants' || $master_title=='Info for Tenants' || $master_title=='Managed Properties' || $master_title=='Fees' || $master_title=='Helpful Resources' || $master_title=='Request a Repair'  )?'active':'';  ?>"><a href="<?php echo URL::to('/')?>/tenants">Tenants</a>
                            <ul class="child-navigation">
                                <li><a href="<?php echo URL::to('/')?>/info_for_tenants">Info for Tenants</a></li>
                                <li><a href="<?php echo URL::to('/')?>/managed_properties">Managed Properties</a></li>
                                <li><a href="<?php echo URL::to('/')?>/fees">Fees</a></li>
                                <li><a href="<?php echo URL::to('/')?>/helpful_resources">Helpful Resources</a></li>
                                <li><a href="<?php echo URL::to('/')?>/request_a_repair">Request a Repair</a></li>                               
                            </ul>
                        </li>
                        <li class="has-child">
							<a href="#">Landlords</a>
                            <ul class="child-navigation">
                                <li><a href="#">Let-Only Service</a></li>
                                <li><a href="#">Fully Managed Service</a></li>
                                <li><a href="#">Fees</a></li>
                               
                            </ul>
                        </li>
                        
                        <li class="has-child"><a href="about.html">About Us</a>
                            <ul class="child-navigation">
                                <li><a href="meet-the-team.html">Meet the Team</a></li>
                             </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav><!-- /.navbar collapse-->
                <!--<div class="add-your-property">
                    <a href="submit.html" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">Add Your Property</span></a>
                </div>-->
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->
