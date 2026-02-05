<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> <!-- Encodage -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsive -->
    <title>Ma page web</title> <!-- Titre affiché dans l'onglet -->
    <link rel="stylesheet" href="style.css"> <!-- Feuille de style -->
    <script src="script.js" defer></script> <!-- Script JS -->
</head>
<body>
    
<h1>Connexion</h1>
<form action="./?action=connexion" method="POST">

    <input type="text" name="mailU" placeholder="Email de connexion" /><br />
    <input type="password" name="mdpU" placeholder="Mot de passe"  /><br />
    <input type="submit" />

</form>
<br />
<a href="./?action=inscription">Inscription</a>

<hr>
Utilisateur de test : <br />
login : test@bts.sio<br />
mot de passe : sio






</body>
</html>