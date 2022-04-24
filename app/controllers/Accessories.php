<?php

class Accessories extends Controller {
    public function __construct()
    {
        // initialise models here
        $this->productModel = $this->model('productModel');;
    }

    public function index() {
        $accessories = $this->productModel->getAllAccessories();

        $this->view('Accessories/index', [ "accessories" => $accessories ]);
    }

    public function detail($id) {
        $accessory = $this->productModel->getAccessory([
            "accessory_id" => $id
        ]);

        $data = [
            "accessory" => $accessory
        ];

        return $this->view('Accessories/details', $data);
    }
}