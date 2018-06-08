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
    $headers = "From Mausnerlawfirm.com";
    $headers .= "Reply-To: The Sender <sender@sender.com>\r\n";
    $headers .= "Return-Path: The Sender <sender@sender.com>\r\n";
    $headers .= "From: The Sender <senter@sender.com>\r\n";
    $headers .= "Organization: Sender Organization\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n"
    $message = "Name: ".$name.". Email: ".$from." Is it new client?: ".$isNewClient.". Message: ". $message;

    if( $error == NULL && mail($to,$subject,$message,$headers)){
    	 echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    	}else{
    		echo "System Error. ".$error;
    	}


    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }




?>
<?php
    #Адрес сервера
    $SmtpServer = "mail.artkiev.com";
    #Адрес порта
    $SmtpPort   = "25";
    #Логин авторизации на сервера SMTP
    $SmtpUser   = "username";
    #Пароль авторизации на сервера SMTP
    $SmtpPass   = "password";

    #Класс работы с почтой
    class SMTPClient
    {
        function SMTPClient($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body)
        {
            $this->SmtpServer = $SmtpServer;
            $this->SmtpUser   = base64_encode($SmtpUser);
            $this->SmtpPass   = base64_encode($SmtpPass);
            $this->from       = $from;
            $this->to         = $to;
            $this->subject    = $subject;
            $this->body       = $body;
            if ($SmtpPort == "") {
                $this->PortSMTP = 25;
            } else {
                $this->PortSMTP = $SmtpPort;
            }
        }
        function SendMail()
        {
            if ($SMTPIN = fsockopen($this->SmtpServer, $this->PortSMTP)) {
                fputs($SMTPIN, "EHLO " . $HTTP_HOST . "\r\n");
                $talk["hello"] = fgets($SMTPIN, 1024);
                fputs($SMTPIN, "auth login\r\n");
                $talk["res"] = fgets($SMTPIN, 1024);
                fputs($SMTPIN, $this->SmtpUser . "\r\n");
                $talk["user"] = fgets($SMTPIN, 1024);
                fputs($SMTPIN, $this->SmtpPass . "\r\n");
                $talk["pass"] = fgets($SMTPIN, 256);
                fputs($SMTPIN, "MAIL FROM: <" . $this->from . ">\r\n");
                $talk["From"] = fgets($SMTPIN, 1024);
                fputs($SMTPIN, "RCPT TO: <" . $this->to . ">\r\n");
                $talk["To"] = fgets($SMTPIN, 1024);
                fputs($SMTPIN, "DATA\r\n");
                $talk["data"] = fgets($SMTPIN, 1024);
                fputs($SMTPIN, "To: <" . $this->to . ">\r\nFrom: <" . $this->from . ">\r\nSubject:" . $this->subject . "\r\n\r\n\r\n" . $this->body . "\r\n.\r\n");
                $talk["send"] = fgets($SMTPIN, 256);
                fputs($SMTPIN, "QUIT\r\n");
                fclose($SMTPIN);
            }
            return $talk;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $to       = $_POST['to'];
        $from     = $_POST['from'];
        $subject  = $_POST['sub'];
        $body     = $_POST['message'];
        $SMTPMail = new SMTPClient($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
        $SMTPChat = $SMTPMail->SendMail();
    }
?>
