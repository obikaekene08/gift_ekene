<?php

require("Vendor.php");

$obj = new Vendor;
if(!isset($_SESSION['user'])){

	header("location:signup.php");

}

require("header.php");
$details = $obj->getdetails($_SESSION['user'],'vendors');

$cat_table = $obj->getseveral('category_table');

$fetch_catname = $obj->getseveralwhereNoGroup('vendor_item','category_table','vendor_item.v_cat_id','category_id','vendor_id',$_SESSION['user'],'ORDER BY', 'category_name ASC');



?>

	<div class = "row">
		<div class = "col-10 offset-1">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h3>Hi <?php echo ucfirst($details['v_fname']).","?> <small>Welcome To Your DashBoard</small></h3>
			</div>
		</div>
	</div>
	<div class = "row" id = "searchbox_view_merchant">
		<div class = " offset-1 col-10 mb-2">	
				<form class="form-inline ">
			    <input class="form-control mr-2 col-md-6 col-12" type="search" placeholder="Search for products and couples" aria-label="Search">
			    <button class="btn btn-outline-danger" type="submit">Search</button>

				
				<a href="giveagift.php" class="btn btn-danger mr-2 offset-md-2">Give a Gift</a>
				<a href="receivegifts.php" class="btn btn-outline-danger">Receive Gifts</a>

			  	</form>
		</div>

	</div>

	<div class = "row" id = "">
		<div class = "col-10 offset-1 my-1 mbline">

				<ul class="nav nav-pills m-2 offset-2 alert-danger" id="pills-tab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-upload-tab" data-toggle="pill" href="#pills-upload" role="tab" aria-controls="pills-upload" aria-selected="false">Upload Item</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab" aria-controls="pills-view" aria-selected="false" onclick = "$('#tableofitems').load('vendor_dashboard.php #tableofitems2');">View Items</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Profile</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-analytics-tab" data-toggle="pill" href="#pills-analytics" role="tab" aria-controls="pills-analytics" aria-selected="false">Analytics</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-needhelp-tab" data-toggle="modal" data-target="#staticBackdrop" href="#pills-needhelp" role="tab" aria-controls="pills-needhelp" aria-selected="false">Need Help</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link btn btn-info" id="pills-notification-tab" data-toggle="pill" href="#pills-notification" role="tab" aria-controls="pills-notification" aria-selected="false">Notifications <span class="badge badge-light">5</span></a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="pills-more-tab" data-toggle="pill" href="#pills-more" role="tab" aria-controls="pills-more" aria-selected="false">More</a>
					  </li>
					 
					</ul>
					 
					<div class="tab-content" id="pills-tabContent">
						<!-- HOME -->
					  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-12 my-1 card mbline" id = "">
								<div class="card-body mb-3" >
								  <div class="row no-gutters">
								    <div class="col-md-4">
								      <img class = "responsive img-fluid" src="<?php if($details['v_pic_name'] != ""){ echo $details['v_pic_name']; }else{echo 'images/avatar.png';} ?>" class="card-img" alt="...">
								    </div>
								    <div class="col-md-8">
								      <div class="card-body">
								        <h5 class="card-title"><?php echo $details['v_companyname'] ?></h5>
								        <p class="card-text"><b>Stock Category: </b>
								        	<?php if(!empty($fetch_catname)){ foreach($fetch_catname as $v){echo $v['category_name'].", ";} }?>
								        </p>
								        <p class=""><small class="text-muted"><b>Orders Completed: </b> 3</small></p>
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
								    <form method = "POST" action = "vendor_image_upload.php" enctype = "multipart/form-data" id = "profileformpic">
								  	<div class="form-group">
									    <div class="col-sm-10">									    	
									     <input type='file' name='profile'>
									     <button type = "submit" class="btn-sm btn btn-success mt-2" id = "btnupload">Upload Picture</button>
									     
									 </div>
									</div>
									</form>
								  </div>
								</div>
								
							</div>
						</div>
						
						<div class = "row mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = "">
								<h4 class = "mb-3" style="">ORDERS</h4>
								<div class = "row">
									<div class = "col">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
									  Pending Orders <span class="badge badge-light">5</span>
									</button>
									</div>
									<div class = "col">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollableCompleted">
									  Completed Orders <span class="badge badge-light">10</span>
									</button>
									</div>
									<div class = "col">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollableCancelled">
									  Cancelled Orders <span class="badge badge-light">2</span>
									</button>
									</div>
									<div class = "col">
									<div class="alert alert-dark" role="alert">
									  Total Orders Received <span class="badge badge-light">17</span>
									</div>
									</div>
								</div>
								</div>
								
							</div>

							<div class = "row mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = "">
								<h4 class = "mb-3" style="">UPLOADED ITEMS</h4>
								<div class = "row">
									<div class = "col">
									<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollable">
									  View Uploaded Items <span class="badge badge-light">5</span>
									</button>
									</div>
									<div class = "col">
									<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalScrollableCompleted">
									  Items Approved <span class="badge badge-light">10</span>
									</button>
									</div>
									<div class = "col">
									<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalScrollableCancelled">
									  Items Rejected <span class="badge badge-light">2</span>
									</button>
									</div>
									<div class = "col">
									<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModalScrollableCancelled">
									  Items Pending Review <span class="badge badge-light">2</span>
									</button>
									</div>
								</div>
								</div>
								
							</div>

					<div class = "row mt-3">
						<div class = "col-12 my-1 card card-body mbline" id = "">
								<h4 class = "mb-3" style="">MANAGE ACTIVITY</h4>
								<div class = "row">
									<div class = "col">
									<div class="card text-center">
									  <div class="card-body">
									    <h5 class="card-title">Reviews</h5>
									    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									    <a href="#" class="btn btn-primary">Manage Reviews</a>
									  </div>
									</div>
									</div>
									<div class = "col">
									<div class="card text-center">
									  <div class="card-body">
									    <h5 class="card-title">Rating</h5>
									    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									  </div>
									</div>
									</div>
									<div class = "col">
									<div class="card text-center">
									  <div class="card-body">
									    <h5 class="card-title">Analytics</h5>
									    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
									    <a href="#" class="btn btn-primary">View Insights</a>
									  </div>
									</div>
									</div>
									
							</div>
						</div>
								
					</div>

					</div>

					  <!-- UPLOAD -->
					  <div class="tab-pane fade" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = "" style="min-height:50rem">
								<div class = "row">
									<div class = "col">
										<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01">Choose Category</label>
											  </div>
											  <input class="form-control" id="selectcategory" list='data1' name = "category" value = "">
											    <datalist id ="data1">
											    	<?php foreach($cat_table AS $k => $v){ ?>
										      	<option value="<?php echo $v['category_name']?>" label= "<?php echo $v['category_synonyms']?>"/>
										      		<?php }?>										      	
										      </datalist>										
											</div>
									</div>
									<div class = "col">
										<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01">Choose Make</label>
											  </div>
											  <input class="form-control" list='data2' name = "category" id = "input2">
											    <datalist id ="data2">
											    											      										      											      	
										      </datalist>									
											</div>
									</div>


								</div>
								<div class = "row" id = "bodyofitem">

									


								</div>


								</div>

							
								
							</div>
						</div>

						 <!-- VIEW ITEMS -->
					  <div class="tab-pane fade" id="pills-view" role="tabpanel" aria-labelledby="pills-view-tab">
					  	
					  	<div class = "row mt-3" id = "tableofitems">
							<div class = "col-12 my-1 card card-body mbline" id = "tableofitems2" style="min-height:50rem">
							<?php $fetch_catname = $obj->getseveralwhereNoGroup('vendor_item','category_table','vendor_item.v_cat_id','category_id','vendor_id',$_SESSION['user'],'ORDER BY', 'category_name ASC');?>
							<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="col">S/N</th>
								      <th scope="col">Item Name</th>
								      <th scope="col">Category</th>
								      <th scope="col">Unit Price</th>
								      <th scope="col">Colour</th>
								      <th scope="col">Stock</th>
								      <th scope="col">Actions</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php $i = 1; foreach($fetch_catname as $v){?>
								    <tr>
								      <th scope="row"><?php echo $i;?></th>
								      <td id = "itemName"><?php echo $v['v_item_name'];?></td>
								      <td id = "catName"><?php echo $v['category_name'];?></td>
								      <td id = "itemPrice"><?php echo "&#8358;".number_format($v['v_item_price'],2);?></td>
								      <td style = "display: none" id = "itemRawPrice"><?php echo $v['v_item_price'];?></td>
								      <td id = "itemColor"><?php echo $v['item_color'];?></td>
								      <td id = "itemQty"><?php echo $v['item_qty'];?></td>
								      <td style = "display: none" id = "itemId"><?php echo $v['v_item_id'];?></td>
								      <td style = "display: none" id = "itemPic"><?php echo $v['item_pic'];?></td>      
								      <td id = "btnparent"><button id ="<?php echo "editrecord".$v['v_item_id'];?>" type="button" data-target = "#staticBackdropEditItem" data-toggle="modal" class = "btn-link" style="border:none; background-color: inherit;" onclick = "editItem(this);">Edit</button> | <button id ="<?php echo "removerecord".$v['v_item_id'];?>" data-target = "#staticBackdropRemoveItem" class = "btn-link" data-toggle="modal" style="border:none; background-color: inherit;" onclick = "deleteItem(this);">Delete</button></td>
								    </tr>
								   <?php  $i++;}?>
								  </tbody>
								</table>								
							</div>
						</div>

					  </div>

					  <!-- PROFILE -->
					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-10 offset-1 my-1 card mbline" id = "testimonial">

							<div class="accordion mb-3" id="accordionExample">
							  <div class="card">
							    <div class="card-header" id="headingOne">
							    <div class = "row">
							      <h2 class="mb-0 mx-0 col-6">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
							          <h5 class = "accordstyle">1. Contact Details</h5>
							        </button>
							      </h2>
							      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-pen"></i></p>
							  		</div>
							    </div>

							    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							      <div class="card-body mx-2 ml-4">
							       
									<form method = "" action = "">
									<div>
										<h5 class = "form-group row">Details of Authorized Contact Person</h5>
									</div>
									<div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">First Name</label>
									    <div class="col-sm-4">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>

									    <label for="staticEmail" class="col-sm-2 col-form-label">Last Name</label>
									    <div class="col-sm-4">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									 </div>
									  <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Brand Name</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									  
									  <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									   <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Email Address</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									  
									  					  
									  <div class="form-group row">
									    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
									    <div class="col-sm-10">
									      <input type="password" readonly class="form-control-plaintext" id="inputPassword">
									    </div>
									  </div>
									  
									  <p align="right"><button type="submit" class="btn btn-primary mr-2">Edit Details</button><button type="submit" class="btn btn-primary" disabled>Save Changes</button></p>
									</form>



							      </div>
							    </div>
							  </div>


							  <div class="card">
							    <div class="card-header" id="headingTwo">
							    <div class = "row">
							      <h2 class="mb-0 mx-0 col-6">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" >
							          <h5 class = "accordstyle">2. Business Information</h5>
							        </button>
							      </h2>
							      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-pen"></i></p>
							  		</div>
							    </div>

							    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							      <div class="card-body mx-2 ml-4">
							       
									<form method = "" action = "">
									<div>
										<h5 class = "form-group row">Company Details</h5>
									</div>
									<div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Business Legal Name</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									
									  <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Director's Name</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Business Email</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="inputPassword" class="col-sm-2 col-form-label">Business Type</label>
									    <div class="col-sm-10">
									      <select readonly class="form-control-plaintext" id="">
									      	<option value="">Select Business Type</option>
									      	<option value="">Business Name</option>
									      	<option value="">Limited Liability Company</option>
									      	<option value="">Public Liability Company</option>
									      </select>
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Business Reg. Number</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>
									  <p align="right"><button type="submit" class="btn btn-primary mr-2">Edit Details</button><button type="button" type="submit" class="btn btn-primary" disabled>Save Changes</button></p>
									</form>



							      </div>
							    </div>
							  </div>



							  <div class="card">
							    <div class="card-header" id="headingThree">
							    <div class = "row">
							      <h2 class="mb-0 mx-0 col-6">
							        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" >
							          <h5 class = "accordstyle">3. Bank Information</h5>
							        </button>
							      </h2>
							      <p class = "offset-5 col-1 pt-3" style="text-align: center"><i class ="fa fa-pen"></i></p>
							  		</div>
							    </div>

							    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							      <div class="card-body mx-2 ml-4">
							       
									<form method = "" action = "" enctype="multipart/form-data">
									<div>
										<h5 class = "form-group row">Business Bank Details</h5>
									</div>
									<div class="form-group row">
									    <label for="inputPassword" class="col-sm-2 col-form-label">Bank Name<span style = "color:red">*</span></label>
									    <div class="col-sm-10">
									      <select readonly class="form-control-plaintext" id="">
									      	<option value="">Select Bank Name</option>
									      	<option value="">Access Bank</option>
									      	<option value="">First Bank</option>
									      	<option value="">Fidelity Bank</option>
									      </select>
									    </div>
									  </div>
									<div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Account Number<span style = "color:red">*</span></label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									</div>

									<div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">Account Name<span style = "color:red">*</span></label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									  </div>

									<div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">BVN Number<span style = "color:red">*</span></label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									 </div>

									 <div class="form-group row">
									    <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Upload Bank Statement<span style = "color:red">*</span></label>
									    <div class="col-sm-10">
									    <input type="file" class="form-control-file form-control-plaintext" id="exampleFormControlFile1">
										</div>
									 </div>

									 <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">IBAN</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									 </div>

									 <div class="form-group row">
									    <label for="staticEmail" class="col-sm-2 col-form-label">SWIFT</label>
									    <div class="col-sm-10">
									      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
									    </div>
									 </div>

									

									  <p align="right"><button type="submit" class="btn btn-primary mr-2">Edit Details</button><button type="submit" class="btn btn-primary" disabled>Save Changes</button></p>
									</form>



							      </div>
							    </div>
							  </div>

							</div>

								
							</div>
						</div>

					  </div>

					  <!-- ANALYTICS -->
					  <div class="tab-pane fade" id="pills-analytics" role="tabpanel" aria-labelledby="pills-analytics-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-12 card mbline py-3 notif" id = "">

							
								<div class="media">
								  <div class="media-body">
								    <h5 class="my-2 mt-4 notif">Partner with Gift Runner for Black Friday</h5>
								    <h6 class="my-3 notif"><span style="color: rgb(202, 13, 161)">By Ekene Obika </span> October 22, 2019</h6>
								    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								  </div>
								  <img src="images/jumia.png" class="ml-3" alt="...">
								</div>
								
															
							</div>
						</div>

					  </div>

					  <!-- NEEDHELP -->
					  <div class="tab-pane fade" id="pills-needhelp" role="tabpanel" aria-labelledby="pills-needhelp-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-10 offset-1 my-1 card card-body mbline" id = "testimonial">

								
							</div>
						</div>

					  </div>

					  <!-- NOTIFICATION -->
					  <div class="tab-pane fade" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-12 card mbline py-3 notif" id = "">

							<!-- <div class = "row-12 mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = ""> -->
								

								<div class="media">
								  <div class="media-body">
								    <h5 class="my-2 mt-4 notif">Partner with Gift Runner for Black Friday</h5>
								    <h6 class="my-3 notif"><span style="color: rgb(202, 13, 161)">By Ekene Obika </span> October 22, 2019</h6>
								    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								  </div>
								  <img src="images/jumia.png" class="ml-3" alt="...">
								</div>
								

								<!-- </div>
								
							</div> -->

								
							</div>
						</div>

						<div class = "row mt-3">
							<div class = "col-12 card mbline py-3 notif" id = "">

							<!-- <div class = "row-12 mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = ""> -->
								

								<div class="media">
								  <div class="media-body">
								    <h5 class="my-2 notif">Partner with Gift Runner for Black Friday</h5>
								    <h6 class="my-3 notif"><span style="color: rgb(202, 13, 161)">By Ekene Obika </span> October 22, 2019</h6>
								    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								  </div>
								  <img src="images/jumia.png" class="ml-3" alt="...">
								</div>
								

								<!-- </div>
								
							</div> -->

								
							</div>
						</div>

						<div class = "row mt-3">
							<div class = "col-12 card mbline py-3 notif" id = "">

							<!-- <div class = "row-12 mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = ""> -->
								

								<div class="media">
								  <div class="media-body">
								    <h5 class="my-2 notif">Partner with Gift Runner for Black Friday</h5>
								    <h6 class="my-3 notif"><span style="color: rgb(202, 13, 161)">By Ekene Obika </span> October 22, 2019</h6>
								    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
								  </div>
								  <img src="images/jumia.png" class="ml-3" alt="...">
								</div>
								

								<!-- </div>
								
							</div> -->

								
							</div>
						</div>

					  </div>

					  <!-- MORE -->
					  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
					  	
					  	<div class = "row mt-3">
							<div class = "col-10 offset-1 my-1 card mbline" id = "testimonial">

								
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



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
	



