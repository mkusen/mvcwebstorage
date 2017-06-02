<?php

class Data_view{
     
     private $data_controller;
     private $data_model;
             
    function __construct($data_controller, $data_model) {         
        $this->data_controller = $data_controller;  
        $this->data_model = $data_model;          
    }
    
    public function data_view(){
      
       //calls (return) view object
        return $this->data_view = include './template/data_templ.html';
    }
}