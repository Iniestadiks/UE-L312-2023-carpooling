<?php

namespace App\Controllers;

use App\Services\CarpoolingAdsService;

class CarpoolingAdsController
{
    /**
     * Handles the creation of a carpooling ad and its relationships with cars and reservations.
     */
    public function createCarpoolingAd(): string
    {
        $html = '';

        // Check if the form has been submitted:
            if (isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['price']) &&
            isset($_POST['cars']) &&
            isset($_POST['reservations']))

           {
            $carpoolingAdsService = new CarpoolingAdsService();
            $carpoolingAdId = $carpoolingAdsService->setCarpoolingAd(
                null,
                $_POST['title'],
                $_POST['description'],
                $_POST['price']
            );

            // Create the carpooling ad and car relations:
            $isOk = true;
            if (!empty($_POST['cars']) && $carpoolingAdId) {
                foreach ($_POST['cars'] as $carId) {
                    $isOk = $carpoolingAdsService->setCarpoolingAdCar($carpoolingAdId, $carId) && $isOk;
                }
            }

            // Create the carpooling ad and reservation relations:
            if (!empty($_POST['reservations']) && $carpoolingAdId) {
                foreach ($_POST['reservations'] as $reservationId) {
                    $isOk = $carpoolingAdsService->setCarpoolingAdReservation($carpoolingAdId, $reservationId) && $isOk;
                }
            }
            if ($carpoolingAdId && $isOk) {
                $html = 'Annonce de covoiturage créée avec succès.';
            } else {
                $html = 'Erreur lors de la création l\'Annonce de covoiturage .';
            }
        
        }

        return $html;
    }

     /**
     * Return the html for the read action.
     */
    public function getCarpoolingAds(): string
{
    $html = '';

    // Get all carpooling ads:
    $carpoolingAdsService = new CarpoolingAdsService();
    $carpoolingAds = $carpoolingAdsService->getCarpoolingAds();

    // Generate HTML for the carpooling ads:
    foreach ($carpoolingAds as $carpoolingAd) {
        $carsHtml = '';
        $reservationsHtml = '';
        if (!empty($carpoolingAd->getCars())) {
            foreach ($carpoolingAd->getCars() as $car) {
                $carsHtml .= $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor() . '; ';
            }
        }
        if (!empty($carpoolingAd->getReservations())) {
            foreach ($carpoolingAd->getReservations() as $reservation) {
                $reservationsHtml .= 'ID: ' . $reservation->getId() . ', Date: ' . $reservation->getReservationDate()->format('d-m-Y') . ', Address: ' . $reservation->getAddress() . '; ';
            }
        }
        $html .=
            '#' . $carpoolingAd->getId() . ' ' .
            $carpoolingAd->getTitle() . ' - ' .
            $carpoolingAd->getDescription() . ' ' .
            $carpoolingAd->getPrice() . '€<br />' .
            'Cars: ' . $carsHtml . '<br />' .
            'Reservations: ' . $reservationsHtml . '<br /><br />';
    }

    return $html;
}

    /**
     * Handles updating a carpooling ad.
     */
    public function updateCarpoolingAd(): string
    {
        $html = '';
    
        // Check if the form has been submitted and all required fields are present:
        if (isset($_POST['id']) &&
            isset($_POST['title']) &&
            isset($_POST['description']) &&
            isset($_POST['price'])) {
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
                $html = 'Erreur lors de la mise à jour de l\'annonce de covoiturage.';
            }
        } else {
            $html = 'Erreur : tous les champs nécessaires ne sont pas fournis.';
        }
    
        return $html;
    }

    /**
     * Handles deleting a carpooling ad.
     */
    public function deleteCarpoolingAd(): string
    {
        $html = '';

        // Check if the form has been submitted:
        if (isset($_POST['id'])) {
            $carpoolingAdsService = new CarpoolingAdsService();
            $isOk = $carpoolingAdsService->deleteCarpoolingAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce de covoiturage supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'Annonce de covoiturage.';
            }
            
        }

        return $html;
    }
}