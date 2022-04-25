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
        $hookahs = $this->productModel->getAllHookahs();

        $data = [
            "hookahs" => $hookahs
        ];

        $this->view('Hookah/index', $data);
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