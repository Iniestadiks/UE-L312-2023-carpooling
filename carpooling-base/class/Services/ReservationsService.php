<?php

namespace App\Services;

use App\Entities\Reservation;
use DateTime;

class ReservationsService {
    private DataBaseService $dataBaseService;

    public function __construct() {
        $this->dataBaseService = new DataBaseService();
    }

    /**
     * Crée ou met à jour une réservation.
     */
    public function setReservation(?string $id, DateTime $reservationDate, string $status): bool {
        if (empty($id)) {
            // Logique pour créer une nouvelle réservation
            return $this->dataBaseService->createReservation($reservationDate, $status);
        } else {
            // Logique pour mettre à jour une réservation existante
            return $this->dataBaseService->updateReservation($id, $reservationDate, $status);
        }
    }

    /**
     * Retourne toutes les réservations.
     */
    public function getReservations(): array {
        return $this->dataBaseService->getReservations();
    }

    /**
     * Supprime une réservation.
     */
    public function deleteReservation(string $id): bool {
        return $this->dataBaseService->deleteReservation($id);
    }
}