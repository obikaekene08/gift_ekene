<?php


require("Receiver.php");

$obj = new Receiver;
if(!isset($_SESSION['user'])){

	header("location:receivegifts.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'receivers');

$event_table = $obj->getseveral('receiver_events');

$cat_table = $obj->getseveral('category_table');

$merch_table = $obj->getseveral('vendors');

$item_table = $obj->getseveral('vendor_item');

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
	      	<option value="<?php if(isset($_SESSION['$r_event_id']) && isset($_SESSION['$r_event_title'])){ echo $_SESSION['$r_event_id']; } else {echo "Select an event";}?>" ><?php if(isset($_SESSION['$r_event_id']) && isset($_SESSION['$r_event_title'])){ echo $_SESSION['$r_event_title']; } else {echo "Select an event";} ?> </option>
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