<?php

class Contact extends Controller {
    /*
     * Default constructor of the Contact class
     */
    public function __construct()
    {
        // initialise models here
        $this->contactModel = $this->model('contactModel');
    }

    /*
     * Displays contact us page
     */
    public function index() {
        $contact = $this->contactModel->getContactById(0);
        $data = [
            "contact" => $contact
        ];

        $this->view('Contact/index', $data);
    }
}