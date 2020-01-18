<?php

require("Vendor.php");

$v = new Vendor;
if(!isset($_SESSION['user'])){

	header("location:signup.php");

}

require("header.php");
$details = $v->getdetails($_SESSION['user'], 'vendors');



$fname = $details['v_fname'];
$lname = $details['v_lname'];
$bname = $details['v_companyname'];
$address = $details ['v_address'];
$email = $details['v_email'];
$phone = $details['v_phone'];


$details2  = $v->getdetails($_SESSION['user'], 'vendor_business_info');

// echo "<pre>";
// print_r($details2);
// echo "</pre>";

$cname = $details2['company_name'];
$dname = $details2['director_name'];
$cemail = $details2['company_email'];
$ctype = $details2['company_type'];
$rc = $details2['rc_number'];


$details3  = $v->getdetails($_SESSION['user'], 'vendor_bank_info');

// echo "<pre>";
// print_r($details2);
// echo "</pre>";

$bkname = $details3['bank_name'];
$acnum = $details3['account_number'];
$acname = $details3['account_name'];
$bvn = $details3['bvn'];
$iban = $details3['iban'];
$swift = $details3['swift'];


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
				  <h5>Hi <span id = "updatedname"><?php echo $fname ?></span>, Please Complete Your Registration Below</h5>
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
				          <h5 class = "accordstyle">1. Contact Details</h5>
				        </button>
				      </h2>
				      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-angle-right"></i></p>
				  		</div>
				    </div>

				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <div class="card-body mx-2 ml-4">
				       
						
						<div class = "form-group row">
							<h5 >Details of Authorized Contact Person </h5>							
						</div>

						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="fname" name = "v_fname" value="<?php echo $fname ?>">
						    </div>

						    <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="lname" name = "v_lname" value="<?php echo $lname ?>">
						    </div>
						 </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Brand Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="bname" name = "v_companyname" value="<?php echo $bname ?>">
						    </div>
						  </div>
						  
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="vphone" name = "v_phone" value="<?php echo $phone ?>">
						    </div>
						  </div>
						   <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Email Address</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="vemail" name = "v_email" value="<?php echo $email ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Office Address</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="vaddress" name = "v_address" value="<?php echo $address ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						  <div class=" my-0 col-3 offset-7">
						  	<div class=" my-0 " role="alert" id = "contactsaved"></div>
						  </div>
						  <div class = "col-2">					  	  
						  <p align="right"><button type="button" class="btn btn-success btn-lg" id = "contactbtn">Save Details</button></p>
						</div>
						</div>
						
						
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
				       						
						<div>
							<h5 class = "form-group row">Company Details</h5>
						</div>
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Business Legal Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="company_name" name = "company_name" value="<?php echo $cname ?>">
						    </div>
						  </div>
						
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Director's Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="director_name"  name = "director_name" value="<?php echo $dname ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Business Email</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="company_email"  name = "company_email" value="<?php echo $cemail ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Business Type</label>
						    <div class="col-sm-10">
						      <select class="form-control" id="company_type"  name = "company_type">
						      	<option value="<?php echo $ctype ?>"><?php if(isset($_SESSION['user'])){ echo $ctype;}else {echo "Select Business Type";} ?></option>
						      	<option value="BN">Business Name</option>
						      	<option value="LLC">Limited Liability Company</option>
						      	<option value="PLC">Public Liability Company</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Business Reg. Number</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="rc_number"  name = "rc_number" value="<?php echo $rc ?>">
						    </div>
						  </div>
						  <div class="form-group row">
						  <div class=" my-0 col-3 offset-7">
						  	<div class=" my-0 " role="alert" id = "bizinfosaved"></div>
						  </div>
						  <div class = "col-2">					  	  
						  <p align="right"><button type="button" class="btn btn-success btn-lg" id = "bizinfobtn">Save Details</button></p>
						</div>
						</div>
						
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
				       
						
						<div>
							<h5 class = "form-group row">Business Bank Details</h5>
						</div>
						<div class="form-group row">
						    <label for="inputPassword" class="col-sm-2 col-form-label">Bank Name<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <select class="form-control" name = "bank_name" id="bank_name">
						      	<option value="<?php echo $ctype ?>"><?php if(isset($_SESSION['user'])){ echo $bkname;}else {echo "Select Bank Name";} ?></option>
						      	<option value="Access Bank">Access Bank</option>
						      	<option value="First Bank">First Bank</option>
						      	<option value="Fidelity Bank">Fidelity Bank</option>
						      </select>
						    </div>
						  </div>
						  
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Account Number<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="account_number" name = "account_number" value="<?php echo $acname ?>">
						    </div>
						</div>


						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">Account Name<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="account_name" name = "account_name" value="<?php echo $acname ?>">
						    </div>
						  </div>

						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">BVN Number<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="bvn" name = "bvn" value="<?php echo $bvn ?>">
						    </div>
						 </div>

						 <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">IBAN</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="iban" name = "iban" value="<?php echo $iban ?>" placeholder = "Optional">
						    </div>
						 </div>

						 <div class="form-group row">
						    <label for="staticEmail" class="col-sm-2 col-form-label">SWIFT</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="swift" name ="swift" value="<?php echo $swift ?>" placeholder = "Optional">
						    </div>
						 </div>

											 
						  <div class="form-group row">
						  <div class=" my-0 col-3 offset-7">
						  	<div class=" my-0 " role="alert" id = "bankinfosaved"></div>
						  </div>
						  <div class = "col-2">					  	  
						  <p align="right"><button type="button" class="btn btn-success btn-lg" id = "bankinfobtn">Save Details</button></p>
						</div>
						</div>
						



				      </div>
				    </div>
				  </div>

				</div>

				<p class = "text-center">
				<a class="btn btn-success btn-lg" href="vendor_dashboard.php">
				   Skip And Continue to My Dashboard
				</a>
				</p>



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
<script>