<!-- Modal Pending-->
<div class="modal fade" id="exampleModalScrollable" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Pending Orders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="card" style="">
      		<div class = "card-header alert-primary">
		    <b>Order 1</b>
			</div>
		  <div class="card-body">
		    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Item Name</th>
			      <th scope="col">Item Category</th>
			      <th scope="col">Qtn</th>
			      <th scope="col">Unit Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Sony Plasma TV</td>
			      <td>Television</td>
			      <td>3</td>
			      <td>50,000</td>
			    </tr>
			    <tr>
			    <th scope="row">2</th>
			      <td>HP Laptop</td>
			      <td>Laptop</td>
			      <td>1</td>
			      <td>100,000</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Panasonic Kettle</td>
			      <td>Electric Kettle</td>
			      <td>1</td>
			      <td>4,000</td>
			    </tr>
			  </tbody>
			</table>
		  </div>
		  <ul class="list-group list-group-flush">
		  	<li class="list-group-item">Customer Name: </li>
		    <li class="list-group-item">Customer's Location: </li>
		    <li class="list-group-item">Customer's Phone Number: </li>
		    <li class="list-group-item"><small class="text-muted">Date & time Requested: </small></li>
		   </ul>
		  <div class="card-body">
		    <button class="card-link btn btn-primary">Complete Order</button>
		    <button class="card-link btn btn-primary">Cancel Order</button>
		  </div>
		</div>
		<br>
		<div class="card" style="">
      		<div class = "card-header alert-warning">
		    <b>Order 2</b>
			</div>
		  <div class="card-body">
		    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Item Name</th>
			      <th scope="col">Item Category</th>
			      <th scope="col">Qtn</th>
			      <th scope="col">Unit Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Sony Plasma TV</td>
			      <td>Television</td>
			      <td>3</td>
			      <td>50,000</td>
			    </tr>
			    <tr>
			    <th scope="row">2</th>
			      <td>HP Laptop</td>
			      <td>Laptop</td>
			      <td>1</td>
			      <td>100,000</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Panasonic Kettle</td>
			      <td>Electric Kettle</td>
			      <td>1</td>
			      <td>4,000</td>
			    </tr>
			  </tbody>
			</table>
		  </div>
		  <ul class="list-group list-group-flush">
		  	<li class="list-group-item">Customer Name: </li>
		    <li class="list-group-item">Customer's Location: </li>
		    <li class="list-group-item">Customer's Phone Number: </li>
		    <li class="list-group-item"><small class="text-muted">Date & time Requested: </small></li>
		   </ul>
		  <div class="card-body">
		    <button class="card-link btn btn-primary">Complete Order</button>
		    <button class="card-link btn btn-primary">Cancel Order</button>
		  </div>
		</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Completed-->
