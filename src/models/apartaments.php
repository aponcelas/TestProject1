<?php

namespace Daw;

// Classe Apartaments
class Apartaments {

    private $sql;

    // Constructor
    public function __construct($sql) {
        $this->sql = $sql;
    }

    // Funció per obtenir tots els apartaments
    public function getAll() {
        $query = "SELECT * FROM apartment";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    // Funció per obtenir el apartaments que estem buscant
    public function getAllSearch($startDate, $endDate, $numRooms) {
        $query = "SELECT * FROM apartment WHERE start_date <= :startDate AND end_date >= :endDate AND number_rooms >= :numRooms";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':startDate', $startDate);
        $stmt->bindValue(':endDate', $endDate);
        $stmt->bindValue(':numRooms', $numRooms);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per obtenir tots els apartaments
    public function selectAllApartments(){
        $query = "SELECT * FROM apartment";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per afegir un nou apartament
    public function addApartment($title, $postal_address, $length, $latitude, $short_description, $square_metres, $number_rooms, $services_extra, $price_day_low_season, $price_day_high_season, $start_date, $end_date) {
        $query = "INSERT INTO apartment (title, postal_address, length, latitude, short_description, square_metres, number_rooms, services_extra, price_day_low_season, price_day_high_season, start_date, end_date) VALUES (:title, :postal_address, :length, :latitude, :short_description, :square_metres, :number_rooms, :services_extra, :price_day_low_season, :price_day_high_season, :start_date, :end_date)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':title' => $title, ':postal_address' => $postal_address, ':length' => $length, ':latitude' => $latitude, ':short_description' => $short_description, ':square_metres' => $square_metres, ':number_rooms' => $number_rooms, ':services_extra' => $services_extra, ':price_day_low_season' => $price_day_low_season, ':price_day_high_season' => $price_day_high_season, ":start_date" => $start_date, ":end_date" => $end_date]);
    }
    
    // Funció per actualitzar un apartament
    public function updateApartment($apartmentId, $title, $postalAddress, $length, $latitude, $shortDescription, $squareMetres, $numberRooms, $servicesExtra, $priceLowSeason, $priceHighSeason, $startDate, $endDate) {
        $query = "UPDATE apartment SET title = :title, postal_address = :postal_address, length = :length, latitude = :latitude, short_description = :short_description, square_metres = :square_metres,number_rooms = :number_rooms, services_extra = :services_extra, price_day_low_season = :price_day_low_season, price_day_high_season = :price_day_high_season, start_date = :start_date, end_date = :end_date WHERE id_apartment = :apartment_id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':title' => $title, ':postal_address' => $postalAddress, ':length' => $length, ':latitude' => $latitude, ':short_description' => $shortDescription, ':square_metres' => $squareMetres, ':number_rooms' => $numberRooms, ':services_extra' => $servicesExtra, ':price_day_low_season' => $priceLowSeason, ':price_day_high_season' => $priceHighSeason, ':apartment_id' => $apartmentId, ":start_date" => $startDate, ":end_date" => $endDate]);
    }
    
    // Funció per seleccionar les reserves a partir de l'id del usuari
    public function selectReservation($id){
        $query = "SELECT r.* FROM reservation r INNER JOIN users u ON r.id_user = u.id_user WHERE u.id_user = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per seleccionar l'apartament a partir de l'id
    public function getApartamentInfoById($id) {
        $query = "SELECT * FROM apartment WHERE id_apartment = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per seleccionar les imatges del apartament a partir de l'id
    public function getImage($id) {
        $query = "SELECT * FROM img_apartments WHERE id_apartment = :id";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
    
    // Funció per obtenir totes les imatges dels apartaments
    public function getAllImage() {
        $query = "SELECT * FROM img_apartments";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateImage($imageId, $apartmentId, $path) {
        $query = "UPDATE img_apartments SET id_apartment = :id_apartment, image_path = :image_path WHERE id_image = :id_image";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':id_image' => $imageId, ':id_apartment' => $apartmentId, ':image_path' => $path]);
    }
    
}

?>
