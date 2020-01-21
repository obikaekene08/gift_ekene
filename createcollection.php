<?php


require("Receiver.php");

$obj = new Receiver;
if(!isset($_SESSION['user'])){

	header("location:receivegifts.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'receivers');

$event_table = $obj->getseveralwhere('receiver_events','receiver_id',$_SESSION['user']);

$cat_table = $obj->getseveral('category_table');

$merch_table = $obj->getseveral('vendors');

$item_table = $obj->getseveral('vendor_item');

$event_id = $_SESSION['$r_event_id'];


?>

	<button type="button" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Give a Gift</button>
	<a href="logout.php" class="btn btn-danger my-2">Logout</a>
   
	<div class="container-fluid">
   
	 <div class = "row">
    	<div class = "col-12">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h5>Hi <?php echo ucfirst($details['r_fname']).","?><small> You are Logged In</small></h5>
			</div>
		</div>
	</div>
    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-2 mb-4">
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
      <div class="col-lg-10 mb-4">

      	<div class="form-group row mb-2">
		<label for="inputPassword" class=" col-form-label col-sm-2">Choose Event Title: <span style = "color:red">*</span></label>
	    <div class="col-sm-5">
		    <select class = "form-control" id = "eventtitle">		    	
	      	<option value="<?php if(isset($_SESSION['$r_event_id']) && isset($_SESSION['$r_event_title'])){ echo $event_id; } else {echo "Select an event";}?>" ><?php if(isset($_SESSION['$r_event_id']) && isset($_SESSION['$r_event_title'])){ echo $_SESSION['$r_event_title']; } else {echo "Select an event";} ?> </option>
	      		<?php foreach($event_table AS $k => $v){ ?>
	      			<option value="<?php echo $v['r_event_id'];?>" ><?php echo $v['r_event_title']; ?> </option>
	      		<?php } ?>										      	
	      </select>		
	     </div>	    
	  </div>     
	   

		<div class = "row mx-1">
			<div class = "col-12 card card-body mt-2">
				<div class = "row" id = "searchbox">
				<div class = "offset-1 col-11 col-md-8 offset-md-2 mb-3" style = "width:100%; margin:auto;">	
						<form class="form-inline">
					    <input class="form-control mr-2 col-10" type="search" placeholder="Search for Merchants and Products" aria-label="Search" id = "searchval">
					    <button class="btn btn-outline-danger" type="button" id = "search">Search</button>					    
					  	</form>
					</div>
				</div>
				<h5 class = "text-center mb-0 pb-0" id = "or">OR</h5>
				<hr>

				  <h5 class ="mb-0 mt-1 mb-2 text-center">Search By Sort: </h5>
				  <div class="form-group row">
					<div class="col-sm-3">
				    <label for="price" class=" col-form-label">Choose Price Range: </label>				    
				      <select class="form-control" id="price">
				      	<option value=7>--- All Prices ---</option>
				      	<option value=1><?php echo "Below  ". " - ". "&#8358;".number_format(25000,2)?></option>
				      	<option value=2><?php echo "&#8358;".number_format(25000,2). " - ". "&#8358;".number_format(50000,2)?></option>
				      	<option value=3><?php echo "&#8358;".number_format(50000,2). " - ". "&#8358;".number_format(100000,2)?></option>
				      	<option value=4><?php echo "&#8358;".number_format(100000,2). " - ". "&#8358;".number_format(200000,2)?></option>
				      	<option value=5><?php echo "&#8358;".number_format(200000,2). " - ". "&#8358;".number_format(500000,2)?></option>
				      	<option value=6><?php echo "Above  ". " - ". "&#8358;".number_format(500000,2)?></option>
				      </select>
				    </div>
				    <div class="col-sm-3">
				    <label for="selectcategory" class=" col-form-label">Choose Item Category: </label>				    
				       <select class = "form-control" id = "selectcategory">
				       	<option value=0>--- All Categories ---</option>
					    	<?php foreach($cat_table AS $k => $v){ ?>
				      	<option value="<?php echo $v['category_id'] ?>" ><?php echo $v['category_name'] ?> </option>
				      		<?php }?>										      	
				      </select>
				    </div>
				    <div class="col-sm-3">
				    <label for="merchant" class=" col-form-label">Choose Merchant: </label>				    
				      <select class = "form-control" id = "merchant">
				       	<option value=0>--- All Merchants ---</option>
					    	<?php foreach($merch_table AS $k => $v){ ?>
				      	<option value="<?php echo $v['vendor_id']?>" ><?php echo $v['v_companyname'] ?> </option>
				      		<?php }?>										      	
				      </select>
				    </div>
				    <div class="col-sm-3">
				    <label for="brand" class=" col-form-label">Choose Item Brand: </label>				    
					<input class="form-control" id="brand" list='data1' name = "category" value = "">
				    <datalist id ="data1">
				    	<?php foreach($item_table AS $k => $v){ ?>
			      	<option value="<?php echo $v['v_item_name']?>" label= ""/>
			      		<?php }?>										      	
			      </datalist>	
				    </div>
				  </div>

				   <div class="col-sm-12 px-0">
				   	<div class = "row">
				      <button type="button" class="btn btn-primary ml-3" id = "searchbysort">Search By Sort</button>
				      <div class = "offset-7">
				      <label for="addtocart">Qty in Collection:</label>				      
				      <div id = "colqty" style = "width:40%; font-weight: bold; border:2px solid red; display:inline; margin: 2px; padding:4px; " > </div>
				  </div>
				  </div>

				    </div>

				  
				  </div>
				</div>

			<div class = "row mt-2 mx-1" id = "bodyofitemparent">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">Items From Search: </h4>				

					<div class = "row" id = "bodyofitem">
						<div class = "col-md-12 col-12">
							


						</div>
					</div>



				</div>
			</div>

			<div class = "row mt-2 mx-1">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">Suggested Items: </h4>
					<div class = "row">
						<div class = "col-md-3 col-6">
							<div class="card text-center">
							  <div class="card-body">
							  	<img src="images/noimage3.jpg" class="card-img-top" alt="...">
							    <h5 class="card-title mt-2">Item Name</h5>
							    <p class="card-text"><b>Unit Price:</b> &#8358;5000.00</p>
							    <p class="card-text"><b>Quantity:</b> 10</p>
							    <a href="#staticBackdropAddItem" class="btn btn-primary" data-toggle="modal">Add Item</a>
							  </div>
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

function fetchitems(){

var r_event_id = $('#eventtitle').val();
var price = $('#price').val();
var selectcategory = $('#selectcategory').val();
var merchant = $('#merchant').val();
var brand = $('#brand').val();
var data = {"price": price, "selectcategory":selectcategory, "merchant":merchant, "brand":brand, "r_event_id": r_event_id};

$('#bodyofitem').load("receiverselectitem.php", data);


}

function iteminclude(itbtn){
	
var r_event_id = $('#eventtitle').val();
var itqty = $(itbtn).siblings('#itqty').val();
var itid = $(itbtn).siblings('#itid').html();

$.ajax({

		url: "receiverincludeitem.php",
		type: "POST",		
		data: {"r_event_id": r_event_id,"itqty":itqty,"itid":itid},		
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



$(document).ready(function(){


var colqty = $('#eventtitle').val();

 $('#colqty').load('loadcollectionqty.php?colqty='+colqty);

 $('#eventtitle').change(function(){

 var colqty = $('#eventtitle').val();

 $('#colqty').load('loadcollectionqty.php?colqty='+colqty);


 })

fetchitems();

 

$('#searchbysort').click(function(){

fetchitems();

})

$('#eventtitle').change(function(){

fetchitems();


})









$('#search').click(function(){
var r_event_id = $('#eventtitle').val();
var searchval = $('#searchval').val();
var data = {"searchval": searchval, "r_event_id": r_event_id};

$('#bodyofitem').load("receiverselectitemMainSearch.php", data);


})



})


</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>