<?php
//add our database connection script
include_once 'resource/Database.php';
include_once 'resource/utilities.php';
session_start();

//process the form if the reset password button is clicked
if(isset($_POST['passwordResetBtn'])){
    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('CustEmail', 'new_Password', 'confirm_Password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('new_Password' => 6, 'confirm_Password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){
        //collect form data and store in variables
        $email = $_POST['CustEmail'];
        $password1 = $_POST['new_Password'];
        $password2 = $_POST['confirm_Password'];

        //check if new password and confirm password is same
        if($password1 != $password2){
            $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> New password and confirm password does not match</p>";
        }else{
            try{
                //create SQL select statement to verify if email address input exist in the database
                $sqlQuery = "SELECT CustEmail FROM customers_1 WHERE CustEmail =:CustEmail";

                //use PDO prepared to sanitize data
                $statement = $db->prepare($sqlQuery);

                //execute the query
                $statement->execute(array(':CustEmail' => $email));

                //check if record exist
                if($statement->rowCount() == 1){
                    //hash the password
                    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                    //SQL statement to update password
                    $sqlUpdate = "UPDATE customers_1 SET Password =:Password WHERE CustEmail=:CustEmail";

                    //use PDO prepared to sanitize SQL statement
                    $statement = $db->prepare($sqlUpdate);

                    //execute the statement
                    $statement->execute(array(':Password' => $hashed_password, ':CustEmail' => $email));

                    $result = "<p style='padding:20px; border: 1px solid gray; color: green;'> Password Reset Successful</p>";
                }
                else{
                    $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> The email address provided
                                does not exist in our database, please try again</p>";
                }
            }catch (PDOException $ex){
                $result = "<p style='padding:20px; border: 1px solid gray; color: red;'> An error occurred: ".$ex->getMessage()."</p>";
            }
        }
    }
    else{
        if(count($form_errors) == 1){
            $result = "<p style='color: red;'> There was 1 error in the form<br>";
        }else{
            $result = "<p style='color: red;'> There were " .count($form_errors). " errors in the form <br>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Password Reset Page</title>
</head>
<body>
<h2>Reset PASSWORD </h2><hr>

<h3>Password Reset Form</h3>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
<form method="post" action="">
    <table>
        <tr><td>Email:</td> <td><input type="email" value="" name="CustEmail"></td></tr>
        <tr><td>New Password:</td> <td><input type="password" value="" name="new_Password"></td></tr>
        <tr><td>Confirm Password:</td> <td><input type="password" value="" name="confirm_Password"></td></tr>
        <tr><td></td><td><input style="float: right;" type="submit" name="passwordResetBtn" value="Reset Password"></td></tr>
    </table>
</form>
<p><a href="index.php">Back</a> </p>

</body>
</html>