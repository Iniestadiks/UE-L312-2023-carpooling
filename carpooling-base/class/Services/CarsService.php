<?php

namespace App\Services;

use App\Entities\Car;
use DateTime;

class CarsService {
    private DataBaseService $dataBaseService;

    public function __construct() {
        $this->dataBaseService = new DataBaseService();
    }

    /**
     * Crée ou met à jour une voiture.
     */
    public function setCar(?string $id, string $make, string $model, int $year): bool {
        if (empty($id)) {
            // Logique pour créer une nouvelle voiture
            return $this->dataBaseService->createCar($make, $model, $year);
        } else {
            // Logique pour mettre à jour une voiture existante
            return $this->dataBaseService->updateCar($id, $make, $model, $year);
        }
    }

    /**
     * Retourne toutes les voitures.
     */
    public function getCars(): array {
        return $this->dataBaseService->getCars();
    }

    /**
     * Supprime une voiture.
     */
    public function deleteCar(string $id): bool {
        return $this->dataBaseService->deleteCar($id);
    }
}