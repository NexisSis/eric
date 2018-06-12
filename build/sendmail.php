<?php
    $SmtpServer="mail.mausnerlawfirm.com";
    $SmtpPort="25";
    $SmtpUser="eric@mausnerlawfirm.com";
    $SmtpPass="Fartyuiop1";
    class SMTPClient
    {
        function SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body)
        {
            $this->SmtpServer = $SmtpServer;
            $this->SmtpUser = base64_encode ($SmtpUser);
            $this->SmtpPass = base64_encode ($SmtpPass);
            $this->from = $from;
            $this->to = $to;
            $this->subject = $subject;
            $this->body = $body;
            if ($SmtpPort == "")
            {
                $this->PortSMTP = 25;
            }
            else
            {
                $this->PortSMTP = $SmtpPort;
            }
        }
            function SendMail ()
            {
                if ($SMTPIN = fsockopen ($this->SmtpServer, $this->PortSMTP))
                {
                    fputs ($SMTPIN, "EHLO ".$HTTP_HOST."\r\n");
                    $talk["hello"] = fgets ( $SMTPIN, 1024 );
                    fputs($SMTPIN, "auth login\r\n");
                    $talk["res"]=fgets($SMTPIN,1024);
                    fputs($SMTPIN, $this->SmtpUser."\r\n");
                    $talk["user"]=fgets($SMTPIN,1024);
                    fputs($SMTPIN, $this->SmtpPass."\r\n");
                    $talk["pass"]=fgets($SMTPIN,256);
                    fputs ($SMTPIN, "MAIL FROM: <".$this->from.">\r\n");
                    $talk["From"] = fgets ( $SMTPIN, 1024 );
                    fputs ($SMTPIN, "RCPT TO: <".$this->to.">\r\n");
                    $talk["To"] = fgets ($SMTPIN, 1024);
                    fputs($SMTPIN, "DATA\r\n");
                    $talk["data"]=fgets( $SMTPIN,1024 );
                    fputs($SMTPIN, "To: <".$this->to.">\r\nFrom: <".$this->from.">\r\nSubject:".$this->subject."\r\n\r\n\r\n".$this->body."\r\n.\r\n");
                    $talk["send"]=fgets($SMTPIN,256);
                    fputs ($SMTPIN, "QUIT\r\n");
                    fclose($SMTPIN);
                }
            return $talk;
            }
        }

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
        $subject = 'New Client From Mausnerlawfirm';
        $SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $message);
        $SMTPChat = $SMTPMail->SendMail();
        if($error == NULL && isset($SMTPChat)){
             echo "<script>window.location.href='/thankyou.html'</script>";
            }else{
                echo "System Error. ".$error;
            }






    }
?>

