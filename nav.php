<?php
session_start(); 
?>


<!--  Start of Nav  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.html">
      <img src="https://c8.alamy.com/comp/R2A5TK/computer-service-icons-set-in-isometric-3d-style-isolated-on-white-R2A5TK.jpg" width="100px" height="60px">

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding: 10px">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="album.php">Album</a>
        </li>


 
  <?php
  if (isset($_SESSION['name'])) {
    
    //admin
    if ($_SESSION['role']=='admin') {
      
      echo '
          <li class="nav-item">
          <a class="nav-link" href="showproducts.php">Services We Offer</a>
         </li>
         <li class="nav-item">
         <a class="nav-link" href="addproduct.php">Add Services</a>
           </li>';

           echo '
          <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
         </li>';

      # code...
    }else{

      echo '
          <li class="nav-item">
          <a class="nav-link" href="myproducts.php">My Oders</a>
         </li>';

         echo '
          <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
         </li>';
    }
    # code...
    echo '<li class="nav-item">

    <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true"> Hi,'.$_SESSION['name'].'</a>
  </li>



  <li class="nav-item">
    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
  </li>';

  }else{
    //login
    echo '<li class="nav-item">
    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
  </li>';
  
  }
  ?>
  
 


</ul>
        
        
       
     
    </div>
  </div>
</nav>

<!--End of Nav -->
 

<!-- Start of Slider-->



<!-- End of Slider-->



