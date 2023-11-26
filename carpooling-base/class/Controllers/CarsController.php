<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController {
    private CarsService $carsService;

    public function __construct() {
        $this->carsService = new CarsService();
    }

    public function createCar(): string {
        $html = ''; // Initialisation de $html

        // Logique pour créer une voiture...
        // ...

        return $html;
    }

    public function getCars(): string {
        $html = ''; // Initialisation de $html

        // Logique pour lire les voitures...
        // ...

        return $html;
    }

    public function updateCar(): string {
        $html = ''; // Initialisation de $html

        // Logique pour mettre à jour une voiture...
        // ...

        return $html;
    }

    public function deleteCar(): string {
        $html = ''; // Initialisation de $html

        // Logique pour supprimer une voiture...
        // ...

        return $html;
    }
}