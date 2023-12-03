<?php

namespace App\Entities;

class CarpoolingAd
{
    private $id;
    private $title;
    private $description;
    private $price;
    private $cars;
    private $reservations;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
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

    public function getReservations(): ?array
    {
        return $this->reservations;
    }

    public function setReservations(array $reservations)
{
    $this->reservations = $reservations; 

    return $this;
}
}