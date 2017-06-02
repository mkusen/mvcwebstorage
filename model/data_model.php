<?php

class Data_model{
    
        private $connection;
        private $login_model;
                
    function __construct($connection, $login_model) {
          $this->connection = $connection;
         $this->login_model = $login_model;
         echo $this->login_model->user;
    }
    
}