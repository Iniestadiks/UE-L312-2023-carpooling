<?php

namespace App\Entities;

use DateTime;

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $birthday;
    private $cars;
    private $carpoolingAds;
    private $reservations;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getCars(): ?array
    {
        return $this->cars;
    }

    public function setCars(array $cars)
    {
        $this->cars = $cars;

        return $this;
    }
    /**
     * Get carpooling ads associated with the user.
     */
    public function getCarpoolingAds(): ?array
    {
        return $this->carpoolingAds;
    }

    /**
     * Set carpooling ads for the user.
     */
    public function setCarpoolingAds(array $carpoolingAds)
    {
        $this->carpoolingAds = $carpoolingAds;

        return $this;
    }

    public function getReservations(): ?array
    {
        return $this->reservations;
    }

    /**
     * Set reservations for the user.
     */
    public function setReservations(array $reservations)
    {
        $this->reservations = $reservations;

        return $this;
    }
}
