<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une voiture</title>
</head>
<body>
    <h2>Supprimer une voiture</h2>
    <form method="post" action="/cars/delete">
        <input type="hidden" name="id" value="ID_de_la_voiture">
        <input type="submit" value="Supprimer la voiture">
    </form> 
</body>
</html>