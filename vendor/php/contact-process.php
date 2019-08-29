<?php

$EmailTo = "paboowicz@gmail.com";
$Subject = "Nowa wiadomosc z infotrans24.pl";

$errorMSG = $Body = null;
$name = $email = $message = null;
 
// NAME
if (empty($_POST["name"])) {
    $errorMSG .= "to pole jest wymagane";
} else {
    $name = $_POST["name"];
}
 
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email jest wymagany ";
} else {
    $email = $_POST["email"];
}

// PHONE
if (empty($_POST["subject"])) {
    $errorMSG .= "to pole jest wymagane";
    $Subject = '';
} else {
    $Subject = $_POST["subject"];
}
 
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "to pole jest wymagane";
} else {
    $message = $_POST["message"];
}
 
// prepare email body text
$Body .= "Name: ". $name . "\n";
$Body .= "Email: ". $email ."\n";
$Body .= "Body: ". $message ."\n";
 
// send email
if($name && $email && $Subject && $message){
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