<div class="modal fade" id="exampleModalScrollableCompleted" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Orders Completed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="card" style="">
      		<div class = "card-header alert-primary">
		    <b>Order 1</b>
			</div>
		  <div class="card-body">
		    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Item Name</th>
			      <th scope="col">Item Category</th>
			      <th scope="col">Qtn</th>
			      <th scope="col">Unit Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Sony Plasma TV</td>
			      <td>Television</td>
			      <td>3</td>
			      <td>50,000</td>
			    </tr>
			    <tr>
			    <th scope="row">2</th>
			      <td>HP Laptop</td>
			      <td>Laptop</td>
			      <td>1</td>
			      <td>100,000</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Panasonic Kettle</td>
			      <td>Electric Kettle</td>
			      <td>1</td>
			      <td>4,000</td>
			    </tr>
			  </tbody>
			</table>
		  </div>
		  <ul class="list-group list-group-flush">
		  	<li class="list-group-item">Customer Name: </li>
		    <li class="list-group-item">Customer's Location: </li>
		    <li class="list-group-item">Customer's Phone Number: </li>
		    <li class="list-group-item"><small class="text-muted">Date & time Requested: </small></li>
		    <li class="list-group-item"><small class="text-muted">Date & time Fulfilled: </small></li>
		   </ul>
		  <div class="card-body">
		  	<div class="alert alert-success" role="alert">
			  Status: Completed Successfully
			</div>
		    <button class="card-link btn btn-primary">See Review</button>

		  </div>
		</div>
		<br>
		<div class="card" style="">
      		<div class = "card-header alert-warning">
		    <b>Order 2</b>
			</div>
		  <div class="card-body">
		    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Item Name</th>
			      <th scope="col">Item Category</th>
			      <th scope="col">Qtn</th>
			      <th scope="col">Unit Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Sony Plasma TV</td>
			      <td>Television</td>
			      <td>3</td>
			      <td>50,000</td>
			    </tr>
			    <tr>
			    <th scope="row">2</th>
			      <td>HP Laptop</td>
			      <td>Laptop</td>
			      <td>1</td>
			      <td>100,000</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Panasonic Kettle</td>
			      <td>Electric Kettle</td>
			      <td>1</td>
			      <td>4,000</td>
			    </tr>
			  </tbody>
			</table>
		  </div>
		  <ul class="list-group list-group-flush">
		  	<li class="list-group-item">Customer Name: </li>
		    <li class="list-group-item">Customer's Location: </li>
		    <li class="list-group-item">Customer's Phone Number: </li>
		    <li class="list-group-item"><small class="text-muted">Date & time Requested: </small></li>
		    <li class="list-group-item"><small class="text-muted">Date & time Fulfilled: </small></li>
		   </ul>
		  <div class="card-body">
		    <div class="alert alert-success" role="alert">
			  Status: Completed Successfully
			</div>
		    <button class="card-link btn btn-primary">See Review</button>
		  </div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	

