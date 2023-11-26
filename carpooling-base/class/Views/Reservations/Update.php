<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour une réservation</title>
</head>
<body>
    <h2>Mettre à jour une réservation</h2>
    <form method="post" action="/reservations/update">
        <input type="hidden" name="id" value="ID_de_la_réservation">
        <label for="reservationDate">Date de réservation:</label><br>
        <input type="date" id="reservationDate" name="reservationDate"><br>
        <label for="status">Statut:</label><br>
        <input type="text" id="status" name="status"><br>
        <input type="submit" value="Mettre à jour la réservation">
    </form> 
</body>
</html>