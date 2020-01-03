<?php


require("Gifter.php");

$obj = new Gifter;
if(!isset($_SESSION['user'])){

	header("location:giveagift.php");

}

require("header2.php");

$details = $obj->getdetails($_SESSION['user'],'gifters');

$details2 = $obj->getdetails2($_SESSION['$receiver_id'],'receivers');
$details3 = $obj->getdetails3($_SESSION['$receiver_id'],$_SESSION['$r_event_id'],'receiver_events');

$gift_for_checkout = $obj->getcheckoutitems($_SESSION['user'],$_SESSION['$r_event_id']);

$_SESSION['checkout_items'] = $gift_for_checkout;

// print_r($gift_for_checkout);


?>

	<a href="receiverprofile.php" class="btn btn-outline-danger mr-2 my-2 offset-md-9">Receive Gifts</a>
	<a href="logout.php" class="btn btn-danger my-2">Logout</a>
    <div class = "row">
    	<div class = "col-12">
		    <div class="alert alert-primary" role="alert" col-8 offset-2>
			  <h3>Hi <?php echo ucfirst($details['g_fname']).","?> <small> Welcome To Your Profile Page</small></h3>
			</div>
		</div>
	</div>
	<div class="container-fluid">
   

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      
      <div class="col-lg-2 mb-4">
	  <div>
	  <img src="<?php if($details['g_pic_name'] != ""){ echo $details['g_pic_name']; }else{echo 'images/avatar.png';} ?>" class="card-img" alt="...">
	  <form method = "POST" action = "gifter_image_upload.php" enctype = "multipart/form-data" id = "uploadform">
	  	<div class="form-group">
		    <div class="col-sm-10">
		     <input type='file' name='profile'>
		     <button type = "submit" class="btn-sm btn btn-info mt-2" id = "btnupload">Upload Picture</button>
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
		</form>
	 
	  </div>
        <div class="list-group">
          <a href="gifterprofile.php" class="list-group-item">Main Page</a>
          <a href="editprofile.php" class="list-group-item">Edit Profile</a>          
          <a href="changepassword.php" class="list-group-item">Change Password</a>
          <a href="logout.php" class="list-group-item">Log Out</a>
         
          
        </div>
      </div>
      <!-- Content Column -->
      <div class="col-lg-10 mb-4">
       
	  	<div class = "row mt-3">
			<div class = "col-12 my-1 card mbline" id = "">


				<div class = "row mx-1">
			<div class = "col-12 card-body pt-1 pb-0 mb-0">
				  <h2 class ="pb-0 text-center"><?php echo $details3['r_event_title']?>: </h2>
				 							
			  	<!-- <div class = "offset-3 my-2 row">
				      <label for="colqty" class = "col-3 mr-1 pr-0 text-right ">Qty in Collection:</label>				      
				      <div id = "colqty" class = "col-1 ml-0" style = "width:40%; font-weight: bold; border:2px solid red; display:inline; padding:3px; " > </div>
				      <a href="" class = "btn btn-primary col-3 offset-1">Proceed to Payment</a>
				      <a href="gifterviewreceiver.php" class = "btn btn-primary offset-1 col-2 " style = "display:inline">Cancel</a>
				  </div> -->

			  </div>
			</div>

		


			<div class = "row mt-2 mx-1">
				<div class = "col-12 card card-body pt-1">
					<h4 class ="mb-3 mt-0">See Gift Items You Selected: </h4>
					<form method = "POST" action = "processpayment.php" id = "formtable">
					<table class="table table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">S/N</th>
					       <th scope="col">Item</th>
					      <th scope="col">Amount</th>
					      <th scope="col">Quantity</th>
					      <th scope="col">SubTotal</th>
					      <th scope="col">Action</th>          
					    </tr>
					  </thead>
					  <tbody>
					    <?php $total = 0; $totalqty = 0;$i = 1; if(isset($gift_for_checkout)){foreach($gift_for_checkout as $k => $v) {  ?>
					    <tr>
					      <td><?php echo $i?></td>
					       <td><?php echo $v['v_item_name']?></td>
					       <td><?php echo "&#8358;".number_format($v['v_item_price'],2)?></td>
					       <td><?php echo $v['g_item_qty']?></td>
					       <td><?php echo "&#8358;".number_format(($v['v_item_price'])*($v['g_item_qty']))?></td>
					       <td id = "itemid" style = "display: none"><?php echo $v['g_selection_id']?></td>
					       <td id = "loaddiv" style = "display: none"></td>
					       <td id = "parent"><button class = "btn btn-outline-danger btn-sm" type = "button" style = "border: none; " id = "deletebtn" onclick = "deleteItem(this);">Remove</button></td>      
					    </tr>
					  <?php $total = $total + (($v['v_item_price'])*($v['g_item_qty'])); $totalqty = $totalqty + $v['g_item_qty']; $i++; }}?>
					    
						<tr>   
					      <th colspan='2' style='text-align:right'>TOTAL</th>
					      <td></td>
					      <th><b><?php echo $totalqty;?></th>
					      <th><?php echo "&#8358;".number_format($total,2)?></th>
					      <th></th>  
					    </tr>
					  </tbody>
					</table>
					<div style='text-align:right'><button class='btn btn-info mr-2' type  = "submit">Proceed to Make Payment</button>
					<a href="gifterviewreceiver.php" class = "btn btn-danger " style = "display:inline">Cancel</a>
					</div>
					</form>
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


function deleteItem(finalDeletebtn){


	var itemid = $(finalDeletebtn).parent('#parent').siblings('#itemid').html();

	var data = {"itemid":itemid};

	$('#loaddiv').load("gifterremoveitem.php",data);

	$('#formtable').load("giftercheckout.php #formtable");
		
}



</script>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>