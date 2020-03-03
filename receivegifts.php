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

				
				<div class="alert alert-secondary col-sm-10 offset-sm-1 col-12" role="alert">
  				<h2 style = "text-align:center;">Receive Gifts</h2>
				</div>

				<div class="row m-sm-4 p-sm-4 m-md-0 p-md-0">
				  <div class="col-md-4 offset-md-1 col-12">
				    <div class="list-group" id="list-tab" role="tablist">
				      <a class="list-group-item list-group-item-action <?php if(!isset($_SESSION['loginstatus'])){ echo active;}?> btn btn-primary" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><h3>SIGN UP</h3></a>
				      <a class="list-group-item list-group-item-action btn btn-primary <?php if(isset($_SESSION['loginstatus'])){ echo active;}?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><h3>LOGIN</h3></a>
				      <a class="list-group-item list-group-item-action btn btn-primary" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages"><h4 class = "pl-0">CONTINUE WITHOUT LOGIN</h4></a>
				    </div>
				  </div>
				  <div class="col-md-6 col-12">
				    <div class="tab-content" id="nav-tabContent">
				      <div class="tab-pane fade <?php if(!isset($_SESSION['loginstatus'])){ echo "show active";}?>" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
				      	
				      	<form method="POST" id="formSignup" action='receiversubmitsignup.php'>

				      		<?php if(isset($_SESSION['emailalreadyexists']) && $_SESSION['emailalreadyexists'] == 'emailalreadyexists'){ ?>
				      	<div class="control-group form-group">
				            <div class="controls">
				              <div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <strong>This email already exists!</strong>
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>
				            </div>
				          </div>
				      <?php }

				      	unset($_SESSION['emailalreadyexists']);

				       ?>

				        <div class = "row">
				          <div class="control-group form-group col-md-6 col-12">
				            <div class="controls">
				              <label>First Name:</label>
				              <input type="text" class="form-control" id="fname" name='fname' value = "<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];}else{echo "";}?>" required>
				            </div>
				          </div>
						  <div class="control-group form-group col-md-6 col-12">
				            <div class="controls">
				              <label>Last Name:</label>
				              <input type="text" class="form-control" id="lname" name='lname' value = "<?php if(isset($_SESSION['lname'])){echo $_SESSION['lname'];}else{echo "";}?>" required>
				             
				            </div>
				          </div>
				      	</div>

				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Phone Number:</label>
				              <input type="tel" class="form-control" id="phone" name='phone' value = "<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}else{echo "";}?>" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Email Address:</label>
				              <input type="email" class="form-control" name='email' id="email" value = "<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}else{echo "";}?>" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">				  
				              <label>Password:</label>
				              <div class= "row">
				              <input type="password" class="form-control col-10 ml-3" name='pwd' id="pwd" required>
				              <button type = "button" class = "col-1 pl-2" id = "seepassword"><i class = "fa fa-eye"></i></button>
				              </div>
				            </div>
				          </div>
				          <div class="form-group form-check mt-3">
						    <input type="checkbox" class="form-check-input" id="agreed"  name = "agreed" required>
						    <label class="form-check-label" for="agreed" style = "font-size:13px">By Starting Your Registration, you are agreeing to Gift Runner's <a href="">Terms of Use</a> and <a href="">Privacy Statement</a></label>
						  </div>
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="sendMessageButton">Sign Up</button>
				        </form>
				      </div>
				      <div class="tab-pane fade <?php if(isset($_SESSION['loginstatus'])){ echo "show active";}?>" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
				      	
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
					      <?php }

					      unset($_SESSION['loginstatus']);

					       ?>
				        <div class="control-group form-group">
				            <div class="controls">
				              <label>Email Address:</label>
				              <input type="email" class="form-control" name='email' id="loginEmail" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Password:</label>
				              <input type="password" class="form-control" name='pwd' id="loginPwd" required>
				            </div>
				          </div>
				             
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="sendMessageButton">Login</button>
				        </form>

				      </div>
				      <div class="tab-pane fade pt-4" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
				      	<form method="POST" id="formLogin" action='continuewithoutlogin.php' class= "mt-4">
				        <div class="control-group form-group">
				            <div class="controls">
				              <input type="email" class="form-control" name='email' id="email" placeholder= "Only Enter Your Email Address To Continue" required>
				            </div>
				            <input type="text" class="form-control" name='route' id="route" value = "receivegifts" style = "display: none">
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

	<?php

require('footer.php');

?>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type ="text/javascript">
	

$('#seepassword').click(function(){

	var x = $('#pwd').prop('type');
	

	if(x == 'password'){
		$('#pwd').prop('type','text');
	}else{
		$('#pwd').prop('type','password');
	}

})

</script>

<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>