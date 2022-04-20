<?php

    session_start();

    function isLoggedIn() {
      return isset($_SESSION['admin_id']);
    }
?>