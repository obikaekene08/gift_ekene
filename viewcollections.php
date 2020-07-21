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
			    <li class="breadcrumb-item"><a href="#">Main Page</a></li>
			    <li class="breadcrumb-item active" aria-current="page">View Collections</li>
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
					    <button class="btn btn-outline-danger" type="submit">Search</button>
					  	</form>
				</div>
		</div>

		<div class = "row mx-1">
			
			<div class = "col-12 card card-body pt-1">
				  <h4 class ="pb-2">My Collections: </h4>
				  <div class = "row">
				  	<div class = "col-3">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Select Collection
					</button>
					</div>
					<div class = "ml-0 pl-0 col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target = "#collapseExample" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Select All
					</button>
					</div>
					
					<div class = "ml-0 pl-0 col-2">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					  View Reports
					</button>
					</div>					
					<div class = "col-3">
					<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" disabled>
					  Delete Collection
					</button>
					</div>
									
					
				</div>
			  
			  </div>
			</div>

			<div class = "row mt-2 mx-1">
			<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">Collections: </h4>
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


<?php

require('createcollectionmodal.php');

?>
	


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">

$(document).ready(function(){


$('#bodyofitem').load("receiverviewcollections.php");


})

</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>