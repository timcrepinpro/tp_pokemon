<!DOCTYPE html>
<html>
<head>
    <title>Pokédex - <?php echo $pokemon['name']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="pokemon-card">
            <img src="<?php echo $pokemon['image']; ?>" alt="<?php echo $pokemon['name']; ?>">
            <h2><?php echo $pokemon['name']; ?></h2>
            <p>Type: <?php echo implode(', ', $pokemon['type']); ?></p>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="index.php?controller=user&action=addPokemon&id=<?php echo $pokemon['id']; ?>">Ajouter à mon Pokédex</a>
            <?php endif; ?>
            <br><a href="index.php?controller=pokemon&action=showAllPokemon">Retour à la liste</a>
        </div>
    </div>
</body>
</html>
