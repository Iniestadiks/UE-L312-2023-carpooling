<?php

namespace App\Services;

use App\Entities\CarpoolingAd;

class CarpoolingAdsService
{
    /**
     * Create or update a carpooling ad.
     */
    public function setCarpoolingAd(?string $id, string $title, string $description, float $price): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCarpoolingAd($title, $description, $price);
        } else {
            $isOk = $dataBaseService->updateCarpoolingAd($id, $title, $description, $price);
        }

        return $isOk;
    }

    /**
     * Return all carpooling ads.
     */
    public function getCarpoolingAds(): array
    {
        $ads = [];

        $dataBaseService = new DataBaseService();
        $adsDTO = $dataBaseService->getCarpoolingAds();
        if (!empty($adsDTO)) {
            foreach ($adsDTO as $adDTO) {
                $ad = new CarpoolingAd();
                $ad->setId($adDTO['id']);
                $ad->setTitle($adDTO['title']);
                $ad->setDescription($adDTO['description']);
                $ad->setPrice($adDTO['price']);
                $ads[] = $ad;
            }
        }

        return $ads;
    }

    /**
     * Delete a carpooling ad.
     */
    public function deleteCarpoolingAd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCarpoolingAd($id);

        return $isOk;
    }
}