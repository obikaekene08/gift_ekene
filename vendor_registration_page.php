<?php

require("header.php");



?>

	<div class = "row" id = "searchbox_view_merchant">
		<div class = "col-10 offset-1 mt-2 mbline" style = "text-align: right;">	

				<button type="button" class="btn btn-outline-danger mr-3">Home Page</button>
				<button type="button" class="btn btn-danger mr-3">View Terms and Conditions</button>
				<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#staticBackdrop">Ask a Question</button>

			  	
		</div>

	</div>




	

	<div class = "row mt-3">
			<div class = "col-10 offset-1 my-1 card mbline" id = "">

				<h4 style = "text-align: center">Merchant Registration Page</h4>


				<div class="alert alert-info" role="alert">
				  <p>If you have <b>started</b> your Registration as a <b>merchant</b>, please check your email for a link that allows you continue with your form. <a href="#" class="alert-link">Click Here</a> if you want the link to be resent to your email.</p>
				  <p>If you have <b>completed</b> your Registration as a <b>merchant. </b><a href="#" class="alert-link">Click Here</a> to sign in.</p>
				</div>

				<p>
				<button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
				    <u>See What is Required For Registration</u>
				</button>
				</p>
				<div class="collapse" id="collapseExample5">
				  <div class="card card-body">

				    <ul class="list-group list-group-flush">
					  <li class="list-group-item">1. Contact Details</li>
					  <li class="list-group-item">2. Company Information</li>
					  <li class="list-group-item">3. Bank Information</li>
					  <li class="list-group-item">4. 6 Months Account Statement</li>
					</ul>

					</div>
				</div>

				






				<div class="accordion mb-3" id="accordionExample">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				    <div class = "row">
				      <h2 class="mb-0 mx-0 col-6">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
				          <h5 class = "accordstyle">1. Get Started - Contact Details</h5>
				        </button>
				      </h2>
				      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-angle-right"></i></p>
				  		</div>
				    </div>

				    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body mx-2 ml-4">
				       
						<form method = "" action = "">
						<div>
							<h5 class = "form-group row">Details of Authorized Contact Person</h5>
						</div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>

						    <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						 </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Brand Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Email Address</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						  
						  					  
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" class="form-control" id="inputPassword">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Office Address</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>	
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="form-check-label" for="exampleCheck1">By Starting Your Registration, you are agreeing to Gift Runner's <a href="">Terms of Use</a> and <a href="">Privacy Statement</a></label>
						  </div>
						  <p align="right"><button type="submit" class="btn btn-success btn-lg">Start Registration</button></p>
						</form>
						
				      </div>
				    </div>
				  </div>


				  <div class="card">
				    <div class="card-header" id="headingTwo">
				    <div class = "row">
				      <h2 class="mb-0 mx-0 col-6">
				        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
				          <h5 class = "accordstyle">2. Business Information</h5>
				        </button>
				      </h2>
				      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-angle-right"></i></p>
				  		</div>
				    </div>

				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <div class="card-body mx-2 ml-4">
				       
						<form method = "" action = "">
						<div>
							<h5 class = "form-group row">Company Details</h5>
						</div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Business Legal Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Director's Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Business Email</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Business Type</label>
						    <div class="col-sm-10">
						      <select class="form-control" id="">
						      	<option value="">Select Business Type</option>
						      	<option value="">Business Name</option>
						      	<option value="">Limited Liability Company</option>
						      	<option value="">Public Liability Company</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Business Reg. Number</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>
						  <p align="right"><button type="submit" class="btn btn-success btn-lg">Save Details</button></p>
						</form>



				      </div>
				    </div>
				  </div>



				  <div class="card">
				    <div class="card-header" id="headingThree">
				    <div class = "row">
				      <h2 class="mb-0 mx-0 col-6">
				        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" >
				          <h5 class = "accordstyle">3. Bank Information</h5>
				        </button>
				      </h2>
				      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-angle-right"></i></p>
				  		</div>
				    </div>

				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <div class="card-body mx-2 ml-4">
				       
						<form method = "" action = "" enctype="multipart/form-data">
						<div>
							<h5 class = "form-group row">Business Bank Details</h5>
						</div>
						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Bank Name<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <select class="form-control" id="">
						      	<option value="">Select Bank Name</option>
						      	<option value="">Access Bank</option>
						      	<option value="">First Bank</option>
						      	<option value="">Fidelity Bank</option>
						      </select>
						    </div>
						  </div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Account Number<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						</div>

						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Account Name<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>

						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">BVN Number<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						 </div>

						 <div class="form-group row">
						    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Upload Bank Statement<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						    <input type="file" class="form-control-file" id="exampleFormControlFile1">
							</div>
						 </div>

						 <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">IBAN</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						 </div>

						 <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">SWIFT</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						 </div>

						

						  <p align="right"><button type="submit" class="btn btn-success btn-lg">Save Details</button></p>
						</form>



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


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>


<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>