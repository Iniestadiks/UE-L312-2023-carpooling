<?php

namespace App\Entities;

use DateTime;

// Classe représentant une réservation.
class Reservation
{
    // Propriétés de la classe
    private $id;
    private $reservationDate;
    private $status;

    // Getter pour l'ID de la réservation
    public function getId(): string
    {
        return $this->id;
    }

    // Setter pour l'ID de la réservation
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    // Getter pour la date de la réservation
    public function getReservationDate(): DateTime
    {
        return $this->reservationDate;
    }

    // Setter pour la date de la réservation
    public function setReservationDate(DateTime $reservationDate): void
    {
        $this->reservationDate = $reservationDate;
    }

    // Getter pour le statut de la réservation
    public function getStatus(): string
    {
        return $this->status;
    }

    // Setter pour le statut de la réservation
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}