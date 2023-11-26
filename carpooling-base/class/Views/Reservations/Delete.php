<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une réservation</title>
</head>
<body>
    <h2>Supprimer une réservation</h2>
    <form method="post" action="/reservations/delete">
        <input type="hidden" name="id" value="ID_de_la_réservation">
        <input type="submit" value="Supprimer la réservation">
    </form> 
</body>
</html>