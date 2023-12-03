<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'password';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): string
    {
        $userId = '';

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $userId = $this->connection->lastInsertId();
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Create a car.
     */
    public function createCar(string $brand, string $model, string $color, int $nbrSlots): bool
    {
        $data = [
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'nbrSlots' => $nbrSlots,
        ];

        $sql = 'INSERT INTO cars (brand, model, color, nbrSlots) VALUES (:brand, :model, :color, :nbrSlots)';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Update a car.
     */
    public function updateCar(string $id, string $brand, string $model, string $color, int $nbrSlots): bool
    {
        $data = [
            'id' => $id,
            'brand' => $brand,
            'model' => $model,
            'color' => $color,
            'nbrSlots' => $nbrSlots,
        ];

        $sql = 'UPDATE cars SET brand = :brand, model = :model, color = :color, nbrSlots = :nbrSlots WHERE id = :id';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Delete a car by its ID.
     */
    public function deleteCar(string $id): bool
    {
        $data = [
            'id' => $id,
        ];

        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }


     /**
     * Create a carpooling.
     */
    public function createCarpoolingAd(string $title, string $description, float $price): string
    {
        $carpoolingAdId = '';

        $data = [
            'title' => $title,
            'description' => $description,
            'price' => $price,
        ];
        $sql = 'INSERT INTO carpoolingAds (title, description, price) VALUES (:title, :description, :price)';
        $query = $this->connection->prepare($sql);
        if ($query->execute($data)) {
            $carpoolingAdId = $this->connection->lastInsertId();
        }

        return $carpoolingAdId;
    }

    /**
     * Return all carpooling ads.
     */
    public function getCarpoolingAds(): array
    {
        $carpoolingAds = [];

        $sql = 'SELECT * FROM carpoolingAds';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolingAds = $results;
        }

        return $carpoolingAds;
    }

    /**
     * Update a carpooling ad.
     */
    public function updateCarpoolingAd(string $id, string $title, string $description, float $price): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'price' => $price,
        ];
        $sql = 'UPDATE carpoolingAds SET title = :title, description = :description, price = :price WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a carpooling ad.
     */
    public function deleteCarpoolingAd(string $id): bool
    {
        $isOk = false;

        $sql = 'DELETE FROM carpoolingAds WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute(['id' => $id]);

        return $isOk;
    }
    /**
     * Create a reservation.
     */
    public function createReservation(DateTime $reservationDate, string $address): string {
        $reservationId = '';

        $data = [
            'reservation_date' => $reservationDate->format('Y-m-d H:i:s'), // Assurez-vous que le format de date est correct
            'address' => $address,
        ];

        $sql = 'INSERT INTO reservations (reservation_date, address) VALUES (:reservation_date, :address)';
        $query = $this->connection->prepare($sql);
        if ($query->execute($data)) {
            $reservationId = $this->connection->lastInsertId();
        }

        return $reservationId;
    }

    /**
     * Return all reservations.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $sql = 'SELECT * FROM reservations';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservations = $results;
        }

        return $reservations;
    }

    /**
     * Update a reservation.
     */
    public function updateReservation(string $id, DateTime $reservationDate, string $address): bool {
        $data = [
            'id' => $id,
            'reservation_date' => $reservationDate->format('Y-m-d H:i:s'), // Assurez-vous que le format de date est correct
            'address' => $address,
        ];

        $sql = 'UPDATE reservations SET reservation_date = :reservation_date, address = :address WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $data = [
            'id' => $id,
        ];

        $sql = 'DELETE FROM reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);

        return $query->execute($data);
    }


    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'carId' => $carId,
        ];
        $sql = 'INSERT INTO users_cars (user_id, car_id) VALUES (:userId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.car_id = c.id
            WHERE uc.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCars = $results;
        }

        return $userCars;
    }

     /**
     * Create relation between a user and a carpooling ad.
     */
    public function setUserCarpoolingAd(string $userId, string $carpoolingAdId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'carpoolingAdId' => $carpoolingAdId,
        ];

        $sql = 'INSERT INTO users_carpoolingAds (user_id, carpooling_ad_id) VALUES (:userId, :carpoolingAdId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get carpooling ads of a given user id.
     */
    public function getUserCarpoolingAds(string $userId): array {
        $carpoolingAds = [];
    
        $sql = '
            SELECT ca.*
            FROM carpoolingAds AS ca
            INNER JOIN users_carpoolingAds AS uca ON ca.id = uca.carpoolingAd_id
            WHERE uca.user_id = :userId';
    
        $query = $this->connection->prepare($sql);
        $query->execute(['userId' => $userId]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolingAds = $results;
        }
    
        return $carpoolingAds;
    }
     /**
    * Create relation between a carpooling ad and a car.
    */
   public function setCarpoolingAdCar(string $carpoolingAdId, string $carId): bool
   {
       $isOk = false;

       $data = [
           'carpoolingAdId' => $carpoolingAdId,
           'carId' => $carId,
       ];
       $sql = 'INSERT INTO carpoolingAds_cars (carpoolingAd_id, car_id) VALUES (:carpoolingAdId, :carId)';
       $query = $this->connection->prepare($sql);
       $isOk = $query->execute($data);

       return $isOk;
   }

   /**
     * Get cars associated with a given carpooling ad id.
     */
    public function getCarpoolingAdCar(string $carpoolingAdId): array
    {
        $carpoolingAdCars = [];

        $data = [
            'carpoolingAdId' => $carpoolingAdId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN carpoolingAds_cars as cac ON cac.car_id = c.id
            WHERE cac.carpoolingAd_id = :carpoolingAdId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolingAdCars = $results;
        }

        return $carpoolingAdCars;
    }

     /**
     * Create relation between a user and a reservation.
     */
    public function setUserReservation(string $userId, string $reservationId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'reservationId' => $reservationId,
        ];

        $sql = 'INSERT INTO users_reservations (user_id, reservation_id) VALUES (:userId, :reservationId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get reservations of a given user id.
     */
    public function getUserReservations(string $userId): array {
        $reservations = [];
    
        $sql = '
            SELECT r.*
            FROM reservations AS r
            INNER JOIN users_reservations AS ur ON r.id = ur.reservation_id
            WHERE ur.user_id = :userId';
    
        $query = $this->connection->prepare($sql);
        $query->execute(['userId' => $userId]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservations = $results;
        }
    
        return $reservations;
    }

    /**
     * Create relation between a carpooling ad and a reservation.
     */
    public function setCarpoolingAdReservation(string $adId, string $reservationId): bool
    {
        $isOk = false;

        $data = [
            'adId' => $adId,
            'reservationId' => $reservationId,
        ];
        $sql = 'INSERT INTO carpoolingAds_reservations (ad_id, reservation_id) VALUES (:adId, :reservationId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    public function getCarpoolingAdReservations(string $adId): array
    {
        $adReservations = [];
    
        $data = [
            'adId' => $adId,
        ];
        $sql = '
            SELECT r.*
            FROM reservations AS r
            LEFT JOIN carpoolingAds_reservations AS car_ad_res ON car_ad_res.reservation_id = r.id
            WHERE car_ad_res.carpoolingAd_id = :adId'; 
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $adReservations = $results;
        }
    
        return $adReservations;
    }
}

