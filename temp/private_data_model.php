<?php

class Private_data_model{
    
        private $connection;
        public $view_data;
        private $login_model;
                
    function __construct($connection, $login_model) {
          $this->connection = $connection;
          $this->view_data = include './template/data_templ.html';
         $this->login_model = $login_model;
         echo $this->login_model->user;
    }
    
}