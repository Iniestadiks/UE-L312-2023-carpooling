<?php

use App\Controllers\CarpoolingAdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolingAdsController();
echo $controller->getCarpoolingAds();
?>