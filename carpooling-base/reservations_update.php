<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservation();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations_update.php" name="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="reservationDate">Date de réservation au format dd-mm-yyyy :</label>
    <input type="text" name="reservationDate">
    <br />
    <label for="address">Adresse :</label>
    <input type="text" name="address">
    <br />
    <input type="submit" value="Modifier la réservation">
</form>