<?php

use App\Controllers\CarpoolingAdsController;

require __DIR__ . '/vendor/autoload.php';

$carpoolingadsController  = new CarpoolingAdsController();
echo $carpoolingadsController->getCarpoolingAds();