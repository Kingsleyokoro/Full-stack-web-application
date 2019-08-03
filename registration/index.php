<?php 
 session_start();
 $page_title ="User Authentication - HomePage";
 include_once 'partials/header.php'
?>

<body>
<main role="main" class="container">

  <div class="flag">
    <h1>Customer Authentication System</h1>
    <?php if(!isset( $_SESSION['CustUserName'])):?> 

<p>You are currently not signed in <a href = "login.php">Login</a> Not yet a member? <a href ="signup.php">Signup</a> </p>   
<?php else:?>
<p>You are logged in as 
 <?php if(isset($_SESSION['CustUserName'])) echo  $_SESSION['CustUserName']; ?>  
<a href="logout.php">Logout</a></p> 
<?php endif ?>  
  </div>
 <?php include_once 'partials/footer.php'?>   
</body>
</html>

