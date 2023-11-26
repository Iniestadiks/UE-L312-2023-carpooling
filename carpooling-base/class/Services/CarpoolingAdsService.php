<?php

namespace App\Services;

use App\Entities\CarpoolingAd;
use DateTime;

class CarpoolingAdsService {
    private DataBaseService $dataBaseService;

    public function __construct() {
        $this->dataBaseService = new DataBaseService();
    }

    /**
     * Crée ou met à jour une annonce de covoiturage.
     */
    public function setCarpoolingAd(?string $id, string $title, string $description, float $price): bool {
        if (empty($id)) {
            // Logique pour créer une nouvelle annonce de covoiturage
            return $this->dataBaseService->createCarpoolingAd($title, $description, $price);
        } else {
            // Logique pour mettre à jour une annonce de covoiturage existante
            return $this->dataBaseService->updateCarpoolingAd($id, $title, $description, $price);
        }
    }

    /**
     * Retourne toutes les annonces de covoiturage.
     */
    public function getCarpoolingAds(): array {
        return $this->dataBaseService->getCarpoolingAds();
    }

    /**
     * Supprime une annonce de covoiturage.
     */
    public function deleteCarpoolingAd(string $id): bool {
        return $this->dataBaseService->deleteCarpoolingAd($id);
    }
}