<?php

require("header.php");

?>

	<div class = "row" id = "searchbox_view_merchant">
		<div class = "col-10 offset-1 mt-2 mbline" style = "text-align: right;">	

				<a href="gifterprofile.php" class="btn btn-outline-danger mr-3">Receive Gifts</a>
				<button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#terms">View Terms and Conditions</button>
				<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop">Ask a Question</button>

			  	
		</div>

	</div>




	

	<div class = "row mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "">

				<h3 class = "text-center p-3">Select A Recepient or Give a Gift</h3>		
				
				<div class="accordion mb-3" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				    <div class = "row">
				      <h2 class="mb-0 mx-0 col-12 text-center">
				        <button class="btn btn-link text-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
				          <h4>Find A Recepient</h4>
				        </button>
				      </h2>
				  		</div>
				    </div>

				    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card card-body m-4">
				       
						<div class = "row" id = "searchbox">
							<div class = "offset-1 col-11 col-md-8 offset-md-2 mb-3" style = "width:100%; margin:auto;">	
									<form class="form-inline">
								    <input class="form-control mr-2 col-10" type="search" placeholder="Search for Recepient Name" aria-label="Search">
								    <button class="btn btn-outline-danger" type="submit">Search</button>
								    </form>
								    <h5 class = "text-center mt-4">OR</h5>
							</div>
						</div>

						

						<div class = "row" id = "searchbox">
							<div class = "offset-1 col-11 col-md-8 offset-md-2 mb-3" style = "width:100%; margin:auto;">	
									<form class="form-inline">
								    <input class="form-control mr-2 col-10" type="search" placeholder="Search with Recepient ID or Link" aria-label="Search">
								    <button class="btn btn-outline-primary" type="submit">Search</button>
								  	</form>
							</div>
						</div>
						
				      </div>
				    </div>
				  </div>


				  <div class="card">
				    <div class="card-header" id="headingTwo">
				    <div class = "row">
				      <h2 class="mb-0 mx-0 col-12 text-center">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
				          <h4>Search For A Gift</h4>
				        </button>
				      </h2>
				  		</div>
				    </div>

				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class=" card-body m-4">
				       
				       <div class = "row" id = "searchbox">
							<div class = "offset-1 col-11 col-md-8 offset-md-2 mb-3" style = "width:100%; margin:auto;">	
									<form class="form-inline">
								    <input class="form-control mr-2 col-10" type="search" placeholder="Search for Products or Merchant" aria-label="Search">
								    <button class="btn btn-outline-primary" type="submit">Search</button>
								    </form>
								    <h5 class = "text-center mt-4">OR</h5>
							</div>
						</div>
						<hr>

				<div class = "row mx-1">
				<div class = "col-12 card-body">					
					  <h5 class ="mb-0">Select Products By Sort: </h5>
					  <div class="form-group row">
						<div class="col-sm-3">
					    <label for="inputPassword" class=" col-form-label">Choose Price Range: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Prices ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    <div class="col-sm-3">
					    <label for="inputPassword" class=" col-form-label">Choose Item Category: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Categories ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    <div class="col-sm-3">
					    <label for="inputPassword" class=" col-form-label">Choose Merchant: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Merchants ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    <div class="col-sm-3">
					    <label for="inputPassword" class=" col-form-label">Choose Item Brand: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Brands ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					  </div>

					   <div class="col-sm-3 px-0">
					      <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalcreatecollection">Search By Sort</button>
					    </div>

					  
					  </div>
					</div>

						



				      </div>
				    </div>
				  </div>

				</div>


	</div>

</div>



	<!-- Send Message and Footer -->

	<?php

require('footer.php');

?>



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

<!-- Terms and Conditions Modal -->
<div class="modal fade" id="terms" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="" action="" >	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Terms and Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<h5>Generic Terms and Conditions Template</h5>
<p>Please read these terms and conditions ("terms", "terms and conditions") carefully before using [website] website (the "service") operated by [name] ("us", 'we", "our").</p>

<h5>Conditions of Use</h5>

<p>We will provide their services to you, which are subject to the conditions stated below in this document. Every time you visit this website, use its services or make a purchase, you accept the following conditions. This is why we urge you to read them carefully.</p>

<h5>Privacy Policy</h5>

<p>Before you continue using our website we advise you to read our privacy policy [link to privacy policy] regarding our user data collection. It will help you better understand our practices.</p>

<h5>Copyright</h5>

<p>Content published on this website (digital downloads, images, texts, graphics, logos) is the property of [name] and/or its content creators and protected by international copyright laws. The entire compilation of the content found on this website is the exclusive property of [name], with copyright authorship for this compilation by [name].</p>

<h5>Communications</h5>

<p>The entire communication with us is electronic. Every time you send us an email or visit our website, you are going to be communicating with us. You hereby consent to receive communications from us. If you subscribe to the news on our website, you are going to receive regular emails from us. We will continue to communicate with you by posting news and notices on our website and by sending you emails. You also agree that all notices, disclosures, agreements and other communications we provide to you electronically meet the legal requirements that such communications be in writing.</p>

<h5>Applicable Law</h5>

<p>By visiting this website, you agree that the laws of the [your location], without regard to principles of conflict laws, will govern these terms and conditions, or any dispute of any sort that might come between [name] and you, or its business partners and associates.</p>

<h5>Disputes</h5>

<p>Any dispute related in any way to your visit to this website or to products you purchase from us shall be arbitrated by state or federal court [your location] and you consent to exclusive jurisdiction and venue of such courts.</p>

<h5>Comments, Reviews, and Emails</h5>

<p>Visitors may post content as long as it is not obscene, illegal, defamatory, threatening, infringing of intellectual property rights, invasive of privacy or injurious in any other way to third parties. Content has to be free of software viruses, political campaigns, and commercial solicitation.</p>

<p>We reserve all rights (but not the obligation) to remove and/or edit such content. When you post your content, you grant [name] non-exclusive, royalty-free and irrevocable right to use, reproduce, publish, modify such content throughout the world in any media.</p>

<h5>License and Site Access</h5>

<p>We grant you a limited license to access and make personal use of this website. You are not allowed to download or modify it. This may be done only with written consent from us.</p>

<h5>User Account</h5>

<p>If you are an owner of an account on this website, you are solely responsible for maintaining the confidentiality of your private user details (username and password). You are responsible for all activities that occur under your account or password.</p>

<p>We reserve all rights to terminate accounts, edit or remove content and cancel orders in their sole discretion.</p>
        
			
		</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Done</button>
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