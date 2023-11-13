<?php

namespace Daw;

class Inscripcio {

    private $sql;

    // Constructor
    public function __construct($sql) {
        $this->sql = $sql;
    }

    public function addInscripcio($nom, $cognoms, $data_naixement, $carrer, $numero, $ciutat, $codi_postal, $resguard_pagament_path) {
        $query = "INSERT INTO participants (nom, cognoms, data_naixement, adreca_carrer, adreca_numero, adreca_ciutat, codi_postal, resguard_pagament_path)
        VALUES (:nom, :cognoms, :data_naixement, :carrer, :numero, :ciutat, :codi_postal, :resguard_pagament_path)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':nom' => $nom, ':cognoms' => $cognoms, ':data_naixement' => $data_naixement, ':carrer' => $carrer, ':numero' => $numero, ':ciutat' => $ciutat, ':codi_postal' => $codi_postal, ':resguard_pagament_path' => $resguard_pagament_path]);
    }
    
    public function getAll() {
        $query = "SELECT * FROM participants";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
}

?>