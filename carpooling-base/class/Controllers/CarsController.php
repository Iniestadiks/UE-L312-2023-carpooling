<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form has been submitted:
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrSlots'])) {
            // Create the car:
            $carsService = new CarsService();
            $carId = $carsService->setCar(
                null,
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['nbrSlots']
            );

            if ($carId) {
                $html = 'Voiture créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

     /**
     * Update a car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form has been submitted:
        if (isset($_POST['id'], $_POST['brand'], $_POST['model'], $_POST['color'], $_POST['nbrSlots'])) {
            // Update the car:
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['nbrSlots']
            );

            if ($isOk) {
                $html = 'Voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form has been submitted:
        if (isset($_POST['id'])) {
            // Delete the car:
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);

            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la suppression de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        $carsService = new CarsService();
        $cars = $carsService->getCars();

        foreach ($cars as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getBrand() . ' ' .
                $car->getModel() . ' ' .
                $car->getColor() . ' ' .
                $car->getNbrSlots() . ' places<br />';
        }

        return $html;
    }

    
}
