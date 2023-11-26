<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
    <h2>Liste des voitures</h2>
    <?php
    // Imaginons que $cars est une variable contenant les voitures récupérées du contrôleur.
    foreach ($cars as $car) {
        echo "<div>" . htmlspecialchars($car->getMake()) . " " .
             htmlspecialchars($car->getModel()) . " - " .
             htmlspecialchars($car->getYear()) . "</div>";
    }
    ?>
</body>
</html>