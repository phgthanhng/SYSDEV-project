<?php

class AboutUs extends Controller {
    /*
     * Default constructor of the AboutUs class
     */
    public function __construct()
    {
        // initialise models here
    }

    /*
     * Displays the AboutUs page
     */
    public function index() {
        $this->view('AboutUs/index');
        // echo 'index page of the about us controller';
    }
}