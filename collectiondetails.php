<?php


require("Receiver.php");

$obj = new Receiver;
if(!isset($_SESSION['user'])){

	header("location:receivegifts.php");

}

require("header2.php");
$details = $obj->getdetails($_SESSION['user'],'receivers');

if(isset($_GET['eventid']) && isset($_GET['eventtitle'])){
$_SESSION['r_event_id'] = $_GET['eventid'];
$_SESSION['r_event_title'] = $_GET['eventtitle'];

$getEventDetails = $obj->getdetailswhere($_SESSION['r_event_id'],'receiver_events','r_event_id');

$_SESSION['r_message'] = $getEventDetails['r_message'];
$_SESSION['r_event_date'] = $getEventDetails['r_event_date'];
$_SESSION['r_event_duedate'] = $getEventDetails['r_event_duedate'];
$_SESSION['r_event_pic'] = $getEventDetails['r_event_pic'];

}
?>

	<button type="button" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Give a Gift</button>
	<a href="logout.php" class="btn btn-danger my-2">Logout</a>
   
	<div class="container-fluid">
   
	 <div class = "row">
    	<div class = "col-12">
		    <div class="alert alert-primary pb-0" role="alert" col-8 offset-2>
			  <h5 class = "mb-0">Hi <?php echo ucfirst($details['r_fname']).","?> <small> You are Logged In</small></h5>
			  <nav aria-label="breadcrumb" class = "my-0 py-0">
			  <ol class="breadcrumb alert-primary pl-0 py-2 my-1">
			    <li class="breadcrumb-item"><a href="receiverprofile.php">Main Page</a></li>
			    <li class="breadcrumb-item"><a href="viewcollections.php">View Collections</a></li>
			    <li class="breadcrumb-item active" aria-current="page">See Collection Details</li>
			  </ol>
			</nav>
			</div>
		</div>

	</div>
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-md-2 mb-4">
	  <div>
	  <img src="<?php if($details['r_pic_name'] != ""){ echo $details['r_pic_name']; }else{echo 'images/avatar.png';} ?>" class='img-fluid col-12 mb-2'>
	  
	 
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
      <div class="col-md-10 mb-4">
       
	   <div class = "row" id = "searchbox">
				<div class = "offset-1 col-11 col-md-8 offset-md-2 mb-3" style = "width:100%; margin:auto;">	
						<form class="form-inline">
					    <input class="form-control mr-2 col-10" type="search" placeholder="Search for Merchants and Products" aria-label="Search">
					    <button class="btn btn-outline-danger giftBtn" type="submit">Search</button>
					  	</form>
				</div>
		</div>

		<div class = "row mx-1">
			<div class = "col-12 card card-body pt-1">
				  
				  <h4 class ="mb-3 mt-0 actionbtns"><?php echo ucwords($_SESSION['r_event_title']);?> Collection Details:</h4>
				  <div class = "row actionbtns">
				  	<div class = "col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Select Item(s)
					</button>
					</div>
					<div class = "col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target = "#collapseExample" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Select All
					</button>
					</div>
					<div class = "col-2">
					<a href="createcollection.php" class="btn btn-primary" id = "addmoreitembtn" >
					  Add More Items
					</a>
					</div>
					<div class = "col-3">
					<a href="preview.php" class="btn btn-primary">Preview Your Gifters' View</a>
					</div>
					<div class = "col-2" id = "seetablediv" >
					<button type="button" class="btn btn-primary" id = "seetablebtn" >
					  See Table View
					</button>
					</div>
					<div class = "col-3" style="display:none" id = "backtocardviewdiv">
					<button type="button" class="btn btn-primary" id = "backtocardviewbtn" >
					  Back to Card View
					</button>
					</div>							
					</div>
					<div class = "row mt-2 actionbtns">
					<div class = "col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Mask Item(s)
					</button>
					</div>					
					<div class = "col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Unmask Item(s)
					</button>
					</div>
					<div class = "col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample"disabled>
					   Merge Items(s)
					</button>
					</div>
					<div class = "col-3">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					   Unmerge Items(s)
					</button>
					</div>					
				</div>				
			  
			  </div>
			</div>


			<div class = "row mt-2 mx-1">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0" id = "itemsSelectedBodyTitle">Items Selected in <?php echo ucwords($_SESSION['r_event_title']);?>: </h4>
					<div class = "row" id = "bodyofitem">

						

					</div>
				</div>
			</div>

			


      </div>
    </div>
   

  </div>


  
	
	<!-- Send Message and Footer -->

	<?php

