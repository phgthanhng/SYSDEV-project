<?php

class AboutUs extends Controller {
    public function __construct()
    {
        // initialise models here
    }

    public function index() {
        $this->view('AboutUs/index');
        // echo 'index page of the about us controller';
    }
}