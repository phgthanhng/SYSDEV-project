<?php 
    //adding our config file 
    require_once 'config/config.php';

    require_once 'core/helper.php';

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    //We will add our required files here 
    //require_once 'core/app.php';
    //require_once 'core/Controller.php';

    spl_autoload_register(function($className){
        require_once 'core/'. $className .'.php';
    });