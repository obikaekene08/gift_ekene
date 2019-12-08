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

			<a type="button" href = "vendor_dashboard.html" class="btn btn-outline-danger" style = "border:1px solid red; color:red">Log in</a>

			<button class="btn btn-danger mx-2" type="submit" style = "background-color:red; color:white; border: none">Sign Up</button>

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

	</div>

	<div class = "row-12" id = "searchbox_view_merchant">
		<div class = "col-10 offset-1 mt-2 mbline" style = "text-align: right;">	

				<button type="button" class="btn btn-outline-danger mr-3">Receive Gifts</button>
				<button type="button" class="btn btn-danger mr-3">View Terms and Conditions</button>
				<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop">Ask a Question</button>

			  	
		</div>

	</div>




	

	<div class = "row-12 mt-3">
			 <div class="col-10 offset-1 mb-4">
       

		<div class = "row mx-1">
			<div class = "col-12 card card-body pt-1 pb-0 mb-0">
				  <h2 class ="pb-0 text-center">Event Title/Name: </h2>
				  <h4 class ="mb-2 text-center">By Event People's Name</h4>
				  <div class = "text-center">
				  <img src="images/jumia.png" class="card-img-top" style = "height: 300px" alt="...">
				</div>
				<div class = "mt-2" style = "display:flex; flex-wrap: nowrap;">
					<h6 class = "text-center" style = " width: 50%">Due Date: October 22, 2020</h6>
					<h6 class = "text-center" style = "width: 50%">Event Date: October 22, 2020</h6>
				</div>
				

				<h5 class ="text-center">Beautiful Message From Couple: </h5>
				<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>				
			  
			  </div>
			</div>

		


			<div class = "row mt-2 mx-1">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">See Items Chosen By The Couple: </h4>
					<div class = "row">
						<div class = "col-md-3 col-6">
							<div class="card text-center">
							  <div class="card-body">
							  	<img src="images/jumia.png" class="card-img-top" alt="...">
							    <h5 class="card-title mt-2">Item Name</h5>
							    <p class="card-text"><b>Unit Price:</b> N500</p>
							    <p class="card-text"><b>Quantity:</b> 10</p>
							    <a href="#staticBackdropAddItem" class="btn btn-primary" data-toggle="modal">Buy Item</a>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			


      </div>

</div>



	<!-- Send Message and Footer -->

	<div class = "row-12 mt-3">
		<div class = "col bline">

	<div class = "row-12 mt-3">
		<div class = "col-7 offset-2">
			<h4 class = "text-center">Send Us a Message</h4>
			<form>
			<div class = "row">
			  <div class="form-group col">
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
			    </div>
			  <div class="form-group col">
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Email">
			  </div>
			</div>

			  <div class="form-group">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder = "Write Your Message Here"></textarea>
			  </div>

			  <div class="form-group form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1"><small id="emailHelp" class="form-text text-muted">Get Updates on Our Interesting Offers and NewsLetter.</small></label>
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



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="" action="" >	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ask Us A Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
			<div class = "row">
			  <div class="form-group col">
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
			    </div>
			  <div class="form-group col">
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Email">
			  </div>
			</div>

			  <div class="form-group">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder = "Ask Your Question Here"></textarea>
			  </div>
			<p>You can Call or Send an Email :</p>
			<p>Phone: +2347065692733</p>
			<p>Email: info@giftrunner.com</p>
		</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>


<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>