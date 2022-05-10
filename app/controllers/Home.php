<?php
class Home extends Controller
{
    /*
     * Default constructor of the Home class
     */
    public function __construct()
    {
    }

    /*
     * Displays home page
     */
    public function index()
    {
        return !isLoggedIn() ? $this->view('Home/index') :  $this->view('Admin/index');
    }
}
