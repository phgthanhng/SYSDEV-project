<?php

    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail(){
        $name = "ShishaShop";  // Name of your website or yours
        $to = "phuongthanhnguyen136@gmail.com";  // mail of reciever
        $subject = "Reset password";
        $body = "<a href = 'http://localhost/Sysdev-project/Admin/login'>Reset password</a>";
        $from = "vaniercompsci@gmail.com";  // you mail
        $password = "sysdev123";  // your mail password

        // require_once "PHPMailer/PHPMailer.php";
        // require_once "PHPMailer/SMTP.php";
        // require_once "PHPMailer/Exception.php";
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            echo "Email is sent!";
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/">';
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }


        sendmail();  // call this function when you want to

        // if (isset($_GET['sendmail'])) {
        //     sendmail();
        // }
?>
