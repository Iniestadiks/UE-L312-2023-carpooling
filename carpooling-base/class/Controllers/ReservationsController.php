<?php

namespace App\Controllers;

use App\Services\ReservationsService;

class ReservationsController
{
    /**
     * Return the html for the create action of a reservation.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['reservationDate']) && isset($_POST['address'])) {
            // Create the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                null,
                $_POST['reservationDate'],
                $_POST['address']
            );
            if ($isOk) {
                $html = 'Réservation créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action of reservations.
     */
    public function getReservations(): string
    {
        $html = '';

        // Get all reservations :
        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getReservationDate()->format('d-m-Y') . ' ' .
                $reservation->getAddress() . '<br />';
        }

        return $html;
    }

    /**
     * Update a reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['reservationDate']) &&
            isset($_POST['address'])) {
            // Update the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                $_POST['id'],
                $_POST['reservationDate'],
                $_POST['address']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la suppression de la réservation.';
            }
        }

        return $html;
    }
}