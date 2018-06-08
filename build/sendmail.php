<?php
if(isset($_POST['submit'])){
    $to = "nexis.sis@gmail.com";
    $error = NULL;
    if(isset($_POST['email'])){
        $from = $_POST['email'];
    }else{
        $error.="Email problem. ";
    }
    if(isset($_POST['name'])){
         $name = $_POST['name'];
    }else{
        $error.="Name problem. ";
    }
    if(isset($_POST['message'])){
         $message = $_POST['message'];
    }else{
        $error.="Message problem. ";
    }
    if(isset($_POST['isNewClient'])){
        $isNewClient = $_POST['isNewClient'];
    }
    if(!isset($isNewClient)){
        $isNewClient="yes";
    }
    $headers = "Eric Mausner WebSite";


    $message = "Name: ".$name.". Email: ".$from." Is it new client?: ".$isNewClient.". Message: ". $message;

    if( $error == NULL && mail($to,$subject,$message,$headers)){
         echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
        }else{
            echo "System Error. ".$error;
        }


    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>