<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Virtuallinks Technologies | Edit Products</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
	<div class="container">
		<h1>Edit Products</h1>

		<?php include('nav.php');
		if ($_SESSION['role']=='customer') {
		     	# code...
		     	echo "You are a customer. You cannot access this page";
		     	header('location:index.php');
		     }

		$productId = $_GET['id'];
		//echo "$productId";

		//select
		$sql = "SELECT * FROM product WHERE id=$productId";
		//connection
		require('dbconnect.php');

		//execute
		$result = mysqli_query($conn,$sql);

		if ($result) {
			# code...
			$productRecord = mysqli_fetch_assoc($result);
			//echo "".$productRecord['name'];
		}else{
			echo "Something went wrong!!";
		}

		?>

		<h1>Edit <?php echo($productRecord['name'])?></h1>




		<div class="row">
			<div class="col-4">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKNqpFLzF8YbZrse30kS32bihNznpdo-FHvq_Io-VAWD6YVfyhLxEv4C3_cv4aLnI7R0o&usqp=CAU" class="img-fluid">
				
			</div>
			<div class="col-6">
				<form method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Name</label>
    <input type="text" class="form-control" name="product_name" value=<?php echo ($productRecord['name']);?>> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
    <input type="text" class="form-control" name="product_desc" value=<?php echo ($productRecord['description']);?>> 
  </div>
  <input type="hidden" name="productId" value=<?php echo ($productRecord['id']);?>> 

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cost</label>
    <input type="number" class="form-control" name="product_cost" value=<?php echo ($productRecord['cost']);?>> 
  </div>
  
  <button name="save" type="submit" class="btn btn-primary">UPDATE</button>
   </form>
		
			</div>
			
		</div>

		<?php

		/*
		1.connection to db - php and our db
		2.Capture the data from
		3.Insert -
		     sql query


		*/

		    if (isset($_POST['save'])) {
		    	# code...
		    	$productName = $_POST['product_name'];
		    	$productCost = $_POST['product_cost'];
		    	$productDesc = $_POST['product_desc'];
		    	$productId = $_POST['productId'];

		    	//save the above into our database shop - table- product
		    	//INSERT querry values=???
		    	$sql = "UPDATE product SET name=?,description=?,cost=? WHERE id=$productId";

		    	//prepare a statement - check if the above insert queery is cosrrect
		    	if ($stmt = mysqli_prepare($conn,$sql)) {
		    		# code...
		    		//bind the parameters -?, ?,?
		    		//- insert data type -- varchar
		    		mysqli_stmt_bind_param($stmt,"ssd",$param_name,$param_desc,$param_cost);

		    		//bind
		    		$param_name = $productName;
		    		$param_cost = $productCost;
		    		$param_desc = $productDesc;

		    		//execute the command - sql query - Insert into db
		    		if (mysqli_stmt_execute($stmt)) {
		    			# code...
		    			echo "Product updated successfully to the database";
		    			//redirect go to my products
		    			header("location:showproducts.php");
		    		}else{
		    			echo "Something went wrong. Try again".mysqli_error($conn);
		    		}
		    		//close the stmt
		    		mysqli_stmt_close($stmt);

		    	}else{
		    		echo "Error in the query";
		    	}
		    	//close connection
		    	mysqli_close($conn);


		    }


		?>
		

	</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>