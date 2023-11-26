<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une réservation</title>
</head>
<body>
    <h2>Créer une réservation</h2>
    <form method="post" action="/reservations/create">
        <label for="reservationDate">Date de réservation:</label><br>
        <input type="date" id="reservationDate" name="reservationDate"><br>
        <label for="status">Statut:</label><br>
        <input type="text" id="status" name="status"><br>
        <input type="submit" value="Créer la réservation">
    </form>
</body>
</html>