<!DOCTYPE html>
<html>
<head>
    <title>Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pokédex</h1>
        <div class="pokemon-list">
            <?php foreach ($pokemons as $pokemon): ?>
                <div class="pokemon-card">
                    <img src="<?php echo $pokemon['image']; ?>" alt="<?php echo $pokemon['name']; ?>">
                    <h2><?php echo $pokemon['name']; ?></h2>
                    <p>Type: <?php echo implode(', ', $pokemon['type']); ?></p>
                    <a href="index.php?controller=pokemon&action=showOnePokemon&id=<?php echo $pokemon['id']; ?>">Voir détail</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
