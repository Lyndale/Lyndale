<!-- jQuery 2.2.0 -->
<script src="<?php echo URL::to('/')?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo URL::to('/')?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL::to('/')?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL::to('/')?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#datatable').DataTable();
  });
</script>

<!-- iCheck -->

<script>
	$('#form_addproperty').submit(function () {

    var title = $.trim($('#title').val());
    var address = $.trim($('#address').val());
    var property_description = $.trim($('#property_description').val());
    var property_latitude = $.trim($('#property_latitude').val());
    var property_longitude = $.trim($('#property_longitude').val());
    var property_type = $.trim($('#property_type').val());
    var file = $.trim($('#file').val());
    var price_monthly = $.trim($('#price_monthly').val());
    var price_weekly = $.trim($('#price_weekly').val());
    var deposit = $.trim($('#deposit').val());
    var property_status = $.trim($('#property_status').val());
    var area = $.trim($('#area').val());
    var beds = $.trim($('#beds').val());
    var baths = $.trim($('#baths').val());
    var garages = $.trim($('#garages').val());
    var rating = $.trim($('#rating').val());
    




    if (title  === '') {
        alert("Title field can\'t be empty.");
        return false;
    }

    if (address  === '') {
        alert("Address field can\'t be empty.");
        return false;
    }

    if (property_description  === '') {
        alert("Property description field can\'t be empty.");
        return false;
    }

    if (property_latitude  === '') {
        alert("Property latitude field can\'t be empty.");
        return false;
    }

    if (property_longitude  === '') {
        alert("Property longitude field can\'t be empty.");
        return false;
    }

    if (property_type  === '' || property_type  == 'Select your property type' ) {
        alert("Property type field can\'t be empty.");
        return false;
    }

    if (file  === '') {
        alert("File field can\'t be empty.Please select atleast one image !");
        return false;
    }

    if (price_monthly  === '') {
        alert("Monthly Price field can\'t be empty.");
        return false;
    }

    if (price_weekly  === '') {
        alert("Weekly field Price can\'t be empty.");
        return false;
    }

    if (deposit  === '') {
        alert("Deposit field can\'t be empty.");
        return false;
    }

    if (property_status  === '') {
        alert("Property status field can\'t be empty.");
        return false;
    }

    if (area  === '') {
        alert("Area field can\'t be empty.");
        return false;
    }

    if (beds  === '') {
        alert("Beds field can\'t be empty.");
        return false;
    }

    if (baths  === '') {
        alert("Baths field can\'t be empty.");
        return false;
    }

    if (garages  === '') {
        alert("Garages field can\'t be empty.");
        return false;
    }

    if (rating  === '') {
        alert("Rating field can\'t be empty.");
        return false;
    }
    
    if(!$('input[type=checkbox]:checked').length) {
        alert("Please select at least one amenity.");
        return false;
    }


  
});


	$('#form_editproperty').submit(function () {

    var title = $.trim($('#title').val());
    var address = $.trim($('#address').val());
    var property_description = $.trim($('#property_description').val());
    var property_latitude = $.trim($('#property_latitude').val());
    var property_longitude = $.trim($('#property_longitude').val());
    var property_type = $.trim($('#property_type').val());
    var file = $.trim($('#file').val());
    var price_monthly = $.trim($('#price_monthly').val());
    var price_weekly = $.trim($('#price_weekly').val());
    var deposit = $.trim($('#deposit').val());
    var property_status = $.trim($('#property_status').val());
    var area = $.trim($('#area').val());
    var beds = $.trim($('#beds').val());
    var baths = $.trim($('#baths').val());
    var garages = $.trim($('#garages').val());
    var rating = $.trim($('#rating').val());
    




    if (title  === '') {
        alert("Title field can\'t be empty.");
        return false;
    }

    if (address  === '') {
        alert("Address field can\'t be empty.");
        return false;
    }

    if (property_description  === '') {
        alert("Property description field can\'t be empty.");
        return false;
    }

    if (property_latitude  === '') {
        alert("Property latitude field can\'t be empty.");
        return false;
    }

    if (property_longitude  === '') {
        alert("Property longitude field can\'t be empty.");
        return false;
    }

    if (property_type  === '' || property_type  == 'Select your property type' ) {
        alert("Property type field can\'t be empty.");
        return false;
    }

    if (price_monthly  === '') {
        alert("Monthly Price field can\'t be empty.");
        return false;
    }

    if (price_weekly  === '') {
        alert("Weekly field Price can\'t be empty.");
        return false;
    }

    if (deposit  === '') {
        alert("Deposit field can\'t be empty.");
        return false;
    }

    if (property_status  === '') {
        alert("Property status field can\'t be empty.");
        return false;
    }

    if (area  === '') {
        alert("Area field can\'t be empty.");
        return false;
    }

    if (beds  === '') {
        alert("Beds field can\'t be empty.");
        return false;
    }

    if (baths  === '') {
        alert("Baths field can\'t be empty.");
        return false;
    }

    if (garages  === '') {
        alert("Garages field can\'t be empty.");
        return false;
    }

    if (rating  === '') {
        alert("Rating field can\'t be empty.");
        return false;
    }
    
    if(!$('input[type=checkbox]:checked').length) {
        alert("Please select at least one amenity.");
        return false;
    }


  
});




	$('#form_add_cmspages').submit(function () {

    var page_name = $.trim($('#page_name').val());
    var meta_title = $.trim($('#meta_title').val());
    var meta_description = $.trim($('#meta_description').val());
    var meta_keyword = $.trim($('#meta_keyword').val());
    var title = $.trim($('#title').val());
    var description = $.trim($('#description').val());

    if (page_name  === '') {
        alert("Page name field can\'t be empty.");
        return false;
    }

    if (meta_title  === '') {
        alert("Meta title field can\'t be empty.");
        return false;
    }

    if (meta_description  === '') {
        alert("Meta description field can\'t be empty.");
        return false;
    }

    if (meta_keyword  === '') {
        alert("Meta keyword field can\'t be empty.");
        return false;
    }

    if (title  === '') {
        alert("Title field can\'t be empty.");
        return false;
    }

    if (description  === '') {
        alert("Description field can\'t be empty.");
        return false;
    }
});


	$('#form_edit_cmspages').submit(function () {

    var meta_title = $.trim($('#meta_title').val());
    var meta_description = $.trim($('#meta_description').val());
    var meta_keyword = $.trim($('#meta_keyword').val());
    var title = $.trim($('#title').val());
    var description = $.trim($('#description').val());


    if (meta_title  === '') {
        alert("Meta title field can\'t be empty.");
        return false;
    }

    if (meta_description  === '') {
        alert("Meta description field can\'t be empty.");
        return false;
    }

    if (meta_keyword  === '') {
        alert("Meta keyword field can\'t be empty.");
        return false;
    }

    if (title  === '') {
        alert("Title field can\'t be empty.");
        return false;
    }

    if (description  === '') {
        alert("Description field can\'t be empty.");
        return false;
    }
});


	$('#form_add_testimonials').submit(function () {

    var name = $.trim($('#name').val());
    var comment = $.trim($('#comment').val());
    var file = $.trim($('#file').val());


    if (name  === '') {
        alert("Name field can\'t be empty.");
        return false;
    }

    if (comment  === '') {
        alert("Comment field can\'t be empty.");
        return false;
    }

    if (file  === '') {
        alert("File field can\'t be empty.Please select your image !");
        return false;
    } 
});

	$('#form_edit_testimonials').submit(function () {

    var name = $.trim($('#name').val());
    var comment = $.trim($('#comment').val());
    var file = $.trim($('#file').val());


    if (name  === '') {
        alert("Name field can\'t be empty.");
        return false;
    }

    if (comment  === '') {
        alert("Comment field can\'t be empty.");
        return false;
    }
});



$('#form_add_partner').submit(function () {
    var file = $.trim($('#file').val());
    if (file  === '') {
        alert("File field can\'t be empty.Please select your image !");
        return false;
    } 
});

</script>	
