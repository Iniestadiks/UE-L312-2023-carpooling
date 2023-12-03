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

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getReservationDate(): DateTime
    {
        return $this->reservationDate;
    }

    public function setReservationDate(DateTime $reservationDate): self
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }
}