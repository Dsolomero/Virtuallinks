<!DOCTYPE html>
<html>
<head>
	<title>Virtuallinks Technologies | Services</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<?php 
		     include('nav.php');
		     require('checkloginstatus.php');
		     if ($_SESSION['role']=='customer') {
		     	# code...
		     	echo "You are a customer. You cannot access this page";
		     	header('location:index.php');
		     }
		?>		      

		<h3 style="color: #2199D5; font-family: monospace;">Services We Offer</h3>

	<div class="col-8">

	<table class="table">

		<tr>
	
			<th>Service Name</th>		
			<th>Service Description</th>
			<th>Cost</th>
				
		</tr>
		

		<?php

		/*Retrieving/fetching items/records
	1.Establish connection from php and the db.
	2.Have query
	SELECT * FROM table
	3.Go ahead display - manipulate

	//connection
	//include
		*/
	require('dbconnect.php');

	$sql = "SELECT * FROM product";

	//execute
	//use the function mysqli_query
	/*

	 conn
	 qury
	*/
	     $result =mysqli_query($conn,$sql);
	     if ($result) {
	     	# code...
	     	//check the results
	     	//mysqli_num_rows($result);
	     	//
	     	$rows =mysqli_num_rows($result);
	     	if ($rows>0) {
	     		# code...
	     		//echo "$rows";
	     		//we can go ahead and get the product
	     		//if we get them - associative array id - 1

	     		while($record = mysqli_fetch_assoc($result)){
	     			//echo $record['name'].$record['cost'];
	     			//echo "<br>";
	     			echo "<tr>";
	     			echo "<td>".$record['name']."</td>";
	     			echo "<td>".$record['description']."</td>";
	     			echo "<td>".$record['cost']."</td>";
	     			echo "<td>

	     			   <a href='editproduct.php?id=".$record['id']."'class='btn btn-primary'>Edit Service</a>

	     			   <form method='POST' action=''>
	     			   <input type='hidden' value='".$record['id']."'name='productId'>
	     			   <button type='submit' name='delete' class='btn btn-danger'>Delete This</button>
	     			   </form>



	     			</td>";
	     			echo "</tr>";



	     		}
	     	}else{
	     		echo "<h4>No products available</h4>";
	     	}
	     }else{
	     	echo "Something went wrong. Try again".mysqli_error($conn);

	     }


		?>
		<?php 
		//delete
		if (isset($_POST['delete'])) {
			$productId = $_POST['productId'];

			require_once('dbconnect.php');

			//
			$sql = "DELETE FROM product WHERE id = ".$productId;

			$result = mysqli_query($conn,$sql);
			if ($result) {
				# code...
				echo '<div class="alert alert-success" role="alert">Service Deleted Successfully.
                      </div>';

			}else{
				echo '<div class="alert alert-danger" role="alert">
				Something went wrong.
				     </div>';
				
			}
			# code...

		}


		?>



	</table>

	</div>
		
	</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</body>
</html>