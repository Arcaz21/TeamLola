<?php include "../controllers/SalesFunctions.php"; ?>

<HTML>
<HEAD>
<TITLE>Cart</TITLE>
    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOGOL FONTS -->
    <link href='../assets/fonts/gugulFonts.css' rel='stylesheet' type='text/css' />
</HEAD>
<BODY>

<table>
<div >
<div><center><h2>Shopping Cart</h2> </center>
</div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Description</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
</thead>
<tbody>
<?php
	$all = $db_handle->runQuery("SELECT Quantity FROM products");
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["Name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["Description"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["Quantity"]; ?>
				</td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["Price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="sales.php?action=remove&Description=<?php echo $item["Description"]; ?>" class="btn btn-warning">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["Price"]*$item["Quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
<?php
	?>
</tbody>
</table>
<center>
<a class="btn btn-danger" href="sales.php?action=empty">Empty Cart</a><br><br>
<a class="btn btn-info" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>">Save</a>
</center>		
  <?php
}
?>
</div>


<div >
<!-- Create Buttons of Products -->
	<div ><h2>Products:  </h2></div>
	<center>
	<table class="table table-striped table-bordered table-hover" style="border: 4px;background-color: blue;">
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY pid ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div>

			<form method="post" action="sales.php?action=add&Description=<?php echo $product_array[$key]["Description"]; ?>">

<center>

<table style="margin-bottom: 10">
	<tr style="background-color: #F3F3F3; margin-bottom: 5px; margin-top: : 5px">
		<td><label style="margin-right: 20; margin-left: 20;">Name:   </label></td>
		<td><?php echo $product_array[$key]["Name"]; ?></td>
		<td><label style="margin-right: 20; margin-left: 20;">Price:   </label></td>
		<td><?php echo "$".$product_array[$key]["Price"]; ?></td>
		<td><label style="margin-right: 20; margin-left: 20;">Quantity:   </label></td>
		<td><?php echo $product_array[$key]["Quantity"];?></td>
	</tr>
</table>


			
			<input type="number" name="Quantity" value="1" size="2" />
			<input type="submit" value="Add to cart" class="btn-success" /></div>
			<?echo $_POST["Quantity"];?><br>
			</form>
	</center>
		
	<?php
			}
	}
	?></center>
</div>

</table>
</BODY>
</HTML>