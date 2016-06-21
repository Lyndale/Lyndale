    <!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>About Us</h3>
                                <?php  $description = get_cms_page_data('About Us');  ?>
                                <p><?php echo substr($description->description, 0, 230).'......';   ?> </p>
                                <hr>
                                <a href="<?php echo URL::to('/')?>/about_us" class="link-arrow">Read More</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Recent Properties</h3>
                                <?php  $recent_properties = get_recent_properties();
                                 foreach($recent_properties as $key => $val){      ?>
                                <div class="property small">
                                    <a href="#">
                                        <div class="property-image">
                                            <img alt="" src="<?php  echo URL::to('/').'/assets/property_images/'.$val->image ; ?>">
                                        </div>
                                    </a>
                                    <div class="info">
                                        <a href="#"><h4><?php echo $val->title ; ?></h4></a>
                                        <figure><?php echo $val->address ; ?> </figure>
                                       
                                    </div>
                                </div><!-- /.property -->
                              <?php } ?>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Contact</h3>
                                <address>
									<?php $contact = get_Contact_information();  ?>
                                    <strong>Your Company</strong><br>
                                    <?php echo $contact->address; ?><br>
                                </address>
                               <?php echo $contact->phone_no; ?><br>
                                <a href="#"><?php echo $contact->email; ?></a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Useful Links</h3>
                                <ul class="list-unstyled list-links">
                                    <li><a href="#">All Properties</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    
                                    <li><a href="#">Terms and Conditions</a></li>
                                </ul>
                            </article>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2016. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