<!-- Modal Cancelled-->
<div class="modal fade" id="exampleModalScrollableCancelled" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Cancelled Orders</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<div class="card" style="">
      		<div class = "card-header alert-primary">
		    <b>Order 1</b>
			</div>
		  <div class="card-body">
		    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Item Name</th>
			      <th scope="col">Item Category</th>
			      <th scope="col">Qtn</th>
			      <th scope="col">Unit Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Sony Plasma TV</td>
			      <td>Television</td>
			      <td>3</td>
			      <td>50,000</td>
			    </tr>
			    <tr>
			    <th scope="row">2</th>
			      <td>HP Laptop</td>
			      <td>Laptop</td>
			      <td>1</td>
			      <td>100,000</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Panasonic Kettle</td>
			      <td>Electric Kettle</td>
			      <td>1</td>
			      <td>4,000</td>
			    </tr>
			  </tbody>
			</table>
		  </div>
		  <ul class="list-group list-group-flush">
		  	<li class="list-group-item">Customer Name: </li>
		    <li class="list-group-item">Customer's Location: </li>
		    <li class="list-group-item">Customer's Phone Number: </li>
		    <li class="list-group-item"><small class="text-muted">Date & time Requested: </small></li>
		    <li class="list-group-item"><small class="text-muted">Date & time Cancelled: </small></li>
		   </ul>
		  <div class="card-body">
		  	<div class="alert alert-danger" role="alert">
			  Status: Cancelled
			</div>
		    <button class="card-link btn btn-primary">See Review</button>

		  </div>
		</div>
		<br>
		<div class="card" style="">
      		<div class = "card-header alert-warning">
		    <b>Order 2</b>
			</div>
		  <div class="card-body">
		    <table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">S/N</th>
			      <th scope="col">Item Name</th>
			      <th scope="col">Item Category</th>
			      <th scope="col">Qtn</th>
			      <th scope="col">Unit Price</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Sony Plasma TV</td>
			      <td>Television</td>
			      <td>3</td>
			      <td>50,000</td>
			    </tr>
			    <tr>
			    <th scope="row">2</th>
			      <td>HP Laptop</td>
			      <td>Laptop</td>
			      <td>1</td>
			      <td>100,000</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Panasonic Kettle</td>
			      <td>Electric Kettle</td>
			      <td>1</td>
			      <td>4,000</td>
			    </tr>
			  </tbody>
			</table>
		  </div>
		  <ul class="list-group list-group-flush">
		  	<li class="list-group-item">Customer Name: </li>
		    <li class="list-group-item">Customer's Location: </li>
		    <li class="list-group-item">Customer's Phone Number: </li>
		    <li class="list-group-item"><small class="text-muted">Date & time Requested: </small></li>
		    <li class="list-group-item"><small class="text-muted">Date & time Cancelled: </small></li>
		   </ul>
		  <div class="card-body">
		    <div class="alert alert-danger" role="alert">
			  Status: Cancelled
			</div>
		    <button class="card-link btn btn-primary">See Review</button>

		  </div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- UPLOAD TAB MODAL STARTS HERE -->


