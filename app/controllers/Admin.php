<?php

class Admin extends Controller {
    public function __construct()
    {
        // initialise models here
    }

    public function index() {
        echo 'index page of the admin controller';
    }

    public function login() {
        echo 'login page';
    }

    public function logout() {
        // unset session values and destroy session
        unset($_SESSION['user_id']);
        session_destroy();
        echo 'logging out';
        echo '<meta http-equiv="refresh" content="2;url=localhost/SYSDEV-project/" />'; // redirect to home page
    }
}