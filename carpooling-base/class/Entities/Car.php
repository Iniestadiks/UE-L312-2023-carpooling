<?php

namespace App\Entities;

// Classe représentant une voiture.
class Car
{
    // Propriétés de la classe
    private $id;
    private $make;
    private $model;
    private $year;

    // Getter pour l'ID de la voiture
    public function getId(): string
    {
        return $this->id;
    }

    // Setter pour l'ID de la voiture
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    // Getter pour la marque de la voiture
    public function getMake(): string
    {
        return $this->make;
    }

    // Setter pour la marque de la voiture
    public function setMake(string $make): void
    {
        $this->make = $make;
    }

    // Getter pour le modèle de la voiture
    public function getModel(): string
    {
        return $this->model;
    }

    // Setter pour le modèle de la voiture
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    // Getter pour l'année de la voiture
    public function getYear(): int
    {
        return $this->year;
    }

    // Setter pour l'année de la voiture
    public function setYear(int $year): void
    {
        $this->year = $year;
    }
}