<!-- Modal Add Item-->
<div class="modal fade bd-example-modal-lg" id="staticBackdropAddItem" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class = "card card-body">
<form method = "POST" action = "additem.php" enctype="multipart/form-data" id = "additemform">
      <div class="modal-body">
      	<div class = "row">
      		<div class = "col-5">
        		<img src="images/noimage3.jpg" class="card-img-top" alt="...">      					
      					<div class="form-group row mt-2">
						    <label for="exampleFormControlFile1" class="col-sm-12 col-form-label">Select Image<span style = "color:red">*</span></label>
						    <div class="col-sm-12">
						    <input id="uploadImage" type="file" accept="image/*" name="profile" class="form-control-file">
							</div>
						 </div>						 
						</div>
						<div class = "col-7">
							<div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Category<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemcategory" name = "valcat" value="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label mr-0 pr-0">Item Name<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemname" name = "itemname" value="">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Unit Price<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemprice" name = "itemprice" value="">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Colour<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemcolor" name = "itemcolor" value="">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-3 col-form-label">Quantity<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="number" class="form-control" id = "itemqty" name = "itemqty" value="">
						    </div>
						  </div>
						</div>
						</div>
	      			</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" id  = "addItemClosebtn">Close</button>
	        <button type="submit" class="btn btn-primary" id = "additembtn" >Save</button>
	      </div>
	      </form>
  		</div>
    </div>
  </div>
