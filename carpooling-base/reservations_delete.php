<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$reservationsController  = new ReservationsController();
echo $reservationsController->deleteReservation();
?>

<p>Suppression d'une réservation</p>
<form method="post" action="reservation_delete.php" name ="reservationDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une réservation">
</form>