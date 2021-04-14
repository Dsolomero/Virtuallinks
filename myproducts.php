<!DOCTYPE html>
<html>
<head>
	<title>My Orders</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
	<div class="alert alert-primary">

      <center><h1>Virtuallinks Technologies</h1><i>"We make <b>IT</b> happen virtually!!"</i></center>
    </div>

	<?php
	   include('nav.php');
	   include('checkloginstatus.php');
	   ?>
	<div class="container">

		<div class="row">
			<h3 style="c olor: #2199D5; font-family: monospace;">My Orders</h3>
			<div class="col-3">
				<img src="https://c8.alamy.com/comp/R2A5TK/computer-service-icons-set-in-isometric-3d-style-isolated-on-white-R2A5TK.jpg" class="img-fluid">
				
			</div>
			<div class="col">
				<!--- select for a given customer-->
				<table class="table">
					<tr>
			           <th>Name</th>
			           <th>Cost</th>
				
		            </tr>

		            <!----  -->
		            <?php 

		            //get the customer id
		            $customerId = $_SESSION['id'];
		            
		            require('dbconnect.php');
		            $sql = "SELECT * FROM sales WHERE customer_id = ".$customerId;
		            //execute the querry and get results

		            $results = mysqli_query($conn,$sql);
		            if ($results) {
		            	# code...
		            	$rows = mysqli_num_rows($results);
		            	if ($rows>0) {
		            		# code...
		            		while($record = mysqli_fetch_assoc($results)){
	     			//echo $record['name'].$record['cost'];
	     			//echo "<br>";
	     			echo "<tr>";
						echo "<td>".$record['product_name']."</td>";
						echo "<td>".$record['cost']."</td>";

	                }

		            	}else{
		            		echo "<h4 style='color:yellow'>No product subscription found</h4>";
		            	}

		            }else{
		            	echo "Something not right";
		            }


		            ?>



			     </table>	
			</div>
			
		</div>
		
	</div>





</body>
</html>
