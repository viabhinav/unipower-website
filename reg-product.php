<?php
$name = $_POST['name'];
$address = $_POST['add'];
$email = "contact@myunipower.com";
$user_email = $_POST['email'];
$model = $_POST['model'];
$serial = $_POST['serial'];
$mnumber = $_POST['mnumber'];
$pdate = $_POST['dop'];
$country = $_POST['country'];
$thankyoumessage = "Hell from Unipower Energy Systems! We have successfully recieved your warranty registration request and we have processed it. Feel free to contact us using https://myunipower.com/contact-us.html . Hope you have a nice day!";
$lowercountry = strtolower($country);
if ($lowercountry == 'india'){
    $formcontent=" From: $name \n Address: $address \n M.Number: $mnumber \n Email: $user_email \n Model: $model \n Serial: $serial \n DOP: $pdate";
    $recipient = "care@myunipower.com";
    $subject = "Warranty Registration";
    //$mailheader = "From: $user_email \r\n";
    mail($recipient, $subject, $formcontent) or die("Error!");
    mail($user_email, "Warranty registration recieved!", $thankyoumessage);
    $referer = "thank-you.html";
        header("Location: $referer");}
else{
    die("Sorry, but this is for Unipower Energy Systems India. Other regions aren't supported.");
    
}
?>