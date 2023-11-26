<?php

namespace App\Controllers;

use App\Services\ReservationsService;
use DateTime;

class ReservationsController {
    private ReservationsService $reservationsService;

    public function __construct() {
        $this->reservationsService = new ReservationsService();
    }

    public function createReservation(): string {
        $html = ''; // Initialisation de $html

        // Logique pour créer une réservation...
        // ...

        return $html;
    }

    public function getReservations(): string {
        $html = ''; // Initialisation de $html

        // Logique pour lire les réservations...
        // ...

        return $html;
    }

    public function updateReservation(): string {
        $html = ''; // Initialisation de $html

        // Logique pour mettre à jour une réservation...
        // ...

        return $html;
    }

    public function deleteReservation(): string {
        $html = ''; // Initialisation de $html

        // Logique pour supprimer une réservation...
        // ...

        return $html;
    }
}