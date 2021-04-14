<!DOCTYPE html>
<html>
<head>
  <title>Virtuallinks Technologies</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<div class="alert alert-primary">

      <center><h1>Welcome to Virtuallinks Technologies</h1><i>"We make <b>IT</b> happen virtually!!"</i></center>
    </div>

<body bgcolor="#2D6851">
  <?php include('nav.php')?>
  <div class="container">
    <div class="row">
   
      <div class="col-8">
        <div class="row">
        


        <?php

        //connection
        require('dbconnect.php');

        //select query
        $sql = "SELECT * FROM product";

        //execute query
        $result = mysqli_query($conn,$sql);
        //check if query is correct
        if ($result) {
          # code...

          //check if the rows exist
          //mysqli_num_rows
          if (mysqli_num_rows($result)>0) {
            # code...

            //for every record with - create associate
            //loop
            while ($record =mysqli_fetch_assoc($result)) {
              # code...
              //get individual record field as an associative array
              //key - value
              //column name
              echo '
                   <div class="card col-4">
                   <div class="card-body">
                   <h5 class="card-title">'.$record['name'].'</h5>
                   <p class="card-text" rows="3">'.$record['description'].'</p>
                   <h4 style="color:red;">Ksh'.$record['cost'].'</h4>

                   <a href="apply.php?id='.$record['id'].'" class="btn btn-primary">Order Now</a>
               
                   </div>
                   </div>

                   ';

            }


          }else{
            echo "<h4>No Products available</h4>";
            echo "<a class='btn btn-primary' href='addproduct.php'>Add Services";
          }
        }else{
          echo "Something went wrong!!";
        }

        ?>
          
        </div>
        
      </div>
      
    </div>
    <div>
      
      
    </div>
    
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>