<?php

class Hookah extends Controller {
    public function __construct()
    {
        // initialise models here
    }

    public function index() {
        $this->view('Hookah/index');
        // echo 'index page of the hookah controller';
    }
}