</div>


<!-- Modal Edit Item-->
<div class="modal fade bd-example-modal-lg" id="staticBackdropEditItem" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class = "card card-body" id = "bodyOfEditItem">

  		</div>
    </div>
  </div>
</div>


<!-- Remove Modal -->
<div class="modal fade" id="staticBackdropRemoveItem" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Remove Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class = "card card-body" id = "bodyOfDeleteItem">
      
      </div>
    </div>
  </div>
</div>


<!-- Modal NeedHelp-->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form method="" action="" >	
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
			<div class = "row">
			  <div class="form-group col">
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Name">
			    </div>
			  <div class="form-group col">
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Email">
			  </div>
			</div>

			  <div class="form-group">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder = "Ask Your Question Here"></textarea>
			  </div>
			<p>You can Call or Send an Email :</p>
			<p>Phone: +2347065692733</p>
			<p>Email: info@giftrunner.com</p>
		</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
      </form>
    </div>
  </div>  
</div>

<script>




function editItem(editbtn){

	var itemName = $(editbtn).parent('#btnparent').siblings('#itemName').html();
	var catName = $(editbtn).parent('#btnparent').siblings('#catName').html();
	var itemPrice = $(editbtn).parent('#btnparent').siblings('#itemRawPrice').html();
	var itemColor = $(editbtn).parent('#btnparent').siblings('#itemColor').html();
	var itemQty = $(editbtn).parent('#btnparent').siblings('#itemQty').html();
	var itemId = $(editbtn).parent('#btnparent').siblings('#itemId').html();
	var itemPic = $(editbtn).parent('#btnparent').siblings('#itemPic').html();

	var data = {"itemName":itemName,"catName":catName,"itemPrice":itemPrice,"itemColor":itemColor,"itemQty":itemQty,"itemId":itemId, "itemPic":itemPic};

	$('#bodyOfEditItem').load("vendoredititem.php",data);
	
}

 function editform(savebtn){
 // var btnid = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#itemId').val();
 // var edititembtn = "edititembtn"+btnid;

  
 
 }


	
	// var itemName = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#itemname').val();
	// var catName = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#catname').val();
	// var itemPrice = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#itemprice').val();
	// var itemColor = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#itemcolor').val();
	// var itemQty = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#itemqty').val();
	// var itemId = $(savebtn).parent('#editbtndiv').siblings('#divsib').find('#itemid').html();	

	// $.ajax({

	// 	url: "vendorupdateitem.php",
	// 	type: "POST",
	// 	data: {"itemName": itemName, "catName": catName, "itemPrice": itemPrice, "itemId": itemId, "itemColor": itemColor, "itemQty": itemQty},
	// 	dataType: "text",
	// 	success(msg){

	// 	},
	// 	error(errmsg){

	// 	}

	// })


