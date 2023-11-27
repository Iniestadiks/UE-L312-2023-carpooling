<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $reservationDate;
    private $address;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getReservationDate(): DateTime
    {
        return $this->reservationDate;
    }

    public function setReservationDate(DateTime $reservationDate): void
    {
        $this->reservationDate = $reservationDate;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}