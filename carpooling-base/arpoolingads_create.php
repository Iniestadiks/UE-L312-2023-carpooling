<?php

use App\Controllers\CarpoolingAdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolingAdsController();
echo $controller->createCarpoolingAd();
?>

<p>Création d'une annonce de covoiturage</p>
<form method="post" action="carpoolingads_create.php" name="carpoolingAdCreateForm">
    <label for="title">Titre :</label>
    <input type="text" name="title">
    <br />
    <label for="description">Description :</label>
    <textarea name="description"></textarea>
    <br />
    <label for="price">Prix :</label>
    <input type="number" name="price" step="0.01">
    <br />
    <input type="submit" value="Créer une annonce">
</form>