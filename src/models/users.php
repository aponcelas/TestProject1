<?php

namespace Daw;

// Class Users
class Users {

    private $sql;

    // Constructor
    public function __construct($sql){
        $this->sql = $sql;
    }

    // Funció per guarder els missatges dels usuaris
    public function sendMessage($name, $email, $message) {
        $query = "INSERT INTO contact_requests (name, email, message) VALUES (:name, :email, :message)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':name' => $name, ':email' => $email, ':message' => $message,]);
    }
    
    // Funció per obtenir tots els missatges
    public function selectAllMessages() {
        $query = "SELECT * FROM contact_requests";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per seleccionar l'usuari
    public function selectUser($id){
        $query = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per seleccionar tots els usuaris
    public function selectAllUsers(){
        $query = "SELECT * FROM users";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per eliminar un usuari
    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id_user = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id' => $id]);
    }
    
    // Funció per afegir un usuari
    public function addUser($name, $last_name, $telephone, $email, $password, $id_role) {
        $query = "INSERT INTO users (name, last_name, telephone, email, password, id_role) VALUES (:name, :last_name, :telephone, :email, :password, :id_role)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':name' => $name, ':last_name' => $last_name, ':telephone' => $telephone, ':email' => $email, ':password' => $password, ':id_role' => $id_role]);
    }

    // Funció per fer login amb l'usuari 
    public function login($email, $password){
        $stm = $this->sql->prepare('select * from users where email=:email;');
        $stm->execute([':email' => $email]);
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if(is_array($result) && $result["password"] == $password){
            return $result;
        } else {
            return false;
        }
    }
    
    // Funció per registrar un nou usuari
    public function register($name, $last_name, $telephone, $email, $password, $id_role){
        $stmt = $this->sql->prepare('INSERT INTO users (name, last_name, telephone, email, password, id_role) VALUES (:name, :last_name, :telephone, :email, :password, :id_role)');
        $stmt->execute([':name' => $name,':last_name' => $last_name,':telephone' => $telephone,':email' => $email,':password' => $password, "id_role" => $id_role]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per actualitzar les dades de l'usuari
    public function updateUser($id_user, $name, $last_name, $telephone, $email, $card_number) {
        $query = "UPDATE users SET name = :name, last_name = :last_name, telephone = :telephone, email = :email, card_number = :card_number WHERE id_user = :id_user";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id_user' => $id_user, ':name' => $name, ':last_name' => $last_name, ':telephone' => $telephone, ':email' => $email, ':card_number' => $card_number]);
    }
}

?>