<?php

require("Receiver.php");

$obj = new Receiver;

$searchval = $_POST['searchval'];

$search_item = $obj->searchMain($searchval);
?>

<?php
foreach($search_item as $key => $v) {
	
?>
<div class = "col-md-3 col-6 mt-2">
<div class="card text-center alert-success">
  <div class="card-body text-center">
    <form action = "" class = "text-center">
    <img src="images/noimage3.jpg" class="card-img-top" height = "180px" alt="...">
    <h5 class="card-title mt-2" id = "itname"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <p class="card-text"><b>Unit Price: </b><span id = "itprice"> <?php echo "&#8358;".number_format($v['v_item_price'],2);?></span></p>
    <p class="card-text"><b>Stock: </b><span class="card-text" id = "itstk"> <?php echo $v['item_qty'];?></span></p>
    <b>Qty: </b><input type="number" class = "iitqty text-center" style = "width:20%" id = "itqty">
    <span style = "display: none" class="card-text" id = "itid"> <?php echo $v['v_item_id'];?></span>
    <button type = "button" class="btn btn-primary col-8 offset-2 mt-2" id = "itbtn" onclick = "iteminclude(this);" style = "display: block">Include Item</button>
    <button type = "button" class="btn btn-primary col-8 mt-2" id = "itedit" style = "display: none">Edit Item</button>
    <button type = "button" class="btn btn-primary col-8 mt-2" id = "itremove" style = "display: none">Remove Item</button>
  </form>
  </div>
</div>
</div>

<?php

}

?>
<script>
$('.iitqty').val(1);

</script>
<?php

if(count($search_item) == 0){
	echo "<h3 class = 'card-body alert-danger'>No Item Found</h3>";
}

?>


