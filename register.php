<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Virtuallinks Technologies | Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
	<div class="container">
		<div class="alert alert-primary">

			<center><h1>Welcome to Virtuallinks Technologies</h1>Register to Continue</center>

		<div>
		
	</div>
	
    </div>

		<div class="row">
			<div class="col-4">
				<img src="https://c8.alamy.com/comp/R2A5TK/computer-service-icons-set-in-isometric-3d-style-isolated-on-white-R2A5TK.jpg" class="img-fluid">
				
			</div>
			<div class="col">

				<form method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="full_name" required> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" required> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="number" class="form-control" name="phone" required> 
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Role</label>
    <input type="text" class="form-control" name="role" required>  
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required> 
  </div>
  
  <button name="register" type="submit" class="btn btn-primary">Register</button>
   </form>

        <?php

        //capture
        //
        if (isset($_POST['register'])) {
        	# code...
        	$fullName = $_POST['full_name'];
        	$email = $_POST['email'];
        	$phone = $_POST['phone'];
            $role = $_POST['role'];
        	$password = $_POST['password'];

        	//hash the password
        	/*password_hash()
        	    password to be encrypted
        	    -alorigy
        	    PASSWORD DEFAULT
        	    -hashed
        	*/
        	//
        	$encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

        	insertDataToTable($fullName,$email,$phone,$role,$encryptedPassword);

        }

        function insertDataToTable($fullName,$email,$phone,$role,$password){
        	//connection with the db
            require('dbconnect.php');
            $sql = "INSERT INTO `users`(`full_name`, `email`, `phone`,`role`, `password`) VALUES (?,?,?,?,?)";

            //prepare the query
            if ($stmt = mysqli_prepare($conn,$sql)) {
            	//bind values
            	mysqli_stmt_bind_param($stmt,"sssss",$param_fullname,$param_email,$param_phone,$param_role,$password);
            	//param variable bind them

            	$param_fullname = $fullName;
            	$param_email = $email;
            	$param_phone = $phone;
                $param_role = $role;
            	$param_password = $password;

            	//execute the query
            	if (mysqli_stmt_execute($stmt)) {
            		# code...
            		echo "Registered Successfully";
            		header('location:login.php');
            	}else{
            		echo "<h4 style='color:red'>Something went wrong</h4>";
            	}
            
            
            }else{
            	echo "Something went wrong";
            }

            //close
            mysqli_close($conn);

        }



        ?>
		
		 Already have an account? <a style='text-decoration: none;'href="login.php"><span>Login</span></a>		
			</div>
			
		</div>




		
	</div>



</body>
</html>