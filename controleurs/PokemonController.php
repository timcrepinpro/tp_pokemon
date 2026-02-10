<?php
require_once 'modeles/Pokemon.php';

class PokemonController {
    public function showAllPokemon() {
        $pokemonModel = new Pokemon();
        $pokemons = $pokemonModel->getAllPokemons();
        require_once 'vues/all_pokemon.php';
    }

    public function showOnePokemon($id) {
        $pokemonModel = new Pokemon();
        $pokemon = $pokemonModel->getPokemonById($id);
        require_once 'vues/one_pokemon.php';
    }
}
