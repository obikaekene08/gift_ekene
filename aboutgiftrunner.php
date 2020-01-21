<?php

require('header.php');

?>

	<div class = "row-12" id = "searchbox_view_merchant">
		<div class = "offset-1 col-11 col-md-10 offset-md-1 my-3" style = "width:100%;">	
				<form class="form-inline ">
			    <input class="form-control mr-2 col-6" type="search" placeholder="Search for products and couples" aria-label="Search">
			    <button class="btn btn-outline-danger" type="submit">Search</button>

				<a href="index.php" class="btn btn-danger mr-2 offset-1">Home Page</a>
				<a href="giveagift.php" class="btn btn-outline-danger mr-2">Give a Gift</a>
				<a href="receivegifts.php" class="btn btn-outline-danger">Receive Gifts</a>

			  	</form>
		</div>

	</div>




	<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "howto">

				<h2 style = "text-align:center; word-spacing: 7px " class = "bstyle mb-3">About Gift Runner</h2>

				<div class="row ">
				 

				  <div class="col-md-12 mb-3">
				  	<h5 style = "color:#0BB2F0">I want to give a gift:</h5>
				  	<p style = "color: #434343"><b>Gift Runner</b> is an Online Platform that enables you give gifts easily to anyone. We have a large collection of possible gifts items from great stores from which you can choose, we make great suggestions for you too!
				  	We deliver your gifts fantastically packaged and timely so the receiver is really happy with you.</p>

				  	<h5 style = "color:#0BB2F0">I want to accept gifts:</h5>
				  	<p style = "color: #434343"><b>Gift Runner</b> also allows persons who have events to collect gifts easily from their gifters without stress. We save your gifters the stress of thinking of a gift you would want, instead we let you pre-select wanted gift items and your gifters pay for them.
				  	We make the process seamless from your selection of gifts to receiving the gifts given to you by your gifters</p>

				  	<h5 style = "color:#0BB2F0">I want to do other things:</h5>
				  	<p style = "color: #434343"><b>Gift Runner</b> is also provides other services like enrolling of vendors (with great collections), use of coupons, and gift cards, and charity collections etc</p>
				    
				  </div>

			</div>

				
				
		</div>
	</div>




	


	<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "">

				<h4 style = "text-align: center;">Some FAQs - Frequently Asked Questions</h4>

				<div class="accordion" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          How Does Gift Runner Work?
				        </button>
				      </h2>
				    </div>

				    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body">
				        Gift Runner makes it easy for you to give gifts. We show you large collection of possible gifts to choose from with great suggestions. After you have chosen gifts and made payment. We wrap the gift fantastically and deliver the gift to your desired recepient.
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          How can I Become a Vendor?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body">
				        To become a Vendor with Gift Runner, all you need is to sign up swiftly with us. Click <a href = "becomeavendor.php">here</a> to sign up. Very easy!
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          How Can I Give a Gift?
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body">
				        You can sign up easily to give a gift very swiftly. It is a seamless process and we will guide you throughout.
				      </div>
				    </div>
				  </div>
				</div>









		


		

	<!-- Send Message and Footer -->

	<?php

require('footer.php');

?>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>


<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>