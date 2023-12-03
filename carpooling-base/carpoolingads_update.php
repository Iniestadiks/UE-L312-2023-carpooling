<?php

use App\Controllers\CarpoolingAdsController;

require __DIR__ . '/vendor/autoload.php';

$carpoolingadsController = new CarpoolingAdsController();
echo $carpoolingadsController->updateCarpoolingAd();
?>

<p>Mise à jour d'une annonce de covoiturage</p>
<form method="post" action="carpooling_ads_update.php" name ="carpoolingAdUpdateForm">
    <label for="id">Id :</label>
    <input type="number" name="id">
    <br />
    <label for="title">Titre :</label>
    <input type="text" name="title">
    <br />
    <label for="description">Description :</label>
    <textarea name="description"></textarea>
    <br />
    <label for="price">Prix :</label>
    <input type="number" step="0.01" name="price">
    <br />
    <input type="submit" value="Modifier l'annonce">
</form>