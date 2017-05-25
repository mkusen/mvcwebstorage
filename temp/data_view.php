<?php

class Data_view{
     
     private $private_data_controller;
     private $private_data_model;
     public $login_model;
             
    function __construct($private_data_controller, $private_data_model) {         
        $this->private_data_controller = $private_data_controller;  
        $this->private_data_model = $private_data_model;
          
    }
    
    public function data_view(){
      
        return $this->private_data_model->view_data;
    }
}