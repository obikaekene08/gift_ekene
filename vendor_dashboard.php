<?php

require("Vendor.php");

$obj = new Vendor;
if(!isset($_SESSION['user'])){

	header("location:signup.php");

}else{

	require("header.php");

	$emaildetails = $obj->getdetailswithemail($_SESSION['useremail'],'vendors');

	if(!empty($emaildetails)){

		$_SESSION['user'] = $emaildetails['vendor_id']; //reassign the saved id if any as the session[user]

	}else{

		if(isset($_SESSION['route']) && ($_SESSION['route'] == 'receive')){

			$emailtable = 'receivers';

		}else if (isset($_SESSION['route']) && ($_SESSION['route'] == 'gift')){

			$emailtable = 'gifters';

		}else if (isset($_SESSION['route']) && ($_SESSION['route'] == 'vendor')){

			$emailtable = 'vendors';

		}

		$emailsignup = $obj->signupemail($_SESSION['useremail'],$emailtable);

	}

	$details = $obj->getdetails($_SESSION['user'],'vendors');

	$cat_table = $obj->getseveral('category_table');

	$fetch_catname = $obj->getseveralwhereNoGroup('vendor_item','category_table','vendor_item.v_cat_id','category_id','vendor_id',$_SESSION['user'],'ORDER BY', 'category_name ASC');

	$fname = $details['v_fname'];
	$lname = $details['v_lname'];
	$bname = $details['v_companyname'];
	$address = $details ['v_address'];
	$email = $details['v_email'];
	$phone = $details['v_phone'];



	$details2  = $obj->getdetails($_SESSION['user'], 'vendor_business_info');

	$cname = $details2['company_name'];
	$dname = $details2['director_name'];
	$cemail = $details2['company_email'];
	$ctype = $details2['company_type'];
	$rc = $details2['rc_number'];


	$details3  = $obj->getdetails($_SESSION['user'], 'vendor_bank_info');

	$bkname = $details3['bank_name'];
	$acnum = $details3['account_number'];
	$acname = $details3['account_name'];
	$bvn = $details3['bvn'];
	$iban = $details3['iban'];
	$swift = $details3['swift'];



}

