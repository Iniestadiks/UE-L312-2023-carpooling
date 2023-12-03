<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$reservationsController  = new ReservationsController();
echo $reservationsController->getReservations();