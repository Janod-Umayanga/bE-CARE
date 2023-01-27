<?php

    class Patient extends Controller{
        private $doctorModel;
        public function __construct() {
            $this->doctorModel = $this->model('M_Doctor');
        }
    }

?>