?>

	<div class = "row">
		<div class = "col-10 offset-1">
		    <div class="alert alert-primary pt-3" role="alert" >
			  <h3>Hi <?php echo ucfirst($details['v_fname']).",";?> <small>Welcome To Your DashBoard</small></h3>
			</div>
		</div>
	</div>
	<div class = "row" id = "searchbox_view_merchant">
		<div class = " offset-1 col-10 mb-2">	
				<form class="form-inline ">
			    <input class="form-control mr-2 col-md-6 col-sm-9 col-11" type="search" placeholder="Search for products and couples" aria-label="Search">
			    <button class="btn btn-outline-danger giftBtn mr-sm-0 mr-2" type="submit">Search</button>

				
				<a href="gifterprofile.php" class="btn btn-danger mr-2 offset-md-2 giftBtn">Give a Gift</a>
				<a href="receiverprofile.php" class="btn btn-outline-danger giftBtn">Receive Gifts</a>

			  	</form>
		</div>

	</div>

	<div class = "row" id = "">
		<div class = "col-10 offset-1 my-1">

				<ul class="nav nav-pills px-2 py-1 mx-0 alert-danger" id="pills-tab" role="tablist" style = "border-radius: 5px">
					  <li class="nav-item mt-md-1">
					    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
					  </li>
					  <li class="nav-item mt-md-1">
					    <a class="nav-link" id="pills-upload-tab" data-toggle="pill" href="#pills-upload" role="tab" aria-controls="pills-upload" aria-selected="false">Upload Item</a>
					  </li>
					  <li class="nav-item mt-md-1">
					    <a class="nav-link" id="pills-view-tab" data-toggle="pill" href="#pills-view" role="tab" aria-controls="pills-view" aria-selected="false" onclick = "$('#tableofitems').load('vendor_dashboard.php #tableofitems2');">View Items</a>
					  </li>
					  <li class="nav-item mt-md-1">
					    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Profile</a>
					  </li>
					  <li class="nav-item mt-md-1">
					    <a class="nav-link" id="pills-analytics-tab" data-toggle="pill" href="#pills-analytics" role="tab" aria-controls="pills-analytics" aria-selected="false">Analytics</a>
					  </li>
					  <li class="nav-item mt-md-1">
					    <a class="nav-link" id="pills-needhelp-tab" data-toggle="modal" data-target="#staticBackdrop" href="#pills-needhelp" role="tab" aria-controls="pills-needhelp" aria-selected="false">Need Help</a>
					  </li>
					  <li class="nav-item mt-md-1">
					    <a class="nav-link btn btn-info" id="pills-notification-tab" data-toggle="pill" href="#pills-notification" role="tab" aria-controls="pills-notification" aria-selected="false">Notifications <span class="badge badge-light">5</span></a>
					  </li>
					  <li class="nav-item mt-md-1">
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
								    <div class="col-md-2">
								      <img class = "responsive img-fluid rounded" src="<?php if($details['v_pic_name'] != ""){ echo $details['v_pic_name']; }else{echo 'images/avatar.png';} ?>" class="card-img" alt="..." style = "max-height:180px;">
								      <form method = "POST" action = "vendor_image_upload.php" enctype = "multipart/form-data" id = "profileformpic">
								  	<div class="form-group">
									    <div class="col-sm-10">								    	
									     <input type='file' name='profile'>
									     <button type = "submit" class="btn-sm btn btn-success mt-2" id = "btnupload">Upload Picture</button>
									     
									 </div>
									</div>
									</form>
								    </div>
								    <div class="offset-md-1 col-md-9">
								      <div class="card-body" style = "background-color: #0BB2F0; border-radius:5px">
								        <h5 class="card-title"><?php echo $details['v_companyname'] ?></h5>
								        <p class="card-text"><b>Stock Category: </b>
								        	<?php if(!empty($fetch_catname)){ foreach($fetch_catname as $v){echo $v['category_name'].", ";} }else{ echo "None";}?>
								        </p>
								        <p class=""><small class="text-muted"><b>Orders Completed: </b> <?php echo "None" ?></small></p>
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
								    
								  </div>
								</div>
								
							</div>
						</div>
						
						<div class = "row mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = "">
								<h4 class = "mb-3" style="">ORDERS</h4>
								<div class = "row">
									<div class = "col-md-4 col-12">
									<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollable">
									  Pending Orders <span class="badge badge-light">5</span>
									</button>
									</div>
									<div class = "col-md-4 col-12 mt-2">
									<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollableCompleted">
									  Completed Orders <span class="badge badge-light">10</span>
									</button>
									</div>
									<div class = "col-md-4 col-12 mt-2">
									<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollableCancelled">
									  Cancelled Orders <span class="badge badge-light">2</span>
									</button>
									</div>
									<div class = "col-md-4 col-sm-12 text-center mt-2">
									<div class="alert alert-dark block" role="alert">
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
									<div class = "col-md-4 col-12">
									<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalScrollable">
									  View Uploaded Items <span class="badge badge-light">5</span>
									</button>
									</div>
									<div class = "col-md-4 col-12 mt-2">
									<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModalScrollableCompleted">
									  Items Approved <span class="badge badge-light">10</span>
									</button>
									</div>
									<div class = "col-md-4 col-12 mt-2">
									<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalScrollableCancelled">
									  Items Rejected <span class="badge badge-light">2</span>
									</button>
									</div>
									<div class = "col-md-4 col-12 mt-2">
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
									<div class = "col mt-2">
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
									<div class = "col-md-6 col-12">
										<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="selectCategory">Choose Category</label>
											  </div>
											  <input class="form-control" id="selectcategory" list='selectData' name = "category" value = "">
											    <datalist id ="selectData">
											    	<?php foreach($cat_table AS $k => $v){ ?>
										      	<option value="<?php echo $v['category_name']?>" label= "<?php echo $v['category_synonyms']?>"/>
										      		<?php }?>										      	
										      </datalist>										
											</div>
									</div>
									<div class = "col-md-6 col-12">
										<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <label class="input-group-text" for="selectMake">Choose Make</label>
											  </div>
											  <input class="form-control" list='makeData' name = "selectMake" id = "selectMake">
											    <datalist id ="makeData">
											    											      										      											      	
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
								  	<?php if(!empty($fetch_catname)){$i = 1; foreach($fetch_catname as $v){?>
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
								   <?php  $i++;}}?>
								  </tbody>
								</table>								
							</div>
						</div>

					  </div>

					  <!-- PROFILE -->
					  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


					  	
					  	<div class = "row mt-3">
							<div class = "col-12 my-1 card card-body mbline" id = "testimonial">

							<div class="accordion mb-3" id="accordionExample">
							  <div class="card">
							    <div class="card-header" id="headingOne">
							    <div class = "row">
							      <h2 class="mb-0 mx-0 col-6">
							        <button class="btn btn-link" type="button" id = "contactDetailsBtn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
							          <h5 class = "accordstyle">1. Contact Details</h5>
							        </button>
							      </h2>
							      <p class = "offset-md-5 offset-3 col-1 pt-3" style="text-align: center"><i class ="fa fa-pen" id = "contactDetailsPen"></i></p>
							  		</div>
							    </div>

							    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
							      <div class="card-body mx-2 ml-4">
							       
									<form method = "POST" action = "editvendorprofile.php" class = "editVendorProfileForm">
									<div>
										<h5 class = "form-group row">Details of Authorized Contact Person</h5>
									</div>
									<div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">First Name</label>
									    <div class="col-md-4 col-12">
									      <input type="text" class="form-control" id="fname" name = "v_fname" value="<?php echo $fname ?>">
									    </div>

									    <label for="staticEmail" class="col-md-2 col-form-label">Last Name</label>
									    <div class="col-md-4 col-12">
									      <input type="text" class="form-control" id="lname" name = "v_lname" value="<?php echo $lname ?>">
									    </div>
									 </div>
									   <div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">Brand Name</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="bname" name = "v_companyname" value="<?php echo $bname ?>">
									    </div>
									  </div>
									  
									  <div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">Phone Number</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="vphone" name = "v_phone" value="<?php echo $phone ?>">
									    </div>
									  </div>
									   <div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">Email Address</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="vemail" name = "v_email" value="<?php echo $email ?>">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">Office Address</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="vaddress" name = "v_address" value="<?php echo $address ?>">
									    </div>
									  </div>									  
									  
									  <div class="form-group row">
										  <div class="my-0 col-3 offset-md-3">
										  	<div class=" my-0 infoSavedAlert" role="alert" id = "bankinfosaved"></div>
										  </div>
										  <div class = "col-md-4 offset-md-2 col-6">					  	  
										  	<p align="right"><button type="submit" class="btn btn-primary">Save Changes</button></p>
										  </div>
									   </div>

									</form>



							      </div>
							    </div>
							  </div>


							  <div class="card">
							    <div class="card-header" id="headingTwo">
							    <div class = "row">
							      <h2 class="mb-0 mx-0 col-6">
							        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" id = "bizInfoBtn">
							          <h5 class = "accordstyle">2. Business Information</h5>
							        </button>
							      </h2>
							      <p class = "offset-md-5 offset-3 col-1 pt-3" style="text-align: center" ><i class ="fa fa-pen" id = "bizInfoPen" ></i></p>
							  		</div>
							    </div>

							    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							      <div class="card-body mx-2 ml-4">
							       
									<form method = "POST" action = "editvendorprofile.php" class = "editVendorProfileForm">
									<div>
										<h5 class = "form-group row">Company Details</h5>
									</div>
									<div class="form-group row">
									    <label for="company_name" class="col-md-2 col-form-label">Business Legal Name</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="company_name" name = "company_name" value="<?php echo $cname ?>">
									    </div>
									  </div>
									
									  <div class="form-group row">
									    <label for="director_name" class="col-md-2 col-form-label">Director's Name</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="director_name"  name = "director_name" value="<?php echo $dname ?>">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="company_email" class="col-md-2 col-form-label">Business Email</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="company_email"  name = "company_email" value="<?php echo $cemail ?>">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="company_type" class="col-md-2 col-form-label">Business Type</label>
									    <div class="col-md-10">
									      <select class="form-control" id="company_type"  name = "company_type">
									      	<option value="<?php echo $ctype ?>"><?php if(isset($_SESSION['user'])){ echo $ctype;}else {echo "Select Business Type";} ?></option>
									      	<option value="BN">Business Name</option>
									      	<option value="LLC">Limited Liability Company</option>
									      	<option value="PLC">Public Liability Company</option>
									      </select>
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="rc_number" class="col-md-2 col-form-label">Business Reg. Number</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="rc_number"  name = "rc_number" value="<?php echo $rc ?>">
									    </div>
									  </div>

									   <div class="form-group row">
										  <div class="my-0 col-3 offset-md-3">
										  	<div class=" my-0 infoSavedAlert" role="alert" id = "bankinfosaved"></div>
										  </div>
										  <div class = "col-md-4 offset-md-2 col-6">					  	  
										  	<p align="right"><button type="submit" class="btn btn-primary">Save Changes</button></p>
										  </div>
									   </div>
									  
									</form>



							      </div>
							    </div>
							  </div>



							  <div class="card">
							    <div class="card-header" id="headingThree">
							    <div class = "row">
							      <h2 class="mb-0 mx-0 col-6">
							        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" id = "bankInfoBtn">
							          <h5 class = "accordstyle">3. Bank Information</h5>
							        </button>
							      </h2>
							      <p class = "offset-md-5 offset-3 col-1 pt-3" style="text-align: center"><i class ="fa fa-pen" id = "bankInfoPen"></i></p>
							  		</div>
							    </div>

							    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							      <div class="card-body mx-2 ml-4">
							       
									<form method = "POST" action = "editvendorprofile.php" class = "editVendorProfileForm">
									<div>
										<h5 class = "form-group row">Business Bank Details</h5>
									</div>
									<div class="form-group row">
									    <label for="bank_name" class="col-md-2 col-form-label">Bank Name<span style = "color:red">*</span></label>
									    <div class="col-md-10">
									      <select class="form-control" name = "bank_name" id="bank_name">
									      	<option value="<?php echo $ctype ?>"><?php if(isset($_SESSION['user'])){ echo $bkname;}else {echo "Select Bank Name";} ?></option>
									      	<option value="Access Bank">Access Bank</option>
									      	<option value="Fidelity Bank">Fidelity Bank</option>
									      	<option value="First Bank">FCMB</option>
									      	<option value="Fidelity Bank">Fidelity Bank</option>
									      	<option value="Fidelity Bank">GTB</option>
									      	<option value="Fidelity Bank">Keystone Bank</option>
									      	<option value="Fidelity Bank">Stanbic IBTC Bank</option>
									      	<option value="Fidelity Bank">Sterling Bank</option>
									      	<option value="Fidelity Bank">UBA</option>
									      	<option value="Fidelity Bank">Union Bank</option>
									      	<option value="Fidelity Bank">Zenith Bank</option>
									      </select>
									    </div>
									  </div>
									  
									<div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">Account Number<span style = "color:red">*</span></label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="account_number" name = "account_number" value="<?php echo $acnum ?>">
									    </div>
									</div>


									<div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">Account Name<span style = "color:red">*</span></label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="account_name" name = "account_name" value="<?php echo $acname ?>">
									    </div>
									  </div>

									<div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">BVN Number<span style = "color:red">*</span></label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="bvn" name = "bvn" value="<?php echo $bvn ?>">
									    </div>
									 </div>

									 <div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">IBAN</label>
									    <div class="col-md-10">
									      <input type="text" class="form-control" id="iban" name = "iban" value="<?php echo $iban ?>" placeholder = "Optional">
									    </div>
									 </div>

									 <div class="form-group row">
									    <label for="staticEmail" class="col-md-2 col-form-label">SWIFT</label>
									    <div class="col-md-10">
									      <input type="text"  class="form-control" id="swift" name ="swift" value="<?php echo $swift ?>" placeholder = "Optional">
									    </div>
									 </div>
								
									 
									  <div class="form-group row">
										  <div class="my-0 col-3 offset-md-3">
										  	<div class=" my-0 infoSavedAlert" role="alert" id = "bankinfosaved"></div>
										  </div>
										  <div class = "col-md-4 offset-md-2 col-6">					  	  
										  	<p align="right"><button type="submit" class="btn btn-primary">Save Changes</button></p>
										  </div>
									   </div>

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
			<p>You can call us or send us an email :</p>
			<p>Phone: +2347065692733</p>
			<p>Email: info@giftmummy.com</p>
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

			$("#makeData").html(make_string);

							
		},
		error(errmsg){
			console.log(errmsg);
			
		}
	})

})


