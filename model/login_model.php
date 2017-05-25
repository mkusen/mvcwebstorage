<?php

session_start();

class Login_model {

    private $connection;
    public $view_login;
    public $unknown;
    public $user;
    public $result;

    function __construct($connection) {
        $this->connection = $connection;
        //generate view object from template
        $this->view_login = include './template/login_templ.html';
    }

    public function getOwner($username, $password) {

        $query = "SELECT owner_id, firstname, lastname FROM owner WHERE"
                . " username=? and password=?";
        $data = ([$username, $password]);

        $this->connection->setConnection($query, $data);
        $result = $this->connection->result;

        if ($result == null) {
            $this->unknown = "<h4>Korisničko ime i/ili lozinka nisu ispravni!<br>Pokušajte ponovno.</h4>";
        } else {

            $firstname = $result[0]['firstname'];
            $lastname = $result[0]['lastname']; 

            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            // echo "<h4>Korisnik: $firstname $lastname</h4>";
            $this->result = "<h4>Korisnik: $firstname $lastname</h4>";
        
        }
    }

}
