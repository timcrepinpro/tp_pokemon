<!DOCTYPE html>
<html>
<head>
    <title>Mon Pokédex</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Mon Pokédex</h1>
        <div class="pokemon-list">
            <?php if (empty($myPokemons)): ?>
                <p>Vous n'avez pas encore de Pokémon.</p>
            <?php else: ?>
                <?php foreach ($myPokemons as $pokemon): ?>
                    <div class="pokemon-card">
                        <img src="<?php echo $pokemon['image']; ?>" alt="<?php echo $pokemon['name']; ?>">
                        <h2><?php echo $pokemon['name']; ?></h2>
                        <p>Type: <?php echo implode(', ', $pokemon['type']); ?></p>
                        <a href="index.php?controller=pokemon&action=showOnePokemon&id=<?php echo $pokemon['id']; ?>">Voir détail</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <a href="index.php?controller=pokemon&action=showAllPokemon">Retour au Pokédex</a>
    </div>
</body>
</html>
