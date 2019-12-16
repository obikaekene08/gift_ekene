<?php

require("Vendor.php");

$obj = new Vendor;
if(!isset($_SESSION['user'])){

	header("location:signup.php");

}

require("header.php");
$details = $obj->getdetails($_SESSION['user'],'vendors');

$cat_table = $obj->getseveral('category_table');

$make_table = $obj->getseveral('category_table');

// echo "<pre>";
// print_r($cat_table);
// echo "</pre>";





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

				
				<button type="button" class="btn btn-danger mr-2 offset-md-2">Give a Gift</button>
				<button type="button" class="btn btn-outline-danger">Receive Gifts</button>

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
								      <img src="<?php if($details['v_pic_name'] != ""){ echo $details['v_pic_name']; }else{echo 'images/avatar.png';} ?>" class="card-img" alt="...">
								      <!-- if($_details['v_pic_name'] != ""){ echo $_details['v_pic_name']; }else{echo 'images/avatar.jpg';} -->
								    </div>
								    <div class="col-md-8">
								      <div class="card-body">
								        <h5 class="card-title"><?php echo $details['v_companyname'] ?></h5>
								        <p class="card-text"><b>Stock Category: </b>Category 1, Category 2, Category 3, Category 4</p>
								        <p class=""><small class="text-muted"><b>Orders Completed: </b> 3</small></p>
								        <p class = "" id = "alertspan" ><?php if(isset($_SESSION['picupload']) && $_SESSION['picupload'] == 1){
									     	echo "Upload Successful";

									     	$_SESSION['picupload'] = 0;
									     	
									     }
									     
									     elseif (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
									     	foreach($_SESSION['errors'] as $v){
									     		echo $v."<br>";
									     	}
									     	$_SESSION['errors'] = array();
									     }

									     


									     ?></p>
								      </div>
								    </div>
								    <form method = "POST" action = "vendor_image_upload.php" enctype = "multipart/form-data" id = "formupload">
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
							<div class = "col-12 my-1 card card-body mbline" id = "" style="height:50rem">
								<div class = "row">
									<div class = "col">
										<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="inputGroupSelect01">Choose Category</label>
											  </div>
											  <input class="form-control" id="selectcategory" list='data1' name = "category" value = "" id = "input1">
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
											  <input class="form-control" id="inputGroupSelect01" list='data2' name = "category" id = "input2" value = "">
											    <datalist id ="data2">
											    	<?php foreach($make_table AS $k => $v){ ?>
										      	<option value="<?php echo $v['v_item_name']?>" label= ""/>
										      		<?php }?>										      	
										      </datalist>									
											</div>
									</div>


								</div>
								<div class = "row">
									<div class = "col-md-3 col-6">
										<div class="card text-center">
										  <div class="card-body">
										  	<img src="images/jumia.png" class="card-img-top" alt="...">
										    <h5 class="card-title mt-2">Item Name</h5>
										    <p class="card-text"><b>Unit Price:</b> N500</p>
										    <p class="card-text"><b>Quantity:</b> 10</p>
										    <a href="#staticBackdropAddItem" class="btn btn-primary" data-toggle="modal">Add Item</a>
										  </div>
										</div>


									</div>


								</div>

							
								
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
									  <p align="right"><button type="submit" class="btn btn-primary mr-2">Edit Details</button><button type="submit" class="btn btn-primary" disabled>Save Changes</button></p>
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

	<div class = "row mt-3">
		<div class = "col bline">

	<div class = "row mt-3">
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
<div class = "row">
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
<div class="modal fade" id="staticBackdropAddItem" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
        <img src="images/jumia.png" class="card-img-top" alt="...">
      	
      					<div class="form-group row mt-2">
						    <label for="exampleFormControlFile1" class="col-sm-4 col-form-label">Select Image<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						    <input type="file" class="form-control-file" id="exampleFormControlFile1">
							</div>
						 </div>
						
						<div class="form-group row">
						    <label for="staticEmail" class="col-sm-4 col-form-label">Item Name<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-4 col-form-label">Unit Price<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-4 col-form-label">Colour<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="staticEmail" value="">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-4 col-form-label">Quantity<span style = "color:red">*</span></label>
						    <div class="col-sm-8">
						      <select class="form-control" id="">
						      	<option value="">1</option>
						      	<option value="">2</option>
						      	<option value="">3</option>
						      	<option value="">4</option>
						      </select>
						    </div>
						  </div>

	      			</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" name = "" id = "additembtn">Save</button>
	      </div>
	      </form>
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

$(document).ready(function(){

$('#selectcategory').change(function(){
var valcat = $('#input1').val();
var selected = $('#input2').val();
$('#input2').load("loadmake.php?mcat="+valcat+"&selected="+selected);

})

$('#additembtn').click(function(){
	// event.preventDefault();
// var valcat = $('#input1').val();
// var selected = $('#input2').val();
// $('#additembtn').load('additem.php?valcat='+valcat);



$.ajax({

		url: "additem.php",
		type: "POST",		
		data: "valcat="+valcat,		
		dataType: "text",
		success(msg){

		alert(msg);
		



		
			
		},
		error(errmsg){
			console.log(errmsg);
			
		}
	})




// var a = $('#itemname').val();
// var b = $('#itemprice').val();
// var c = $('#itemcolor').val();
// var d = $('#itemqty').val();
// var e = $('#itemqty').val();

// $.ajax({

// 	url: "additem.php",
// 	type: "POST",
// 	data: {"valcat":valcat,"selected":selected},
// 	dataType: "text",
// 	success(s){
// 		alert(s);
		
// 	},
// 	error(msg){

// 	}
// })


})

$('#formupload').submit(function(){

	$('#alertspan').css("background-color", "yellow");
})


})

</script>

</body>
</html>