<?php

$lname=$_POST['lname'];
$fname=$_POST['fname'];
$email=$_POST['email'];


?>

<?php

require 'phpmailer/PHPMailerAutoload.php';
$mail=new PHPMailer;

$mail->isSMTP();
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='bechdo23@gmail.com';
$mail->Password='bech123456';
$mail-> setFrom('bechdo23@gmail.com','BJMK');
$mail->addAddress($email,$fname);
$mail->addReplyTo('bechdo23@gmail.com');
$mail->isHTML(true);
$mail->Subject='Inquiry from:'. $lname;
$mail->Body='<h1 align=center>Test Mail</h1><br><h4 align=center>Test 2 Mail</h4>';
if (!$mail->send()){
    echo "Message is not sent!";
} else {
    echo "Message Has been Sent!";
}


?>