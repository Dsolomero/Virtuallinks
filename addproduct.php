<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Virtuallinks Technologies | Add Services</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
	
	<div class="container">
		<?php 
		   include('nav.php');
		   require('checkloginstatus.php');
		   if ($_SESSION['role']=='customer') {
		     	# code...
		     	echo "You are a customer. You cannot access this page";
		     	header('location:index.php');
		     }

		?>
		<h1 style="font-size: 28px;color: blue">Add Service</h1>

		<div class="row">
			<div class="col-4">
				<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQxJsBDcwaBfE6Nu600hcWND1xVvKGJjzKiKw&usqp=CAU" class="img-fluid">
				
			</div>
			<div class="col-6">
  <form method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Service Name</label>
    <input type="text" class="form-control" name="product_name">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Service Description</label>
    <input type="text" class="form-control" name="product_desc"> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cost</label>
    <input type="number" class="form-control" name="product_cost"> 
  </div>
  
  <button name="save" type="submit" class="btn btn-primary">SAVE</button>
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

		    require('dbconnect.php');

		    if (isset($_POST['save'])) {
		    	# code...
		    	$productName = $_POST['product_name'];
		    	$productCost = $_POST['product_cost'];
		    	$productDesc = $_POST['product_desc'];

		    	//save the above into our database shop - table- product
		    	//INSERT querry values=???
		    	$sql = "INSERT INTO product(name,description,cost) VALUES(?,?,?)";

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
		    			echo "Service added successfully to the database";
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