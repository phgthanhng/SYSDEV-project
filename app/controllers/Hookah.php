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

    public function detail($id) {
        $hookah = $this->productModel->getHookah([
            "hookah_id" => $id
        ]);

        $data = [
            "hookah" => $hookah
        ];

        return $this->view('Hookah/details', $data);
    }
}