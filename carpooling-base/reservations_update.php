<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $reservationsController->updateReservation();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservation_update.php" name="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="number" name="id">
    <br />
    <label for="reservationDate">Date de réservation (format yyyy-mm-dd) :</label>
    <input type="text" name="reservationDate">
    <br />
    <label for="address">Adresse :</label>
    <input type="text" name="address">
    <br />
    <input type="submit" value="Modifier la réservation">
</form>