require('footer.php');
require("createcollectionmodal.php");
require("removemodal.php");
?>
	


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">

function editItemCard(editbtn){

var itemid = $(editbtn).parents('#grandparent').siblings('#itid').html();
var editbtnid = "editrecord"+itemid;
var updatebtnid = "updaterecord"+itemid;


$('#'+editbtnid).hide();
$('#'+updatebtnid).show();

$(editbtn).parents('#grandparent').siblings('#itqty').attr('readonly',false);

}


function updateItemCard(updatebtn){

var itemid = $(updatebtn).parents('#grandparent').siblings('#itid').html();
var editbtnid = "editrecord"+itemid;
var updatebtnid = "updaterecord"+itemid;

$('#'+updatebtnid).hide();
$('#'+editbtnid).show();


$(updatebtn).parents('#grandparent').siblings('#itqty').attr('readonly',true);
var itemqty = $(updatebtn).parents('#grandparent').siblings('#itqty').val();

updatedata(itemid,itemqty);

}

function deleteItemCard(deletebtn){

var itemid = $(deletebtn).parents('#grandparent').siblings('#itid').html();

deletedata(itemid);

}

function editItem(editbtn){

var itemid = $(editbtn).parent('#btnparent').siblings('#itemId').html();
var editbtnid = "editrecord"+itemid;
var updatebtnid = "updaterecord"+itemid;


$('#'+editbtnid).hide();
$('#'+updatebtnid).show();

$(editbtn).parent('#btnparent').siblings('#itqty').find('#itqtyinput').attr('readonly',false);
$(editbtn).parent('#btnparent').siblings('#itqty').find('#itqtyinput').removeClass('form-control-plaintext');


}

function updateItem(updatebtn){

var itemid = $(updatebtn).parent('#btnparent').siblings('#itemId').html();
var editbtnid = "editrecord"+itemid;
var updatebtnid = "updaterecord"+itemid;


$('#'+updatebtnid).hide();
$('#'+editbtnid).show();


$(updatebtn).parent('#btnparent').siblings('#itqty').find('#itqtyinput').attr('readonly',true);
$(updatebtn).parent('#btnparent').siblings('#itqty').find('#itqtyinput').addClass('form-control-plaintext');


var itemqty = $(updatebtn).parent('#btnparent').siblings('#itqty').find('#itqtyinput').val();

updatedata(itemid,itemqty);

}

function updatedata(itemid,itemqty){

	$.ajax({

	url: "receiverupdateitem.php",
	data:{"itemid": itemid, "itemqty": itemqty},
	type: "POST",
	dataType: "text",
	success(msg){

	},
	error(errmsg){

	}
})
}

function deleteItem(deletebtn){

	var itemid = $(deletebtn).parent('#btnparent').siblings('#itemId').html();

	deletedata(itemid);
	
}

function deletedata(itemid){

	var data = {"itemid":itemid};

	$('#bodyOfDeleteItem').load("receiverdeleteitem.php",data);
	
}

function finalDeleteItem(finalDeletebtn){

	var itemid = $(finalDeletebtn).siblings('#itemid').html();

	var data = {"itemid":itemid};

	$('#loaddiv').load("receiverremoveitem.php",data);

	var check = $('#backtocardviewdiv').css('display');

	if(check != 'none'){
		$('#bodyofitem').load("receiverseetableview.php");
	}else{
		$('#bodyofitem').load("collectiondetailssubmit.php");
	}
	
	
}

$(document).ready(function(){


$('#bodyofitem').load("collectiondetailssubmit.php");

$('#seetablebtn').click(function(){

$('#bodyofitem').load("receiverseetableview.php");

$('#seetablediv').hide();
$('#backtocardviewdiv').show();

})

$('#backtocardviewbtn').click(function(){

$('body').load("collectiondetails.php");

})




})

</script>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>