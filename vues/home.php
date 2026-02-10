<!DOCTYPE html>
<html>
<head>
    <title>Mini Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur le Mini Pokédex</h1>
        <?php if (isset($_SESSION['username'])): ?>
            <p>Bonjour, <?php echo $_SESSION['username']; ?>!</p>
            <a href="index.php?controller=pokemon&action=showAllPokemon">Voir le Pokédex</a><br>
            <a href="index.php?controller=user&action=showMyPokemon">Mon Pokédex</a><br>
            <a href="index.php?controller=user&action=logout">Se déconnecter</a>
        <?php else: ?>
            <a href="index.php?controller=user&action=showRegistrationForm">S'inscrire</a>
            <a href="index.php?controller=user&action=showLoginForm">Se connecter</a>
        <?php endif; ?>
    </div>
</body>
</html>
