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
<div class = "containerfluid">
	<div class = "row-12">
		<div class = "col-md-2 offset-md-10 col-6 offset-7">

			<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdroplogin">Log in</button>

			<a href="signup.php" class="btn btn-danger mx-2" type="submit">Sign Up</a>

		</div>
	</div>

	<div class = "row-12" id = "menubar" style = "border:1px solid red; border-left:none; border-right:none">

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
			          <a class="dropdown-item" href="#merchantsection">See Our Vendors</a>
			          <a class="dropdown-item" href="vendor_info_page.html">Become a Vendor</a>
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


	<div class = "row-12" id = "searchbox">
		<div class = "offset-1 col-11 col-md-8 offset-md-2 my-3" style = "width:100%; margin:auto;">	
				<form class="form-inline">
			    <input class="form-control mr-2 col-10" type="search" placeholder="Search for products and couples" aria-label="Search">
			    <button class="btn btn-outline-danger" type="submit">Search</button>
			  	</form>
		</div>

	</div>

	<div class = "row-12" >
		<div class = "col-10 offset-1 " id = "entrancehome">

		
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			  <div class="carousel-inner ">
			    <div class="carousel-item active">
			    	<div class = "carouseltext">
			    	<p style = "font-size:2rem; margin-bottom:0px; padding-bottom:0px"><strong>Do You Have a Special Wedding Coming Up?</strong></p>
			    	<p style = "font-size:1.5rem; color: white;">Let's Help You Receive Wedding Gifts Easily</p>
			    	</div>
			    	<img src = "images/wed.jpg" class="d-block w-100" alt="..." style = "height : 500px; border-radius:10px">
			    </div>



			    <div class="carousel-item">
			    	<div class = "carouseltext">
			    	<p style = "font-size:2rem; margin-bottom:0px; padding-bottom:0px"><strong>Are You Celebrating Your Child Dedication?</strong></p>
			    	<p style = "font-size:1.5rem; color: grey;">We Help You Receive Your Gifts For Child Dedication</p>
			    	</div>
			    	<img src = "images/baby2.jpg" class="d-block w-100" alt="..." style = "height : 500px; border-radius:10px">
			    </div>


			    <div class="carousel-item">
			    	<div class = "carouseltext">
			    	<p style = "font-size:2rem; margin-bottom:0px; padding-bottom:0px"><strong>Do you want to organize a Baby Shower?</strong></p>
			    	<p style = "font-size:1.5rem; color: grey;">Let's Help You Receive Your Gifts Easily</p>
			    	</div>
			    	<img src = "images/preg.jpeg" class="d-block w-100" alt="..." style = "height : 500px; border-radius:10px">
			    </div>


			    <div class="carousel-item">
			    	<div class = "carouseltext">
			    	<p style = "font-size:2rem; margin-bottom:0px; padding-bottom:0px"><strong>For a Gift to Your Special and Loved Ones</strong></p>
			    	<p style = "font-size:1.5rem; color: grey;">Select From Our Awesome Gifts Options</p>
			    	</div>
			    	<img src = "images/read3.jpg" class="d-block w-100" alt="..." style = "height : 500px; border-radius:10px">
			    </div>

			  </div>
			  
			  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

			<div class = "col" id = "entrancetools">

			<a href="giveagift.php" class="btn btn-danger btn-lg mr-4 mb-2">Give a Gift</a>
			<a href="receivegifts.php" class="btn btn-outline-danger btn-lg mb-2">Receive Gifts</a>
			
		</div>


		</div>

		

	</div>

	<!-- <div style = "border-left: 2px yellow solid; width: 20%; line-height: : 5px"></div> -->	

	<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "howto">

				<h4 class = "bstyle">How To Use Gift Runner</h4>
				<div class = "card mb-2">
				<div class="row mt-3">
				  <div class="col-md-2 offset-md-1">
				    <div class="card" style = "border: none">
				      <div class="card-body" style = "padding-left:0px; padding-right:0px; border: none">
				      <div class = "mt-4 bline" style = " margin: auto; border: none">
				      	<div class = "boxes" style = "border-radius: 0">
						<p class = "number">1</p>
						</div>
						
				      </div>
				      <h5 class="card-title text-center mt-2">Add Wedding Gifts</h5>
				        <p class="card-text text-center">Register for anything! Plates, airline gift cards, cash—we have the lowest cash fund fee.</p>
				        
				      </div>
				    </div>
				  </div>

				  <div class="col-md-2">
				    <div class="card" style = "border: none">
				      <div class="card-body" style = "padding-left:0px; padding-right:0px; border: none">
				      <div class = "mt-4 bline" style = " margin: auto; border: none">
				      	<div class = "boxes" style = "border: none">
						<hr class = "hrline">
						</div>
						</div>
				    </div>
				    </div>
				  </div>

				 <div class="col-md-2">
				    <div class="card" style = "border: none">
				      <div class="card-body" style = "padding-left:0px; padding-right:0px; border: none">
				      <div class = "mt-4 bline" style = " margin: auto; border: none">
				      	<div class = "boxes" style = "border-radius: 0">
						<p class = "number">2</p>
						</div>
						
				      </div>
				      <h5 class="card-title text-center mt-2">Guests Buy You Gifts</h5>
				        <p class="card-text text-center">Receive them stress-free and choose when they ship. You can exchange any before they ship, too.</p>
				        
				      </div>
				    </div>
				  </div>

				  <div class="col-md-2">
				    <div class="card" style = "border: none">
				      <div class="card-body" style = "padding-left:0px; padding-right:0px; border: none">
				      <div class = "mt-4 bline" style = " margin: auto; border: none">
				      	<div class = "boxes" style = "border: none">
						<hr class = "hrline">
						</div>
						</div>
				    </div>
				    </div>
				  </div>

				  <div class="col-md-2">
				    <div class="card" style = "border: none">
				      <div class="card-body" style = "padding-left:0px; padding-right:0px; border: none">
				      <div class = "mt-4 bline" style = " margin: auto; border: none">
				      	<div class = "boxes" style = "border-radius: 0">
						<p class = "number">3</p>
						</div>
						
				      </div>
				      <h5 class="card-title text-center mt-2">Enjoy Newlywed Life</h5>
				        <p class="card-text text-center">Use your gifts, spend your cash, and don’t forget about your 20% post-wedding discount.</p>
				        
				      </div>
				    </div>
				  </div>

			</div>
		</div>

				<div class = "row pb-2" >
					<div class = "col text-center" id = "videobtn">
						<button class="btn btn-primary btn-lg" type="button">WATCH DEMO</button>
					</div>
				</div>
				<div class = "row">
					<div class = "col" id = "video">

					</div>
				</div>
		</div>
	</div>

		

	<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "testimonial">

				<h4 class = "bstyle">See Our Testimonials</h4>

				<div class="row my-3">
				  <div class="col-sm-4">
				    <div class="card">
				      <div class="card-body">
				      <div style = "height : 250px; margin: auto; ">
				      	<img src = "images/first.png" style = "height:100%; width:100%">
				      </div>
				        <h5 class="card-title text-center">CAROLYN & NAT</h5>
				        <p class="card-text text-center">"LOVED having our gifts and cash funds on one page. Our moms were legit jealous of our gifts, too."</p>
				      </div>
				    </div>
				  </div>


				  <div class="col-sm-4">
				    <div class="card">
				      <div class="card-body">
				      <div style = "height : 250px; margin: auto; ">
				      	<img src = "images/second.png" style = "height:100%; width:100%">
				      </div>
				        <h5 class="card-title text-center">MAUREEN & OSA</h5>
				        <p class="card-text text-center">"The best customer service on the planet. Price-matched my nephew’s plates on the spot."</p>
				      </div>
				    </div>
				  </div>


				   <div class="col-sm-4">
				    <div class="card">
				      <div class="card-body">
				      <div style = "height : 250px; margin: auto; ">
				      	<img src = "images/third.png" style = "height:100%; width:100%">
				      </div>
				        <h5 class="card-title text-center">MISSY & KENYETTA</h5>
				        <p class="card-text text-center">"Lives up to the hype! And can’t recommend the app enough–super easy and super fun."</p>
				      </div>
				    </div>
				  </div>
				  

				</div>



			</div>

		</div>



		<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "merchantsection">

				<h4 class = "bstyle">Meet Our Vendors</h4>

				<div class="card-group">
				  <div class="card mx-2 mt-2">
				    <img src="images/game.png" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Game</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/spar.png" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Spar</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/samsung.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Samsung</h5>
				    </div>
				  </div>
				</div>


				<div class="card-group">
				  <div class="card mx-2 mt-2">
				    <img src="images/jumia.png" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Jumia</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/babyshop.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">BabyShop</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/extra.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Standard</h5>
				    </div>
				  </div>
				</div>

			<div class = "row py-2 " >
					<div class = "col text-center">
						<a href = "view_merchants.html" class="btn btn-primary btn-lg">See More Merchants <i class = "fa fa-angle-right"></i></a>
					</div>
			</div>

			</div>

		</div>


		<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "">

				<h4 class = "bstyle">Some Frequently Asked Questions - FAQs</h4>

				<div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				           FAQs For Vendors
				        </button>
				      </h2>
				    </div>

				    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          FAQs For Giving Gifts
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          FAQs For Receiving Gifts
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body">
				        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				      </div>
				    </div>
				  </div>
				</div>


				<div class = "row py-2" >
					<div class = "col text-center" id = "videobtn">
						<button class="btn btn-success btn-lg" type="submit">See More FAQs<br><i class = "fa fa-angle-down"></i></button>
					</div>
				</div>
				<div class = "row">
					<div class = "col" id = "video">

					</div>
				</div>


			</div>

		</div>



				<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "">

				<h4 class = "bstyle">Some Really Helpful Blogs on Gifts</h4>

				
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				  <div class="carousel-inner">

				    </div>
				    <div class="carousel-item active">
				      

				    	<div class="card-group">
						  <div class="card mx-2 mt-2">
						    <img src="images/baby.jpg" class="card-img-top" alt="...">
						    <div class="card-body">
						      <h5 class="card-title">Wedding - Featured</h5>
						      <p class="card-text">Best Wedding Gift Collections</p>
						      <p class="card-text"><small class="text-muted">Last updated 20 mins ago</small></p>
						    </div>
						  </div>
						  <div class="card mx-2 mt-2">
						    <img src="images/baby.jpg" class="card-img-top" alt="...">
						    <div class="card-body">
						      <h5 class="card-title">Wedding - Featured</h5>
						      <p class="card-text">How to Best Plan Your Wedding</p>
						      <p class="card-text"><small class="text-muted">Last updated 2 days ago</small></p>
						    </div>
						  </div>
						  <div class="card mx-2 mt-2">
						    <img src="images/baby.jpg" class="card-img-top" alt="...">
						    <div class="card-body">
						      <h5 class="card-title">Child Dedication</h5>
						      <p class="card-text">Celebrating Your Child Dedication without Stress</p>
						      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						    </div>
						  </div>
						</div>


				    </div>
				    <div class="carousel-item">
				      

				    	<div class="card-group">
						  <div class="card mx-2 mt-2">
						    <img src="images/baby.jpg" class="card-img-top" alt="...">
						    <div class="card-body">
						      <h5 class="card-title">Wedding - Articles</h5>
						      <p class="card-text">Top Ten Gift Ideas for a Loved One's Wedding.</p>
						      <p class="card-text"><small class="text-muted">Last updated 5 mins ago</small></p>
						    </div>
						  </div>
						  <div class="card mx-2 mt-2">
						    <img src="images/baby.jpg" class="card-img-top" alt="...">
						    <div class="card-body">
						      <h5 class="card-title">Naming Ceremony - Featured</h5>
						      <p class="card-text">50 Best Names Ideas for Your Children.</p>
						      <p class="card-text"><small class="text-muted">Last updated 2 weeks ago</small></p>
						    </div>
						  </div>
						  <div class="card mx-2 mt-2">
						    <img src="images/baby.jpg" class="card-img-top" alt="...">
						    <div class="card-body">
						      <h5 class="card-title">Baby Shower - Featured</h5>
						      <p class="card-text">3 Easy Steps to Doing Your Baby Shower</p>
						      <p class="card-text"><small class="text-muted">Last updated 5 months ago</small></p>
						    </div>
						  </div>
						</div>


				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>


			</div>

		</div>

	<!-- Send Message and Footer -->

	<div class = "row-12 mt-3">
		<div class = "col bline">

	<div class = "row-12 mt-3">
		<div class = "col-7 offset-2">
			<h4 class = "text-center mt-0 pt-0">Send Us a Message</h4>
			<form>
			<div class = "row">
			  <div class="form-group col-md-6 col-12">
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
			    </div>
			  <div class="form-group col-md-6 col-12">
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Email">
			  </div>
			</div>

			  <div class="form-group">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder = "Write Your Message Here"></textarea>
			  </div>

			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1"><small id="emailHelp" class="form-text text-muted">Get updated on Interesting Offers and NewsLetter.</small></label>
			  </div>
			  <p class = "text-center"><button type="submit" class="btn btn-primary btn-lg">Submit</button></p>
			</form>


		</div>
	</div>

	<hr class = "footerline mt-3">
