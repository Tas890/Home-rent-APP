<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$content=$_POST['content'];
	$ptype=$_POST['ptype'];
	$bhk=$_POST['bhk'];
	$bed=$_POST['bed'];
	$balc=$_POST['balc'];
	$hall=$_POST['hall'];
	$stype=$_POST['stype'];
	$bath=$_POST['bath'];
	$kitc=$_POST['kitc'];
	$floor=$_POST['floor'];
	$price=$_POST['price'];
	$city=$_POST['city'];
	$asize=$_POST['asize'];
	$loc=$_POST['loc'];
	$state=$_POST['state'];
	$latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

	
	$temp_name5 =$_FILES['fimage']['tmp_name'];
	$temp_name6 =$_FILES['fimage1']['tmp_name'];
	$temp_name7 =$_FILES['fimage2']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	move_uploaded_file($temp_name4,"admin/property/$aimage4");
	
	move_uploaded_file($temp_name5,"admin/property/$fimage");
	move_uploaded_file($temp_name6,"admin/property/$fimage1");
	move_uploaded_file($temp_name7,"admin/property/$fimage2");
	
	$sql="insert into property (title,pcontent,type,bhk,stype,bedroom,bathroom,balcony,kitchen,hall,floor,size,price,location,city,state,longitude,latitude,feature,pimage,pimage1,pimage2,pimage3,pimage4,uid,status,mapimage,topmapimage,groundmapimage,totalfloor, isFeatured)
	values('$title','$content','$ptype','$bhk','$stype','$bed','$bath','$balc','$kitc','$hall','$floor','$asize','$price',
	'$loc','$city','$state','$longitude','$latitude','$feature','$aimage','$aimage1','$aimage2','$aimage3','$aimage4','$uid','$status','$fimage','$fimage1','$fimage2','$totalfloor', '$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}	




?>





<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" integrity="sha512-qdmeq6UwPCs0UJ0+O4hIVUm03YaP34t5U/PDf6v0O9yX2hAW9MCzHw2TwL+xPZgU38Sed8C5L3JrOU40b2sJ5A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		#mapid {
			height: 500px;
		}
	</style>
<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!-- Leaflet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.js"></script>
    <style>
      #map {
        position: relative;
        height: 500px;
        width: 100%;
      }


      
    </style>

<!-- Leaflet -->
 
<!--	Title
	=========================================================-->
<title>Bashundhara Bari Bhara</title>
</head>
<body>






























<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
        


	  	



        <!--	Banner   --->
        <!-- <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Submit Property</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Submit Property</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div> -->
         <!--	Banner   --->
		 
		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">প্রপার্টি যোগ করুন +</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
									<?php echo $error; ?>
									<?php echo $msg; ?>
									
										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">টাইটেল</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Enter Title">
													</div>
												</div> 
								
											



											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Longitude</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="longitude" id="longitude" required placeholder="Enter Longitude">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-lg-3 col-form-label">Latitude</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" name="latitude" id="latitude" required placeholder="Enter Latitude">
												</div>
											</div>




	<div id="mapid"></div>
<!-- MAPINPUT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js" integrity="sha512-vvRQT3FnjRWHZvMWRgBN9uK2RvYTk+ozsJmpIkt1QqkhHOSLPrBfGzVXWpjGgjA2fESivg1Hfwn/T7J3Zm4h1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

			var map = L.map('mapid').setView([51.505, -0.09], 13);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
			maxZoom: 18
		}).addTo(map);

		var marker = L.marker([0, 0], {
			draggable: true,
			icon: L.icon({
				iconUrl: './images/marker.png',
				iconSize: [50, 82],
		iconAnchor: [25, 82]

			})
		}).addTo(map);

		var circle = L.circle([0, 0], {
			color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5,
			radius: 10
		}).addTo(map);

		function onMapClick(e) {
			marker.setLatLng(e.latlng);
			circle.setLatLng(e.latlng);

			// Set the value of the longitude input field
			document.getElementById('longitude').value = e.latlng.lng.toFixed(6);

			// Set the value of the latitude input field
			document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
		}

		map.on('click', onMapClick);

		function onLocationFound(e) {
			var radius = e.accuracy / 2;
			circle.setRadius(radius);
			marker.setLatLng(e.latlng);
			circle.setLatLng(e.latlng);
		}

		function onLocationError(e) {
			alert(e.message);
		}

		map.on('locationfound', onLocationFound);
		map.on('locationerror', onLocationError);

		map.locate({setView: true, maxZoom: 16});

</script>








												</div>



											</div> 
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">মোট ফ্লোর</label>
													<div class="col-lg-9">
														<select class="form-control" required name="totalfl">
															<option value="">Select Floor</option>
															<option value="1 Floor">1 Floor</option>
															<option value="2 Floor">2 Floor</option>
															<option value="11 Floor">11 Floor</option>
															<option value="12 Floor">12 Floor</option>
															<option value="13 Floor">13 Floor</option>
															<option value="14 Floor">14 Floor</option>
															<option value="15 Floor">15 Floor</option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">এরিয়া সাইজ</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="asize" required placeholder="Enter Area Size (in sqrt)">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">ঠিকানা</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="loc" required placeholder="Enter Address">
													</div>
												</div>
												
											</div> 
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Important Please Do Not Remove Below Content Only Change <b>Yes</b> Or <b>No</b> or Details and Do Not Add More Details</p>
											
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<!---feature area start--->
												<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Property Age : </span>10 Years</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Swiming Pool : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Parking : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">GYM : </span>Yes</li>
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Type : </span>Apartment</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Security : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Dining Capacity : </span>10 People</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Church/Temple  : </span>No</li>
														
														</ul>
													</div>
													<div class="col-md-4">
														<ul>
														<li class="mb-3"><span class="text-secondary font-weight-bold">3rd Party : </span>No</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Elevator : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">CCTV : </span>Yes</li>
														<li class="mb-3"><span class="text-secondary font-weight-bold">Water Supply : </span>Ground Water / Tank</li>
														</ul>
													</div>
												<!---feature area end---->
											</textarea>
											</div> 
										</div>
			
</body>
</html>