$(document).ready(function(){

//for contact button
$('#contactbtn').click(function(){

	var fname = $('#fname').val();	
	var lname = $('#lname').val();
	var bname = $('#bname').val();
	var vaddress = $('#vaddress').val();
	var vphone = $('#vphone').val();
	var vemail = $('#vemail').val();

	$.ajax({

		url: "vendorsubmitcontact.php",
		type: "POST",
		data: {"v_fname": fname, "v_lname": lname, "v_companyname": bname, "v_address":vaddress, "v_email":vemail, "v_phone":vphone},
		// data: "item="+mydata+"&test=testvalue",
		dataType: "text",
		success(msg){

		var rec = JSON.parse(msg);
		
		$('#updatedname').html(rec.v_fname);
		$('#contactsaved').fadeIn('slow');
		$('#contactsaved').addClass('alert alert-success');
		$('#contactsaved').html('Successfully Saved');
		$('#contactsaved').fadeOut('slow');
		



		
			
		},
		error(errmsg){
			console.log(errmsg);
			
		}
	})


})


//for bizinfo button
$('#bizinfobtn').click(function(){

	
	var director_name = $('#director_name').val();
	var company_name = $('#company_name').val();
	var company_type = $('#company_type').val();
	var company_email = $('#company_email').val();
	var rc_number = $('#rc_number').val();
	
	$.ajax({

		url: "vendorsubmitbizinfo.php",
		type: "POST",
		data: {"company_name": company_name, "director_name": director_name, "company_type": company_type, "company_email":company_email, "rc_number":rc_number},
		// data: "item="+mydata+"&test=testvalue",
		dataType: "text",
		success(msg){
		
				
		$('#bizinfosaved').fadeIn('slow');
		$('#bizinfosaved').addClass('alert alert-success');
		$('#bizinfosaved').html('Successfully Saved');
		$('#bizinfosaved').fadeOut('slow');
		
					
		},
		error(errmsg){
			console.log(errmsg);

		}
	})


})

$('#bankinfobtn').click(function(){

	
	var bank_name = $('#bank_name').val();
	var account_number = $('#account_number').val();
	var account_name = $('#account_name').val();
	var bvn = $('#bvn').val();
	var iban = $('#iban').val();
	var swift = $('#swift').val();

	$.ajax({

		url: "vendorsubmitbankinfo.php",
		type: "POST",
		data: {"bank_name": bank_name, "account_number": account_number, "account_name": account_name, "bvn":bvn, "iban":iban, "swift":swift},
		// data: "item="+mydata+"&test=testvalue",
		dataType: "text",
		success(msg){

			
		$('#bankinfosaved').fadeIn('slow');
		$('#bankinfosaved').addClass('alert alert-success');
		$('#bankinfosaved').html('Successfully Saved');
		$('#bankinfosaved').fadeOut('slow');
		

			
		},
		error(errmsg){
			console.log(errmsg);

		}
	})


})




})

</script>


<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>