<?php

require("header.php");


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
			<div class = "col-10 offset-1 my-1 card mbline" id = "merchantsection">


				<h4 style="text-align: center; ">Welcome to Our Merchants Page</h4>

			<div class = "row-12" id = "searchbox">
				<div class = "offset-1 col-11 col-md-8 offset-md-2 my-3" style = "width:100%; margin:auto;">	
						<form class="form-inline">
					    <input class="form-control mr-2 col-10" type="search" placeholder="Search for Merchants and Products" aria-label="Search">
					    <button class="btn btn-outline-danger" type="submit">Search</button>
					  	</form>
				</div>
			</div>

				<div class="card-group">
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">ShopRite</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Spar</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Konga</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Slot</h5>
				    </div>
				  </div>
				</div>


				<div class="card-group">
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Jumia</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">PayPorte</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Amazon</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Techno</h5>
				    </div>
				  </div>
				</div>

				<div class="card-group moremerchant">
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Jumia 2</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">PayPorte 2</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Amazon 2</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Techno 2</h5>
				    </div>
				  </div>
				</div>

				<div class="card-group moremerchant">
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Jumia 2</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">PayPorte 2</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Amazon 2</h5>
				    </div>
				  </div>
				  <div class="card mx-2 mt-2">
				    <img src="images/baby.jpg" class="card-img-top" alt="...">
				    <div class="card-footer">
				      <h5 class="card-title text-center">Techno 2</h5>
				    </div>
				  </div>
				</div>

			<div class = "row py-2 " >
					<div class = "col text-center">
						<button  class="btn btn-primary btn-lg" type = "button" id = "seemerchant">See More Merchants<br><i class = "fa fa-angle-down"></i></button>
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