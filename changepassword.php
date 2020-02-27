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
      
      <div class="col-md-3 mb-4">
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
      <div class="col-md-9 mb-4">
       
	   <form class = "card card-body" id = "changepasswordform">
	    <h4 class = "ml-0 pl-0 mb-3">Change Password</h4>

		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label text-center">Old Password</label>
		    <div class="col-sm-9">
		      <input type="password" class="form-control" id="oldpass" name='oldpass'>
		    </div>
		  </div>
		   <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label text-center">New Password</label>
		    <div class="col-sm-9">
		      <input type="password" class="form-control" id="newpass1" name='newpass1'>
		    </div>
		  </div>
		    <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label text-center">Confirm Password</label>
		    <div class="col-sm-9">
		      <input type="password" class="form-control" id="newpass2" name='newpass2'>
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
	

<?php

require('createcollectionmodal.php');

?>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">
	
$("#changepasswordform").on('submit',(function(e) {
  e.preventDefault();
  var oldpass = $('#oldpass').val();
  var newpass1 = $('#newpass1').val();
  var newpass2 = $('#newpass2').val();

  if(oldpass == ''){
  	alert("Old Password cannot be empty");
  	return;
  }else if(newpass1 == ''){
  	alert("New Password cannot be empty");
  	return;
  }else if(newpass2 == ''){
  	alert("Confirm Password cannot be empty");
  	return;
  }else if((newpass1 != newpass2)){
  	alert("Password and Confirm Passwords don't match");
  	return;
  }else{
  	 $.ajax({
    url: "changepasswordsubmit.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
      	
		alert(data);   	
      	// if(data != ''){

      	// }
  		
      },
     error: function(e) 
      {
   alert(e);
      }          
    });
  }
 


 }));

</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>