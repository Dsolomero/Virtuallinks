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
          <a class="nav-link" href="showproducts.php">Products</a>
         </li>
         <li class="nav-item">
         <a class="nav-link" href="addproduct.php">Add Products</a>
           </li>';

           echo '
          <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
         </li>';

      # code...
    }else{

      echo '
          <li class="nav-item">
          <a class="nav-link" href="myproducts.php">My Applications</a>
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

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://www.siliconindia.com/news/newsimages/special/1cy758qA.png" class="d-block w-100" width="600px" height="500" alt="...">
      <div style="color: blue" class="carousel-caption d-none d-md-block">
        <h5>Filing KRA Returns</h5>
        <p>Remote filing of KRA Returns on the iTax portal done virtually at the comfort of your coach. You don't have to visit the cyber physically.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://www.helpyetu.com/wp-content/uploads/2019/08/helb-loan-application.png" class="d-block w-100" width="600px" height="500" alt="...">
      <div style="color: blue" class="carousel-caption d-none d-md-block">
        <h5>HELB Loan Application</h5>
        <p>Online application for HELB Loan remotely at the comfort of your coach.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://previews.123rf.com/images/stuartphoto/stuartphoto1706/stuartphoto170600243/79714279-online-application-icon-meaning-internet-job-3d-illustration.jpg" class="d-block w-100" width="600px" height="500" alt="...">
      <div style="color: blue" class="carousel-caption d-none d-md-block">
        <h5>Online Job Applications</h5>
        <p>Online job applications done virtually based on digital platforms. No need to visit a cyber physically.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://www.jambonews.co.ke/wp-content/uploads/2019/01/kuccps-image.png" height="500" alt="...">
      <div style="color: blue" class="carousel-caption d-none d-md-block">
        <h5>KUCCPS Services</h5>
        <p>Online selection and application for courses and universities.</p>
      </div>
    </div>
  </div>
  <button style="color: blue" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span style="color: blue" class="visually-hidden">Previous</span>
  </button>
  <button style="color: blue" class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span style="color: blue" class="visually-hidden">Next</span>
  </button>
</div>

<!-- End of Slider-->



