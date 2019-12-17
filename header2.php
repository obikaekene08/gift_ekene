<?php


if(!isset($_SESSION['user'])){

	require("Vendor.php");

	$r = new Vendor;

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

	<title>Home Page</title>
	<link rel="stylesheet" href="css/bootstrap.css" type=text/css>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href = "giftstyle.css" rel = "stylesheet" type = "text/css">
	<link rel="stylesheet" href="fontawesome/css/all.css" type ="text/css">
	
	
	
</head>
<body>
<div class = "container-fluid">
	
	<div class = "row">
		<div class = "col-md-2 offset-md-10 col-6 offset-7">

			<?php if (!(isset($_SESSION['user']))) { ?>
			<a type="button" href = "vendor_dashboard.html" class="btn btn-outline-danger" style = "border:1px solid red; color:red">Log in</a>

			<button class="btn btn-danger mx-2" type="submit" style = "background-color:red; color:white; border: none">Sign Up</button>
		<?php }else { ?> <?php } ?>
		</div>
	</div>
	

	<div class = "row" id = "menubar" style = "border:1px solid red; border-left:none; border-right:none">

		<div class = "col-md-1 col-2" id = "logo">

			<a href = "index.html"><img src = "images/logomn.jpg" style = "height: 80px"></a>
			

		</div>

		<div class = "col-md-8 offset-md-4 col-12">
			
			<nav class="navbar navbar-expand-lg" style = "background-color: white">
			  <a class="navbar-brand" href="#"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="#">CREATE A REGISTRY<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">ABOUT</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#testimonial">TESTIMONIALS</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          VENDORS
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="#">See Our Vendors</a>
			          <a class="dropdown-item" href="#">Become a Vendor</a>
			          <a class="dropdown-item" href="#">Vendor Sign in</a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          FAQs
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="#">FAQ for Givers</a>
			          <a class="dropdown-item" href="#">FAQ for Receivers</a>
			          <a class="dropdown-item" href="#">FAQ for Vendors</a>
			        </div>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" href="#">CONTACT</a>
			      </li>

			    </ul>
			  </div>
			</nav>

		</div>

	</div>
