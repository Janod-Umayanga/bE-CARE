<?php

    class Core {

        // URL format --> /controller/method/params

        protected $currentController = 'Pages';
        protected $currentMethod = 'Index';
        protected $param = [];

        public function __construct() {
            // print_r($this->getURL());
            $url = $this->getURL();

           if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {  //capitalize the first letter of the first word in the protocol string.
                // Load the controller if exists
                $this->currentController = ucwords($url[0]);

                // Unset the controller in the URL
                unset($url[0]);

                // Call the controller
                require_once '../app/controllers/'.$this->currentController.'.php';

                // Instantiate the controller
                $this->currentController = new $this->currentController;
            
                // Check for the method in the controller
                if(isset($url[1])) {
                    if(method_exists($this->currentController, $url[1])) {
                        $this->currentMethod = $url[1];
                        unset($url[1]);
                    }
                }

                // Get parameter list
                $this->param  = $url ? array_values($url) : [];

                // Call method and pass the parameter list
                call_user_func_array([$this->currentController, $this->currentMethod], $this->param);
            }
        }

        public function getURL() {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');  //removes any trailing slashes from the url
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);  //splits a string into an array

                //http://localhost/be-care/Login/forgotPassword
                //print_r($url);  ex: Array ( [0] => Login [1] => forgotPassword )

                return $url;
            }
        }
        
    }

?>
