 <footer>
          <div class="pull-right">&copy; 2018 | All Right Reserverd | By <a href="#" target="_blank"> Urbansoft </a></div>
          <div class="clearfix"></div>
        </footer>
<!--/.fluid-container-->

<script src="<?php echo base_url();?>/assets/js/custom-script.js"></script>

<!-- external javascript -->

<script src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
<!-- data table plugin -->
<script src='<?php echo base_url();?>/assets/js/jquery.dataTables.min.js'></script>
<!-- select or dropdown enhancer -->
<script src="<?php echo base_url();?>/assets/js/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url();?>/assets/js/jquery.colorbox-min.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url();?>/assets/js/bootstrap-tour.min.js"></script>
<!-- rating plugin -->
<script src="<?php echo base_url();?>/assets/js/jquery.raty.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>/assets/js/DateTimePicker.js"></script>
 
<!-- application script for Charisma demo -->
<script src="<?php echo base_url();?>/assets/js/charisma.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB1br9lwKFyEpCnS5elLan_90CCsYeak6I&libraries=places" type="text/javascript"></script> 
    <script src="<?php echo base_url(); ?>/assets/js/locationpicker.jquery.js"></script>
	<script>
                        function updateControls(addressComponents) {
                            $('#us5-street1').val(addressComponents.addressLine1);
                            $('#us5-city').val(addressComponents.city);
                            $('#us5-state').val(addressComponents.stateOrProvince);
                            $('#us5-zip').val(addressComponents.postalCode);
                            $('#us5-country').val(addressComponents.country);
                        }
                        $('#us5').locationpicker({
                            location: {
                                latitude: 42.00,
                                longitude: -73.82480799999996
                            },
							inputBinding: {
								  latitudeInput: $('#latitude'),
								  longitudeInput: $('#longitude')
								 
							  },
                            radius: 300,
                            onchanged: function (currentLocation, radius, isMarkerDropped) {
                                var addressComponents = $(this).locationpicker('map').location.addressComponents;
                                updateControls(addressComponents);
                            },
                            oninitialized: function (component) {
                                var addressComponents = $(component).locationpicker('map').location.addressComponents;
                                updateControls(addressComponents);
                            }
                        });
                    </script>
				   <!-- FastClick -->
    <script src="<?php echo base_url();?>/assets/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>/assets/js/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>/assets/js/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>/assets/js/custom.min.js"></script>
	</body>
	</html>

