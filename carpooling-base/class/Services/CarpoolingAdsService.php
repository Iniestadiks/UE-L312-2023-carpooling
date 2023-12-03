<?php

namespace App\Services;

use App\Entities\CarpoolingAd;
use App\Entities\Car;
use App\Entities\Reservation;
use DateTime;

class CarpoolingAdsService
{
    /**
     * Create or update a carpooling ad.
     */
    public function setCarpoolingAd(?string $id, string $title, string $description, float $price): string
    {
        $carpoolingAdId = '';

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $carpoolingAdId = $dataBaseService->createCarpoolingAd($title, $description, $price);
        } else {
            $isOk = $dataBaseService->updateCarpoolingAd($id, $title, $description, $price);
            if ($isOk) {
                $carpoolingAdId = $id;
            }
        }

        return $carpoolingAdId;
    }

    /**
     * Return all carpooling ads.
     */
    public function getCarpoolingAds(): array
    {
        $carpoolingAds = [];

        $dataBaseService = new DataBaseService();
        $carpoolingAdsDTO = $dataBaseService->getCarpoolingAds();
        foreach ($carpoolingAdsDTO as $carpoolingAdDTO) {
            $carpoolingAd = new CarpoolingAd();
            $carpoolingAd->setId($carpoolingAdDTO['id']);
            $carpoolingAd->setTitle($carpoolingAdDTO['title']);
            $carpoolingAd->setDescription($carpoolingAdDTO['description']);
            $carpoolingAd->setPrice($carpoolingAdDTO['price']);

            // Get cars of this annonce :
            $cars = $this->getCarpoolingAdCars($carpoolingAdDTO['id']);
            $carpoolingAd->setCars($cars);

            // Get reservation of this annonce :
            $reservations = $this->getCarpoolingAdReservations($carpoolingAdDTO['id']);
            $carpoolingAd->setReservations($reservations);
           
            $carpoolingAds[] = $carpoolingAd;
        }

        return $carpoolingAds;
    }

    /**
     * Delete a carpooling ad.
     */
    public function deleteCarpoolingAd(string $id): bool
    {
        $isOk = false;
        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCarpoolingAd($id);
        $dataBaseService->deleteCarpoolingAd($id);

        return $isOk;
    }

    /**
     * Create relation between a carpooling ad and a car.
     */
    public function setCarpoolingAdCar(string $carpoolingAdId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setCarpoolingAdCar($carpoolingAdId, $carId);
        
        return $isOk;
    }

    /**
     * Create relation between a carpooling ad and a reservation.
     */
    public function setCarpoolingAdReservation(string $carpoolingAdId, string $reservationId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setCarpoolingAdReservation($carpoolingAdId, $reservationId);
        
        return $isOk;
    }

    /**
    * Get cars associated with a given carpooling ad id.
    */
    public function getCarpoolingAdCars(string $carpoolingAdId): array
{
    $carpoolingAdCars = [];

    $dataBaseService = new DataBaseService();

    // Get relation between carpooling ad and cars:
    $carpoolingAdsCarsDTO = $dataBaseService->getCarpoolingAdCar($carpoolingAdId);
    if (!empty($carpoolingAdsCarsDTO)) {
        foreach ($carpoolingAdsCarsDTO as $carpoolingAdCarDTO) {
            $car = new Car();
            $car->setId($carpoolingAdCarDTO['id']);
            $car->setBrand($carpoolingAdCarDTO['brand']);
            $car->setModel($carpoolingAdCarDTO['model']);
            $car->setColor($carpoolingAdCarDTO['color']);
            $car->setNbrSlots($carpoolingAdCarDTO['nbrSlots']);
            $carpoolingAdCars[] = $car; 
        }
    }

    return $carpoolingAdCars;
}

    /**
     * Get reservations associated with a given carpooling ad id.
     */
    public function getCarpoolingAdReservations(string $carpoolingAdId): array
{
    $carpoolingAdReservations = [];

    $dataBaseService = new DataBaseService();

    // Get relation between carpooling ad and reservations:
    $carpoolingAdsReservationsDTO = $dataBaseService->getCarpoolingAdReservations($carpoolingAdId);
    if (!empty($carpoolingAdsReservationsDTO)) {
        foreach ($carpoolingAdsReservationsDTO as $carpoolingAdReservationDTO) {
            $reservation = new Reservation();
            $reservation->setId($carpoolingAdReservationDTO['id']);
            $reservation->setReservationDate(new DateTime($carpoolingAdReservationDTO['reservationDate']));
            $reservation->setAddress($carpoolingAdReservationDTO['address']);
            $carpoolingAdReservations[] = $reservation;
        }
    }

    return $carpoolingAdReservations;
}

   
}