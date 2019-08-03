<!--Author:Bachir Mahomad
    Date:01/08/2019
    Functionality:Final Version
--> 
<!-- starting a  session to show when the customer is loggin and display the logout button when he loggin and hidding the loggin and register button -->
<?php
 if (!isset($_SESSION["CustUserName"])){
   $display = "hidden";
   $display2 = "visible";
 }
 else {
   $display = "visible";
   $display2 = "hidden";
 }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LTravel Expert</title>
  <!-- Styling  link for the different pages and section from the index -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index_style.css">
  <link rel="stylesheet" type="text/css" href="css/contact_style.css">
  <link rel="stylesheet" type="text/css" href="css/registration_style.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/carousel.css">
    
    <script text="text/javascript" src="js/carousel.js"></script>
    <script text="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
  <title><?php if(isset($page_tile)) echo $page_tile?></title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"> -->

<body>
  <!-- Section the main page nav bar -->
  <section class="navigationBar">
    <!--top navbarwith register and login option -->
    <div class="loginNav">
      <nav class="navbar mylogin navbar-expand-lg">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">

            <?php
            //login link in the main  navbar
            $link_address1 = 'login.php';
            echo "<a class='nav-item nav-link active' style='visibility: $display2' href=$link_address1>Login <span class='sr-only'></span></a>"
            ?>
             <!-- register button in the main navbar -->
            <a class="nav-item nav-link" style="visibility: <?php echo $display2?>"  href="signup.php">Register</a>
            <a class="nav-item nav-link" style="visibility: <?php echo $display?>" href="logout.php">Logout</a>
          </div>
        </div>
      </nav>
    </div>
    <!--Bottom navbar with option for customer that include logo,Home,vacation,Flight,Hotel,Contact -->
    <nav class="navbar mynavbar navbar-expand-lg ">
      <!-- Logo and title in the Main Navbar -->
      <a class="navbar-brand" href="#"><span><i class="fa fa-plane" aria-hidden="true"></i> TRAVEL</span> EXPERT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
           <!-- Home link in the main navbar -->
            <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
          <!-- Vacation link in the main navbar -->
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              VACATION
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
           <!-- flight link in the main navbar -->
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              FLIGHTS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown">
           <!-- Hotel link in the main navbar -->
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" role="button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              HOTELS
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
           <!-- Contact link in the main navbar -->
            <a class="nav-link" href="contact.php">CONTACT</a>
          </li>
        </ul>
      </div>
    </nav>
  </section>