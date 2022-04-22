<?php

class Hookah extends Controller {
    public function __construct()
    {
        // initialise models here
        $this->productModel = $this->model('productModel');
    }

    public function index() {
        $hookahs = $this->productModel->getAllHookahs();

        $data = [
            "hookahs" => $hookahs
        ];

        $this->view('Hookah/index', $data);
    }
}