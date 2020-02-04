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
	<meta name="keywords" content="gift, wedding gift, registry, receive gifts, collect gifts on wedding day, give a gift">
	<meta name="description" content="Gift Mummy is an Online Platform that enables you easily give or receive gifts from anyone. We have a large collection of possible gifts items and make great suggestions for you too! We package and deliver timely.">
	<meta name="author" content="Ekene Samson Obika">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="www.giftmummy.com">
	<meta name="twitter:title" content="Gift Mummmy">
	<meta name="twitter:description" content="Gift Mummy is an Online Platform that enables you easily give or receive gifts from anyone. We have a large collection of possible gifts items and make great suggestions for you too! We package and deliver timely.">
	<meta name="twitter:creator" content="@ekeneobika">
	<!-- Twitter Summary card images must be at least 120x120px -->
	<meta name="twitter:image" content="images/snippedLogo.png">

	<!-- Open Graph data -->
	<meta property="og:title" content="Gift Mummy" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://www.giftmummy.com/" />
	<meta property="og:image" content="images/snippedLogo.png" />
	<meta property="og:description" content="Gift Mummy is an Online Platform that enables you easily give or receive gifts from anyone. We have a large collection of possible gifts items and make great suggestions for you too! We package and deliver timely." />
	<meta property="og:site_name" content="Gift Mummy" />
	<meta property="fb:admins" content="100009253601860" />

	<title>Gift Mummy</title>
	<link rel="stylesheet" href="css/bootstrap.css" type=text/css>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href = "giftstyle.css" rel = "stylesheet" type = "text/css">
	<link rel="stylesheet" href="fontawesome/css/all.css" type ="text/css">

<style type="text/css">
#navbarparent .nav-link{ color:white;}
#navbarparent .nav-link:hover{
color:grey;

}
.btn-in:hover{
	background-color:grey;
	border: 1px solid grey;
}

#fAQsparent .nav-link{ color:#495057;}

.nav-link-chgcolor b:hover{
color:#745E87;
}

.footerbgcolor{
	background-color:#787878;
}

.footertextcolor,.footertextcolor ul li a{

	color:white;
}

.footertextcolor ul li a:hover{

	color:red;
}
</style>
	
	
</head>
<body>
<div class = "container-fluid">
	
	<div class = "row">
		<div class = "col-md-2 offset-md-10 col-6 offset-7">

			<?php if (!(isset($_SESSION['user']))) { ?>
			<a type="button" href = "vendor_dashboard.php" class="btn btn-outline-danger btn-in" >Log in</a>

			<a class="btn btn-danger mx-2 btn-in" href="signup.php">Sign Up</a>
		<?php }else { ?> <?php } ?>
		</div>
	</div>
	

	<div class = "row" id = "menubar" style = "background-color:#bb3f3f">

		<div class = "col-md-1 col-2" id = "logo">

			<a href = "index.php"><img src = "images/logomn.jpg" style = "height: 80px"></a>
			

		</div>

		<div class = "col-md-8 offset-md-4 col-12" style='background-color:#bb3f3f'>
			
			<nav class="navbar navbar-expand-lg" style='background-color:#bb3f3f' id = "navbarparent">
			  <a class="navbar-brand" href="#"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
			    <ul class="navbar-nav">
			      <li class="nav-item active">
			        <a class="nav-link" href="aboutgiftrunner.php">ABOUT<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="receivegifts.php">CREATE A REGISTRY</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#testimonial">TESTIMONIALS</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          VENDORS
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="index.php #merchantsection">See Our Vendors</a>
			          <a class="dropdown-item" href="becomeavendor.php">Become a Vendor</a>
			          <a class="dropdown-item" href="becomeavendor.php?m=signin">Vendor Sign in</a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          FAQs
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="index.php #fAQsparent">FAQ for Givers</a>
			          <a class="dropdown-item" href="index.php #fAQsparent">FAQ for Receivers</a>
			          <a class="dropdown-item" href="index.php #fAQsparent">FAQ for Vendors</a>
			        </div>
			      </li>

			      <li class="nav-item">
			        <a class="nav-link" href="contactgiftrunner.php">CONTACT</a>
			      </li>

			    </ul>
			  </div>
			</nav>

		</div>

	</div>
