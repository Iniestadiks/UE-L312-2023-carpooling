<?php

use App\Controllers\CarpoolingAdsController;

require __DIR__ . '/vendor/autoload.php';

$carpoolingadsController  = new CarpoolingAdsController();
echo $carpoolingadsController->deleteCarpoolingAd();
?>

<p>Suppression d'une annonce de covoiturage</p>
<form method="post" action="carpooling_delete.php" name ="carpoolingDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une annonce">
</form>