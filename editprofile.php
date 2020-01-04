<?php


require("Receiver.php");

$obj = new Receiver;
if(!isset($_SESSION['user'])){

	header("location:receivegifts.php");

}

require("header2.php");



?>

	<button type="button" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Give a Gift</button>
	<button type="button" class="btn btn-danger my-2">Logout</button>
   
	<div class="container">
	 <div class = "row">
    	<div class = "col-12">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h3>Hi Name! <small>Welcome To Your Profile Page</small></h3>
			</div>
		</div>
	</div>
   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-3 mb-4">
	  <div>
	  <img src='images/avatar.png' class='img-fluid col-12 mb-2'>
	  <form method = "" action = "" enctype = "multipart/form-data">
	  	<div class="form-group">
		    <div class="col-sm-10">
		     <input type='file' name='mypix'>
		     <button type = "submit" class="btn-sm btn btn-info mt-2">Upload Picture</button>
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

		<!-- Button trigger modal create collection -->
		<div class="col-sm-12">
		      <a href="createcollection.php" class="btn btn-primary btn-lg mt-3" data-toggle="modal" data-target="#modalcreatecollection">Create a Collection</a>
		    </div>


      </div>
    </div>
   

  </div>
  
	
	<!-- Send Message and Footer -->

	<?php

require('footer.php');

?>
	


<!-- Modal Create Collection -->
<div class="modal fade bd-example-modal-lg" id="modalcreatecollection" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="receiverprofile_submit.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        
        				<div class = "row">
				    	<div class = "col-12">
						    <div class="alert alert-primary" role="alert">
							  <h6><small>Please note that the information with <span style = "color:red">*</span> will be displayed to your gifters. <span style = "color:black">Please Check on "View Collections" tab to see Preview</span></small></h6>
							</div>
						</div>
						</div>
        				<div class = "card-body">

        				<div class = "row">

        				<div class = "col">

        				<img src="images/coupleavatar2.jpg" class="card-img-top" alt="No image Available" style = "height: 250px">
      	
      					<div class="form-group row mt-2">
						    <label for="exampleFormControlFile1" class="col-sm-4 col-form-label mr-0 pr-0" ><b>Select Background Image: </b><span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						    <div class = "row">
						    <input type="file" class="form-control-file col-6 mr-0 pr-0" id="exampleFormControlFile1" name = "profile">
						    <button type = "submit" class="btn-sm btn btn-success col-4" >Upload Pic</button>
							</div>
							</div>
						 </div>
        				
        				</div>
        			</div>

        			<div class = "row">

        				<div class = "col-7">
        				<div class="form-group row">
						    <label for="inputPassword" class="col-sm-3 col-form-label mr-0 pr-0">Event Type</label>
						    <div class="col-sm-9">
						      <select class="form-control" id="r_event_type" name = "r_event_type">
						      	<option value=0>--Select Event Type--</option>
						      	<option value=1>Wedding</option>
						      	<option value=2>Child Dedication</option>
						      	<option value=3>Christmas</option>
						      	<option value=4>Others</option>
						      </select>
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label mr-0 pr-0">Event Title<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id="r_event_title" value="" name = "r_event_title">
						    </div>
						  </div>
						 </div>

						 <div class = "col-5">
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-4 col-form-label mr-0 pr-0">Event Date<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						      <input type="date" class="form-control ml-0 " id="r_event_date" value="" name = "r_event_date">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-4 col-form-label mr-0 pr-0">Due Date<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						      <input type="date" class="form-control ml-0 " id="r_event_duedate" value="" name = "r_event_duedate">
						    </div>
						  </div>
							</div>
						 </div>
        				
						
						  <div class="control-group form-group row">
				            <div class="controls">
				              <label><b>Message For Your Gifters(Brief):</b></label>
				              <textarea rows="5" cols="100" name = "r_message" class="form-control" id="r_message"  maxlength="300" style="resize:none"></textarea>
				            </div>
				          </div>
				         </div>		  

         

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Start Collection</button>
      </div>
      </form>
    </div>
  </div>
</div>
	









<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">


</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>