<?php


require("Gifter.php");

$obj = new Gifter;
if(!isset($_SESSION['user'])){

	header("location:giveagift.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'gifters');



?>

	<a href="receiverprofile.php" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Receive Gifts</a>
	<a href="index.php" class="btn btn-danger my-2">Logout</a>
    <div class = "row">
    	<div class = "col-10 offset-1">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h3>Hi <?php echo ucfirst($details['g_fname']).","?> <small> Welcome To Your Profile Page</small></h3>
			</div>
		</div>
	</div>
	<div class="container">
   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-3 mb-4">
	  <div>
	  <img src="<?php if($details['g_pic_name'] != ""){ echo $details['g_pic_name']; }else{echo 'images/avatar.png';} ?>" class="card-img" alt="...">
	  <form method = "POST" action = "gifter_image_upload.php" enctype = "multipart/form-data" id = "uploadform">
	  	<div class="form-group">
		    <div class="col-sm-10">
		     <input type='file' name='profile'>
		     <button type = "submit" class="btn-sm btn btn-info mt-2" id = "btnupload">Upload Picture</button>
		     <p class = "" id = "alertspan" ><?php if(isset($_SESSION['picupload']) && $_SESSION['picupload'] == 1){
	     	echo "<span class = 'alert-success' id = 'fader'>Upload Successful</span>";

	     	$_SESSION['picupload'] = 0;
	     	
	     }
	     
	     elseif (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
	     	foreach($_SESSION['errors'] as $v){
	     		
	     		echo "<span class = 'alert-danger' id = 'fader'>$v</span><br>";
	     	}
	     	$_SESSION['errors'] = array();
	     }

	     


	     ?></p>
		 </div>
		</div>
		</form>
	 
	  </div>
        <div class="list-group">
          <a href="receiverprofile.php" class="list-group-item">Main Page</a>
          <a href="editprofile.php" class="list-group-item">Edit Profile</a>
          <a href="#modalcreatecollection" data-toggle="modal" class="list-group-item">Create a Collection</a>
          <a href="viewcollections.php" class="list-group-item">View My Collections</a>
          <a href="changepassword.php" class="list-group-item">Change Password</a>
          <a href="logout.php" class="list-group-item">Log Out</a>
         
          
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
       
	  	<div class = "row-12 mt-3">
			<div class = "col-12 my-1 card mbline" id = "">

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
				       
						<div class = "row" id = "searchboxname">
							<div class = "offset-1 col-11 col-md-10 offset-md-1 mb-3" style = "width:100%; margin:auto;">	
									<form class="form-inline">
								    <input class="form-control mr-2 col-10" type="search" id="searchRname" placeholder="Search for Recepient Name or Phone Number" aria-label="Search">
								    <button class="btn btn-outline-danger" type="button" id = "searchRnamebtn">Search</button>
								    </form>
								    <h5 class = "text-center mt-4" id = "or">OR</h5>
							</div>
						</div>

						

						<div class = "row" id = "searchboxlink">
							<div class = "offset-1 col-11 col-md-10 offset-md-1 mb-3" style = "width:100%; margin:auto;">	
									<form class="form-inline">
								    <input class="form-control mr-2 col-10" id = "searchRLink" type="search" placeholder="Search with Recepient ID or Link" aria-label="Search">
								    <button class="btn btn-outline-primary" type="button" id = "searchRLinkbtn">Search</button>
								  	</form>
							</div>
						</div>

						<div class = "row" id = "searchresult">
							<div class = "offset-1 col-11 col-md-10 offset-md-1 mb-3" style = "width:100%; margin:auto;">	
									
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
				       
				       <div class = "row" id = "searchboxMerchant">
							<div class = "offset-1 col-11 col-md-10 offset-md-1 mb-3" style = "width:100%; margin:auto;">	
									<form class="form-inline">
								    <input class="form-control mr-2 col-10" type="search" id="searchMerchant" placeholder="Search for Products or Merchant" aria-label="Search">
								    <button class="btn btn-outline-primary" type="button" id = "searchMerchantbtn">Search</button>
								    </form>
								    <h5 class = "text-center mt-4" id= "or2">OR</h5>
							</div>
						</div>
						<hr>

				<div class = "row mx-1" id = "searchCategory">
				<div class = "col-12 card-body" id = "searchCategorybody">					
					  <h5 class ="mb-0">Select Products By Sort: </h5>
					  <div class="form-group row">
						<div class="col-sm-4">
					    <label for="inputPassword" class=" col-form-label">Choose Price Range: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Prices ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    <div class="col-sm-4">
					    <label for="inputPassword" class=" col-form-label">Choose Item Category: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Categories ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    <div class="col-sm-4">
					    <label for="inputPassword" class=" col-form-label">Choose Merchant: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Merchants ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    <div class="col-sm-4">
					    <label for="inputPassword" class=" col-form-label">Choose Item Brand: </label>				    
					      <select class="form-control" id="">
					      	<option value="">--- All Brands ---</option>
					      	<option value="">Wedding</option>
					      	<option value="">Child Dedication</option>
					      	<option value="">Christmas</option>
					      </select>
					    </div>
					    
					  </div>

					   <div class="col-sm-4 px-0">
					      <button type="button" class="btn btn-primary" id = "searchCategorybtn">Search By Sort</button>
					    </div>

					  
					  </div>
					</div>

					<div class = "row" id = "searchresult2">
							<div class = "offset-1 col-11 col-md-10 offset-md-1 mb-3" style = "width:100%; margin:auto;">	
									
							</div>
						</div>

						



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

	<div class = "row-12 mt-3">
		<div class = "col bline">

	<div class = "row-12 mt-3">
		<div class = "col-7 offset-2">
			<h4 class = "text-center mt-0 pt-0">Send Us a Message</h4>
			<form>
			<div class = "row">
			  <div class="form-group col-md-6 col-12">
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
			    </div>
			  <div class="form-group col-md-6 col-12">
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
	


<!-- Modal Create Collection -->
<div class="modal fade" id="modalcreatecollection" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="receiverprofile_submit" method="POST" enctype="multipart/form-data">
        				<div class = "row">
				    	<div class = "col-12">
						    <div class="alert alert-primary" role="alert">
							  <h6><small>Please note that the information with <span style = "color:red">*</span> will be displayed to your gifters<br><span style = "color:black">Please Check on "View Collections" tab to see Preview</span></small></h6>
							</div>
						</div>
						</div>
        				<div class = "card-body">
        				
        				<div class="form-group row">
						    <label for="inputPassword" class="col-sm-3 col-form-label">Event Type</label>
						    <div class="col-sm-9">
						      <select class="form-control" id="">
						      	<option value="">--Select Event Type--</option>
						      	<option value="">Wedding</option>
						      	<option value="">Child Dedication</option>
						      	<option value="">Christmas</option>
						      </select>
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Event Title<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>

        				<img src="images/jumia.png" class="card-img-top" alt="...">
      	
      					<div class="form-group row mt-2">
						    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label" >Select Image<span style = "color:red">*</span></label>
						    <div class="col-sm-10">
						    <div class = "row">
						    <input type="file" class="form-control-file col-7 mr-0 pr-0" id="exampleFormControlFile1">
						    <button type = "submit" class="btn-sm btn btn-warning col-4" >Upload Pic</button>
							</div>
							</div>
						 </div>
						
						  <div class="control-group form-group">
				            <div class="controls">
				              <label><b>Message For Your Gifters(Brief):</b></label>
				              <textarea rows="4" cols="50" name='profile' class="form-control" id="profile"  maxlength="300" style="resize:none"></textarea>
				            </div>
				          </div>
				         </div>		  

      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Start Collection</button>
      </div>
    </div>
  </div>
</div>
	









<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">

$(document).ready(function(){

$('#btnupload').mouseout(function(){

	
	$('#fader').fadeOut('slow');
})

$('#searchRname').focus(function(){

	$('#or').fadeOut();
	$('#searchboxlink').fadeOut();
})

$('#searchRnamebtn').click(function(){

	$('#or').fadeIn();
	$('#searchboxlink').fadeIn();
})

$('#searchRLink').focus(function(){

	$('#or').fadeOut();
	$('#searchboxname').fadeOut();
})

$('#searchRLinkbtn').click(function(){

	$('#or').fadeIn();
	$('#searchboxname').fadeIn();
})

$('#searchMerchant').focus(function(){

	$('#or2').fadeOut();
	$('#searchCategory').fadeOut();
})

$('#searchMerchantbtn').click(function(){

	$('#or2').fadeIn();
	$('#searchCategory').fadeIn();
})
$('#searchCategorybody').mouseenter(function(){

	$('#or2').fadeOut();
	$('#searchboxMerchant').fadeOut();
})

$('#searchCategorybody').mouseleave(function(){

	$('#or2').fadeIn();
	$('#searchboxMerchant').fadeIn();
})

$('#searchRnamebtn').click(function(){

var searchval = $('#searchRname').val();
var data = {"searchval": searchval};

$('#searchresult').load("gifterSearchRname.php", data);


})

$('#searchRLinkbtn').click(function(){

var searchval = $('#searchRLink').val();
var data = {"searchval": searchval};

$('#searchresult').load("gifterSearchRname.php", data);


})

$('#searchMerchantbtn').click(function(){

var searchval = $('#searchMerchant').val();
var data = {"searchval": searchval};

$('#searchresult2').load("gifterSearchMerchant.php", data);


})

})


</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>