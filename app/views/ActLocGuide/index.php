<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        

        <title>Supernova Mobile | Site Location</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/css/bootstrap.min.css">

    </head>
   <body>

    <div class="text-center" style='background-color:#eee;padding:10px;'>
        <img src="<?= BASE_URL; ?>/cdn/images/logo.png" width="360" class='img-responsive'>
        <h1>Supernova Mobile - Site Location</h1>
        <p style='color:red;font-size:20px;'>Lokasi browser anda tidak aktif.</p> 
    </div>
    <p id="demo" style="display:none;"></p>    
    <span class="geolocation" style="display:none;"></span>

  <!-- <div class="text-left" style='padding:10px;'>
    <p>Berikut langkah-langkah untuk mengaktifkan Lokasi browser :</p> 
    <p style='font-weight:bold;padding-top:4px;'>1. Buka Menu - Setting</p> 
    <img src="images/ActGeoLoc/1.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>2. Buka Menu - Site Setting</p> 
    <img src="images/ActGeoLoc/2.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>3. Buka Menu - Location</p> 
    <img src="images/ActGeoLoc/3.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>4. Klik - https://covid19.supernova-id.com</p> 
    <img src="images/ActGeoLoc/4.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>5. Klik - 'Clear and Finish'</p> 
    <img src="images/ActGeoLoc/5.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>6. Buka link covid supernova di : <a href='https://covid19.supernova-id.com'>https://covid19.supernova-id.com</a></p> 
    <img src="images/ActGeoLoc/6.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>7. Pilih 'Allow'</p> 
    <img src="images/ActGeoLoc/7.jpg" class='img-responsive'>
    <p style='font-weight:bold;padding-top:4px;'>8. Aktivasi Lokasi browser berhasil.</p> 
    <img src="images/ActGeoLoc/8.jpeg" class='img-responsive'>
  </div> -->
  <!-- jQuery 3 -->
    <script src="<?= BASE_URL; ?>cdn/bower_components/jquery/dist/jquery.min.js"></script>

    <script>
		$(document).ready(function() {
			getLocation();
		

			var x = document.getElementById("demo");
			var $locationText = $('.geolocation'); 

			function getLocation() {
				
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition, errorHandler);
				} else { 
					x.innerHTML = "Geolocation is not supported by this browser.";
				}
			}

			function showPosition(position) {
                console.log('tes')
				x.innerHTML = "Latitude: " + position.coords.latitude + 
				"<br>Longitude: " + position.coords.longitude;

                geoLocSuccess(position);
				
			}

			function geoLocSuccess(pos) {
				// get user lat,long
				var myLat = pos.coords.latitude,
					myLng = pos.coords.longitude,
					loadingTimeout;

				var request = $.get( "https://nominatim.openstreetmap.org/reverse?format=json&lat="+myLat+"&lon=" + myLng)
				.done(function(data) {
					console.log(data)
					$locationText.text(data.display_name);

					var nik = '<?php echo USERID?>';  

					// nik     = '2162118';
					loc     = data.display_name;
					gps     = '1'

					$.ajax({
						url: "ActLocGuide/AddGeoLoc",
						type: "POST",

						data : {nik : nik, lat : myLat, lon : myLng, loc : loc,gps : gps,
						},
						success: function (data, status){
							console.log(data)
							$(".geolocation").html(data);
                            location.href = "https://mobile.supernova-id.com/dashboard";
						},
						error:function(err){
						console.error(err);
						alert(err);
						}

					});    
				}) ;
			}

			function errorHandler(err) {
                CekGeoLock();
                function CekGeoLock() {
                    if(navigator.geolocation){
                        navigator.geolocation.getCurrentPosition(getLocation,errorHandler);
                    } else{
                        location.href = "https://mobile.supernova-id.com/ActLocGuide/index";
                        //location.href = "ActLocGuide.php";
                    }
                }
                function errorHandler(err) {
                    // location.href = "https://mobile.supernova-id.com/ActLocGuide/index";
                    //location.href = "ActLocGuide.php";
                }
                function getLocation(){
                    
                    location.href = "https://mobile.supernova-id.com/";
                    //location.href = "index2.php";
                }
            }
		});
		
	</script>
  </body>

</html>