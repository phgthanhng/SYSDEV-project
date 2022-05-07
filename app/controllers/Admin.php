<?php
use PHPMailer\PHPMailer\PHPMailer;

class Admin extends Controller
{
    public function __construct()
    {
        // initialise models here
        $this->loginModel = $this->model('loginModel');
        $this->productModel = $this->model('productModel');
        $this->contactModel = $this->model('contactModel');
        $this->aboutUsModel = $this->model('aboutUsModel');
        $this->pwdResetModel = $this->model('pwdResetModel');
    }

    /*
     * Removes access to Admin controls if not an admin
     */
    public function denyPermission()
    {
        $this->view('Message/accessDenied');
        echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/">';
    }

    /*
     * Displays default admin page if admin is logged in but 
     * if not removes access to Admin controls
     */
    public function index()
    {
        return !isLoggedIn() ? $this->denyPermission() :  $this->view('Admin/index');
    }

    /*
     * Adds a hookah product to the system
     */
    public function addHookah()
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        if (!isset($_POST['submit']))
            return $this->view('Admin/addHookah');

        else {
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

            if ($this->productModel->addHookah($data)) {
                echo 'Adding hookah to database...';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
            }
        }
    }

    /*
     * Adds an accessory to the system
     */
    public function addAccessory()
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        if (!isset($_POST['submit']))
            return $this->view('Admin/addAccessory');

        else {
            $data = [
                "name" => $_POST['name'],
                "price" => $_POST['price'],
                "category" => $_POST['category'],
                "quantity" => $_POST['quantity'],
                "description" => $_POST['desc'],
                "brand" => $_POST['brand'],
                "image" => $this->imageUpload()
            ];

            if ($this->productModel->addAccessory($data)) {
                echo 'Adding accessory to database...';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
            }
        }
    }

    /*
     * Displays all products(Hookah and Accessory) so Admin can manage the product/s
     */
    public function manageProduct()
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        $products = $this->productModel->getAllProducts();

        $data = [
            'products' => $products
        ];

        return $this->view('Admin/manageProduct', $data);
    }

    /*
     * Updates a specific hookah based on the hookahID
     */
    public function editHookah($id)
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        $hookah = $this->productModel->getHookah(["hookah_id" => $id]);
        // check if hookah exists
        if (!isset($hookah->hookah_id)) {
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
            return;
        }

        // if submit button is not clicked
        if (!isset($_POST['submit'])) {
            return $this->view('Admin/editHookah', ["hookah" => $hookah]);
        }
        // submit button clicked
        else {
            $filename = (is_uploaded_file($_FILES['image']['tmp_name'])) ?
                $this->imageUpload() : $hookah->image;

            $data = [
                "hookah_id" => $id,
                "name" => trim($_POST['name']),
                "price" => trim($_POST['price']),
                "color" => trim($_POST['color']),
                "type" => trim($_POST['type']),
                "quantity" => trim($_POST['quantity']),
                "description" => trim($_POST['desc']),
                "brand" => trim($_POST['brand']),
                "image" => $filename
            ];

            if ($this->productModel->updateHookah($data)) {
                echo 'Updating hookah...';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/hookah/detail/' . $id . '">';
            }
        }
    }

    /*
     * Updates a specific accessory 
     */
    public function editAccessory($id)
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        $accessory = $this->productModel->getAccessory(["accessory_id" => $id]);

        // check if hookah exists
        if (!isset($accessory->accessory_id)) {
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
            return;
        }

        if (!isset($_POST['submit']))
            return $this->view('Admin/editAccessory', ["accessory" => $accessory]);

        else {
            $filename = (is_uploaded_file($_FILES['image']['tmp_name'])) ?
                $this->imageUpload() : $accessory->image;

            $data = [
                "hookah_id" => null,
                "accessory_id" => $id,
                "name" => trim($_POST['name']),
                "price" => trim($_POST['price']),
                "category" => trim($_POST['category']),
                "quantity" => trim($_POST['quantity']),
                "description" => trim($_POST['desc']),
                "brand" => trim($_POST['brand']),
                "image" => $filename
            ];

            if ($this->productModel->updateAccessory($data)) {
                echo 'Updating Accessory...';
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/accessories/detail/' . $id . '">';
            }
        }
    }

    /*
     * Deletes a specific hookah based on the hookahID
     */
    public function deleteHookah($id)
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        $hookah = $this->productModel->getHookah(["hookah_id" => $id]);
        // check if hookah exists
        if (!isset($hookah->hookah_id)) {
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
            return;
        }

        if ($this->productModel->deleteHookah(["hookah_id" => $id])) {
            echo 'Deleting hookah from database...';
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
        }
    }

    /*
     * Deletes a specific accessory based on the accessoryID
     */
    public function deleteAccessory($id)
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        $accessory = $this->productModel->getAccessory(["accessory_id" => $id]);
        // check if hookah exists
        if (!isset($accessory->accessory_id)) {
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
            return;
        }

        if ($this->productModel->deleteAccessory(["accessory_id" => $id])) {
            echo 'Deleting accessory from database...';
            echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Admin/manageProduct">';
        }
    }

    /*
     * Updates the email of the admin
     */
    public function changeEmail()
    {
        if (!isLoggedIn())
            return $this->denyPermission();

            $admin = $this->loginModel->getAdmin($_SESSION['admin_id']);

            $data = [
                'admin' => $admin,
                'new_email' => '',
                'verify_email' => '',
                'message' => ''
            ];

            if(!isset($_POST['submit'])){
                
                return $this->view('Admin/changeEmail',$data);
            }
            else{
                
                $data['new_email'] = $_POST['email'];
                $data['verify_email'] = $_POST['verify_email'];
                
                if($data['new_email']!=$data['verify_email']){
                    $data['message'] = 'Please enter matching emails!';
                    return $this->view('Admin/changeEmail',$data);
                }
                else{
                    if($this->loginModel->updateEmail($_SESSION['admin_id'],$data['new_email'])){
                        echo 'Updating your email';
                        echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/changeEmail">';
                    }
                }
                
            }
        
        
    }

    /*
     * Updates the password of the admin
     */
    public function changePassword()   
    {
        $pwdReset = $this->pwdResetModel->getLatestToken();
        // restricting access to users who are signed in or if they have the correct token
        if ((!isLoggedIn() && !isset($pwdReset->token)) 
            || (!isLoggedIn() && !isset($_GET['token'])) 
            || (isset($_GET['token']) && $_GET['token'] != $pwdReset->token && $pwdReset->expire > date("U")))
            return $this->denyPermission();

        // if trying to access the view (GET request)
        if (!isset($_POST['submit'])){
            $data = [];
            if (isLoggedIn()) {
                $admin = $this->loginModel->getAdmin($_SESSION['admin_id']);

                $data = [
                    'admin' => $admin
                ];
            }
            else { 
                $data = [
                    'token' => $_GET['token']
                ];
            }
            
            return $this->view('Admin/changePassword', $data);
            

        } else { // POST request
    
            $new_password = $_POST['new_password'];
            $verify_password = $_POST['verify_password'];

            if (isLoggedIn()) { // if already signed in, no need to check token
                $admin = $this->loginModel->getAdmin($_SESSION['admin_id']);
                $password = $_POST['password'];

                // check if both passwords are the same
                if ($new_password !== $verify_password) {
                    return $this->view('Admin/changePassword', [
                        'admin' => $admin,
                        'message' => 'Passwords do not match!'
                    ]);
                }

                // verify that the current password is right
                if (!password_verify($password, $admin->password)){
                    return $this->view('Admin/changePassword', [
                        'admin' => $admin,
                        'message' => 'Password is incorrect'
                    ]);
                }

                if ($this->loginModel->updatePassword($_SESSION['admin_id'], password_hash($new_password, PASSWORD_DEFAULT))) {
                    echo 'Password updated!';
                    echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/">';
                }
            }
            else // if using a token
            {
                if ($this->loginModel->updatePassword(1, password_hash($new_password, PASSWORD_DEFAULT))) {
                    $this->pwdResetModel->clearTable();
                    echo 'Password updated!';
                    echo '<meta http-equiv="Refresh" content="2; url='.URLROOT.'/Admin/login">';
                }
            }
        }
    }

    /*
     * Updates the Contact Us page
     */
    public function editContactUs()
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        if (!isset($_POST['submit'])) {
            $contact = $this->contactModel->getContactById(0);
            $data = [
            "contact" => $contact
            ];

            $this->view('Admin/editContactUs', $data);
        }
        else {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);

            $contact = [
                "email" => $email,
                "location" => $address,
                "phone" => $phone,
                "name" => $name
            ];

            if ($this->contactModel->updateContact($_SESSION['admin_id'], $contact)) {
                echo "updating contact...";
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/Contact/">';
            }
        }
    }

    /*
     * Updates the About Us page
     */
    public function editAboutUs()
    {
        if (!isLoggedIn())
            return $this->denyPermission();
        $aboutus = $this->aboutUsModel->getAboutUsById(0);

        if (!isset($_POST['submit'])) { 
            $data = [
                'aboutus' => $aboutus
                ];
            return $this->view('Admin/editAboutUs', $data);
        }

        else {
           
            $filename = (is_uploaded_file($_FILES['image']['tmp_name'])) ? 
                    $this->imageUpload() : $aboutus->image;

            $text = trim($_POST['aboutus_content']);
            $about_us = [
                "text" => $text,
                "image" => $filename
            ];
            
            if ($this->aboutUsModel->updateAboutUs($_SESSION['admin_id'], $about_us)) {
                echo "updating about us...";
                echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/AboutUs/">';
            }
        }
    }

    /*
     * Displays all information from the database
     */
    public function previewDatabase()
    {
        if (!isLoggedIn())
            return $this->denyPermission();

        $admin = $this->loginModel->getAllAdmin();
        $hookahs = $this->productModel->getAllHookahs();
        $accessories = $this->productModel->getAllAccessories();
        $contact = $this->contactModel->getAllContact();
        $aboutUs = $this->aboutUsModel->getAllAboutUs();

        $database = [
            'admins' => $admin,
            'hookahs' => $hookahs,
            'accessories' => $accessories,
            'contacts' => $contact,
            'aboutUs' => $aboutUs
        ];

        return $this->view('Admin/previewDatabase', $database);
    }

    /*
     * Allows the admin to upload an image to the system
     */
    public function imageUpload()
    {
        //default value for the picture
        $filename = false;

        //save the file that gets sent as a picture
        $file = $_FILES['image'];

        $acceptedTypes = [
            'image/jpeg' => 'jpg',
            'image/gif' => 'gif',
            'image/png' => 'png',
            'image/webp' => 'jpg'
        ];

        //validate the file
        if (empty($file['tmp_name']))
            return false;

        $fileData = getimagesize($file['tmp_name']);

        if ($fileData != false &&  in_array($fileData['mime'], array_keys($acceptedTypes))) {
            //save the file to its permanent location
            $folder = dirname(APPROOT) . '/public/img';
            $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
            move_uploaded_file($file['tmp_name'], "$folder/$filename");
        }
        return $filename;
    }

    /*
     * Verify credentials and logs in the admin if correct
     */
    public function login()
    {
        // if is trying to view the page
        if (!isset($_POST['submit']))
            $this->view('Admin/login');

        else {
            // get email and password from input
            $email = $_POST['email'];
            $password = $_POST['password'];

            $admin = $this->loginModel->getAdminByEmail($email);

            // check if an account with that email exists
            if (!isset($admin->admin_id)) {
                $data = [
                    "message" => "Wrong credentials"
                ];
                return $this->view('Admin/login', $data);
            }

            // set attempts = 0
            if (!isset($_SESSION["attempts"]))
                $_SESSION["attempts"] = 0;

            if (password_verify($password, $admin->password)) {
                // good credentials
                $_SESSION['admin_id'] = $admin->admin_id;
                echo '<meta http-equiv="Refresh" content=".5; url=' . URLROOT . '/Admin">';
                unset($_SESSION['attempts']);                       // if logged in successfully, unset the session
            } else {
                $_SESSION['attempts']++;
                // wrong credentials
                if ($_SESSION['attempts'] <= 3) {
                    $data = [
                        "message" => "Wrong credentials"
                    ];
                    return $this->view('Admin/login', $data);
                }
                else {
                    unset($_SESSION['attempts']);
                    if ($this->sendmail()) {
                        $data = [
                            "message" => "Email sent",
                            "color" => "success"
                        ];
                        return $this->view('Admin/login', $data);
                    }
                }
            }
        }
    }

    /*
     * Destroys a session and logouts the admin
     */
    public function logout()
    {
        // unset session values and destroy session
        unset($_SESSION['admin_id']);
        session_destroy();
        $this->view('Message/logoutScreen');
        echo '<meta http-equiv="Refresh" content="2; url=' . URLROOT . '/">';
        // redirect to home page
    }

    /*
     * Allows Admin to be able to send reset password email when the Forgot password is clicked in the Login view 
     */
    public function forgotPassword() {
        // if (!isLoggedIn()) {
        //     if (isset($GLOBALS['reset_token']))
        // }
        if (!isset($_POST['submit'])) 
            $this->view('Admin/forgotPassword');

        else {
            $admin = $this->loginModel->getAdminByEmail(trim($_POST['email']));
            if (isset($admin->admin_id)) {  // ensures that it will only send when email is valid
                $token = $this->sendmail();
                if (isset($token)) {
                    $dbdata = [
                        "email" => $_POST['email'],
                        "token" => $token,
                        "expire" => date("U") + 1800
                    ];
                    $this->pwdResetModel->insertToken($dbdata);

                    $data = [
                        "message" => "Email sent",
                        "color" => "success"
                    ];
                } 
                
                else {
                    $data = [
                        'message' => "Error in sending email",
                    ];    
                }
                $this->view('Admin/forgotPassword', $data);
            }
            else {
                $data = [
                    "message" => "Wrong email"
                ];
                $this->view('Admin/forgotPassword', $data);
            }
        } 
    }

    /*
     * Sends reset password to email 
     */
    public function sendmail(){
        $token = bin2hex(random_bytes(20));

        $name = "ShishaShop";  // Name of your website or yours
        $to = "vaniercompsci@gmail.com";  // mail of receiver  // for testing purpose only login to this one and send to self
        $subject = "Reset password";
        $body = "<a href = 'http://localhost/Sysdev-project/Admin/changePassword?token=".$token."'>Reset password</a>";
        $from = "vaniercompsci@gmail.com";  // you mail
        $password = "sysdev123";  // your mail password

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;

        if ($mail->send())
            return $token;
    }

}
