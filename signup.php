

<?php
// var_dump($_POST);
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

//process the form
if(isset($_POST['signupBtn'])){
//initialize an array to store any error message from the form
$form_errors = array();
//Form validation
$required_fields = array('CustFirstName', 'CustLastName', 'CustUserName', 'Password', 'CustEmail', 'CustAddress', 'CustCity', 'CustProv',
 'CustPostal', 'CustCountry', 'CustHomePhone');

 //call the function to check empty field and merge the return data into form_error array
 $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

//Fields that requires checking for minimum length
$fields_to_check_length = array('CustUserName' => 4, 'Password' => 6);

//call the function to check minimum required length and merge the return data into form_error array
$form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));
//email validation / merge the return data into form_error array
$form_errors = array_merge($form_errors, check_email($_POST));

//check if error array is empty, if yes process form data and insert record
if(empty($form_errors))
    //collect form data and store in variables
    {
$fname =    $_POST['CustFirstName'];
$lname =    $_POST['CustLastName'];
$username=  $_POST['CustUserName'];
$password=  $_POST['Password'];
$email =    $_POST['CustEmail'];
$address =  $_POST['CustAddress'];
$city=      $_POST['CustCity'];    
$prov=      $_POST['CustProv'];
$postal=    $_POST['CustPostal'];
$country=   $_POST['CustCountry'];
$hphone =   $_POST['CustHomePhone'];
$bphone=    $_POST['CustBusPhone'];
   //hashing the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);


    try{
        //create SQL insert statement
        $sqlInsert ="INSERT INTO customers  (CustFirstName, CustLastName, CustUserName, Password, CustEmail, CustAddress, CustCity, CustProv, CustPostal, CustCountry, CustHomePhone, CustBusPhone) 
        VALUES (:CustFirstName, :CustLastName, :CustUserName, :Password, :CustEmail, :CustAddress, :CustCity, :CustProv, :CustPostal, :CustCountry, :CustHomePhone, :CustBusPhone)";
        //use PDO prepared to sanitize data
        $statement = $db->prepare($sqlInsert);
        //add the data into the database
        $statement->execute(array(':CustFirstName'=>$fname,':CustLastName'=>$lname, 'CustUserName'=>$username, ':Password'=>$hashed_password,':CustEmail'=> $email, ':CustAddress'=> $address,
        ':CustCity'=>$city, ':CustProv'=>$prov, ':CustPostal'=> $postal, ':CustCountry'=>$country, ':CustHomePhone'=> $hphone, ':CustBusPhone'=>$bphone));
        
        //check if one new row was created
            if($statement->rowCount()==1)
                {
                   $result="<p style = 'padding: 20px; color: green;'>Registeration Successful</p>";  
                }
        }
    catch (PDOException $ex)
                {
                    $result="<p style='padding: 20px; color: red;'>Unsuccessful Registeration: ".$ex->getMessage()."</p>";  
                }    
        }
            else{
                if(count($form_errors) == 1)
                {
                    $result = "<p style='color: red;'> There was 1 error in the form<br>";
                }
                    else
                    {
                         $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
                    }
                }
        
        }
?>

<!-- 
<form method="post" action="">
    <table>
        <tr><td>First Name</td> <td><input type="text" value="" name="CustFirstName"></td></tr>
        <tr><td>Last Name</td> <td><input type="text" value="" name="CustLastName"></td></tr>
        <tr><td>User name</td> <td><input type="text" value="" name="CustUserName"></td></tr>
        <tr><td>Password</td> <td><input type="password" value="" name="Password"></td></tr>
        <tr><td>Email</td> <td><input type="email" value="" name="CustEmail"></td></tr> 
        <tr><td>Address</td> <td><input type="text" value="" name="CustAddress"></td></tr>
        <tr><td>City</td> <td><input type="text" value="" name="CustCity"></td></tr>
        <tr><td>Province</td> <td><input type="text" value="" name="CustProv"></td></tr>
        <tr><td>Postal Code</td> <td><input type="text" value="" name="CustPostal"></td></tr>
        <tr><td>Country</td> <td><input type="text" value="" name="CustCountry"></td></tr>
        <tr><td>Home Phone</td> <td><input type="text" value="" name="CustHomePhone"></td></tr>
        <tr><td>Business Phone</td> <td><input type="text" value="" name="CustBusPhone"></td></tr>
        <tr><td></td><td><input type="submit" name="signupBtn" style="float: right;" value="Sign up"></td></tr>
    </table>
</form> -->
<section>
<?php    
$page_title ="User Authentication - Customer Registeration";
include_once 'header.php';
?>  
</section>

<section class=" registration" >
  <div class="overlay">
    <div class="container">
      <div class = "row d-flex justify-content-center">
        <div class="col-md-9">        
          <?php
            if(isset($result)) echo $result;
            if(!empty($form_errors)) echo show_errors($form_errors); 
          ?>
          <h3>Register Account</h3>
          <form method="post" action="">
            <div class="form-row">
              <div class="form-group col-md-6 ">
                <label for="firstnameField">First Name</label>
                <input type="text" class="form-control" id="usernameField" name="CustFirstName" placeholder="First Name">
              </div>
              <div class="form-group col-md-6">
                <label for="lastnameField">Last Name</label>
                <input type="text" class="form-control" id="lastnameField" name="CustLastName" placeholder="Last Name">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="usernameField">Username</label>
                <input type="text" class="form-control" id="usernameField" name="CustUserName" placeholder="Username">
              </div>
              <div class="form-group col-md-6">
                <label for="passwordField">Password</label>
                <input type="password" class="form-control" id="passwordField" placeholder="Password" name="Password">
            </div>          
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="AddressField">Street Address</label>
                <input type="text" class="form-control" id="AddressField" name="CustAddress" placeholder="Street Address">
              </div>
              <div class="form-group col-md-6">
                <label for="cityField">City</label>
                <input type="text" class="form-control" id="cityField" name="CustCity" placeholder="City">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="provinceField">Province</label>
                <input type="text" class="form-control" id="provinceField" name="CustProv" placeholder="Provice">
              </div>
              <div class="form-group col-md-4">
                <label for="postalField">Postal Code</label>
                <input type="text" class="form-control" id="postalField" name="CustPostal" placeholder="Postal Code">
              </div>
              <div class="form-group col-md-4">
                <label for="countryField">Country</label>
                <input type="text" class="form-control" id="countryField" name="CustCountry" placeholder="Country">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="emailField">Email</label>
                <input type="email" class="form-control" id="emailField" name="CustEmail" placeholder="Email">
              </div>         
              <div class="form-group  col-md-4">
                <label for="homephoneField">Home Phone</label>
                <input type="text" class="form-control" id="homephoneField" name="CustHomePhone" placeholder="Home Phone">
              </div>
              <div class="form-group  col-md-4">
                <label for="businessphoneField">Business Phone</label>
                <input type="text" class="form-control" id="businessphoneField" name="CustBusPhone" placeholder="Business Phone">
              </div>
            </div>

            <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="remember"> Remeber Me
              </label>
            </div>
            <a href="forgot_password.php">Forgot Password? </a>
            <button type="submit" class="btn btn-primary float-right" name="signupBtn">Sign up</button>
            </div>       
          </form>
        </div>   
      </div>            
    </div>

  </div>    

</section>  


<?php include_once 'footer.php'?>  
</body>
</html>




