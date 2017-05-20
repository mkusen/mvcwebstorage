<?php

class Login_controller {

    private $login_model;
    
    function __construct($login_model) {
        $this->login_model = $login_model;
    }

    public function login($username, $password) {

        $this->login_model->getOwner($username, $password);
    }

    public function clear() {
        session_unset();
        session_destroy();

        echo 'clear';
    }

}
