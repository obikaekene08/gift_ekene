<?php


require("Receiver.php");

$obj = new Receiver;
if(!isset($_SESSION['user'])){

	header("location:receivegifts.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'receivers');




?>


	<h1 class="mt-4 mb-3 text-center">Receiver Profile Page
    </h1>
    <div class = "row">
    	<div class = "col-10 offset-1">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h3>Hi <?php echo ucfirst($details['r_fname']).","?> <small>Welcome To Your Profile Page</small></h3>
			</div>
		</div>
	</div>
	<div class="container">
   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-3 mb-4">
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
      <div class="col-lg-9 mb-4">
       
	   <form class = "card card-body">
	    <h4 class = "ml-0 pl-0 mb-3">Change Password</h4>

		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label text-center">Old Password</label>
		    <div class="col-sm-9">
		      <input type="password" class="form-control" id="inputPassword3" name='oldpass'>
		    </div>
		  </div>
		   <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label text-center">New Password</label>
		    <div class="col-sm-9">
		      <input type="password" class="form-control" id="inputPassword3" name='newpass1'>
		    </div>
		  </div>
		    <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label text-center">Confirm Password</label>
		    <div class="col-sm-9">
		      <input type="password" class="form-control" id="inputPassword3" name='newpass2'>
		    </div>
		  </div>
		  <div class="form-group row">
		    <div class="col-sm-12 text-center">
		      <button type="submit" class="btn btn-info btn-lg">Change Password</button>
		    </div>
		  </div>
		</form>


      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
	
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