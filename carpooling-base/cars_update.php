<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$carController = new CarsController();
echo $carController->updateCar();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="car_update.php" name="carUpdateForm">
    <label for="id">Id :</label>
    <input type="number" name="id">
    <br />
    <label for="brand">Marque :</label>
    <input type="text" name="brand">
    <br />
    <label for="model">Modèle :</label>
    <input type="text" name="model">
    <br />
    <label for="color">Couleur :</label>
    <input type="text" name="color">
    <br />
    <label for="nbrSlots">Nombre de places :</label>
    <input type="number" name="nbrSlots">
    <br />
    <input type="submit" value="Modifier la voiture">
</form>