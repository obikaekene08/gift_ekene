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
          <a href="gifterprofile.php" class="list-group-item">Main Page</a>
          <a href="giftereditprofile.php" class="list-group-item">Edit Profile</a>          
          <a href="gifterchangepassword.php" class="list-group-item">Change Password</a>
          <a href="logout.php" class="list-group-item">Log Out</a>
         
          
        </div>
      </div>
      <!-- Content Column -->
   <div class="col-lg-9 mb-4">
       
	   <form class = "card card-body">
	    <h4 class = "ml-0 pl-0">Contact Details</h4>
	    	
		  <div class="form-group row">
		    <div class="col-sm-6">
		    <label for="inputEmail3">Name: </label>
		      <input type="text" class="form-control" id="inputEmail3" name='fname'>
		    </div>
		    <div class="col-sm-6">
		    <label for="inputEmail3">Email:</label>
		      <input type="text" class="form-control" id="inputEmail3" name='fname'>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-6">
		    <label for="inputEmail3">Phone Number 1: </label>
		      <input type="text" class="form-control" id="inputEmail3" name='fname'>
		    </div>
		    <div class="col-sm-6">
		    <label for="inputEmail3">Phone Number 2:</label>
		      <input type="text" class="form-control" id="inputEmail3" name='fname'>
		    </div>		  
		  </div>
		    <div class="control-group form-group">
            <div class="controls">
              <label>Delivery Address:</label>
              <textarea rows="2" cols="50" name='profile' class="form-control" id="profile"  maxlength="300" style="resize:none"></textarea>
            </div>
          </div>		  
		</form>


      </div>
    </div>
   

  </div>
  
	
	<!-- Send Message and Footer -->

	<?php

require('footer.php');

?>
	


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


$('#colqty').load('loadcartqty.php?');


})

function iteminclude(itbtn){
	
var itqty = $(itbtn).siblings('#itqty').val();
var itid = $(itbtn).siblings('#itid').html();

$.ajax({

		url: "gifterbuyitem.php",
		type: "POST",		
		data: {"itqty":itqty,"itid":itid},		
		dataType: "text",
		success(msg){

		$('#colqty').html(msg);
					
		},
		error(errmsg){
			// console.log(errmsg);
		alert("failed");
			
		}
	})

$('#itqty').prop('readonly',true);

$(itbtn).hide();
$(itbtn).siblings('#itedit').show();
$(itbtn).siblings('#itremove').show();

}


</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>