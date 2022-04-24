<?php

class Admin extends Controller {
    public function __construct()
    {
        // initialise models here
        $this->loginModel = $this->model('loginModel');
        $this->productModel = $this->model('productModel');
    }

    public function denyPermission() {
        echo '
            <div style="background-color:#000;  position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <h1 style="color:red;text-align: center;padding:5px;"> 
                    You do not have permission to access this page!
                </h1>
            </div>';
        echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/">';
    }

    public function index() {
        if (!isLoggedIn())
           return $this->denyPermission(); 
        
        return $this->view('Admin/index');
    }

    public function addHookah() {
        if (!isLoggedIn()) 
           return $this->denyPermission();
        
        if (!isset($_POST['submit']))
        {
            return $this->view('Admin/addHookah');
        }
        else 
        {
            $data = [
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "color" => $_POST['color'],
                "type" => $_POST['type'],
                "quantity" => $_POST['quantity'],
                "description" => $_POST['desc'],
                "brand" => $_POST['brand'],
                "image" => $this->imageUpload()
            ];

            if ($this->productModel->addHookah($data))
            {
                echo 'Adding hookah to database...';
                echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/manageProduct">';
            }
        }
    }

    public function addAccessory() {
        if (!isLoggedIn()) 
           return $this->denyPermission();    

        if (!isset($_POST['submit']))
        {
            return $this->view('Admin/addAccessory');
        }
        else 
        {
            $data = [
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "category" => $_POST['category'],
                "quantity" => $_POST['quantity'],
                "description" => $_POST['desc'],
                "brand" => $_POST['brand'],
                "image" => $this->imageUpload()
            ];

            if ($this->productModel->addAccessory($data))
            {
                echo 'Adding accessory to database...';
                echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/manageProduct">';
            }
        }
    }

    public function manageProduct() {
        if (!isLoggedIn()) 
           return $this->denyPermission();
        
        return $this->view('Admin/manageProduct');
    }

    public function editHookah($id) {
        if (!isLoggedIn()) 
           return $this->denyPermission();

        $hookah = $this->productModel->getHookah([ "hookah_id" => $id]);
        // check if hookah exists
        if (!isset($hookah->hookah_id))
        {
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/manageProduct">';
            return;
        }
        
        if (!isset($_POST['submit']))
        {
            return $this->view('Admin/editHookah', [ "hookah" => $hookah]);
        }
        else 
        {
            $data = [
                "hookah_id" => $id,
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "color" => $_POST['color'],
                "type" => $_POST['type'],
                "quantity" => $_POST['quantity'],
                "description" => $_POST['desc'],
                "brand" => $_POST['brand'],
                "image" => $this->imageUpload()
            ];

            if ($this->productModel->updateHookah($data))
            {
                echo 'Updating hookah...';
                echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/hookah/detail/'.$id.'">';
            }
        }
    }

    public function deleteHookah($id) {
        if (!isLoggedIn()) 
           return $this->denyPermission();

        $hookah = $this->productModel->getHookah([ "hookah_id" => $id ]);
        // check if hookah exists
        if (!isset($hookah->hookah_id))
        {
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/manageProduct">';
            return;
        }

        if ($this->productModel->deleteHookah([ "hookah_id" => $id ]))
        {
            echo 'Deleting hookah from database...';
            echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/manageProduct">';
        }
    }

    public function changeEmail() {
        if (!isLoggedIn()) 
            return $this->denyPermission();
        
        return $this->view('Admin/changeEmail');
    }

    public function changePassword() {
        if (!isLoggedIn()) 
            return $this->denyPermission();
        
        return $this->view('Admin/changePassword');
    }

    public function editContactUs() {
        if (!isLoggedIn()) 
            return $this->denyPermission();
        
        return $this->view('Admin/editContactUs');
    }

    public function editAboutUs() {
        if (!isLoggedIn()) 
            return $this->denyPermission();

        return $this->view('Admin/editAboutUs');
    }

    public function previewDatabase() {
        if (!isLoggedIn()) 
            return $this->denyPermission();
       
        return $this->view('Admin/previewDatabase');
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
        unset($_SESSION['admin_id']);
        session_destroy();
        echo 'logging out';
        echo '<meta http-equiv="refresh" content="2;url=/SYSDEV-project/" />'; // redirect to home page
    }

    public function imageUpload(){
        //default value for the picture
        $filename=false;
        
        //save the file that gets sent as a picture
        $file = $_FILES['image'];
        
        $acceptedTypes = ['image/jpeg'=>'jpg',
            'image/gif'=>'gif',
            'image/png'=>'png',
            'image/webp' => 'jpg'
        ];
        //validate the file
        
        if(empty($file['tmp_name']))
            return false;

        $fileData = getimagesize($file['tmp_name']);

        if($fileData!=false && 
            in_array($fileData['mime'],array_keys($acceptedTypes))){

            //save the file to its permanent location
                
            $folder = dirname(APPROOT).'/public/img';
            $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
            move_uploaded_file($file['tmp_name'], "$folder/$filename");
        }
        return $filename;
    }
}