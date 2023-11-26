<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une voiture</title>
</head>
<body>
    <h2>Créer une voiture</h2>
    <form method="post" action="/cars/create">
        <label for="make">Marque:</label><br>
        <input type="text" id="make" name="make"><br>
        <label for="model">Modèle:</label><br>
        <input type="text" id="model" name="model"><br>
        <label for="year">Année:</label><br>
        <input type="number" id="year" name="year"><br>
        <input type="submit" value="Créer la voiture">
    </form>
</body>
</html>