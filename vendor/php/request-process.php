<?php

$EmailTo = "paboowicz@gmail.com";
$Subject = "Nowa wiadomosc z infotrans24.pl";

$errorMSG = $Body = null;
$name = $email = $phone = $select = null;
 
// NAME
if (empty($_POST["name"])) {
    $errorMSG .= "to pole jest wymagane";
} else {
    $name = $_POST["name"];
}
 
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email jest wymagany";
} else {
    $email = $_POST["email"];
}

// PHONE
if (empty($_POST["phone"])) {
    $errorMSG .= "to pole jest wymagane";
} else {
    $phone = $_POST["phone"];
}
 
// MESSAGE
if (empty($_POST["select"])) {
    $errorMSG .= "to pole jest wymagane";
} else {
    $select = $_POST["select"];
}
 
// prepare email body text
$Body .= "Name: " . $name . "\n";
$Body .= "Email: " . $email . "\n";
$Body .= "Phone: " . $phone . "\n";
$Body .= "Discuss: " . $select ."\n";
 
// send email
if($name && $email && $phone){
	$success = mail($EmailTo, $Subject, $Body, "From:".$email);
}else{
	$success = false;
}

if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "coś poszło nie tak :(";
    } else {
        echo $errorMSG;
    }
} 