<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Apply</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
	<?php
	   include('nav.php');
	   include('checkloginstatus.php');

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
	<div class="container-fluid">

		<div class="row">
			<div class="col-3">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-u_WTiwAea3LqWT_Fz5wo6J1IR1I2STeqAQ&usqp=CAU" class="img-fluid">
				
			</div>
			<div class="-6">
				<form method="POST" action="">
                   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Name</label>
    <input type="text" class="form-control" name="product_name" value="<?php echo ($productRecord['name']);?>"> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product Description</label>
    <input type="text" class="form-control" name="product_desc" value="<?php echo ($productRecord['description']);?>"> 
  </div>
  <input type="hidden" name="productId" value=<?php echo ($productRecord['id']);?>> 

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cost</label>
    <input type="number" class="form-control" name="product_cost" value=<?php echo ($productRecord['cost']);?>> 
  </div>
  <button name="apply" type="submit" class="btn btn-primary">APPLY</button>
                </form>


     <?php

     if (isset($_POST['apply'])) {
     	# code...
     	//capture the values from the form
     	$productName = $_POST['product_name'];
     	$productId = $_POST['productId'];
     	$productCost = $_POST['product_cost'];
     	$customerName = $_SESSION['name'];
     	$customerId = $_SESSION['id'];

     	$sql = "INSERT INTO `sales`(`product_name`, `product_id`, `cost`, `customer_id`, `customer_name`) VALUES (?,?,?,?,?)";

     	//prepare stmt
     	if ($stmt = mysqli_prepare($conn,$sql)) {
     		# code...
     		//bind
     		mysqli_stmt_bind_param($stmt,"sidis",$param_product_name,$param_product_id,$param_cost,$param_customer_id,$param_customer_name);

     		$param_product_name = $productName;
     		$param_product_id = $productId;
     		$param_cost = $productCost;
     		$param_customer_name = $customerName;
     		$param_customer_id = $customerId;


     		//execute
     		if (mysqli_stmt_execute($stmt)) {
		    			# code...
		    			echo "Application made successfully";
		    			//redirect go to my products
		    			header("location:myproducts.php");
		    		}else{
		    			echo "Something went wrong. Try again".mysqli_error($conn);
		    		}
     	}else{
     		echo "Something went wrong";
     	}

 
     }


     ?>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>