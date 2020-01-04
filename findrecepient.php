<?php

require('header.php');

?>

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


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>


<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>