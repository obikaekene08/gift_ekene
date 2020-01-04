<?php


require("Gifter.php");

$obj = new Gifter;
if(!isset($_SESSION['user'])){

	header("location:giveagift.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'gifters');


if(isset($_GET['eventid']) && isset($_GET['eventtitle'])){
$_SESSION['$r_event_id'] = $_GET['eventid'];
$_SESSION['$receiver_id'] = $_GET['receiver_id'];
}

$details2 = $obj->getdetails2($_SESSION['$receiver_id'],'receivers');
$details3 = $obj->getdetails3($_SESSION['$receiver_id'],$_SESSION['$r_event_id'],'receiver_events');

// print_r($details3);


?>

	<a href="receiverprofile.php" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Receive Gifts</a>
	<a href="index.php" class="btn btn-danger my-2">Logout</a>
    <div class = "row">
    	<div class = "col-12">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h3>Hi <?php echo ucfirst($details['g_fname']).","?> <small> Welcome To Your Profile Page</small></h3>
			</div>
		</div>
	</div>
	<div class="container-fluid">
   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-2 mb-4">
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
      <div class="col-lg-10 mb-4">
       
	  	<div class = "row mt-3">
			<div class = "col-12 my-1 card mbline" id = "">

				<div class = "row mx-1">
			<div class = "col-12 card card-body pt-1 pb-0 mb-0">
				  <h2 class ="pb-0 text-center"><?php echo ucwords($details3['r_event_title']);?>: </h2>
				  <h4 class ="mb-2 text-center">By <?php echo ucfirst($details2['r_fname'])." ".ucfirst($details2['r_lname']) ?></h4>
				  <div class = "text-center">
				  <img src="<?php if($details3['r_event_pic'] != ""){ echo $details3['r_event_pic']; }else{echo 'images/noimage3.jpg';} ?>" class="card-img-top img-fluid" style = "height: 300px" alt="...">
				</div>
				<div class = "mt-2" style = "display:flex; flex-wrap: nowrap;">
					<h6 class = "text-center" style = " width: 50%"><b>Due Date: </b><?php $d = strtotime($details3['r_event_duedate']); if($details3['r_event_duedate'] != ''){ echo date("F j, Y",$d);}else{echo "None";} ?></h6>
					<h6 class = "text-center" style = "width: 50%"><b>Event Date: </b><?php $d = strtotime($details3['r_event_date']); if($details3['r_event_date'] != ''){echo date("F j, Y",$d);}else{echo "None";} ?></h6>
				</div>
				

				<h5 class ="text-center">Beautiful Message From The Celebrant: </h5>
				<p class = "card card-body alert-warning"><?php echo ucwords($details3['r_message']);?></p>				
			  	<div class = "offset-8 mb-2">
				      <label for="colqty">Qty in Collection:</label>				      
				      <div id = "colqty" style = "width:40%; font-weight: bold; border:2px solid red; display:inline; margin: 2px; padding:4px; " > </div>
				      <a href="giftercheckout.php" class = "btn btn-info col-4 offset-2">Check Out</a>
				  </div>

			  </div>
			</div>

		


			<div class = "row mt-2 mx-1">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">See Gift Items Chosen By The Celebrant: </h4>
					<div class = "row" id = "bodyofitem">
						
					</div>
					<div id = "loaddiv">
					</div>
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


$('#bodyofitem').load("gifterpreviewsubmit.php");

 $('#colqty').load('gifterloadcartqty.php');

 
})

function iteminclude(itbtn){

var receiver_itid = $(itbtn).siblings('#receiver_itid').html();var itqty = $(itbtn).siblings('#itqty').html();



$.ajax({

		url: "gifterincludeitem.php",
		type: "POST",		
		data: {"itqty":itqty,"receiver_itid":receiver_itid},		
		dataType: "text",
		success(msg){

		$('#colqty').html(msg);
					
		},
		error(errmsg){
			// console.log(errmsg);
		alert("failed");
			
		}
	})



$(itbtn).hide();

$(itbtn).siblings('#itremove').show();

}

function deleteItemCard(deletebtn){

var itemid = $(deletebtn).siblings('#g_selection_id').html();

	var data = {"itemid":itemid};

	$('#loaddiv').load("gifterremoveitem.php",data);

	$('#bodyofitem').load("gifterpreviewsubmit.php");
}


</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>