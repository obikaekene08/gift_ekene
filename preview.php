<?php


require("Receiver.php");

$obj = new Receiver;
if(!isset($_SESSION['user'])){

	header("location:receivegifts.php");

}

require("header2.php");
$details = $obj->getdetails($_SESSION['user'],'receivers');


?>

	<a href="gifterprofile.php" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Give a Gift</a>
	<a href="logout.php" class="btn btn-danger my-2">Logout</a>
   
	<div class="container-fluid">
   
	 <div class = "row">
    	<div class = "col-12">
		    <div class="alert alert-primary pb-0" role="alert" col-8 offset-2>
			  <h5 class = "mb-0">Hi <?php echo ucfirst($details['r_fname']).","?><small> You are Logged In</small></h5>
			  <nav aria-label="breadcrumb" class = "my-0 py-0">
			  <ol class="breadcrumb alert-primary pl-0 py-2 my-1">
			    <li class="breadcrumb-item"><a href="receiverprofile.php">Main Page</a></li>
			    <li class="breadcrumb-item"><a href="viewcollections.php">View Collections</a></li>
			    <li class="breadcrumb-item"><a href="collectiondetails.php">See Collection Details</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Gifters' Preview</li>
			  </ol>
			</nav>
			</div>
		</div>

	</div>
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-2 mb-4">
	  <div>
	  <img src='<?php if($details['r_pic_name'] != ""){ echo $details['r_pic_name']; }else{echo 'images/avatar.png';} ?>' class='img-fluid col-12 mb-2'>
	  
	 
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
      <div class="col-lg-10 mb-4">
       

		<div class = "row mx-1">
			<div class = "col-12 card card-body pt-1 pb-0 mb-0">
				  <h2 class ="pb-0 text-center"><?php echo ucwords($_SESSION['r_event_title']);?>: </h2>
				  <h4 class ="mb-2 text-center">By <?php echo ucfirst($details['r_fname'])." ".ucfirst($details['r_lname']) ?></h4>
				  <div class = "text-center">
				  <img src="<?php if($_SESSION['r_event_pic'] != ""){ echo $_SESSION['r_event_pic']; }else{echo 'images/noimage3.jpg';} ?>" class="card-img-top img-fluid" style = "height: 300px" alt="...">
				</div>
				<div class = "mt-2" style = "display:flex; flex-wrap: nowrap;">
					<h6 class = "text-center" style = " width: 50%"><b>Due Date: </b><?php $d = strtotime($_SESSION['r_event_duedate']); if($_SESSION['r_event_duedate'] != ''){echo date("F j, Y",$d);}else{echo "None";} ?></h6>
					<h6 class = "text-center" style = "width: 50%"><b>Event Date: </b><?php $d = strtotime($_SESSION['r_event_date']); if($_SESSION['r_event_date'] != ''){echo date("F j, Y",$d);}else{echo "None";} ?></h6>
				</div>
				

				<h5 class ="text-center">Beautiful Message From The Celebrant: </h5>
				<p class = "card card-body alert-warning"><?php echo ucwords($_SESSION['r_message']);?></p>				
			  
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


$('#bodyofitem').load("previewsubmit.php");



})

</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>