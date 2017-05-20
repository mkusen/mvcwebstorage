<?php

class Login_view {

    private $login_controller;
    private $login_model;

    function __construct($login_controller, $login_model) {
        $this->login_controller = $login_controller;
        $this->login_model = $login_model;
    }

    public function login_view() {
        echo $this->login_model->unknown;
        echo $this->login_model->user;
        return $this->login_model->view_login;
    }

}
