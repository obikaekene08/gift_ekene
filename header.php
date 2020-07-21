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
	
	<!-- For Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="images/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="imagesfavicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
	<link rel="manifest" href="images/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

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

.navbarbg{
	/*background-image: url(images/pattern2.jpg);
	background-repeat: repeat;
	background-size: contain;*/
	background-color:#bb3f3f
}
@media (min-width: 1281px) {
  
  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  
.giftBtn{
  	margin-top:5px;
  }

  .mQVendorCardBody{
	padding-left:5px;
	padding-right:5px;
}

.mQVendorCardBtn{
	padding:6px;
	margin-left:0px;
	margin-right:0px;
}
.mQVendorCardSpan{
	font-size:14px !important;
}

.receiverEditBtn{
  	margin-top:5px;
  }

}

@media (min-width: 1025px) and (max-width: 1200px) {
  
 #searchRnamebtn, #searchRLinkbtn {
 	margin-top:8px;
 }

  #sendmsgresponse{
 	display:inline-block;
 }

}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/
@media (min-width: 768px) and (max-width: 1024px) {
  .mediaQueryOnEntranceBtn{
  	margin-top: 50px;
  }
  #entrancetools{
	left:2%;
	}
.giftBtn{
  	margin-top:5px;
  }

.mQVendorCardBody{
	padding-left:5px;
	padding-right:5px;
}
.mQVendorCardSpan{
	font-size:14px !important;
}

.mQVendorCardBtn{
	padding:5px;
	margin-left:0px;
	margin-right:0px;
}
 .receiverEditBtn{
  	margin-top:5px;
  }
 
  #searchRnamebtn, #searchRLinkbtn {
 	margin-top:8px;
 }

  #sendmsgresponse{
 	display:inline-block;
 }
  
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  .mediaQueryOnEntranceBtn{
  	margin-top: 50px;
  }
  #entrancetools{
	left:2%;
	}

.giftBtn{
  	margin-top:5px;
  }

  .mediaQueryVendorCard{
  	width:100%;
  }

  .receiverEditBtn{
  	margin-top:5px;
  }
  
   #searchRnamebtn, #searchRLinkbtn {
 	margin-top:8px;
 }

  #sendmsgresponse{
 	display:inline-block;
 }
 
  
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
  .mediaQueryOnEntranceBtn{
  	margin-top: 50px;
  }
  #entrancetools{
	left:2%;
	}

#logOutBtn{
	margin-right: 0px;
}

#searchBtn{
	margin-top:5px;
}

.giftBtn{
  	margin-top:5px;
}

.mediaQueryVendorCard{
  	width:100%;
  }

   #searchRnamebtn, #searchRLinkbtn {
 	margin-top:8px;
 }

 #sendmsgresponse{
 	display:inline-block;
 	font-size: 13px;
 	width:90%;
 	margin:auto;
 	padding:4px;
 }
  
  }

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
  
  .mediaQueryOnEntranceBtn{
  	margin-top: 20px;
  }
  #giveAGiftBtn{
  	margin-top: 90px;
  }
  #entrancetools{
	left:2%;
  }
  #searchBtn{
	margin-top:5px;
  }
  .giftBtn{
  	margin-top:5px;
  }

   #searchRnamebtn, #searchRLinkbtn {
 	margin-top:8px;
 }
 
 #sendmsgresponse{
 	display:inline-block;
 	font-size: 13px;
 	width:90%;
 	margin:auto;
 	padding:4px;
 }
  
}

@media (min-width: 100px) and (max-width: 319px) {
  
 #sendmsgresponse{
 	display:inline-block;
 	font-size: 13px;
 	width:90%;
 	margin:auto;
 	padding:4px;
 }
  
}

</style>

	
</head>
<body>
<div class = "container-fluid">
	<div class = "">
	<div class = "row">
		<div class = "col-sm-5 offset-sm-7 col-md-4 offset-md-8 col-8 offset-4 text-center">

			<?php if (!(isset($_SESSION['user']))) { ?>
			<a type="button" href = "signup.php?login=login" class="btn btn-outline-danger btn-in">Log in</a>

			<a class="btn btn-danger mx-2 btn-in" href="signup.php">Sign Up</a>
		<?php }else { ?> <a class="btn btn-danger ml-5 btn-in" href="logout.php" id = "logOutBtn" style = "background-color:red; color:white; border: none">Logout</a> <?php } ?>
		</div>
	</div>
	

	<div class = "row navbarbg" id = "menubar">

		<div class = "col-md-1 col-2" id = "logo"> 

			<a href = "index.php"><img src = "images/logomn.jpg" style = "height: 80px"></a>
			

		</div>

		<div class = "col-md-8 offset-md-4 col-12 navbarbg">
			
			<nav class="navbar navbar-expand-lg navbarbg" id = "navbarparent">
			  <a class="navbar-brand" href="#"></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse " id="navbarNavDropdown">
			    <ul class="navbar-nav ">
			      <li class="nav-item active">
			        <a class="nav-link" href="aboutgiftrunner.php">ABOUT<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="receivegifts.php">CREATE A REGISTRY</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="index.php#testimonial">TESTIMONIALS</a>
			      </li>
			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          VENDORS
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="index.php#merchantsection">See Our Vendors</a>
			          <a class="dropdown-item" href="becomeavendor.php">Become a Vendor</a>
			          <a class="dropdown-item" href="becomeavendor.php?m=signin">Vendor Sign in</a>
			        </div>
			      </li>

			      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          FAQs
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
			          <a class="dropdown-item" href="index.php#fAQsparent">FAQ for Givers</a>
			          <a class="dropdown-item" href="index.php#fAQsparent">FAQ for Receivers</a>
			          <a class="dropdown-item" href="index.php#fAQsparent">FAQ for Vendors</a>
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
</div>