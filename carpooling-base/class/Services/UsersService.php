<?php

namespace App\Services;

use App\Entities\Car;
use App\Entities\CarpoolingAd;
use App\Entities\Reservation;
use App\Entities\User;
use DateTime;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): string
    {
        $userId = '';

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $userId = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
            $userId = $id;
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    // ... autres méthodes ...

    /**
     * Return all users with their related cars, carpooling ads, and reservations.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                // Get user :
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setBirthday($date);
                }

                // Get cars of this user :
                $user->setCars($this->getUserCars($userDTO['id']));

                // Get carpooling ads of this user :
                $user->setCarpoolingAds($this->getUserCarpoolingAds($userDTO['id']));

                // Get reservations of this user :
                $user->setReservations($this->getUserReservations($userDTO['id']));

                $users[] = $user;
            }
        }

        return $users;
    }
    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }

    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserCar($userId, $carId);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarsDTO = $dataBaseService->getUserCars($userId);
        if (!empty($usersCarsDTO)) {
            foreach ($usersCarsDTO as $userCarDTO) {
                $car = new Car();
                $car->setId($userCarDTO['id']);
                $car->setBrand($userCarDTO['brand']);
                $car->setModel($userCarDTO['model']);
                $car->setColor($userCarDTO['color']);
                $car->setNbrSlots($userCarDTO['nbrSlots']);
                $userCars[] = $car;
            }
        }

        return $userCars;
    }


    /**
     * Create relation between an user and a carpooling ad.
     */
    public function setUserCarpoolingAd(string $userId, string $carpoolingAdId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserCarpoolingAd($userId, $carpoolingAdId);

        return $isOk;
    }

    /**
 * Get carpooling ads of a given user id.
 */
public function getUserCarpoolingAds(string $userId): array
{
    $userCarpoolingAds = [];

    $dataBaseService = new DataBaseService();

    // Get relation users and carpooling ads :
    $usersCarpoolingAdsDTO = $dataBaseService->getUserCarpoolingAds($userId);
    if (!empty($usersCarpoolingAdsDTO)) {
        foreach ($usersCarpoolingAdsDTO as $carpoolingAdDTO) {
            $carpoolingAd = new CarpoolingAd();
            $carpoolingAd->setId($carpoolingAdDTO['id']);
            $carpoolingAd->setTitle($carpoolingAdDTO['title']);
            $carpoolingAd->setDescription($carpoolingAdDTO['description']);
            $carpoolingAd->setPrice($carpoolingAdDTO['price']);
            $userCarpoolingAds[] = $carpoolingAd;
        }
    }

    return $userCarpoolingAds;
}

/**
     * Create relation between an user and a reservation.
     */
    public function setUserReservation(string $userId, string $reservationId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserReservation($userId, $reservationId);

        return $isOk;
    }


/**
 * Get reservations of a given user id.
 */
public function getUserReservations(string $userId): array
{
    $userReservations = [];

    $dataBaseService = new DataBaseService();

    // Get relation users and reservations :
    $usersReservationsDTO = $dataBaseService->getUserReservations($userId);
    if (!empty($usersReservationsDTO)) {
        foreach ($usersReservationsDTO as $reservationDTO) {
            $reservation = new Reservation();
            $reservation->setId($reservationDTO['id']);
            $reservation->setReservationDate(new DateTime($reservationDTO['reservation_date']));
            $reservation->setAddress($reservationDTO['address']);
            $userReservations[] = $reservation;
        }
    }

    return $userReservations;
}
}
