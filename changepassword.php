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
      <form action="receiverprofile_submit.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
        
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
						      <select class="form-control" id="" name = "r_event_type">
						      	<option value="">--Select Event Type--</option>
						      	<option value=1>Wedding</option>
						      	<option value=2>Child Dedication</option>
						      	<option value=3>Christmas</option>
						      	<option value=4>Others</option>
						      </select>
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Event Title<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id="staticEmail" value="" name = "r_event_title">
						    </div>
						  </div>

        				<img src="images/coupleavatar2.jpg" class="card-img-top" alt="No image Available">
      	
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
				              <textarea rows="4" cols="50" name = "r_message" class="form-control" id="profile"  maxlength="300" style="resize:none"></textarea>
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