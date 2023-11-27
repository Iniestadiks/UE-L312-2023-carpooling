<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->createReservation();
?>

<p>Création d'une réservation</p>
<form method="post" action="reservations_create.php" name="reservationCreateForm">
    <label for="reservationDate">Date de réservation au format dd-mm-yyyy :</label>
    <input type="text" name="reservationDate">
    <br />
    <label for="address">Adresse :</label>
    <input type="text" name="address">
    <br />
    <input type="submit" value="Créer une réservation">
</form>