<?php

namespace App\Controllers;

use App\Services\UsersService;

class UsersController
{
     /**
     * Return the html for the create action.
     */
    public function createUser(): string
    {
        $html = '';

        // If the form has been submitted :
        if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['birthday'], $_POST['cars'], $_POST['carpoolingAds'], $_POST['reservations'])) {
            // Create the user :
            $usersService = new UsersService();
            $userId = $usersService->setUser(
                null,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );

            // Check if user creation was successful before proceeding:
            if ($userId) {
                // Create the user cars relations:
                foreach ($_POST['cars'] as $carId) {
                    if (!empty($carId)) {
                        $isOk = $usersService->setUserCar($userId, $carId);
                        if (!$isOk) {
                            $html = 'Erreur lors de la création des relations voiture.';
                            return $html;
                        }
                    }
                }

                // Create the user carpooling ads relations:
                foreach ($_POST['carpoolingAds'] as $carpoolingAdId) {
                    if (!empty($carpoolingAdId)) {
                        $isOk = $usersService->setUserCarpoolingAd($userId, $carpoolingAdId);
                        if (!$isOk) {
                            $html = 'Erreur lors de la création des relations annonce de covoiturage.';
                            return $html;
                        }
                    }
                }

                // Create the user reservations relations:
                foreach ($_POST['reservations'] as $reservationId) {
                    if (!empty($reservationId)) {
                        $isOk = $usersService->setUserReservation($userId, $reservationId);
                        if (!$isOk) {
                            $html = 'Erreur lors de la création des relations réservation.';
                            return $html;
                        }
                    }
                }

                $html = 'Utilisateur créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'utilisateur.';
            }
        }

        return $html;
    }


    /**
     * Return the html for the read action.
     */
    public function getUsers(): string
    {
        $html = '';

        // Get all users :
        $usersService = new UsersService();
        $users = $usersService->getUsers();

        // Get html :
        foreach ($users as $user) {
            $carsHtml = '';
            $carpoolingAdsHtml = '';
            $reservationsHtml = '';

            if (!empty($user->getCars())) {
                foreach ($user->getCars() as $car) {
                    $carsHtml .= $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor() . ' ';
                }
            }

            if (!empty($user->getCarpoolingAds())) {
                foreach ($user->getCarpoolingAds() as $carpoolingAd) {
                    $carpoolingAdsHtml .= $carpoolingAd->getTitle() . ' ';
                }
            }

            if (!empty($user->getReservations())) {
                foreach ($user->getReservations() as $reservation) {
                    $reservationsHtml .= $reservation->getReservationDate()->format('d-m-Y') . ' ' . $reservation->getAddress() . ' ';
                }
            }

            $html .=
                '#' . $user->getId() . ' ' .
                $user->getFirstname() . ' ' .
                $user->getLastname() . ' ' .
                $user->getEmail() . ' ' .
                $user->getBirthday()->format('d-m-Y') . ' ' .
                $carsHtml . ' ' .
                $carpoolingAdsHtml . ' ' .
                $reservationsHtml . '<br />';
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday'])) {
            // Update the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                $_POST['id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = 'Utilisateur mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'utilisateur.';
            }
        }

        return $html;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $usersService = new UsersService();
            $isOk = $usersService->deleteUser($_POST['id']);
            if ($isOk) {
                $html = 'Utilisateur supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'utilisateur.';
            }
        }

        return $html;
    }
}
