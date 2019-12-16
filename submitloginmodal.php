<?php


if($_POST){

require("Vendor.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = $_POST['email'];
$pwd = $_POST['pwd'];

if(isset($_POST['m'])){
$msg = $_POST['m'];
}


$obj = new Vendor;

$_SESSION['modallogin'] = $msg;

$obj->login($username,$pwd);

}else{

	if(isset($msg) && $msg == 'modallogin'){


	}else{

	header("location:signup.php");

		}

}




?>
<?php if(isset($_SESSION['loginstatus']) && $_SESSION['loginstatus'] == 'failed'){ ?>
		<!-- <div class="control-group form-group">
	      <div class="controls">
	        <div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>Incorrect Username or password! </strong>Please try again.
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	      </div>
	    </div> -->
	<?php } session_unset(); ?>