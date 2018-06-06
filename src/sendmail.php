<?php
if(isset($_POST['submit'])){
    $to = "nexis.sis@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['$message'];
    $isNewClient = $_POST['isNewClient'];
    $headers = "From email: ".$from;
    var_dump($message)
    $message = "Name: ".$name." message: ".$message." Is it new client?: ".$isNewClient;
    var_dump($message);
    mail($to,$subject,$message,$headers);

    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>