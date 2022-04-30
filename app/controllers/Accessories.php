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
        $brand = isset($_GET['brand']) ? $_GET['brand'] : [];
        $category = isset($_GET['category']) ? $_GET['category'] : [];
        $price = isset($_GET['price']) ? $_GET['price'] : [];
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

        $accessories = $this->productModel->getAccessoryFilter($brand, $price, $category, $sort);
        $brands = $this->productModel->getAccessoryBrand();
        $categories = $this->productModel->getAccessoryCategory();

        $data = [
            "accessories" => $accessories, 
            "brands" => $brands,
            "categories" => $categories
        ];
        $this->view('Accessories/index', $data);
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