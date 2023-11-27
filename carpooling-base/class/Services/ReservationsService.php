<?php

namespace App\Services;

use App\Entities\Reservation;
use DateTime;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $reservationDate, string $address): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $reservationDateTime = new DateTime($reservationDate);
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($reservationDateTime, $address);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $reservationDateTime, $address);
        }

        return $isOk;
    }

    /**
     * Return all reservations.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setReservationDate(new DateTime($reservationDTO['reservationDate']));
                $reservation->setAddress($reservationDTO['address']);
                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteReservation($id);

        return $isOk;
    }
}
