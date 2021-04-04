<?php
$name = $_POST['name'];
$email = "contact@myunipower.com";
$user_email = $_POST['email'];
$message = $_POST['message'];
$formcontent="$message";
$recipient = "viabhinav33@gmail.com";
$recipient2 = "umeshprasad75@gmail.com";
$recipient3 = "rawwebpower@gmail.com";
$subject = "$name";
$header = $user_email."\r\n";
mail($recipient, $subject, $formcontent, $header) or die("Error!");
mail($recipient2, $subject, $formcontent, $header) or die("Error!");
mail($recipient3, $subject, $formcontent, $header) or die("Error!");
// echo "Thank You!" . " -" . "<a href='form.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
$referer = "thank-you.html";
    header("Location: $referer");
?>
