<?php
class User {
    private $db;

    public function __construct() {
        require_once 'config/config.php';
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    public function create($username, $password) {
        $hashed_password = hash('sha256', $password);
        $stmt = $this->db->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
        return $stmt->execute([$username, $hashed_password]);
    }

    public function findByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function getUserIdByUsername($username) {
        $stmt = $this->db->prepare("SELECT id FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result ? $result['id'] : null;
    }

    public function addPokemon($userId, $pokemonId) {
        $stmt = $this->db->prepare("INSERT INTO user_pokemon (user_id, pokemon_id) VALUES (?, ?)");
        return $stmt->execute([$userId, $pokemonId]);
    }

    public function getPokemons($userId) {
        $stmt = $this->db->prepare("SELECT pokemon_id FROM user_pokemon WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function password_verify($username, $password) {
        $user = $this->findByUsername($username);
        if ($user && isset($user['password'])==hash('sha256', $password)) {
            return password_verify($password, $user['password']);
        }
        return false;
    }

}
