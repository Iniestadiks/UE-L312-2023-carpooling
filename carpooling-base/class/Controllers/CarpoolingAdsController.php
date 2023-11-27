<?php

namespace App\Controllers;

use App\Services\CarpoolingAdsService;

class CarpoolingAdsController
{
    /**
     * Return the html for the create action of a carpooling ad.
     */
    public function createCarpoolingAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['price'])) {
            // Create the carpooling ad :
            $carpoolingAdsService = new CarpoolingAdsService();
            $isOk = $carpoolingAdsService->setCarpoolingAd(
                null,
                $_POST['title'],
                $_POST['description'],
                $_POST['price']
            );
            if ($isOk) {
                $html = 'Annonce de covoiturage créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action of carpooling ads.
     */
    public function getCarpoolingAds(): string
    {
        $html = '';

        // Get all carpooling ads :
        $carpoolingAdsService = new CarpoolingAdsService();
        $ads = $carpoolingAdsService->getCarpoolingAds();

        // Get html :
        foreach ($ads as $ad) {
            $html .=
                '#' . $ad->getId() . ' ' .
                $ad->getTitle() . ' ' .
                $ad->getDescription() . ' ' .
                $ad->getPrice() . '<br />';
        }

        return $html;
    }

    /**
     * Update a carpooling ad.
     */
    public function updateCarpoolingAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['price'])) {
            // Update the carpooling ad :
            $carpoolingAdsService = new CarpoolingAdsService();
            $isOk = $carpoolingAdsService->setCarpoolingAd(
                $_POST['id'],
                $_POST['title'],
                $_POST['description'],
                $_POST['price']
            );
            if ($isOk) {
                $html = 'Annonce de covoiturage mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce.';
            }
        }

        return $html;
    }

    /**
     * Delete a carpooling ad.
     */
    public function deleteCarpoolingAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the carpooling ad :
            $carpoolingAdsService = new CarpoolingAdsService();
            $isOk = $carpoolingAdsService->deleteCarpoolingAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce de covoiturage supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la suppression de l\'annonce.';
            }
        }

        return $html;
    }
}