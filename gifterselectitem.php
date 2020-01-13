<?php

require("Gifter.php");

$obj = new Gifter;


$gifter_id = $_SESSION['user'];
// $p_cart_id = $_POST['p_cart_id'];

//selects from the purchase item table
$seecollectiondetails = $obj->getseveralwhereNoGroup('purchase_item','vendor_item','purchase_item.v_item_id','vendor_item.v_item_id','purchase_item.gifter_id',$gifter_id);


$price = $_POST['price'];
$selectcategory = $_POST['selectcategory'];
$merchant = $_POST['merchant'];
$brand = $_POST['brand'];


//selects from the vendor item table
$search_item = $obj->searchitem($price, $selectcategory,$merchant,$brand);

if(empty($seecollectiondetails)){

?>
<div class="card text-center alert-primary col-11 mx-3" style ="min-height: 80px">
<h2 class = "text-center" > No Items Selected In This Collection. <small>You can Search For Items</small></h2>
</div>

<?php

}

?>
<?php
if(!empty($search_item)){

foreach($search_item as $key => $v) {

  $x = true;//this is to test when the if condition below runs

  //code to fetch categoryname and vendor name starts here
  $_SESSION['v_cat_id'] = $v['v_cat_id'];
   $_SESSION['vendor_id'] = $v['vendor_id'];

  $getCatName = $obj->getseveralwhere('category_table','category_id',$_SESSION['v_cat_id']);
  $getVendorName = $obj->getseveralwhere('vendors','vendor_id',$_SESSION['vendor_id']);
  //the fetch code ends here

if(!empty($seecollectiondetails)){

	foreach($seecollectiondetails as $key2 => $v2) {



  if($v['v_item_id'] == $v2['v_item_id']){

    $x = false;
?>

<div class = "col-md-3 col-6 mt-2">
<div class="card alert-danger">
  <div class="card-body mt-1 pt-1">
  	<form action = "" class = "mt-0 pt-0">
    <h5 class="text-center pt-0 mt-0" id = "itname">Selected</h5>
  	<img src="images/noimage3.jpg" class="card-img-top" alt="...">
    <h5 class="text-center mt-2 mb-0 pb-0" id = "itname"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <span style="display:inline-block;width:45%;box-sizing: border-box;float:left;font-size: 12px"><?php echo $getCatName[0]['category_name'];?></span><span style="width:50%;float:right;display:inline-block;box-sizing: border-box; font-size: 12px; text-align: center">By <?php echo $getVendorName[0]['v_companyname'];?></span><p style = "clear: both;" class = "pb-0 mb-0"></p>
    <p class="card-text text-center"><span id = "itprice"><b> <?php echo "&#8358;".number_format($v['v_item_price'],2);?></b></span></p>
    <p class="card-text" style="float:left"><b style="font-size: 13px">Stock: </b><span class="card-text" id = "itstk"> <?php echo $v['item_qty'];?></span></p>
    <input type="number" class = " text-center" style = "width:20%;float:right" id = "itqty" readonly value = '<?php echo "" . $v2['g_item_qty']. "";?>'><b style = "float:right; margin:4px;font-size: 13px">Qty: </b><p style = "clear: both;" class = "pb-0 mb-0"></p>
    <span style = "display: none" class="card-text" id = "itid"> <?php echo $v['v_item_id'];?></span>
    <button type = "button" class="btn btn-primary col-8 offset-2 mt-2" id = "itbtn" onclick = "iteminclude(this);" style = "display: none">Include Item</button>
    <div class = "row">
      <div class = "col">
      <button type = "button" class="btn btn-primary px-2" id = "itedit" style = ""><span style="font-size: 15px">Edit Item</span></button>
      </div>
      <div class = "col">
      <button type = "button" class="btn btn-primary " id = "itremove" style = ""><span style="font-size: 15px" >Remove</span></button>
      </div>
  </div>
	</form>
  </div>
</div>
</div>

<?php
}

}

}

if($x == true || empty($seecollectiondetails)){

?>

<div class = "col-md-3 col-6 mt-2">
<div class="card alert-success">
  <div class="card-body">
    <form action = "" class = "">
    <img src="images/noimage3.jpg" class="card-img-top" alt="...">
    <h5 class="text-center mt-2 mb-0 pb-0" id = "itname"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <span style="display:inline-block;width:45%;box-sizing: border-box;float:left;font-size: 12px"><?php echo $getCatName[0]['category_name'];?></span><span style="width:50%;float:right;display:inline-block;box-sizing: border-box; font-size: 12px; text-align: center">By <?php echo $getVendorName[0]['v_companyname'];?></span><p style = "clear: both;" class = "pb-0 mb-0"></p>
    <p class="card-text text-center"><span id = "itprice"><b> <?php echo "&#8358;".number_format($v['v_item_price'],2);?></b></span></p>
    <p class="card-text" style="float:left"><b style="font-size: 13px">Stock: </b><span class="card-text" id = "itstk"> <?php echo $v['item_qty'];?></span></p>
    <input type="number" class = "iitqty text-center" style = "width:20%;float:right" id = "itqty"><b style = "float:right; margin:4px;font-size: 13px">Qty: </b><p style = "clear: both;" class = "pb-0 mb-0"></p>
    <span style = "display: none" class="card-text" id = "itid"> <?php echo $v['v_item_id'];?></span>
    <button type = "button" class="btn btn-primary col-8 offset-2 mt-2" id = "itbtn" onclick = "iteminclude(this); fetchitems()" style = "display: block">Include Item</button>
    <button type = "button" class="btn btn-primary col-8 mt-2 offset-2" id = "itedit" style = "display: none">Edit Item</button>
    <button type = "button" class="btn btn-primary col-8 mt-2 offset-2" id = "itremove" style = "display: none">Remove Item</button>
  </form>
  </div>
</div>
</div>


<?php
}

}

}

?>



<script>
$('.iitqty').val(1);

</script>

<?php

if(empty($search_item)){
	echo "<h3 class = 'card-body alert-danger'>No Item Found</h3>";

}




?>

