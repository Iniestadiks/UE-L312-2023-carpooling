<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des annonces de covoiturage</title>
</head>
<body>
    <h2>Liste des annonces de covoiturage</h2>
    <?php
    // Imaginons que $carpoolingAds est une variable contenant les annonces récupérées du contrôleur.
    foreach ($carpoolingAds as $ad) {
        echo "<div>" . htmlspecialchars($ad->getTitle()) . " - " .
             htmlspecialchars($ad->getDescription()) . " - " .
             htmlspecialchars($ad->getPrice()) . "€</div>";
    }
    ?>
</body>
</html>