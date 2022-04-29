<?php

class AboutUs extends Controller {
    /*
     * Default constructor of the AboutUs class
     */
    public function __construct()
    {
        // initialise models here
        $this->aboutUsModel = $this->model('aboutUsModel');
    }

    /*
     * Displays the AboutUs page
     */
    public function index() {
        $aboutus = $this->aboutUsModel->getAboutUsById(0);
        $data = [
            "about" => $aboutus
        ];

        $this->view('AboutUs/index', $data);
    }
}