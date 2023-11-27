<?php

namespace App\Entities;

// Classe représentant une annonce de covoiturage.
class CarpoolingAd
{
    // Propriétés de la classe
    private $id;
    private $title;
    private $description;
    private $price;

    // Getter pour l'ID de l'annonce
    public function getId(): string
    {
        return $this->id;
    }

    // Setter pour l'ID de l'annonce
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    // Getter pour le titre de l'annonce
    public function getTitle(): string
    {
        return $this->title;
    }

    // Setter pour le titre de l'annonce
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // Getter pour la description de l'annonce
    public function getDescription(): string
    {
        return $this->description;
    }

    // Setter pour la description de l'annonce
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    // Getter pour le prix de l'annonce
    public function getPrice(): float
    {
        return $this->price;
    }

    // Setter pour le prix de l'annonce
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}