<?php
class Hookah extends Controller {

    /*
     * Default constructor of Hookah Class
     */
    public function __construct()
    {
        // initialise models here
        $this->productModel = $this->model('productModel');
    }

    /*
     * Displays all hookahs
     */
    public function index() {
        $brand = isset($_GET['brand']) ? $_GET['brand'] : [];
        $type = isset($_GET['type']) ? $_GET['type'] : [];
        $color = isset($_GET['color']) ? $_GET['color'] : [];
        $price = isset($_GET['price']) ? $_GET['price'] : [];

        $hookahs = $this->productModel->getHookahFilter($brand, $type, $color, $price);
        $data = [
            "hookahs" => $hookahs
        ];
        return $this->view('Hookah/index', $data);
    }

    /*
     * Displays a specific Hookah based on the hookahID
     */
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