<?php include "../controllers/ProductsFunctions.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<title>Products</title>
	   <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOGOL FONTS -->
    <link href='../assets/fonts/gugulFonts.css' rel='stylesheet' type='text/css' />
</head>
<body>
<center>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th style="text-align: center;">ID</th>
				<th style="text-align: center;">Name</th>
				<th style="text-align: center;">Description</th>
				<th style="text-align: center;">Quantity</th>
				<th style="text-align: center;">Price</th>
				<th colspan="2" style="text-align: center;">Action</th>
			</tr>
		</thead>

		<tbody>
		
			<?php error_reporting(E_ERROR | E_PARSE); foreach ($rows as $index => $value): ?>
			<tr>
				<td><?php echo $value['pid']; ?></td>
				<td><?php echo $value['Name']; ?></td>
				<td><?php echo $value['Description']; ?></td>
				<td><?php echo $value['Quantity']; ?></td>
				<td><?php echo $value['Price']; ?></td>
				<td style="text-align: center;">
				<a  href="products.php?&select=yes&delete=yes&pid=<?php echo $value['pid']; ?>" class="btn btn-danger">Delete</a></td><td style="text-align: center;">
				<a href="updateProduct.php?update=yes&pid=<?php echo $value['pid']; ?>" class="btn btn-success">Edit</a>
				</td>
			</tr>
			<?php endforeach; ?>
		
		</tbody>

	</table>
</center>
</body>
</html>