<div class = "row-12">
	<div class = "col">
	<div class = "row">
		<div class = "col-md-2 mx-2">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">Cras justo odio</li>
			  <li class="list-group-item">Dapibus ac facilisis in</li>
			  <li class="list-group-item">Morbi leo risus</li>
			  <li class="list-group-item">Porta ac consectetur ac</li>
			  <li class="list-group-item">Vestibulum at eros</li>
			</ul>


		</div>

		<div class = "col-md-2 mr-2">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">Cras justo odio</li>
			  <li class="list-group-item">Dapibus ac facilisis in</li>
			  <li class="list-group-item">Morbi leo risus</li>
			  <li class="list-group-item">Porta ac consectetur ac</li>
			  <li class="list-group-item">Vestibulum at eros</li>
			</ul>


		</div>

		<div class = "col-md-2 mr-2">
			
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">Cras justo odio</li>
			  <li class="list-group-item">Dapibus ac facilisis in</li>
			  <li class="list-group-item">Morbi leo risus</li>
			  <li class="list-group-item">Porta ac consectetur ac</li>
			  <li class="list-group-item">Vestibulum at eros</li>
			</ul>

		</div>

		<div class = "col-md-2 offset-1">
			
			<ul class="list-group list-group-flush">
			  <li class="list-group-item">Cras justo odio</li>
			  <li class="list-group-item">Dapibus ac facilisis in</li>
			  <li class="list-group-item">Morbi leo risus</li>
			  <li class="list-group-item">Porta ac consectetur ac</li>
			  <li class="list-group-item">Vestibulum at eros</li>
			</ul>

		</div>
		</div>
	</div>
</div>

<hr class = "footerline mt-3" style = "width: 80%">

<div class = "row">
		<div class = "col">
			<p style = "text-align: center">Copyright &copy; 2019 M Technology Ltd. All Rights Reserved.</p>


		</div>
	</div>


	</div>
</div>

</div>
	

<!-- Modal Login-->
<div class="modal fade" id="staticBackdroplogin" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel"></h5> -->
        <div class="alert alert-secondary modal-title col-12" role="alert">
  				<h5 style = "text-align:center;">Login</h5>
		</div>
        <button type="button" class="close ml--2 pl-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name="POST" id="contactForm" action='submitlogin.php'>
      <div class="modal-body">
        
      	
        <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name='email' id="email" required>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Password:</label>
              <input type="email" class="form-control" name='email' id="email" required>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Login</button>
      </div>
       </form>
    </div>
  </div>
</div>
	






<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">


</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>