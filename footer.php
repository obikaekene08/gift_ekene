<div class = "row-12 mt-3" id = "sendamessage">
		<div class = "col" style = "background-color:#787878;">

	<div class = "row-12 mt-3">
		<div class = "col-8 offset-2">
			<h4 class = "text-center mt-2 pt-3 mb-2 -pb-2 footertextcolor">Send Us a Message</h4>
			<form method = "POST" action = "sendmsgsubmit.php" id = "submitform">
			<div class = "row">
			  <div class="form-group col-md-6 col-12">
			    <input type="text" class="form-control" id="sendmsgname" aria-describedby="emailHelp" placeholder="Enter Your Name" required>
			    </div>
			  <div class="form-group col-md-6 col-12">
			    <input type="email" class="form-control" id="sendmsgemail" placeholder="Enter Your Email" required>
			  </div>
			</div>

			  <div class="form-group">
			    <textarea class="form-control" rows="3" id = "sendmsgmsg" placeholder = "Write Your Message Here" required></textarea>
			  </div>

			  <div class="form-group form-check ">
			    <input type="checkbox" class="form-check-input" id="sendmsgcheck">
			    <label class="form-check-label" for="exampleCheck1"><small id="emailHelp" class="form-text footertextcolor">Get updated on Interesting Offers and NewsLetter.</small></label>
			    <span id = "sendmsgresponse" class = "alert alert-success alert-dissimible offset-2" style = "display: none"><span>
			  </div>
			  <p class = "text-center"><button type="submit" class="btn btn-primary btn-lg" id = "submitbtn">Submit</button></p>
			</form>


		</div>
	</div>

	<hr class = "footerline mt-3">
<div class = "row offset-md-1">
	<div class = "col ">
	<div class = "row">
		<div class = "col-md-2 mx-2 footertextcolor">
			<ul class="list-group list-group-flush">
			  <li class="list-group-item footerbgcolor" style="color:blue"><b>Useful Links</b></li>
			  <li class="list-group-item footerbgcolor" ><a href = "index.php #fAQsparent" class = "footerbgcolor">FAQs</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "index.php #searchbox" class = "footerbgcolor">Find a Couple</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "#" class = "footerbgcolor">Order Status</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "#" class = "footerbgcolor">Return Policy</a></li>			  
			</ul>
		</div>

		<div class = "col-md-2 mr-5 footertextcolor">
			<ul class="list-group list-group-flush" >
			  <li class="list-group-item footerbgcolor" style="color:purple"><b>Other Links</b></li>
			  <li class="list-group-item footerbgcolor" ><a href = "index.php #howtoparent" class = "footerbgcolor">How it Works</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "index.php #testimonial" class = "footerbgcolor">Testimonials</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "index.php #merchantsection" class = "footerbgcolor">See Our Merchants</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "#" class = "footerbgcolor">Terms and Conditions</a></li>			  
			</ul>
		</div>

		<div class = "col-md-2 mr-2 footertextcolor">			
			<ul class="list-group list-group-flush">
				<li class="list-group-item footerbgcolor" style="color:blue"><b>Menu</b></li>
			  <li class="list-group-item footerbgcolor" ><a href = "receivegifts.php" class = "footerbgcolor">Create A Registry</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "receivegifts.php" class = "footerbgcolor">Receive Gifts</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "giveagift.php" class = "footerbgcolor">Give a Gift</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "becomeavendor.php" class = "footerbgcolor">Become a Vendor</a></li>	  
			</ul>

		</div>

		<div class = "col-md-2 offset-1 footertextcolor">			
			<ul class="list-group list-group-flush">
			  <li class="list-group-item footerbgcolor" style="color:purple"><b>Follow Us</b></li>
			  <li class="list-group-item footerbgcolor" ><a href = "https://web.facebook.com/people/Ekene-Obika/100009253601860" class = "footerbgcolor" target="_blank">Facebook</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "https://twitter.com/ekeneobika" class = "footerbgcolor" target="_blank">Twitter</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "#" class = "footerbgcolor" target="_blank">Instagram</a></li>
			  <li class="list-group-item footerbgcolor" ><a href = "contactgiftrunner.php" class = "footerbgcolor" target = ‘_self’>Contact Us</a></li>
			</ul>

		</div>
		</div>
	</div>
</div>

<hr class = "footerline mt-3" style = "width: 80%">

<div class = "row">
		<div class = "col footertextcolor">
			<p style = "text-align: center">Copyright &copy; 2019 Ekene Samson Obika. All Rights Reserved.</p>


		</div>
	</div>


	</div>
</div>

</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="giftjava.js"></script>
<script type = "text/javascript">

$(document).ready(function(){

	$('#home-tab').css('color','red');

	$('#submitform').submit(function(e){
		e.preventDefault();
	var sendmsgname = $('#sendmsgname').val();
	var sendmsgemail = $('#sendmsgemail').val();
	var sendmsgmsg = $('#sendmsgmsg').val();

	if($('#sendmsgcheck').prop('checked') == true){

		var sendmsgcheck = 1;
	}else{
		var sendmsgcheck = 0
	}

	var data = {"sendmsgname":sendmsgname, "sendmsgemail" : sendmsgemail, "sendmsgmsg" : sendmsgmsg, "sendmsgcheck": sendmsgcheck };

	$.ajax({

		url: "sendmsgsubmit.php",
		data: data,
		dataType: "text",
		type: "POST",
		success(msg){
		$('#sendmsgresponse').show();
		$('#sendmsgresponse').html(msg);
		$('#sendmsgresponse').fadeOut(3000);
		$('#sendmsgname').val('');
		$('#sendmsgemail').val('');
	 	$('#sendmsgmsg').val('');
		$('#sendmsgcheck').prop('checked',false);

		},
		error(errmsg){
		alert(errmsg);
		}

	})

	})

	

})

</script>