<?php
  use PHPMailer\PHPMailer\PHPMailer;

    session_start();

    function isLoggedIn() {
      return isset($_SESSION['admin_id']);
    }

    /*
     * Validates the email 
     */
    function validate_email($email)
    {
        if (isset($email)) {
            $email = trim($email);
            $sanitized_email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $validated_email = filter_var($sanitized_email, FILTER_VALIDATE_EMAIL);

            return $validated_email;
        }

        return false;
    }

    /*
     * Sends reset password to email 
     */
    function sendmail(){
      $token = bin2hex(random_bytes(20));

      $name = "ShishaShop";  // Name of your website or yours
      $to = "ceejchilz02@gmail.com";  // mail of receiver  // for testing purpose only login to this one and send to self
      $subject = "Reset password";
      $body = "<a href = 'http://localhost/Sysdev-project/Admin/changePassword?token=".$token."'>Reset password</a>";
      $from = "vaniercompsci@gmail.com";  // you mail
      $password = "sysdev123";  // your mail password

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

      if ($mail->send())
          return $token;
  }