function editItemCard(editcardbtn){

	var itemid = $(editcardbtn).parents('#grandfather').siblings('#itemid').html();
	var btnid = "editrecord"+itemid;

	$('#'+btnid).trigger("click");

	
}

function removeItemCard(removecardbtn){

	var itemid = $(removecardbtn).parents('#grandfather').siblings('#itemid').html();
	var btnid = "removerecord"+itemid;

	$('#'+btnid).trigger("click");
	
	
}


function deleteItem(deletebtn){

	var itemId = $(deletebtn).parent('#btnparent').siblings('#itemId').html();

	var data = {"itemId":itemId};

	$('#bodyOfDeleteItem').load("vendordeleteitem.php",data);
	
}

function finalRemoveItem(removebtn){

	var itemId = $(removebtn).siblings('#itemid').html();

	var data = {"itemId":itemId};

	$('#loaddiv').load("vendorremoveitem.php",data);
	$('#tableofitems').load("vendor_dashboard.php #tableofitems2");
	$('#bodyofitem').load("itemsadded.php");
}


$(document).ready(function(){



$('#bodyofitem').load("itemsadded.php");

$('#btnupload').click(function(){

	
	$('#fader').fadeOut(5000);
})



$('#selectcategory').change(function(){
var valcat = $('#selectcategory').val();

$.ajax({

		url: "loadmake.php",
		type: "POST",		
		data: {"valcat":valcat},		
		dataType: "text",
		success(msg){

		var rec = JSON.parse(msg);
		// alert(msg);
		// alert(rec.v_item_name);
		var make_string = '';
		$.each(rec,function(key,val){
			
			make_string += "<option value='" + val.v_item_name + " '/>";
				
				});

			$("#data2").html(make_string);

							
		},
		error(errmsg){
			console.log(errmsg);
			
		}
	})

})



$('#input2').change(function(){

var categoryName = $('#selectcategory').val();
$('#itemcategory').val(categoryName);

var selectItemName = $('#input2').val();
$('#itemname').val(selectItemName);


})

// $('#additembtn').click(function(){


 $("#additemform").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
    url: "additem.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
      // alert(data);
      },
     error: function(e) 
      {
   alert(e);
      }          
    });

$('#bodyofitem').load("itemsadded.php");
$('#tableofitems').load("vendor_dashboard.php #bodyofitem");
$('#tableofitems').load("vendor_dashboard.php #tableofitems2");
$('#addItemClosebtn').trigger("click");

 }));


 


// var valcat = $('#selectcategory').val();
// var make = $('#input2').val();
// var a = $('#itemname').val();
// var b = $('#itemprice').val();
// var c = $('#itemcolor').val();
// var d = $('#itemqty').val();

// $.ajax({

// 		url: "additem.php",
// 		type: "POST",		
// 		data: {"valcat":valcat, "make": make, "itemname":a, "itemprice":b, "itemcolor":c, "itemqty":d},		
// 		dataType: "text",
// 		success(msg){
					
// 		},
// 		error(errmsg){
// 			// console.log(errmsg);
// 		alert("failed");
			
// 		}
// 	})



// })

// $('#formupload').submit(function(){

// 	$('#alertspan').css("background-color", "yellow");
// })




})



</script>

</body>
</html>