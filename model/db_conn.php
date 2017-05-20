<?php

class DB_conn {

    public function __construct() {
      
    }

    public function setConnection($query, $data) {
        //test if configuration file for database connection exists
        if (!file_exists("./ini/config.ini")) {
            die("Config file not found");
        }
        $config_data = parse_ini_file("./ini/config.ini");

//read configuration from file
        $db_host = $config_data['db_host'];
        $db_username = $config_data['db_username'];
        $db_password = $config_data['db_password'];
        $db_name = $config_data['db_name'];

        try {
            $connection = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $connection->prepare($query);
            $stmt->execute($data);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);           
           
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
        return $this->result = $result;
      
    }

}
