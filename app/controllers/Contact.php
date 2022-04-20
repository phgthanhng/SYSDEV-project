<?php

class Contact extends Controller {
    public function __construct()
    {
        // initialise models here
    }

    public function index() {
        $this->view('Contact/index');
        // echo 'index page of the about us controller';
    }
}