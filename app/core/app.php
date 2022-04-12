<?php

    /*
        This is our core app file. 
        It is responsible for the routing of our application 
        Programmatically mapping of URLs to controllers and methods

        URL pattern:- /controller/method/params
    */

    class App{

        protected $currentController = 'Home';
        protected $currentMethod = 'index';
        protected $params = [];

        public function __construct()
        {  
            $url = $this->parseURL();

            if(file_exists('../app/controllers/'.$url[0].'.php')){
                $this->currentController = $url[0];
                unset($url[0]);
            }

            //Require the controller 
            require_once '../app/controllers/'.$this->currentController.'.php';

            //Instantiate the controller class 
            $this->currentController = new $this->currentController;

            //check for the method name in the url 
            if(isset($url[1])){
                //check to see if such method exists in the conroller 
                if(method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }

            //Get the params from the url if any 
            $this->params = $url ? array_values($url) : [];

            //Calling the method in our currentController with an array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        }

        public function parseURL(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
        }
    }
