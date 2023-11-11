<?php

namespace Daw;

// Class Reserves
class Reserves {

    private $sql;

    // Constructor
    public function __construct($sql) {
        $this->sql = $sql;
    }

    // Funció per obtenir totes les reserves
    public function getAllReservations() {
        $query = "SELECT * FROM reservation";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per eliminar una reserva
    public function deleteReservation($reservationId) {
        $query = "DELETE FROM reservation WHERE id_reserved = :reservationId"; 
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->execute();
    }

    // Funció per obtenir les temporades
    public function getSeason() {
        $query = "SELECT * FROM season";
        $stmt = $this->sql->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    // Funció per actualitzar les temporades
    public function updateSeason($seasonId, $name, $start_date, $end_date) {
        $query = "UPDATE season SET name = :name, start_date = :start_date, end_date = :end_date WHERE id_season = :seasonId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':seasonId', $seasonId);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':start_date', $start_date);
        $stmt->bindValue(':end_date', $end_date);
        $stmt->execute();
    }
    
    // Funció per fer la reserva del apartament
    public function DoReservation($startDate, $endDate, $state, $price, $idUser, $idApartment, $idSeason) {
        $query = "INSERT INTO reservation (entry_date, output_date, state, price, id_user, id_apartment, id_season) VALUES (:startDate, :endDate, :state, :price, :idUser, :idApartment, :idSeason)";
        $stmt = $this->sql->prepare($query);
        $stmt->execute([':startDate' => $startDate, ':endDate' => $endDate, ':state' => $state, ':price' => $price, ':idUser' => $idUser, ':idApartment' => $idApartment, ':idSeason' => $idSeason]);
    }
    
    // Funció per actualitzar les reserves
    public function updateReservation($reservationId, $entryDate, $outputDate, $state) {
        $query = "UPDATE reservation SET entry_date = :entryDate, output_date = :outputDate, state = :state WHERE id_reserved = :reservationId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->bindValue(':entryDate', $entryDate);
        $stmt->bindValue(':outputDate', $outputDate);
        $stmt->bindValue(':state', $state);
        $stmt->execute();
    }
    
    // Funció per obtenir la reserva
    public function getReservationData($reservationId) {
        $query = "SELECT * FROM reservation WHERE id_reserved = :reservationId";
        $stmt = $this->sql->prepare($query);
        $stmt->bindValue(':reservationId', $reservationId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>