<?php

require("header.php");


?>

	<div class = "row mt-3">
    	<div class = "col-12">
			  <nav aria-label="breadcrumb" class = "">
			  <ol class="breadcrumb alert-primary pl-2 py-2 my-1">
			    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Receive Gifts</li>
			  </ol>
			</nav>
		</div>

	</div>




	<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card card-body mbline" id = "howto">

				
				<div class="alert alert-secondary col-10 offset-1" role="alert">
  				<h2 style = "text-align:center;">Receive Gifts</h2>
				</div>

				<div class="row m-4 p-4">
				  <div class="col-4 offset-1">
				    <div class="list-group" id="list-tab" role="tablist">
				      <a class="list-group-item list-group-item-action <?php if(!isset($_SESSION['loginstatus'])){ echo active;}?> btn btn-primary" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><h3>SIGN UP</h3></a>
				      <a class="list-group-item list-group-item-action active btn btn-primary <?php if(isset($_SESSION['loginstatus'])){ echo active;}?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><h3>LOGIN</h3></a>
				      <a class="list-group-item list-group-item-action btn btn-primary" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><h4 class = "pl-0">CONTINUE WITHOUT LOGIN</h4></a>
				    </div>
				  </div>
				  <div class="col-6">
				    <div class="tab-content" id="nav-tabContent">
				      <div class="tab-pane fade <?php if(!isset($_SESSION['loginstatus'])){ echo "show active";}?>" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
				      	<form method="POST" id="formSignup" action='receiversubmitsignup.php'>
				        <div class = "row">
				          <div class="control-group form-group col-md-6 col-12">
				            <div class="controls">
				              <label>First Name:</label>
				              <input type="text" class="form-control" id="name" name='fname' required>
				            </div>
				          </div>
						  <div class="control-group form-group col-md-6 col-12">
				            <div class="controls">
				              <label>Last Name:</label>
				              <input type="text" class="form-control" id="name" name='lname' required>
				             
				            </div>
				          </div>
				      	</div>

				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Phone Number:</label>
				              <input type="tel" class="form-control" id="phone" name='phone' required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Email Address:</label>
				              <input type="email" class="form-control" name='email' id="email" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Password:</label>
				              <input type="password" class="form-control" name='pwd' id="pwd" required>
				            </div>
				          </div>
				          <div class="form-group form-check mt-3">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1"  name = "agreed" required>
						    <label class="form-check-label" for="exampleCheck1" style = "font-size:13px">By Starting Your Registration, you are agreeing to Gift Runner's <a href="">Terms of Use</a> and <a href="">Privacy Statement</a></label>
						  </div>
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="sendMessageButton">Sign Up</button>
				        </form>
				      </div>
				      <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
				      	
				      	<form method="POST" id="formLogin" action='receiversubmitlogin.php'>
				      		<?php if(isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == 'failed'){ ?>
				      	<div class="control-group form-group">
				            <div class="controls">
				              <div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>Incorrect Username or password! </strong>Please try again.
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
				            </div>
				          </div>
				      <?php } ?>
				        <div class="control-group form-group">
				            <div class="controls">
				              <label>Email Address:</label>
				              <input type="email" class="form-control" name='email' id="email" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Password:</label>
				              <input type="password" class="form-control" name='pwd' id="pwd" required>
				            </div>
				          </div>
				             
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="sendMessageButton">Login</button>
				        </form>

				      </div>
				      <div class="tab-pane fade pt-4" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
				      	<form method="POST" id="formLogin" action='receiverprofile.php' class= "mt-4">
				        <div class="control-group form-group">
				            <div class="controls">
				              <input type="email" class="form-control" name='email' id="email" placeholder= "Only Enter Your Email Address To Continue" required>
				            </div>
				          </div>			             
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="sendMessageButton">Continue</button>
				        </form>
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


	
</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>


<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>