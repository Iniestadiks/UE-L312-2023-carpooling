<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer une annonce de covoiturage</title>
</head>
<body>
    <h2>Supprimer une annonce de covoiturage</h2>
    <form method="post" action="/carpoolingAds/delete">
        <input type="hidden" name="id" value="ID_de_l_annonce">
        <input type="submit" value="Supprimer l'annonce">
    </form> 
</body>
</html>