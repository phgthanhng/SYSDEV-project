<?php

class Admin extends Controller {
    public function __construct()
    {
        // initialise models here
        $this->loginModel = $this->model('loginModel');
    }

    public function index() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/index');
    }

    public function addHookah() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/addHookah');
    }

    public function addAccessory() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/addAccessory');
    }

    public function manageProduct() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/manageProduct');
    }

    public function changeEmail() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/changeEmail');
    }

    public function changePassword() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/changePassword');
    }

    public function editContactUs() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/editContactUs');
    }

    public function editAboutUs() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/editAboutUs');
    }

    public function previewDatabase() {
        if (!isLoggedIn()) {
            echo 'You do not have permission to access this page';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
            return;
        }

        return $this->view('Admin/previewDatabase');
    }

    public function createSession() {
        
    }

    public function login() {
        // if is trying to view the page
        if (!isset($_POST['submit'])) 
        {
            $this->view('Admin/login');
        }
        else
        { 
            // get email and password from input
            $email = $_POST['email'];
            $password = $_POST['password'];

            $admin = $this->loginModel->getAdminByEmail($email);

            // check if an account with that email exists
            if (!isset($admin->admin_id)) 
            {
                $data = [
                    "message" => "wrong credentials"
                ];
                return $this->view('Admin/login', $data);
            }

            // check credentials
            if (password_verify($password, $admin->password)) 
            {
                // good credentials
                $_SESSION['admin_id'] = $admin->admin_id;
                echo '<meta http-equiv="Refresh" content=".5; url='.URLROOT.'/Admin">';
            }
            else 
            {
                // wrong credentials
                $data = [
                    "message" => "wrong credentials"
                ];
                return $this->view('Admin/login', $data);
            }
        }
    }

    public function logout() {
        // unset session values and destroy session
        unset($_SESSION['user_id']);
        session_destroy();
        echo 'logging out';
        echo '<meta http-equiv="refresh" content="2;url=/SYSDEV-project/" />'; // redirect to home page
    }
}