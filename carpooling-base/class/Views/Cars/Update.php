<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mettre à jour une voiture</title>
</head>
<body>
    <h2>Mettre à jour une voiture</h2>
    <form method="post" action="/cars/update">
        <input type="hidden" name="id" value="ID_de_la_voiture">
        <label for="make">Marque:</label><br>
        <input type="text" id="make" name="make"><br>
        <label for="model">Modèle:</label><br>
        <input type="text" id="model" name="model"><br>
        <label for="year">Année:</label><br>
        <input type="number" id="year" name="year"><br>
        <input type="submit" value="Mettre à jour la voiture">
    </form> 
</body>
</html>