<?php
class Pokemon {
    private $pokemons;

    public function __construct() {
        $json = file_get_contents('pokemon.json');
        $this->pokemons = json_decode($json, true);
    }

    public function getAllPokemons() {
        return $this->pokemons;
    }

    public function getPokemonById($id) {
        foreach ($this->pokemons as $pokemon) {
            if ($pokemon['id'] == $id) {
                return $pokemon;
            }
        }
        return null;
    }
}