$('#selectcategory').focus(function(){

$('#selectcategory').val('');

})



$('#selectMake').change(function(){

var selectItemName = $('#selectMake').val();
$('#itemname').val(selectItemName);


})

$('#selectcategory').change(function(){

$('#selectMake').val('');
var categoryName = $('#selectcategory').val();
$('#itemcategory').val(categoryName);


})

$('#selectcategory').focus(function(){

$('#selectMake').val('');


})


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
      
  		$('#bodyofitem').load("itemsadded.php");		
		$('#tableofitems').load("vendor_dashboard.php #tableofitems2");
      },
     error: function(e) 
      {
   alert(e);
      }          
    });


$('#addItemClosebtn').trigger("click");

 }));


//Edit Profile Codes

 $('#contactDetailsPen').click(function(){
 	$('#contactDetailsBtn').trigger("click");
 })
  $('#bizInfoPen').click(function(){
 	$('#bizInfoBtn').trigger("click");
 })
   $('#bankInfoPen').click(function(){
 	$('#bankInfoBtn').trigger("click");
 })



$(".editVendorProfileForm").on('submit',(function(e) {
e.preventDefault();
$.ajax({
url: "editvendorprofile.php",
type: "POST",
data:  new FormData(this),
contentType: false,
     cache: false,
processData:false,
success: function(data)
  {

  	if(data != ''){
  		$('.infoSavedAlert').fadeIn('slow');
		$('.infoSavedAlert').addClass('alert alert-success');
		$('.infoSavedAlert').html('Successfully Saved');
		$('.infoSavedAlert').fadeOut('slow');
  	}
  },
 error: function(e) 
  {
alert(e);
  }          
});

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