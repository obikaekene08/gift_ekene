<?php

require("header.php");


?>

	<div class = "row mt-3">
    	<div class = "col-12">
			  <nav aria-label="breadcrumb" class = "">
			  <ol class="breadcrumb alert-primary pl-2 py-2 my-1">
			    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
			  </ol>
			</nav>
		</div>

	</div>




	<div class = "row-12 mt-3">
			<div class = "col-10 offset-1 my-1 card card-body mbline" id = "howto">

				
				<div class="alert alert-secondary col-10 offset-1" role="alert">
  				<h2 style = "text-align:center;">Sign Up Form</h2>
				</div>

				<div class="row m-4 p-4">
				  <div class="col-4 offset-1">
				    <div class="list-group" id="list-tab" role="tablist">
				      <a class="list-group-item list-group-item-action <?php if(!isset($_SESSION['loginstatus'])){ echo active;}?> btn btn-primary" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><h3>SIGN UP</h3></a>
				      <a class="list-group-item list-group-item-action btn btn-primary <?php if(isset($_SESSION['loginstatus'])){ echo active;}?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile"><h3>LOGIN</h3></a>				      
				    </div>
				  </div>
				  <div class="col-6">
				    <div class="tab-content" id="nav-tabContent">
				      <div class="tab-pane fade <?php if(!isset($_SESSION['loginstatus'])){ echo "show active";}?>" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
				      	<form method ="POST" id="form" action='vendorsubmitsignup.php' onsubmit = "prevent(event)">
				        <div class = "row">
				          <div class="control-group form-group col-md-6 col-12">
				            <div class="controls">
				              <label>First Name:</label>
				              <input type="text" class="form-control checkfield" id="checkfield1" name='fname' required>
				            </div>
				          </div>
						  <div class="control-group form-group col-md-6 col-12">
				            <div class="controls">
				              <label>Last Name:</label>
				              <input type="text" class="form-control checkfield" id="checkfield2" name='lname'required>
				             
				            </div>
				          </div>
				      	</div>

				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Phone Number:</label>
				              <input type="tel" class="form-control checkfield" id="checkfield3" name="phone" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Email Address:</label>
				              <input type="email" class="form-control checkfield" name='email' id="checkfield4" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">				  
				              <label>Password:</label>
				              <div class= "row">
				              <input type="password" class="form-control checkfield col-10 ml-3" name='pwd' id="checkfield5" required>
				              <button type = "button" class = "col-1" id = "seepassword"><i class = "fa fa-angle-down"></i></button>
				              </div>
				            </div>
				          </div>
				          <div class="control-group form-group">
				           <label><b>Reason: </b></label>
				           <div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="reason1" name="reason" class="custom-control-input " checked>
							  <label class=" ml-0 pl-0 custom-control-label " for="reason1">Receive Gifts</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="reason2" name="reason" class="custom-control-input">
							  <label class="custom-control-label" for="reason2">Give Gift</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="reason3" name="reason" class="custom-control-input">
							  <label class="custom-control-label" for="reason3">Join as Vendor</label>
							</div>
							</div>
							<div class="form-group form-check mt-3 checkfield" id = "mrcheck">
						    <input type="checkbox" class="form-check-input" id="checkfield6" required>
						    <label class="form-check-label" for="checkfield6" style = "font-size:13px">By Starting Your Registration, you are agreeing to Gift Runner's <a href="">Terms of Use</a> and <a href="">Privacy Statement</a></label>
						  </div>
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="signupbtn">Sign Up</button>
				        </form>
				      </div>
				      <div class="tab-pane fade <?php if(isset($_SESSION['loginstatus'])){ echo "show active";}?>" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
				      	
				      	<form method="POST" id="contactForm" action='vendorsubmitlogin.php'>
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
				              <input type="email" class="form-control" name='email' id="checkfield8" required>
				            </div>
				          </div>
				          <div class="control-group form-group">
				            <div class="controls">
				              <label>Password:</label>
				              <input type="password" class="form-control" name='pwd' id="checkfield9" required>
				            </div>
				          </div>
				             
				          <button type="submit" class="btn btn-primary btn-block btn-lg" id="sendMessageButton">Login</button>
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
			  <p class = "text-center"><button type="submit" class="btn btn-primary btn-lg" >Submit</button></p>
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

<script type ="text/javascript">
	

	// checkfield();
	// function checkfield(){
		$('#signupbtn').click(function prevent(event){
			
			var fname  = $('#checkfield1').val().trim();
			var lname  = $('#checkfield2').val().trim();
			var phone  = $('#checkfield3').val().trim();
			var email  = $('#checkfield4').val().trim();
			var password  = $('#checkfield5').val();
			var term  = $('#checkfield6').prop('checked');

				//term is not working

			if(fname == '' || lname == '' || phone == '' || email == '' || password == '' || reason == '' || term == false){


				event.preventDefault();

				if(fname == ''){
				 	

				 	$('#checkfield1').css('border-color', 'red');

				 }
				 if(lname == ''){
				 	$('#checkfield2').css('border-color', 'red');
				 }
				 if(phone == ''){
				 	$('#checkfield3').css('border-color', 'red');
				 }
				 if(email == ''){
				 	$('#checkfield4').css('border-color', 'red');
				 }
				 if(password == ''){
				 	$('#checkfield5').css('border-color', 'red');
				 }
				 if(term == false){
				 	$('#mrcheck').css({'border-style': 'outset', 'border-color': 'red'});

				 }
				 

			}

		})

		$('.checkfield').change(function(){

			$(this).removeAttr('style', 'border-style : none');

		})
		$('#mrmheck').change(function(){

			$('#mrcheck').removeAttr({'border-style': 'solid', 'border-color': 'red'});

		})

		$('#seepassword').click(function(){

				var x = $('#checkfield5').prop('type');
				

				if(x == 'password'){
					$('#checkfield5').prop('type','text');
				}else{
					$('#checkfield5').prop('type','password');
				}

		})

	
	

	// if(){}


// }

</script>



<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>