<?php

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
?>