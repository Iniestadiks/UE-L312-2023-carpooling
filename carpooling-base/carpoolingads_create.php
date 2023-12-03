<?php

use App\Controllers\CarpoolingAdsController;
use App\Services\CarsService;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolingAdsController();
echo $controller->createCarpoolingAd();

$carsService = new CarsService();
$cars = $carsService->getCars();
?>

<p>Création d'une annonce de covoiturage</p>
<form method="post" action="carpooling_create.php" name ="carpoolingCreateForm">
    <label for="title">Titre :</label>
    <input type="text" name="title">
    <br />
    <label for="description">Description :</label>
    <textarea name="description"></textarea>
    <br />
    <label for="price">Prix :</label>
    <input type="number" name="price" step="0.01">
    <br />
    <label for="cars">Voiture(s) :</label>
    <?php foreach ($cars as $car): ?>
        <?php $carName = $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor(); ?>
        <input type="checkbox" name="cars[]" value="<?php echo $car->getId(); ?>"><?php echo $carName; ?>
        <br />
    <?php endforeach; ?>
    <br />
    <input type="submit" value="Créer une annonce">
</form>