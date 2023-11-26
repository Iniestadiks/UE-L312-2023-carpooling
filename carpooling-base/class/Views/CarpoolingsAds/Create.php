<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une annonce de covoiturage</title>
</head>
<body>
    <h2>Créer une annonce de covoiturage</h2>
    <form method="post" action="/carpoolingAds/create">
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="price">Prix:</label><br>
        <input type="number" id="price" name="price"><br>
        <input type="submit" value="Créer l'annonce">
    </form> 
</body>
</html>