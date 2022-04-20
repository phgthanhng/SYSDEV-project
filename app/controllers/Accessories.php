<?php

class Accessories extends Controller {
    public function __construct()
    {
        // initialise models here
    }

    public function index() {
        $this->view('Accessories/index');
        // echo 'index page of the accessories controller';
    }
}