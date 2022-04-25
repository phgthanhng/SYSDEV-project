<?php
class Accessories extends Controller {

    /*
     * Default constructor of Accessories Class 
     */
    public function __construct()
    {
        // initialise models here
        $this->productModel = $this->model('productModel');;
    }

    /*
     * Displays all accessories
     */
    public function index() {
        $accessories = $this->productModel->getAllAccessories();

        $this->view('Accessories/index', [ "accessories" => $accessories ]);
    }

    /*
     * Displays a specific accessory based on the accessoryID
     */
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