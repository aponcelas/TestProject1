<?php

namespace Daw;

// Class Connection
class Connection {

    private $sql = null;
    private $codi = null;

    // Connexió a la base de dades
    public function __construct($config) {
        $this->codi = $config["codi"]; // Retrieve the value of $codi from the config
        $dsn = "mysql:host={$config["database"]["server"]};dbname={$config["database"]["database"]};charset=utf8";
        $user = $config["database"]["username"];
        $password = $config["database"]["password"];
        try {
            $this->sql = new \PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            die("Connexió fallida");
        }
    }

    public function getConnection() {
        return $this->sql;
    }

   
}

?>
