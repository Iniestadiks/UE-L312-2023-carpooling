<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des réservations</title>
</head>
<body>
    <h2>Liste des réservations</h2>
    <?php
    // Imaginons que $reservations est une variable contenant les réservations récupérées du contrôleur.
    foreach ($reservations as $reservation) {
        echo "<div>Réservation pour le " . htmlspecialchars($reservation->getReservationDate()->format('Y-m-d')) .
             " - Statut: " . htmlspecialchars($reservation->getStatus()) . "</div>";
    }
    ?>
</body>
</html>