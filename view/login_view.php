<?php

class Login_view {

    private $login_controller;
    private $login_model;

    function __construct($login_controller, $login_model) {
        $this->login_controller = $login_controller;
        $this->login_model = $login_model;
    }

    public function login_view() {
        //login error: unknown user
        echo $this->login_model->unknown;
        
        echo $this->login_model->result;
        
        //calls (return) view object
        return $this->login_view = include './template/login_templ.html';
       
    }

}
