<?php


require("Gifter.php");

$obj = new Gifter;
if(!isset($_SESSION['user'])){

	header("location:giveagift.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'gifters');

$details2 = $obj->getdetails2($_SESSION['$receiver_id'],'receivers');

if(isset($_GET['eventid']) && isset($_GET['eventtitle'])){
$_SESSION['$r_event_id'] = $_GET['eventid'];
$_SESSION['$r_event_title'] = $_GET['eventtitle'];
$_SESSION['$r_message'] = $_GET['r_message'];
$_SESSION['$receiver_id'] = $_GET['receiver_id'];
}




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
          <a href="gifterprofile.php" class="list-group-item">Main Page</a>
          <a href="editprofile.php" class="list-group-item">Edit Profile</a>          
          <a href="changepassword.php" class="list-group-item">Change Password</a>
          <a href="logout.php" class="list-group-item">Log Out</a>
         
          
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-9 mb-4">
       
	  	<div class = "row-12 mt-3">
			<div class = "col-12 my-1 card mbline" id = "">

				<div class = "row mx-1">
			<div class = "col-12 card card-body pt-1 pb-0 mb-0">
				  <h2 class ="pb-0 text-center"><?php echo ucwords($_SESSION['$r_event_title']);?>: </h2>
				  <h4 class ="mb-2 text-center">By <?php echo ucfirst($details2['r_fname'])." ".ucfirst($details2['r_lname']) ?></h4>
				  <div class = "text-center">
				  <img src="images/couple2.jpg" class="card-img-top img-fluid" style = "height: 300px" alt="...">
				</div>
				<div class = "mt-2" style = "display:flex; flex-wrap: nowrap;">
					<h6 class = "text-center" style = " width: 50%"><b>Due Date:</b> October 22, 2020</h6>
					<h6 class = "text-center" style = "width: 50%"><b>Event Date:</b> October 22, 2020</h6>
				</div>
				

				<h5 class ="text-center">Beautiful Message From The Celebrant: </h5>
				<p class = "card card-body alert-warning"><?php echo ucwords($_SESSION['$r_message']);?></p>				
			  
			  </div>
			</div>

		


			<div class = "row mt-2 mx-1">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">See Gift Items Chosen By The Celebrant: </h4>
					<div class = "row" id = "bodyofitem">
						
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

$(document).ready(function(){


$('#bodyofitem').load("previewsubmit.php");



})

</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>